<form method="post" action="">
    @csrf
    <div class="row g-3">
        <div class="col-md-6">
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label req">Years of substance use</label>
                    <input type="number" class="form-control" name="years_of_substance_use" placeholder="0 years" value="{{ old('years_of_substance_use') }}">
                    @error('years_of_substance_use')
                        <small class="text-danger">{{ $errors->first('years_of_substance_use') }}</small>
                    @enderror
                </div>
                <div class="col-md-5">
                    <label class="form-label req">Duration of heavy or problematic use</label>
                    <input type="text" class="form-control" name="duration_of_heavy_or_problematic_use" placeholder="0 years" value="{{ old('duration_of_heavy_or_problematic_use') }}">
                    @error('duration_of_heavy_or_problematic_use')
                        <small class="text-danger">{{ $errors->first('duration_of_heavy_or_problematic_use') }}</small>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label req">Date of last drink</label>
                    <input type="date" class="form-control" name="date_of_last_drink" placeholder="0 years" value="{{ old('date_of_last_drink') }}">
                    @error('date_of_last_drink')
                        <small class="text-danger">{{ $errors->first('date_of_last_drink') }}</small>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label">Date of last drug use</label>
                    <input type="date" class="form-control" name="date_of_last_drug_use" placeholder="0 years" value="{{ old('date_of_last_drug_use') }}">
                    @error('date_of_last_drug_use')
                        <small class="text-danger">{{ $errors->first('date_of_last_drug_use') }}</small>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col table-resposive mt-3">
                    <p class="fw-bold">Presence of physical / mental health problems:</p>
                    <table class="table table-bordered table-sm">
                        <thead><tr><th>Physical Problems</th><th>Check</th><th>Mental Health Problems</th><th>Check</th></tr></thead>
                        <tbody>
                            <tr>
                                <td>Tremors</td><td class="text-center"><input class="form-check-input" type="checkbox" name="tremors" value="1"></td>
                                <td>Have you ever had suicidal thoughts?</td><td class="text-center"><input class="form-check-input" type="checkbox" name="suicidal_thought" value="1"></td>
                            </tr>
                            <tr>
                                <td>Sleeplessness</td><td class="text-center"><input class="form-check-input" type="checkbox" name="tremors" value="1"></td>
                                <td>Have you ever attempted suicide?</td><td class="text-center"><input class="form-check-input" type="checkbox" name="suicidal_thought" value="1"></td>
                            </tr>
                            <tr>
                                <td>Poor appetite</td><td class="text-center"><input class="form-check-input" type="checkbox" name="tremors" value="1"></td>
                                <td>If yes to above two questions ask: in the past two weeks have you had:<br>
                                -	Any suicidal thoughts: <input class="form-check-input" type="checkbox" name="suicidal_thought" value="1"><br>
                                -	Any plans: <input class="form-check-input" type="checkbox" name="suicidal_thought" value="1">
                                </td><td class="text-center"></td>
                            </tr>
                            <tr>
                                <td>Nausea / vomiting</td><td class="text-center"><input class="form-check-input" type="checkbox" name="tremors" value="1"></td>
                                <td>Hallucinations</td><td class="text-center"><input class="form-check-input" type="checkbox" name="suicidal_thought" value="1"></td>
                            </tr>
                            <tr>
                                <td>Blood vomiting</td><td class="text-center"><input class="form-check-input" type="checkbox" name="tremors" value="1"></td>
                                <td>Delusions</td><td class="text-center"><input class="form-check-input" type="checkbox" name="suicidal_thought" value="1"></td>
                            </tr>
                            <tr>
                                <td>Chest burn / abdominal pain</td><td class="text-center"><input class="form-check-input" type="checkbox" name="tremors" value="1"></td>
                                <td>Suspicion</td><td class="text-center"><input class="form-check-input" type="checkbox" name="suicidal_thought" value="1"></td>
                            </tr>
                            <tr>
                                <td>Hypertension</td><td class="text-center"><input class="form-check-input" type="checkbox" name="tremors" value="1"></td>
                                <td>Severe verbal violence</td><td class="text-center"><input class="form-check-input" type="checkbox" name="suicidal_thought" value="1"></td>
                            </tr>
                            <tr>
                                <td>Diabetes</td><td class="text-center"><input class="form-check-input" type="checkbox" name="tremors" value="1"></td>
                                <td>Physical violence</td><td class="text-center"><input class="form-check-input" type="checkbox" name="suicidal_thought" value="1"></td>
                            </tr>
                            <tr>
                                <td>Fits</td><td class="text-center"><input class="form-check-input" type="checkbox" name="tremors" value="1"></td>
                                <td>Breaking things</td><td class="text-center"><input class="form-check-input" type="checkbox" name="suicidal_thought" value="1"></td>
                            </tr>
                            <tr>
                                <td>Self-harm</td><td class="text-center"><input class="form-check-input" type="checkbox" name="tremors" value="1"></td>
                                <td colspan="2"><input type="text" class="form-control form-control-sm" placeholder="Others specify"></td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="fw-bold mt-3">Present pattern of substance use:</p>
                    <table class="table table-bordered table-sm">
                        <thead><tr><th>Type</th><th>Qty</th><th>Frequency</th><th>Duration</th></tr></thead>
                        <tbody>
                            <tr>
                                <td><input class="form-control form-control-sm" type="text" name="type[]" placeholder="Type"></td>
                                <td><input class="form-control form-control-sm" type="number" name="qty[]" placeholder="Qty"></td>
                                <td><input class="form-control form-control-sm" type="text" name="frequency[]" placeholder="Frequency"></td>
                                <td><input class="form-control form-control-sm" type="text" name="duration[]" placeholder="Duration"></td>
                            </tr>
                            <tr>
                                <td><input class="form-control form-control-sm" type="text" name="type[]" placeholder="Type"></td>
                                <td><input class="form-control form-control-sm" type="number" name="qty[]" placeholder="Qty"></td>
                                <td><input class="form-control form-control-sm" type="text" name="frequency[]" placeholder="Frequency"></td>
                                <td><input class="form-control form-control-sm" type="text" name="duration[]" placeholder="Duration"></td>
                            </tr>
                            <tr>
                                <td><input class="form-control form-control-sm" type="text" name="type[]" placeholder="Type"></td>
                                <td><input class="form-control form-control-sm" type="number" name="qty[]" placeholder="Qty"></td>
                                <td><input class="form-control form-control-sm" type="text" name="frequency[]" placeholder="Frequency"></td>
                                <td><input class="form-control form-control-sm" type="text" name="duration[]" placeholder="Duration"></td>
                            </tr>
                            <tr>
                                <td><input class="form-control form-control-sm" type="text" name="type[]" placeholder="Type"></td>
                                <td><input class="form-control form-control-sm" type="number" name="qty[]" placeholder="Qty"></td>
                                <td><input class="form-control form-control-sm" type="text" name="frequency[]" placeholder="Frequency"></td>
                                <td><input class="form-control form-control-sm" type="text" name="duration[]" placeholder="Duration"></td>
                            </tr>
                            <tr>
                                <td><input class="form-control form-control-sm" type="text" name="type[]" placeholder="Type"></td>
                                <td><input class="form-control form-control-sm" type="number" name="qty[]" placeholder="Qty"></td>
                                <td><input class="form-control form-control-sm" type="text" name="frequency[]" placeholder="Frequency"></td>
                                <td><input class="form-control form-control-sm" type="text" name="duration[]" placeholder="Duration"></td>
                            </tr>
                            <tr>
                                <td><input class="form-control form-control-sm" type="text" name="type[]" placeholder="Type"></td>
                                <td><input class="form-control form-control-sm" type="number" name="qty[]" placeholder="Qty"></td>
                                <td><input class="form-control form-control-sm" type="text" name="frequency[]" placeholder="Frequency"></td>
                                <td><input class="form-control form-control-sm" type="text" name="duration[]" placeholder="Duration"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12 table-responsive">
                    <p class="fw-bold">Other Details</p>
                    <table class="table table-bordered table-sm">
                        <thead><tr><th>Description</th><th>Check</th></tr></thead>
                        <tbody>
                            <tr>
                                <td>Has the client received treatment for physical health problems in the past five years?</td><td class="text-center"><input class="form-check-input" type="checkbox" name="suicidal_thought" value="1"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="text" class="form-control form-control-sm" placeholder="If yes, details"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="text" class="form-control form-control-sm" placeholder="Details of head injury and treatment provided if any"></td>
                            </tr>
                            <tr>
                                <td>Has the client ever been treated for mental health problems or met a psychiatrist in the past?</td><td class="text-center"><input class="form-check-input" type="checkbox" name="suicidal_thought" value="1"></td>
                            </tr>
                            <tr>
                                <td>Prior treatment for addiction?</td><td class="text-center"><input class="form-check-input" type="checkbox" name="suicidal_thought" value="1"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="text" class="form-control form-control-sm" placeholder="If yes, details"></td>
                            </tr>
                            <tr>
                                <td>Reason given by client for accessing help now?</td><td class="text-center">
                                    <select class="form-control form-control-sm" name="reason_given_by_client">
                                        <option value="0">Select</option>
                                        @forelse($extras->where('category', 'help') as $key => $reason)
                                            <option value="{{ $reason->id }}" {{ (old('reason_given_by_client') == $reason->id) ? 'selected' : '' }}>{{ $reason->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Recognizes problems related to drinking</td><td class="text-center">
                                    <select class="form-control form-control-sm" name="">
                                        <option value="0">Select</option>
                                        @forelse($extras->where('category', 'drink') as $key => $reason)
                                            <option value="{{ $reason->id }}" {{ (old('') == $reason->id) ? 'selected' : '' }}>{{ $reason->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Patients willingness to alter drinking pattern</td><td class="text-center">
                                    <select class="form-control form-control-sm" name="">
                                        <option value="0">Select</option>
                                        @forelse($extras->where('category', 'pattern') as $key => $reason)
                                            <option value="{{ $reason->id }}" {{ (old('') == $reason->id) ? 'selected' : '' }}>{{ $reason->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Willingness for admission</td><td class="text-center">
                                    <select class="form-control form-control-sm" name="">
                                        <option value="0">Select</option>
                                        @forelse($extras->where('category', 'admission') as $key => $reason)
                                            <option value="{{ $reason->id }}" {{ (old('') == $reason->id) ? 'selected' : '' }}>{{ $reason->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Room Allotted</td><td class="text-center">
                                    <select class="form-control form-control-sm" name="">
                                        <option value="0">Select</option>
                                        @forelse($extras->where('category', 'room') as $key => $reason)
                                            <option value="{{ $reason->id }}" {{ (old('') == $reason->id) ? 'selected' : '' }}>{{ $reason->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Delirium Tremens</td><td class="text-center"><input class="form-check-input" type="checkbox" name="suicidal_thought" value="1"></td>
                            </tr>
                            <tr>
                                <td>Suicidal Risk</td><td class="text-center"><input class="form-check-input" type="checkbox" name="suicidal_thought" value="1"></td>
                            </tr>
                            <tr>
                                <td>Violence</td><td class="text-center"><input class="form-check-input" type="checkbox" name="suicidal_thought" value="1"></td>
                            </tr>
                            <tr>
                                <td>Cardiac problems</td><td class="text-center"><input class="form-check-input" type="checkbox" name="suicidal_thought" value="1"></td>
                            </tr>
                            <tr>
                                <td>TB</td><td class="text-center"><input class="form-check-input" type="checkbox" name="suicidal_thought" value="1"></td>
                            </tr>
                            <tr>
                                <td>HIV/AIDS/STDs</td><td class="text-center"><input class="form-check-input" type="checkbox" name="suicidal_thought" value="1"></td>
                            </tr>
                            <tr>
                                <td>Hepatitis</td><td class="text-center"><input class="form-check-input" type="checkbox" name="suicidal_thought" value="1"></td>
                            </tr>
                            <tr>
                                <td>Other Co-Morbidities </td><td class="text-center"><input class="form-check-input" type="checkbox" name="suicidal_thought" value="1"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>                
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <textarea class="form-control" placeholder="Counselling Notes / Remarks" rows="5"></textarea>
                </div>
            </div>                
        </div>
    </div>
    <div class="pt-4 float-end">
        <button type="submit" class="btn btn-submit btn-primary me-sm-3 me-1">Save</button>
        <button type="button" onclick="history.back()" class="btn btn-label-secondary">Cancel</button>
    </div>
</form>