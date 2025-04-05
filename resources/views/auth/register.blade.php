<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(to right, #4facfe, #00f2fe);
        }
        .logo-container img {
            width: 120px; /* Điều chỉnh kích thước logo */
            height: auto;
            display: block;
            margin: 0 auto; /* Canh giữa */
        }
        body {
             background: url('background.jpg') no-repeat center center fixed;
            background-size: cover; /* Đảm bảo hình ảnh phủ kín toàn bộ trang */
        }
        .register-box {
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
        .register-button {
            transition: transform 0.2s;
        }
        .register-button:hover {
            transform: scale(1.05);
        }
    </style>
    <script>
        // JavaScript để toggle hiển thị mật khẩu
        function togglePassword(id) {
            var passwordField = document.getElementById(id);
            var showPasswordButton = document.getElementById('show-' + id);
            if (passwordField.type === "password") {
                passwordField.type = "text";
                showPasswordButton.textContent = "Hidden";
            } else {
                passwordField.type = "password";
                showPasswordButton.textContent = "Show";
            }
        }
    </script>
</head>
<body class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md register-box">
        <!-- Thêm logo phía trên tiêu đề -->
        <div class="logo-container">
            <img src="{{ asset('logoImg.png') }}" alt="Logo">
        </div>

        <h2 class="text-3xl font-bold text-center text-white mb-6">Sign up</h2>

        @if ($errors->any())
            <div class="mb-4 p-3 text-red-600 bg-red-100 border border-red-400 rounded-lg">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @if (session('status'))
            <div class="mb-4 p-3 text-green-600 bg-green-100 border border-green-400 rounded-lg">
                <p>{{ session('status') }}</p>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-white">Name</label>
                <input type="text" name="name" class="w-full px-4 py-2 input-field rounded-lg" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-white">Email</label>
                <input type="email" name="email" class="w-full px-4 py-2 input-field rounded-lg" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-white">Role</label>
                    <select name="role" class="w-full px-4 py-2 input-field rounded-lg" required>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-white">Password</label>
                <div class="flex items-center">
                    <input type="password" name="password" id="password" class="w-full px-4 py-2 input-field rounded-lg" required>
                    <button type="button" id="show-password" class="text-sm text-blue-100 hover:underline ml-2" onclick="togglePassword('password')">Show</button>
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-white">Re-enter Password</label>
                <div class="flex items-center">
                    <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-4 py-2 input-field rounded-lg" required>
                    <button type="button" id="show-password_confirmation" class="text-sm text-blue-100 hover:underline ml-2" onclick="togglePassword('password_confirmation')">Show</button>
                </div>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg register-button font-medium shadow-md hover:bg-blue-700">
                Register
            </button>
        </form>

        <div class="mt-4 text-center">
            <p class="text-white text-sm">
                Already have an account?
                <a href="{{ route('login') }}" class="text-yellow-300 font-medium hover:underline">Login here</a>
            </p>
        </div>
    </div>
</body>
</html>
