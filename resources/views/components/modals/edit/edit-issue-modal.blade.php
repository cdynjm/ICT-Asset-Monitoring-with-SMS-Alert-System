<!-- The Modal -->
<div class="modal fade" id="editissueModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Issue/Problem</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='edit-processing-issue'></div>
                    <form id="update-issue" action="">
                        @csrf

                            <input type="hidden" class="form-control" name="issueid" id="edit-issueid" required>

                            <p class="text-sm">Issue Information</p>

                            <label for="" class="mt-2">Description</label>
                            <input type="text" class="form-control" name="issue" id="edit-description" required>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-info mt-4"> Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 