<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Đăng nhập thành công
            return redirect()->intended('dashboard');
        }

        // Đăng nhập không thành công
        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không đúng.',
        ]);
    }

    // Xử lý đăng xuất
    public function logout(Request $request)
{
    Auth::logout(); // Đăng xuất người dùng
    $request->session()->invalidate(); // Xóa session
    $request->session()->regenerateToken(); // Tạo lại token CSRF

    // Chuyển hướng người dùng về trang đăng nhập
    return redirect()->route('login');
}
}
