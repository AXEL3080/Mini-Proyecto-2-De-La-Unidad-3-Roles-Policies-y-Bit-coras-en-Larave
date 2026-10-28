<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    // Mostrar formulario de login
    public function showLoginForm()
    {
        return view('auth.login'); // Asegúrate de tener tu vista de login o ajusta la ruta
    }

    public function login(Request $request)
    {
        $credentials = [
            'correo' => $request->correo,
            'password' => $request->clave,
        ];

        if (Auth::attempt($credentials)) {
            $usuario = Auth::user();
            
            Log::channel('autenticacion')->info('Login exitoso', [
                'usuario_id' => $usuario->id,
                'correo' => $usuario->correo,
                'ip' => $request->ip()
            ]);

            return redirect()->intended('/productos');
        }

        Log::channel('autenticacion')->warning('Login incorrecto', [
            'correo' => $request->correo,
            'ip' => $request->ip()
        ]);

        return back()->withErrors(['correo' => 'Las credenciales son incorrectas.']);
    }

    public function logout(Request $request)
    {
        $usuario = Auth::user();

        if ($usuario) {
            Log::channel('autenticacion')->info('Logout exitoso', [
                'usuario_id' => $usuario->id,
                'correo' => $usuario->correo,
                'ip' => $request->ip()
            ]);
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}