<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Tambah Layanan</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        body{
            background:#f4f7fb;
        }

        .service-card{
            max-width:700px;
            margin:auto;
            margin-top:50px;
            background:white;
            border-radius:20px;
            padding:35px;
            box-shadow:0 5px 25px rgba(0,0,0,0.1);
        }

        .form-control{
            height:50px;
            border-radius:12px;
            color:black !important;
        }

        textarea.form-control{
            height:120px;
        }

        .btn-save{
            height:50px;
            border-radius:12px;
            font-size:18px;
        }

    </style>

</head>
<body>

<div class="container">

    <div class="service-card">

        <h1 class="fw-bold mb-4">
            💆 Tambah Layanan
        </h1>

        <form action="/services"
              method="POST">

            @csrf

            <!-- NAMA -->
            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Nama Layanan
                </label>

                <input type="text"
                       name="nama"
                       class="form-control"
                       placeholder="Masukkan nama layanan"
                       required>

            </div>

            <!-- DESKRIPSI -->
            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Deskripsi
                </label>

                <textarea name="deskripsi"
                          class="form-control"
                          placeholder="Masukkan deskripsi layanan"
                          required></textarea>

            </div>

            <!-- HARGA -->
            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Harga
                </label>

                <input type="number"
                       name="harga"
                       class="form-control"
                       placeholder="Masukkan harga"
                       required>

            </div>

            <!-- DURASI -->
            <div class="mb-4">

                <label class="form-label fw-semibold">
                    Durasi (Menit)
                </label>

                <input type="number"
                       name="durasi"
                       class="form-control"
                       placeholder="Contoh: 60"
                       required>

            </div>

            <!-- BUTTON -->
            <button type="submit"
                    class="btn btn-primary w-100 btn-save">

                💾 Simpan Layanan

            </button>

        </form>

    </div>

</div>

</body>
</html>