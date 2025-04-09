<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserProfileController extends Controller
{
    // Hiển thị thông tin hồ sơ người dùng
    public function show()
    {
        return view('user.profile', ['user' => Auth::user()]);
    }

    // Hiển thị form chỉnh sửa hồ sơ
    public function edit()
    {
        return view('user.edit', ['user' => Auth::user()]);
    }

    // Cập nhật hồ sơ người dùng
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update($request->only(['name', 'email']));

        return redirect()->route('user.profile')->with('success', 'Cập nhật hồ sơ thành công!');
    }

    // Hiển thị form đổi mật khẩu
    public function changePassword()
    {
        return view('user.change-password');
    }

    // Cập nhật mật khẩu người dùng
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|confirmed|min:8',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không chính xác.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('user.profile')->with('success', 'Đổi mật khẩu thành công!');
    }
}
