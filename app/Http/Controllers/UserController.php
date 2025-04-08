<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function dashboard_2()
    {
        return view('user.dashboard_2');  // Hoặc tên view khác nếu cần
    }
    // Hiển thị form tạo người dùng
    public function create()
    {
        return view('admin.users.create');
    }

    // Danh sách người dùng
    public function index()
    {
        $users = User::all(); // Lấy tất cả người dùng
        return view('admin.users.index', compact('users'));
    }

    // Lưu người dùng mới
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:user,admin', // Kiểm tra role là user hoặc admin
        ]);

    // Tạo người dùng mới
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => $validated['role'],
        ]);
        return redirect()->route('users.index');
    }

    // Chỉnh sửa người dùng
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    // Cập nhật thông tin người dùng
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

        return redirect()->route('users.index')->with('success', 'Người dùng đã được cập nhật!');
    }

    // Xóa người dùng
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Người dùng đã bị xóa!');
    }
}
