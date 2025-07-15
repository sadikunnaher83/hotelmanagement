<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booking extends Model
{
    protected $fillable = [
        'room_id',
        'name',
        'email',
        'phone',
        'status',
        'startDate',
        'endDate',
    ];

    public function room()
    {
        return $this->hasone(Room::class, 'id', 'room_id');
    }
}
