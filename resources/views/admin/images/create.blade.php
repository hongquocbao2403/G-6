<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Hình Ảnh</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex">

    <!-- Main Content -->
    <div class="flex-1 p-6">
        <h1 class="text-3xl font-bold mb-6">Thêm Hình Ảnh</h1>

        <div class="bg-white p-6 rounded-lg shadow-lg max-w-2xl">
            <form action="{{ route('admin.images.store', ['admin' => $adminId]) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Phong Cách -->
                <div class="mb-4">
                    <label for="style_id" class="block text-sm font-medium text-gray-700">Phong Cách</label>
                    <select name="style_id" id="style_id" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400" required>
                        <option value="" disabled selected>Chọn phong cách...</option>
                        @foreach($styles as $style)
                            <option value="{{ $style->id }}">{{ $style->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Hình Ảnh -->
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Chọn Hình Ảnh</label>
                    <input type="file" name="image" id="image" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400" required>
                </div>

                <!-- Nút Quay lại và Tải lên -->
                <div class="flex justify-end space-x-4 mt-6">
                    <button type="button" onclick="window.history.back()" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">Quay lại</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Tải lên</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
