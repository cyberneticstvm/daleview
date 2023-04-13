<form method="post" action="{{ route('patient.counselling.smoking.update', $file->id) }}" class="frm-tbl">
    @csrf
    <input type="hidden" name="patient_id" value="{{ $file->patient_id }}" />
    <input type="hidden" name="file_id" value="{{ $file->id }}" />
    <div class="row g-3">
        <div class="col-md-6">
            <div class="row g-3">
                <div class="col-md-12">
                    <label class="form-label">Details of Drug Use</label>
                    <input type="text" class="form-control" name="details_of_drug_use" placeholder="Details of Drug Use" value="{{ ($sc) ? $sc->details_of_drug_use : '' }}">
                </div>
                <div class="col-md-12">
                    <label class="form-label">What motivates you to stop tobacco?</label>
                    <input type="text" class="form-control" name="what_motivate_stop_tobacco" placeholder="What motivates you to stop tobacco?" value="{{ ($sc) ? $sc->what_motivate_stop_tobacco : '' }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Tobacco Type</label>
                    <select class="form-control form-control-sm" name="tobacco_type">
                        <option value="0">Select</option>
                        @forelse($extras->where('category', 'tobacco') as $key => $cig)
                            <option value="{{ $cig->id }}" {{ ($sc && $sc->tobacco_type == $cig->id) ? 'selected' : '' }}>{{ $cig->name }}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-md-12">
                    <p class="fw-bold mt-3">Fagerstrom Test for Nicotine Dependence </p>
                    <table class="table table-bordered table-sm">
                        <thead><tr><th>SL No.</th><th>Description</th><th>Duration</th><th>Score</th></tr></thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>How soon after you wake up do you smoke the first cigarette?</td>
                                <td>
                                    <select class="form-control form-control-sm" name="how_soon_first_cigarette_after_wakeup">
                                        <option value="">Select</option>
                                        <option value="3" {{ ($sc && $sc->how_soon_first_cigarette_after_wakeup == 3) ? 'selected' : '' }}>Within 5minutes</option>
                                        <option value="2" {{ ($sc && $sc->how_soon_first_cigarette_after_wakeup == 2) ? 'selected' : '' }}>5-30 minute</option>
                                        <option value="1" {{ ($sc && $sc->how_soon_first_cigarette_after_wakeup == 1) ? 'selected' : '' }}>31-60 minutes</option>
                                        <option value="0" {{ ($sc && $sc->how_soon_first_cigarette_after_wakeup == 0) ? 'selected' : '' }}>> 60 min</option>
                                    </select>
                                </td>
                                <td class="text-center">{{ ($sc) ? $sc->how_soon_first_cigarette_after_wakeup : '' }}</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Does it feel difficult for you to abstain from smoking in places where smoking is banned (e.g Church, Library, Train, Restaurant etc)</td>
                                <td>
                                    <select class="form-control form-control-sm" name="difficult_to_abstain">
                                        <option value="">Select</option>
                                        <option value="1" {{ ($sc && $sc->difficult_to_abstain == 1) ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ ($sc && $sc->difficult_to_abstain == 0) ? 'selected' : '' }}>No</option>
                                    </select>
                                </td>
                                <td class="text-center">{{ ($sc) ? $sc->difficult_to_abstain : '' }}</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Which cigarette would it be the most difficult for you to give up?</td>
                                <td>
                                    <select class="form-control form-control-sm" name="cigerette_to_give_up">
                                        <option value="">Select</option>
                                        <option value="1" {{ ($sc && $sc->cigerette_to_give_up == 1) ? 'selected' : '' }}>The first cigarette in the morning</option>
                                        <option value="0" {{ ($sc && $sc->cigerette_to_give_up == 0) ? 'selected' : '' }}>All the others</option>
                                    </select>
                                </td>
                                <td class="text-center">{{ ($sc) ? $sc->cigerette_to_give_up : '' }}</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>How many cigarettes/ days do you smoke</td>
                                <td>
                                    <select class="form-control form-control-sm" name="cigerettes_per_day">
                                        <option value="">Select</option>
                                        <option value="0" {{ ($sc && $sc->cigerettes_per_day == 0) ? 'selected' : '' }}>10 or less</option>
                                        <option value="1" {{ ($sc && $sc->cigerettes_per_day == 1) ? 'selected' : '' }}>11-20</option>
                                        <option value="2" {{ ($sc && $sc->cigerettes_per_day == 2) ? 'selected' : '' }}>21-30</option>
                                        <option value="3" {{ ($sc && $sc->cigerettes_per_day == 3) ? 'selected' : '' }}>31 or more</option>
                                    </select>
                                </td>
                                <td class="text-center">{{ ($sc) ? $sc->cigerettes_per_day : '' }}</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Do you smoke more frequently in the first hours after you wake up than in the rest of the day?</td>
                                <td>
                                    <select class="form-control form-control-sm" name="cigerret_smoking_frequency_day_or_morning">
                                        <option value="">Select</option>
                                        <option value="1" {{ ($sc && $sc->cigerret_smoking_frequency_day_or_morning == 1) ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ ($sc && $sc->cigerret_smoking_frequency_day_or_morning == 0) ? 'selected' : '' }}>No</option>
                                    </select>
                                </td>
                                <td class="text-center">{{ ($sc) ? $sc->cigerret_smoking_frequency_day_or_morning : '' }}</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Do you smoke if you are so ill that you are immobilized in bed most of the day?</td>
                                <td>
                                    <select class="form-control form-control-sm" name="cigerret_smoking_in_ill">
                                        <option value="">Select</option>
                                        <option value="1" {{ ($sc && $sc->cigerret_smoking_in_ill == 1) ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ ($sc && $sc->cigerret_smoking_in_ill == 0) ? 'selected' : '' }}>No</option>
                                    </select>
                                </td>
                                <td class="text-center">{{ ($sc) ? $sc->cigerret_smoking_in_ill : '' }}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr><td colspan="3" class="text-end fw-bold">Total Score</td><td class="tot-score text-center fw-bold">{{ ($sc) ? $sc->how_soon_first_cigarette_after_wakeup+$sc->difficult_to_abstain+$sc->cigerette_to_give_up+$sc->cigerettes_per_day+$sc->cigerret_smoking_frequency_day_or_morning+$sc->cigerret_smoking_in_ill : 0 }}</td><tr>
                            <tr><td colspan="2">0 - 3</td><td>4 - 6</td><td>7 - 10</td></tr>
                            <tr><td colspan="2">No or low tobacco dependence</td><td>Medium tobacco dependence</td><td>High tobacco dependence</td></tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Cigerettes - Packs per day (10 cigarettes/pack)</label>
                    <input type="text" class="form-control" name="cigerettes_pack_per_day" placeholder="Packs per day (10 cigarettes/pack)" value="{{ ($sc) ? $sc->cigerettes_pack_per_day : '' }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Beedi - Packs per day (10 cigarettes/pack)</label>
                    <input type="text" class="form-control" name="beedi_pack_per_day" placeholder="Packs per day (10 cigarettes/pack)" value="{{ ($sc) ? $sc->beedi_pack_per_day : '' }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Smokeless - Pouches/Cans/Packets per day</label>
                    <input type="text" class="form-control" name="smokless_pack_per_day" placeholder="Pouches/Cans/Packets per day" value="{{ ($sc) ? $sc->smokless_pack_per_day : '' }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Smokeless Type and Name</label>
                    <input type="text" class="form-control" name="smokeless_type_and_name" placeholder="Smokeless Type and Name" value="{{ ($sc) ? $sc->smokeless_type_and_name : '' }}">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Other tobacco products - Amounts spent per day / week</label>
                    <input type="text" class="form-control" name="other_tobacco_product" placeholder="Amounts spent per day / week" value="{{ ($sc) ? $sc->other_tobacco_product : '' }}">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Other Drug Details</label>
                    <input type="text" class="form-control" name="other_drug_detail" placeholder="Other Drug Details" value="{{ ($sc) ? $sc->other_drug_detail : '' }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Approx. Date of last quit attempt</label>
                    <input type="text" class="form-control" name="date_of_last_quit_attempt" placeholder="Approx. Date of last quit attempt" value="{{ ($sc) ? $sc->date_of_last_quit_attempt : '' }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">How long did you quit that time?</label>
                    <input type="text" class="form-control" name="how_long_quit_last_time" placeholder="How long did you quit that time?" value="{{ ($sc) ? $sc->how_long_quit_last_time : '' }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Longest period of time quit in past</label>
                    <input type="text" class="form-control" name="longest_period_of_quit" placeholder="Longest period of time quit in past" value="{{ ($sc) ? $sc->longest_period_of_quit : '' }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">How long ago?</label>
                    <input type="text" class="form-control" name="how_long_ago" placeholder="How long ago?" value="{{ ($sc) ? $sc->how_long_ago : '' }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">What caused relapse?</label>
                    <input type="text" class="form-control" name="what_caused_relapse" placeholder="What caused relapse?" value="{{ ($sc) ? $sc->what_caused_relapse : '' }}">
                </div>
            </div>
        </div>
        <div class="col-md-6">            
            <div class="row">
                <p class="fw-bold mt-3">Medication used in previous quit attempt:</p>
                @forelse($extras->where('category', 'medication') as $key => $med)
                    @php $medname = str_replace(' ', '_', strtolower($med->name)); @endphp
                    <div class="col-3"><input class="form-check-input" type="checkbox" data-name="{{ $medname }}" {{ ($sc && $sc->value($medname) == 1) ? 'checked' : '' }}>&nbsp;{{ $med->name }}</div>
                    <input class="{{ $medname }}" type="hidden" name="{{ $medname }}" value="{{ ($sc && $sc->value($medname) == 1) ? 1 : 0 }}" />
                @empty
                @endforelse
            </div>
            <div class="row">
                <p class="fw-bold mt-3">Medical History:</p>
                @forelse($extras->where('category', 'med-history') as $key => $med)
                    @php $medname = str_replace(' ', '_', strtolower($med->name)); @endphp
                    <div class="col-3"><input class="form-check-input" type="checkbox" data-name="{{ $medname }}" {{ ($sc && $sc->value($medname) == 1) ? 'checked' : '' }}>&nbsp;{{ $med->name }}</div>
                    <input class="{{ $medname }}" type="hidden" name="{{ $medname }}" value="{{ ($sc && $sc->value($medname) == 1) ? 1 : 0 }}" />
                @empty
                @endforelse
            </div>
            <div class="row">
                <p class="fw-bold mt-3">Tobacco Withdrawal when stops or reduce the quantity:</p>
                @forelse($extras->where('category', 'tob-red-qty') as $key => $med)
                    @php $medname = str_replace(' ', '_', strtolower($med->name)); @endphp
                    <div class="col-3"><input class="form-check-input" type="checkbox" data-name="{{ $medname }}" {{ ($sc && $sc->value($medname) == 1) ? 'checked' : '' }}>&nbsp;{{ $med->name }}</div>
                    <input class="{{ $medname }}" type="hidden" name="{{ $medname }}" value="{{ ($sc && $sc->value($medname) == 1) ? 1 : 0 }}" />
                @empty
                @endforelse
            </div>
            <div class="row">
                <div class="col mt-3">
                    <textarea class="form-control" placeholder="Counselling Notes / Remarks" name="counselling_remarks" rows="5">{{ ($sc && $sc->counselling_remarks) ? $sc->counselling_remarks : '' }}</textarea>
                </div>
            </div>
            <div class="row mt-3">
                <p class="fw-bold mt-3">Followup Plan</p>
                <div class="col-md-3">
                    <label class="form-label">Quit Date</label>
                    <input type="date" class="form-control" name="quit_date" value="{{ ($sc && $sc->quit_date) ? $sc->quit_date->format('Y-m-d') : '' }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Quit date call</label>
                    <input type="text" class="form-control" name="quit_date_call" placeholder="Quit date call" value="{{ ($sc && $sc->quit_date_call) ? $sc->quit_date_call : '' }}">
                </div>  
                <div class="col-md-3">
                    <label class="form-label">Next Followup Date</label>
                    <input type="date" class="form-control" name="next_follow_up_date" value="{{ ($sc && $sc->next_follow_up_date) ? $sc->next_follow_up_date->format('Y-m-d') : '' }}">
                </div>          
            </div>
            <div class="row">
                <p class="fw-bold mt-3">Handouts Provided</p>
                @forelse($extras->where('category', 'handouts') as $key => $hand)
                    @php $medname = str_replace(' ', '_', strtolower($hand->name)); @endphp
                    <div class="col-3"><input class="form-check-input" type="checkbox" data-name="{{ $medname }}" {{ ($sc && $sc->value($medname) == 1) ? 'checked' : '' }}>&nbsp;{{ $hand->name }}</div>
                    <input class="{{ $medname }}" type="hidden" name="{{ $medname }}" value="{{ ($sc && $sc->value($medname) == 1) ? 1 : 0 }}" />
                @empty
                @endforelse
            </div>
            <div class="row">
                <p class="fw-bold mt-3">PHARMACOTHERAPY</p>
                <div class="col">
                    <textarea class="form-control" placeholder="PHARMACOTHERAPY" name="pharmacotherapy" rows="5">{{ ($sc && $sc->pharmacotherapy) ? $sc->pharmacotherapy : '' }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-4 float-end">
        <button type="submit" class="btn btn-submit btn-primary me-sm-3 me-1">Save</button>
        <button type="button" onclick="history.back()" class="btn btn-label-secondary">Cancel</button>
    </div>
</form>