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
                    <thead><tr><th>SL No</th><th>Patient Name</th><th>File Number</th><th>Result</th><th>Print</th></tr></thead>
                    <tbody>
                        @php $c = 1; @endphp
                        @forelse($labs as $key => $lab)
                        <tr>
                            <td>{{ $c++ }}</td>
                            <td>{{ $lab->patient->first_name }}</td>
                            <td>{{ $lab->file_id }}</td>
                            <td class="text-center"><a href="/lab/register/edit/{{$lab->file_id}}"><i class="fa fa-pencil text-warning fw-bold"></i></a></td>
                            <td class="text-center"><a href='/patient/lab/bill/{{encrypt($lab->file_id)}}' target='_blank'><i class='fa fa-file-pdf text-danger'></i></a></td>
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