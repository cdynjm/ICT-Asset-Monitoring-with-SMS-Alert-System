<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use App\Models\RoomSchedule;
use App\Models\User;
use App\Models\Instructor;
use App\Models\Schedule;
use App\Models\Semester;
use App\Http\Controllers\ResetSchedController;

class RoomController extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function read(Request $request) {

        $obj = new ResetSchedController;
        $obj->reset();

        $room = Room::orderBy('room', 'ASC')->get();
        $schedule = Schedule::where(['status' => 1])->get();

        return view('rooms', compact('room', 'schedule'));

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function semester() {

        if(Auth::user()->type == 1) {
            $semester = Semester::orderBy('created_at', 'DESC')->get();
            return view('semester', compact('semester'));
        }

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createSemester(Request $request) {

        Semester::create([
            'from_year' => $request->from,
            'to_year' => $request->to,
            'semester' => $request->semester
        ]);

        return response()->json(['Error' => 0, 'Message'=> 'New Semester Created Successfully']); 
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateSemester(Request $request) {

        Semester::where(['id' => $request->semester_id])->update([
            'from_year' => $request->from,
            'to_year' => $request->to,
            'semester' => $request->semester
        ]);

        return response()->json(['Error' => 0, 'Message'=> 'Semester Updated Successfully']); 
    }
     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function deleteSemester(Request $request) {

        Semester::where(['id' => $request->semester_id])->delete();
        RoomSchedule::where(['semester_id' => $request->semester_id])->delete();

        return response()->json(['Error' => 0, 'Message'=> 'Semester Deleted Successfully']); 
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function createRoomSchedule(Request $request) {

        RoomSchedule::create([
            'semester_id' => $request->semester_id,
            'room_id' => $request->room,
            'instructor_id' => $request->instructor,
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
            'mon' => $request->mon,
            'tue' => $request->tue,
            'wed' => $request->wed,
            'thu' => $request->thu,
            'fri' => $request->fri,
            'sat' => $request->sat
        ]);

        return response()->json(['Error' => 0, 'Message'=> 'Room Schedule Created Successfully']); 

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function updateRoomSchedule(Request $request) {

        //* Handle an incoming Contidtion.
        if(!empty($request->mon)) {
            RoomSchedule::where(['id' => $request->schedule_id])->update(['mon' => $request->mon]);
        }
        else {
            RoomSchedule::where(['id' => $request->schedule_id])->update(['mon' => null]);
        }
        
        //* Handle an incoming Contidtion.
        if(!empty($request->tue)) {
            RoomSchedule::where(['id' => $request->schedule_id])->update(['tue' => $request->tue]);
        }
        else {
            RoomSchedule::where(['id' => $request->schedule_id])->update(['tue' => null]);
        }

        //* Handle an incoming Contidtion.
        if(!empty($request->wed)) {
            RoomSchedule::where(['id' => $request->schedule_id])->update(['wed' => $request->wed]);
        }
        else {
            RoomSchedule::where(['id' => $request->schedule_id])->update(['wed' => null]);
        }

        //* Handle an incoming Contidtion.
        if(!empty($request->thu)) {
            RoomSchedule::where(['id' => $request->schedule_id])->update(['thu' => $request->thu]);
        }
        else {
            RoomSchedule::where(['id' => $request->schedule_id])->update(['thu' => null]);
        }

        //* Handle an incoming Contidtion.
        if(!empty($request->fri)) {
            RoomSchedule::where(['id' => $request->schedule_id])->update(['fri' => $request->fri]);
        }
        else {
            RoomSchedule::where(['id' => $request->schedule_id])->update(['fri' => null]);
        }

        //* Handle an incoming Contidtion.
        if(!empty($request->sat)) {
            RoomSchedule::where(['id' => $request->schedule_id])->update(['sat' => $request->sat]);
        }
        else {
            RoomSchedule::where(['id' => $request->schedule_id])->update(['sat' => null]);
        }

        RoomSchedule::where(['id' => $request->schedule_id])->update([
            'room_id' => $request->room,
            'instructor_id' => $request->instructor,
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
        ]);

        return response()->json(['Error' => 0, 'Message'=> 'Room Schedule Updated Successfully']); 

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function selectRoom(Request $request) {

        $request->session()->put('roomid', $request->room);
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function deleteRoomSchedule(Request $request) {

        RoomSchedule::where(['id' => $request->schedule_id])->delete();

        return response()->json(['Error' => 0, 'Message'=> 'Room Schedule Deleted Successfully']); 

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function roomSchedule(Request $request) {

        if(Auth::user()->type == 1) {
            $semester_id = $request->semester_id;
            $room = Room::orderBy('room', 'ASC')->get();
            $instructor = Instructor::orderBy('name', 'ASC')->get();
            $schedule = Schedule::get();
            $room_schedule = RoomSchedule::where(['semester_id' => $semester_id])->orderBy('date_from', 'ASC')->get();
            return view('room-schedules', compact('semester_id', 'room', 'instructor', 'room_schedule', 'schedule'));
        }

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function create(Request $request) {

        Room::create([
            'room' => $request->room,
            'status' => 1
        ]);

        return response()->json(['Error' => 0, 'Message'=> 'Room Added Successfully']); 

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function update(Request $request) {

        Room::where(['id' => $request->roomid])->update([
            'room' => $request->room,
        ]);

        return response()->json(['Error' => 0, 'Message'=> 'Room Updated Successfully']); 

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function delete(Request $request) {

        Room::where(['id' => $request->roomid])->delete();

        return response()->json(['Error' => 0, 'Message'=> 'Room Deleted Successfully']); 

    }
}
