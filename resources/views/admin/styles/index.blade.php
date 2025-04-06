@extends('layouts.admin')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Danh Sách Ảnh</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr>
                <th class="px-6 py-4 text-left">Tên Ảnh</th>
                <th class="px-6 py-4 text-left">Phong Cách</th>
                <th class="px-6 py-4 text-left">Ảnh</th>
                <th class="px-6 py-4 text-left">Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($images as $image)
                <tr>
                    <td class="px-6 py-4 border-b">{{ $image->name }}</td>
                    <td class="px-6 py-4 border-b">{{ $image->style->name }}</td>
                    <td class="px-6 py-4 border-b">
                        <img src="{{ asset('storage/' . $image->file_path) }}" width="100" alt="Image">
                    </td>
                    <td class="px-6 py-4 border-b">
                        <form action="{{ route('admin.images.destroy', $image->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-lg">
                                Xóa
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
