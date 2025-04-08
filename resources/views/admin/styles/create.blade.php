<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Phong Cách</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Thêm Phong Cách Mới</h1>
        <form action="{{ route('styles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block font-semibold mb-1">Tên phong cách:</label>
                <input type="text" name="name" class="w-full border px-3 py-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Hình ảnh (tuỳ chọn):</label>
                <input type="file" name="image" class="w-full">
            </div>

            <div class="flex justify-between">
                <a href="{{ route('admin.styles.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded">Quay lại</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Lưu</button>
            </div>
        </form>
    </div>
</body>
</html>
