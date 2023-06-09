<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientAdmissionReason extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_id',
        'reason',
    ];

    public function reasonname(){
        return $this->belongsTo(Extra::class, 'reason');
    }
}
