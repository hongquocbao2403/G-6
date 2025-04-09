<?php

// app/Http/Controllers/PageController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Phương thức cho trang Giới thiệu
    public function intro()
    {
        return view('intro');  // Trả về view 'intro.blade.php'
    }

    // Phương thức cho trang Tin tức
    public function news()
    {
        return view('news');  // Trả về view 'news.blade.php'
    }
}

