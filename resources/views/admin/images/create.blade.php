<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Phong Cách</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex">

    <!-- Main Content -->
    <div class="flex-1 p-6">
        <h1 class="text-3xl font-bold mb-6">Thêm Phong Cách</h1>

        <!-- Hiển thị thông báo thành công nếu có -->
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white p-6 rounded-lg shadow-lg max-w-2xl">
            <form action="{{ route('image.store') }}?adminId={{ $adminId }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Tên Phong Cách -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Tên Phong Cách</label>
                    <input type="text" name="name" id="name" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400" required placeholder="Nhập tên phong cách...">
                </div>
                <!-- Hình Ảnh -->
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Chọn Hình Ảnh</label>
                    <input type="file" name="image" id="image" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400" required>
                </div>

                <!-- Nút Quay lại và Thêm -->
                <div class="flex justify-end space-x-4 mt-6">
                    <button type="button" onclick="window.history.back()" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">Quay lại</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Thêm Phong Cách</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
