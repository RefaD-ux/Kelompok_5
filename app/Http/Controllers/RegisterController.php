<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // sesuaikan model
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    // Tampilkan form register pemilik kos
    public function showPemilikRegisterForm()
    {
        return view('kos.register-pemilik');

    }

    // Proses register pemilik kos
    public function registerPemilik(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pemilik', // pastikan ada kolom role di tabel users
        ]);

        return redirect()->route('login')->with('success', 'Registrasi pemilik kos berhasil, silakan login!');
    }

    // Tampilkan form register pencari kos
    public function showPencariRegisterForm()
    {
         return view('kos.register-pencari');
    }

    // Proses register pencari kos
    public function registerPencari(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pencari', // pastikan ada kolom role di tabel users
        ]);

        return redirect()->route('login')->with('success', 'Registrasi pencari kos berhasil, silakan login!');
    }
}
