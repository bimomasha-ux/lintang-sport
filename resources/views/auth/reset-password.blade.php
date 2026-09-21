<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Reset Password - Lintang Sport Recovery</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .reset-card {
            width: 100%;
            max-width: 625px;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0,0,0,.08);
        }

        .reset-header {
            background: linear-gradient(
                135deg,
                #1E3A8A,
                #2563EB,
                #60A5FA
            );

            color: white;
            padding: 30px;
        }

        .reset-header h3 {
            font-size: 30px;
            margin-bottom: 5px;
        }

        .reset-header small {
            font-size: 16px;
        }

        .reset-body {
            padding: 35px;
        }

        .form-label {
            font-weight: 600;
        }

        .form-control {
            height: 50px;
            border-radius: 12px;
        }

        .form-control:focus {
            border-color: #2563EB;
            box-shadow: 0 0 0 3px rgba(37,99,235,.15);
        }

        .btn-reset {
            height: 52px;
            border-radius: 12px;
            font-weight: bold;
            font-size: 16px;
        }

        .alert {
            border-radius: 12px;
        }
    </style>
</head>

<body>

<div class="reset-card">

    {{-- HEADER --}}
    <div class="reset-header">

        <h3>
            🔐 Reset Password
        </h3>

        <small>
            Lintang Sport Recovery
        </small>

    </div>


    {{-- BODY --}}
    <div class="reset-body">

        {{-- MENAMPILKAN ERROR --}}
        @if ($errors->any())

            <div class="alert alert-danger">

                @foreach ($errors->all() as $error)

                    <div>
                        {{ $error }}
                    </div>

                @endforeach

            </div>

        @endif


        {{-- FORM RESET PASSWORD --}}
        <form method="POST"
              action="{{ route('password.store') }}">

            @csrf


            {{-- TOKEN RESET PASSWORD --}}
            <input
                type="hidden"
                name="token"
                value="{{ $request->route('token') }}">


            {{-- EMAIL --}}
            <div class="mb-3">

                <label class="form-label">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email', $request->email) }}"
                    required
                    autofocus>

            </div>


            {{-- PASSWORD BARU --}}
            <div class="mb-3">

                <label class="form-label">
                    Password Baru
                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Masukkan password baru"
                    required>

            </div>


            {{-- KONFIRMASI PASSWORD --}}
            <div class="mb-4">

                <label class="form-label">
                    Konfirmasi Password
                </label>

                <input
                    type="password"
                    name="password_confirmation"
                    class="form-control"
                    placeholder="Masukkan ulang password baru"
                    required>

            </div>


            {{-- TOMBOL RESET --}}
            <button
                type="submit"
                class="btn btn-primary btn-reset w-100">

                🔐 RESET PASSWORD

            </button>

        </form>

    </div>

</div>

</body>
</html>