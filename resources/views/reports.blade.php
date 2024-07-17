@extends('components.modals.report-modal')
@extends('components.modals.comment-modal')
@extends('components.modals.edit.edit-report-modal')
@extends('components.modals.print-modal')

@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="row">
       
        <div class="col-md-4">
        @if(Auth::user()->type == 1)
            <a class="btn bg-gradient-info btn-sm mb-4 ms-1" href="{{ url('issues') }}">List of Issues</a>
        @endif
        </div>
       
        <div class="col-md-4"></div>
        <div class="col-md-4 text-end">
            <select name="" id="search-issue" class="form-select me-1 mb-4">
                <option value="">Select...</option>
                @foreach ($issues as $is)
                    <option value="{{ $is->id }}">{{ $is->description }}</option>
                @endforeach
                <option value="0">Others</option>
            </select>
        </div>
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <span class="badge badge-sm bg-gradient-danger">Pending</span>
                        </div>
                        @if(Auth::user()->type == 2)
                            <a href="#" class="btn bg-gradient-info btn-sm mb-0" id="add-report" type="button">+&nbsp; Report</a>
                        @endif
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                         @include('table.pending-table')
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <span class="badge badge-sm bg-gradient-success">Resolved</span>
                        </div>
                        @if(Auth::user()->type == 1)
                            <a href="#" class="btn bg-gradient-info btn-sm mb-0 mb-4" id="print-report"><i class="fas fa-print text-sm me-2"></i> Print</a>
                        @endif
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        @include('table.resolved-table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection