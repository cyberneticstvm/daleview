<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Substance extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'type',
        'qty',
        'frequency',
        'duration',
    ];
}
