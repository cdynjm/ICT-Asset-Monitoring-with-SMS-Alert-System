@extends('components.modals.issue-modal')
@extends('components.modals.edit.edit-issue-modal')

@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Issues/Problems</h5>
                        </div>
                        <a href="#" class="btn bg-gradient-info btn-sm mb-0" id="create-issue" type="button">+&nbsp; Add</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 table-hover">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name of Issue/Problem
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        No. of times Reported
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                               @php $cnt = 1; @endphp
                               
                               @foreach ($issues as $is)
                                    @php $times = 0; @endphp
                                    @foreach ($reports as $rep)
                                        @if($rep->description == $is->id)
                                            @php $times += 1; @endphp
                                        @endif
                                    @endforeach
                                    <tr>
                                        <td class="ps-4" description='{{ $is->description }}'>
                                            <p class="text-xs font-weight-bold mb-0"><span class="me-3"><i class="fas fa-flag"></i></span>{{ $is->description }}</p>
                                        </td>
                                        <td class="ps-4 text-center text-lg fw-bolder" issueid='{{ $is->id }}'>
                                            <p class="text-xs font-weight-bold mb-0">{{ $times }}</p>
                                        </td>
                                        <td class="text-center">
                                            <a href="#" class="mx-3" id="edit-issue" data-bs-toggle="tooltip">
                                                <i class="fas fa-user-edit text-secondary"></i>
                                            </a>
                                            <a href="#" class="" id="delete-issue" data-bs-toggle="tooltip">
                                                <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @php $cnt += 1; @endphp
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Other Issues</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 table-hover">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="90%">
                                        Name of Issue/Problem
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($reports as $rep)
                                @if($rep->description == "0")
                                    <tr>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0"><span class="me-3"><i class="fas fa-flag"></i></span>{{ $rep->specify }}</p>
                                        </td>
                                    </tr>
                                 @endif
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection