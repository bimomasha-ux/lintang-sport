<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Edit Layanan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
            font-family: Arial, sans-serif;
        }

        .card-edit {
            max-width: 700px;
            margin: 50px auto;
            background: white;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .form-control {
            border-radius: 12px;
            height: 50px;
        }

        textarea.form-control {
            height: 120px;
        }

        .btn-custom {
            border-radius: 12px;
            padding: 10px 20px;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card-edit">

        <h2 class="fw-bold mb-4">
            ✏ Edit Layanan
        </h2>

        {{-- ERROR --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- FORM EDIT --}}
        <form action="{{ route('services.update', $service->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            {{-- NAMA LAYANAN --}}
            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Nama Layanan
                </label>

                <input type="text"
                       name="nama"
                       class="form-control"
                       value="{{ $service->nama }}"
                       required>

            </div>

            {{-- DESKRIPSI --}}
            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Deskripsi
                </label>

                <textarea name="deskripsi"
                          class="form-control"
                          required>{{ $service->deskripsi }}</textarea>

            </div>

            {{-- HARGA --}}
            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Harga
                </label>

                <input type="number"
                       name="harga"
                       class="form-control"
                       value="{{ $service->harga }}"
                       required>

            </div>

            {{-- DURASI --}}
            <div class="mb-4">

                <label class="form-label fw-semibold">
                    Durasi (Menit)
                </label>

                <input type="number"
                       name="durasi"
                       class="form-control"
                       value="{{ $service->durasi }}"
                       required>

            </div>

            {{-- BUTTON --}}
            <button type="submit"
                    class="btn btn-primary btn-custom">

                💾 Update Layanan

            </button>

            <a href="{{ route('services.index') }}"
               class="btn btn-secondary btn-custom">

                ← Kembali

            </a>

        </form>

    </div>

</div>

</body>
</html>