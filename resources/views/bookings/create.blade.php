<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Booking</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: #f4f6f9;
            font-family: Arial, sans-serif;
        }

        .card-custom{
            border: none;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        .btn-custom{
            border-radius: 10px;
            padding: 10px 20px;
        }

        .form-control,
        .form-select{
            border-radius: 10px;
            padding: 10px;
        }

        .header-title{
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-7">

            <!-- CARD -->
            <div class="card card-custom">

                <div class="card-header bg-dark text-white p-4">
                    <h3 class="header-title">
                        📅 Tambah Booking
                    </h3>
                </div>

                <div class="card-body p-4">

                    <form action="/bookings" method="POST">

                        @csrf

                       <!-- NAMA -->
<div class="mb-3">
    <label class="form-label fw-bold">Nama</label>
    <input type="text"
           class="form-control"
           value="{{ Auth::user()->name }}"
           readonly>
</div>

<!-- TELEPON -->
<div class="mb-4">
    <label class="form-label fw-bold">No. Telepon</label>
    <input type="text"
           class="form-control"
           value="{{ Auth::user()->telepon }}"
           readonly>
</div>

                        <!-- SERVICE -->
                        <div class="mb-4">

                            <label class="form-label fw-bold">
                                Layanan
                            </label>

                            <select name="service_id"
                                    class="form-select"
                                    required>

                                <option value="">
                                    -- Pilih Layanan --
                                </option>

                                @foreach($services as $service)

                                <option value="{{ $service->id }}">
                                    {{ $service->nama }}
                                </option>

                                @endforeach

                            </select>

                        </div>

                        <!-- TANGGAL -->
                        <div class="mb-4">

                            <label class="form-label fw-bold">
                                Tanggal Booking
                            </label>

                            <input type="date"
                                   name="tanggal"
                                   class="form-control"
                                   required>

                        </div>
<!-- JAM BOOKING -->
<div class="mb-4">

    <label class="form-label fw-bold">
        Jam Booking
    </label>

    <select name="jam" class="form-select" required>

        <option value="">
            -- Pilih Jam --
        </option>

        <option value="18:30 - 19:30">
            18.30 - 19.30
        </option>

        <option value="19:30 - 20:30">
            19.30 - 20.30
        </option>

        <option value="20:30 - 21:30">
            20.30 - 21.30
        </option>

    </select>

    @error('jam')
        <div class="text-danger mt-2">
            {{ $message }}
        </div>
    @enderror

</div>
                        <!-- STATUS -->
                        <div class="mb-4">

                            <label class="form-label fw-bold">
                                Status
                            </label>

                            <select name="status"
                                    class="form-select">

                                <option value="Pending">
                                    Pending
                                </option>

                                <option value="Selesai">
                                    Selesai
                                </option>

                            </select>

                        </div>

                        <!-- BUTTON -->
                        <div class="d-flex gap-2">

                            <button type="submit"
                                    class="btn btn-primary btn-custom">

                                💾 Simpan

                            </button>

                            <a href="/bookings"
                               class="btn btn-secondary btn-custom">

                                ← Kembali

                            </a>

                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>

</div>

</body>
</html>