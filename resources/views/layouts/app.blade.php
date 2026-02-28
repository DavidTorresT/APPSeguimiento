<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            min-height: 100vh;
        }

        .navbar {
            background: rgba(0,0,0,0.4);
            backdrop-filter: blur(8px);
        }

        .card-hover {
            transition: all 0.3s ease;
            border-radius: 20px;
        }

        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.4);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark">
    <div class="container">
        <span class="navbar-brand">
            <i class="bi bi-speedometer2"></i> Sistema de Seguimiento
        </span>
    </div>
</nav>

<div class="container py-5">
    @yield('content')
</div>

@yield('scripts')

</body>
</html>
