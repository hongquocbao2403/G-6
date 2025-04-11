<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Đổi mật khẩu - Fashion AI</title>
  <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    .nav-links {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .nav-btn {
      background-color: #00cfff;
      color: white;
      padding: 10px 18px;
      font-size: 16px;
      font-weight: 600;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      border-radius: 50px;
      transition: all 0.3s ease;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transform: translateY(0);
    }

    .nav-btn:hover {
      transform: translateY(-3px);
    }

    .nav-btn i {
      font-size: 18px;
    }

    .logout-btn {
      background-color: #3498db;
      color: white;
      border: none;
      cursor: pointer;
      border-radius: 10px;
      padding: 10px 18px;
      font-size: 16px;
      font-weight: 600;
      border-radius: 0;
      line-height: 1.5;
      height: 44px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transition: background-color 0.2s ease, box-shadow 0.2s ease;
    }

    .logout-btn:hover {
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
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
      margin-bottom: 30px;
      color: #2c3e50;
    }

    form {
      max-width: 600px;
      margin: auto;
      text-align: left;
    }

    form div {
      margin-bottom: 20px;
    }

    label {
      font-weight: bold;
      margin-bottom: 8px;
      display: block;
    }

    input {
      width: 100%;
      padding: 12px;
      font-size: 16px;
      border: 2px solid #3498db;
      border-radius: 5px;
    }

    button[type="submit"] {
      padding: 12px 24px;
      background-color: #3498db;
      color: white;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    button[type="submit"]:hover {
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
  <div class="nav-links">
    <a href="http://127.0.0.1:8000/user/dashboard_2" class="nav-btn">
        <i class="fas fa-home"></i> Trang chủ
    </a>
    <a href="{{ route('upload.image') }}" class="nav-btn">
        <i class="fas fa-search"></i> Dự đoán
    </a>
    <a href="{{ route('user.posts.index') }}" class="nav-btn">
        <i class="fas fa-pen-to-square"></i> Blog
    </a>
    <a href="{{ route('vip.index') }}" class="nav-btn"><i class="fas fa-crown"></i> Đăng ký VIP</a>
    <a href="{{ route('styles.public.index') }}" class="nav-btn"><i class="fas fa-shirt"></i> Bộ sưu tập</a>
    <a href="{{ route('user.profile') }}" class="nav-btn">
        <i class="fas fa-user"></i> Hồ sơ
    </a>
  </div>
</div>

<!-- Main Content -->
<div class="container">
  <h1>Đổi mật khẩu</h1>
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
