<!-- The Modal -->
<div class="modal fade" id="createprintModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Print Information</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">  
                    <form action="{{ route('print') }}" method="GET">
                        @csrf

                            <label for="" class="">From Month</label>
                            <select name="from" class="form-select" id="" required>
                                <option value="">Select</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                            
                            <label for="" class="mt-2">To Month</label>
                            <select name="to" class="form-select me-1" required>
                                <option value="">Select...</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>

                            <label for="" class="mt-2">Year</label>
                            <select name="year" class="form-select me-1" required>
                                <option value="">Select...</option>
                                @php $count  = range(2020, 2040); @endphp
                                @foreach($count as $cnt)
                                    <option value="{{ $cnt }}">{{ $cnt }}</option>
                                @endforeach
                            </select>
                           
                            <label for="" class="">Room/Office/Laboratory</label>
                            <select name="room" class="form-select" id="" required>
                                <option value="all">All Rooms</option>
                                @foreach ($rooms as $ro)
                                <option value="{{ $ro->id }}">{{ $ro->room }}</option>
                                @endforeach
                            </select>
                            
                            <label for="" class="mt-2">Issues</label>
                            <select name="issue" class="form-select me-1" required>
                                <option value="all">All Issues</option>
                                @foreach ($issues as $is)
                                    <option value="{{ $is->id }}">{{ $is->description }}</option>
                                @endforeach
                                <option value="0">Others</option>
                            </select>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-info mt-4"> Print</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 