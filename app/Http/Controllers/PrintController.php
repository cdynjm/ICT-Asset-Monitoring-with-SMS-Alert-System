<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use App\Models\Report;
use App\Models\DefectiveAsset;
use App\Models\Issue;
use App\Models\User;
use App\Models\SMSToken;
use App\Models\RegisteredAssets;

class printController extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function print(Request $request){


        $rooms = Room::orderBy('room', 'ASC')->get();

        if(Auth::user()->type == 1) {
            $defective_asset = DefectiveAsset::get();
            $asset = RegisteredAssets::orderBy('property', 'ASC')->get();
            $issues = Issue::orderBy('description', 'ASC')->get();

            if($request->room == 'all' && $request->issue == 'all') {

                $reports = Report::where('month', '>=', $request->from)
                            ->where('month', '<=', $request->to)
                            ->where('date_reported', 'like', '%'.$request->year.'%')   
                            ->orderBy('date_reported', 'DESC')->get();
            }

            if($request->room != 'all' && $request->issue == 'all') {

                $reports = Report::where('month', '>=', $request->from)
                           ->where('month', '<=', $request->to)
                           ->where('date_reported', 'like', '%'.$request->year.'%') 
                           ->where(['roomid' => $request->room])  
                           ->orderBy('date_reported', 'DESC')->get();
            }

            if($request->room == 'all' && $request->issue != 'all') {

                $reports = Report::where('month', '>=', $request->from)
                           ->where('month', '<=', $request->to)
                           ->where('date_reported', 'like', '%'.$request->year.'%') 
                           ->where(['description' => $request->issue])  
                           ->orderBy('date_reported', 'DESC')->get();
            }

            if($request->room != 'all' && $request->issue != 'all') {

                $reports = Report::where('month', '>=', $request->from)
                           ->where('month', '<=', $request->to)
                           ->where('date_reported', 'like', '%'.$request->year.'%') 
                           ->where(['roomid' => $request->room]) 
                           ->where(['description' => $request->issue])  
                           ->orderBy('date_reported', 'DESC')->get();
            }
    
            return view('print', compact('rooms', 'reports', 'issues', 'asset', 'defective_asset'));

        }
        else {
            abort(404);
        }

    }

}