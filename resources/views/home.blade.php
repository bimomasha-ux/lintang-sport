<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lintang Sport Recovery - Layanan Terapi & Massage</title>

    <!-- Google Fonts & Bootstrap 5 -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --primary: #1e40af;
            --primary-gradient: linear-gradient(135deg, #1e3a8a 0%, #2563eb 50%, #3b82f6 100%);
            --bg-light: #f8fafc;
            --card-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.01);
            --card-shadow-hover: 0 20px 30px -10px rgba(30, 64, 175, 0.15);
        }

        body {
            background: var(--bg-light);
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #334155;
        }

        .navbar {
    min-height: 80px;
    height: auto;
    background: #ffffff;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    z-index: 1050;
}

.navbar-brand {
    font-size: 1.25rem;
    color: var(--primary) !important;
    white-space: nowrap;
}

.navbar-toggler {
    border: 1px solid #dbeafe !important;
    border-radius: 10px;
    padding: 7px 10px;
    background: #ffffff;
}

.navbar-toggler:focus {
    box-shadow: 0 0 0 0.15rem rgba(37, 99, 235, 0.15);
}

.navbar-collapse {
    background: #ffffff;
}

@media (max-width: 991.98px) {

    .navbar {
        padding: 10px 0;
    }

    .navbar-brand {
        font-size: 1rem;
        max-width: 75%;
    }

    .navbar-brand img {
        width: 36px;
        height: 36px;
    }

    .navbar-collapse {
        margin-top: 10px;
        padding: 12px;
        border-radius: 14px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }

    .navbar-nav {
        width: 100%;
    }

    .navbar-nav .nav-item {
        width: 100%;
    }

    .navbar-nav .nav-link {
        width: 100%;
        margin: 2px 0;
        padding: 10px 12px;
        border-radius: 8px;
    }

    .navbar-nav .nav-link:hover {
        background: #eff6ff;
    }

    .navbar-actions {
        width: 100%;
        flex-direction: column;
        align-items: stretch !important;
        gap: 10px !important;
        padding-top: 12px;
        margin-top: 10px;
        border-top: 1px solid #e2e8f0;
    }

    .navbar-actions .btn {
        width: 100%;
    }

    /* HERO MOBILE */
    .hero {
        padding: 55px 18px 50px;
        border-radius: 0 0 24px 24px;
    }

    .hero img {
        width: 100px;
        height: 100px;
    }

    .hero h1 {
        font-size: 2rem;
        line-height: 1.2;
    }

    .hero p {
        font-size: 0.95rem;
        line-height: 1.7;
    }

    .hero .d-flex {
        flex-direction: column;
        gap: 10px !important;
    }

    .hero .btn {
        width: 100%;
    }
}
        /* HERO SECTION */
        .hero {
            padding: 100px 0 80px;
            background: var(--primary-gradient);
            color: white;
            position: relative;
            overflow: hidden;
            border-radius: 0 0 32px 32px;
        }

        .hero img {
            width: 130px;
            height: 130px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .hero h1 {
            font-weight: 800;
            font-size: 2.75rem;
            letter-spacing: -0.5px;
        }

        .hero p {
            font-size: 1.125rem;
            color: #dbeafe;
            max-width: 650px;
            margin: 0 auto;
        }

        /* SECTION TITLE */
        .section-title {
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.5px;
            position: relative;
            display: inline-block;
        }

        /* CARD CUSTOM */
        .card-custom {
            border: 1px solid #f1f5f9;
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
            background: #ffffff;
        }

        .card-custom:hover {
            transform: translateY(-6px);
            box-shadow: var(--card-shadow-hover);
            border-color: #bfdbfe;
        }

        /* ICON BOX */
        .icon-box {
            width: 64px;
            height: 64px;
            border-radius: 18px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            margin-bottom: 16px;
        }

        .bg-icon-primary { background: #dbeafe; color: #2563eb; }
        .bg-icon-success { background: #dcfce7; color: #16a34a; }
        .bg-icon-warning { background: #fef3c7; color: #d97706; }
        .bg-icon-info { background: #e0f2fe; color: #0284c7; }

        /* BUTTONS */
        .btn-modern {
            border-radius: 12px;
            padding: 12px 28px;
            font-weight: 600;
            transition: all 0.25s ease;
        }

        .btn-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
        }

        /* FOOTER */
        footer {
            background: #ffffff;
            margin-top: 100px;
            padding: 50px 0 30px;
            border-top: 1px solid #e2e8f0;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">

        <!-- LOGO -->
        <a class="navbar-brand fw-bold d-flex align-items-center"
           href="/">

            <img src="{{ asset('images/logo.png') }}"
                 width="40"
                 height="40"
                 class="me-2 rounded-circle"
                 alt="Logo">

            <span>Lintang Sport Recovery</span>
        </a>

        <!-- TOGGLE MOBILE -->
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar"
                aria-controls="mainNavbar"
                aria-expanded="false"
                aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse" id="mainNavbar">

            <!-- MENU KIRI -->
            <ul class="navbar-nav mx-auto my-2 my-lg-0">

                <li class="nav-item">
                    <a class="nav-link active"
                       href="#beranda">
                        Beranda
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                       href="#tentang">
                        Tentang Kami
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                       href="#layanan">
                        Layanan
                    </a>
                </li>

            </ul>

            <!-- BUTTON -->
            <div class="navbar-actions d-flex align-items-center gap-2">

                <a href="/login"
                   class="btn btn-primary btn-modern px-4">
                    Login
                </a>

                <a href="/register"
                   class="btn btn-outline-primary btn-modern px-4">
                    Register
                </a>

            </div>

        </div>

    </div>
</nav>

<!-- HERO -->
<section class="hero text-center">
    <div class="container px-4">
        <img src="{{ asset('images/logo.png') }}" alt="Logo Lintang Sport Recovery" class="mb-3">
        
        <h1 class="mb-3">Lintang Sport Recovery</h1>
        
        <p class="mb-4">
            Sistem booking massage online terpercaya untuk kemudahan pemesanan layanan 
            <em>sport massage</em>, <em>stretching</em>, dan pemulihan fisik secara cepat dan praktis.
        </p>

        <div class="d-flex justify-content-center gap-3">
            <a href="/register" class="btn btn-light btn-modern btn-lg text-primary">
                <i class="bi bi-person-plus me-1"></i> Daftar Sekarang
            </a>
            <a href="/login" class="btn btn-outline-light btn-modern btn-lg">
                <i class="bi bi-box-arrow-in-right me-1"></i> Login
            </a>
        </div>
    </div>
</section>

<!-- TENTANG KAMI -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="section-title">Tentang Kami</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card card-custom p-4 p-md-5 text-center">
                    <p class="fs-5 text-secondary mb-0" style="line-height: 1.8;">
                        <strong>Lintang Sport Recovery</strong> adalah penyedia layanan terapi fisik dan <em>sport massage</em> profesional. Kami berfokus membantu atlet maupun masyarakat umum dalam mempercepat proses pemulihan otot, meredakan rasa nyeri, meningkatkan kelenturan tubuh, serta menjaga kondisi fisik tetap optimal.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- LAYANAN UNGGULAN -->
<section class="py-4">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Layanan Unggulan</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card card-custom p-4 text-center h-100">
                    <div class="icon-box bg-icon-primary mx-auto">
                        <i class="bi bi-heart-pulse"></i>
                    </div>
                    <h5 class="fw-bold text-dark">Sport Massage</h5>
                    <p class="text-muted small mb-0">
                        Memerangi ketegangan otot dan mempercepat relaksasi tubuh setelah aktivitas fisik berat.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-custom p-4 text-center h-100">
                    <div class="icon-box bg-icon-success mx-auto">
                        <i class="bi bi-bandaid"></i>
                    </div>
                    <h5 class="fw-bold text-dark">Recovery Therapy</h5>
                    <p class="text-muted small mb-0">
                        Penanganan cedera ringan dan terapi pemulihan struktur otot untuk mengembalikan performa.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-custom p-4 text-center h-100">
                    <div class="icon-box bg-icon-warning mx-auto">
                        <i class="bi bi-person-walking"></i>
                    </div>
                    <h5 class="fw-bold text-dark">Stretching</h5>
                    <p class="text-muted small mb-0">
                        Meningkatkan fleksibilitas sendi dan jangkauan gerak tubuh agar terhindar dari risiko cedera.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- KEUNGGULAN -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Kenapa Memilih Kami?</h2>
        </div>

        <div class="row g-4">
            <div class="col-6 col-md-3">
                <div class="card card-custom p-4 text-center h-100">
                    <div class="icon-box bg-icon-primary mx-auto">
                        <i class="bi bi-award"></i>
                    </div>
                    <h6 class="fw-bold text-dark mb-0">Terapis Profesional</h6>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="card card-custom p-4 text-center h-100">
                    <div class="icon-box bg-icon-info mx-auto">
                        <i class="bi bi-calendar-check"></i>
                    </div>
                    <h6 class="fw-bold text-dark mb-0">Booking Online</h6>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="card card-custom p-4 text-center h-100">
                    <div class="icon-box bg-icon-warning mx-auto">
                        <i class="bi bi-lightning-charge"></i>
                    </div>
                    <h6 class="fw-bold text-dark mb-0">Respon Cepat</h6>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="card card-custom p-4 text-center h-100">
                    <div class="icon-box bg-icon-success mx-auto">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h6 class="fw-bold text-dark mb-0">Pelayanan Terbaik</h6>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer>
    <div class="container">
        <div class="row align-items-center g-3">
            <div class="col-md-6 text-center text-md-start">
                <h5 class="fw-bold text-primary mb-1">💆 Lintang Sport Recovery</h5>
                <p class="text-muted small mb-0">Sistem Booking Massage Online Praktis & Terpercaya.</p>
            </div>

            <div class="col-md-6 text-center text-md-end">
                <a href="/login" class="btn btn-primary btn-modern me-2">Login</a>
                <a href="/register" class="btn btn-outline-primary btn-modern">Register</a>
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