<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Đăng ký VIP - FASHION AI</title>
  <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
      flex-wrap: wrap;
    }

    .logo-section h2 {
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
      font-size: 16px;
      font-weight: 600;
      border-radius: 20px;
      background-color: #00cfff;
      color: white;
      text-decoration: none;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .actions a:hover {
      transform: translateY(-4px);
    }

    .actions button {
      padding: 12px 24px;
      font-size: 16px;
      border-radius: 6px;
      background-color: #3498db;
      color: white;
      border: none;
      cursor: pointer;
    }

    form#logout button {
      transform: none !important;
    }

    .container {
      max-width: 1100px;
      margin: auto;
      padding: 60px 20px;
    }

    .title {
      text-align: center;
      font-size: 32px;
      font-weight: bold;
      color: #fff;
      margin-bottom: 40px;
    }

    .vip-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 20px;
    }

    .vip-box {
      background-color: white;
      border-radius: 12px;
      padding: 25px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      transition: 0.3s ease;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .vip-box:hover {
      transform: translateY(-4px);
    }

    .vip-name {
      font-size: 20px;
      font-weight: bold;
      color: #007bff;
      margin-bottom: 10px;
    }

    .vip-description {
      font-size: 14px;
      color: #555;
      margin-bottom: 15px;
    }

    .vip-price {
      font-size: 18px;
      color: #28a745;
      font-weight: bold;
    }

    .vip-button {
      margin-top: 20px;
      padding: 10px 0;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 25px;
      cursor: pointer;
      font-weight: bold;
    }

    .vip-button:hover {
      background-color: #0056b3;
    }

    .vip-button[disabled] {
      background-color: gray;
      cursor: not-allowed;
    }

    .alert-success {
      background-color: #28a745;
      color: white;
      padding: 15px 20px;
      border-radius: 8px;
      margin-bottom: 30px;
      text-align: center;
      font-size: 16px;
    }

    footer {
      background: rgb(32, 92, 152);
      color: #fff;
      padding: 60px 20px 40px;
      margin-top: 60px;
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
      <a href="{{ route('styles.public.index') }}" class="enhanced-btn"><i class="fas fa-shirt"></i> Bộ sưu tập</a>
      <a href="{{ route('user.profile') }}">
        <i class="fas fa-user"></i> Hồ sơ
      </a>
      <form id="logout" action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit">Đăng xuất</button>
      </form>
    </div>
  </div>

  <!-- Content -->
  <div class="container">
    <h2 class="title">🎖️ Danh sách gói VIP</h2>

    @if(session('success'))
      <div class="alert-success">
        {{ session('success') }}
      </div>
    @endif

    <div class="vip-grid">
      @foreach ($subscriptions as $sub)
        <div class="vip-box">
          <div class="vip-name">{{ $sub->name }}</div>
          <div class="vip-description">{{ $sub->description }}</div>
          <div class="vip-price">{{ number_format($sub->price, 0, ',', '.') }} VND</div>

          @if (auth()->user()->subscription_id === $sub->id)
            <button class="vip-button" disabled>Đã đăng ký</button>
          @else
            <form method="POST" action="{{ route('vip.subscribe', $sub->id) }}">
              @csrf
              <button type="submit" class="vip-button">Đăng ký ngay</button>
            </form>
          @endif
        </div>
      @endforeach
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
