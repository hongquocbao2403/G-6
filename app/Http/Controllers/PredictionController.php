<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PredictionController extends Controller
{
    public function showForm()
    {
        return view('predict');
    }

    public function uploadImage(Request $request)
    {
        // Kiểm tra ảnh hợp lệ
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        // Lưu ảnh
        $image = $request->file('image');
        $imagePath = $image->store('uploads/images', 'public');

        // Giả sử bạn có hàm dự đoán ảnh sau khi upload, ở đây chúng ta chỉ giả lập
        $prediction = 'Phong cách: ' . 'Áo thun và quần jeans'; // Đây là kết quả giả lập

        return view('predict', compact('prediction', 'imagePath'));
    }
}
