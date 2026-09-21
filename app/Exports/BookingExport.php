<?php

namespace App\Exports;

use App\Models\Booking;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BookingExport implements FromCollection, WithHeadings
{
    protected $tahun;
    protected $bulan;
    protected $status;

    public function __construct($tahun = null, $bulan = null, $status = null)
    {
        $this->tahun = $tahun;
        $this->bulan = $bulan;
        $this->status = $status;
    }

    public function collection()
    {
        $query = Booking::with('service');

        // Filter Tahun
        if ($this->tahun) {
            $query->whereYear('created_at', $this->tahun);
        }

        // Filter Bulan
        if ($this->bulan) {
            $query->whereMonth('created_at', $this->bulan);
        }

        // Filter Status
        if ($this->status) {
            $query->where('status', $this->status);
        }

        return $query->get()->values()->map(function ($booking, $index) {
            return [
                'No'       => $index + 1,
                'Nama'     => $booking->nama,
                'Layanan'  => $booking->service->nama ?? '-',
                'Tanggal'  => $booking->tanggal,
                'Jam'      => $booking->jam,
                'Status'   => $booking->status,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Layanan',
            'Tanggal',
            'Jam',
            'Status',
        ];
    }
}