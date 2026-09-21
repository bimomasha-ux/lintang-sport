<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan - Lintang Sport Recovery</title>

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

        /* SIDEBAR STYLING */
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
            text-transform: uppercase;
            letter-spacing: 0.5px;
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

        .table-custom tbody tr:hover {
            background-color: #f8fafc;
        }

        /* ACTION BUTTONS & AVATAR */
        .btn-icon {
            width: 34px;
            height: 34px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .btn-icon:hover {
            transform: translateY(-1px);
        }

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

        .avatar-user {
            width: 32px;
            height: 32px;
            background: #e2e8f0;
            color: #475569;
            font-weight: 700;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
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
                    <a href="{{ Route::has('patients.index') ? route('patients.index') : '/patients' }}" class="nav-link active">
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

        <!-- CONTENT AREA -->
        <div class="col-md-10 p-4">

            <!-- HEADER PAGE -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
                <div>
                    <h4 class="fw-bold m-0 text-dark">Data Pelanggan Terdaftar</h4>
                    <p class="text-muted small m-0 mt-1">Kelola data seluruh akun pelanggan yang terdaftar dalam sistem.</p>
                </div>
            </div>

            <!-- NOTIFIKASI -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4" role="alert">
                    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4" role="alert">
                    <i class="bi bi-exclamation-triangle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- FILTER & SEARCH CARD -->
            <div class="card card-custom p-3 mb-4">
                <form action="{{ Route::has('patients.index') ? route('patients.index') : '/patients' }}" method="GET" class="m-0">
                    <div class="row g-2">
                        <div class="col-md-8">
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0 text-muted ps-3">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input type="text" 
                                       name="search" 
                                       value="{{ request('search') }}" 
                                       class="form-control border-start-0 shadow-none ps-0" 
                                       placeholder="Cari berdasarkan nama, email, atau nomor HP...">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100 fw-semibold rounded-3">
                                Cari Data
                            </button>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ Route::has('patients.index') ? route('patients.index') : '/patients' }}" class="btn btn-light border w-100 fw-semibold text-secondary rounded-3">
                                Reset
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            <!-- DATA TABLE CARD -->
            <div class="card card-custom">
                <div class="table-responsive">
                    <table class="table table-custom align-middle m-0">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">No</th>
                                <th>Pelanggan</th>
                                <th>Email</th>
                                <th>No. Telepon / WA</th>
                                <th>Tanggal Registrasi</th>
                                <th class="text-center" style="width: 110px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
    @forelse($patients as $patient)
    <tr>
        <td class="text-center text-muted fw-semibold">{{ $loop->iteration }}</td>
        <td>
            <div class="d-flex align-items-center gap-2">
                <div class="avatar-user me-1">
                    {{ strtoupper(substr($patient->name, 0, 1)) }}
                </div>
                <span class="fw-bold text-dark">{{ $patient->name }}</span>
            </div>
        </td>
        <td class="text-secondary fw-medium">
            <i class="bi bi-envelope me-1 text-muted"></i>{{ $patient->email }}
        </td>
        <td>
            @if($patient->telepon)
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $patient->telepon) }}" target="_blank" class="text-decoration-none text-secondary fw-medium">
                    <i class="bi bi-whatsapp text-success me-1"></i>{{ $patient->telepon }}
                </a>
            @else
                <span class="text-muted">-</span>
            @endif
        </td>
        <td class="text-nowrap fw-medium text-secondary">
            <i class="bi bi-calendar3 me-1 text-muted"></i>
            {{ $patient->created_at ? $patient->created_at->format('d M Y') : '-' }}
        </td>
        <td class="text-center">
            <div class="d-flex justify-content-center gap-1">
                <a href="{{ Route::has('patients.edit') ? route('patients.edit', $patient->id) : '/patients/' . $patient->id . '/edit' }}" class="btn btn-light btn-icon text-warning border" title="Edit Data">
                    <i class="bi bi-pencil-square"></i>
                </a>

                <form action="{{ Route::has('patients.destroy') ? route('patients.destroy', $patient->id) : '/patients/' . $patient->id }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data pelanggan ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-light btn-icon text-danger border" title="Hapus Data">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="6" class="text-center py-5">
            <div class="py-4">
                <i class="bi bi-people display-6 d-block mb-2 text-muted opacity-50"></i>
                <span class="fw-semibold text-secondary">Belum ada data pelanggan yang ditemukan.</span>
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