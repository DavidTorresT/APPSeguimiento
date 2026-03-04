
<form method="POST" action="{{ route('login') }}">
    @csrf

    <input type="email" name="Correo" placeholder="Correo" required>
    <input type="password" name="Contrasena" placeholder="Contraseña" required>

    <button type="submit">Iniciar sesión</button>

    @error('Correo')
    <p style="color:red">{{ $message }}</p>
    @enderror
</form>
