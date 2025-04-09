<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin cá nhân - Fashion AI</title>
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

        .user-info {
            font-size: 20px;
            color: #fff;
            margin: 10px 0;
        }

        .user-info a {
            margin-top: 20px;
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .user-info a:hover {
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
            <a href="{{ route('gioi-thieu') }}" class="menu-link">Giới thiệu</a>
            <a href="{{ route('tin-tuc') }}" class="menu-link">Tin tức</a>

            <!-- Logout Form với phương thức POST -->
            <form id="logout" action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">Đăng xuất</button>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <h1>Thông tin cá nhân</h1>
        <div class="user-info">
            <p>Họ và tên: {{ $user->name }}</p>
            <p>Email: {{ $user->email }}</p>
        </div>
        <div class="user-info">
            <a href="{{ route('user.edit') }}">Chỉnh sửa hồ sơ</a>
        </div>
        <div class="user-info">
            <a href="{{ route('change.password') }}">Đổi mật khẩu</a>
        </div>
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
