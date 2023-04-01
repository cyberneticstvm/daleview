<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counselling extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
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
        'willing_to_admit',
        'consulting_remarks',
        'created_by',
        'updated_by',
    ];
}
