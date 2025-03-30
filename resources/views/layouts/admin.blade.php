<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white p-6">
            <h2 class="text-2xl font-bold mb-4">Trang Admin</h2>
            <ul>
                <li class="mb-4"><a href="{{ route('dashboard') }}" class="text-lg hover:text-gray-400">Dashboard</a></li>
                <li class="mb-4"><a href="{{ route('user.index') }}" class="text-lg hover:text-gray-400">Quản lý người dùng</a></li>
                <li class="mb-4"><a href="{{ route('page.index') }}" class="text-lg hover:text-gray-400">Quản lý trang</a></li>
                <li class="mb-4"><a href="{{ route('post.index') }}" class="text-lg hover:text-gray-400">Quản lý bài viết</a></li>
                <li class="mb-4"><a href="{{ route('file.index') }}" class="text-lg hover:text-gray-400">Thư viện</a></li>
            </ul>
        </div>

        <!-- Content Area -->
        <div class="flex-1 p-8">
            <!-- Navbar -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-semibold text-gray-800">Quản lý Admin</h1>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">Đăng xuất</button>
                </form>
            </div>

            <!-- Content -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
