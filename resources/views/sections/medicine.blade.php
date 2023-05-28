<form method="post" action="{{ route('patient.counselling.medicine.update', $file->id) }}">
    @csrf
    <input type="hidden" name="patient_id" value="{{ $file->patient_id }}" />
    <input type="hidden" name="file_id" value="{{ $file->id }}" />
    <div class="row g-3">
        <div class="col-md-6">
            <h5>Advised Medicines</h5>
            <table class="table table-bordered table-sm">
                <thead><thead><tr><th>SL No.</th><th>Medicine</th><th>Dosage</th><th>Notes</th><th>Advised On</th></tr></thead></thead>
                <tbody>
                    @php $c = 1; @endphp
                    @forelse($medicines as $key => $med)
                        <tr>
                            <td>{{ $c++ }}</td>
                            <td>{{ $med->medicine->name }}</td>
                            <td>{{ $med->dosage }}</td>
                            <td>{{ $med->notes }}</td>
                            <td>{{ $med->created_at->format('d/M/Y') }}</td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h5>New Medicines</h5>
            <table class="table table-bordered table-sm">
                <thead><tr><th>Medicine</th><th>Dosage</th><th>notes</th><th class="text-center"><a href="javascript:void(0)" onclick="javascript:addRow('medicine');"><i class="fa fa-plus text-info fa-xl"></i></a></th></tr></thead>
                <tbody class="tblMedicine"></tbody>
            </table>
        </div>
    </div>
    <div class="pt-4 float-end">
        <button type="submit" class="btn btn-submit btn-primary me-sm-3 me-1">Save</button>
        <button type="button" onclick="history.back()" class="btn btn-label-secondary">Cancel</button>
    </div>
</form>