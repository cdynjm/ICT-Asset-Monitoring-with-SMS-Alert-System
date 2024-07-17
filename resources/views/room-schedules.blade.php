@extends('components.modals.room-schedule-modal')
@extends('components.modals.edit.edit-room-schedule-modal')

@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="row">
        <div class="col-md-8">
            <a href="#" class="btn bg-gradient-info btn-sm mb-0 mb-4" id="create-room-schedule" type="button">+&nbsp; Add</a>
        </div>
        <div class="col-md-4">
            <select name="room" id="select-room-display" class="form-select" required>
                <option value="">Select Room...</option>
                <option value="0" @if(Session::get('roomid') == 0) selected @endif>All Rooms</option>
                @foreach ($room as $ro)
                    <option value="{{ $ro->id }}" @if(Session::get('roomid') == $ro->id) selected @endif>{{ $ro->room }}</option>
                @endforeach
            </select>
        </div>
        @foreach ($room as $ro)
            @if($ro->id == Session::get('roomid'))
                @include('table.room-schedule-table')
            @endif
        @endforeach

        @if(Session::get('roomid') == 0)
            @foreach ($room as $ro)
                @include('table.room-schedule-table')
            @endforeach
        @endif

    </div>
</div>
@endsection