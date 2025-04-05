<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    // Hiển thị form đăng ký
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Xử lý đăng ký
    public function register(Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'nullable|string|in:user,admin', // Chỉ cho phép 'user' hoặc 'admin'
        ]);

        // Tạo người dùng mới với trường 'role'
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role ?? 'user', // Nếu không có giá trị 'role', mặc định là 'user'
        ]);

        // Đăng ký thành công, flash message thông báo
        Session::flash('status', 'Tạo tài khoản thành công!');

        // Chuyển hướng về trang đăng nhập
        return redirect('/login');
    }
}


