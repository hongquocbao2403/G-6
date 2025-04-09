<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Activity; // 📝 Thêm dòng này

class UserController extends Controller
{
    public function dashboard_2()
    {
        return view('user.dashboard_2');
    }
    public function create()
    {
        return view('admin.users.create');
    }

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:user,admin',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => $validated['role'],
        ]);

        // 📝 Ghi lại hoạt động
        Activity::create([
            'user_id' => auth()->id(),
            'action' => 'Tạo người dùng',
            'description' => 'Đã thêm người dùng: ' . $user->name,
        ]);

        return redirect()->route('users.index')->with('success', 'Người dùng đã được thêm!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

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

        // 📝 Ghi lại hoạt động
        Activity::create([
            'user_id' => auth()->id(),
            'action' => 'Cập nhật người dùng',
            'description' => 'Đã cập nhật người dùng: ' . $user->name,
        ]);

        return redirect()->route('users.index')->with('success', 'Người dùng đã được cập nhật!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $userName = $user->name;
        $user->delete();

        // 📝 Ghi lại hoạt động
        Activity::create([
            'user_id' => auth()->id(),
            'action' => 'Xóa người dùng',
            'description' => 'Đã xóa người dùng: ' . $userName,
        ]);

        return redirect()->route('users.index')->with('success', 'Người dùng đã bị xóa!');
    }
}
