@extends("base")
@section("content")
<!-- Content -->
<div class="row">
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">Patient/</span>Manage Patient
    </h4>
    <!-- Website Analytics-->
    <div class="col-lg-12 col-md-12 mb-4">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12"><h5 class="card-title mb-0">Create Patient</h5></div>
                </div>                
            </div>
            <div class="card-body">
                <div class="divider my-4">
                    <div class="divider-text fw-bold text-primary">Patient Details</div>
                </div>
                <form method="post" action="{{ route('patient.save') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-2">
                            <label class="form-label req">First Name</label>
                            <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ old('first_name') }}">
                            @error('first_name')
                                <small class="text-danger">{{ $errors->first('first_name') }}</small>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Middle Name</label>
                            <input type="text" class="form-control" name="middle_name" placeholder="Middle Name" value="{{ old('middle_name') }}">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label req">Last Name</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}">
                            @error('last_name')
                                <small class="text-danger">{{ $errors->first('last_name') }}</small>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label class="form-label req">Mobile Number</label>
                            <input type="text" class="form-control" name="mobile" placeholder="Mobile Number" maxlength="10" value="{{ old('mobile') }}">
                            @error('mobile')
                                <small class="text-danger">{{ $errors->first('mobile') }}</small>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label class="form-label req">Date of Birth</label>
                            <input type="date" class="form-control" name="dob" value="{{ old('dob') }}">
                            @error('dob')
                                <small class="text-danger">{{ $errors->first('dob') }}</small>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label class="form-label req">Age</label>
                            <input type="number" class="form-control" name="age" placeholder="0" value="{{ old('age') }}">
                            @error('age')
                                <small class="text-danger">{{ $errors->first('age') }}</small>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label class="form-label req">Gender</label>
                            <select name="gender" class="form-control">
                                <option value="">Select</option>
                                @forelse($extras->where('category', 'gender') as $key => $gender)
                                    <option value="{{ $gender->id }}" {{ (old('gender') == $gender->id) ? 'selected' : '' }}>{{ $gender->name }}</option>
                                @empty
                                @endforelse
                            </select>
                            @error('gender')
                                <small class="text-danger">{{ $errors->first('gender') }}</small>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label class="form-label req">Marital Status</label>
                            <select name="marital_status" class="form-control">
                                <option value="">Select</option>
                                @forelse($extras->where('category', 'mstatus') as $key => $mstatus)
                                    <option value="{{ $mstatus->id }}" {{ (old('marital_status') == $mstatus->id) ? 'selected' : '' }}>{{ $mstatus->name }}</option>
                                @empty
                                @endforelse
                            </select>
                            @error('marital_status')
                                <small class="text-danger">{{ $errors->first('marital_status') }}</small>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label class="form-label req">Education</label>
                            <select name="education" class="form-control">
                                <option value="">Select</option>
                                @forelse($extras->where('category', 'education') as $key => $education)
                                    <option value="{{ $education->id }}" {{ (old('education') == $education->id) ? 'selected' : '' }}>{{ $education->name }}</option>
                                @empty
                                @endforelse
                            </select>
                            @error('education')
                                <small class="text-danger">{{ $errors->first('education') }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Educational Details</label>
                            <input type="text" class="form-control" name="education_details" placeholder="Educational Details" value="{{ old('education_details') }}">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label req">Employment</label>
                            <select name="employment" class="form-control">
                                <option value="">Select</option>
                                @forelse($extras->where('category', 'employment') as $key => $employment)
                                    <option value="{{ $employment->id }}" {{ (old('employment') == $employment->id) ? 'selected' : '' }}>{{ $employment->name }}</option>
                                @empty
                                @endforelse
                            </select>
                            @error('employment')
                                <small class="text-danger">{{ $errors->first('employment') }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Employment Details</label>
                            <input type="text" class="form-control" name="employment_details" placeholder="Employment Details" value="{{ old('employment_details') }}">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label req">Language</label>
                            <select name="language" class="form-control">
                                <option value="">Select</option>
                                @forelse($extras->where('category', 'language') as $key => $language)
                                    <option value="{{ $language->id }}" {{ (old('language') == $language->id) ? 'selected' : '' }}>{{ $language->name }}</option>
                                @empty
                                @endforelse
                            </select>
                            @error('language')
                                <small class="text-danger">{{ $errors->first('language') }}</small>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label class="form-label req">ID Proof</label>
                            <select name="id_proof" class="form-control">
                                <option value="">Select</option>
                                @forelse($extras->where('category', 'id') as $key => $idp)
                                    <option value="{{ $idp->id }}" {{ (old('id_proof') == $idp->id) ? 'selected' : '' }}>{{ $idp->name }}</option>
                                @empty
                                @endforelse
                            </select>
                            @error('language')
                                <small class="text-danger">{{ $errors->first('language') }}</small>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label class="form-label req">ID Proof Number</label>
                            <input type="text" class="form-control" name="id_proof_number" value="{{ old('id_proof_number') }}" placeholder="ID Proof Number">
                            @error('id_proof_number')
                                <small class="text-danger">{{ $errors->first('id_proof_number') }}</small>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Patient Photo</label>
                            <input type="file" class="form-control" name="patient_photo">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label req">Registration Fee</label>
                            <select name="registration_fee" class="form-control">
                                <option value="">Select</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            @error('registration_fee')
                                <small class="text-danger">{{ $errors->first('registration_fee') }}</small>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label class="form-label req">Registration Date</label>
                            <input type="date" class="form-control" name="registration_date" value="{{ old('registration_date') }}">
                            @error('registration_date')
                                <small class="text-danger">{{ $errors->first('registration_date') }}</small>
                            @enderror
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