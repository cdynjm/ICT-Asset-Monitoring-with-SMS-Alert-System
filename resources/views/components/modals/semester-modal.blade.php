<!-- The Modal -->
<div class="modal fade" id="createsemesterModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Semester</h5>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">  
                    <div class="alert alert-info" style="display: none;" id='processing-semester'></div>
                    <form id="create-semester" action="">
                        @csrf

                            <p class="text-sm">Semester Information</p>

                            <label for="" class="mt-2">Academic Year</label>
                            <div class="row">
                                <div class="col-md-6">
                                <select class="form-select fmxw-200 d-md-inline" name="from" aria-label="Message select example 2">
                                    @php $years = range(2020, 2040); @endphp
                                    <option value="">From...</option>
                                    @foreach($years as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select fmxw-200 d-md-inline" name="to" aria-label="Message select example 2">
                                        @php $years = range(2020, 2040); @endphp
                                        <option value="">To...</option>
                                        @foreach($years as $year)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <select name="semester" id="" class="form-select fmxw-200 d-md-inline mt-4">
                                <option value="">Semester...</option>
                                <option value="1">1st Semester</option>
                                <option value="2">2nd Semester</option>
                                <option value="3">Summer Class</option>
                            </select>

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