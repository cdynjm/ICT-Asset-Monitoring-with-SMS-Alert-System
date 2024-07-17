@extends('components.modals.semester-modal')
@extends('components.modals.edit.edit-semester-modal')

@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="row">
        <div class="col-md-6">
            <a href="#" class="btn bg-gradient-info btn-sm mb-0 mb-4" id="create-semester" type="button">+&nbsp; Add</a>
        </div>
        @foreach ($semester as $sem)
        <div class="col-12">
            <div class="card mb-2">
                <div class="card-body px-0 pt-0 pb-0">
                    <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <tr>
                            <td semester_id="{{ $sem->id }}" hidden></td>
                            <td from_year="{{ $sem->from_year }}" hidden></td>
                            <td to_year="{{ $sem->to_year }}" hidden></td>
                            <td semester="{{ $sem->semester }}" hidden></td>
                            <td>
                                <div class="m-4">
                                    <form action="{{ route('room-schedule') }}" method="GET">
                                        <input type="hidden" class="form-control" name="semester_id" value="{{ $sem->id }}" readonly>
                                        <button href="#" class="mb-0 bg-transparent border-0 text-secondary">
                                            <p class="text-md mb-0"><span><i class="fas fa-graduation-cap me-2"></i></span> Academic Year: {{ $sem->from_year }}-{{ $sem->to_year }} |
                                            @if($sem->semester == 1) 
                                            <span class="text-sm fw-bolder">1st Semester</span>
                                            @endif
                                            @if($sem->semester == 2) 
                                            <span class="text-sm fw-bolder">2nd Semester</span>
                                            @endif
                                            @if($sem->semester == 3) 
                                            <span class="text-sm fw-bolder">Summer Class</span>
                                            @endif
                                            </p>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td>
                                <a href="#" class="mx-3" id="edit-semester" data-bs-toggle="tooltip">
                                    <i class="fas fa-user-edit text-secondary"></i>
                                </a>
                                <a href="#" class="" id="delete-semester" data-bs-toggle="tooltip">
                                    <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                </a>
                            </td>
                        </tr>
                    </table>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection