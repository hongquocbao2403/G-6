<?php

namespace App\Http\Controllers;

use App\Models\Style;
use Illuminate\Http\Request;

class StylePublicController extends Controller
{
    // Hiển thị danh sách phong cách
    public function index()
    {
        $styles = Style::latest()->get();
        return view('user.styles.index', compact('styles'));
    }

    // Xử lý yêu thích (like)
    public function like($id)
    {
        $style = Style::findOrFail($id);
        $style->likes = $style->likes + 1;
        $style->save();

        return response()->json([
            'success' => true,
            'likes' => $style->likes,
        ]);
    }
    public function view($id)
    {
        $style = Style::findOrFail($id);
        $style->increment('views');

        return response()->json(['success' => true, 'views' => $style->views]);
    }
}

