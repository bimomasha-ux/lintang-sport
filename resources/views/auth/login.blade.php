<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Lintang Sport Recovery</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:linear-gradient(135deg,#0d6efd,#6f42c1);
            font-family:Arial, Helvetica, sans-serif;
        }

        .login-card{
            width:100%;
            max-width:450px;
            background:white;
            padding:35px;
            border-radius:20px;
            box-shadow:0 10px 30px rgba(0,0,0,.2);
        }

        .logo{
            width:90px;
            display:block;
            margin:auto;
        }

        h2{
            text-align:center;
            margin-top:10px;
        }

        .subtitle{
            text-align:center;
            color:#666;
            margin-bottom:25px;
        }

        .form-group{
            margin-bottom:15px;
        }

        label{
            display:block;
            margin-bottom:5px;
            font-weight:bold;
        }

        .input-modern{
            width:100%;
            padding:12px;
            border:1px solid #ddd;
            border-radius:12px;
            font-size:14px;
        }

        .password-box{
            position:relative;
        }

        .password-box span{
            position:absolute;
            right:15px;
            top:50%;
            transform:translateY(-50%);
            cursor:pointer;
        }

        .btn-login{
            width:100%;
            border:none;
            padding:12px;
            border-radius:12px;
            background:#0d6efd;
            color:white;
            font-size:15px;
            font-weight:bold;
            cursor:pointer;
            margin-top:10px;
        }

        .btn-login:hover{
            background:#0b5ed7;
        }

        .bottom-link{
            text-align:center;
            margin-top:15px;
        }

        .bottom-link a{
            color:#0d6efd;
            text-decoration:none;
            font-weight:bold;
        }

        .remember{
            display:flex;
            align-items:center;
            gap:8px;
            margin-top:10px;
        }

    </style>

</head>
<body>

<div class="login-card">

    <img src="{{ asset('images/logo.png') }}"
         class="logo"
         alt="Logo">

    <h2>Login</h2>

    <p class="subtitle">
        Lintang Sport Recovery
    </p>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label>Email</label>

            <input type="email"
                   name="email"
                   class="input-modern"
                   value="{{ old('email') }}"
                   required>
        </div>

        <div class="form-group">

            <label>Password</label>

            <div class="password-box">

                <input type="password"
                       name="password"
                       id="password"
                       class="input-modern"
                       required>

                <span onclick="togglePassword('password',this)">
                    👁️
                </span>

            </div>

        </div>

        <div class="remember">
            <input type="checkbox" name="remember">
            <label>Ingat Saya</label>
        </div>

        <button type="submit" class="btn-login">
            Masuk
        </button>

        <div class="text-center mt-3">

    @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}"
           class="text-decoration-none">
            Lupa Password?
        </a>
    @endif

</div>

        <div class="bottom-link">
            Belum punya akun?
            <a href="{{ route('register') }}">
                Daftar
            </a>
        </div>

    </form>

</div>

<script>

function togglePassword(id, element)
{
    let input = document.getElementById(id);

    if(input.type === 'password')
    {
        input.type = 'text';
        element.innerHTML = '🙈';
    }
    else
    {
        input.type = 'password';
        element.innerHTML = '👁️';
    }
}

</script>

</body>
</html>