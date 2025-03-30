<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Trang</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Quản lý Trang</h1>

        <a href="{{ route('pages.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg mb-4 inline-block">Thêm Trang</a>

        <table class="min-w-full table-auto border-collapse bg-white shadow-md rounded-lg">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Tiêu đề</th>
                    <th class="px-4 py-2 border">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pages as $page)
                <tr>
                    <td class="px-4 py-2 border">{{ $page->id }}</td>
                    <td class="px-4 py-2 border">{{ $page->title }}</td>
                    <td class="px-4 py-2 border">
                        <a href="{{ route('pages.edit', $page) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg">Sửa</a>
                        <form action="{{ route('pages.destroy', $page) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
