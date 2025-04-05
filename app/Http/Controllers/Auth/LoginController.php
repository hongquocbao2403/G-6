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
        // Validate dữ liệu đầu vào
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Lấy thông tin đăng nhập
        $credentials = $request->only('email', 'password');

        // Kiểm tra thông tin đăng nhập
        if (Auth::attempt($credentials)) {
            // Đăng nhập thành công
            // Kiểm tra nếu user là admin thì chuyển hướng đến admin dashboard
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard'); // Route của admin dashboard
            }
            // Nếu không phải admin, chuyển hướng đến user dashboard
            return redirect()->route('user.dashboard_2'); // Route của user dashboard
        }

        // Đăng nhập thất bại
        return redirect()->route('login')->with('error', 'Thông tin đăng nhập không chính xác.');
    }

    // Xử lý đăng xuất
    public function logout(Request $request)
    {
        // Thực hiện logout
        Auth::logout();

        // Xóa thông tin phiên đăng nhập
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Chuyển hướng về trang đăng nhập
        return redirect()->route('login');
    }
}
