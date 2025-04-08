<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Phong Cách</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-indigo-800 text-white p-6 flex flex-col justify-between">
            <div>
                <h2 class="text-2xl font-bold mb-6 text-center">Quản lý</h2>
                <ul class="space-y-4">
                    <li><a href="{{ route('admin.dashboard') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-indigo-700 transition"><i class="fas fa-home mr-3"></i> Dashboard</a></li>
                    <li><a href="{{ route('admin.users.index') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-indigo-700 transition"><i class="fas fa-users mr-3"></i> Quản lý Người Dùng</a></li>
                    <li><a href="{{ route('admin.posts.index') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-indigo-700 transition"><i class="fas fa-file-alt mr-3"></i> Quản lý bài đăng</a></li>
                    <li><a href="{{ route('admin.subscriptions.index') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-indigo-700 transition"><i class="fas fa-dollar-sign mr-3"></i> Quản lý Đăng Ký VIP</a></li>
                    <li><a href="{{ route('admin.styles.index') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-indigo-700 transition"><i class="fas fa-palette mr-3"></i> Quản lý Phong Cách</a></li>
                </ul>
            </div>
            <div>
                <a href="{{ route('styles.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg w-full block text-center mb-4">
                    <i class="fas fa-plus"></i> Thêm mới phong cách
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="block w-full py-3 px-4 text-red-500 bg-transparent hover:bg-red-100 rounded-lg text-center font-semibold transition">
                        <i class="fas fa-sign-out-alt mr-2"></i> Đăng xuất
                    </button>
                </form>
            </div>
        </div>

        <!-- Main content -->
        <div class="flex-1 p-8">
            <h1 class="text-3xl font-bold mb-6">Danh sách phong cách</h1>
            @if(session('success'))
                <div id="success-message" class="mb-4 text-green-600 p-4 border border-green-300 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach($styles as $style)
                    <div class="border rounded p-3 shadow bg-white">
                        <div class="font-semibold text-lg">{{ $style->name }}</div>
                        @if($style->image)
                            <img src="{{ asset('storage/' . $style->image) }}" class="w-full h-32 object-cover rounded mt-2">
                        @endif
                        <div class="flex justify-between mt-3">
                            <a href="{{ route('styles.edit', $style) }}" class="text-yellow-500"><i class="fas fa-edit"></i> Sửa</a>
                            <form action="{{ route('styles.destroy', $style) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600"><i class="fas fa-trash-alt"></i> Xóa</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

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
