<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thư Viện Ảnh</title>
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
                        <a href="{{ route('admin.users.index') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-indigo-700 transition">
                            <i class="fas fa-users mr-3"></i> Người dùng
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('images.index') }}" class="flex items-center py-3 px-4 bg-indigo-600 rounded-lg">
                            <i class="fas fa-image mr-3"></i> Thư viện ảnh
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('file.upload') }}" class="flex items-center py-3 px-4 rounded-lg hover:bg-indigo-700 transition">
                            <i class="fas fa-dollar-sign mr-3"></i> Doanh thu
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <a href="{{ route('admin.images.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg w-full block text-center mb-4">
                    <i class="fas fa-plus"></i> Thêm Ảnh
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
            <h1 class="text-3xl font-bold mb-6">Thư Viện Ảnh</h1>

            <div class="bg-white p-6 rounded-lg shadow-lg">
                <!-- Thông báo thành công -->
                @if(session('success'))
                    <div class="bg-green-500 text-white p-4 mb-4 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Bảng hiển thị ảnh -->
                <table class="min-w-full bg-white border border-gray-300 mb-6">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left font-medium text-gray-700">Ảnh</th>
                            <th class="px-6 py-4 text-left font-medium text-gray-700">Phong Cách</th>
                            <th class="px-6 py-4 text-left font-medium text-gray-700">Hành động</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach($images as $image)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 border-b">
                                    <img src="{{ asset('storage/' . $image->file_path) }}" width="120" class="rounded-lg shadow-md">
                                </td>
                                <td class="px-6 py-4 border-b">{{ $image->style->name }}</td>
                                <td class="px-6 py-4 border-b text-center">
                                    <form action="{{ route('admin.images.destroy', $image->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300 transform hover:scale-105 shadow-lg">
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
