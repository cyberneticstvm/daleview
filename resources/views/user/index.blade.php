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
                    <div class="col-6"><h5 class="card-title mb-0">User List</h5></div>
                    <div class="col text-end"><a href="/user/create"><i class='bx bx-plus-medical text-primary'></i></a></div>
                </div>                
            </div>
            <div class="card-body table-responsive">
                <table class="datatables-basic table table-bordered">
                    <thead><tr><th>SL No</th><th>Name</th><th>Email</th><th>Role</th><th>Edit</th><th>Delete</th></tr></thead>
                    <tbody>
                        @php $c = 1; @endphp
                        @forelse($users as $key => $user)
                        <tr>
                            <td>{{ $c++ }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->userrole->name }}</td>
                            <td class="text-center"><a href="user/edit/{{$user->id}}"><i class="fa fa-pencil text-warning"></i></a></td>
                            <td class="text-center">
                                <form method="post" action="{{ route('user.delete', $user->id) }}">
                                    @csrf 
                                    @method("DELETE")
                                    <button type="submit" class="border no-border" onclick="javascript: return confirm('Are you sure want to delete this record?');"><i class="fa fa-trash text-danger"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    <!--/ Content -->
@endsection