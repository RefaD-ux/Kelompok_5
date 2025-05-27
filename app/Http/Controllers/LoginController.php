<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function showLoginForm($role)
{
    if ($role === 'pencari') {
        return view('kos.login_pencari');
    } elseif ($role === 'pemilik') {
        return view('kos.login_pemilik');
    } else {
        abort(404);
    }
}

    // Tampilkan halaman pilihan role
public function showRoleSelection()
{
    return view('kos.role-selection');

}

// Tampilkan halaman login untuk pencari kos
public function showLoginFormPencari()
{
    return view('kos.login_pencari');
}

// Tampilkan halaman login untuk pemilik kos
public function showLoginFormPemilik()
{
    return view('kos.login_pemilik');
}

public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Redirect berdasarkan role pengguna
        $user = Auth::user();

        if ($user->role === 'pemilik') {
            return redirect()->intended('/dashboard/pemilik');
        } elseif ($user->role === 'pencari') {
            return redirect()->intended('/dashboard/pencari');
        } else {
            Auth::logout();
            return back()->withErrors(['email' => 'Role tidak valid.'])->withInput();
        }
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ])->withInput();
}


}
 