@extends("base")
@section("content")
<!-- Content -->
<div class="row">
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">Lab/</span>Lab Register
    </h4>
    <!-- Website Analytics-->
    <div class="col-lg-12 col-md-12 mb-4">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6"><h5 class="card-title mb-0">Lab Register</h5></div>
                </div>                
            </div>
            <div class="card-body table-responsive">
                <table class="datatables-basic table table-sm table-bordered">
                    <thead><tr><th>SL No</th><th>Patient Name</th><th>File Number</th><th>Lab Test</th><th>Notes</th></tr></thead>
                    <tbody>
                        @php $c = 1; @endphp
                        @forelse($labs as $key => $lab)
                        <tr>
                            <td>{{ $c++ }}</td>
                            <td>{{ $lab->patient->first_name }}</td>
                            <td>{{ $lab->file_id }}</td>
                            <td>{{ $lab->lab->name }}</td>
                            <td>{{ $lab->notes }}</td>
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