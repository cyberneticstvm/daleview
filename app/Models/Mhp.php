<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mhp extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'suicidal_thought',
        'suicidal_attempt',
        'suicidal_thought_past_two_weeks',
        'suicidal_plans',
        'hallucinations',
        'delusions',
        'suspicion',
        'severe_verbal_violence',
        'physical_violence',
        'breaking_things',
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
