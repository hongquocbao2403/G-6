<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Trang Dự Đoán - Fashion AI</title>
  <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    html, body {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: 'Be Vietnam Pro', sans-serif;
      background: linear-gradient(to right, #dbe9f4, rgb(59, 110, 162));
      display: flex;
      flex-direction: column;
    }

    .navbar {
      background: #fff;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      padding: 15px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
    }

    .logo-section h2 {
      margin: 0;
      color: #2c3e50;
      font-weight: 700;
    }

    .actions {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      align-items: center;
      justify-content: center;
    }

    .icon-button {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: linear-gradient(to right, #3bdcf5, #02b4f7);
      color: white;
      font-weight: 600;
      padding: 10px 18px;
      border-radius: 12px;
      font-size: 15px;
      text-decoration: none;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      transition: transform 0.2s ease, box-shadow 0.3s ease;
      border: none;
      cursor: pointer;
    }

    .icon-button i {
      font-size: 16px;
    }

    .icon-button:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
    }

    .logout {
      background-color: #3498db;
      color: #fff;
      padding: 10px 18px;
      font-size: 15px;
      border: none;
      border-radius: 6px;
      text-decoration: none;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .logout:hover {
      background-color: #2980b9;
    }

    .dropdown {
      position: relative;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      left: 0;
      top: 100%;
      background-color: white;
      border-radius: 5px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.1);
      z-index: 1000;
      min-width: 180px;
    }

    .dropdown-content a {
      color: #2c3e50;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      border-bottom: 1px solid #eee;
    }

    .dropdown-content a:hover {
      background-color: #f2f2f2;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .container {
      max-width: 1100px;
      margin: 0 auto;
      padding: 50px 20px;
      text-align: center;
      flex: 1;
    }

    h1 {
      font-size: 42px;
      color: #1b2f47;
      margin-bottom: 20px;
    }

    .upload-section {
      margin-top: 40px;
    }

    .upload-section input[type="file"] {
      padding: 10px;
      border: 2px solid #3498db;
      border-radius: 5px;
      margin-right: 15px;
      font-size: 15px;
    }

    .upload-section button {
      background-color: #3498db;
      color: white;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      font-size: 15px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .upload-section button:hover {
      background-color: #2980b9;
    }

    .result-section {
      margin-top: 40px;
      font-size: 20px;
      color: #2c3e50;
    }

    .back-home {
      margin-top: 30px;
      background-color: #3498db;
      color: white;
      text-decoration: none;
      padding: 10px 20px;
      border-radius: 5px;
      display: inline-block;
    }

    .back-home:hover {
      background-color: #2980b9;
    }

    footer {
      background: rgb(32, 92, 152);
      color: white;
      padding: 50px 20px;
    }

    footer a {
      color: #ccc;
      text-decoration: none;
    }

    footer a:hover {
      text-decoration: underline;
    }

    footer .footer-inner {
      max-width: 1200px;
      margin: auto;
      display: flex;
      flex-wrap: wrap;
      gap: 30px;
      justify-content: space-between;
    }

    footer .footer-inner div {
      flex: 1 1 250px;
    }

    footer .socials {
      display: flex;
      gap: 15px;
    }

    footer .socials img {
      width: 32px;
      height: 32px;
    }

    footer .copyright {
      text-align: center;
      margin-top: 30px;
      font-size: 14px;
      color: #aaa;
    }

    @media (max-width: 768px) {
      h1 {
        font-size: 32px;
      }

      .navbar {
        flex-direction: column;
        align-items: flex-start;
      }

      .actions {
        justify-content: flex-start;
        flex-wrap: wrap;
        gap: 10px;
      }
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
      <a href="http://127.0.0.1:8000/user/dashboard_2" class="icon-button"><i class="fas fa-home"></i> Trang chủ</a>
      <a href="{{ route('upload.image') }}" class="icon-button"><i class="fas fa-search"></i> Dự đoán</a>
      <a href="{{ route('user.posts.index') }}" class="icon-button"><i class="fas fa-pen-to-square"></i> Blog</a>
      <a href="{{ route('vip.index') }}" class="icon-button"><i class="fas fa-crown"></i> Đăng ký VIP</a>
      <div class="dropdown">
        <a href="{{ route('user.profile') }}" class="icon-button"><i class="fas fa-user"></i> Hồ sơ</a>
      </div>
      <form id="logout" action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="logout">Đăng xuất</button>
      </form>
    </div>
  </div>

  <!-- Main -->
  <div class="container">
    <h1>Chào mừng đến với trang dự đoán</h1>
    <div class="upload-section">
      <h3>Hãy tải ảnh lên để nhận diện phong cách thời trang</h3>
      <form action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" required>
        <button type="submit">Tải lên</button>
      </form>
    </div>

    @if(session('style'))
      <div class="result-section">
        <h3>Phong cách được nhận dạng:</h3>
        <p>{{ session('style') }}</p>
      </div>
    @endif
  </div>

  <!-- Footer -->
  <footer>
    <div class="footer-inner">
      <div>
        <h3>FASHION AI</h3>
        <p>Công nghệ AI hiện đại giúp bạn khám phá phong cách thời trang phù hợp.</p>
      </div>
      <div>
        <h4>Liên kết</h4>
        <ul style="list-style: none; padding: 0;">
          <li><a href="#">Giới thiệu</a></li>
          <li><a href="#">Chính sách</a></li>
          <li><a href="tel:+84907297845">Liên hệ: +84 907297845</a></li>
        </ul>
      </div>
      <div>
        <h4>Theo dõi</h4>
        <div class="socials">
          <a href="https://facebook.com" target="_blank"><img src="https://cdn-icons-png.flaticon.com/32/733/733547.png" alt="Facebook"></a>
          <a href="https://instagram.com" target="_blank"><img src="https://cdn-icons-png.flaticon.com/32/2111/2111463.png" alt="Instagram"></a>
        </div>
      </div>
    </div>
    <div class="copyright">
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
