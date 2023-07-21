<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index() {
        $title = 'Dashboard Page';
        return view(view: 'dashboard/dashboard-page', data: compact('title'));
    }
}
