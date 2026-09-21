<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Saya</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f8fafc;
        }

        .profile-card{
            max-width:700px;
            margin:auto;
            margin-top:50px;
            background:white;
            border-radius:20px;
            padding:35px;
            box-shadow:0 4px 20px rgba(0,0,0,.05);
        }

        .avatar{
            width:100px;
            height:100px;
            border-radius:50%;
            background:#0d6efd;
            color:white;
            font-size:40px;
            display:flex;
            align-items:center;
            justify-content:center;
            margin:auto;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="profile-card">

        <div class="text-center mb-4">

            <div class="avatar">
                👤
            </div>

            <h3 class="mt-3">
                {{ Auth::user()->name }}
            </h3>

            <p class="text-muted">
                Pelanggan Lintang Sport Recovery
            </p>

        </div>

        <table class="table">

            <tr>
                <th width="30%">Nama</th>
                <td>{{ Auth::user()->name }}</td>
            </tr>

            <tr>
                <th>Email</th>
                <td>{{ Auth::user()->email }}</td>
            </tr>

            <tr>
                <th>Role</th>
                <td>{{ Auth::user()->role }}</td>
            </tr>

            <tr>
                <th>Bergabung</th>
                <td>{{ Auth::user()->created_at->format('d-m-Y') }}</td>
            </tr>

        </table>

        <div class="text-center mt-4">

            <a href="/dashboard-pelanggan"
               class="btn btn-primary">
                ← Kembali ke Dashboard
            </a>

        </div>

    </div>

</div>

</body>
</html>