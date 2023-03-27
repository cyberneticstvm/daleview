<form method="post" action="">
    @csrf
    <div class="row g-3">
        <div class="col-md-6">
            <div class="row g-3">
                <div class="col-md-12">
                    <label class="form-label">Details of Drug Use</label>
                    <input type="text" class="form-control" name="details_of_drug_use" placeholder="Details of Drug Use" value="{{ old('details_of_drug_use') }}">
                </div>
                <div class="col-md-12">
                    <label class="form-label">What motivates you to stop tobacco?</label>
                    <input type="text" class="form-control" name="" placeholder="What motivates you to stop tobacco?" value="{{ old('') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Tobacco Type</label>
                    <select class="form-control form-control-sm" name="">
                        <option value="0">Select</option>
                        @forelse($extras->where('category', 'tobacco') as $key => $cig)
                            <option value="{{ $cig->id }}" {{ (old('') == $cig->id) ? 'selected' : '' }}>{{ $cig->name }}</option>
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
                                    <select class="form-control form-control-sm" name="">
                                        <option value="">Select</option>
                                        <option value="3">Within 5minutes</option>
                                        <option value="2">5-30 minute</option>
                                        <option value="1">31-60 minutes</option>
                                        <option value="0">> 60 min</option>
                                    </select>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Does it feel difficult for you to abstain from smoking in places where smoking is banned (e.g Church, Library, Train, Restaurant etc)</td>
                                <td>
                                    <select class="form-control form-control-sm" name="">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Which cigarette would it be the most difficult for you to give up?</td>
                                <td>
                                    <select class="form-control form-control-sm" name="">
                                        <option value="">Select</option>
                                        <option value="1">The first cigarette in the morning</option>
                                        <option value="0">All the others</option>
                                    </select>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>How many cigarettes/ days do you smoke</td>
                                <td>
                                    <select class="form-control form-control-sm" name="">
                                        <option value="">Select</option>
                                        <option value="0">10 or less</option>
                                        <option value="1">11-20</option>
                                        <option value="2">21-30</option>
                                        <option value="3">31 or more</option>
                                    </select>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Do you smoke more frequently in the first hours after you wake up than in the rest of the day?</td>
                                <td>
                                    <select class="form-control form-control-sm" name="">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Do you smoke if you are so ill that you are immobilized in bed most of the day?</td>
                                <td>
                                    <select class="form-control form-control-sm" name="">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr><td colspan="3" class="text-end fw-bold">Total Score</td><td class="tot-score text-end fw-bold"></td><tr>
                            <tr><td colspan="2">0 - 3</td><td>4 - 6</td><td>7 - 10</td></tr>
                            <tr><td colspan="2">No or low tobacco dependence</td><td>Medium tobacco dependence</td><td>High tobacco dependence</td></tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Cigerettes - Packs per day (10 cigarettes/pack)</label>
                    <input type="text" class="form-control" name="" placeholder="Packs per day (10 cigarettes/pack)" value="{{ old('') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Beedi - Packs per day (10 cigarettes/pack)</label>
                    <input type="text" class="form-control" name="" placeholder="Packs per day (10 cigarettes/pack)" value="{{ old('') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Smokeless - Pouches/Cans/Packets per day</label>
                    <input type="text" class="form-control" name="" placeholder="Pouches/Cans/Packets per day" value="{{ old('') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Smokeless Type and Name</label>
                    <input type="text" class="form-control" name="" placeholder="Smokeless Type and Name" value="{{ old('') }}">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Other tobacco products - Amounts spent per day / week</label>
                    <input type="text" class="form-control" name="" placeholder="Amounts spent per day / week" value="{{ old('') }}">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Other Drug Details</label>
                    <input type="text" class="form-control" name="" placeholder="Other Drug Details" value="{{ old('') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Approx. Date of last quit attempt</label>
                    <input type="text" class="form-control" name="" placeholder="Approx. Date of last quit attempt" value="{{ old('') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">How long did you quit that time?</label>
                    <input type="text" class="form-control" name="" placeholder="How long did you quit that time?" value="{{ old('') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Longest period of time quit in past</label>
                    <input type="text" class="form-control" name="" placeholder="Longest period of time quit in past" value="{{ old('') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">How long ago?</label>
                    <input type="text" class="form-control" name="" placeholder="How long ago?" value="{{ old('') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">What caused relapse?</label>
                    <input type="text" class="form-control" name="" placeholder="What caused relapse?" value="{{ old('') }}">
                </div>
            </div>
        </div>
        <div class="col-md-6">            
            <div class="row">
                <p class="fw-bold mt-3">Medication used in previous quit attempt:</p>
                @forelse($extras->where('category', 'medication') as $key => $med)
                    <div class="col-3"><input class="form-check-input" type="checkbox" name="chk_{{$med->id}}" value="{{$med->id}}">&nbsp;{{ $med->name }}</div>
                @empty
                @endforelse
            </div>
            <div class="row">
                <p class="fw-bold mt-3">Medical History:</p>
                @forelse($extras->where('category', 'med-history') as $key => $med)
                    <div class="col-3"><input class="form-check-input" type="checkbox" name="chk_{{$med->id}}" value="{{$med->id}}">&nbsp;{{ $med->name }}</div>
                @empty
                @endforelse
            </div>
            <div class="row">
                <p class="fw-bold mt-3">Tobacco Withdrawal when stops or reduce the quantity:</p>
                @forelse($extras->where('category', 'tob-red-qty') as $key => $med)
                    <div class="col-3"><input class="form-check-input" type="checkbox" name="chk_{{$med->id}}" value="{{$med->id}}">&nbsp;{{ $med->name }}</div>
                @empty
                @endforelse
            </div>
            <div class="row">
                <div class="col mt-3">
                    <textarea class="form-control" placeholder="Counselling Notes / Remarks" rows="5"></textarea>
                </div>
            </div>
            <div class="row mt-3">
                <p class="fw-bold mt-3">Followup Plan</p>
                <div class="col-md-3">
                    <label class="form-label">Quit Date</label>
                    <input type="date" class="form-control" name="" value="{{ old('') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Quit date call</label>
                    <input type="text" class="form-control" name="" placeholder="Quit date call" value="{{ old('') }}">
                </div>  
                <div class="col-md-3">
                    <label class="form-label">Next Followup Date</label>
                    <input type="date" class="form-control" name="" value="{{ old('') }}">
                </div>          
            </div>
            <div class="row">
                <p class="fw-bold mt-3">Handouts Provided</p>
                @forelse($extras->where('category', 'handouts') as $key => $hand)
                    <div class="col-3"><input class="form-check-input" type="checkbox" name="chk_{{$hand->id}}" value="{{$hand->id}}">&nbsp;{{ $hand->name }}</div>
                @empty
                @endforelse
            </div>
            <div class="row">
                <p class="fw-bold mt-3">PHARMACOTHERAPY</p>
                <div class="col">
                    <textarea class="form-control" placeholder="PHARMACOTHERAPY" rows="5"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-4 float-end">
        <button type="submit" class="btn btn-submit btn-primary me-sm-3 me-1">Save</button>
        <button type="button" onclick="history.back()" class="btn btn-label-secondary">Cancel</button>
    </div>
</form>