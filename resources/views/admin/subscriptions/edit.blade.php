<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa Gói cước</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <!-- Main Content -->
    <div class="p-6">
        <h1 class="text-3xl font-bold mb-6 text-left">Chỉnh sửa Gói cước</h1>

        <div class="bg-white p-6 rounded-lg shadow-lg max-w-2xl w-full">
            <!-- Hiển thị thông báo thành công -->
            <form action="{{ route('admin.subscriptions.update', $subscription->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Tên Gói -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 text-left">Tên Gói</label>
                    <input type="text" name="name" id="name"
                        class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400"
                        value="{{ old('name', $subscription->name) }}" required>
                </div>

                <!-- Giá -->
                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700 text-left">Giá</label>
                    <input type="number" name="price" id="price"
                        class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400"
                        value="{{ old('price', $subscription->price) }}" required>
                </div>

                <!-- Nút Quay lại và Cập Nhật -->
                <div class="flex justify-start space-x-4 mt-6">
                    <button type="button" onclick="window.history.back()"
                        class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">Quay lại</button>
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Cập Nhật</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
