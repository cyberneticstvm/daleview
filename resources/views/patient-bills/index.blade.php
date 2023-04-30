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
                    <div class="col-12"><h5 class="card-title mb-0">Bill Register</h5></div>
                </div>                
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('bill.fetch') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label req">File Number</label>
                            <input type="number" class="form-control" name="file_number" placeholder="0" value="{{ old('file_number') }}">
                            @error('file_number')
                                <small class="text-danger">{{ $errors->first('file_number') }}</small>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-submit btn-primary mt-4">Fetch</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body table-responsive">
                <table class="datatables-basic table table-sm table-bordered">
                    <thead><tr><th>SL No</th><th>Patient Name</th><th>File Number</th><th>Bill Amount</th><th>Bill</th><th>Edit</th><th>Delete</th></tr></thead>
                    <tbody>
                        @php $c = 1; @endphp
                        @forelse($bills as $key => $bill)
                        <tr>
                            <td>{{ $c++ }}</td>
                            <td>{{ $bill->file->patient->first_name }}</td>
                            <td>{{ $bill->file_id }}</td>
                            <td>{{ $bill->total }}</td>
                            <td></td>
                            <td class="text-center"><a href="/bill/edit/{{$bill->file_id}}"><i class="fa fa-pencil text-warning"></i></a></td>
                            <td class="text-center">
                                <form method="post" action="{{ route('bill.delete', $bill->file_id) }}">
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