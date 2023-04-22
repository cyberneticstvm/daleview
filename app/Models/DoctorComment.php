<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'file_id',
        'comments',
        'created_by',
    ];

    protected $casts = ['created_at' => 'datetime'];

    public function doctor(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
