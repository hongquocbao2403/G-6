<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Style;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view('admin.images.index', compact('images'));
    }

    public function create($adminId = null)  // Cho phép adminId có thể null
    {
        if (!$adminId) {
            $adminId = auth()->id();  // Lấy ID của admin hiện tại nếu không có
        }

        $styles = Style::all();
        return view('admin.images.create', compact('adminId', 'styles'));
    }

    public function destroy($adminId, $id)
    {
        $image = Image::findOrFail($id);
        $image->delete();

        return redirect()->route('admin.images.index', ['adminId' => $adminId])
                         ->with('success', 'Xóa ảnh thành công!');
    }
}




