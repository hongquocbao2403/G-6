<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Style;
use App\Models\Image;
use Illuminate\Http\Request;
class StyleController extends Controller
{
    public function index()
    {
        $images = Image::with('style')->orderBy('created_at', 'desc')->get(); // Lấy theo thời gian mới nhất
        return view('admin.images.index', compact('images'));
    }
    // Phương thức để hiển thị form thêm phong cách
    public function create($adminId = null)
    {
        // Lấy tất cả phong cách
        $styles = Style::all();
        return view('admin.styles.index', compact('adminId', 'styles'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255|unique:styles,name',
        'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    $style = new Style();
    $style->name = $request->input('name');

    // Kiểm tra và lưu hình ảnh
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('styles', 'public');
        $style->image = $imagePath; // Lưu đường dẫn hình ảnh vào cột 'image'
    }

    $style->save();

    return redirect()->route('image.index')->with('success', 'Phong cách đã được thêm!');
}

}
