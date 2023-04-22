@extends("base")
@section("content")
<!-- Content -->
<div class="row">
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">Pharmacy/</span>Medicine Register
    </h4>
    <!-- Website Analytics-->
    <div class="col-lg-12 col-md-12 mb-4">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6"><h5 class="card-title mb-0">Medicine Register</h5></div>
                </div>                
            </div>
            <div class="card-body table-responsive">
                <table class="datatables-basic table table-sm table-bordered">
                    <thead><tr><th>SL No</th><th>Patient Name</th><th>File Number</th><th>Medicine</th><th>Batch Number</th><th>Qty</th><th>Dosage</th><th>Notes</th></tr></thead>
                    <tbody>
                        @php $c = 1; @endphp
                        @forelse($medicines as $key => $med)
                        <tr>
                            <td>{{ $c++ }}</td>
                            <td>{{ $med->patient->first_name }}</td>
                            <td>{{ $med->file_id }}</td>
                            <td>{{ $med->medicine->name }}</td>
                            <td>{{ $med->batch_number }}</td>
                            <td>{{ $med->qty }}</td>
                            <td>{{ $med->dosage }}</td>
                            <td>{{ $med->notes }}</td>
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