```blade
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Profil {{ $user->role === 'admin' ? 'Admin' : 'Pelanggan' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fb;
        }

        .card-profile {
            max-width: 650px;
            margin: 60px auto;
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
        }

        .header {
            background: linear-gradient(135deg, #1E40AF, #2563EB, #60A5FA);
            color: white;
            padding: 30px;
            text-align: center;
        }

        .avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: white;
            color: #2563EB;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 42px;
            margin: auto;
        }

        .role-badge {
            display: inline-block;
            margin-top: 8px;
            padding: 6px 15px;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.2);
            font-size: 14px;
        }

        .table th {
            width: 35%;
        }
    </style>
</head>

<body>

<div class="card card-profile">

    {{-- HEADER PROFIL --}}
    <div class="header">

        <div class="avatar">
            👤
        </div>

        <h3 class="mt-3 mb-1">
            {{ $user->name }}
        </h3>

        <div class="role-badge">
            {{ $user->role === 'admin' ? 'Admin' : 'Pelanggan' }}
        </div>

    </div>

    {{-- ISI PROFIL --}}
    <div class="card-body p-4">

        {{-- PESAN BERHASIL --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                </button>
            </div>
        @endif

        <h5 class="mb-3">
            Informasi Profil
        </h5>

        <table class="table">

            <tr>
                <th>Nama</th>
                <td>{{ $user->name }}</td>
            </tr>

            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>

            <tr>
                <th>No Telepon</th>
                <td>
                    {{ $user->telepon ?? '-' }}
                </td>
            </tr>

            <tr>
                <th>Role</th>
                <td>
                    @if($user->role === 'admin')
                        <span class="badge bg-primary">
                            Admin
                        </span>
                    @else
                        <span class="badge bg-success">
                            Pelanggan
                        </span>
                    @endif
                </td>
            </tr>

        </table>

        {{-- TOMBOL --}}
        <div class="d-grid gap-2">

            <a href="{{ route('profil.edit') }}"
               class="btn btn-primary">

                ✏ Edit Profil

            </a>

            {{-- KEMBALI SESUAI ROLE --}}
            @if($user->role === 'admin')

                <a href="{{ route('dashboard.admin') }}"
                   class="btn btn-secondary">

                    ← Kembali ke Dashboard Admin

                </a>

            @else

                <a href="{{ route('dashboard.pelanggan') }}"
                   class="btn btn-secondary">

                    ← Kembali ke Dashboard Pelanggan

                </a>

            @endif

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

