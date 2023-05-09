<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'counsellor_id',
        'notes',
        'referred_by',
        'referral_person_details',
        'referral_person_mobile',
        'referral_person_email',
        'accompanying_person',
        'relation_to_patient',
        'accompanying_person_mobile',
        'created_by',
        'updated_by'
    ];

    public function counsellor(){
        return $this->hasOne(User::class, 'id', 'counsellor_id');
    }

    public function patient(){
        return $this->hasOne(Patient::class, 'id', 'patient_id');
    }

    public function bills(){
        return $this->hasMany(Bill::class, 'file_id', 'id');
    }

    public function reasons(){
        return $this->hasMany(PatientAdmissionReason::class, 'file_id', 'id');
    }
}
