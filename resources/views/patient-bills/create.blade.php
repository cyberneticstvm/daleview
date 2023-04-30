@extends("base")
@section("content")
<!-- Content -->
<div class="row">
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">Operations/</span>Create Bill
    </h4>
    <!-- Website Analytics-->
    <div class="col-lg-12 col-md-12 mb-4">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12"><h5 class="card-title mb-0">Create Bill</h5></div>
                </div>                
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('bill.save') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-2">
                            <label class="form-label req">File Number</label>
                            <input type="number" class="form-control" name="file_number" placeholder="0" value="{{ $file->id }}" readonly>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label req">Patient Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $file->patient->first_name }}" readonly>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label req">Patient ID</label>
                            <input type="text" class="form-control" name="patient_id" value="{{ $file->patient->id }}" readonly>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><h5>Services</h5></div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-10">
                            <table class="table table-bordered table-sm">
                                <thead><tr><th>Service Name</th><th>Fee</th><th>Qty<th>notes</th><th class="text-center"><a href="javascript:void(0)" onclick="javascript:addRow('service');"><i class="fa fa-plus text-info fa-xl"></i></a></th></tr></thead>
                                <tbody class="tblService"></tbody>
                            </table>
                        </div>
                        @error('services')
                            <small class="text-danger">{{ $errors->first('services') }}</small>
                        @enderror
                    </div>
                    <div class="pt-4 float-end">
                        <button type="submit" class="btn btn-submit btn-primary me-sm-3 me-1">Save</button>
                        <button type="button" onclick="history.back()" class="btn btn-label-secondary">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <!--/ Content -->
@endsection