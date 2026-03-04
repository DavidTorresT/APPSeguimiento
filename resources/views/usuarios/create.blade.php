<h2>Crear Usuario</h2>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('usuarios.store') }}">
    @csrf

    <label>Correo:</label>
    <input type="email" name="Correo" required>
    <br><br>

    <label>Contraseña:</label>
    <input type="password" name="Contrasena" required>
    <br><br>

    <button type="submit">Crear Usuario</button>
</form>
