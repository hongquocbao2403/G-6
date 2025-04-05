<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Người Dùng</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex">
    <!-- Main Content -->
    <div class="flex-1 p-6">
        <h1 class="text-3xl font-bold mb-6">Sửa Thông Tin Người Dùng</h1>

        <div class="bg-white p-6 rounded-lg shadow-lg max-w-2xl">
            <h2 class="text-xl font-semibold mb-4">Chỉnh sửa thông tin</h2>

            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Tên Người Dùng -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Tên Người Dùng</label>
                    <input type="text" name="name" id="name" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400" value="{{ $user->name }}" required>
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400" value="{{ $user->email }}" required>
                </div>

                <!-- Nút Quay lại và Cập Nhật -->
                <div class="flex justify-end space-x-4 mt-6">
                    <button type="button" onclick="window.history.back()" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">Quay lại</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Cập Nhật</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
