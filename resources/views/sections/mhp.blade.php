<form method="post" action="{{ route('patient.counselling.mhp.update', $file->id) }}" class="frm-tbl">
    @csrf
    <input type="hidden" name="patient_id" value="{{ $file->patient_id }}" />
    <input type="hidden" name="file_id" value="{{ $file->id }}" />
    <div class="row g-3">
        <div class="col-md-6">
            <div class="row g-3">
                <div class="col-md-12 table-responsive">
                    <p class="fw-bold">Presence of mental health problems:</p>
                    <table class="table table-bordered table-sm">
                        <thead><tr><th>Mental Health Problems</th><th>Check</th></tr></thead>
                        <tbody>
                            <tr>
                                <td>
                                    Have you ever had suicidal thoughts?</td><td class="text-center"><input class="form-check-input" type="checkbox" data-name="suicidal_thought" {{ ($mhp && $mhp->suicidal_thought == 1) ? 'checked' : '' }}>
                                    <input class="suicidal_thought" type="hidden" name="suicidal_thought" value="{{ ($mhp && $mhp->suicidal_thought == 1) ? 1 : 0 }}" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Have you ever attempted suicide?</td><td class="text-center"><input class="form-check-input" type="checkbox" data-name="suicidal_attempt" {{ ($mhp && $mhp->suicidal_attempt == 1) ? 'checked' : '' }}>
                                    <input class="suicidal_attempt" type="hidden" name="suicidal_attempt" value="{{ ($mhp && $mhp->suicidal_attempt == 1) ? 1 : 0 }}" />
                                </td>
                            </tr>
                            <tr>
                                <td>If yes to above two questions ask: in the past two weeks have you had:<br>
                                -	Any suicidal thoughts: 
                                <input class="form-check-input" type="checkbox" data-name="suicidal_thought_past_two_weeks" {{ ($mhp && $mhp->suicidal_thought_past_two_weeks == 1) ? 'checked' : '' }}>
                                <input class="suicidal_thought_past_two_weeks" type="hidden" name="suicidal_thought_past_two_weeks" value="{{ ($mhp && $mhp->suicidal_thought_past_two_weeks == 1) ? 1 : 0 }}" />
                                <br>
                                -	Any plans: <input class="form-check-input" type="checkbox" data-name="suicidal_plans" {{ ($mhp && $mhp->suicidal_plans == 1) ? 'checked' : '' }}>
                                <input class="suicidal_plans" type="hidden" name="suicidal_plans" value="{{ ($mhp && $mhp->suicidal_plans == 1) ? 1 : 0 }}" />
                                </td>
                                <td class="text-center"></td>
                            </tr>
                            <tr>
                                <td>Hallucinations</td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" data-name="hallucinations" {{ ($mhp && $mhp->hallucinations == 1) ? 'checked' : '' }}>
                                    <input class="hallucinations" type="hidden" name="hallucinations" value="{{ ($mhp && $mhp->hallucinations == 1) ? 1 : 0 }}" />
                                </td>
                            </tr>
                            <tr>
                                <td>Delusions</td>
                                    <td class="text-center"><input class="form-check-input" type="checkbox" data-name="delusions" {{ ($mhp && $mhp->delusions == 1) ? 'checked' : '' }}>
                                    <input class="delusions" type="hidden" name="delusions" value="{{ ($mhp && $mhp->delusions == 1) ? 1 : 0 }}" />
                                </td>
                            </tr>
                            <tr>
                                <td>Suspicion</td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" data-name="suspicion" {{ ($mhp && $mhp->suspicion == 1) ? 'checked' : '' }}>
                                    <input class="suspicion" type="hidden" name="suspicion" value="{{ ($mhp && $mhp->suspicion == 1) ? 1 : 0 }}" />
                                </td>
                            </tr>
                            <tr>
                                <td>Severe verbal violence</td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" data-name="severe_verbal_violence" {{ ($mhp && $mhp->severe_verbal_violence == 1) ? 'checked' : '' }}>
                                    <input class="severe_verbal_violence" type="hidden" name="severe_verbal_violence" value="{{ ($mhp && $mhp->severe_verbal_violence == 1) ? 1 : 0 }}" />
                                </td>
                            </tr>
                            <tr>
                                <td>Physical Violence</td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" data-name="physical_violence" {{ ($mhp && $mhp->physical_violence == 1) ? 'checked' : '' }}>
                                    <input class="physical_violence" type="hidden" name="physical_violence" value="{{ ($mhp && $mhp->physical_violence == 1) ? 1 : 0 }}" />
                                </td>
                            </tr>
                            <tr>
                                <td>Breaking things</td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" data-name="breaking_things" {{ ($mhp && $mhp->breaking_things == 1) ? 'checked' : '' }}>
                                    <input class="breaking_things" type="hidden" name="breaking_things" value="{{ ($mhp && $mhp->breaking_things == 1) ? 1 : 0 }}" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="text" name="other_problems" class="form-control form-control-sm" placeholder="Others specify" value="{{ ($mhp) ? $mhp->other_problems : '' }}">
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
                            <td>Has the client received treatment for physical health problems in the past five years?</td><td class="text-center">
                                <input class="form-check-input" type="checkbox" data-name="treatment_past_five_years" {{ ($mhp && $mhp->treatment_past_five_years == 1) ? 'checked' : '' }}>
                                <input class="treatment_past_five_years" type="hidden" name="treatment_past_five_years" value="{{ ($mhp && $mhp->treatment_past_five_years == 1) ? 1 : 0 }}" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="text" class="form-control form-control-sm" name="treatment_past_five_years_details" placeholder="If yes, details" value="{{ ($mhp) ? $mhp->treatment_past_five_years_details : '' }}"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="text" class="form-control form-control-sm" name="head_injury_treatment_details" placeholder="Details of head injury and treatment provided if any" value="{{ ($mhp) ? $mhp->head_injury_treatment_details : '' }}"></td>
                        </tr>
                        <tr>
                            <td>Has the client ever been treated for mental health problems or met a psychiatrist in the past?</td><td class="text-center">
                                <input class="form-check-input" type="checkbox" data-name="met_psychiatrist" {{ ($mhp && $mhp->met_psychiatrist == 1) ? 'checked' : '' }}>
                                <input class="met_psychiatrist" type="hidden" name="met_psychiatrist" value="{{ ($mhp && $mhp->met_psychiatrist == 1) ? 1 : 0 }}" />
                            </td>
                        </tr>
                        <tr>
                            <td>Prior treatment for addiction?</td><td class="text-center">
                                <input class="form-check-input" type="checkbox" data-name="prior_treatment_addiction" {{ ($mhp && $mhp->prior_treatment_addiction == 1) ? 'checked' : '' }}>
                                <input class="prior_treatment_addiction" type="hidden" name="prior_treatment_addiction" value="{{ ($mhp && $mhp->prior_treatment_addiction == 1) ? 1 : 0 }}" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="text" class="form-control form-control-sm" name="prior_treatment_addiction_details" placeholder="If yes, details"></td>
                        </tr>
                        <tr>
                            <td>Willingness for admission</td><td class="text-center">
                                <select class="form-control form-control-sm" name="willing_to_admit">
                                    <option value="0">Select</option>
                                    @forelse($extras->where('category', 'admission') as $key => $reason)
                                        <option value="{{ $reason->id }}" {{ ($mhp && $mhp->willing_to_admit == $reason->id) ? 'selected' : '' }}>{{ $reason->name }}</option>
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
                <textarea class="form-control" placeholder="Counselling Notes / Remarks" name="consulting_remarks" rows="5">{{ ($mhp) ? $mhp->consulting_remarks : '' }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-4 float-end">
        <button type="submit" class="btn btn-submit btn-primary me-sm-3 me-1">Save</button>
        <button type="button" onclick="history.back()" class="btn btn-label-secondary">Cancel</button>
    </div>
</form>