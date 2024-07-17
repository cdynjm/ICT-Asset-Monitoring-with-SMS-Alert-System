@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="row">
    <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-2">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            @foreach ($asset as $as)
                                <span><img src="{{ asset("storage/photo/".$as->photo) }}" alt="" id="view-photo" style=" border-radius: 5px; width: 70px; height: auto;"></span>
                                <span class="mb-0 text-sm">{{ $as->property}} ({{ $as->Room->room }})</span>
                            @endforeach
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
                            <h5 class="mb-0 text-sm">Asset Report History</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 table-hover" id="search-asset-result">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="2%">
                                        No.
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Report Person
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Room
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                       Description
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Date Reported
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Date Fixed
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Comment
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $cnt = 1; @endphp
                            @foreach ($asset as $as)
                                @foreach ($defectiveAsset as $da)
                                    @if($da->property_id == $as->id)
                                        @foreach ($reports as $rep)
                                            @if($rep->id == $da->report_id)
                                                <tr>
                                                    <td class="ps-4">
                                                        <p class="text-xs font-weight-bold mb-0">{{ $cnt }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p class="text-xs font-weight-bold mb-0 text-wrap">{{ $rep->User->Instructor->name }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p class="text-xs font-weight-bold mb-0 text-wrap">{{ $rep->Room->room }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p class="text-xs font-weight-bold mb-0 text-wrap">
                                                        @if($rep->description == "0")
                                                            {{ $rep->specify }}
                                                        @else
                                                        {{ $rep->Issue->description }}
                                                        @endif
                                                        </p>
                                                    </td>
                                                    <td class="text-center" >
                                                        <p class="text-xs font-weight-bold mb-0">{{ date('M d, Y h:i A', strtotime($rep->date_reported)) }}</p>
                                                    </td>

                                                    <td class="text-center" >
                                                        @if($rep->date_fixed != null)
                                                            <p class="text-xs font-weight-bold mb-0">{{ date('M d, Y h:i A', strtotime($rep->date_fixed)) }}</p>
                                                        @endif
                                                    </td>
                                                    <td class="text-center" >
                                                        <p class="text-xs font-weight-bold mb-0">{{ $rep->comment }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                    @if($rep->status == 0)
                                                        <p class="text-xs font-weight-bold text-success mb-0 text-wrap">Resolved</p>
                                                    @endif
                                                    @if($rep->status == 1)
                                                        <p class="text-xs font-weight-bold text-danger mb-0 text-wrap">Pending</p>
                                                    @endif
                                                    </td>
                                                </tr>
                                                @php $cnt += 1; @endphp
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
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