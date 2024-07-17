<!-- The Modal -->
<div class="modal fade" id="editroomscheduleModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Room Schedule</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='edit-processing-room-schedule'></div>
                    <form id="update-room-schedule" action="">
                        @csrf

                            <p class="text-sm">Schedule Information</p>

                            <input type="hidden" class="form-control" name="schedule_id" id="edit-schedule-id">

                            <label for="" class="mt-2">Room/Laboratory Name</label>
                            <select name="room" id="edit-room" class="form-select" required>
                                <option value="">Select Room...</option>
                                @foreach ($room as $ro)
                                    <option value="{{ $ro->id }}">{{ $ro->room }}</option>
                                @endforeach
                            </select>

                            <label for="" class="mt-2">Instructor</label>
                            <select name="instructor" id="edit-instructor" class="form-select" required>
                                <option value="">Select Instructor...</option>
                                @foreach ($instructor as $ins)
                                    <option value="{{ $ins->id }}">{{ $ins->name }}</option>
                                @endforeach
                            </select>

                            <label for="" class="mt-2">Time (from) </label>
                            <input type="time" name="date_from" id="edit-from" class="form-control" required>

                            <label for="" class="mt-2">Time (to) </label>
                            <input type="time" name="date_to" id="edit-to" class="form-control" required>

                            <div class="form-check form-switch ms-auto mt-2">
                                <input type="checkbox" class="form-check-input mt-1" id="edit-mon" name="mon" value="1">
                                <span class="ms-2 fw-bold text-sm">Monday</span>
                            </div>

                            <div class="form-check form-switch ms-auto mt-2">
                                <input type="checkbox" class="form-check-input mt-1" id="edit-tue" name="tue" value="2">
                                <span class="ms-2 fw-bold text-sm">Tuesday</span>
                            </div>

                            <div class="form-check form-switch ms-auto mt-2">
                                <input type="checkbox" class="form-check-input mt-1" id="edit-wed" name="wed" value="3">
                                <span class="ms-2 fw-bold text-sm">Wednesday</span>
                            </div>

                            <div class="form-check form-switch ms-auto mt-2">
                                <input type="checkbox" class="form-check-input mt-1" id="edit-thu" name="thu" value="4">
                                <span class="ms-2 fw-bold text-sm">Thursday</span>
                            </div>

                            <div class="form-check form-switch ms-auto mt-2">
                                <input type="checkbox" class="form-check-input mt-1" id="edit-fri" name="fri" value="5">
                                <span class="ms-2 fw-bold text-sm">Friday</span>
                            </div>

                            <div class="form-check form-switch ms-auto mt-2">
                                <input type="checkbox" class="form-check-input mt-1" id="edit-sat" name="sat" value="6">
                                <span class="ms-2 fw-bold text-sm">Saturday</span>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-info mt-4"> Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 