<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientLab extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'file_id',
        'lab_id',
        'notes',
        'created_by',
        'updated_by',
    ];

    public function lab(){
        return $this->belongsTo(Lab::class, 'lab_id', 'id');
    }

    public function patient(){
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }
}
