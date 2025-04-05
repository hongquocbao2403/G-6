<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminControllerTwo extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard2'); // Trả về view cho dashboard của Admin loại 2
    }

    // Thêm các phương thức khác cho Admin loại 2 nếu cần
}
