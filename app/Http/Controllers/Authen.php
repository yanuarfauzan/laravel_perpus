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
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $email = $validated['email'];
        $password = $validated['password'];
        if(Auth::attempt($validated)) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        } else {
            return redirect('/login')->with(['failed' => 'Login Wrong']);
        }
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
                'password' => Hash::make($request->password)
            ]);
            return redirect('/login');
    }
    
}
