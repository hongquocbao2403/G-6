<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Người Dùng</title>
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
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-indigo-700 transition">
                            <i class="fas fa-home mr-3"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users.index') }}" class="flex items-center py-3 px-4 bg-indigo-600 rounded-lg">
                            <i class="fas fa-users mr-3"></i> Người dùng
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.posts.index') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-indigo-700 transition">
                            <i class="fas fa-file-alt mr-3"></i> Quản lý bài đăng
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.subscriptions.index') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-indigo-700 transition">
                            <i class="fas fa-dollar-sign mr-3"></i> Quản lý Đăng ký VIP
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.styles.index') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-indigo-700 transition">
                            <i class="fas fa-palette mr-3"></i> Quản lý Phong Cách
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <a href="{{ route('admin.users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg w-full block text-center mb-4">
                    <i class="fas fa-plus"></i> Thêm Người Dùng
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
            <h1 class="text-3xl font-bold mb-6">Danh Sách Người Dùng</h1>

            <div class="bg-white p-6 rounded-lg shadow-lg">
                <table class="min-w-full bg-white border border-gray-300 mb-6">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">Tên</th>
                            <th class="px-4 py-2 border">Email</th>
                            <th class="px-4 py-2 border">Loại Tài Khoản</th> <!-- Thêm cột Loại Tài Khoản -->
                            <th class="px-4 py-2 border">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-2 border">{{ $user->id }}</td>
                                <td class="px-4 py-2 border">{{ $user->name }}</td>
                                <td class="px-4 py-2 border">{{ $user->email }}</td>
                                <td class="px-4 py-2 border">
                                    <!-- Kiểm tra vai trò và hiển thị -->
                                    @if($user->role == 'admin')
                                        <span class="text-green-500">Admin</span>
                                    @else
                                        <span class="text-blue-500">User</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 border flex space-x-2">
                                    <a href="{{ route('users.edit', $user->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg">
                                        <i class="fas fa-edit"></i> Sửa
                                    </a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg">
                                            <i class="fas fa-trash"></i> Xóa
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
