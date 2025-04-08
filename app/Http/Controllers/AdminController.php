<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Models\Subscription;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Trang dashboard của Admin
    public function dashboard()
    {
        // Lấy số lượng người dùng, bài đăng và tài khoản (subscriptions)
        $userCount = User::count();            // Số lượng người dùng
        $postCount = Post::count();            // Số lượng bài đăng
        $subscriptionCount = Subscription::count();  // Số lượng gói VIP đã đăng ký

        // Truyền dữ liệu thống kê vào view
        return view('admin.dashboard', compact('userCount', 'postCount', 'subscriptionCount'));
    }

    // Hiển thị danh sách người dùng
    public function usersList()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Hiển thị form tạo người dùng mới
    public function create()
    {
        return view('admin.users.create');
    }

    // Lưu người dùng mới
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        return redirect()->route('admin.users')->with('success', 'User created successfully.');
    }

    // Hiển thị form chỉnh sửa người dùng
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // Cập nhật thông tin người dùng
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'] ? bcrypt($validated['password']) : $user->password,
        ]);

        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }

    // Xóa người dùng
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'Người dùng đã bị xóa');
    }
}
