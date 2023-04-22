<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientMedicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'file_id',
        'medicine_id',
        'qty',
        'batch_number',
        'dosage',
        'notes',
        'created_by',
        'updated_by',
    ];

    public function medicine(){
        return $this->belongsTo(Medicine::class, 'medicine_id', 'id');
    }

    public function patient(){
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }
}
