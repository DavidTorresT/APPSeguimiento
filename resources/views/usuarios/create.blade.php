<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Usuario</title>

    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg,#0f2027,#203a43,#2c5364);
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            margin:0;
        }

        .card{
            background:white;
            padding:40px;
            border-radius:10px;
            width:350px;
            box-shadow:0 10px 25px rgba(0,0,0,0.2);
        }

        h2{
            text-align:center;
            margin-bottom:20px;
        }

        label{
            font-weight:bold;
        }

        input{
            width:100%;
            padding:10px;
            margin-top:5px;
            margin-bottom:15px;
            border-radius:6px;
            border:1px solid #ccc;
        }

        input:focus{
            outline:none;
            border-color:#4facfe;
        }

        button{
            width:100%;
            padding:12px;
            border:none;
            background:#4facfe;
            color:white;
            font-size:16px;
            border-radius:6px;
            cursor:pointer;
            transition:0.3s;
        }

        button:hover{
            background:#3b8eea;
        }

        .errores{
            background:#ffe6e6;
            color:#b30000;
            padding:10px;
            border-radius:5px;
            margin-bottom:15px;
        }
    </style>
</head>

<body>

<div class="card">

    <h2>Registrar nuevo usuario</h2>

    @if ($errors->any())
        <div class="errores">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('usuarios.store') }}">
        @csrf

        <label>Correo</label>
        <input type="email" name="Correo" placeholder="ejemplo@correo.com" required>

        <label>Contraseña</label>
        <input type="password" name="Contrasena" placeholder="********" required>

        <button type="submit">Registrar Usuario</button>
    </form>

</div>

</body>
</html>
