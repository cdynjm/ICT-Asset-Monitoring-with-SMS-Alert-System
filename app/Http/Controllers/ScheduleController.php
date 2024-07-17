<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Schedule;
use App\Models\Room;
use App\Models\Semester;
use App\Models\RoomSchedule;

class ScheduleController extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function create(Request $request) {

        date_default_timezone_set("Asia/Singapore"); 

        Schedule::create([
            'userid' => Auth::user()->userid,
            'roomid' => $request->room,
            'date_from' => date('Y-m-d')." ".$request->date_from,
            'date_to' => date('Y-m-d')." ".$request->date_to,
            'status' => 1
        ]);

        Room::where(['id' => $request->room])->update(['status' => 0]);

        return response()->json(['Error' => 0, 'Message'=> 'Class Schedule Set Successfully']); 

    }

    public function unscheduleClass() {

        if(Auth::user()->type == 2) {
            
            date_default_timezone_set("Asia/Singapore"); 

            $rooms = Room::where('status', '!=', null)->orderBy('room', 'ASC')->get();

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

            return view('unschedule-class', compact('rooms', 'schedule', 'count_sched', 'from_time', 'to_time', 'select_room'));
        }

        return abort(404);
    }
}
