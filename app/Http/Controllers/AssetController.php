<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Asset;
use App\Models\Instructor;
use App\Models\RegisteredAssets;
use App\Models\User;
use App\Models\DefectiveAsset;
use App\Models\Report;
use App\Models\Room;
use Illuminate\Support\Facades\File;

class AssetController extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function read(Request $request) {

        if(Auth::user()->type == 1) {

            $asset = Asset::orderBy('created_at', 'DESC')->get();
            $registered_asset = RegisteredAssets::orderBy('property', 'ASC')->get();   

            return view('borrowed-assets', compact('asset', 'registered_asset'));

        }
    }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function assets() {

        if(Auth::user()->type == 1) {
            $rooms = Room::orderBy('room', 'ASC')->get();
            $asset = RegisteredAssets::orderBy('property', 'ASC')->get();     
            $instructor = Instructor::orderBy('name', 'ASC')->get();
            return view('assets', compact('asset', 'instructor', 'rooms'));

        }
        if(Auth::user()->type == 2) {
            $rooms = Room::orderBy('room', 'ASC')->get();
            $asset = RegisteredAssets::where(['person_in_charge' => Auth::user()->userid])->orderBy('property', 'ASC')->get();     
            $instructor = Instructor::orderBy('name', 'ASC')->get();
            return view('assets', compact('asset', 'instructor', 'rooms'));

        }
    }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function viewAssetHistory(Request $request) {

        $rooms = Room::orderBy('room', 'ASC')->get();
        $asset = RegisteredAssets::where(['id' => $request->id])->get();     
        $instructor = Instructor::orderBy('name', 'ASC')->get();
        $defectiveAsset = DefectiveAsset::orderBy('created_at', 'DESC')->get();
        $reports = Report::get();
        return view('view-asset-history', compact('asset', 'instructor', 'rooms', 'defectiveAsset', 'reports'));

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function newAsset(Request $request) {

        date_default_timezone_set("Asia/Singapore"); 
        $datetime = date('Ymd-His');

        $filename = \Str::slug($request->property.'-'.$datetime).'.'.$request->photo->extension(); 
        $transferfile = $request->file('photo')->storeAs('public/photo/', $filename);

        RegisteredAssets::create([
            'property' => $request->property,
            'model_number' => $request->model_number,
            'serial_number' => $request->serial_number,
            'person_in_charge' => $request->person,
            'room' => $request->room,
            'status' => 1,
            'photo' => $filename
        ]);

        return response()->json(['Error' => 0, 'Message'=> 'New Asset Added Successfully']); 

    }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateRegisteredAsset(Request $request) {

        date_default_timezone_set("Asia/Singapore"); 
        $datetime = date('Ymd-His');

        if(!empty($request->photo)) {

            foreach(RegisteredAssets::where(['id' => $request->assetid])->get() as $get) {
                File::delete(public_path('storage/photo/'.$get->photo.''));
            }

            $filename = \Str::slug($request->property.'-'.$datetime).'.'.$request->photo->extension(); 
            $transferfile = $request->file('photo')->storeAs('public/photo/', $filename);

            RegisteredAssets::where(['id' => $request->assetid])->update([
                'property' => $request->property,
                'person_in_charge' => $request->person,
                'model_number' => $request->model_number,
                'serial_number' => $request->serial_number,
                'room' => $request->room,
                'status' => $request->status,
                'photo' => $filename
            ]);
        }

        else {
            RegisteredAssets::where(['id' => $request->assetid])->update([
                'property' => $request->property,
                'model_number' => $request->model_number,
                'serial_number' => $request->serial_number,
                'person_in_charge' => $request->person,
                'room' => $request->room,
                'status' => $request->status,
            ]);
        }

        return response()->json(['Error' => 0, 'Message'=> 'Asset Updated Successfully']); 
    }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function getPerson(Request $request) {

        foreach(RegisteredAssets::where(['property' => $request->property])->get() as $get) {

            return response()->json(['person' => $get->Instructor->name, 'modelNumber' => $get->model_number, 'serialNumber' => $get->serial_number]); 
        }     
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function deleteRegisteredAsset(Request $request) {

        foreach(RegisteredAssets::where(['id' => $request->assetid])->get() as $get) {
            File::delete(public_path('storage/photo/'.$get->photo.''));
        }

        RegisteredAssets::where(['id' => $request->assetid])->delete();

        return response()->json(['Error' => 0, 'Message'=> 'Asset Deleted Successfully']); 
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function searchAsset(Request $request) {

        if($request->search == 1) {
            $asset = RegisteredAssets::where('property', 'like', '%'.$request->asset.'%')->orderBy('property', 'ASC')->get();
        }

        if($request->search == 2) {
            $asset = RegisteredAssets::where(['room' => $request->asset])->orderBy('property', 'ASC')->get();
        }

        return view('table.asset-table', compact('asset')); 

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function create(Request $request) {

        Asset::create([
            'name' => $request->fullname,
            'position' => $request->position,
            'contact_number' => $request->contactnumber,
            'model_number' => $request->model_number,
            'serial_number' => $request->serial_number,
            'property_name' => $request->property_name,
            'quantity' => $request->quantity,
            'person_in_charge' => $request->person_in_charge,
            'date_borrowed' => $request->date_borrowed,
            'date_returned' => null,
            'status' => 1
        ]);

        return response()->json(['Error' => 0, 'Message'=> 'Property/Asset Borrowed Successfully']); 

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function return(Request $request) {

        Asset::where(['id' => $request->assetid])->update([
            'date_returned' => $request->date_returned,
            'asset_condition' => $request->condition,
            'remarks' => $request->remarks,
            'status' => 0
        ]);

        return response()->json(['Error' => 0, 'Message'=> 'Property/Asset Returned Successfully']); 

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function update(Request $request) {

        Asset::where(['id' => $request->assetid])->update([
            'name' => $request->fullname,
            'position' => $request->position,
            'contact_number' => $request->contactnumber,
            'model_number' => $request->model_number,
            'serial_number' => $request->serial_number,
            'property_name' => $request->property_name,
            'quantity' => $request->quantity,
            'person_in_charge' => $request->person_in_charge,
            'date_borrowed' => $request->date_borrowed
        ]);

        return response()->json(['Error' => 0, 'Message'=> 'Borrowed Property/Asset Updated Successfully']); 

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function delete(Request $request) {

        Asset::where(['id' => $request->assetid])->delete();

        return response()->json(['Error' => 0, 'Message'=> 'Property/Asset Deleted Successfully']); 

    }
}
