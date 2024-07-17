<table class="table align-items-center mb-0 table-hover" id="pending-result">
    <thead>
        <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="5%">
                No.
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Report Person
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Contact Number
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Room
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Report Description
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Defective Asset
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Date Reported
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Comment
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Action
            </th>
        </tr>
    </thead>
    <tbody>
    @php $cnt = 1; @endphp
        @foreach($reports as $rep)
            @if($rep->status == 1)
                <tr>
                    <td class="ps-4" reportid='{{ $rep->id }}'>
                        <p class="text-xs font-weight-bold mb-0">{{ $cnt }}</p>
                    </td>
                    <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0 text-wrap">{{ $rep->User->Instructor->name }}</p>
                    </td>
                    <td class="text-center" contact_number='{{ $rep->User->Instructor->contact_number }}'>
                        <p class="text-xs font-weight-bold mb-0">{{ $rep->User->Instructor->contact_number }}</p>
                    </td>
                    <td class="text-center" room='{{ $rep->Room->room }}'>
                        <p class="text-xs font-weight-bold mb-0">{{ $rep->Room->room }}</p>
                    </td>
                    
                    <td class="text-center" description='{{ $rep->description }}'>
                        <p class="text-xs font-weight-bold mb-0 text-wrap">
                        @if($rep->description == "0")
                            {{ $rep->specify }}
                        @else
                        {{ $rep->Issue->description }}
                        @endif
                    </p>
                    </td>
                    <td class="text-center">
                        @php
                            $asset = '';
                            $counter = 1;
                        @endphp
                        @foreach ($defective_asset as $da)
                            @if($da->report_id == $rep->id)
                                @if(!empty($da->property_id))
                                    <p class="text-xs font-weight-bold mb-0 text-start mb-2">{{ $da->RegisteredAssets->property }}</p>
                                    @php
                                        $asset .= $da->RegisteredAssets->property.'\n'
                                    @endphp
                                    
                                @else
                                    <p class="text-xs font-weight-bold mb-0 text-start mb-2">{{ $da->others }}</p>
                                    @php
                                        $asset .= $da->others.'\n'
                                    @endphp
                                @endif
                            @endif
                        @endforeach
                        
                    </td>
                    <td asset="{{ $asset }}" hidden></td>
                    <td class="text-center" specify='{{ $rep->specify }}' hidden></td>
                    <td class="text-center" >
                        <p class="text-xs font-weight-bold mb-0">{{ date('M d, Y h:i A', strtotime($rep->date_reported)) }}</p>
                    </td>
                    
                    <td class="text-center text-danger">
                        <p class="text-xs font-weight-bold mb-0">{{ $rep->comment }}</p>
                    </td>

                    <td class="text-center">
                        @if(Auth::user()->type == 1)
                        <a href="#" class="me-3" id="fixed-report" data-bs-toggle="tooltip">
                            <i class="fas fa-check text-secondary"></i>
                        </a>
                        <a href="#" class="me-3" id="add-comment" data-bs-toggle="tooltip">
                            <i class="fas fa-comment-dots text-secondary"></i>
                        </a>
                        @endif
                          <!--
                        <a href="#" class="" id="delete-report" data-bs-toggle="tooltip">
                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                        </a>
                            -->
                    </td>
                </tr>
                @php $cnt += 1; @endphp
            @endif
        @endforeach
    </tbody>
</table>