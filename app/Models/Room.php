<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'building_id', 'name', 'description', 'capacity',
    ];

    public function building()
    {
        return $this->belongsTo('App\Models\Building');   
    }

    public function bookings()
    {
        return $this->hasMany('App\Models\Booking','room_id');   
    }

    public function images()
    {
        return $this->hasMany('App\Models\ImageRoom');   
    }
}
