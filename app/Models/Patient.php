<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'first_name',
        'middle_name',
        'last_name',
        'mobile',
        'dob',
        'age',
        'gender',
        'marital_status',
        'education',
        'education_details',
        'employment',
        'employment_details',
        'language',
        'id_proof',
        'id_proof_number',
        'referred_by',
        'referral_person_details',
        'referral_person_mobile',
        'referral_person_email',
        'patient_photo',
        'accompanying_person',
        'relation_to_patient',
        'accompanying_person_mobile',
        'registration_fee',
        'registration_date',
        'created_by',
        'updated_by',
    ];

    public function reasons(){
        return $this->hasMany(PatientAdmissionReason::class, 'patient_id');
    }

    public function gendername(){
        return $this->hasOne(Extra::class, 'id', 'gender');
    }
}
