<form method="post" action="{{ route('patient.counselling.sud.update', $file->id) }}" class="frm-tbl">
    @csrf
    <input type="hidden" name="patient_id" value="{{ $file->patient_id }}" />
    <input type="hidden" name="file_id" value="{{ $file->id }}" />
    <div class="row g-3">
        <div class="col-md-6">
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label req">Years of substance use</label>
                    <input type="text" class="form-control" name="years_of_substance_use" placeholder="0 years" value="{{ ($sud) ? $sud->years_of_substance_use : old('years_of_substance_use') }}">
                    @error('years_of_substance_use')
                        <small class="text-danger">{{ $errors->first('years_of_substance_use') }}</small>
                    @enderror
                </div>
                <div class="col-md-5">
                    <label class="form-label req">Duration of heavy or problematic use</label>
                    <input type="text" class="form-control" name="duration_of_heavy_or_problematic_use" placeholder="0 years" value="{{ ($sud) ? $sud->duration_of_heavy_or_problematic_use : old('duration_of_heavy_or_problematic_use') }}">
                    @error('duration_of_heavy_or_problematic_use')
                        <small class="text-danger">{{ $errors->first('duration_of_heavy_or_problematic_use') }}</small>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label req">Date of last drink</label>
                    <input type="date" class="form-control" name="date_of_last_drink" placeholder="0 years" value="{{ ($sud) ? $sud->date_of_last_drink->format('Y-m-d') : old('date_of_last_drink') }}">
                    @error('date_of_last_drink')
                        <small class="text-danger">{{ $errors->first('date_of_last_drink') }}</small>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label">Date of last drug use</label>
                    <input type="date" class="form-control" name="date_of_last_drug_use" placeholder="0 years" value="{{ ($sud) ? $sud->date_of_last_drug_use->format('Y-m-d') : old('date_of_last_drug_use') }}">
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
                                <td>Tremors</td><td class="text-center">
                                    <input class="form-check-input" type="checkbox" data-name="tremors" {{ ($sud && $sud->tremors == 1) ? 'checked' : '' }}>
                                    <input class="tremors" type="hidden" name="tremors" value="{{ ($sud && $sud->tremors == 1) ? 1 : 0 }}" />
                                </td>
                                <td>
                                    Have you ever had suicidal thoughts?</td><td class="text-center"><input class="form-check-input" type="checkbox" data-name="suicidal_thought" {{ ($sud && $sud->suicidal_thought == 1) ? 'checked' : '' }}>
                                    <input class="suicidal_thought" type="hidden" name="suicidal_thought" value="{{ ($sud && $sud->suicidal_thought == 1) ? 1 : 0 }}" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Sleeplessness</td><td class="text-center"><input class="form-check-input" type="checkbox" name="sleeplessness" data-name="sleeplessness" {{ ($sud && $sud->sleeplessness == 1) ? 'checked' : '' }}>
                                    <input class="sleeplessness" type="hidden" name="sleeplessness" value="{{ ($sud && $sud->sleeplessness == 1) ? 1 : 0 }}" />
                                </td>
                                <td>
                                    Have you ever attempted suicide?</td><td class="text-center"><input class="form-check-input" type="checkbox" data-name="suicidal_attempt" {{ ($sud && $sud->suicidal_attempt == 1) ? 'checked' : '' }}>
                                    <input class="suicidal_attempt" type="hidden" name="suicidal_attempt" value="{{ ($sud && $sud->suicidal_attempt == 1) ? 1 : 0 }}" />
                                </td>
                            </tr>
                            <tr>
                                <td>Poor appetite</td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" data-name="poor_appetite" {{ ($sud && $sud->poor_appetite == 1) ? 'checked' : '' }}>
                                    <input class="poor_appetite" type="hidden" name="poor_appetite" value="{{ ($sud && $sud->poor_appetite == 1) ? 1 : 0 }}" />
                                </td>
                                <td>If yes to above two questions ask: in the past two weeks have you had:<br>
                                -	Any suicidal thoughts: 
                                <input class="form-check-input" type="checkbox" data-name="suicidal_thought_past_two_weeks" {{ ($sud && $sud->suicidal_thought_past_two_weeks == 1) ? 'checked' : '' }}>
                                <input class="suicidal_thought_past_two_weeks" type="hidden" name="suicidal_thought_past_two_weeks" value="{{ ($sud && $sud->suicidal_thought_past_two_weeks == 1) ? 1 : 0 }}" />
                                <br>
                                -	Any plans: <input class="form-check-input" type="checkbox" data-name="suicidal_plans" {{ ($sud && $sud->suicidal_plans == 1) ? 'checked' : '' }}>
                                <input class="suicidal_plans" type="hidden" name="suicidal_plans" value="{{ ($sud && $sud->suicidal_plans == 1) ? 1 : 0 }}" />
                                </td>
                                <td class="text-center"></td>
                            </tr>
                            <tr>
                                <td>Nausea / vomiting</td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" data-name="vomiting" {{ ($sud && $sud->vomiting == 1) ? 'checked' : '' }}>
                                    <input class="vomiting" type="hidden" name="vomiting" value="{{ ($sud && $sud->vomiting == 1) ? 1 : 0 }}" />
                                </td>
                                <td>Hallucinations</td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" data-name="hallucinations" {{ ($sud && $sud->hallucinations == 1) ? 'checked' : '' }}>
                                    <input class="hallucinations" type="hidden" name="hallucinations" value="{{ ($sud && $sud->hallucinations == 1) ? 1 : 0 }}" />
                                </td>
                            </tr>
                            <tr>
                                <td>Blood vomiting</td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" data-name="blood_vomiting" {{ ($sud && $sud->blood_vomiting == 1) ? 'checked' : '' }}>
                                    <input class="blood_vomiting" type="hidden" name="blood_vomiting" value="{{ ($sud && $sud->blood_vomiting == 1) ? 1 : 0 }}" />
                                </td>
                                <td>Delusions</td>
                                    <td class="text-center"><input class="form-check-input" type="checkbox" data-name="delusions" {{ ($sud && $sud->delusions == 1) ? 'checked' : '' }}>
                                    <input class="delusions" type="hidden" name="delusions" value="{{ ($sud && $sud->delusions == 1) ? 1 : 0 }}" />
                                </td>
                            </tr>
                            <tr>
                                <td>Chest burn / abdominal pain</td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" data-name="chest_burn" {{ ($sud && $sud->chest_burn == 1) ? 'checked' : '' }}>
                                    <input class="chest_burn" type="hidden" name="chest_burn" value="{{ ($sud && $sud->chest_burn == 1) ? 1 : 0 }}" />
                                </td>
                                <td>Suspicion</td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" data-name="suspicion" {{ ($sud && $sud->suspicion == 1) ? 'checked' : '' }}>
                                    <input class="suspicion" type="hidden" name="suspicion" value="{{ ($sud && $sud->suspicion == 1) ? 1 : 0 }}" />
                                </td>
                            </tr>
                            <tr>
                                <td>Hypertension</td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" data-name="hypertension" {{ ($sud && $sud->hypertension == 1) ? 'checked' : '' }}>
                                    <input class="hypertension" type="hidden" name="hypertension" value="{{ ($sud && $sud->hypertension == 1) ? 1 : 0 }}" />
                                </td>
                                <td>Severe verbal violence</td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" data-name="severe_verbal_violence" {{ ($sud && $sud->severe_verbal_violence == 1) ? 'checked' : '' }}>
                                    <input class="severe_verbal_violence" type="hidden" name="severe_verbal_violence" value="{{ ($sud && $sud->severe_verbal_violence == 1) ? 1 : 0 }}" />
                                </td>
                            </tr>
                            <tr>
                                <td>Diabetes</td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" data-name="diabetes" {{ ($sud && $sud->diabetes == 1) ? 'checked' : '' }}>
                                    <input class="diabetes" type="hidden" name="diabetes" value="{{ ($sud && $sud->diabetes == 1) ? 1 : 0 }}" />
                                </td>
                                <td>Physical Violence</td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" data-name="physical_violence" {{ ($sud && $sud->physical_violence == 1) ? 'checked' : '' }}>
                                    <input class="physical_violence" type="hidden" name="physical_violence" value="{{ ($sud && $sud->physical_violence == 1) ? 1 : 0 }}" />
                                </td>
                            </tr>
                            <tr>
                                <td>Fits</td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" data-name="fits" {{ ($sud && $sud->fits == 1) ? 'checked' : '' }}>
                                    <input class="fits" type="hidden" name="fits" value="{{ ($sud && $sud->fits == 1) ? 1 : 0 }}" />
                                </td>
                                <td>Breaking things</td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" data-name="breaking_things" {{ ($sud && $sud->breaking_things == 1) ? 'checked' : '' }}>
                                    <input class="breaking_things" type="hidden" name="breaking_things" value="{{ ($sud && $sud->breaking_things == 1) ? 1 : 0 }}" />
                                </td>
                            </tr>
                            <tr>
                                <td>Self-harm</td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" data-name="self_harm" {{ ($sud && $sud->self_harm == 1) ? 'checked' : '' }}>
                                    <input class="self_harm" type="hidden" name="self_harm" value="{{ ($sud && $sud->self_harm == 1) ? 1 : 0 }}" />
                                </td>
                                <td colspan="2">
                                    <input type="text" name="other_problems" class="form-control form-control-sm" placeholder="Others specify" value="{{ ($sud) ? $sud->other_problems : '' }}">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="fw-bold mt-3">Present pattern of substance use: <a href="javascript:void(0)" onclick="javascript:addRow('substance');"><i class="fa fa-plus text-info"></i></a></p>
                    <table class="table table-bordered table-sm">
                        <thead><tr><th>Type</th><th>Qty</th><th>Frequency</th><th>Duration</th><th></th></tr></thead>
                        <tbody class="tblSubstance">
                            @if($sud->substances)
                                @foreach($sud->substances as $key => $val)
                                <tr>
                                    <td><input class="form-control form-control-sm" type="text" name="type[]" placeholder="Type" value="{{ $val->type }}"></td>
                                    <td><input class="form-control form-control-sm" type="number" name="qty[]" placeholder="Qty" value="{{ $val->qty }}"></td>
                                    <td><input class="form-control form-control-sm" type="text" name="frequency[]" placeholder="Frequency" value="{{ $val->frequency }}"></td>
                                    <td><input class="form-control form-control-sm" type="text" name="duration[]" placeholder="Duration" value="{{ $val->duration }}"></td>
                                    @if($key == 0)
                                    <td></td>
                                    @else
                                    <td class="text-center"><a href='javascript:void(0)' onclick="$(this).parent().parent().remove();"><i class="fa fa-times text-danger"></i></a></td>
                                    @endif
                                </tr>
                                @endforeach
                            @else
                            <tr>
                                <td><input class="form-control form-control-sm" type="text" name="type[]" placeholder="Type"></td>
                                <td><input class="form-control form-control-sm" type="number" name="qty[]" placeholder="Qty"></td>
                                <td><input class="form-control form-control-sm" type="text" name="frequency[]" placeholder="Frequency"></td>
                                <td><input class="form-control form-control-sm" type="text" name="duration[]" placeholder="Duration"></td>
                                <td></td>
                            </tr>
                            @endif
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
                                <td>Has the client received treatment for physical health problems in the past five years?</td><td class="text-center">
                                    <input class="form-check-input" type="checkbox" data-name="treatment_past_five_years" {{ ($sud && $sud->treatment_past_five_years == 1) ? 'checked' : '' }}>
                                    <input class="treatment_past_five_years" type="hidden" name="treatment_past_five_years" value="{{ ($sud && $sud->treatment_past_five_years == 1) ? 1 : 0 }}" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="text" class="form-control form-control-sm" name="treatment_past_five_years_details" placeholder="If yes, details" value="{{ ($sud) ? $sud->treatment_past_five_years_details : '' }}"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="text" class="form-control form-control-sm" name="head_injury_treatment_details" placeholder="Details of head injury and treatment provided if any" value="{{ ($sud) ? $sud->head_injury_treatment_details : '' }}"></td>
                            </tr>
                            <tr>
                                <td>Has the client ever been treated for mental health problems or met a psychiatrist in the past?</td><td class="text-center">
                                    <input class="form-check-input" type="checkbox" data-name="met_psychiatrist" {{ ($sud && $sud->met_psychiatrist == 1) ? 'checked' : '' }}>
                                    <input class="met_psychiatrist" type="hidden" name="met_psychiatrist" value="{{ ($sud && $sud->met_psychiatrist == 1) ? 1 : 0 }}" />
                                </td>
                            </tr>
                            <tr>
                                <td>Prior treatment for addiction?</td><td class="text-center">
                                    <input class="form-check-input" type="checkbox" data-name="prior_treatment_addiction" {{ ($sud && $sud->prior_treatment_addiction == 1) ? 'checked' : '' }}>
                                    <input class="prior_treatment_addiction" type="hidden" name="prior_treatment_addiction" value="{{ ($sud && $sud->prior_treatment_addiction == 1) ? 1 : 0 }}" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="text" class="form-control form-control-sm" name="prior_treatment_addiction_details" placeholder="If yes, details"></td>
                            </tr>
                            <tr>
                                <td>Reason given by client for accessing help now?</td><td class="text-center">
                                    <select class="form-control form-control-sm" name="reason_given_by_client">
                                        <option value="0">Select</option>
                                        @forelse($extras->where('category', 'help') as $key => $reason)
                                            <option value="{{ $reason->id }}" {{ ($sud && $sud->reason_given_by_client == $reason->id) ? 'selected' : '' }}>{{ $reason->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Recognizes problems related to drinking</td><td class="text-center">
                                    <select class="form-control form-control-sm" name="recognize_problems">
                                        <option value="0">Select</option>
                                        @forelse($extras->where('category', 'drink') as $key => $reason)
                                            <option value="{{ $reason->id }}" {{ ($sud && $sud->recognize_problems == $reason->id) ? 'selected' : '' }}>{{ $reason->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Patients willingness to alter drinking pattern</td><td class="text-center">
                                    <select class="form-control form-control-sm" name="alter_drinking_pattern">
                                        <option value="0">Select</option>
                                        @forelse($extras->where('category', 'pattern') as $key => $reason)
                                            <option value="{{ $reason->id }}" {{ ($sud && $sud->alter_drinking_pattern == $reason->id) ? 'selected' : '' }}>{{ $reason->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Willingness for admission</td><td class="text-center">
                                    <select class="form-control form-control-sm" name="willing_to_admit">
                                        <option value="0">Select</option>
                                        @forelse($extras->where('category', 'admission') as $key => $reason)
                                            <option value="{{ $reason->id }}" {{ ($sud && $sud->willing_to_admit == $reason->id) ? 'selected' : '' }}>{{ $reason->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Room Allotted</td><td class="text-center">
                                    <select class="form-control form-control-sm" name="room_allotted">
                                        <option value="0">Select</option>
                                        @forelse($extras->where('category', 'room') as $key => $reason)
                                            <option value="{{ $reason->id }}" {{ ($sud && $sud->room_allotted == $reason->id) ? 'selected' : '' }}>{{ $reason->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Delirium Tremens</td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" data-name="delirium_tremens" {{ ($sud && $sud->delirium_tremens == 1) ? 'checked' : '' }}>
                                    <input class="delirium_tremens" type="hidden" name="delirium_tremens" value="{{ ($sud && $sud->delirium_tremens == 1) ? 1 : 0 }}" />
                                </td>
                            </tr>
                            <tr>
                                <td>Suicidal Risk</td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" data-name="suicidal_risk" {{ ($sud && $sud->suicidal_risk == 1) ? 'checked' : '' }}>
                                    <input class="suicidal_risk" type="hidden" name="suicidal_risk" value="{{ ($sud && $sud->suicidal_risk == 1) ? 1 : 0 }}" />
                                </td>
                            </tr>
                            <tr>
                                <td>Violence</td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" data-name="violence" {{ ($sud && $sud->violence == 1) ? 'checked' : '' }}>
                                    <input class="violence" type="hidden" name="violence" value="{{ ($sud && $sud->violence == 1) ? 1 : 0 }}" />
                                </td>
                            </tr>
                            <tr>
                                <td>Cardiac Problems</td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" data-name="cardiac_problems" {{ ($sud && $sud->cardiac_problems == 1) ? 'checked' : '' }}>
                                    <input class="cardiac_problems" type="hidden" name="cardiac_problems" value="{{ ($sud && $sud->cardiac_problems == 1) ? 1 : 0 }}" />
                                </td>
                            </tr>
                            <tr>
                                <td>TB</td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" data-name="tb" {{ ($sud && $sud->tb == 1) ? 'checked' : '' }}>
                                    <input class="tb" type="hidden" name="tb" value="{{ ($sud && $sud->tb == 1) ? 1 : 0 }}" />
                                </td>
                            </tr>
                            <tr>
                                <td>HIV/AIDS/STDs</td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" data-name="hiv" {{ ($sud && $sud->hiv == 1) ? 'checked' : '' }}>
                                    <input class="hiv" type="hidden" name="hiv" value="{{ ($sud && $sud->hiv == 1) ? 1 : 0 }}" />
                                </td>
                            </tr>
                            <tr>
                                <td>Hepatitis</td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" data-name="hepatitis" {{ ($sud && $sud->hepatitis == 1) ? 'checked' : '' }}>
                                    <input class="hepatitis" type="hidden" name="hepatitis" value="{{ ($sud && $sud->hepatitis == 1) ? 1 : 0 }}" />
                                </td>
                            </tr>
                            <tr>
                                <td>Other Co-Morbidities </td>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" data-name="co_morbidities" {{ ($sud && $sud->co_morbidities == 1) ? 'checked' : '' }}>
                                    <input class="co_morbidities" type="hidden" name="co_morbidities" value="{{ ($sud && $sud->co_morbidities == 1) ? 1 : 0 }}" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>                
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <textarea class="form-control" placeholder="Counselling Notes / Remarks" name="consulting_remarks" rows="5">{{ ($sud) ? $sud->consulting_remarks : '' }}</textarea>
                </div>
            </div>                
        </div>
    </div>
    <div class="pt-4 float-end">
        <button type="submit" class="btn btn-submit btn-primary me-sm-3 me-1">Save</button>
        <button type="button" onclick="history.back()" class="btn btn-label-secondary">Cancel</button>
    </div>
</form>