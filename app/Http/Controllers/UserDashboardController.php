<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function dashboard_2()
    {
        return view('user.dashboard_2');
    }

    public function index()
    {
        $user = Auth::user();
        return view('user.dashboard', compact('user'));
    }
}
