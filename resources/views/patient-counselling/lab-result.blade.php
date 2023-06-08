@extends("base")
@section("content")
<!-- Content -->
<div class="row">
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">Lab/</span>Result
    </h4>
    <!-- Website Analytics-->
    <div class="col-lg-12 col-md-12 mb-4">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6"><h5 class="card-title mb-0">{{$file->patient->first_name}}'s Lab Result Update (File Number: {{$file->id}} )</h5></div>
                </div>                
            </div>
            <div class="card-body table-responsive">                
                <form action="{{ route('getlabs.update', $file->id) }}" method="post">
                    @csrf
                    @method("PUT")
                    <table class="table table-sm table-bordered">
                        <thead><tr><th>SL No</th><th>Lab Name</th><th>Result</th><th>Normal Range</th><th>Notes</th></tr></thead>
                        <tbody>
                            @php $c = 1; @endphp
                            @forelse($labs as $key => $lab)
                            <input type="hidden" name="lab_id[]" value="{{ $lab->lab->id }}" />
                            <input type="hidden" name="file_id[]" value="{{ $file->id }}" />
                            <input type="hidden" name="patient_id[]" value="{{ $file->patient->id }}" />
                            <input type="hidden" name="row_id[]" value="{{ $lab->id }}" />
                            <tr>
                                <td>{{ $c++ }}</td>
                                <td>{{ $lab->lab->name }}</td>
                                <td><input type="text" class="form-control" name="result[]" placeholder="Result" /></td>
                                <td><input type="text" class="form-control" name="normal_range[]" placeholder="Normal Range" /></td>
                                <td><input type="text" class="form-control" name="notes[]" value="{{$lab->notes}}" placeholder="Notes" /></td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
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