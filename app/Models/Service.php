<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = [

        'nama',
        'harga',
        'deskripsi',
        'durasi'

    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'service_id');
    }
public function user()
{
    $services = Service::latest()->get();

    return view('dashboard_pelanggan', [
        'totalBooking' => Booking::where('user_id', auth()->id())->count(),
        'selesai' => Booking::where('user_id', auth()->id())
                    ->where('status', 'Selesai')->count(),
        'pending' => Booking::where('user_id', auth()->id())
                    ->where('status', 'Pending')->count(),
        'services' => $services
    ]);
}}