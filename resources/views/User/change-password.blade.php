<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu - Fashion AI</title>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Be Vietnam Pro', sans-serif;
            background: linear-gradient(to right, #dbe9f4, rgb(59, 110, 162));
            margin: 0;
            padding: 0;
            color: #333;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.95);
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .navbar h2 {
            margin: 0;
            font-weight: 700;
            color: #2c3e50;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar a {
            margin-left: 15px;
            padding: 10px 20px;
            text-decoration: none;
            font-size: 16px;
            border-radius: 6px;
            transition: 0.3s;
        }

        .navbar .menu-link {
            color: #2c3e50;
        }

        .navbar .menu-link:hover {
            background-color: #f0f0f0;
            color: #3498db;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            padding: 60px 20px;
            text-align: center;
        }

        h1 {
            font-size: 44px;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        form {
            margin-top: 30px;
            text-align: left;
            max-width: 600px;
            margin: auto;
        }

        form div {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 2px solid #3498db;
            border-radius: 5px;
        }

        button {
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #2980b9;
        }

        footer {
            background: rgb(32, 92, 152);
            color: #fff;
            padding: 60px 20px 40px;
            margin-top: 100px;
        }

        footer a {
            color: #ccc;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <div class="logo-section">
            <h2>FASHION AI</h2>
        </div>
        <div>
            <!-- Logout Form với phương thức POST -->
            <form id="logout" action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">Đăng xuất</button>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <h1>Đổi mật khẩu</h1>

        <!-- Form đổi mật khẩu -->
        <form action="{{ route('update.password') }}" method="POST">
            @csrf
            <div>
                <label for="current_password">Mật khẩu hiện tại</label>
                <input type="password" name="current_password" required>
            </div>
            <div>
                <label for="new_password">Mật khẩu mới</label>
                <input type="password" name="new_password" required>
            </div>
            <div>
                <label for="new_password_confirmation">Xác nhận mật khẩu mới</label>
                <input type="password" name="new_password_confirmation" required>
            </div>
            <button type="submit">Đổi mật khẩu</button>
        </form>
    </div>

    <!-- Footer -->
    <footer>
        <div style="max-width: 1200px; margin: auto; display: flex; flex-wrap: wrap; justify-content: space-between;">
            <div style="flex: 1 1 250px; margin-bottom: 30px;">
                <h3>FASHION AI</h3>
                <p>Công nghệ giúp bạn định hình phong cách cá nhân thông qua phân tích AI hiện đại.</p>
            </div>
            <div style="flex: 1 1 200px; margin-bottom: 30px;">
                <h4>Liên kết</h4>
                <ul style="list-style: none; padding: 0;">
                    <li><a href="#">Giới thiệu</a></li>
                    <li><a href="#">Chính sách</a></li>
                    <li><a href="tel:+84907297845">Liên hệ: +84 907297845</a></li>
                </ul>
            </div>
            <div style="flex: 1 1 200px; margin-bottom: 30px;">
                <h4>Theo dõi chúng tôi</h4>
                <div style="display: flex; gap: 15px;">
                    <a href="https://facebook.com" target="_blank"><img src="https://cdn-icons-png.flaticon.com/32/733/733547.png" alt="Facebook"></a>
                    <a href="https://instagram.com" target="_blank"><img src="https://cdn-icons-png.flaticon.com/32/2111/2111463.png" alt="Instagram"></a>
                </div>
            </div>
        </div>
        <div style="text-align: center; margin-top: 40px; color: #aaa; font-size: 14px;">
            © 2025 FASHION.AI. All rights reserved.
        </div>
    </footer>

</body>
</html>
