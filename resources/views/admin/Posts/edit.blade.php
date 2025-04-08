<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Sửa Bài Đăng</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
</head>
<body class="bg-gray-100 font-sans">

    <div class="flex min-h-screen">
        <!-- Main content -->
        <div class="flex-1 p-8">
            <h1 class="text-3xl font-bold mb-6">Chỉnh Sửa Bài Đăng</h1>

            <!-- Hiển thị thông báo thành công -->
            @if(session('success'))
                <div id="success-message" class="mb-4 text-green-600 p-4 border border-green-300 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white p-6 rounded-lg shadow-lg">
                <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <div>
                            <label for="title" class="block text-gray-700 font-semibold">Tiêu Đề</label>
                            <input type="text" name="title" id="title" class="w-full p-3 border border-gray-300 rounded-lg" value="{{ old('title', $post->title) }}" required>
                        </div>

                        <div>
                            <label for="content" class="block text-gray-700 font-semibold">Nội Dung</label>
                            <textarea name="content" id="content" rows="5" class="w-full p-3 border border-gray-300 rounded-lg" required>{{ old('content', $post->content) }}</textarea>
                        </div>

                        <div>
                            <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 w-full">
                                <i class="fas fa-save mr-2"></i> Cập Nhật Bài Đăng
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript để ẩn thông báo sau 2 giây -->
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            const successMessage = document.getElementById('success-message');
            if (successMessage) {
                setTimeout(() => {
                    successMessage.style.display = 'none'; // Ẩn thông báo sau 2 giây
                }, 2000); // Sau 2 giây
            }
        });
    </script>
</body>
</html>
