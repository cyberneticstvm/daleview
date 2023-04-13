<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmokingCessation extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'details_of_drug_use',
        'what_motivate_stop_tobacco',
        'tobacco_type',
        'how_soon_first_cigarette_after_wakeup',
        'difficult_to_abstain',
        'cigerette_to_give_up',
        'cigerettes_per_day',
        'cigerret_smoking_frequency_day_or_morning',
        'cigerret_smoking_in_ill',
        'cigerettes_pack_per_day',
        'beedi_pack_per_day',
        'smokless_pack_per_day',
        'smokeless_type_and_name',
        'other_tobacco_product',
        'other_drug_detail',
        'date_of_last_quit_attempt',
        'how_long_quit_last_time',
        'longest_period_of_quit',
        'how_long_ago',
        'what_caused_relapse',
        'counselling_remarks',
        'nicotine_gum',
        'nicotine_patch',
        'varenicline',
        'bupropion',
        'nicotine_nasal_spray',
        'nicotine_oral_inhaler',
        'other_medication',
        'no_medication',
        'seizures',
        'eating_disorder',
        'asthma',
        'psoriasis',
        'cardiac_problem',
        'renal_impairment',
        'serious_psychiatric_illness',
        'diabetic',
        'irritability',
        'depression',
        'anxiety',
        'restlessness',
        'trouble_concentrating',
        'insomnia',
        'hunger',
        'other_illness',
        'quit_date',
        'quit_date_call',
        'next_follow_up_date',
        'prescription',
        'feedback_report_card',
        'iec',
        'quit_smoking_guide',
        'other_docs',
        'pharmacotherapy',
        'created_by',
        'updated_by',
    ];

    protected $casts = ['quit_date' => 'date', 'next_follow_up_date' => 'date'];
}
