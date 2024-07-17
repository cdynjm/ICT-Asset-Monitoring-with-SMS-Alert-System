@php
    date_default_timezone_set("Asia/Singapore"); 
@endphp

<div class="col-12">
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex flex-row justify-content-between">
                <div>
                    <h5 class="mb-0 text-sm">{{ $ro->room }}</h5>
                </div>
            </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
            <table class="table align-items-center mb-0 table-hover">
                <thead>
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Monday
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Tuesday
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Wednesday
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Thursday
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Friday
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Saturday
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Action
                        </th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($room_schedule as $rs)
                    <tr>
                    @if($ro->id == $rs->room_id)

                        <td schedule_id="{{ $rs->id }}" hidden></td>
                        <td room="{{ $rs->room_id }}" hidden></td>
                        <td instructor="{{ $rs->instructor_id }}" hidden></td>
                        <td from="{{ $rs->date_from }}" hidden></td>
                        <td to="{{ $rs->date_to }}" hidden></td>

                        <td mon="{{ $rs->mon }}" hidden></td>
                        <td tue="{{ $rs->tue }}" hidden></td>
                        <td wed="{{ $rs->wed }}" hidden></td>
                        <td thu="{{ $rs->thu }}" hidden></td>
                        <td fri="{{ $rs->fri }}" hidden></td>
                        <td sat="{{ $rs->sat }}" hidden></td>

                        @if($rs->mon == 1)
                            <td class="text-center border" @foreach($schedule as $sched) @if($sched->roomid == $ro->id && $sched->status == 1 && $sched->userid == $rs->instructor_id && $rs->mon == date('w')) style="background: rgb(205, 247, 194)" @endif @endforeach>
                                <p class="text-xs font-weight-bold mb-0 ms-2">{{ $rs->Instructor->name }}</p>
                                <p class="text-xs font-weight-bold mb-0 ms-2">{{ date('h:i A', strtotime($rs->date_from)) }} - {{ date('h:i A', strtotime($rs->date_to)) }}</p>
                            </td>
                        @else
                            <td></td>
                        @endif

                        @if($rs->tue == 2)
                            <td class="text-center border" @foreach($schedule as $sched) @if($sched->roomid == $ro->id && $sched->status == 1 && $sched->userid == $rs->instructor_id && $rs->tue == date('w')) style="background: rgb(205, 247, 194)" @endif @endforeach>
                                <p class="text-xs font-weight-bold mb-0 ms-2">{{ $rs->Instructor->name }}</p>
                                <p class="text-xs font-weight-bold mb-0 ms-2">{{ date('h:i A', strtotime($rs->date_from)) }} - {{ date('h:i A', strtotime($rs->date_to)) }}</p>
                            </td>
                        @else
                            <td></td>
                        @endif

                        @if($rs->wed == 3)
                            <td class="text-center border" @foreach($schedule as $sched) @if($sched->roomid == $ro->id && $sched->status == 1 && $sched->userid == $rs->instructor_id && $rs->wed == date('w')) style="background: rgb(205, 247, 194)" @endif @endforeach>
                                <p class="text-xs font-weight-bold mb-0 ms-2">{{ $rs->Instructor->name }}</p>
                                <p class="text-xs font-weight-bold mb-0 ms-2">{{ date('h:i A', strtotime($rs->date_from)) }} - {{ date('h:i A', strtotime($rs->date_to)) }}</p>
                            </td>
                        @else
                            <td></td>
                        @endif

                        @if($rs->thu == 4)
                            <td class="text-center border" @foreach($schedule as $sched) @if($sched->roomid == $ro->id && $sched->status == 1 && $sched->userid == $rs->instructor_id && $rs->thu == date('w')) style="background: rgb(205, 247, 194)" @endif @endforeach>
                                <p class="text-xs font-weight-bold mb-0 ms-2">{{ $rs->Instructor->name }}</p>
                                <p class="text-xs font-weight-bold mb-0 ms-2">{{ date('h:i A', strtotime($rs->date_from)) }} - {{ date('h:i A', strtotime($rs->date_to)) }}</p>
                            </td>
                        @else
                            <td></td>
                        @endif

                        @if($rs->fri == 5)
                            <td class="text-center border" @foreach($schedule as $sched) @if($sched->roomid == $ro->id && $sched->status == 1 && $sched->userid == $rs->instructor_id && $rs->fri == date('w')) style="background: rgb(205, 247, 194)" @endif @endforeach>
                                <p class="text-xs font-weight-bold mb-0 ms-2">{{ $rs->Instructor->name }}</p>
                                <p class="text-xs font-weight-bold mb-0 ms-2">{{ date('h:i A', strtotime($rs->date_from)) }} - {{ date('h:i A', strtotime($rs->date_to)) }}</p>
                            </td>
                        @else
                            <td></td>
                        @endif

                        @if($rs->sat == 6)
                            <td class="text-center border" @foreach($schedule as $sched) @if($sched->roomid == $ro->id && $sched->status == 1 && $sched->userid == $rs->instructor_id && $rs->sat == date('w')) style="background: rgb(205, 247, 194)" @endif @endforeach>
                                <p class="text-xs font-weight-bold mb-0 ms-2">{{ $rs->Instructor->name }}</p>
                                <p class="text-xs font-weight-bold mb-0 ms-2">{{ date('h:i A', strtotime($rs->date_from)) }} - {{ date('h:i A', strtotime($rs->date_to)) }}</p>
                            </td>
                        @else
                            <td></td>
                        @endif
                        <td class="text-center">
                            <a href="#" class="mx-3" id="edit-room-schedule" data-bs-toggle="tooltip">
                                <i class="fas fa-user-edit text-secondary"></i>
                            </a>
                            <a href="#" class="" id="delete-room-schedule" data-bs-toggle="tooltip">
                                <i class="cursor-pointer fas fa-trash text-secondary"></i>
                            </a>
                        </td>
                    @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>