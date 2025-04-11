<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>{{ $style['name'] }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            flex-wrap: wrap;
        }

        .logo-section h2 {
            margin: 0;
            font-weight: 700;
            color: #2c3e50;
        }
        .navbar h2 {
            font-size: 25px;
            margin: 0;
            font-weight: 700;
            color: #2c3e50;
        }
        .actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 10px;
        }

        .actions a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 24px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 20px;
            background-color: #00cfff;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .actions a:hover {
            transform: translateY(-4px); /* Thêm hiệu ứng nhảy lên */
        }

        .actions button {
            padding: 12px 24px;
            font-size: 16px;
            border-radius: 6px;
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .actions button:hover {
            background-color: #2980b9;
        }

        /* Đảm bảo nút đăng xuất không có hiệu ứng hover */
        form#logout button {
            transform: none !important;  /* Bỏ hiệu ứng nhảy lên cho nút đăng xuất */
        }

        footer {
            background: rgb(32, 92, 152);
            color: #fff;
            padding: 60px 20px 40px;
            margin-top: 50px;
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
    <div class="actions">
      <a href="{{ url('http://127.0.0.1:8000/user/dashboard_2') }}">
        <i class="fas fa-home"></i> Trang chủ
      </a>
      <a href="{{ route('upload.image') }}">
        <i class="fas fa-search"></i> Dự đoán
      </a>
      <a href="{{ route('user.posts.index') }}"><i class="fas fa-pen-to-square"></i> Blog</a>
      <a href="{{ route('vip.index') }}" class="enhanced-btn"><i class="fas fa-crown"></i> Đăng ký VIP</a>
      <a href="{{ route('user.profile') }}">
        <i class="fas fa-user"></i> Hồ sơ
      </a>
    </div>
  </div>

    <!-- MAIN CONTENT -->
    <main class="container mx-auto py-10 px-4">
        <div class="bg-white shadow-2xl rounded-3xl p-8 max-w-3xl mx-auto text-center">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">{{ $style['name'] }}</h2>

            <p class="text-gray-700 text-lg mb-6">
                Đây là trang chi tiết của phong cách <strong>{{ $style['name'] }}</strong>.
            </p>

            @if (!empty($style['description']))
                <p class="text-gray-600 italic mb-6">{{ $style['description'] }}</p>
            @endif

            @if (!empty($style['image']))
                <div class="mt-6">
                    <img src="{{ asset($style['image']) }}" alt="{{ $style['name'] }}">
                </div>
            @endif
        </div>
    </main>

    <!-- Footer -->
    <!-- Footer -->
<footer>
    <div style="max-width: 1200px; margin: auto; display: flex; flex-wrap: wrap; justify-content: space-between;">
        <div style="flex: 1 1 250px; margin-bottom: 30px;">
            <h3 style="font-size: 24px; font-weight: 700;">FASHION AI</h3>
            <p style="font-size: 16px; margin-top: 10px;">Công nghệ giúp bạn định hình phong cách cá nhân thông qua phân tích AI hiện đại.</p>
        </div>
        <div style="flex: 1 1 200px; margin-bottom: 30px;">
            <h4 style="font-size: 18px; font-weight: 500;">Liên kết</h4>
            <ul style="list-style: none; padding: 0; font-size: 15px; margin-top: 20px;">
                <li><a href="#">Giới thiệu</a></li>
                <li><a href="#">Chính sách</a></li>
                <li><a href="tel:+84907297845">Liên hệ: +84 907297845</a></li>
            </ul>
        </div>
        <div style="flex: 1 1 200px; margin-bottom: 30px;">
            <h4 style="font-size: 17px; font-weight: 400;">Theo dõi chúng tôi</h4>
            <div style="display: flex; gap: 15px; margin-top: 20px;">
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
