<!DOCTYPE html>
<html>
<head>
    <title>Lintang Sport Recovery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Lintang Sport Recovery</a>
        <div>
            <a href="/" class="btn btn-outline-light btn-sm">Home</a>
            <a href="/tentang" class="btn btn-outline-light btn-sm">Tentang</a>
            <a href="/layanan" class="btn btn-outline-light btn-sm">Layanan</a>
            <a href="/booking" class="btn btn-outline-light btn-sm">Booking</a>
            <a href="/kontak" class="btn btn-outline-light btn-sm">Kontak</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

<footer class="bg-dark text-white text-center p-3 mt-5">
    © 2026 Lintang Sport Recovery | Sport Massage & Injury Therapy
</footer>

</body>
</html>