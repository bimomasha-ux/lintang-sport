<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'alamat',
        'telephone'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}