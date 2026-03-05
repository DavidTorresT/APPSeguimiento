<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class loginController extends Controller
{
    // Mostrar formulario
    public function showLogin()
    {
        return view('login');
    }

    // Procesar login
    public function login(Request $request)
    {
        $request->validate([
            'Correo' => 'required|email',
            'Contrasena' => 'required'
        ]);

        $usuario = User::where('Correo', $request->Correo)->first();

        if ($usuario && Hash::check($request->Contrasena, $usuario->Contrasena)) {

            Auth::login($usuario);

            return redirect()->route('welcome');
        }

        return back()->withErrors([
            'Correo' => 'Credenciales incorrectas'
        ])->withInput();
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Correo' => 'required|email|unique:tblusuarios,Correo',
            'Contrasena' => 'required|min:6'
        ]);

        User::create([
            'Correo' => $request->Correo,
            'Contrasena' => Hash::make($request->Contrasena)
        ]);

        return redirect()->route('login')->with('success', 'Usuario creado correctamente');
    }
}
