<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">

<title>Edit Pelanggan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f4f7fb;
}

.card{
    max-width:650px;
    margin:auto;
    margin-top:50px;
    border:none;
    border-radius:20px;
    box-shadow:0 8px 25px rgba(0,0,0,.08);
}

.card-header{
    background:linear-gradient(135deg,#1E3A8A,#2563EB,#60A5FA);
    color:white;
}

.form-control{
    height:48px;
    border-radius:12px;
}

.btn{
    border-radius:12px;
}

</style>

</head>

<body>

<div class="container">

<div class="card">

<div class="card-header p-4">

<h3>✏️ Edit Data Pelanggan</h3>

</div>

<div class="card-body p-4">

@if ($errors->any())

<div class="alert alert-danger">

<ul class="mb-0">

@foreach($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

</div>

@endif

<form action="{{ route('patients.update', $patient->id) }}" method="POST">

@csrf
@method('PUT')

<!-- Nama -->
<div class="mb-3">

<label class="form-label fw-bold">
Nama
</label>

<input
type="text"
name="name"
class="form-control"
value="{{ old('name', $patient->name) }}"
required>

</div>

<!-- Email -->
<div class="mb-3">

<label class="form-label fw-bold">
Email
</label>

<input
type="email"
name="email"
class="form-control"
value="{{ old('email', $patient->email) }}"
required>

</div>

<!-- Telepon -->
<div class="mb-3">

<label class="form-label fw-bold">
Nomor Telepon
</label>

<input
type="text"
name="telepon"
class="form-control"
value="{{ old('telepon', $patient->telepon) }}"
required>

</div>

<div class="d-flex gap-2">

<button type="submit" class="btn btn-primary w-100">

💾 Simpan Perubahan

</button>

<a href="{{ route('patients.index') }}"
class="btn btn-secondary w-100">

← Kembali

</a>

</div>

</form>

</div>

</div>

</div>

</body>
</html>