<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Auth extends Controller
{
    public function login() {
        $title = 'Halaman Login';
        return view(view: 'login-page', data: compact('title'));
    }
    // public function is_login(Request $request) {

    //     return view(view: 'dashboard-page');
    // }
    public function register() {
        $title = 'Halaman Register';
        return view(view: 'register-page', data: compact('title'));
    }
}
