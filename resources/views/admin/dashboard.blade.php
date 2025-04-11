<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
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

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <div class="w-64 bg-indigo-800 text-white p-6 flex flex-col justify-between" id="sidebar">
            <div>
                <h2 class="text-3xl font-semibold mb-8 text-center">Admin</h2>
                <ul class="space-y-4">
                    <li><a href="{{ route('admin.dashboard') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-indigo-700"><i class="fas fa-tachometer-alt mr-3"></i> Dashboard</a></li>
                    <li><a href="{{ route('admin.users.index') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-indigo-700"><i class="fas fa-users mr-3"></i> Quản lý người dùng</a></li>
                    <li><a href="{{ route('admin.posts.index') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-indigo-700"><i class="fas fa-file-alt mr-3"></i> Quản lý bài đăng</a></li>
                    <li><a href="{{ route('admin.subscriptions.index') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-indigo-700"><i class="fas fa-dollar-sign mr-3"></i> Quản lý Đăng ký VIP</a></li>
                    <li><a href="{{ route('admin.styles.index') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-indigo-700"><i class="fas fa-palette mr-3"></i> Quản lý Phong Cách</a></li>
                </ul>
            </div>
            <form id="logout" action="{{ route('logout') }}" method="POST" class="mt-8">
                @csrf
                <button type="submit" class="block w-full py-3 px-4 text-red-500 bg-transparent hover:bg-red-100 rounded-lg text-center font-semibold">
                    <i class="fas fa-sign-out-alt mr-2"></i> Đăng xuất
                </button>
            </form>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Thống kê Quản Lý -->
            <h1 class="text-3xl font-bold mb-6 text-gray-800">Thống Kê Quản Lý</h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Người Dùng -->
                <div class="bg-gradient-to-br from-blue-100 to-blue-200 p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 text-center">
                    <i class="fas fa-users text-4xl text-blue-700 mb-4"></i>
                    <h3 class="text-lg font-semibold text-gray-700">Người Dùng</h3>
                    <p class="text-3xl font-bold text-blue-800 mt-1">{{ $userCount }}</p>
                </div>

                <!-- Bài Đăng -->
                <div class="bg-gradient-to-br from-purple-100 to-purple-200 p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 text-center">
                    <i class="fas fa-file-alt text-4xl text-purple-700 mb-4"></i>
                    <h3 class="text-lg font-semibold text-gray-700">Bài Đăng</h3>
                    <p class="text-3xl font-bold text-purple-800 mt-1">{{ $postCount }}</p>
                </div>

                <!-- Gói VIP -->
                <div class="bg-gradient-to-br from-yellow-100 to-yellow-200 p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 text-center">
                    <i class="fas fa-crown text-4xl text-yellow-600 mb-4"></i>
                    <h3 class="text-lg font-semibold text-gray-700">Gói VIP</h3>
                    <p class="text-3xl font-bold text-yellow-700 mt-1">{{ $subscriptionCount }}</p>
                </div>

                <!-- Phong Cách -->
                <div class="bg-gradient-to-br from-pink-100 to-pink-200 p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 text-center">
                    <i class="fas fa-palette text-4xl text-pink-600 mb-4"></i>
                    <h3 class="text-lg font-semibold text-gray-700">Phong Cách</h3>
                    <p class="text-3xl font-bold text-pink-700 mt-1">{{ $styleCount }}</p>
                </div>
            </div>

            <!-- Hoạt động gần đây -->
            <div class="mt-10">
                <h2 class="text-2xl font-semibold mb-4 text-gray-800">Hoạt Động Gần Đây</h2>
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <table class="min-w-full text-sm text-left text-gray-700">
                        <thead class="bg-indigo-600 text-white">
                            <tr>
                                <th class="px-6 py-3">Người Dùng</th>
                                <th class="px-6 py-3">Hành Động</th>
                                <th class="px-6 py-3">Chi Tiết</th>
                                <th class="px-6 py-3">Thời Gian</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($recentActivities as $activity)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-6 py-4">{{ $activity->user->name ?? 'Hệ thống' }}</td>
                                    <td class="px-6 py-4">{{ $activity->action }}</td>
                                    <td class="px-6 py-4">{{ $activity->description }}</td>
                                    <td class="px-6 py-4">{{ $activity->created_at->diffForHumans() }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">Không có hoạt động gần đây.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#logout').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function() {
                    window.location.href = "{{ url('http://127.0.0.1:8000') }}";
                },
                error: function() {
                    alert('Đăng xuất thất bại. Vui lòng thử lại.');
                }
            });
        });
    </script>
</body>
</html>
