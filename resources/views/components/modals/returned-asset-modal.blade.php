<!-- The Modal -->
@php
     date_default_timezone_set("Asia/Singapore"); 
@endphp
<div class="modal fade" id="returnassetModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Return Asset</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='processing-return'></div>
                    <form id="return-property" action="">
                        @csrf

                            <input type="hidden" id="return-asset-id" class="form-control" name="assetid">

                            <label for="" class="mt-2">Property Name</label>
                            <input type="text" class="form-control" id="return-property-name" readonly>

                            <label for="" class="mt-2">Date Returned</label>
                            <input type="" class="form-control" value="{{ date('F d, Y') }}" readonly>

                            <input type="date" class="form-control" name="date_returned" value="{{ date('Y-m-d') }}" hidden>
                            
                            <label for="" class="mt-2">In Good Condition?</label>
                            <select name="condition" id="condition" class="form-select" required>
                                <option value="">Select...</option>
                                <option value="0">Yes</option>
                                <option value="1">No</option>
                            </select>
                            <div id="show-remarks" style="display: none;">
                                <label for="" class="mt-2">Remarks</label>
                                <textarea name="remarks" class="form-control" cols="30" rows="5"></textarea>
                            </div>
                           
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-info mt-4"> Return</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 