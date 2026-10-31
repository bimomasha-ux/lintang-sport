<?php

namespace App\Http\Controllers;

use App\Exports\BookingExport;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class BookingController extends Controller
{
    /**
     * Dashboard admin.
     */
    public function dashboard(Request $request)
    {
        $tahun = $request->input('tahun', date('Y'));
        $bulan = $request->input('bulan');

        $query = Booking::whereYear('created_at', $tahun);

        if ($bulan) {
            $query->whereMonth('created_at', $bulan);
        }

        $totalBooking = (clone $query)->count();
        $totalPatient = (clone $query)->distinct()->count('nama');
        $totalService = Service::count();

        $diterima = (clone $query)->where('status', 'Diterima')->count();
        $pending = (clone $query)->where('status', 'Pending')->count();
        $ditolak = (clone $query)->where('status', 'Ditolak')->count();
        $selesai = (clone $query)->where('status', 'Selesai')->count();

        $selesaiPerMinggu = Booking::selectRaw('WEEK(tanggal, 1) as minggu, COUNT(*) as total')
            ->where('status', 'Selesai')
            ->whereYear('tanggal', $tahun)
            ->when($bulan, function ($query) use ($bulan) {
                $query->whereMonth('tanggal', $bulan);
            })
            ->groupBy('minggu')
            ->orderBy('minggu')
            ->get();

        $search = $request->input('search');
        $bookings = Booking::with('service')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('nama', 'like', "%{$search}%")
                        ->orWhere('telepon', 'like', "%{$search}%")
                        ->orWhere('status', 'like', "%{$search}%");
                });
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

    /**
     * Menampilkan seluruh data booking untuk admin.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $bookings = Booking::with('service')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('nama', 'like', "%{$search}%")
                        ->orWhere('telepon', 'like', "%{$search}%")
                        ->orWhere('status', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->get();

        return view('bookings.index', compact('bookings', 'search'));
    }

    /**
     * Menampilkan formulir tambah booking admin.
     */
    public function create()
    {
        $services = Service::all();

        return view('bookings.create', compact('services'));
    }

    /**
     * Menampilkan formulir booking untuk pelanggan.
     */
    public function createUser()
    {
        $services = Service::all();
        $bookings = Booking::select('tanggal', 'jam')->latest()->get();

        return view('booking_user', compact('services', 'bookings'));
    }

    /**
     * Menyimpan booking yang dibuat oleh pelanggan.
     * Nama dan nomor telepon diambil otomatis dari akun pelanggan.
     */
    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'tanggal' => 'required|date|after_or_equal:today',
            'jam' => 'required|string',
        ]);

        $slots = [
            '18:30 - 19:30',
            '19:30 - 20:30',
            '20:30 - 21:30',
        ];

        $bookingAda = Booking::where('tanggal', $validated['tanggal'])
            ->where('jam', $validated['jam'])
            ->exists();

        if ($bookingAda) {
            $index = array_search($validated['jam'], $slots, true);
            $rekomendasi = null;

            if ($index !== false) {
                for ($i = $index + 1; $i < count($slots); $i++) {
                    $slotTerisi = Booking::where('tanggal', $validated['tanggal'])
                        ->where('jam', $slots[$i])
                        ->exists();

                    if (!$slotTerisi) {
                        $rekomendasi = $slots[$i];
                        break;
                    }
                }
            }

            $pesan = $rekomendasi
                ? 'Jam tersebut sudah dibooking. Rekomendasi jadwal: ' . $rekomendasi
                : 'Maaf, seluruh jadwal berikutnya pada tanggal tersebut sudah penuh.';

            return back()->withInput()->withErrors(['jam' => $pesan]);
        }

        Booking::create([
            'user_id' => Auth::id(),
            'nama' => Auth::user()->name,
            'telepon' => Auth::user()->telepon,
            'service_id' => $validated['service_id'],
            'tanggal' => $validated['tanggal'],
            'jam' => $validated['jam'],
            'status' => 'Pending',
        ]);

        return redirect()->route('dashboard.pelanggan')
            ->with('success', 'Booking berhasil!');
    }

    /**
     * Menyimpan booking yang dibuat admin.
     * Nama dan nomor telepon wajib diisi manual melalui formulir admin.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
            'service_id' => 'required|exists:services,id',
            'tanggal' => 'required|date|after_or_equal:today',
            'jam' => 'required|string',
        ]);

        $slots = [
            '18:30 - 19:30',
            '19:30 - 20:30',
            '20:30 - 21:30',
        ];

        $bookingAda = Booking::where('tanggal', $validated['tanggal'])
            ->where('jam', $validated['jam'])
            ->exists();

        if ($bookingAda) {
            $index = array_search($validated['jam'], $slots, true);
            $rekomendasi = null;

            if ($index !== false) {
                for ($i = $index + 1; $i < count($slots); $i++) {
                    $slotTerisi = Booking::where('tanggal', $validated['tanggal'])
                        ->where('jam', $slots[$i])
                        ->exists();

                    if (!$slotTerisi) {
                        $rekomendasi = $slots[$i];
                        break;
                    }
                }
            }

            $pesan = $rekomendasi
                ? 'Jadwal yang dipilih sudah terisi. Rekomendasi: ' . $rekomendasi
                : 'Maaf, seluruh jadwal berikutnya pada tanggal tersebut sudah penuh.';

            return back()->withInput()->withErrors(['jam' => $pesan]);
        }

        Booking::create([
            'user_id' => Auth::id(),
            'nama' => $validated['nama'],
            'telepon' => $validated['telepon'],
            'service_id' => $validated['service_id'],
            'tanggal' => $validated['tanggal'],
            'jam' => $validated['jam'],
            'status' => 'Pending',
        ]);

        return redirect()->route('bookings.index')
            ->with('success', 'Booking berhasil ditambahkan.');
    }

    /**
     * Menampilkan formulir edit booking admin.
     */
    public function edit(Booking $booking)
    {
        $services = Service::all();

        return view('bookings.edit', compact('booking', 'services'));
    }

    /**
     * Memperbarui data booking admin.
     */
    public function update(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
            'service_id' => 'required|exists:services,id',
            'tanggal' => 'required|date',
            'jam' => 'required|string',
            'status' => 'required|in:Pending,Diterima,Ditolak,Selesai',
        ]);

        $bookingAda = Booking::where('tanggal', $validated['tanggal'])
            ->where('jam', $validated['jam'])
            ->where('id', '!=', $booking->id)
            ->exists();

        if ($bookingAda) {
            return back()->withInput()->withErrors([
                'jam' => 'Jadwal tersebut sudah digunakan oleh booking lain.',
            ]);
        }

        $booking->update([
            'nama' => $validated['nama'],
            'telepon' => $validated['telepon'],
            'service_id' => $validated['service_id'],
            'tanggal' => $validated['tanggal'],
            'jam' => $validated['jam'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('bookings.index')
            ->with('success', 'Data booking berhasil diperbarui.');
    }

    /**
     * Memperbarui status booking.
     */
    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:Pending,Diterima,Ditolak,Selesai',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->update(['status' => $validated['status']]);

        return back()->with('success', 'Status berhasil diperbarui.');
    }

    /**
     * Menghapus booking.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings.index')
            ->with('success', 'Data booking berhasil dihapus.');
    }

    /**
     * Menampilkan laporan booking.
     */
    public function laporan(Request $request)
    {
        $tahun = $request->input('tahun', date('Y'));
        $bulan = $request->input('bulan');

        $query = Booking::with('service')
            ->whereYear('bookings.created_at', $tahun);

        if ($bulan) {
            $query->whereMonth('bookings.created_at', $bulan);
        }

        $bookings = (clone $query)->latest()->get();
        $totalBooking = (clone $query)->count();
        $diterima = (clone $query)->where('status', 'Diterima')->count();
        $pending = (clone $query)->where('status', 'Pending')->count();
        $ditolak = (clone $query)->where('status', 'Ditolak')->count();
        $selesai = (clone $query)->where('status', 'Selesai')->count();

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

    /**
     * Menampilkan riwayat booking milik pelanggan yang sedang login.
     */
    public function history()
    {
        $bookings = Booking::with('service')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('history', compact('bookings'));
    }

    /**
     * Mengambil daftar jam booking pada tanggal tertentu.
     */
    public function cekBooking($tanggal)
    {
        $bookings = Booking::where('tanggal', $tanggal)->pluck('jam');

        return response()->json($bookings);
    }

    /**
     * Mengekspor laporan booking ke Excel.
     */
    public function exportExcel(Request $request)
    {
        return Excel::download(
            new BookingExport(
                $request->input('tahun'),
                $request->input('bulan'),
                $request->input('status')
            ),
            'laporan-booking.xlsx'
        );
    }
}
