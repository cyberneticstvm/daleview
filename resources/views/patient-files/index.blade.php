@extends("base")
@section("content")
<!-- Content -->
<div class="row">
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">Patient/</span>Manage Patient Files
    </h4>
    <!-- Website Analytics-->
    <div class="col-lg-12 col-md-12 mb-4">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6"><h5 class="card-title mb-0">Patient File Register</h5></div>
                </div>                
            </div>
            <div class="card-body table-responsive">
                <table class="datatables-basic table table-sm table-bordered">
                    <thead><tr><th>SL No</th><th>File Number</th><th>Patient ID</th><th>Patient Name</th><th>Counsellor</th><th>Notes</th><th>Bill</th><th>Date</th><th>Edit</th><th>Delete</th></tr></thead>
                    <tbody>
                        @php $c = 1; @endphp
                        @forelse($records as $key => $file)
                        <tr>
                            <td>{{ $c++ }}</td>
                            <td><a href="/patient/counselling/{{ $file->id }}">{{ $file->id }}</a></td>
                            <td>{{ $file->patient->id }}</td>                            
                            <td>{{ $file->patient->first_name.' '.$file->patient->last_name }}</td>
                            <td>{{ $file->counsellor->name }}</td>
                            <td>{{ $file->notes }}</td>                          
                            <td class="text-center"><a target="_blank" href="/patient/file/bill/{{$file->id}}"><i class="fa fa-file text-primary"></i></a></td>
                            <td>{{ $file->created_at->format('d/M/Y') }}</td>                          
                            <td class="text-center"><a href="/patient/file/edit/{{$file->id}}"><i class="fa fa-pencil text-warning"></i></a></td>
                            <td class="text-center">
                                <form method="post" action="{{ route('patient.file.delete', $file->id) }}">
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