<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';
protected $fillable = [
    'user_id',
    'nama',
    'telepon',
    'service_id',
    'tanggal',
    'jam',
    'status'
];

    // RELASI SERVICE
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    // RELASI PATIENT
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}