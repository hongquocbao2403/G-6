<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Trang Dự Đoán - Fashion AI</title>
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

    .navbar a {
      margin-left: 15px;
      padding: 10px 20px;
      text-decoration: none;
      font-size: 16px;
      border-radius: 6px;
      transition: 0.3s;
    }

    .navbar .menu-link {
      color: #fff;
      background-color: #3498db;
      border-radius: 5px;
      padding: 10px 20px;
      transition: background-color 0.3s;
    }

    .navbar .menu-link:hover {
      background-color: #2980b9;
    }

    .navbar .login, .navbar .register {
      display: none;
    }

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

    .upload-section {
      margin-top: 40px;
      text-align: center;
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
      border: none;
    }

    .upload-section button:hover {
      background-color: #2980b9;
    }

    .result-section {
      margin-top: 40px;
      font-size: 18px;
      color: #2c3e50;
    }

    /* Spinner style */
    .spinner {
      font-size: 18px;
      color: #3498db;
      display: none; /* Ẩn mặc định */
    }

    /* Nút Trở về Trang Chủ */
    .back-home {
      margin-top: 30px;
      padding: 10px 20px;
      background-color: #3498db;
      color: white;
      border-radius: 5px;
      font-size: 16px;
      border: none;
      cursor: pointer;
      transition: background-color 0.3s;
      text-decoration: none;
      display: inline-block;
    }

    .back-home:hover {
      background-color: #2980b9;
    }

    footer {
      background: rgb(32, 92, 152);
      color: #fff;
      padding: 60px 20px 40px;
      margin-top: 150px;
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
      align-items: center;
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
      background-color: #2980b9;
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-btn {
      cursor: pointer;
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
  </style>
</head>
<body>

  <!-- Navbar -->
  <div class="navbar">
    <div class="logo-section">
      <h2>FASHION AI</h2>
    </div>
    <div class="actions">
      <a href="http://127.0.0.1:8000/user/dashboard_2" class="menu-link">Trang chủ</a>
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
      <!-- Logout Form với phương thức POST -->
      <form id="logout" action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="logout">Đăng xuất</button>
      </form>
    </div>
  </div>

  <!-- Main Content -->
  <div class="container">
    <h1>Chào mừng đến với trang dự đoán của bạn</h1>

    <!-- Form upload ảnh -->
    <div class="upload-section">
      <h3>Upload ảnh để nhận dạng phong cách</h3>
      <form action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" required>
        <button type="submit">Tải lên</button>
      </form>
    </div>

    <!-- Kết quả nhận dạng phong cách -->
    @if(session('style'))
      <div class="result-section">
        <h3>Phong cách nhận dạng:</h3>
        <p>{{ session('style') }}</p>
      </div>
    @endif
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
          <a href="https://facebook.com" target="_blank">
            <img src="https://cdn-icons-png.flaticon.com/32/733/733547.png" alt="Facebook">
          </a>
          <a href="https://instagram.com" target="_blank">
            <img src="https://cdn-icons-png.flaticon.com/32/2111/2111463.png" alt="Instagram">
          </a>
        </div>
      </div>
    </div>
    <div style="text-align: center; margin-top: 40px; color: #aaa; font-size: 14px;">
      © 2025 FASHION.AI. All rights reserved.
    </div>
  </footer>

  <script>
    // Khi ảnh được load hoàn chỉnh, ẩn spinner và hiển thị ảnh.
    const uploadedImg = document.getElementById('uploadedImage');
    if(uploadedImg){
      uploadedImg.onload = function(){
        document.getElementById('spinner').style.display = 'none';
        uploadedImg.style.display = 'block';
      };
    }

    // Xử lý đăng xuất qua AJAX.
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
