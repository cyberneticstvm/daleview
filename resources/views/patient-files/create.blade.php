@extends("base")
@section("content")
<!-- Content -->
<div class="row">
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">Patient/</span>Patient File
    </h4>
    <!-- Website Analytics-->
    <div class="col-lg-12 col-md-12 mb-4">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12"><h5 class="card-title mb-0">Create File</h5></div>
                </div>                
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('patient.file.save', $patient->id) }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label">Patient Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Full Name" value="{{ $patient->first_name.' '.$patient->middle_name.' '.$patient->last_name }}" readonly>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Patient ID</label>
                            <input type="text" class="form-control" name="patient_id" value="{{ $patient->id }}">
                            @error('patient_id')
                                <small class="text-danger">{{ $errors->first('patient_id') }}</small>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label class="form-label req">Counsellor</label>
                            <select name="counsellor_id" class="form-control">
                                <option value="">Select</option>
                                @forelse($counsellors as $key => $role)
                                    <option value="{{ $role->id }}" {{ (old('counsellor_id') == $role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                                @empty
                                @endforelse
                            </select>
                            @error('counsellor_id')
                                <small class="text-danger">{{ $errors->first('counsellor_id') }}</small>
                            @enderror
                        </div>
                        <div class="col-md-5">
                            <label class="form-label">Notes</label>
                            <input type="text" class="form-control" name="notes" placeholder="Notes">
                        </div>
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