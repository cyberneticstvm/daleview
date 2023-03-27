<form method="post" action="">
    @csrf
    <div class="row g-3">
        <div class="col-md-6">
            <div class="row g-3">
                <div class="col-md-12">
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
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
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
                    </tbody>
                </table>                
            </div>
            <div class="row">
                <div class="col mt-3">
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