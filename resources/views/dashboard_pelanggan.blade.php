<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Pelanggan - Lintang Sport Recovery</title>

    <!-- Google Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --primary: #1e40af;
            --primary-light: #3b82f6;
            --bg-light: #f8fafc;
            --card-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.01);
            --card-shadow-hover: 0 20px 30px -10px rgba(30, 64, 175, 0.15);
        }

        body {
            background: var(--bg-light);
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #334155;
        }

        /* NAVBAR */
        .navbar {
            height: 80px;
            background: #ffffff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.03);
        }

        .navbar-brand {
            font-size: 1.25rem;
            color: var(--primary) !important;
        }

        .nav-link {
            font-weight: 600;
            margin: 0 8px;
            color: #64748b !important;
            transition: all 0.2s ease;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--primary) !important;
        }

        /* HERO CARD */
        .hero-card {
            background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 50%, #3b82f6 100%);
            color: white;
            border-radius: 24px;
            padding: 45px 40px;
            box-shadow: 0 20px 35px rgba(37, 99, 235, 0.2);
            position: relative;
            overflow: hidden;
        }

        /* STAT CARDS */
        .stat-card {
            background: #fff;
            border: 1px solid #f1f5f9;
            border-radius: 20px;
            padding: 24px;
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--card-shadow-hover);
        }

        .icon-box {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .bg-soft-primary { background: #dbeafe; color: #2563eb; }
        .bg-soft-success { background: #dcfce7; color: #16a34a; }
        .bg-soft-warning { background: #fef3c7; color: #d97706; }

        /* QUICK MENU */
        .action-card {
            background: #ffffff;
            border-radius: 24px;
            padding: 32px;
            border: 1px solid #f1f5f9;
            box-shadow: var(--card-shadow);
        }

        .btn-modern {
            border-radius: 14px;
            padding: 14px 20px;
            font-weight: 600;
            border: none;
            transition: all 0.25s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
        }

        /* CONTENT SECTIONS */
        .content-card {
            background: #ffffff;
            border-radius: 24px;
            padding: 32px;
            border: 1px solid #f1f5f9;
            box-shadow: var(--card-shadow);
            margin-top: 32px;
        }

        .feature-box {
            padding: 24px;
            border-radius: 16px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            transition: 0.3s;
        }

        .feature-box:hover {
            background: #ffffff;
            box-shadow: var(--card-shadow);
            border-color: #cbd5e1;
        }

        /* SERVICE CARDS */
        .service-card {
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        .service-card:hover {
            border-color: #93c5fd;
            box-shadow: var(--card-shadow-hover);
        }

        /* TABLES */
        .custom-table {
            border-collapse: separate;
            border-spacing: 0;
        }

        .custom-table thead th {
            background-color: #f8fafc;
            border-bottom: 2px solid #e2e8f0;
            color: #475569;
            font-weight: 700;
            padding: 14px 16px;
        }

        .custom-table tbody td {
            padding: 16px;
            vertical-align: middle;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container px-4">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="/dashboard-pelanggan">
            <img src="{{ asset('images/logo.png') }}" width="40" height="40" class="me-2 rounded-circle" alt="Logo">
            <span>Lintang Sport Recovery</span>
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav mx-auto my-2 my-lg-0">
                <li class="nav-item"><a class="nav-link active" href="#beranda">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="#tentang">Tentang Kami</a></li>
                <li class="nav-item"><a class="nav-link" href="#riwayat">Riwayat</a></li>
                <li class="nav-item"><a class="nav-link" href="#layanan">Layanan</a></li>
            </ul>

            <div class="d-flex align-items-center gap-3">
                <span class="fw-semibold text-secondary">
                    👋 {{ Auth::user()->name }}
                </span>
                <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    <button class="btn btn-outline-danger btn-sm px-3 rounded-3">
                        <i class="bi bi-box-arrow-right me-1"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>

<!-- MAIN CONTAINER -->
<div id="beranda" class="container py-4 px-4">

    <!-- HERO -->
    <div class="hero-card mb-4">
        <h2 class="fw-bold mb-2">Selamat Datang 👋</h2>
        <p class="mb-0 text-white-50 fs-6">
            Kelola booking massage dan pantau status pemulihan fisik Anda secara langsung di sini.
        </p>
    </div>

    <!-- STATISTIK -->
    <div class="row g-4">
        <div class="col-md-4">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="text-muted small fw-semibold">Total Booking</span>
                        <h2 class="fw-bold mt-1 mb-0">{{ $totalBooking }}</h2>
                    </div>
                    <div class="icon-box bg-soft-primary">
                        <i class="bi bi-calendar-event"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="text-muted small fw-semibold">Booking Selesai</span>
                        <h2 class="fw-bold mt-1 mb-0 text-success">{{ $selesai }}</h2>
                    </div>
                    <div class="icon-box bg-soft-success">
                        <i class="bi bi-check-circle"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="text-muted small fw-semibold">Menunggu Konfirmasi</span>
                        <h2 class="fw-bold mt-1 mb-0 text-warning">{{ $pending }}</h2>
                    </div>
                    <div class="icon-box bg-soft-warning">
                        <i class="bi bi-hourglass-split"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MENU CEPAT -->
    <div class="action-card mt-4">
        <h5 class="fw-bold mb-3 text-dark">Akses Cepat</h5>
        <div class="row g-3">
            <div class="col-md-4">
                <a href="/booking-user" class="btn btn-primary w-100 btn-modern">
                    <i class="bi bi-plus-circle"></i> Booking Sekarang
                </a>
            </div>
            <div class="col-md-4">
                <a href="/history" class="btn btn-success w-100 btn-modern">
                    <i class="bi bi-journal-text"></i> Riwayat Booking
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('profil.index') }}" class="btn btn-outline-dark w-100 btn-modern">
                    <i class="bi bi-person-gear"></i> Profil Saya
                </a>
            </div>
        </div>
    </div>

    <!-- TENTANG KAMI -->
    <div id="tentang" class="content-card">
        <h4 class="fw-bold mb-3 text-dark">🏥 Tentang Kami</h4>
        <p class="text-secondary mb-4" style="text-align: justify; line-height: 1.7;">
            <strong>Lintang Sport Recovery</strong> merupakan layanan terapi dan massage yang berfokus pada pemulihan cedera olahraga, relaksasi otot, serta peningkatan performa tubuh. Kami menyediakan berbagai pilihan layanan seperti <em>Sport Massage, Recovery Cedera, Cupping Therapy (Bekam), Stretching</em>, hingga <em>Home Visit</em> bersama terapis berpengalaman.
        </p>

        <div class="row text-center g-3">
            <div class="col-md-4">
                <div class="feature-box h-100">
                    <div class="fs-2 text-primary mb-2"><i class="bi bi-person-workspace"></i></div>
                    <h6 class="fw-bold">Profesional</h6>
                    <small class="text-muted">Ditangani oleh terapis bersertifikasi & berpengalaman.</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box h-100">
                    <div class="fs-2 text-success mb-2"><i class="bi bi-lightning-charge"></i></div>
                    <h6 class="fw-bold">Pemulihan Cepat</h6>
                    <small class="text-muted">Meringankan nyeri dan mempercepat proses recovery otot.</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box h-100">
                    <div class="fs-2 text-warning mb-2"><i class="bi bi-house-heart"></i></div>
                    <h6 class="fw-bold">Home Visit</h6>
                    <small class="text-muted">Layanan fleksibel dipanggil langsung ke lokasi Anda.</small>
                </div>
            </div>
        </div>
    </div>

    <!-- RIWAYAT BOOKING -->
    <div id="riwayat" class="content-card">
        <h5 class="fw-bold mb-4">Riwayat Booking Saya</h5>
        <div class="table-responsive">
            <table class="table custom-table align-middle">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Layanan</th>
                        <th>Jam</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                    <tr>
                        <td class="fw-semibold">{{ $booking->tanggal }}</td>
                        <td>{{ $booking->service->nama ?? '-' }}</td>
                        <td><i class="bi bi-clock me-1 text-muted"></i> {{ $booking->jam }}</td>
                        <td>
                            @if($booking->status == 'Pending')
                                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">Pending</span>
                            @elseif($booking->status == 'Diterima')
                                <span class="badge bg-success px-3 py-2 rounded-pill">Diterima</span>
                            @elseif($booking->status == 'Ditolak')
                                <span class="badge bg-danger px-3 py-2 rounded-pill">Ditolak</span>
                            @else
                                <span class="badge bg-primary px-3 py-2 rounded-pill">Selesai</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-muted">
                            <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                            Belum ada riwayat booking.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- LAYANAN TERSEDIA -->
    <div id="layanan" class="content-card">
        <h4 class="fw-bold mb-4">💆 Layanan Tersedia</h4>

        <div class="row g-4">
            @forelse($services as $service)
            <div class="col-md-4">
                <div class="card service-card h-100 p-3">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="fw-bold text-dark mb-2">{{ $service->nama }}</h5>
                            <button class="btn btn-light btn-sm text-secondary w-100 text-start border mb-3 d-flex justify-content-between align-items-center"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#detail{{ $service->id }}">
                                <span><i class="bi bi-info-circle me-1"></i> Detail Layanan</span>
                                <i class="bi bi-chevron-down"></i>
                            </button>

                           <div class="collapse mb-3" id="detail{{ $service->id }}">
    <div class="p-3 bg-light rounded-3 small text-muted">

        @php
            $deskripsi = preg_replace(
                '/(\d+)\.\s*/',
                "\n$1. ",
                $service->deskripsi
            );

            $deskripsi = trim($deskripsi);
        @endphp

        @foreach(explode("\n", $deskripsi) as $item)
            @if(trim($item) != '')
                <div class="mb-1">
                    {{ trim($item) }}
                </div>
            @endif
        @endforeach

    </div>
</div>
                        </div>

                        <div>
                            <h4 class="text-primary fw-bold my-2">
                                Rp {{ number_format($service->harga,0,',','.') }}
                            </h4>
                            <a href="/booking-user" class="btn btn-primary w-100 btn-modern mt-2">
                                Booking Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-warning border-0 rounded-4 mb-0">
                    Belum ada layanan tersedia saat ini.
                </div>
            </div>
            @endforelse
        </div>
    </div>

</div>

<!-- FOOTER -->
<footer class="mt-5 pt-5 pb-4 bg-white border-top">
    <div class="container px-4">
        <div class="row g-4">
            <div class="col-md-5">
                <h5 class="fw-bold text-primary mb-3">💆 Lintang Sport Recovery</h5>
                <p class="text-muted pe-md-4" style="line-height: 1.6;">
                    Layanan sport massage, recovery cedera, stretching, dan terapi pemulihan tubuh untuk membantu menjaga performa dan kesehatan Anda.
                </p>
            </div>

            <div class="col-md-3">
                <h6 class="fw-bold mb-3 text-dark">Menu Navigasi</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="/dashboard-pelanggan" class="text-secondary text-decoration-none">Dashboard</a></li>
                    <li class="mb-2"><a href="/booking-user" class="text-secondary text-decoration-none">Booking</a></li>
                    <li class="mb-2"><a href="/history" class="text-secondary text-decoration-none">Riwayat Booking</a></li>
                    <li><a href="/profil-saya" class="text-secondary text-decoration-none">Profil Saya</a></li>
                </ul>
            </div>

            <div class="col-md-4">
                <h6 class="fw-bold mb-3 text-dark">Kontak Kami</h6>
                <ul class="list-unstyled">
                    <li class="mb-3">
                        <a href="https://wa.me/6289601126097" target="_blank" class="text-secondary text-decoration-none d-flex align-items-center">
                            <i class="bi bi-whatsapp me-2 fs-5 text-success"></i> WhatsApp Kami
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="https://instagram.com/lintang.recovery" target="_blank" class="text-secondary text-decoration-none d-flex align-items-center">
                            <i class="bi bi-instagram me-2 fs-5 text-danger"></i> Instagram
                        </a>
                    </li>
                    <li>
                        <a href="https://maps.app.goo.gl/NGYsMNgY2QR1fjER7?g_st=ic" target="_blank" class="text-secondary text-decoration-none d-flex align-items-center">
                            <i class="bi bi-geo-alt-fill me-2 fs-5 text-primary"></i> Lokasi Google Maps
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <hr class="my-4 text-muted">

        <div class="text-center text-muted small">
            © {{ date('Y') }} Lintang Sport Recovery. All Rights Reserved.
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>