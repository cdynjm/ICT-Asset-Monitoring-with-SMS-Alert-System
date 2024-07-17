<!-- The Modal -->
<div class="modal fade" id="createassetModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Borrow Asset/Property</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='processing-asset'></div>
                    <form id="create-asset" action="">
                        @csrf

                            <p class="text-sm">Borrower's Information</p>

                            <label for="" class="mt-2">Full Name</label>
                            <input type="text" class="form-control" name="fullname" required>

                            <label for="" class="mt-2">Position/Rank/Office</label>
                            <input type="text" class="form-control" name="position" required>

                            <label for="" class="mt-2">Contact Number</label>
                            <input type="text" class="form-control" name="contactnumber" required>

                            <p class="mt-4 text-sm">Property/Asset Information</p>

                            <label for="" class="mt-2">Property Name</label>
                            <select name="property_name" id="select-property" class="form-select" required>
                                    <option value="">Select...</option>
                                    @foreach ($registered_asset as $rs)
                                        <option value="{{ $rs->property }}">{{ $rs->property }}</option>
                                    @endforeach
                            </select>

                            <label for="" class="mt-2">Person-in-charge of the Property</label>
                            <input type="text" class="form-control" name="person_in_charge" id="person-in-charge" readonly>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="" class="mt-2">Model Number</label>
                                    <input type="text" class="form-control" name="model_number" id="model-number" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="mt-2">Serial Number</label>
                                    <input type="text" class="form-control" name="serial_number" id="serial-number" readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="" class="mt-2">Quantity</label>
                                    <input type="number" class="form-control" name="quantity" required>
                                </div>
                                <div class="col-md-8">
                                    <label for="" class="mt-2">Date Borrowed</label>
                                    <input type="date" class="form-control" name="date_borrowed" required>
                                </div>
                            </div>

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