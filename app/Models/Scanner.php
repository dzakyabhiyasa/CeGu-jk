<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id', 'visitor_id', 'permission_rapid', 'body_temperature', 'face_mask', 'washing_hands', 'building_in', 'room_in'
    ];

    public function visitor()
    {
        return $this->belongsTo('App\Models\Visitor');   
    }

    public function booking()
    {
        return $this->belongsTo('App\Models\Booking');   
    }
}
