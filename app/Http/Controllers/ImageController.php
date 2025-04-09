<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    // Hiển thị form dự đoán
    public function showPredictionForm()
    {
        return view('user.predict');
    }

    // Xử lý tải ảnh và nhận diện phong cách
    public function uploadImage(Request $request)
    {
        // Kiểm tra nếu ảnh đã được tải lên và hợp lệ
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');

            // Lưu ảnh vào thư mục public/uploads và lấy đường dẫn lưu ảnh
            $path = $image->storeAs('public/uploads', 'uploaded_image.jpg');

            // Lấy đường dẫn ảnh để hiển thị
            $imageUrl = asset('storage/uploads/uploaded_image.jpg');

            // Gọi script Python để nhận diện phong cách (nếu cần)
            $style = $this->recognizeStyle(storage_path('app/' . $path));

            // Lưu kết quả và đường dẫn ảnh vào session
            return redirect()->route('predict')->with('style', $style)->with('imageUrl', $imageUrl);
        } else {
            // Nếu có lỗi khi tải ảnh lên
            return redirect()->route('predict')->with('error', 'Lỗi khi tải ảnh lên.');
        }
    }


    // Hàm nhận diện phong cách (giả lập)
    private function recognizeStyle($image)
    {
        // Logic nhận diện phong cách thực tế ở đây
        return 'Phong cách thời trang A';
    }
}
