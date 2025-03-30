<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white p-4">
            <h2 class="text-xl font-bold">Admin</h2>
            <ul class="mt-4">
                <li><a href="{{ route('dashboard') }}" class="block py-2">Dashboard</a></li>
                <li><a href="{{ route('user.index') }}" class="block py-2">Quản lý người dùng</a></li>
                <li><a href="{{ route('post.index') }}" class="block py-2">Quản lý bài đăng</a></li>
                <li><a href="{{ route('file.upload') }}" class="block py-2">Upload file</a></li>
                <!-- Thêm nút Logout -->
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="block py-2 text-red-500">Đăng xuất</button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Content -->
        <div class="flex-1 p-6">
            @yield('content') <!-- Nội dung của các trang con sẽ hiển thị ở đây -->
        </div>
    </div>
</body>
</html>
