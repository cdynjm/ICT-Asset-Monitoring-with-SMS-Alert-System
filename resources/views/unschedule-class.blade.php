@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="row">
        
    <div class="col-lg-12 mb-lg-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            
              <div class="d-flex flex-column h-100">
                <form id="set-schedule" action="">
                @csrf
                    <h6>Class Time Schedule</h6>
                    @if($count_sched > 0)
                      <div class="badge badge-sm bg-gradient-success">On Class</div><br>
                    @endif
                    <label for="">Date</label>

                    @php  date_default_timezone_set("Asia/Singapore");   @endphp
                    <input type="" class="form-control" value="{{ date('F d, Y') }}" readonly/>

                   
                      <label for="" class="mt-2">From</label>
                      <input type="time" class="form-control" name="date_from" value="{{ $from_time }}" required/>

                      <label for="" class="mt-2">To</label>
                      <input type="time" class="form-control" name="date_to" value="{{ $to_time }}" required/>

                      <label for="" class="mt-2">Room</label>
                      <select name="room" class="form-select" id="" required>
                          <option value="">Select Room</option>
                        @foreach ($rooms as $ro)
                          <option value={{ $ro->id }}>{{ $ro->room }}</option>
                        @endforeach
                      </select>
                      
                      <button class="btn bg-gradient-info mt-4">Attend Class</button>
                   
                </form>
              </div>
          </div>
        </div>
      </div>
    </div>
      
    </div>
</div>
@endsection