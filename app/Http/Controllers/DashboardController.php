<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;
use App\Models\Service;

class DashboardController extends Controller
{
    // ======================
    // ADMIN DASHBOARD
    // ======================
  public function admin(Request $request)
{
    $tahun = $request->tahun ?? date('Y');
    $bulan = $request->bulan ?? date('m');

    // Query booking berdasarkan tahun dan bulan
    $query = Booking::whereYear('created_at', $tahun);

    // Jika bulan dipilih, filter berdasarkan bulan
    if (!empty($bulan)) {
        $query->whereMonth('created_at', $bulan);
    }

    // Statistik
    $totalBooking = (clone $query)->count();

    $totalPatient = User::where('role', 'user')->count();

    $totalService = Service::count();

    $diterima = (clone $query)
        ->where('status', 'Diterima')
        ->count();

    $pending = (clone $query)
        ->where('status', 'Pending')
        ->count();

    $ditolak = (clone $query)
        ->where('status', 'Ditolak')
        ->count();

    $selesai = (clone $query)
        ->where('status', 'Selesai')
        ->count();


    // =====================================================
    // GRAFIK BOOKING SELESAI PER HARI
    // =====================================================

    $selesaiPerHari = collect();

    if (!empty($bulan)) {

        // Jumlah hari dalam bulan yang dipilih
        $jumlahHari = cal_days_in_month(
            CAL_GREGORIAN,
            $bulan,
            $tahun
        );

        // Ambil jumlah booking selesai setiap tanggal
        $dataBooking = Booking::selectRaw('
                DAY(created_at) as hari,
                COUNT(*) as total
            ')
            ->whereYear('created_at', $tahun)
            ->whereMonth('created_at', $bulan)
            ->where('status', 'Selesai')
            ->groupByRaw('DAY(created_at)')
            ->orderByRaw('DAY(created_at)')
            ->get()
            ->keyBy('hari');

        // Buat semua tanggal dalam bulan
        // Jika tidak ada booking, total = 0
        for ($hari = 1; $hari <= $jumlahHari; $hari++) {

            $selesaiPerHari->push([
                'hari' => $hari,
                'total' => $dataBooking->has($hari)
                    ? $dataBooking[$hari]->total
                    : 0,
            ]);
        }
    }


    // =====================================================
    // BOOKING TERBARU
    // =====================================================

    $recentBookings = Booking::with('service')
        ->latest()
        ->take(5)
        ->get();


    return view('dashboard_admin', compact(
        'tahun',
        'bulan',
        'totalBooking',
        'totalPatient',
        'totalService',
        'diterima',
        'pending',
        'ditolak',
        'selesai',
        'selesaiPerHari',
        'recentBookings'
    ));
}

    // ======================
    // USER DASHBOARD
    // ======================
    public function user()
    {
        $services = Service::all();

        $bookings = Booking::with('service')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('dashboard_pelanggan', [
            'totalBooking' => Booking::where('user_id', auth()->id())->count(),

            'selesai' => Booking::where('user_id', auth()->id())
                ->where('status', 'Selesai')
                ->count(),

            'pending' => Booking::where('user_id', auth()->id())
                ->where('status', 'Pending')
                ->count(),

            'services' => $services,

            'bookings' => $bookings,
        ]);
    }
}