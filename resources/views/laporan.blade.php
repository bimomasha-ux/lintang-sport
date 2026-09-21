<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Booking</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h1 class="mb-4">Laporan Booking</h1>

    <!-- Tombol Download -->
    <div class="mb-3">
        <a href="{{ route('laporan.excel') }}"
           class="btn btn-success">
            📥 Download Excel
        </a>
    </div>

    <table class="table table-bordered table-striped">

        <thead class="table-dark">
            <tr>
                <th>Nama Pasien</th>
                <th>Layanan</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

        @forelse($bookings as $booking)
            <tr>
                <td>{{ $booking->patient->nama ?? '-' }}</td>
                <td>{{ $booking->service->nama ?? '-' }}</td>
                <td>{{ $booking->tanggal ?? '-' }}</td>
                <td>
                    <span class="badge bg-primary">
                        {{ $booking->status }}
                    </span>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">
                    Tidak ada data booking
                </td>
            </tr>
        @endforelse

        </tbody>

    </table>

</div>

</body>
</html>