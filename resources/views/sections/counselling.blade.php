<form method="post" action="{{ route('patient.counselling.couns.update', $file->id) }}" class="frm-tbl">
    @csrf
    <input type="hidden" name="patient_id" value="{{ $file->patient_id }}" />
    <input type="hidden" name="file_id" value="{{ $file->id }}" />
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
                                    <td>Tremors</td><td class="text-center">
                                        <input class="form-check-input" type="checkbox" data-name="tremors" {{ ($counselling && $counselling->tremors == 1) ? 'checked' : '' }}>
                                        <input class="tremors" type="hidden" name="tremors" value="{{ ($counselling && $counselling->tremors == 1) ? 1 : 0 }}" />
                                    </td>
                                    <td>
                                        Have you ever had suicidal thoughts?</td><td class="text-center"><input class="form-check-input" type="checkbox" data-name="suicidal_thought" {{ ($counselling && $counselling->suicidal_thought == 1) ? 'checked' : '' }}>
                                        <input class="suicidal_thought" type="hidden" name="suicidal_thought" value="{{ ($counselling && $counselling->suicidal_thought == 1) ? 1 : 0 }}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Sleeplessness</td><td class="text-center"><input class="form-check-input" type="checkbox" name="sleeplessness" data-name="sleeplessness" {{ ($counselling && $counselling->sleeplessness == 1) ? 'checked' : '' }}>
                                        <input class="sleeplessness" type="hidden" name="sleeplessness" value="{{ ($counselling && $counselling->sleeplessness == 1) ? 1 : 0 }}" />
                                    </td>
                                    <td>
                                        Have you ever attempted suicide?</td><td class="text-center"><input class="form-check-input" type="checkbox" data-name="suicidal_attempt" {{ ($counselling && $counselling->suicidal_attempt == 1) ? 'checked' : '' }}>
                                        <input class="suicidal_attempt" type="hidden" name="suicidal_attempt" value="{{ ($counselling && $counselling->suicidal_attempt == 1) ? 1 : 0 }}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Poor appetite</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" data-name="poor_appetite" {{ ($counselling && $counselling->poor_appetite == 1) ? 'checked' : '' }}>
                                        <input class="poor_appetite" type="hidden" name="poor_appetite" value="{{ ($counselling && $counselling->poor_appetite == 1) ? 1 : 0 }}" />
                                    </td>
                                    <td>If yes to above two questions ask: in the past two weeks have you had:<br>
                                    -	Any suicidal thoughts: 
                                    <input class="form-check-input" type="checkbox" data-name="suicidal_thought_past_two_weeks" {{ ($counselling && $counselling->suicidal_thought_past_two_weeks == 1) ? 'checked' : '' }}>
                                    <input class="suicidal_thought_past_two_weeks" type="hidden" name="suicidal_thought_past_two_weeks" value="{{ ($counselling && $counselling->suicidal_thought_past_two_weeks == 1) ? 1 : 0 }}" />
                                    <br>
                                    -	Any plans: <input class="form-check-input" type="checkbox" data-name="suicidal_plans" {{ ($counselling && $counselling->suicidal_plans == 1) ? 'checked' : '' }}>
                                    <input class="suicidal_plans" type="hidden" name="suicidal_plans" value="{{ ($counselling && $counselling->suicidal_plans == 1) ? 1 : 0 }}" />
                                    </td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td>Nausea / vomiting</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" data-name="vomiting" {{ ($counselling && $counselling->vomiting == 1) ? 'checked' : '' }}>
                                        <input class="vomiting" type="hidden" name="vomiting" value="{{ ($counselling && $counselling->vomiting == 1) ? 1 : 0 }}" />
                                    </td>
                                    <td>Hallucinations</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" data-name="hallucinations" {{ ($counselling && $counselling->hallucinations == 1) ? 'checked' : '' }}>
                                        <input class="hallucinations" type="hidden" name="hallucinations" value="{{ ($counselling && $counselling->hallucinations == 1) ? 1 : 0 }}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Blood vomiting</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" data-name="blood_vomiting" {{ ($counselling && $counselling->blood_vomiting == 1) ? 'checked' : '' }}>
                                        <input class="blood_vomiting" type="hidden" name="blood_vomiting" value="{{ ($counselling && $counselling->blood_vomiting == 1) ? 1 : 0 }}" />
                                    </td>
                                    <td>Delusions</td>
                                        <td class="text-center"><input class="form-check-input" type="checkbox" data-name="delusions" {{ ($counselling && $counselling->delusions == 1) ? 'checked' : '' }}>
                                        <input class="delusions" type="hidden" name="delusions" value="{{ ($counselling && $counselling->delusions == 1) ? 1 : 0 }}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Chest burn / abdominal pain</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" data-name="chest_burn" {{ ($counselling && $counselling->chest_burn == 1) ? 'checked' : '' }}>
                                        <input class="chest_burn" type="hidden" name="chest_burn" value="{{ ($counselling && $counselling->chest_burn == 1) ? 1 : 0 }}" />
                                    </td>
                                    <td>Suspicion</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" data-name="suspicion" {{ ($counselling && $counselling->suspicion == 1) ? 'checked' : '' }}>
                                        <input class="suspicion" type="hidden" name="suspicion" value="{{ ($counselling && $counselling->suspicion == 1) ? 1 : 0 }}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Hypertension</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" data-name="hypertension" {{ ($counselling && $counselling->hypertension == 1) ? 'checked' : '' }}>
                                        <input class="hypertension" type="hidden" name="hypertension" value="{{ ($counselling && $counselling->hypertension == 1) ? 1 : 0 }}" />
                                    </td>
                                    <td>Severe verbal violence</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" data-name="severe_verbal_violence" {{ ($counselling && $counselling->severe_verbal_violence == 1) ? 'checked' : '' }}>
                                        <input class="severe_verbal_violence" type="hidden" name="severe_verbal_violence" value="{{ ($counselling && $counselling->severe_verbal_violence == 1) ? 1 : 0 }}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Diabetes</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" data-name="diabetes" {{ ($counselling && $counselling->diabetes == 1) ? 'checked' : '' }}>
                                        <input class="diabetes" type="hidden" name="diabetes" value="{{ ($counselling && $counselling->diabetes == 1) ? 1 : 0 }}" />
                                    </td>
                                    <td>Physical Violence</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" data-name="physical_violence" {{ ($counselling && $counselling->physical_violence == 1) ? 'checked' : '' }}>
                                        <input class="physical_violence" type="hidden" name="physical_violence" value="{{ ($counselling && $counselling->physical_violence == 1) ? 1 : 0 }}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fits</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" data-name="fits" {{ ($counselling && $counselling->fits == 1) ? 'checked' : '' }}>
                                        <input class="fits" type="hidden" name="fits" value="{{ ($counselling && $counselling->fits == 1) ? 1 : 0 }}" />
                                    </td>
                                    <td>Breaking things</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" data-name="breaking_things" {{ ($counselling && $counselling->breaking_things == 1) ? 'checked' : '' }}>
                                        <input class="breaking_things" type="hidden" name="breaking_things" value="{{ ($counselling && $counselling->breaking_things == 1) ? 1 : 0 }}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Self-harm</td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" data-name="self_harm" {{ ($counselling && $counselling->self_harm == 1) ? 'checked' : '' }}>
                                        <input class="self_harm" type="hidden" name="self_harm" value="{{ ($counselling && $counselling->self_harm == 1) ? 1 : 0 }}" />
                                    </td>
                                    <td colspan="2">
                                        <input type="text" name="other_problems" class="form-control form-control-sm" placeholder="Others specify" value="{{ ($counselling) ? $counselling->other_problems : '' }}">
                                    </td>
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
                            <td>Has the client received treatment for physical health problems in the past five years?</td><td class="text-center">
                                <input class="form-check-input" type="checkbox" data-name="treatment_past_five_years" {{ ($counselling && $counselling->treatment_past_five_years == 1) ? 'checked' : '' }}>
                                <input class="treatment_past_five_years" type="hidden" name="treatment_past_five_years" value="{{ ($counselling && $counselling->treatment_past_five_years == 1) ? 1 : 0 }}" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="text" class="form-control form-control-sm" name="treatment_past_five_years_details" placeholder="If yes, details" value="{{ ($counselling) ? $counselling->treatment_past_five_years_details : '' }}"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="text" class="form-control form-control-sm" name="head_injury_treatment_details" placeholder="Details of head injury and treatment provided if any" value="{{ ($counselling) ? $counselling->head_injury_treatment_details : '' }}"></td>
                        </tr>
                        <tr>
                            <td>Has the client ever been treated for mental health problems or met a psychiatrist in the past?</td><td class="text-center">
                                <input class="form-check-input" type="checkbox" data-name="met_psychiatrist" {{ ($counselling && $counselling->met_psychiatrist == 1) ? 'checked' : '' }}>
                                <input class="met_psychiatrist" type="hidden" name="met_psychiatrist" value="{{ ($counselling && $counselling->met_psychiatrist == 1) ? 1 : 0 }}" />
                            </td>
                        </tr>
                        <tr>
                            <td>Prior treatment for addiction?</td><td class="text-center">
                                <input class="form-check-input" type="checkbox" data-name="prior_treatment_addiction" {{ ($counselling && $counselling->prior_treatment_addiction == 1) ? 'checked' : '' }}>
                                <input class="prior_treatment_addiction" type="hidden" name="prior_treatment_addiction" value="{{ ($counselling && $counselling->prior_treatment_addiction == 1) ? 1 : 0 }}" />
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
                                        <option value="{{ $reason->id }}" {{ ($counselling && $counselling->willing_to_admit == $reason->id) ? 'selected' : '' }}>{{ $reason->name }}</option>
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
                    <textarea class="form-control" placeholder="Counselling Notes / Remarks" name="consulting_remarks" rows="5">{{ ($counselling) ? $counselling->consulting_remarks : '' }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-4 float-end">
        <button type="submit" class="btn btn-submit btn-primary me-sm-3 me-1">Save</button>
        <button type="button" onclick="history.back()" class="btn btn-label-secondary">Cancel</button>
    </div>
</form>