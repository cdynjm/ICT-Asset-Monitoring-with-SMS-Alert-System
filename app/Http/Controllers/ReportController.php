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

class ReportController extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function read(){

        $rooms = Room::orderBy('room', 'ASC')->get();

        if(Auth::user()->type == 1) {
            $defective_asset = DefectiveAsset::get();
            $asset = RegisteredAssets::orderBy('property', 'ASC')->get();
            $issues = Issue::orderBy('description', 'ASC')->get();
            $reports = Report::orderBy('date_reported', 'DESC')->get();
        }
        if(Auth::user()->type == 2) {
            $defective_asset = DefectiveAsset::get();
            $asset = RegisteredAssets::orderBy('property', 'ASC')->get();
            $issues = Issue::orderBy('description', 'ASC')->get();
            $reports = Report::where(['userid' => Auth::user()->userid])->orderBy('date_reported', 'DESC')->get();
        }

        return view('reports', compact('rooms', 'reports', 'issues', 'asset', 'defective_asset'));

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function issues(){

        if(Auth::user()->type == 1) {
            $reports = Report::orderBy('date_reported', 'DESC')->get();
            $issues = Issue::orderBy('description', 'ASC')->get();
            return view('issues', compact('issues', 'reports'));
        }

    }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function selectRoom(Request $request){

            $asset = RegisteredAssets::where(['room' => $request->room])->orderBy('property', 'ASC')->get();
            return view('components.modals.checkbox.check-box', compact('asset'));
        

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createIssue(Request $request) {

        Issue::create(['description' => $request->issue]);
        return response()->json(['Error' => 0, 'Message'=> 'Issue Added Successfully']); 
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateIssue(Request $request) {

        Issue::where(['id' => $request->issueid])->update(['description' => $request->issue]);
        return response()->json(['Error' => 0, 'Message'=> 'Issue Updated Successfully']); 
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function deleteIssue(Request $request) {

        Issue::where(['id' => $request->issueid])->delete();
        return response()->json(['Error' => 0, 'Message'=> 'Issue Deleted Successfully']); 
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function searchIssue(Request $request) {

        $defective_asset = DefectiveAsset::get();

        if(Auth::user()->type == 1) {
            $reports = Report::where(['description' => $request->issue])->orderBy('date_reported', 'DESC')->get();
        }
        if(Auth::user()->type == 2) {
            $reports = Report::where(['description' => $request->issue])->where(['userid' => Auth::user()->userid])->orderBy('date_reported', 'DESC')->get();
        }

        return response()->json(['Pending' => view('table.pending-table', compact('reports', 'defective_asset'))->render(), 'Resolved' => view('table.resolved-table', compact('reports', 'defective_asset'))->render()]); 
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createComment(Request $request) {

        Report::where(['id' => $request->report_id])->update(['comment' => $request->comment]);
        return response()->json(['Error' => 0, 'Message'=> 'Comment Added Successfully']); 
    }
    public function create(Request $request) {

        date_default_timezone_set("Asia/Singapore"); 

        $description = '';
        $defective_asset = '';

        $admin = User::where(['id' => 1])->where(['type' => 1])->get();

        $smstoken = SMSToken::get();

        if(empty($request->specify)) {
            foreach(Issue::where(['id' => $request->description])->get() as $get) {
                $description = $get->description;
            }
            if(empty($request->others)) {
                foreach($request->property as $key => $value) {
                    foreach(RegisteredAssets::where(['id' => $request->property[$key]])->get() as $get) {
                        $defective_asset .= $get->property.'\n';
                    }
                }
            }
            else {
                foreach($request->property as $key => $value) {
                    foreach(RegisteredAssets::where(['id' => $request->property[$key]])->get() as $get) {
                        $defective_asset .= $get->property.'\n';
                    }
                }

                $defective_asset .= $request->others;
            }
            
        }
        else {
            $description = $request->specify;

            if(empty($request->others)) {
                foreach($request->property as $key => $value) {
                    foreach(RegisteredAssets::where(['id' => $request->property[$key]])->get() as $get) {
                        $defective_asset .= $get->property.'\n';
                    }
                }
            }
            else {
                foreach($request->property as $key => $value) {
                    foreach(RegisteredAssets::where(['id' => $request->property[$key]])->get() as $get) {
                        $defective_asset .= $get->property.'\n';
                    }
                }

                $defective_asset .= $request->others;
            }
        }

        foreach ($smstoken as $st) {
            $mobile_iden = $st->mobile_identity; // as you have copied from the url, explained above
            $mobile_token = $st->access_token; // as per your creation of token
        }
        
        foreach($admin as $admin) {
            $addresses = $admin->phone; // mobile number to send text to
            break;
        }

        $room = Room::where(['id' => $request->room])->get();

        foreach($room as $room) {
            $sms = 'ICT Monitoring System\n\nFrom: '.Auth::user()->Instructor->name.'\nRoom: '.$room->room.'\n\n'.$description.'\n\nDefective Property: \n'.$defective_asset;
        }
        $ch = curl_init();
        foreach ($smstoken as $st) {
            curl_setopt($ch, CURLOPT_URL, $st->url);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"data\":{\"addresses\":[\"$addresses\"],\"message\":\"$sms\",\"target_device_iden\":\"$mobile_iden\"}}");

        $headers = [];
        $headers[] = 'Access-Token: '.$mobile_token;
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        if(!empty($request->specify)) {
            $report = Report::create([
                'userid' => Auth::user()->userid,
                'roomid' => $request->room,
                'description' => $request->description,
                'specify' => $request->specify,
                'status' => 1,
                'date_reported' => date('Y-m-d H:i'),
                'date_fixed' => null,
                'month' => date('m'),
                'admin_read' => 1,
                'user_read' => 0
            ]);

            if(empty($request->others)) {
                foreach($request->property as $key => $value) {
                    DefectiveAsset::create([
                        'report_id' => $report->id,
                        'property_id' => $request->property[$key]
                    ]);
                }
            }
            else {

                DefectiveAsset::create(['report_id' => $report->id, 'others' => $request->others]);

                foreach($request->property as $key => $value) {
                    DefectiveAsset::create([
                        'report_id' => $report->id,
                        'property_id' => $request->property[$key]
                    ]);
                }
            }
        }
        else {
            $report = Report::create([
                'userid' => Auth::user()->userid,
                'roomid' => $request->room,
                'description' => $request->description,
                'status' => 1,
                'date_reported' => date('Y-m-d H:i'),
                'date_fixed' => null,
                'month' => date('m'),
                'admin_read' => 1,
                'user_read' => 0
            ]);

            if(empty($request->others)) {
                foreach($request->property as $key => $value) {
                    DefectiveAsset::create([
                        'report_id' => $report->id,
                        'property_id' => $request->property[$key]
                    ]);
                }
            }
            else {

                DefectiveAsset::create(['report_id' => $report->id, 'others' => $request->others]);

                foreach($request->property as $key => $value) {
                    DefectiveAsset::create([
                        'report_id' => $report->id,
                        'property_id' => $request->property[$key]
                    ]);
                }
            }
        }

        return response()->json(['Error' => 0, 'Message'=> 'Report Sent Successfully']); 

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function update(Request $request) {

        date_default_timezone_set("Asia/Singapore"); 

        Report::where(['id' => $request->reportid])->update([
            'roomid' => $request->room,
            'description' => $request->description,
            'date_reported' => date('Y-m-d H:i'),
            'admin_read' => 1,
        ]);

        return response()->json(['Error' => 0, 'Message'=> 'Report Information Updated Successfully']); 

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function fixed(Request $request) {

        date_default_timezone_set("Asia/Singapore"); 

        $description = '';

        $smstoken = SMSToken::get();

        if(empty($request->specify)) {
            foreach(Issue::where(['id' => $request->description])->get() as $get) {
                $description = $get->description;
            }
        }
        else {
            $description = $request->specify;
        }

        foreach ($smstoken as $st) {
            $mobile_iden = $st->mobile_identity; // as you have copied from the url, explained above
            $mobile_token = $st->access_token; // as per your creation of token
        }
        
        $addresses = $request->contact_number; // mobile number to send text to

        $sms = 'ICT Monitoring System\n\nFrom: Administrator \nRoom: '.$request->room.'\n\n'.$description.'\n\nDefective Propertty: \n'.$request->asset.'\n\nStatus: RESOLVED';
        
        $ch = curl_init();
        foreach ($smstoken as $st) {
            curl_setopt($ch, CURLOPT_URL, $st->url);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"data\":{\"addresses\":[\"$addresses\"],\"message\":\"$sms\",\"target_device_iden\":\"$mobile_iden\"}}");

        $headers = [];
        $headers[] = 'Access-Token: '.$mobile_token;
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }

        Report::where(['id' => $request->reportid])->update([
            'status' => 0,
            'date_fixed' => date('Y-m-d H:i'),
            'user_read' => 1,
            'comment' => null
        ]);

        return response()->json(['Error' => 0, 'Message'=> 'Report has been Resolved Successfully']); 

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function notify(Request $request) {

        if($request->read == true) {

            if(Auth::user()->type == 1) {

                $reports = Report::get();

                foreach($reports as $rep) {

                    Report::where(['id' => $rep->id])->update(['admin_read' => 0]);

                }
            }

            if(Auth::user()->type == 2) {

                Report::where(['userid' => Auth::user()->userid])->update(['user_read' => 0]);

            }
        }
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function delete(Request $request) {

        Report::where(['id' => $request->reportid])->delete();
        DefectiveAsset::where(['report_id' => $request->reportid])->delete();

        return response()->json(['Error' => 0, 'Message'=> 'Report Deleted Successfully']); 

    }
}
