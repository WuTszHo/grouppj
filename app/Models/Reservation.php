<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    // Fields that can be mass-assigned
    protected $fillable = [
        'member_id',
        'reservation_date',
        'time_slot',
        'table_room',
    ];

    // Relationship: a reservation belongs to a member
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
