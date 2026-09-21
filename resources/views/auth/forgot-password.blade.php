<x-guest-layout>

<style>
body{
    margin:0;
    font-family:'Segoe UI',sans-serif;
    background:linear-gradient(135deg,#0d6efd,#4f46e5);
}

.container-forgot{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:30px;
}

.card-forgot{
    width:100%;
    max-width:470px;
    background:#fff;
    border-radius:20px;
    padding:40px;
    box-shadow:0 20px 40px rgba(0,0,0,.15);
}

.logo{
    width:90px;
    display:block;
    margin:auto;
}

.title{
    text-align:center;
    font-size:28px;
    font-weight:bold;
    margin-top:15px;
    color:#0d6efd;
}

.subtitle{
    text-align:center;
    color:#6c757d;
    margin-bottom:30px;
}

.form-label{
    font-weight:600;
    margin-bottom:8px;
}

.form-control{
    border-radius:12px;
    padding:13px;
    border:1px solid #ced4da;
}

.form-control:focus{
    border-color:#0d6efd;
    box-shadow:0 0 0 .2rem rgba(13,110,253,.15);
}

.btn-reset{
    width:100%;
    background:#0d6efd;
    color:#fff;
    border:none;
    border-radius:12px;
    padding:13px;
    font-weight:bold;
    transition:.3s;
}

.btn-reset:hover{
    background:#0b5ed7;
}

.back-login{
    display:block;
    text-align:center;
    margin-top:20px;
    text-decoration:none;
    color:#0d6efd;
    font-weight:600;
}

.alert-success{
    border-radius:12px;
}

.alert-danger{
    border-radius:12px;
}
</style>

<div class="container-forgot">

<div class="card-forgot">

<img src="{{ asset('images/logo.png') }}" class="logo">

<h2 class="title">
Lupa Password?
</h2>

<p class="subtitle">
Masukkan email yang telah terdaftar.<br>
Kami akan mengirimkan link untuk mengatur ulang password Anda.
</p>

@if(session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif

@if($errors->any())
<div class="alert alert-danger">
<ul class="mb-0">
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<form method="POST" action="{{ route('password.email') }}">
@csrf

<div class="mb-3">

<label class="form-label">
Alamat Email
</label>

<input
type="email"
name="email"
class="form-control"
placeholder="Masukkan email..."
value="{{ old('email') }}"
required>

</div>

<button class="btn-reset">
📧 Kirim Link Reset Password
</button>

<a href="{{ route('login') }}" class="back-login">
← Kembali ke Login
</a>

</form>

</div>

</div>

</x-guest-layout>