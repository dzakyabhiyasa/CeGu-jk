<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'address', 'contact',
    ];

    public function rooms()
    {
        return $this->hasMany('App\Models\Room');   
    }

    public function images()
    {
        return $this->hasMany('App\Models\ImageBuilding');   
    }
}
