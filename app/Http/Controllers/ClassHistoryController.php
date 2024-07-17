<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ResetSchedController;
use App\Models\Schedule;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class ClassHistoryController extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function read(){

        $obj = new ResetSchedController;

        $schedule = $obj->schedule();
        $room = Room::orderBy('room', 'ASC')->get();
        return view('class-history', compact('schedule', 'room'));

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function search(Request $request) {

       

        if(Auth::user()->type == 1) {
            if($request->room == "") {
                $schedule = Schedule::where('date_from', 'like', '%'.date('Y-m-d', strtotime($request->date)).'%')->orderBy('date_from', 'DESC')->get();
            }
            else {
                $schedule = Schedule::where('date_from', 'like', '%'.date('Y-m-d', strtotime($request->date)).'%')->where(['roomid' => $request->room])->orderBy('date_from', 'DESC')->get();
            }
        }
        if(Auth::user()->type == 2) {
            if($request->room == "") {
                $schedule = Schedule::where('date_from', 'like', '%'.date('Y-m-d', strtotime($request->date)).'%')->where(['userid' => Auth::user()->userid])->orderBy('date_from', 'DESC')->get();
            }
            else {
                $schedule = Schedule::where('date_from', 'like', '%'.date('Y-m-d', strtotime($request->date)).'%')->where(['userid' => Auth::user()->userid])->where(['roomid' => $request->room])->orderBy('date_from', 'DESC')->get();
            }
        }

        return view('table.class-logs-table', compact('schedule'));

    }
}
