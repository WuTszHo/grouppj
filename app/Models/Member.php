<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    // Fields that can be mass-assigned
    protected $fillable = [
        'last_name',
        'first_name',
        'address',
        'phone',
        'email',
        'password',
    ];

    // Hide password from serialization
    protected $hidden = ['password'];

    // Relationship: a member has many reservations
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
