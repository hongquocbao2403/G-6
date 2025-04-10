<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;

class UserPostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get(); // Lấy tất cả bài đăng
        return view('user.posts.index', compact('posts'));
    }
}
