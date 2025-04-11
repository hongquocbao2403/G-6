<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Bài đăng từ Admin - Fashion AI</title>
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

    .container {
      max-width: 1100px;
      margin: auto;
      padding: 60px 20px;
    }

    .post-card {
      background-color: white;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
      padding: 25px;
      margin-bottom: 30px;
      transition: 0.3s ease;
    }

    .post-card:hover {
      transform: scale(1.02);
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
    }

    .post-title {
      font-size: 24px;
      font-weight: 600;
      color: #2c3e50;
      margin-bottom: 10px;
    }

    .post-content {
      color: #555;
      margin-bottom: 15px;
      line-height: 1.6;
    }

    .post-meta {
      font-size: 14px;
      color: #888;
      display: flex;
      justify-content: space-between;
    }

    .no-posts {
      text-align: center;
      color: #fff;
      font-size: 20px;
      margin-top: 50px;
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

    @media (max-width: 768px) {
      .post-title {
        font-size: 20px;
      }

      .actions {
        justify-content: center;
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
    <h1 class="text-4xl font-bold text-white mb-10 text-center">📝 Bài đăng từ Admin</h1>

    @forelse($posts as $post)
      <div class="post-card">
        <div class="post-title">{{ $post->title }}</div>
        <div class="post-content">{{ $post->content }}</div>
        <div class="post-meta">
          <span>👤 {{ $post->user?->name ?? 'Admin' }}</span>
          <span>🕒 {{ $post->created_at->format('H:i d/m/Y') }}</span>
        </div>
      </div>
    @empty
      <div class="no-posts">Hiện tại chưa có bài đăng nào từ admin.</div>
    @endforelse
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
