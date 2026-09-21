<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Lintang Sport Recovery</title>

    <!-- Google Fonts & Bootstrap Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        :root {
            --primary-blue: #2563eb;
            --sidebar-bg: #0f172a;
            --bg-light: #f8fafc;
        }

        body {
            background-color: var(--bg-light);
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #334155;
            -webkit-font-smoothing: antialiased;
        }

        /* NAVBAR HEADER (PRESISI KELOLA LAYANAN) */
        .navbar-custom {
            background: #ffffff;
            height: 70px;
            border-bottom: 1px solid #e2e8f0;
        }

        .brand-text {
            color: var(--primary-blue);
            font-weight: 800;
            font-size: 1.2rem;
            letter-spacing: -0.3px;
        }

        /* SIDEBAR STYLING (PRESISI KELOLA LAYANAN) */
        .sidebar {
            min-height: calc(100vh - 70px);
            background-color: var(--sidebar-bg);
            padding: 20px 14px !important;
        }

        .sidebar-heading {
            color: #475569;
            font-size: 0.65rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            padding: 0 10px;
            margin-bottom: 10px;
        }

        .sidebar .nav-link {
            color: #94a3b8;
            font-weight: 600;
            font-size: 0.88rem;
            padding: 10px 14px;
            border-radius: 10px;
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.2s ease;
        }

        .sidebar .nav-link:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.05);
        }

        .sidebar .nav-link.active {
            color: #ffffff;
            background: var(--primary-blue);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        /* CARDS & STATS */
        .card-custom {
            background: #ffffff;
            border-radius: 14px;
            border: 1px solid #e2e8f0;
            overflow: hidden;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }

        /* WELCOME BANNER */
        .welcome-banner {
            background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%);
            border-radius: 14px;
        }

        /* TABLES (PRESISI KELOLA LAYANAN) */
        .table-custom {
            margin: 0;
        }

        .table-custom thead th {
            background: #f8fafc;
            color: #64748b;
            font-size: 0.78rem;
            font-weight: 700;
            padding: 14px 20px;
            border-bottom: 1px solid #e2e8f0;
        }

        .table-custom tbody td {
            padding: 16px 20px;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
            font-size: 0.88rem;
            color: #1e293b;
        }

        .table-custom tbody tr:last-child td {
            border-bottom: none;
        }

        .badge-status {
            padding: 6px 12px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 0.75rem;
        }

        /* AVATAR USER */
        .avatar-initial {
            width: 36px;
            height: 36px;
            background: var(--primary-blue);
            color: #ffffff;
            font-weight: 700;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>

<!-- NAVBAR HEADER -->
<nav class="navbar navbar-expand-lg sticky-top px-4 navbar-custom">
    <div class="container-fluid p-0">

        <a class="navbar-brand d-flex align-items-center fw-bold text-primary" href="#">
            <img src="{{ asset('images/logo.png') }}"
                 alt="Logo"
                 width="40"
                 height="40"
                 class="me-2 rounded-circle">

            <span class="brand-text">
                Lintang Sport Recovery
            </span>
        </a>

        <div class="d-flex align-items-center gap-3">

            <!-- PROFIL ADMIN -->
            <a href="{{ route('profil.index') }}"
               class="d-flex align-items-center gap-2 text-decoration-none">

                <div class="avatar-initial">
                    A
                </div>

                <span class="fw-semibold text-dark">
                    Admin
                </span>

            </a>

            <!-- LOGOUT -->
            <form method="POST"
                  action="{{ route('logout') }}"
                  class="m-0">

                @csrf

                <button type="submit"
                        class="btn btn-outline-danger btn-sm rounded-3 px-3">

                    <i class="bi bi-box-arrow-right me-1"></i>
                    Logout

                </button>

            </form>

        </div>
    </div>
</nav>

<!-- MAIN LAYOUT -->
<div class="container-fluid">
    <div class="row">

        <!-- SIDEBAR MENU -->
        <div class="col-md-2 p-0 sidebar d-none d-md-block">
            <div class="sidebar-heading">Menu Utama</div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ Route::has('dashboard.admin') ? route('dashboard.admin') : '/dashboard-admin' }}" class="nav-link active">
                        <i class="bi bi-grid-1x2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ Route::has('bookings.index') ? route('bookings.index') : '/bookings' }}" class="nav-link">
                        <i class="bi bi-calendar-check"></i> Booking
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ Route::has('patients.index') ? route('patients.index') : '/patients' }}" class="nav-link">
                        <i class="bi bi-people"></i> Pelanggan
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ Route::has('services.index') ? route('services.index') : '/services' }}" class="nav-link">
                        <i class="bi bi-activity"></i> Layanan
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ Route::has('laporan') ? route('laporan') : '/laporan' }}" class="nav-link">
                        <i class="bi bi-bar-chart"></i> Laporan
                    </a>
                </li>
            </ul>
        </div>

        <!-- MAIN CONTENT AREA -->
        <div class="col-md-10 p-4">

            <!-- WELCOME BANNER -->
            <div class="p-4 mb-4 text-white welcome-banner shadow-sm d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="fw-bold mb-1">👋 Selamat Datang di Dashboard Admin</h4>
                    <p class="mb-0 text-white-50">Kelola operasional dan pantau grafik pemesanan Lintang Sport Recovery.</p>
                </div>
            </div>

            <!-- FILTER PERIODE -->
            <div class="card card-custom p-3 mb-4">
                <form method="GET" class="row g-3 align-items-end">
                    <div class="col-md-3">
                        <label class="form-label small fw-bold text-secondary">Tahun</label>
                        <select name="tahun" class="form-select border-light-subtle shadow-none">
                            @for($i = date('Y'); $i >= 2023; $i--)
                                <option value="{{ $i }}" {{ ($tahun ?? date('Y')) == $i ? 'selected' : '' }}>
                                    {{ $i }}
                                </option>
                            @endfor
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label small fw-bold text-secondary">Bulan</label>
                        <select name="bulan" class="form-select border-light-subtle shadow-none">
                            <option value="">Semua Bulan</option>
                            @for($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}" {{ ($bulan ?? '') == $i ? 'selected' : '' }}>
                                    {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                                </option>
                            @endfor
                        </select>
                    </div>

                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100 fw-semibold rounded-3">
                            <i class="bi bi-filter me-1"></i> Filter
                        </button>
                    </div>
                </form>
            </div>

            <!-- STATISTIK UTAMA -->
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <div class="card card-custom p-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <span class="text-muted small fw-semibold">Total Booking</span>
                                <h3 class="fw-bold text-dark mb-0 mt-1">{{ $totalBooking ?? 0 }}</h3>
                            </div>
                            <div class="stat-icon bg-primary-subtle text-primary">
                                <i class="bi bi-calendar-event"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-custom p-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <span class="text-muted small fw-semibold">Total Pelanggan</span>
                                <h3 class="fw-bold text-dark mb-0 mt-1">{{ $totalPatient ?? 0 }}</h3>
                            </div>
                            <div class="stat-icon bg-success-subtle text-success">
                                <i class="bi bi-people"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-custom p-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <span class="text-muted small fw-semibold">Total Layanan</span>
                                <h3 class="fw-bold text-dark mb-0 mt-1">{{ $totalService ?? 0 }}</h3>
                            </div>
                            <div class="stat-icon bg-warning-subtle text-warning">
                                <i class="bi bi-card-checklist"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- STATUS BOOKING -->
            <div class="row g-3 mb-4">
                <div class="col-md-3">
                    <div class="card card-custom p-3 border-start border-info border-4">
                        <span class="text-muted small fw-semibold">Diterima</span>
                        <h4 class="fw-bold text-info mb-0 mt-1">{{ $diterima ?? 0 }}</h4>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-custom p-3 border-start border-warning border-4">
                        <span class="text-muted small fw-semibold">Pending</span>
                        <h4 class="fw-bold text-warning mb-0 mt-1">{{ $pending ?? 0 }}</h4>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-custom p-3 border-start border-danger border-4">
                        <span class="text-muted small fw-semibold">Ditolak</span>
                        <h4 class="fw-bold text-danger mb-0 mt-1">{{ $ditolak ?? 0 }}</h4>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-custom p-3 border-start border-success border-4">
                        <span class="text-muted small fw-semibold">Selesai</span>
                        <h4 class="fw-bold text-success mb-0 mt-1">{{ $selesai ?? 0 }}</h4>
                    </div>
                </div>
            </div>

            <!-- TABEL BOOKING TERBARU -->
            <div class="card card-custom mb-4">
                <div class="card-header bg-white py-3 px-4 border-bottom d-flex justify-content-between align-items-center">
                    <h6 class="fw-bold m-0 text-dark">
                        <i class="bi bi-clock-history me-1 text-primary"></i> Booking Terbaru
                    </h6>
                    <a href="{{ Route::has('bookings.index') ? route('bookings.index') : '/bookings' }}" class="btn btn-sm btn-light text-primary fw-semibold">Lihat Semua</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-custom align-middle m-0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Telepon</th>
                                <th>Layanan</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $recentData = $recentBookings ?? App\Models\Booking::with('service')->latest()->take(5)->get();
                        @endphp

                        @forelse($recentData as $b)
                            <tr>
                                <td class="fw-semibold text-dark">{{ $b->nama ?? $b->patient->nama ?? '-' }}</td>
                                <td>{{ $b->telepon ?? $b->patient->telepon ?? '-' }}</td>
                                <td>
                                    <span class="badge bg-light text-dark border">{{ $b->service->nama ?? $b->nama_layanan ?? '-' }}</span>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($b->tanggal ?? $b->tanggal_booking ?? now())->locale('id')->translatedFormat('d F Y') }}</td>
                                <td><i class="bi bi-clock me-1 text-muted"></i>{{ $b->jam ?? $b->waktu ?? '-' }}</td>
                                <td>
                                    @php
                                        $badgeClass = match($b->status ?? '') {
                                            'Diterima' => 'bg-info-subtle text-info',
                                            'Pending'  => 'bg-warning-subtle text-warning',
                                            'Ditolak'  => 'bg-danger-subtle text-danger',
                                            'Selesai'  => 'bg-success-subtle text-success',
                                            default    => 'bg-secondary-subtle text-secondary'
                                        };
                                    @endphp
                                    <span class="badge badge-status {{ $badgeClass }}">
                                        {{ $b->status ?? 'Pending' }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">
                                    <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                    Belum ada data booking terbaru.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

      <!-- CHART CARD -->
<div class="card card-custom">
    <div class="card-header bg-white py-3 px-4 border-bottom">
        <h6 class="fw-bold m-0 text-dark">
            <i class="bi bi-graph-up me-1 text-primary"></i>
            Booking Selesai per Hari
        </h6>

        <small class="text-muted">
            Periode:
            {{ !empty($bulan)
                ? DateTime::createFromFormat('!m', $bulan)->format('F')
                : 'Semua Bulan'
            }}
            {{ $tahun ?? date('Y') }}
        </small>
    </div>

    <div class="card-body p-4">
        <canvas id="chartSelesai" height="80"></canvas>
    </div>
</div>

<!-- CHART SCRIPT -->
<script>
document.addEventListener("DOMContentLoaded", function () {

    const labels = [];
    const data = [];

    @if(isset($selesaiPerHari) && count($selesaiPerHari) > 0)

        @foreach($selesaiPerHari as $item)

            labels.push('Tanggal {{ $item["hari"] }}');
            data.push({{ $item["total"] }});

        @endforeach

    @else

        labels.push('Tidak ada data');
        data.push(0);

    @endif


    new Chart(document.getElementById('chartSelesai'), {

        type: 'bar',

        data: {

            labels: labels,

            datasets: [{

                label: 'Booking Selesai',

                data: data,

                backgroundColor: 'rgba(37, 99, 235, 0.85)',

                borderColor: '#2563eb',

                borderWidth: 1,

                borderRadius: 8,

                borderSkipped: false

            }]

        },

        options: {

            responsive: true,

            maintainAspectRatio: false,

            plugins: {

                legend: {
                    display: false
                },

                tooltip: {

                    callbacks: {

                        label: function(context) {

                            if (context.raw === 0) {
                                return 'Kosong';
                            }

                            return 'Booking Selesai: ' + context.raw;
                        }

                    }

                }

            },

            scales: {

                y: {

                    beginAtZero: true,

                    ticks: {

                        stepSize: 1

                    },

                    grid: {
                        color: '#f1f5f9'
                    }

                },

                x: {

                    grid: {
                        display: false
                    },

                    ticks: {

                        autoSkip: false,

                        maxRotation: 45,

                        minRotation: 45

                    }

                }

            }

        }

    });

});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>