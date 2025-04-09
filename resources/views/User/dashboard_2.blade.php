<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>User Dashboard - Fashion AI</title>
  <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;600;700&display=swap" rel="stylesheet">
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

    .logo-robot {
      width: 40px;
      height: 40px;
      animation: shake 2.5s ease-in-out infinite;
    }

    @keyframes shake {
      0%, 100% { transform: rotate(0deg); }
      25% { transform: rotate(2.5deg); }
      75% { transform: rotate(-2.5deg); }
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

    .navbar .login, .navbar .register {
      display: none;
    }

    .navbar .logout {
      background-color: #3498db;
      color: #fff;
    }

    .navbar .logout:hover {
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

    .user-greeting {
      font-size: 20px;
      color: #fff;
    }

    .upload-section {
      margin-top: 40px;
    }

    .upload-section h3 {
      font-size: 24px;
      margin-bottom: 15px;
    }

    .upload-section form {
      display: inline-block;
      margin-top: 10px;
    }

    .upload-section input[type="file"] {
      padding: 10px;
      margin-right: 20px;
      border: 2px solid #3498db;
      border-radius: 5px;
      font-size: 16px;
    }

    .upload-section button {
      padding: 10px 20px;
      background-color: #3498db;
      color: white;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .upload-section button:hover {
      background-color: #2980b9;
    }

    .result-section {
      margin-top: 40px;
      font-size: 18px;
      color: #2c3e50;
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

    @media (max-width: 768px) {
      h1 {
        font-size: 36px;
      }
    }

    /* Navbar Button Styles */
    .navbar .actions {
      display: flex;
      gap: 15px;
    }

    .navbar .menu-link,
    .navbar .dropdown-btn {
      padding: 10px 20px;
      background-color: #3498db;
      color: white;
      border-radius: 5px;
      font-size: 16px;
      text-decoration: none;
      display: inline-block;
      transition: background-color 0.3s;
      min-width: 180px;
      text-align: center;
      border: none;
      outline: none;
    }

    .navbar .menu-link:hover,
    .navbar .dropdown-btn:hover {
      background-color: #2980b9 !important;
      color: white !important;
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-btn {
      padding: 10px 20px;
      background-color: #3498db;
      color: white;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      min-width: 180px;
      text-align: center;
    }

    .dropdown-btn:hover {
      background-color: #2980b9;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #fff;
      min-width: 160px;
      box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
      z-index: 1;
      border-radius: 5px;
      top: 100%;
      left: 50%;
      transform: translateX(-50%);
    }

    .dropdown-content a {
      color: #2c3e50;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {
      background-color: #f0f0f0;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    /* Nút Đăng xuất giống như menu link */
    .navbar .logout {
      background-color: #3498db;
      color: #fff;
      border: none;
      cursor: pointer;
      padding: 10px 20px;
      border-radius: 5px;
      font-size: 16px;
      transition: background-color 0.3s;
    }

    .navbar .logout:hover {
      background-color: #2980b9;
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
      <a href="{{ route('upload.image') }}" class="menu-link">Dự đoán</a>
      <!-- Dropdown menu cho Thông tin cá nhân -->
      <div class="dropdown">
        <button class="dropdown-btn">Thông tin cá nhân</button>
        <div class="dropdown-content">
          <a href="{{ route('user.profile') }}">Xem hồ sơ</a>
          <a href="{{ route('user.edit') }}">Chỉnh sửa hồ sơ</a>
          <a href="{{ route('change.password') }}">Đổi mật khẩu</a>
        </div>
      </div>
      <!-- Nút Đăng xuất giống menu link -->
      <form id="logout" action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="logout">Đăng xuất</button>
      </form>
    </div>
  </div>

  <!-- Main Content -->
  <div class="container">
    <h1>Chào mừng đến với trang tổng quan của bạn</h1>
    <p class="user-greeting">Chào {{ Auth::user()->name }}, đây là không gian riêng của bạn!</p>
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

  <script>
    $('#logout').on('submit', function(event) {
      event.preventDefault(); // Ngăn hành động submit mặc định
      $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: $(this).serialize(),
        success: function() {
          window.location.href = "http://127.0.0.1:8000"; // Chuyển hướng về trang chủ
        },
        error: function() {
          alert('Đăng xuất thất bại. Vui lòng thử lại.');
        }
      });
    });
  </script>

</body>
</html>
