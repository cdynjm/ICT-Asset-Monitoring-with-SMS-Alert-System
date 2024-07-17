@extends('layouts.user_type.auth')

@section('content')

@php $cnt = 1; date_default_timezone_set("Asia/Singapore");  @endphp

<div>
    <div class="row">
        
    <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="flex-row justify-content-between">
                        <div class="row">
                            <div class="col-md-4">
                                <h6 class="mb-0">Date</h6>
                                <span><input type="date" value="{{ date('Y-m-d') }}" id="search-date" class="form-control mb-3"></span>
                            </div>
                            <div class="col-md-4">
                                <h6 class="mb-0">Room</h6> 
                                <select name="room" id="search-room" class="form-select mb-3" required>
                                    <option value="">All Rooms</option>
                                    @foreach ($room as $ro)
                                        <option value="{{ $ro->id }}">{{ $ro->room }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <button class="btn bg-gradient-info btn-sm mb-0 mt-4 mb-2" id="search-class-logs">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    
                </div>
            </div>
        </div>
    
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Class Logs</h5>
                        </div>
                        
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        @include('table.class-logs-table')
                    </div>
                </div>
            </div>
        </div>
    
</div>
@endsection