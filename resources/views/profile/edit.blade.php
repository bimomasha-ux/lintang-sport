<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        {{ $user->role === 'admin' ? 'Profil Admin' : 'Profil Pelanggan' }}
        - Lintang Sport Recovery
    </title>

    {{-- Bootstrap Icons --}}
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Bootstrap --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet">


    <style>

        body {
            background: #f4f7fb;
            min-height: 100vh;
        }

        .profile-card {
            max-width: 700px;
            margin: 60px auto;
            background: #fff;
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .08);
        }

        .profile-header {
            background: linear-gradient(
                135deg,
                #1E3A8A,
                #2563EB,
                #60A5FA
            );

            color: white;
            padding: 25px;
        }

        .profile-header h3 {
            font-weight: 700;
        }

        .profile-body {
            padding: 35px;
        }

        .form-control {
            height: 50px;
            border-radius: 12px;
        }

        .btn-save {
            height: 50px;
            border-radius: 12px;
            font-weight: bold;
        }

        .profile-info {
            background: #f8fafc;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .avatar {
            width: 65px;
            height: 65px;
            border-radius: 50%;

            background: white;
            color: #2563eb;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 25px;
            font-weight: bold;

            margin-bottom: 12px;
        }

        .role-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;

            background: rgba(255,255,255,.2);

            font-size: 13px;
            font-weight: 600;
        }

        .password-title {
            font-weight: 700;
            color: #1e293b;
        }

        hr {
            margin: 30px 0;
            border-color: #e2e8f0;
        }

    </style>

</head>


<body>


<div class="container">


    <div class="profile-card">


        {{-- =====================================================
             HEADER PROFIL
        ====================================================== --}}

        <div class="profile-header">


            <div class="avatar">

                {{ strtoupper(substr($user->name, 0, 1)) }}

            </div>


            <h3 class="mb-1">

                @if($user->role === 'admin')

                    👤 Profil Admin

                @else

                    👤 Profil Pelanggan

                @endif

            </h3>


            <span class="role-badge">

                @if($user->role === 'admin')

                    <i class="bi bi-shield-check me-1"></i>
                    Administrator

                @else

                    <i class="bi bi-person me-1"></i>
                    Pelanggan

                @endif

            </span>


        </div>



        {{-- =====================================================
             BODY
        ====================================================== --}}

        <div class="profile-body">


            {{-- =================================================
                 PESAN BERHASIL
            ================================================== --}}

            @if(session('success'))

                <div class="alert alert-success">

                    <i class="bi bi-check-circle me-2"></i>

                    {{ session('success') }}

                </div>

            @endif



            {{-- =================================================
                 PESAN ERROR
            ================================================== --}}

            @if ($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif



            {{-- =================================================
                 INFORMASI AKUN
            ================================================== --}}

            <div class="profile-info">

                <div class="row">


                    <div class="col-md-6">

                        <small class="text-muted">
                            Nama Akun
                        </small>

                        <div class="fw-bold">

                            {{ $user->name }}

                        </div>

                    </div>


                    <div class="col-md-6">

                        <small class="text-muted">
                            Email
                        </small>

                        <div class="fw-bold">

                            {{ $user->email }}

                        </div>

                    </div>


                </div>

            </div>



            {{-- =================================================
                 FORM UPDATE PROFIL
            ================================================== --}}

            <form
                action="{{ route('profil.update') }}"
                method="POST">

                @csrf

                @method('PUT')



                {{-- NAMA --}}

                <div class="mb-3">

                    <label class="form-label fw-bold">

                        Nama

                    </label>


                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name', $user->name) }}"
                        required
                    >


                    @error('name')

                        <div class="text-danger mt-1">

                            {{ $message }}

                        </div>

                    @enderror

                </div>



                {{-- EMAIL --}}

                <div class="mb-3">

                    <label class="form-label fw-bold">

                        Email

                    </label>


                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email', $user->email) }}"
                        required
                    >


                    @error('email')

                        <div class="text-danger mt-1">

                            {{ $message }}

                        </div>

                    @enderror

                </div>



                {{-- TELEPON --}}

                <div class="mb-3">

                    <label class="form-label fw-bold">

                        Nomor Telepon

                    </label>


                    <input
                        type="text"
                        name="telepon"
                        class="form-control"
                        value="{{ old('telepon', $user->telepon) }}"
                        placeholder="Masukkan nomor telepon"
                    >


                    @error('telepon')

                        <div class="text-danger mt-1">

                            {{ $message }}

                        </div>

                    @enderror

                </div>



                <hr>



                {{-- =================================================
                     PASSWORD
                ================================================== --}}

                <h5 class="password-title mb-3">

                    🔐 Ubah Password

                    <small class="text-muted fs-6">
                        (Opsional)
                    </small>

                </h5>



                {{-- PASSWORD BARU --}}

                <div class="mb-3">

                    <label class="form-label fw-bold">

                        Password Baru

                    </label>


                    <div class="input-group">

                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="form-control"
                            placeholder="Kosongkan jika tidak ingin mengganti password"
                        >


                        <button
                            class="btn btn-outline-secondary"
                            type="button"
                            onclick="togglePassword()">

                            <i
                                class="bi bi-eye"
                                id="iconPassword">
                            </i>

                        </button>

                    </div>


                    @error('password')

                        <div class="text-danger mt-1">

                            {{ $message }}

                        </div>

                    @enderror

                </div>



                {{-- KONFIRMASI PASSWORD --}}

                <div class="mb-4">

                    <label class="form-label fw-bold">

                        Konfirmasi Password

                    </label>


                    <div class="input-group">

                        <input
                            type="password"
                            name="password_confirmation"
                            id="password_confirmation"
                            class="form-control"
                            placeholder="Masukkan ulang password baru"
                        >


                        <button
                            class="btn btn-outline-secondary"
                            type="button"
                            onclick="toggleConfirmPassword()">

                            <i
                                class="bi bi-eye"
                                id="iconConfirmPassword">
                            </i>

                        </button>

                    </div>

                </div>



                {{-- =================================================
                     BUTTON
                ================================================== --}}

                <div class="d-flex gap-2">


                    <button
                        type="submit"
                        class="btn btn-primary btn-save w-100">

                        💾 Simpan Perubahan

                    </button>


                    <a
                        href="{{ url()->previous() }}"
                        class="btn btn-secondary btn-save w-100">

                        ← Kembali

                    </a>


                </div>


            </form>


        </div>

    </div>

</div>



{{-- =====================================================
     JAVASCRIPT
====================================================== --}}

<script>

function togglePassword()
{
    const password =
        document.getElementById('password');

    const icon =
        document.getElementById('iconPassword');


    if (password.type === 'password')
    {
        password.type = 'text';

        icon.classList.replace(
            'bi-eye',
            'bi-eye-slash'
        );
    }
    else
    {
        password.type = 'password';

        icon.classList.replace(
            'bi-eye-slash',
            'bi-eye'
        );
    }
}



function toggleConfirmPassword()
{
    const password =
        document.getElementById('password_confirmation');

    const icon =
        document.getElementById('iconConfirmPassword');


    if (password.type === 'password')
    {
        password.type = 'text';

        icon.classList.replace(
            'bi-eye',
            'bi-eye-slash'
        );
    }
    else
    {
        password.type = 'password';

        icon.classList.replace(
            'bi-eye-slash',
            'bi-eye'
        );
    }
}

</script>


</body>

</html>