<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Edit Booking</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        body{
            background:#f4f6f9;
            font-family:Arial, sans-serif;
        }

        .card-edit{
            max-width:800px;
            margin:auto;
            margin-top:40px;
            background:white;
            padding:35px;
            border-radius:20px;
            box-shadow:0 5px 20px rgba(0,0,0,0.08);
        }

        .form-control,
        .form-select{
            height:50px;
            border-radius:12px;
        }

        textarea.form-control{
            height:120px;
        }

        .btn-custom{
            border-radius:12px;
            padding:10px 20px;
        }

        .title{
            font-weight:bold;
        }

    </style>

</head>
<body>

<div class="container">

    <div class="card-edit">

        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2 class="title">
                ✏️ Edit Booking
            </h2>

            <a href="/bookings"
               class="btn btn-secondary btn-custom">

                ← Kembali

            </a>

        </div>

        <!-- ERROR -->
        @if ($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <!-- FORM -->
        <form action="/bookings/{{ $booking->id }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="row">

                <!-- NAMA -->
                <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        Nama Pelanggan
                    </label>

                    <input type="text"
                           name="nama"
                           class="form-control"
                           value="{{ old('nama', $booking->nama) }}"
                           required>

                </div>

                <!-- TELEPON -->
                <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        Nomor Telepon
                    </label>

                    <input type="text"
                           name="telepon"
                           class="form-control"
                           value="{{ old('telepon', $booking->telepon) }}"
                           required>

                </div>

                <!-- LAYANAN -->
                <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        Pilih Layanan
                    </label>

                    <select name="service_id"
                            class="form-select"
                            required>

                        @foreach($services as $service)

                            <option value="{{ $service->id }}"
                                {{ $booking->service_id == $service->id ? 'selected' : '' }}>

                                {{ $service->nama }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <!-- TANGGAL -->
                <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        Tanggal Booking
                    </label>

                    <input type="date"
                           name="tanggal"
                           class="form-control"
                           value="{{ old('tanggal', $booking->tanggal) }}"
                           required>

                </div>

                <!-- JAM -->
                <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        Jam Booking
                    </label>

                    <select name="jam"
                            class="form-select"
                            required>

                        <option value="18:00 - 19:00"
                            {{ $booking->jam == '18:00 - 19:00' ? 'selected' : '' }}>

                            18:00 - 19:00

                        </option>

                        <option value="19:00 - 20:00"
                            {{ $booking->jam == '19:00 - 20:00' ? 'selected' : '' }}>

                            19:00 - 20:00

                        </option>

                        <option value="20:00 - 21:00"
                            {{ $booking->jam == '20:00 - 21:00' ? 'selected' : '' }}>

                            20:00 - 21:00

                        </option>

                        <option value="21:00 - 22:00"
                            {{ $booking->jam == '21:00 - 22:00' ? 'selected' : '' }}>

                            21:00 - 22:00

                        </option>

                    </select>

                </div>

                <!-- STATUS -->
                <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        Status Booking
                    </label>

                    <select name="status"
                            class="form-select">

                        <option value="Pending"
                            {{ $booking->status == 'Pending' ? 'selected' : '' }}>

                            Pending

                        </option>

                        <option value="Diterima"
                            {{ $booking->status == 'Diterima' ? 'selected' : '' }}>

                            Diterima

                        </option>

                        <option value="Ditolak"
                            {{ $booking->status == 'Ditolak' ? 'selected' : '' }}>

                            Ditolak

                        </option>

                    </select>

                </div>

            </div>

            <!-- BUTTON -->
            <button type="submit"
                    class="btn btn-primary btn-custom w-100 mt-3">

                💾 Update Booking

            </button>

        </form>

    </div>

</div>

</body>
</html>