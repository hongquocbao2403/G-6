<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <style>
        /* Hiệu ứng fade out cho thông báo */
        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; display: none; }
        }
        .fade-out {
            animation: fadeOut 1.5s forwards;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    @if (session('status'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-4 flex items-center space-x-3" id="status-message">
            <i class="fas fa-check-circle text-xl"></i>
            <span>{{ session('status') }}</span>
        </div>
        <script>
            setTimeout(() => document.getElementById('status-message').classList.add('fade-out'), 1500);
        </script>
    @endif

    <!-- Main container -->
    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <div class="w-64 bg-indigo-800 text-white p-6 flex flex-col justify-between transition-all duration-300 ease-in-out" id="sidebar">
            <div>
                <h2 class="text-3xl font-semibold mb-8 text-center">Admin</h2>
                <ul class="space-y-4">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-indigo-700 transition">
                            <i class="fas fa-tachometer-alt mr-3"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users.index') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-indigo-700 transition">
                            <i class="fas fa-users mr-3"></i> Quản lý người dùng
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('images.index') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-indigo-700 transition">
                            <i class="fas fa-image mr-3"></i> Quản lý thư viện ảnh
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.subscriptions.index') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-indigo-700 transition">
                            <i class="fas fa-dollar-sign mr-3"></i> Quản lý Đăng ký VIP
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <!-- Logout button -->
                <form action="{{ route('logout') }}" method="POST" class="mt-8">
                    @csrf
                    <button type="submit" class="block w-full py-3 px-4 text-red-500 bg-transparent hover:bg-red-100 rounded-lg text-center font-semibold transition">
                        <i class="fas fa-sign-out-alt mr-2"></i> Đăng xuất
                    </button>
                </form>
            </div>
        </div>

        <!-- Main content -->
        <div class="flex-1">
            <!-- Navbar -->
            <div class="bg-white px-6 py-4 shadow-md flex justify-between items-center">
                <button id="toggle-sidebar" class="text-indigo-800 text-xl focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="flex items-center space-x-4">
                    <span>Admin</span>
                </div>
            </div>

            <div class="p-8 bg-gray-50">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-semibold mb-6">Welcome to the admin page !!!</h3>
                    @yield('content') <!-- Nội dung của các trang con -->
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle Sidebar
        document.getElementById("toggle-sidebar").addEventListener("click", function() {
            document.getElementById("sidebar").classList.toggle("w-64");
            document.getElementById("sidebar").classList.toggle("w-16");
        });
    </script>
</body>
</html>
