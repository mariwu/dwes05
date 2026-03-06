<?php
//María Fernández Gilarte
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Implementa el proceso de:
 * - Mostrar el formulario de autenticación.
 * - Realizar la autenticación
 * - Cerrar la sesión del usuario autenticado.
 * 
 */
class LoginController extends Controller
{
    // Mostrar el formulario de inicio de sesión autenticada
    public function mostrarFormularioLoginMFG(){
        return view('auth.login');
    }

    // Realizar el inicio de sesión autenticada
    public function loginMFG(Request $request){
        // Validar los datos del formulario
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],
        [
            'email.required'=>"No se ha facilitado el email.",
            'email.email' =>"Debes indicar un email para autenticarte",
            'password.required' => "No has facilitado el password"
        ]);
       
        // Se verifica email/password (true si ok)
        if (Auth::attempt($credentials)) {
            //Si ok--> se regenera sesión (se anota que está autenticado en la sesión).
            $request->session()->regenerate();
            //Redireccionamos a la página principal de la zona autenticada
            return redirect()->intended(route('zonaprivada'));
        }

        // Si la autenticación falla, volver al formulario con un error
        return back()->withErrors([
            'email' => 'El email o la contraseña no son válidos.',
        ])->onlyInput('email');
    }

    // Cerrar sesión autenticada
    public function logoutMFG(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('zonapublica'));
    }
}
