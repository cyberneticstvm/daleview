<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_id',
        'service_id',
        'qty',
        'fee',
        'total',
        'notes',
    ];

    public function file(){
        return $this->belongsTo(PatientFile::class, 'file_id', 'id');
    }
}
