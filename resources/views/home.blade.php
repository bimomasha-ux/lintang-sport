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
        <a class="navbar-brand fw-bold d-flex align-items-center" href="/">
            <img src="{{ asset('images/logo.png') }}" width="40" height="40" class="me-2 rounded-circle" alt="Logo">
            <span>Lintang Sport Recovery</span>
        </a>

        <div class="ms-auto d-flex gap-2">
            <a href="/login" class="btn btn-primary btn-modern px-4">
                Login
            </a>
            <a href="/register" class="btn btn-outline-primary btn-modern px-4">
                Register
            </a>
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