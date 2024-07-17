<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('storage/logo/ccsit-logo.jpg') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('storage/css/print-page.css') }}" media="print">
    <title>
    ICT Monitoring System
    </title>
</head>

<style>
    * {
        font-family: sans-serif;
        font-size: 12px;
    }
    button {
        font-family: inherit;
        font-size: 11px;
        background-color: blue;
        color: white;
        padding: 0.8em 1.2em;
        border: none;
        border-radius: 10px;
        box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
        transition: all 0.3s;
        margin-bottom: 20px;
        cursor: pointer;
    }
    table {
        width: 100%;
        height: auto;
        border: 1px solid lightgray;
        border-collapse: collapse;
    }
    table tr th {
        border: 1px solid lightgray;
        padding: 5px;
    }
    table tr td {
        padding: 10px;
        border: 1px solid lightgray;
    }
</style>

<body>
    <div id="print-btn">
        <button onclick="window.location.href='{{ route('reports') }}'"><i class="fa-solid fa-left-long"></i> Back</button>
        <button class="btn btn-primary" onclick="window.print();"><i class="fa-solid fa-print"></i> Print | PDF</button>
    </div>

    <table class="table align-items-center mb-0 table-hover" id="resolved-result">
    <thead>
        <tr>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="5%">
                No.
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Report Person
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
                Date Resolved
            </th>
        </tr>
    </thead>
    <tbody>
    @php $cnt = 1; @endphp
        @foreach($reports as $rep)
            @if($rep->status == 0)
                <tr>
                    <td class="ps-4" reportid='{{ $rep->id }}'>
                        <p class="text-xs font-weight-bold mb-0">{{ $cnt }}</p>
                    </td>
                    <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0 text-wrap">{{ $rep->User->Instructor->name }}</p>
                    </td>
                    <td class="text-center" room='{{ $rep->Room->id }}'>
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
                    <td class="text-center" >
                        <p class="text-xs font-weight-bold mb-0">{{ date('M d, Y h:i A', strtotime($rep->date_reported)) }}</p>
                    </td>

                    <td class="text-center" >
                        <p class="text-xs font-weight-bold mb-0">{{ date('M d, Y h:i A', strtotime($rep->date_fixed)) }}</p>
                    </td>
                </tr>
                @php $cnt += 1; @endphp
            @endif
        @endforeach
    </tbody>
</table>

</body>
</html>