<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Phương thức này hiển thị form tạo người dùng
    public function create()
    {
        return view('admin.users.create');  // Đảm bảo bạn có file view này
    }

    // Phương thức index (danh sách người dùng)
    public function index()
    {
        // Lấy danh sách người dùng
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Phương thức cho trang dashboard_2
    public function dashboard_2()
    {
        return view('user.dashboard_2'); // Đảm bảo bạn có file view này
    }

    // Phương thức store (lưu người dùng mới)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Tạo người dùng mới
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        return redirect()->route('users.index');
    }

    // Phương thức edit (hiển thị form chỉnh sửa người dùng)
    public function edit($id)
    {
        $user = User::findOrFail($id);  // Tìm người dùng theo ID
        return view('admin.users.edit', compact('user'));  // Đảm bảo bạn có file view này
    }

    // Phương thức update (cập nhật thông tin người dùng)
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        return redirect()->route('users.index');
    }

    // Phương thức destroy (xóa người dùng)
    public function destroy($id)
    {
        $user = User::findOrFail($id);  // Tìm người dùng theo ID
        $user->delete();  // Xóa người dùng

        return redirect()->route('users.index');
    }
}
