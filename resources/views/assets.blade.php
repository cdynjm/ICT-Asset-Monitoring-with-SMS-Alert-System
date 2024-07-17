@extends('components.modals.asset-modal')
@extends('components.modals.edit.edit-asset-modal')

@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="row">
        @if(auth()->user()->type == 1)
        <div class="col-md-4">
            <input type="text" class="form-control mb-4" id="search-asset" placeholder="Search...">
        </div>
        @endif
        <div class="col-md-4">
            <select class="form-select mb-4" id="search-location">
                <option value="">Select Location</option>
                @foreach ($rooms as $ro)
                <option value="{{ $ro->id }}">{{ $ro->room }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Assets</h5>
                        </div>
                        @if(auth()->user()->type == 1)
                            <a href="#" class="btn bg-gradient-info btn-sm mb-0" id="register-asset" type="button">+&nbsp; Add</a>
                        @endif
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        @include('table.asset-table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection