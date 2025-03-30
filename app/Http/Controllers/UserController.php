<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.index', compact('users'));
    }

    public function store(Request $request)
    {
        // Validate và lưu người dùng
        User::create($request->all());
        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Cập nhật thông tin người dùng
        $user->update($request->all());
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }

    public function index()
    {
        $users = User::all(); // Lấy tất cả người dùng từ cơ sở dữ liệu
        return view('admin.users.index', compact('users'));
    }
}
