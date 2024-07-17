<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ResetSchedController;
use App\Models\Room;
use App\Models\User;
use App\Models\Asset;
use App\Models\Instructor;
use App\Models\RoomSchedule;
use App\Models\Semester;
use App\Models\Schedule;
use App\Models\Report;

class HomeController extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function home()
    {
        date_default_timezone_set("Asia/Singapore"); 

        $count_instructors = Instructor::count();
        $count_assets = Asset::where(['status' => 1])->count();

        if(Auth::user()->type == 1) {
            $count_reports = Report::where(['status' => 1])->count();
        }

        if(Auth::user()->type == 2) {
            $count_reports = Report::where(['userid' => Auth::user()->userid])->where(['status' => 1])->count();
        }

        $rooms = Room::where(['status' => 1])->orderBy('room', 'ASC')->get();

        $obj = new ResetSchedController;
        $obj->reset();

        $schedule = $obj->schedule();

        $count_sched = Schedule::where(['userid' => Auth::user()->userid])->where(['status' => 1])->count();
        $count_rooms = Room::where(['status' => 0])->count();

        $from_time = '';
        $to_time = '';
        $select_room = '';
        $semester_id = '';

        foreach(Semester::orderBy('created_at', 'ASC')->get() as $get) {
            $semester_id = $get->id;
        }

        foreach (RoomSchedule::where(['instructor_id' => Auth::user()->userid])->where(['semester_id' => $semester_id])->get() as $get) {

            if(date('w') == $get->mon || date('w') == $get->tue || date('w') == $get->wed || date('w') == $get->thu || date('w') == $get->fri ||date('w') == $get->sat) {
                if(date('H:i') >= $get->date_from && date('H:i') <= $get->date_to) {

                    $from_time = $get->date_from;
                    $to_time = $get->date_to;
                    $select_room = $get->room_id;

                }
            }
        }

        return view('dashboard', compact('count_instructors', 'count_assets', 'count_rooms', 'rooms', 'schedule', 'count_sched', 'count_reports', 'from_time', 'to_time', 'select_room'));
    }
}
