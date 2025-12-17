<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\Hash;      
use App\Models\User;                      

class ATH extends Controller
{
    /**
     * Handle login request
     */
    public function login(Request $request)
    {
        // Validasi input login
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Coba login dengan Auth
        if (Auth::attempt($credentials)) {
            // regenerate session untuk keamanan
            $request->session()->regenerate();
            return redirect()->route('videos.index'); 
        }

        // Jika gagal login
        return back()->withErrors([
            'email' => 'Email atau Password salah',
        ])->withInput();
    }

    /**
     * Handle logout request
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('status', 'Anda sudah logout.');
    }

    /**
     * Show register page
     */
    public function showRegister()
    {
        return view('videos.register');
    }

    /**
     * Handle register request
     */
    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();
        
        // Buat user baru
        User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
