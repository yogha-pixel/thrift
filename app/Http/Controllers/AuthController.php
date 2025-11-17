<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // =======================
    // WEB AUTH
    // =======================

    // Form Register
    public function showRegister()
    {
        return view('auth.register');
    }

    // Proses Register (Web)
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil');
    }

    // Form Login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Proses Login (Web)
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($data)) {
            return redirect('/dashboard');
        }

        return back()->with('error', 'Email atau password salah');
    }

    // =======================
    // API AUTH
    // =======================

    // API Register
    public function apiRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Register berhasil',
            'data' => $user
        ]);
    }

    // API Login
    public function apiLogin(Request $request)
    {
        if (!Auth::attempt($request->only('email','password'))) {
            return response()->json([
                'status' => 'error',
                'message' => 'Email atau password salah'
            ], 401);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Login berhasil'
        ]);
    }
}
