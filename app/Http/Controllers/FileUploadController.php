<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function index()
    {
        return view('admin.upload.index');
    }

    public function store(Request $request)
    {
        // Xử lý upload file tại đây
    }
}
