@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md login-box">
        <!-- Logo nếu cần -->
        <div class="logo-container mb-6">
            <img src="{{ asset('logoImg.png') }}" alt="Logo" class="mx-auto">
        </div>

        <h2 class="text-3xl font-bold text-center text-white mb-6">🔒 Đặt lại mật khẩu</h2>

        <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
            @csrf

            <!-- Hidden fields for token and email -->
            <input type="hidden" name="token" value="{{ request()->route('token') }}">
            <input type="hidden" name="email" value="{{ request()->input('email') }}">

            <div>
                <label for="username" class="block text-sm font-semibold text-white">Tên đăng nhập</label>
                <input type="text" name="username" id="username" class="w-full px-4 py-2 input-field rounded-lg" required>
            </div>

            <div>
                <label for="password" class="block text-sm font-semibold text-white">Mật khẩu mới</label>
                <div class="relative flex items-center">
                    <input type="password" name="password" id="password" class="w-full px-4 py-2 input-field rounded-lg" required>
                    <span class="absolute right-0 top-1/2 transform -translate-y-1/2 flex items-center cursor-pointer text-gray-500 hover:text-gray-700 mr-3" onclick="togglePassword('password')">
                        👁️
                    </span>
                </div>
                @error('password')
                    <div class="text-sm text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-semibold text-white">Xác nhận mật khẩu mới</label>
                <div class="relative flex items-center">
                    <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-4 py-2 input-field rounded-lg" required>
                    <span class="absolute right-0 top-1/2 transform -translate-y-1/2 flex items-center cursor-pointer text-gray-500 hover:text-gray-700 mr-3" onclick="togglePassword('password_confirmation')">
                        👁️
                    </span>
                </div>
            </div>

            <!-- Thêm margin-bottom cho nút để không bị dính vào ô nhập khẩu -->
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg login-button font-medium shadow-md hover:bg-blue-700 mt-4">
                🔄 Reset mật khẩu
            </button>
        </form>

        <!-- Nút quay lại trang login -->
        <div class="mt-4 text-center">
            <a href="{{ route('login') }}" class="text-blue-500 hover:underline text-sm">Quay lại trang đăng nhập</a>
        </div>
    </div>
</div>

<script>
function togglePassword(fieldId) {
    const field = document.getElementById(fieldId);
    field.type = field.type === "password" ? "text" : "password";
}
</script>

@endsection

<style>
    body {
        background: url('{{ asset('background.jpg') }}') no-repeat center center fixed;
        background-size: cover;
    }

    .login-box {
        backdrop-filter: blur(10px);
        background: rgba(40, 14, 127, 0.2);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 2rem;
        border-radius: 15px;
    }

    .input-field {
        background: rgba(255, 255, 255, 0.7);
        border: none;
        outline: none;
    }

    .input-field:focus {
        background: rgba(255, 255, 255, 1);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .login-button {
        transition: transform 0.2s;
    }

    .login-button:hover {
        transform: scale(1.05);
    }

    .logo-container img {
        width: 120px;
        height: auto;
        display: block;
        margin: 0 auto;
    }
</style>
