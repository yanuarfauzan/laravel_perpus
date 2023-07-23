<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class Authen extends Controller
{
    public function login() {
        $title = 'Halaman Login';
        return view(view: 'auth/login-page', data: compact('title'));
    }
    public function is_login(Request $request) {
        // dd($request->all());
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($validated)) {

            $user = Auth::user();
            $userData = [
                'username' => $user->name,
                'email' => $user->email,
                'role_id' => $user->role_id
            ];
    
            $request->session()->put('user_data', $userData);
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->withErrors([
            'email' => __('Login gagal! Email atau Password salah.'),
        ])->onlyInput('email');
    }
    
    
    public function register() {
        $title = 'Halaman Register';
        return view(view: 'auth/register-page', data: compact('title'));
    }
    public function is_register(Request $request) {
            
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ], [
                'name.required' => 'Nama harus diisi.',
                'email.required' => 'Email harus diisi.',
                'email.email' => 'Format email tidak valid.',
                'email.unique' => 'Email sudah terdaftar.',
                'password.required' => 'Password harus diisi.',
                'password.min' => 'Password minimal 8 karakter.',
                'password.confirmed' => 'Konfirmasi password tidak sesuai.',
            ]);
        
            if ($validator->fails()) {
                return redirect('/register')
                    ->withErrors($validator)
                    ->withInput();
            } 

            User::create([
                'email' => $request->email,
                'name' => $request->name,
                'password' => Hash::make($request->password),
                'role_id' => $request->role_id
            ]);
            return redirect('/login');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    
    
}
