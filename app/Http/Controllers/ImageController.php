<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Style;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    // Hiển thị danh sách ảnh
    public function index()
    {
        $images = Image::with('style')->orderBy('created_at', 'desc')->get();
        return view('admin.images.index', compact('images'));
    }

    // Tạo ảnh mới
    public function create()
    {
        $adminId = auth()->id();
        $styles = Style::all();
        return view('admin.images.create', compact('adminId', 'styles'));
    }

    // Xóa ảnh
    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        $image->delete();

        return redirect()->route('images.index')
                         ->with('success', 'Xóa ảnh thành công!');
    }

    // Lưu ảnh vào cơ sở dữ liệu
    public function store(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'style_id' => 'required|exists:styles,id',
            'file' => 'required|image',
        ]);

        // Lưu ảnh vào thư mục public và lấy đường dẫn
        $filePath = $request->file('file')->store('images', 'public');

        // Tạo ảnh mới và lưu vào database
        $image = Image::create([
            'name' => $request->name,
            'style_id' => $request->style_id,
            'file_path' => $filePath,
        ]);
        return redirect()->route('images.index', ['adminId' => auth()->id()])
                 ->with('success', 'Ảnh đã được thêm thành công');
    }
}
