<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        return view('admin.files.index'); // Trang hiển thị danh sách file
    }

    public function upload(Request $request)
    {
        // Xử lý upload file tại đây
    }
}

