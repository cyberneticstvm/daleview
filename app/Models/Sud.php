<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sud extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'years_of_substance_use',
        'duration_of_heavy_or_problematic_use',
        'date_of_last_drink',
        'date_of_last_drug_use',
        'tremors',
        'sleeplessness',
        'suicidal_thought',
        'poor_appetite',
        'suicidal_thought_past_two_weeks',
        'suicidal_attempt',
        'suicidal_plans',
        'vomiting',
        'hallucinations',
        'blood_vomiting',
        'delusions',
        'chest_burn',
        'suspicion',
        'hypertension',
        'severe_verbal_violence',
        'diabetes',
        'physical_violence',
        'fits',
        'breaking_things',
        'self_harm',
        'other_problems',
        'treatment_past_five_years',
        'treatment_past_five_years_details',
        'head_injury_treatment_details',
        'met_psychiatrist',
        'prior_treatment_addiction',
        'prior_treatment_addiction_details',
        'reason_given_by_client',
        'recognize_problems',
        'alter_drinking_pattern',
        'willing_to_admit',
        'room_allotted',
        'delirium_tremens',
        'suicidal_risk',
        'violence',
        'cardiac_problems',
        'tb',
        'hiv',
        'hepatitis',
        'co_morbidities',
        'consulting_remarks',
        'created_by',
        'updated_by',
    ];

    protected $casts = ['date_of_last_drink' => 'date', 'date_of_last_drug_use' => 'date'];

    public function substances(){
        return $this->hasMany(Substance::class, 'patient_id', 'patient_id');
    }
}
