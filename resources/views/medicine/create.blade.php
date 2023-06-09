@extends("base")
@section("content")
<!-- Content -->
<div class="row">
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">Operations/</span>Manage Medicine
    </h4>
    <!-- Website Analytics-->
    <div class="col-lg-12 col-md-12 mb-4">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12"><h5 class="card-title mb-0">Create Medicine</h5></div>
                </div>                
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('medicine.save') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label req">Medicine Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Medicine Name" value="{{ old('name') }}">
                            @error('name')
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Molecules</label>
                            <input type="text" class="form-control" name="molecule" placeholder="Molecules" value="{{ old('molecule') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Description</label>
                            <input type="text" class="form-control" name="description" placeholder="Description" value="{{ old('description') }}">
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