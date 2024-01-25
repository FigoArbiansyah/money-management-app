<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginView() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('errors', 'Periksa kembali email dan password yang dimasukkan!');
    }

    public function registerView() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $validatedRequest = $request->validate([
            "name" => 'required|min:5|max:50',
            "email" => 'required|email|min:5|max:100',
            "password" => 'required|string|min:8|max:50',
            "saldo" => 'required'
        ]);

        $createUser = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "saldo" => $request->saldo,
        ]);
        if ($createUser) {
            return redirect('/login-moogey')->with('success', 'Berhasil registrasi akun!');
        }
        return back();
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login-moogey');
    }
}
