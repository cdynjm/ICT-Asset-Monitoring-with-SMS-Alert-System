<!-- The Modal -->
<div class="modal fade" id="createcommentModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Comment</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='processing-comment'></div>
                    <form id="create-comment" action="">
                        @csrf

                            <input type="hidden" class="form-control" id="report-id" name="report_id" readonly>

                            <label for="" class="mt-2">Description</label>
                            <input type="text" class="form-control" name="comment" required>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-info mt-4"> Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 