@extends("base")
@section("content")
<!-- Content -->
<div class="row">
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">Operations/</span>Manage Lab
    </h4>
    <!-- Website Analytics-->
    <div class="col-lg-12 col-md-12 mb-4">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12"><h5 class="card-title mb-0">Create Lab</h5></div>
                </div>                
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('lab.save') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label req">Test Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Test Name" value="{{ old('name') }}">
                            @error('name')
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label req">Category</label>
                            <select name="category_id" class="form-control">
                                <option value="">Select</option>
                                @forelse($cats as $key => $cat)
                                    <option value="{{ $cat->id }}" {{ (old('category_id') == $cat->id) ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @empty
                                @endforelse
                            </select>
                            @error('category_id')
                                <small class="text-danger">{{ $errors->first('category_id') }}</small>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Sub Category</label>
                            <select name="subcategory_id" class="form-control">
                                <option value="">Select</option>
                                @forelse($subcats as $key => $cat)
                                    <option value="{{ $cat->id }}" {{ (old('subcategory_id') == $cat->id) ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Description</label>
                            <input type="text" class="form-control" name="description" placeholder="Description" value="{{ old('description') }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Normal Range</label>
                            <input type="text" class="form-control" name="normal_range" placeholder="Normal Range" value="{{ old('normal_range') }}">
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