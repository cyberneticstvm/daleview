<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'subcategory_id',
        'normal_range',
    ];

    public function category(){
        return $this->belongsTo(LabCategory::class, 'category_id', 'id');
    }

    public function subcategory(){
        return $this->belongsTo(Labsubcategory::class, 'subcategory_id', 'id');
    }
}
