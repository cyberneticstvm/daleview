<form method="post" action="{{ route('patient.counselling.doctor.update', $file->id) }}">
    @csrf
    <input type="hidden" name="patient_id" value="{{ $file->patient_id }}" />
    <input type="hidden" name="file_id" value="{{ $file->id }}" />
    <div class="row g-3">
        <div class="col-md-12">
            <h5>Previous Comments</h5>
            @forelse($doc_comments as $key => $com)
                {{ $com->comments }}<br>
                <div class="text-end">{{ $com->doctor->name }} / {{ $com->created_at->format('d-m-Y') }}</div>
            @empty
            @endforelse
        </div>
        <div class="col-md-12">
            <label class="form-label req">Doctor Comments</label>
            <textarea class="form-control" name="comments" rows="5" placeholder="Doctor Comments"></textarea>
            @error('comments')
                <small class="text-danger">{{ $errors->first('comments') }}</small>
            @enderror
        </div>
    </div>
    <div class="pt-4 float-end">
        <button type="submit" class="btn btn-submit btn-primary me-sm-3 me-1">Save</button>
        <button type="button" onclick="history.back()" class="btn btn-label-secondary">Cancel</button>
    </div>
</form>