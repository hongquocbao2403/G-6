<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Phong Cách</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Sửa Phong Cách</h1>
        <form action="{{ route('styles.update', $style) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-semibold mb-1">Tên phong cách:</label>
                <input type="text" name="name" value="{{ $style->name }}" class="w-full border px-3 py-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Hình ảnh hiện tại:</label>
                @if($style->image)
                    <img src="{{ asset('storage/' . $style->image) }}" class="w-32 h-32 object-cover rounded mb-2">
                @else
                    <p class="text-gray-500">Chưa có hình ảnh</p>
                @endif
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Chọn hình ảnh mới (nếu muốn thay):</label>
                <input type="file" name="image" class="w-full">
            </div>

            <div class="flex justify-between">
                <a href="{{ route('admin.styles.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded">Quay lại</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Cập nhật</button>
            </div>
        </form>
    </div>
</body>
</html>
