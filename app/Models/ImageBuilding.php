<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageBuilding extends Model
{
    use HasFactory;

    protected $fillable = [
        'building_id', 'image',
    ];

    public function building()
    {
        return $this->belongsTo('App\Models\Building');   
    }
}
