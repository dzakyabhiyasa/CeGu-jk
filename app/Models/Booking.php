<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id', 'user_id', 'date', 'in', 'out', 'description', 'permission', 'expired', 'status',
    ];

    public function room()
    {
        return $this->belongsTo('App\Models\Room');   
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');   
    }

    public function visitors()
    {
        return $this->hasMany('App\Models\Visitor');   
    }
}
