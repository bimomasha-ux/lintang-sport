<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Patient;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Exports\BookingExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // =========================
    // 📊 DASHBOARD ADMIN
    // =========================

public function dashboard(Request $request)
{
    $tahun = $request->tahun ?? date('Y');
    $bulan = $request->bulan;

    // QUERY DASAR FILTER
    $query = Booking::whereYear('created_at', $tahun);

    if ($bulan) {
        $query->whereMonth('created_at', $bulan);
    }

    // TOTAL
    $totalBooking = (clone $query)->count();
    $totalPatient = (clone $query)->distinct('nama')->count('nama');
    $totalService = Service::count();

    // STATUS
    $diterima = (clone $query)->where('status', 'Diterima')->count();
    $pending  = (clone $query)->where('status', 'Pending')->count();
    $ditolak  = (clone $query)->where('status', 'Ditolak')->count();
    $selesai  = (clone $query)->where('status', 'Selesai')->count();

$selesaiPerMinggu = Booking::selectRaw("
    WEEK(tanggal,1) as minggu,
    COUNT(*) as total
")
->where('status', 'Selesai')
->whereYear('tanggal', $tahun)
->when($bulan, function ($q) use ($bulan) {
    $q->whereMonth('tanggal', $bulan);
})
->groupBy('minggu')
->orderBy('minggu')
->get();

$search = $request->search;
$bookings = Booking::with('service')
    ->when($search, function ($q) use ($search) {
        $q->where('nama', 'like', "%$search%")
          ->orWhere('telepon', 'like', "%$search%")
          ->orWhere('status', 'like', "%$search%");
    })
    ->latest()
    ->take(10)
    ->get();
return view('dashboard_admin', compact(
    'totalBooking',
    'totalPatient',
    'totalService',
    'tahun',
    'bulan',
    'diterima',
    'pending',
    'ditolak',
    'selesai',
    'selesaiPerMinggu',
    'bookings',
    'search'
));
}

    // =========================
    // 📋 LIST BOOKING
    // =========================
    public function index(Request $request)
{
    $search = $request->search;

    $bookings = Booking::with('service')
        ->when($search, function ($q) use ($search) {
            $q->where('nama', 'like', "%$search%")
              ->orWhere('telepon', 'like', "%$search%")
              ->orWhere('status', 'like', "%$search%");
        })
        ->latest()
        ->get();

    return view('bookings.index', compact('bookings', 'search'));
}

    // =========================
    // ➕ CREATE ADMIN
    // =========================
    public function create()
{
    $services = Service::all();

    return view('bookings.create', compact('services'));
}

    // =========================
    // 👤 USER BOOKING FORM
    // =========================
    public function createUser()
    {
        $services = Service::all();

        $bookings = Booking::select('tanggal', 'jam')
            ->latest()
            ->get();

        return view('booking_user', compact('services', 'bookings'));
    }

public function storeUser(Request $request)
{
    $request->validate([
        'service_id' => 'required',
        'tanggal'    => 'required|date|after_or_equal:today',
        'jam'        => 'required'
    ]);

    $cekBooking = Booking::where('tanggal', $request->tanggal)
        ->where('jam', $request->jam)
        ->exists();

if ($request->tanggal < now()->format('Y-m-d')) {
    return back()->withErrors([
        'tanggal' => 'Tanggal booking tidak boleh sebelum hari ini.'
    ]);
}
$slots = [
    '18:30 - 19:30',
    '19:30 - 20:30',
    '20:30 - 21:30',
];

$cekBooking = Booking::where('tanggal', $request->tanggal)
    ->where('jam', $request->jam)
    ->exists();

if ($cekBooking) {

    $index = array_search($request->jam, $slots);

    $rekomendasi = null;

    for ($i = $index + 1; $i < count($slots); $i++) {

        $terisi = Booking::where('tanggal', $request->tanggal)
            ->where('jam', $slots[$i])
            ->exists();

        if (!$terisi) {
            $rekomendasi = $slots[$i];
            break;
        }
    }

    if ($rekomendasi) {
        return back()->withInput()->withErrors([
            'jam' => 'Jam tersebut sudah dibooking. Rekomendasi jadwal: '.$rekomendasi
        ]);
    }

    return back()->withInput()->withErrors([
        'jam' => 'Maaf, seluruh jadwal pada tanggal tersebut sudah penuh.'
    ]);
}
   Booking::create([
    'user_id'    => auth()->id(),
    'nama'       => auth()->user()->name,
    'telepon'    => auth()->user()->telepon,
    'service_id' => $request->service_id,
    'tanggal'    => $request->tanggal,
    'jam'        => $request->jam,
    'status'     => 'Pending'
]);

    return redirect()->route('dashboard.pelanggan')
        ->with('success', 'Booking berhasil!');
}
    // =========================
    // 💾 STORE ADMIN
    // =========================
 public function store(Request $request)
{
    $request->validate([
        'service_id' => 'required',
        'tanggal'    => 'required|date|after_or_equal:today',
        'jam'        => 'required'
    ]);

    // Daftar slot yang tersedia
    $slots = [
        '18:30 - 19:30',
        '19:30 - 20:30',
        '20:30 - 21:30',
    ];

    // Cek apakah jam yang dipilih sudah dibooking
    $bookingAda = Booking::where('tanggal', $request->tanggal)
        ->where('jam', $request->jam)
        ->exists();

    if ($bookingAda) {

        // Cari posisi jam yang dipilih
        $index = array_search($request->jam, $slots);

        // Cari slot berikutnya yang kosong
        for ($i = $index + 1; $i < count($slots); $i++) {

            $terisi = Booking::where('tanggal', $request->tanggal)
                ->where('jam', $slots[$i])
                ->exists();

            if (!$terisi) {
                return back()
                    ->withInput()
                    ->withErrors([
                        'jam' => 'Jadwal yang dipilih sudah terisi. Rekomendasi: ' . $slots[$i]
                    ]);
            }
        }

        // Semua slot penuh
        return back()
            ->withInput()
            ->withErrors([
                'jam' => 'Maaf, semua jadwal pada tanggal tersebut sudah penuh.'
            ]);
    }

    // Simpan booking
    Booking::create([
        'user_id'    => Auth::id(),
        'nama'       => Auth::user()->name,
        'telepon'    => Auth::user()->telepon,
        'service_id' => $request->service_id,
        'tanggal'    => $request->tanggal,
        'jam'        => $request->jam,
        'status'     => 'Pending',
    ]);

    return redirect()->route('bookings.index')
        ->with('success', 'Booking berhasil ditambahkan');
}
    // =========================
    // 🔁 UPDATE STATUS
    // =========================
    public function updateStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Status berhasil diupdate');
    }

    // =========================
    // ❌ DELETE
    // =========================
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings.index')
            ->with('success', 'Booking berhasil dihapus');
    }

// =========================
// 📊 LAPORAN 
public function laporan(Request $request)
{
    $tahun = $request->tahun ?? date('Y');
    $bulan = $request->bulan;

    $query = Booking::with('service')
        ->whereYear('bookings.created_at', $tahun);

    if ($bulan) {
        $query->whereMonth('bookings.created_at', $bulan);
    }

    $bookings = $query->latest()->get();

    $totalBooking = (clone $query)->count();
    $diterima = (clone $query)->where('status', 'Diterima')->count();
    $pending  = (clone $query)->where('status', 'Pending')->count();
    $ditolak  = (clone $query)->where('status', 'Ditolak')->count();
    $selesai  = (clone $query)->where('status', 'Selesai')->count();

    $totalPendapatan = (clone $query)
        ->join('services', 'bookings.service_id', '=', 'services.id')
        ->where('bookings.status', 'Diterima')
        ->sum('services.harga');

    return view('laporan.index', compact(
        'bookings',
        'totalBooking',
        'diterima',
        'pending',
        'ditolak',
        'selesai',
        'totalPendapatan',
        'tahun',
        'bulan'
    ));
}

    // =========================
    // 📜 HISTORY
    // =========================
   public function history()
{
    $bookings = Booking::with('service')
        ->where('user_id', auth()->id())
        ->latest()
        ->get();

    return view('history', compact('bookings'));
}

    // =========================
    // 🔍 CEK JADWAL
    // =========================
    public function cekBooking($tanggal)
    {
        $bookings = Booking::where('tanggal', $tanggal)
            ->pluck('jam');

        return response()->json($bookings);
    }
public function exportExcel(Request $request)
{
    return Excel::download(
        new BookingExport(
            $request->tahun,
            $request->bulan,
            $request->status
        ),
        'laporan-booking.xlsx'
    );
}
}