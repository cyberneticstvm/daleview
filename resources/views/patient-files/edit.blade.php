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
                    <div class="col-12"><h5 class="card-title mb-0">Update File</h5></div>
                </div>                
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('patient.file.update', $file->id) }}">
                    @csrf
                    @method("PUT")
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label">Patient Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Full Name" value="{{ $file->patient->first_name.' '.$file->patient->middle_name.' '.$file->patient->last_name }}" readonly>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Patient ID</label>
                            <input type="text" class="form-control" name="patient_id" value="{{ $file->patient->id }}" readonly>
                            @error('patient_id')
                                <small class="text-danger">{{ $errors->first('patient_id') }}</small>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label class="form-label req">Counsellor</label>
                            <select name="counsellor_id" class="form-control">
                                <option value="">Select</option>
                                @forelse($counsellors as $key => $role)
                                    <option value="{{ $role->id }}" {{ ($file->counsellor_id == $role->id) ? 'selected' : '' }}>{{ $role->name }}</option>
                                @empty
                                @endforelse
                            </select>
                            @error('counsellor_id')
                                <small class="text-danger">{{ $errors->first('counsellor_id') }}</small>
                            @enderror
                        </div>
                        <div class="col-md-5">
                            <label class="form-label req">Reason for Admission</label>
                            {!! Form::select('reasons[]', $extras->where('category', 'reason')->pluck('name', 'id')->all(),  $file->reasons()->pluck('reason')->toArray(), ['class' => 'form-control select2', 'multiple']) !!}
                            @error('reasons')
                                <small class="text-danger">{{ $errors->first('reasons') }}</small>
                            @enderror
                        </div>
                        <div class="col-md-5">
                            <label class="form-label">Notes</label>
                            <input type="text" class="form-control" name="notes" placeholder="Notes" value="{{ $file->notes }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="divider my-4">
                            <div class="divider-text fw-bold text-primary">Referral Person Details</div>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label req">Referred By</label>
                            <select name="referred_by" class="form-control">
                                <option value="">Select</option>
                                @forelse($extras->where('category', 'referral') as $key => $ref)
                                    <option value="{{ $ref->id }}" {{ ($file->referred_by == $ref->id) ? 'selected' : '' }}>{{ $ref->name }}</option>
                                @empty
                                @endforelse
                            </select>
                            @error('referred_by')
                                <small class="text-danger">{{ $errors->first('referred_by') }}</small>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Referral Person Details</label>
                            <input type="text" class="form-control" name="referral_person_details" value="{{ $file->referral_person_details }}" placeholder="Referral Person Details">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label req">Referrer Mobile</label>
                            <input type="text" class="form-control" name="referral_person_mobile" placeholder="Referrer Mobile" maxlength="10" value="{{ $file->referral_person_mobile }}">
                            @error('referral_person_mobile')
                                <small class="text-danger">{{ $errors->first('referral_person_mobile') }}</small>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label class="form-label ">Referrer Email</label>
                            <input type="email" class="form-control" name="referral_person_email" placeholder="Referrer Email" maxlength="10" value="{{ $file->referral_person_email }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="divider my-4">
                            <div class="divider-text fw-bold text-primary">Accompanying Person Details</div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Accompanying Person Details</label>
                            <input type="text" class="form-control" name="accompanying_person" value="{{ $file->accompanying_person }}" placeholder="Accompanying Person Details">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Accompanying Person Mobile</label>
                            <input type="text" class="form-control" name="accompanying_person_mobile" placeholder="Accompanying Person Mobile" maxlength="10" value="{{ $file->accompanying_person_mobile }}">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Relationship to Patient</label>
                            <input type="text" class="form-control" name="relation_to_patient" placeholder="Relationship to Patient" maxlength="10" value="{{ $file->relation_to_patient }}">
                        </div>                 
                    </div>
                    <div class="pt-4 float-end">
                        <button type="submit" class="btn btn-submit btn-primary me-sm-3 me-1">Update</button>
                        <button type="button" onclick="history.back()" class="btn btn-label-secondary">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <!--/ Content -->
@endsection