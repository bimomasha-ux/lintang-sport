<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Booking</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f8fafc;
        }

        .card-history {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .badge {
            padding: 8px 12px;
            font-size: 13px;
        }
    </style>
</head>
<body>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">📋 Riwayat Booking Saya</h2>

        <a href="{{ route('dashboard.pelanggan') }}" class="btn btn-primary">
            ← Kembali
        </a>
    </div>

    <div class="card card-history">
        <div class="card-body">

            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Layanan</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($bookings as $booking)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                {{ $booking->service->nama ?? '-' }}
                            </td>

                            <td>
                                {{ $booking->tanggal }}
                            </td>

                            <td>
                                {{ $booking->jam }}
                            </td>

                            <td>
                                @if($booking->status == 'Pending')
                                    <span class="badge bg-warning text-dark">
                                        Pending
                                    </span>

                                @elseif($booking->status == 'Diterima')
                                    <span class="badge bg-primary">
                                        Diterima
                                    </span>

                                @elseif($booking->status == 'Ditolak')
                                    <span class="badge bg-danger">
                                        Ditolak
                                    </span>

                                @elseif($booking->status == 'Selesai')
                                    <span class="badge bg-success">
                                        Selesai
                                    </span>

                                @else
                                    <span class="badge bg-secondary">
                                        {{ $booking->status }}
                                    </span>
                                @endif
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                Belum ada riwayat booking
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>

</body>
</html>