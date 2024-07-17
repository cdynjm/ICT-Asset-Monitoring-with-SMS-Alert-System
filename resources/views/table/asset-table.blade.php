<table class="table align-items-center mb-0 table-hover" id="search-asset-result">
    <thead>
        <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="2%">
                No.
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Photo
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Property Name
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Model Number
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Serial Number
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Location
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Status
            </th>
            @if(auth()->user()->type == 1)
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Person In Charge
            </th>
            @endif
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Action
            </th>
        </tr>
    </thead>
    <tbody>
        @php $cnt = 1; @endphp
        @foreach ($asset as $as)

        <!-- The Modal -->
        <div class="modal fade" id="view-photo-modal-{{ $as->id }}" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Asset Photo</h5>
                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">  
                        <img src="{{ asset("storage/photo/".$as->photo) }}" alt="" id="view-photo" class="rounded" style="width: 500px; height: auto;">
                    </div>
                </div>
            </div>
        </div> 
            <tr>
                <td class="ps-4" assetid='{{ $as->id }}'>
                    <p class="text-xs font-weight-bold mb-0">{{ $cnt }}</p>
                </td>
                <td class="text-center">
                    <button class="btn p-0 mt-1" id="view-photo">
                        <img src="{{ asset("storage/photo/".$as->photo) }}" alt="" id="view-photo" style=" border-radius: 5px; width: 50px; height: auto;">
                    </button>
                </td>
                <td class="text-center" property='{{ $as->property }}'>
                    <p class="text-xs font-weight-bold mb-0 text-wrap">{{ $as->property }}</p>
                </td>
                <td class="text-center" model_number='{{ $as->model_number }}'>
                    <p class="text-xs font-weight-bold mb-0 text-wrap">{{ $as->model_number }}</p>
                </td>
                <td class="text-center" serial_number='{{ $as->serial_number }}'>
                    <p class="text-xs font-weight-bold mb-0 text-wrap">{{ $as->serial_number }}</p>
                </td>
                <td class="text-center" location='{{ $as->room }}'>
                    <p class="text-xs font-weight-bold mb-0 text-wrap">{{ $as->Room->room }}</p>
                </td>
                <td class="text-center" status='{{ $as->status }}'>
                    @if($as->status == 1)
                        <p class="text-xs font-weight-bold text-success mb-0 text-wrap">Functional</p>
                    @endif
                    @if($as->status == 2)
                        <p class="text-xs font-weight-bold text-secondary mb-0 text-wrap">Under Maintenance</p>
                    @endif
                    @if($as->status == 3)
                        <p class="text-xs font-weight-bold text-info mb-0 text-wrap">Returned to Supply Office</p>
                    @endif
                    @if($as->status == 4)
                        <p class="text-xs font-weight-bold text-danger mb-0 text-wrap">Not Functional</p>
                    @endif
                </td>
                @if(auth()->user()->type == 1)
                <td class="text-center" person='{{ $as->person_in_charge }}'>
                    <p class="text-xs font-weight-bold mb-0">{{ $as->Instructor->name }}</p>
                </td>
                @endif
                <td class="text-center">
                    <form action="{{ route('view-asset-history') }}" method="GET" class="d-inline">
                        @csrf
                        <input type="hidden" value="{{ $as->id }}" name="id">
                        <button style="border: none; background: transparent"><i class="fas fa-eye text-secondary"></i></button>
                    </form>
                    @if(auth()->user()->type == 1)
                    <a href="#" class="mx-3" id="edit-registered-asset" data-bs-toggle="tooltip">
                        <i class="fas fa-user-edit text-secondary"></i>
                    </a>
                    <!--
                    <a href="#" class="" id="delete-registered-asset" data-bs-toggle="tooltip">
                        <i class="cursor-pointer fas fa-trash text-secondary"></i>
                    </a>
                    -->
                    @endif
                </td>
               
            </tr>

            @php $cnt += 1; @endphp
        @endforeach
    </tbody>
</table>