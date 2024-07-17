<!-- The Modal -->
<div class="modal fade" id="editreportModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Report</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='edit-processing-report'></div>
                    <form id="update-report" action="">
                        @csrf

                            <p class="text-sm">Report Information</p>

                            <label for="" class="mt-2">Description</label>
                            <select name="description" id="edit-select-issue" class="form-select me-1" required>
                                <option value="">Select...</option>
                                @foreach ($issues as $is)
                                    <option value="{{ $is->id }}">{{ $is->description }}</option>
                                @endforeach
                                <option value="0">Others</option>
                            </select>

                            <div id="edit-specify" style="display: none;">
                                <label for="" class="">Specify</label>
                                <input type="text" class="form-control" name="specify">
                            </div>

                            <label for="" class="mt-2">Select Defective Property</label>
                            @foreach($asset as $as)
                            <div class="form-check form-switch ms-auto mt-2">
                                <input type="checkbox" class="form-check-input mt-1" name="property[{{ $as->id }}]" id="edit-property-check-{{ $as->id }}" value="{{ $as->id }}">
                                <span class="ms-2 fw-bold text-sm">{{ $as->property }}</span>
                            </div>
                            @endforeach

                            <div>
                                <label for="" class="">or Specify Defective Property</label>
                                <input type="text" class="form-control" id="edit-others" name="others">
                            </div>
                            
                            <label for="" class="">Room/Office/Laboratory</label>
                            <select name="room" class="form-select" id="edit-room" required>
                                <option value="">Select Room</option>
                                @foreach ($rooms as $ro)
                                <option value="{{ $ro->id }}">{{ $ro->room }}</option>
                                @endforeach
                            </select>
                           
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-info mt-4"> Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 