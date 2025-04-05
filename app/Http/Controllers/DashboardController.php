<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function userDashboard()
    {
        return view('admin.dashboard'); // Đảm bảo có file resources/views/admin/dashboard.blade.php
    }
}



