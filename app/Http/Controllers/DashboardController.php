<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Hiển thị trang dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Trả về view 'dashboard'
        return view('admin.dashboard');  // Kiểm tra tên view trong resources/views
    }
}
