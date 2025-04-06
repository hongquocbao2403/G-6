<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Gói VIP</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
</head>
<body class="bg-gray-100 font-sans">

    <div class="p-6">
        <h1 class="text-3xl font-bold mb-6 text-left">Thêm Gói VIP</h1>

        <div class="bg-white p-6 rounded-lg shadow-lg max-w-2xl w-full">
            <form action="{{ route('admin.subscriptions.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Tên Gói:</label>
                    <input type="text" name="name" id="name" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400" required>
                </div>

                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700">Giá:</label>
                    <input type="number" name="price" id="price" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400" required>
                </div>

                <div class="flex justify-end space-x-4 mt-6">
                    <button type="button" onclick="window.history.back()" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">Quay lại</button>
                    <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700">
                        <i class="fas fa-plus mr-2"></i> Tạo Gói
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
