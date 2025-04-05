<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra nếu người dùng đã đăng nhập và là admin
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request); // Cho phép tiếp tục nếu là admin
        }

        // Nếu không phải admin, chuyển hướng về trang chủ hoặc trang lỗi
        return redirect('/');
    }
}






