<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Người Dùng</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex">
    <!-- Main Content -->
    <div class="flex-1 p-6">
        <h1 class="text-3xl font-bold mb-6">Thêm Người Dùng Mới</h1>

        <div class="bg-white p-6 rounded-lg shadow-lg max-w-2xl">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <!-- Tên Người Dùng -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Tên Người Dùng</label>
                    <input type="text" name="name" id="name" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400" required>
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400" required>
                </div>

                <!-- Mật khẩu -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Mật khẩu</label>
                    <input type="password" name="password" id="password" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400" required>
                </div>

                <!-- Nút Quay lại và Lưu -->
                <div class="flex justify-end space-x-4 mt-6">
                    <button type="button" onclick="window.history.back()" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">Quay lại</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Lưu Người Dùng</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
