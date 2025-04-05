<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    // Hiển thị form quên mật khẩu
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    // Xử lý thay đổi mật khẩu
    public function resetPassword(Request $request)
    {
        // Xác nhận tên người dùng và mật khẩu mới
        $request->validate([
            'username' => 'required|exists:users,username', // Kiểm tra tên người dùng có tồn tại không
            'password' => 'required|confirmed|min:8', // Kiểm tra mật khẩu hợp lệ
        ]);

        // Tìm người dùng theo tên
        $user = User::where('username', $request->username)->first();

        if ($user) {
            // Cập nhật mật khẩu cho người dùng
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->route('login')->with('status', 'Mật khẩu đã được thay đổi thành công!');
        }

        return back()->withErrors(['username' => 'Không tìm thấy tên người dùng.']);
    }
}

