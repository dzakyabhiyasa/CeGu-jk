<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id', 'visitor_id', 'permission_rapid', 'body_temperature', 'face_mask', 'washing_hands',
    ];

    public function sisitor()
    {
        return $this->belongsTo('App\Models\Visitor');   
    }

    public function booking()
    {
        return $this->belongsTo('App\Models\Booking');   
    }
}
