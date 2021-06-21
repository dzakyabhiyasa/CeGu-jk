<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id', 'name', 'no_id', 'email', 'contact',
    ];

    public function booking()
    {
        return $this->belongsTo('App\Models\Booking');   
    }

    public function scanners()
    {
        return $this->hasMany('App\Models\Scanner');   
    }
}
