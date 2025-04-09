<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Giới thiệu - FASHION AI</title>
  <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Be Vietnam Pro', sans-serif;
      margin: 0;
      background: linear-gradient(to right, #dbe9f4, rgb(59, 110, 162));
      color: #2c3e50;
    }

    .navbar {
      background: rgba(255, 255, 255, 0.95);
      padding: 15px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
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

    .menu-link {
      margin-left: 15px;
      padding: 10px 18px;
      text-decoration: none;
      font-size: 16px;
      border-radius: 8px;
      color: #2c3e50;
      font-weight: 500;
      transition: background-color 0.3s, color 0.3s;
    }

    .menu-link:hover {
      background-color: rgba(255, 255, 255, 0.6);
      color: #1a5276;
    }

    .login,
    .register {
      padding: 10px 20px;
      border-radius: 6px;
      text-decoration: none;
      font-weight: 500;
      font-size: 16px;
      margin-left: 10px;
      border: 1px solid transparent;
      transition: background-color 0.3s ease;
    }

    .login {
      background-color: #3490dc;
      color: white;
    }

    .login:hover {
      background-color: #2779bd;
    }

    .register {
      background-color: #f8f9fa;
      color: #212529;
      border: 1px solid #ced4da;
    }

    .register:hover {
      background-color: #e2e6ea;
    }

    .news-header {
      text-align: center;
      margin: 50px 20px 30px;
    }

    .news-header h1 {
      font-size: 40px;
      color: #2c3e50;
    }

    .content-section {
      max-width: 1100px;
      margin: auto;
      padding: 20px;
      background: white;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }

    .content-section h2 {
      font-size: 28px;
      margin-bottom: 20px;
      color: #2c3e50;
    }

    .content-section p {
      font-size: 18px;
      line-height: 1.6;
      color: #333;
      margin-bottom: 20px;
    }

    .content-section img {
      width: 100%;
      height: auto;
      border-radius: 8px;
      margin-bottom: 20px;
    }

    footer {
      background: rgb(32, 92, 152);
      color: #fff;
      padding: 60px 20px 40px;
      margin-top: 80px;
    }

    footer a {
      color: #ccc;
      text-decoration: none;
    }

    footer a:hover {
      text-decoration: underline;
    }

    footer .footer-content {
      max-width: 1200px;
      margin: auto;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    footer .footer-item {
      flex: 1 1 250px;
      margin-bottom: 30px;
    }

  </style>
</head>
<body>

  <!-- Navbar -->
  <div class="navbar">
    <div class="logo-section">
      <h2>FASHION AI</h2>
      <img src="logoImg.png" alt="Robot Logo" class="logo-robot">
    </div>
    <div>
      <a href="/" class="menu-link">Trang chủ</a>
      <a href="{{ route('gioi-thieu') }}" class="menu-link">Giới thiệu</a>
      <a href="{{ route('tin-tuc') }}" class="menu-link">Tin tức</a>
      <a href="{{ route('login') }}" class="login">Đăng nhập</a>
      <a href="{{ route('register') }}" class="register">Đăng ký</a>
    </div>
  </div>

  <!-- Giới thiệu -->
  <div class="news-header">
      <h1>Giới thiệu về FASHION AI</h1>
      <p>Khám phá cách mà trí tuệ nhân tạo đang làm thay đổi ngành thời trang và mang lại trải nghiệm thời trang cá nhân hóa</p>
  </div>

  <div class="content-section">
      <h2>FASHION AI - Định hình phong cách thời trang</h2>
      <img src="GioiThieu1.jpg" alt="About Us">
      <p>FASHION AI là một dự án sáng tạo, nơi công nghệ trí tuệ nhân tạo kết hợp với ngành công nghiệp thời trang để mang đến cho bạn một trải nghiệm mua sắm mới mẻ và thú vị. Chúng tôi giúp người dùng khám phá và tạo ra phong cách thời trang riêng biệt thông qua các thuật toán học máy mạnh mẽ.</p>

      <h2>Ứng dụng trí tuệ nhân tạo vào thời trang</h2>
      <img src="GioiThieu2.png" alt="Use">
      <p>Sử dụng công nghệ AI tiên tiến, FASHION AI không chỉ nhận diện các bộ trang phục và xu hướng mới nhất mà còn đưa ra những gợi ý phù hợp nhất với cá nhân người dùng. Nhờ vào khả năng phân tích hàng ngàn bức ảnh và dữ liệu thời trang, chúng tôi giúp bạn dễ dàng lựa chọn phong cách phù hợp nhất với mình.</p>

      <h2>Khám phá tính năng nổi bật của FASHION AI</h2>
      <img src="GioiThieu3.jpg" alt="Features">
      <p>Với FASHION AI, bạn có thể nhận diện phong cách, khám phá bộ sưu tập thời trang cá nhân, và nhận gợi ý thông minh về trang phục cho mỗi dịp. Hơn nữa, chúng tôi còn cung cấp các chương trình thử nghiệm và các xu hướng thời trang từ các nhà thiết kế nổi tiếng để bạn luôn cập nhật được những gì mới nhất trong ngành thời trang.</p>
  </div>

  <!-- Footer -->
  <footer>
    <div class="footer-content">
      <div class="footer-item">
        <h3>FASHION AI</h3>
        <p>Định hình phong cách thời trang của bạn với trí tuệ nhân tạo tiên tiến.</p>
      </div>
      <div class="footer-item">
        <h4>Liên kết</h4>
        <ul style="list-style: none; padding: 0;">
          <li><a href="#">Giới thiệu</a></li>
          <li><a href="#">Chính sách bảo mật</a></li>
          <li><a href="tel:+84907297845">Liên hệ: +84 907297845</a></li>
        </ul>
      </div>
      <div class="footer-item">
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
