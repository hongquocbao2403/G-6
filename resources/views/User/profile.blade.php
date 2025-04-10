<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin cá nhân - Fashion AI</title>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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

        .menu-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 25px;
            text-decoration: none;
            background-color: #00cfff;
            color: white;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            margin-left: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .menu-link:hover {
            transform: translateY(-4px);
            background-color: #00cfff;
            color: white;
        }

        .logout-btn {
            background-color: #3498db;
            color: #fff;
            border: none;
            cursor: pointer;
            padding: 8px 15px;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s;
            min-width: 140px;
            text-align: center;
            margin-left: 10px;
        }

        .logout-btn:hover {
            background-color: #2980b9;
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

        /* Nút bên dưới riêng biệt, bo nhẹ hơn */
        .action-btn {
            margin-top: 20px;
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .action-btn:hover {
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
            <a href="http://127.0.0.1:8000/user/dashboard_2" class="menu-link">
                <i class="fas fa-home"></i> Trang chủ
            </a>
            <a href="{{ route('upload.image') }}" class="menu-link">
                <i class="fas fa-search"></i> Dự đoán
            </a>
            <a href="{{ route('user.posts.index') }}" class="menu-link">
                <i class="fas fa-pen-to-square"></i> Blog
            </a>
            <a href="{{ route('vip.index') }}" class="menu-link"><i class="fas fa-crown"></i> Đăng ký VIP</a>
            <a href="{{ route('user.profile') }}" class="menu-link">
                <i class="fas fa-user"></i> Hồ sơ
            </a>
            <!-- Logout giữ nguyên -->
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
            <a href="{{ route('user.edit') }}" class="action-btn">Chỉnh sửa hồ sơ</a>
        </div>
        <div class="user-info">
            <a href="{{ route('change.password') }}" class="action-btn">Đổi mật khẩu</a>
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
        <!-- JS -->
  <script>
    $('#logout').on('submit', function(event) {
      event.preventDefault();
      $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: $(this).serialize(),
        success: function() {
          window.location.href = "http://127.0.0.1:8000";
        },
        error: function() {
          alert('Đăng xuất thất bại. Vui lòng thử lại.');
        }
      });
    });
  </script>
</body>
</html>
