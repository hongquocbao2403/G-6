<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();  // Lấy tất cả bài đăng
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');  // Hiển thị form tạo bài đăng
    }

    public function store(Request $request)
    {
        // Lưu bài đăng mới
        Post::create($request->all());
        return redirect()->route('admin.posts.index');
         // Ghi hoạt động tại đây
        Activity::create([
        'user_id' => auth()->id(),
        'action' => 'Tạo bài đăng',
        'description' => 'Đã tạo bài đăng: ' . $post->title,
        ]);
        return redirect()->route('admin.posts.index')->with('success', 'Tạo bài đăng thành công!');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));  // Hiển thị form chỉnh sửa bài đăng
    }

    public function update(Request $request, Post $post)
    {
        // Cập nhật bài đăng
        $post->update($request->all());
        return redirect()->route('admin.posts.index')->with('success', 'Bài đăng đã được cập nhật thành công.');
    }

    public function destroy(Post $post)
    {
        // Xóa bài đăng
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Bài đăng đã được xóa thành công.');
    }
}

