<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Layanan - Lintang Sport Recovery</title>

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

        /* SIDEBAR STYLING PRESET */
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
            <img src="{{ asset('images/logo.png') }}" alt="Logo" width="40" height="40" class="me-2 rounded-circle">
            <span class="brand-text">Lintang Sport Recovery</span>
        </a>

        <div class="d-flex align-items-center gap-3">
            <div class="d-flex align-items-center gap-2">
                <div class="avatar-initial">
                    A
                </div>
                <span class="fw-semibold text-dark">Admin</span>
            </div>

            <form method="POST" action="{{ route('logout') }}" class="m-0">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm rounded-3 px-3">
                    <i class="bi bi-box-arrow-right me-1"></i> Logout
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
                    <a href="{{ Route::has('dashboard.admin') ? route('dashboard.admin') : '/dashboard-admin' }}" class="nav-link">
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
                    <a href="{{ Route::has('services.index') ? route('services.index') : '/services' }}" class="nav-link active">
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

            <!-- PAGE HEADER -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold m-0 text-dark">Data Layanan</h4>
                    <p class="text-muted small m-0 mt-1">Kelola daftar jenis terapi dan layanan recovery yang tersedia.</p>
                </div>

                <a href="{{ route('services.create') }}" class="btn btn-primary btn-sm px-3 rounded-2 fw-semibold d-flex align-items-center gap-1" style="font-size: 0.85rem;">
                    <i class="bi bi-plus-lg"></i> Tambah Layanan
                </a>
            </div>

            <!-- ALERT NOTIFIKASI -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4" role="alert">
                    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- TABLE CARD -->
            <div class="card card-custom">
                <div class="table-responsive">
                    <table class="table table-custom align-middle">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 60px;">No</th>
                                <th>Nama Layanan</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th class="text-center" style="width: 120px;">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($services as $service)
                                <tr>
                                    <td class="text-center text-muted fw-semibold">{{ $loop->iteration }}</td>
                                    
                                    <td class="fw-bold text-dark">
                                        {{ $service->nama }}
                                    </td>

                                    <td class="text-secondary">
                                        {{ $service->deskripsi ?? '-' }}
                                    </td>

                                    <td class="fw-semibold text-primary">
                                        Rp {{ number_format($service->harga ?? $service->price ?? 0, 0, ',', '.') }}
                                    </td>

                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-1">
                                            <a href="{{ route('services.edit', $service->id) }}" class="btn btn-sm btn-light border text-warning" title="Edit Layanan">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-light border text-danger" title="Hapus Layanan">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5">
                                        <div class="py-3">
                                            <i class="bi bi-activity display-6 text-muted opacity-50 d-block mb-2"></i>
                                            <span class="fw-semibold text-secondary">Belum ada data layanan yang ditambahkan.</span>
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