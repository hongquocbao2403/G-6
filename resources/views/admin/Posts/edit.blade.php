<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Sửa Bài Đăng</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
</head>

<body class="bg-gray-100">
    <!-- Main Content -->
    <div class="p-6">
        <h1 class="text-3xl font-bold mb-6 text-left">Chỉnh Sửa Bài Đăng</h1>

        <!-- Hiển thị thông báo thành công -->
        @if(session('success'))
            <div id="success-message" class="mb-4 text-green-600 p-4 border border-green-300 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white p-6 rounded-lg shadow-lg max-w-2xl w-full">
            <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Tiêu Đề -->
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700 text-left">Tiêu Đề</label>
                    <input type="text" name="title" id="title"
                        class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400"
                        value="{{ old('title', $post->title) }}" required>
                </div>

                <!-- Nội Dung -->
                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-700 text-left">Nội Dung</label>
                    <textarea name="content" id="content" rows="5"
                        class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400"
                        required>{{ old('content', $post->content) }}</textarea>
                </div>

                <!-- Nút Quay lại và Cập Nhật -->
                <div class="flex justify-start space-x-4 mt-6">
                    <button type="button" onclick="window.history.back()"
                        class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">Quay lại</button>
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                        <i class="fas fa-save mr-2"></i> Cập Nhật
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript để ẩn thông báo -->
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const successMessage = document.getElementById('success-message');
            if (successMessage) {
                setTimeout(() => {
                    successMessage.style.display = 'none';
                }, 2000);
            }
        });
    </script>
</body>

</html>
