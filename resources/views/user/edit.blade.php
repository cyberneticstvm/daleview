@extends("base")
@section("content")
<!-- Content -->
<div class="row">
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">Operations/</span>Manage User
    </h4>
    <!-- Website Analytics-->
    <div class="col-lg-12 col-md-12 mb-4">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12"><h5 class="card-title mb-0">Update User</h5></div>
                </div>                
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('user.update', $user->id) }}">
                    @csrf
                    @method("PUT")
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label req">Full Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Full Name" value="{{ $user->name }}">
                            @error('name')
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label req">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $user->email }}">
                            @error('email')
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label req">Role</label>
                            <select name="role" class="form-control">
                                <option value="">Select</option>
                                @forelse($roles as $key => $role)
                                    <option value="{{ $role->name }}" {{ ($user->role == $role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                                @empty
                                @endforelse
                            </select>
                            @error('role')
                                <small class="text-danger">{{ $errors->first('role') }}</small>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="******">
                            @error('password')
                                <small class="text-danger">{{ $errors->first('password') }}</small>
                            @enderror
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