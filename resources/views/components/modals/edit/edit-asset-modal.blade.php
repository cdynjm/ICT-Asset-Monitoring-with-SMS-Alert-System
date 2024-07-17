<!-- The Modal -->
<div class="modal fade" id="editRegisteredAssetModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Asset</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='edit-processing-register-asset'></div>
                    <form id="update-register-asset" action="">
                        @csrf

                            <p class="text-sm">Asset Information</p>

                            <input type="hidden" class="form-control" name="assetid" id="edit-assetid" >

                            <label for="" class="mt-2">Property Name</label>
                            <input type="text" class="form-control" name="property" id="edit-property" required>

                            <label for="" class="mt-2">Person in Charge</label>
                            <select name="person" id="edit-person" class="form-select" required>
                                <option value="">Select...</option>
                                @foreach ($instructor as $ins)
                                    <option value="{{ $ins->id }}">{{ $ins->name }}</option>
                                @endforeach
                            </select>

                            <label for="" class="mt-2">Model Number</label>
                            <input type="text" class="form-control" name="model_number" id="edit-model-number" required>

                            <label for="" class="mt-2">Serial Number</label>
                            <input type="text" class="form-control" name="serial_number" id="edit-serial-number" required>

                            <label for="" class="mt-2">Location</label>
                            <select name="room" class="form-select" id="edit-location" required>
                                <option value="">Select...</option>
                                @foreach ($rooms as $ro)
                                <option value="{{ $ro->id }}">{{ $ro->room }}</option>
                                @endforeach
                            </select>

                            <label for="" class="mt-2">Status</label>
                            <select name="status" class="form-select" id="edit-status" required>
                                <option value="1">Functional</option>
                                <option value="2">Under Maintenance</option>
                                <option value="3">Returned to Supply Office</option>
                                <option value="4">Not Functional</option>
                            </select>

                            <label for="" class="mt-2">Upload New Picture</label>
                            <input type="file" class="form-control mb-2" name="photo" onchange="viewNewPhoto(this);">
                            <center>
                                <img src="{{ asset('storage/icon/photo-placeholder.jpg') }}" alt="" class="mt-4 rounded img-fluid" id="new-asset-photo">
                            </center>

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