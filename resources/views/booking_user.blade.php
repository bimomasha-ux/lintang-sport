<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Massage - Lintang Sport Recovery</title>

    <!-- Google Fonts & Bootstrap Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1e40af;
            --bg-light: #f8fafc;
            --border-color: #e2e8f0;
        }

        body {
            background-color: var(--bg-light);
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #334155;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 0;
            -webkit-font-smoothing: antialiased;
        }

        .booking-card {
            max-width: 600px;
            width: 100%;
            background: #ffffff;
            border-radius: 24px;
            overflow: hidden;
            border: 1px solid var(--border-color);
            box-shadow: 0 20px 40px -15px rgba(15, 23, 42, 0.07);
        }

        .booking-header {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            color: #ffffff;
            padding: 32px 36px;
            position: relative;
        }

        .booking-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #2563eb, #60a5fa);
        }

        .booking-body {
            padding: 36px;
        }

        .form-label {
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #64748b;
            margin-bottom: 8px;
        }

        .form-control,
        .form-select {
            height: 52px;
            border-radius: 12px;
            border: 1.5px solid var(--border-color);
            padding: 0 16px;
            font-weight: 500;
            color: #0f172a !important;
            background-color: #ffffff !important;
            transition: all 0.2s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }

        .form-control[readonly] {
            background-color: #f8fafc !important;
            color: #64748b !important;
            border-color: #f1f5f9;
        }

        .input-icon-group {
            position: relative;
        }

        .input-icon-group i {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            pointer-events: none;
        }

        .btn-book {
            height: 54px;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 700;
            background: var(--primary);
            border: none;
            box-shadow: 0 4px 14px rgba(37, 99, 235, 0.35);
            transition: all 0.2s ease;
        }

        .btn-book:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.45);
        }

        .btn-book:active {
            transform: translateY(0);
        }

        .alert-danger {
            border-radius: 12px;
            border: 1px solid #fecaca;
            background-color: #fef2f2;
            color: #991b1b;
            font-size: 0.9rem;
        }

        .badge-brand {
            background: rgba(255, 255, 255, 0.1);
            color: #93c5fd;
            padding: 6px 12px;
            border-radius: 50rem;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            display: inline-block;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center">

    <div class="booking-card">

        <!-- HEADER -->
        <div class="booking-header">
            <span class="badge-brand mb-2">LINTANG SPORT RECOVERY</span>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-calendar2-check me-2"></i>Form Booking Massage
            </h3>
            <p class="text-white-50 m-0 small">Silakan isi jadwal penanganan yang Anda inginkan.</p>
        </div>

        <!-- BODY -->
        <div class="booking-body">

            <!-- ERROR VALIDASI -->
            @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/booking-user" method="POST">
                @csrf

                <!-- DATA PELANGGAN (READONLY) -->
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Nama Pelanggan</label>
                        <div class="input-icon-group">
                            <input type="text"
                                   class="form-control"
                                   value="{{ Auth::user()->name }}"
                                   readonly>
                            <i class="bi bi-person"></i>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Nomor Telepon</label>
                        <div class="input-icon-group">
                            <input type="text"
                                   class="form-control"
                                   value="{{ Auth::user()->telepon }}"
                                   readonly>
                            <i class="bi bi-telephone"></i>
                        </div>
                    </div>
                </div>

                <!-- LAYANAN -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Pilih Layanan</label>
                    <select name="service_id" class="form-select" required>
                        <option value="">-- Pilih Layanan --</option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}">
                                {{ $service->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- TANGGAL & JAM (SIDE BY SIDE) -->
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Tanggal Booking</label>
                        <input type="date"
                               id="tanggal"
                               name="tanggal"
                               class="form-control"
                               min="{{ date('Y-m-d') }}"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Jam Booking</label>
                        <select name="jam" id="jam" class="form-select" required>
                            <option value="">-- Pilih Jam --</option>
                            <option value="18:30 - 19:30">18:30 - 19:30</option>
                            <option value="19:30 - 20:30">19:30 - 20:30</option>
                            <option value="20:30 - 21:30">20:30 - 21:30</option>
                        </select>
                    </div>
                </div>

                <!-- BUTTON -->
                <button type="submit" class="btn btn-primary w-100 btn-book">
                    <i class="bi bi-calendar-plus me-2"></i>Konfirmasi Booking
                </button>

            </form>

        </div>

    </div>

</div>

<!-- SCRIPT REALTIME BOOKING -->
<script>
const today = new Date().toISOString().split('T')[0];
document.getElementById('tanggal').setAttribute('min', today);

document.getElementById('tanggal').addEventListener('change', function(){
    let tanggal = this.value;

    fetch('/cek-booking/' + tanggal)
    .then(response => response.json())
    .then(data => {
        let jamSelect = document.getElementById('jam');
        let options = jamSelect.options;
        let rekomendasi = false;

        // Reset semua option
        for(let i = 0; i < options.length; i++){
            if(options[i].value == "") continue;
            options[i].disabled = false;
            options[i].text = options[i].value;
        }

        // Tandai yang sudah dibooking
        for(let i = 0; i < options.length; i++){
            if(options[i].value == "") continue;
            if(data.includes(options[i].value)){
                options[i].disabled = true;
                options[i].text = options[i].value + " (Penuh)";
            }
        }

        // Cari slot kosong pertama
        for(let i = 0; i < options.length; i++){
            if(options[i].value == "") continue;
            if(!options[i].disabled){
                options[i].selected = true;
                options[i].text = options[i].value + " ⭐ Rekomendasi";
                rekomendasi = true;
                break;
            }
        }

        if(!rekomendasi){
            alert("Maaf, seluruh jadwal pada tanggal tersebut sudah penuh.");
        }
    })
});
</script>

</body>
</html>