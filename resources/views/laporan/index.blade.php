<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Booking - Lintang Sport Recovery</title>

    <!-- Google Fonts & Bootstrap Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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

        /* NAVBAR HEADER */
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
        }        /* CARDS STATS */
        .card-stat {
            background: #ffffff;
            border-radius: 14px;
            border: 1px solid #e2e8f0;
            padding: 18px 20px;
            height: 100%;
        }

        .stat-label {
            font-size: 0.78rem;
            font-weight: 600;
            color: #64748b;
            margin-bottom: 4px;
        }

        .stat-value {
            font-size: 1.75rem;
            font-weight: 800;
            color: #0f172a;
            line-height: 1;
        }

        .icon-box {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }

        .icon-blue { background: #dbeafe; color: var(--primary-blue); }
        .icon-cyan { background: #cff4fc; color: #0dcaf0; }
        .icon-yellow { background: #fef3c7; color: #d97706; }
        .icon-red { background: #fee2e2; color: #dc2626; }
        .icon-green { background: #dcfce7; color: #16a34a; }

        /* CARDS & TABLES */
        .card-custom {
            background: #ffffff;
            border-radius: 14px;
            border: 1px solid #e2e8f0;
            overflow: hidden;
        }

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

        .badge-service {
            background-color: #f1f5f9;
            color: #334155;
            font-weight: 600;
            font-size: 0.72rem;
            padding: 5px 10px;
            border-radius: 6px;
            border: 1px solid #e2e8f0;
        }

        /* STATUS BADGES */
        .badge-status {
            font-weight: 700;
            font-size: 0.72rem;
            padding: 5px 12px;
            border-radius: 20px;
            display: inline-block;
        }

        .badge-status-pending { background-color: #fef3c7; color: #d97706; }
        .badge-status-diterima { background-color: #cff4fc; color: #0891b2; }
        .badge-status-ditolak { background-color: #fee2e2; color: #dc2626; }
        .badge-status-selesai { background-color: #dcfce7; color: #16a34a; }
        .badge-status-default { background-color: #f1f5f9; color: #475569; }

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
<nav class="navbar navbar-custom sticky-top px-4">
    <div class="container-fluid p-0">
        <a class="navbar-brand d-flex align-items-center gap-2 m-0" href="#">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" width="32" height="32" onerror="this.onerror=null; this.remove();">
            <span class="brand-text">Lintang Sport Recovery</span>
        </a>

        <div class="d-flex align-items-center gap-3">
            <div class="d-flex align-items-center gap-2">
                <div class="avatar-initial">A</div>
                <span class="fw-bold text-dark d-none d-sm-inline" style="font-size: 0.88rem;">Admin</span>
            </div>

            <form method="POST" action="{{ route('logout') }}" class="m-0">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm px-3 rounded-2 fw-semibold d-flex align-items-center gap-1" style="font-size: 0.82rem;">
                    <i class="bi bi-box-arrow-right"></i> Logout
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
                    <a href="{{ Route::has('dashboard.admin') ? route('dashboard.admin') : '/dashboard-admin' }}" class="nav-link {{ request()->routeIs('dashboard*') ? 'active' : '' }}">
                        <i class="bi bi-grid-1x2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ Route::has('bookings.index') ? route('bookings.index') : '/bookings' }}" class="nav-link {{ request()->routeIs('bookings*') ? 'active' : '' }}">
                        <i class="bi bi-calendar-check"></i> Booking
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ Route::has('patients.index') ? route('patients.index') : '/patients' }}" class="nav-link {{ request()->routeIs('patients*') ? 'active' : '' }}">
                        <i class="bi bi-people"></i> Pelanggan
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ Route::has('services.index') ? route('services.index') : '/services' }}" class="nav-link {{ request()->routeIs('services*') ? 'active' : '' }}">
                        <i class="bi bi-activity"></i> Layanan
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ Route::has('laporan') ? route('laporan') : '/laporan' }}" class="nav-link {{ request()->routeIs('laporan*') ? 'active' : '' }}">
                        <i class="bi bi-bar-chart"></i> Laporan
                    </a>
                </li>
            </ul>
        </div>

        <!-- MAIN CONTENT AREA -->
        <div class="col-md-10 p-4">

            <!-- PAGE HEADER -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold m-0 text-dark">📊 Laporan Booking</h4>
                    <p class="text-muted small m-0 mt-1">Data dan rekapitulasi statistik booking Lintang Sport Recovery.</p>
                </div>

                @if(Route::has('laporan.export.excel'))
                <a href="{{ route('laporan.export.excel', ['tahun' => $tahun ?? date('Y'), 'bulan' => $bulan ?? '', 'status' => request('status')]) }}" class="btn btn-success btn-sm px-3 rounded-2 fw-semibold d-flex align-items-center gap-1" style="font-size: 0.85rem;">
                    <i class="bi bi-file-earmark-excel"></i> Download Excel
                </a>
                @endif
            </div>

            <!-- RINGKASAN CARDS (STATISTIK 5 KARTU) -->
            <div class="row g-3 mb-4">
                <div class="col-md">
                    <div class="card-stat d-flex justify-content-between align-items-center">
                        <div>
                            <div class="stat-label">Total Booking</div>
                            <div class="stat-value">{{ $totalBooking ?? 0 }}</div>
                        </div>
                        <div class="icon-box icon-blue">
                            <i class="bi bi-calendar-event"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md">
                    <div class="card-stat d-flex justify-content-between align-items-center">
                        <div>
                            <div class="stat-label">Diterima</div>
                            <div class="stat-value text-info">{{ $diterima ?? 0 }}</div>
                        </div>
                        <div class="icon-box icon-cyan">
                            <i class="bi bi-check-circle"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md">
                    <div class="card-stat d-flex justify-content-between align-items-center">
                        <div>
                            <div class="stat-label">Pending</div>
                            <div class="stat-value text-warning">{{ $pending ?? 0 }}</div>
                        </div>
                        <div class="icon-box icon-yellow">
                            <i class="bi bi-clock-history"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md">
                    <div class="card-stat d-flex justify-content-between align-items-center">
                        <div>
                            <div class="stat-label">Ditolak</div>
                            <div class="stat-value text-danger">{{ $ditolak ?? 0 }}</div>
                        </div>
                        <div class="icon-box icon-red">
                            <i class="bi bi-x-circle"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md">
                    <div class="card-stat d-flex justify-content-between align-items-center">
                        <div>
                            <div class="stat-label">Selesai</div>
                            <div class="stat-value text-success">{{ $selesai ?? 0 }}</div>
                        </div>
                        <div class="icon-box icon-green">
                            <i class="bi bi-check2-all"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FILTER SECTION -->
            <div class="card border-0 shadow-sm rounded-3 p-3 mb-4" style="background: #ffffff; border: 1px solid #e2e8f0 !important;">
                <form method="GET" action="{{ Route::has('laporan') ? route('laporan') : '/laporan' }}" class="m-0">
                    <div class="row g-3 align-items-end">

                        <!-- FILTER TAHUN -->
                        <div class="col-md-3">
                            <label class="form-label stat-label mb-1">Tahun</label>
                            <select name="tahun" class="form-select form-select-sm fw-semibold shadow-none">
                                @for($i = date('Y'); $i >= 2023; $i--)
                                    <option value="{{ $i }}" {{ ($tahun ?? date('Y')) == $i ? 'selected' : '' }}>
                                        {{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>

                        <!-- FILTER BULAN -->
                        <div class="col-md-3">
                            <label class="form-label stat-label mb-1">Bulan</label>
                            <select name="bulan" class="form-select form-select-sm fw-semibold shadow-none">
                                <option value="">Semua Bulan</option>
                                @for($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}" {{ ($bulan ?? '') == $i ? 'selected' : '' }}>
                                        {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                                    </option>
                                @endfor
                            </select>
                        </div>

                        <!-- FILTER STATUS -->
                        <div class="col-md-3">
                            <label class="form-label stat-label mb-1">Status</label>
                            <select name="status" class="form-select form-select-sm fw-semibold shadow-none">
                                <option value="">Semua Status</option>
                                <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Diterima" {{ request('status') == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                                <option value="Ditolak" {{ request('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                                <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                        </div>

                        <!-- BUTTON FILTER & RESET -->
                        <div class="col-md-3 d-flex gap-2">
                            <button type="submit" class="btn btn-primary btn-sm w-100 fw-semibold d-flex align-items-center justify-content-center gap-1">
                                <i class="bi bi-funnel"></i> Filter
                            </button>
                            <a href="{{ Route::has('laporan') ? route('laporan') : '/laporan' }}" class="btn btn-light border btn-sm w-100 fw-semibold d-flex align-items-center justify-content-center gap-1 text-secondary">
                                Reset
                            </a>
                        </div>

                    </div>
                </form>
            </div>

            <!-- TABLE CARD (TABEL UTAMA) -->
            <div class="card card-custom">
                <div class="p-3 border-bottom">
                    <h6 class="fw-bold m-0 text-dark d-flex align-items-center gap-2" style="font-size: 0.92rem;">
                        <i class="bi bi-journal-text text-primary"></i> Data Booking
                    </h6>
                </div>

                <div class="table-responsive">
                    <table class="table table-custom align-middle">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">No</th>
                                <th>Nama</th>
                                <th>Layanan</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Harga</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($bookings as $booking)
                                <tr>
                                    <td class="text-center text-muted fw-semibold">{{ $loop->iteration }}</td>

                                    <td class="fw-semibold text-dark">{{ $booking->nama }}</td>

                                    <td>
                                        <span class="badge-service">
                                            {{ $booking->service->nama ?? '-' }}
                                        </span>
                                    </td>

                                    <td class="text-secondary">
                                        {{ \Carbon\Carbon::parse($booking->tanggal)->locale('id')->translatedFormat('d F Y') }}
                                    </td>

                                    <td class="text-secondary">
                                        <i class="bi bi-clock me-1"></i>{{ $booking->jam }}
                                    </td>

                                    <td class="fw-semibold text-dark">
                                        Rp {{ number_format($booking->service->harga ?? 0, 0, ',', '.') }}
                                    </td>

                                    <td>
                                        @if($booking->status == 'Pending')
                                            <span class="badge-status badge-status-pending">Pending</span>
                                        @elseif($booking->status == 'Diterima')
                                            <span class="badge-status badge-status-diterima">Diterima</span>
                                        @elseif($booking->status == 'Selesai')
                                            <span class="badge-status badge-status-selesai">Selesai</span>
                                        @elseif($booking->status == 'Ditolak')
                                            <span class="badge-status badge-status-ditolak">Ditolak</span>
                                        @else
                                            <span class="badge-status badge-status-default">{{ $booking->status }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5">
                                        <div class="py-3">
                                            <i class="bi bi-file-earmark-x display-6 text-muted opacity-50 d-block mb-2"></i>
                                            <span class="fw-semibold text-secondary">Belum ada data booking sesuai filter yang dipilih.</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>