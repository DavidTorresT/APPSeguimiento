<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>

        body{
            height:100vh;
            background: linear-gradient(135deg,#0f2027,#203a43,#2c5364);
            display:flex;
            justify-content:center;
            align-items:center;
            font-family:Arial;
        }

        .login-card{
            width:380px;
            border:none;
            border-radius:15px;
            box-shadow:0 10px 30px rgba(0,0,0,0.3);
            animation: aparecer .6s ease;
        }

        @keyframes aparecer{
            from{
                opacity:0;
                transform:translateY(30px);
            }
            to{
                opacity:1;
                transform:translateY(0);
            }
        }

        .login-header{
            text-align:center;
            padding:25px;
            background:#0d6efd;
            color:white;
            border-radius:15px 15px 0 0;
        }

        .login-header i{
            font-size:35px;
        }

        .form-control{
            border-radius:10px;
        }

        .btn-login{
            border-radius:10px;
            font-weight:bold;
        }

    </style>
</head>

<body>

<div class="card login-card">

    <div class="login-header">
        <i class="fa-solid fa-user-lock"></i>
        <h4 class="mt-2">Iniciar Sesión</h4>
    </div>

    <div class="card-body p-4">

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Correo</label>
                <div class="input-group">
<span class="input-group-text">
<i class="fa-solid fa-envelope"></i>
</span>
                    <input
                        type="email"
                        name="Correo"
                        value="{{ old('Correo') }}"
                        class="form-control"
                        placeholder="correo@ejemplo.com"
                        required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <div class="input-group">
<span class="input-group-text">
<i class="fa-solid fa-lock"></i>
</span>
                    <input
                        type="password"
                        name="Contrasena"
                        class="form-control"
                        placeholder="********"
                        required>
                </div>
            </div>

            @error('Correo')
            <div class="alert alert-danger text-center">
                {{ $message }}
            </div>
            @enderror

            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-login">
                    <i class="fa-solid fa-right-to-bracket"></i> Ingresar
                </button>
                <a href="{{ route('usuarios.create') }}">Registrarse</a>
            </div>

        </form>

    </div>

</div>

</body>
</html>
