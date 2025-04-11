<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Bộ sưu tập phong cách - FASHION AI</title>
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
      font-size: 15px;
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

    .container {
      max-width: 1200px;
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

    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 20px;
    }

    .style-card {
      background-color: white;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      transition: 0.3s ease;
      position: relative;
      cursor: pointer;
    }

    .style-card:hover {
      transform: translateY(-4px);
    }

    .style-card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      display: block;
    }

    .style-card h2 {
      font-size: 18px;
      font-weight: 600;
      padding: 16px;
      text-align: center;
      margin: 0;
    }

    .style-card p {
      text-align: center;
      font-size: 14px;
      color: #777;
      margin-top: 4px;
      margin-bottom: 10px;
    }

    .like-button {
      position: absolute;
      top: 10px;
      right: 10px;
      background: rgba(255, 255, 255, 0.85);
      border-radius: 999px;
      padding: 6px 12px;
      font-size: 14px;
      color: #e74c3c;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 6px;
      transition: transform 0.2s ease;
      z-index: 2;
    }

    .like-button:hover {
      transform: scale(1.1);
    }
    .logout-btn {
        background-color: #3498db;
        color: #fff;
        border: none;
        cursor: pointer;
        padding: 8px 15px;
        border-radius: 10px;
        font-size: 15px;
        transition: background-color 0.3s;
        min-width: 140px;
        text-align: center;
        margin-left: 10px;
    }

    .logout-btn:hover {
        background-color: #2980b9;
    }
    .image-popup {
      position: fixed;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(0,0,0,0.8);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 999;
      display: none;
    }

    .image-popup img {
      max-width: 90%;
      max-height: 90%;
      border-radius: 12px;
    }

    .close-popup {
      position: absolute;
      top: 20px;
      right: 30px;
      font-size: 28px;
      color: white;
      cursor: pointer;
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
      <a href="{{ url('/user/dashboard_2') }}"><i class="fas fa-home"></i> Trang chủ</a>
      <a href="{{ route('upload.image') }}"><i class="fas fa-search"></i> Dự đoán</a>
      <a href="{{ route('user.posts.index') }}"><i class="fas fa-pen-to-square"></i> Blog</a>
      <a href="{{ route('vip.index') }}"><i class="fas fa-crown"></i> Đăng ký VIP</a>
      <a href="{{ route('styles.public.index') }}"><i class="fas fa-shirt"></i> Bộ sưu tập</a>
      <a href="{{ route('user.profile') }}"><i class="fas fa-user"></i> Hồ sơ</a>
      <form id="logout" action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" style="display: inline;" class="logout-btn">Đăng xuất</button>
      </form>
    </div>
  </div>

  <!-- Content -->
  <div class="container">
    <h2 class="title">🖼️ Bộ sưu tập phong cách</h2>
    <div class="grid">
      @foreach ($styles as $style)
        <div class="style-card" data-id="{{ $style->id }}" data-image="{{ asset('storage/' . $style->image) }}">
          <img src="{{ asset('storage/' . $style->image) }}" alt="{{ $style->name }}">
          <h2>{{ $style->name }}</h2>
          <p>👁️ {{ $style->views ?? 0 }} lượt xem</p>
          <span class="like-button" data-id="{{ $style->id }}">
            <i class="fas fa-heart"></i>
            <span class="like-count">{{ $style->likes ?? 0 }}</span>
          </span>
        </div>
      @endforeach
    </div>
  </div>

  <!-- Image Popup -->
  <div class="image-popup" id="imagePopup">
    <span class="close-popup" id="closePopup">&times;</span>
    <img id="popupImage" src="" alt="">
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

  <!-- Script xử lý like và view -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      // Like button
      document.querySelectorAll('.like-button').forEach(function (el) {
        el.addEventListener('click', function (e) {
          e.stopPropagation();
          const styleId = this.getAttribute('data-id');
          const icon = this.querySelector('i');
          const countEl = this.querySelector('.like-count');

          fetch(`/styles/${styleId}/like`, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({})
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              countEl.textContent = data.likes;
              icon.style.color = 'red';
            }
          });
        });
      });

      // Click ảnh mở popup
      document.querySelectorAll('.style-card').forEach(function (card) {
        card.addEventListener('click', function () {
          const imageUrl = this.getAttribute('data-image');
          const styleId = this.getAttribute('data-id');

          document.getElementById('popupImage').src = imageUrl;
          document.getElementById('imagePopup').style.display = 'flex';

          fetch(`/styles/${styleId}/view`, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({})
          });
        });
      });

      // Đóng popup
      document.getElementById('closePopup').addEventListener('click', function () {
        document.getElementById('imagePopup').style.display = 'none';
      });
    });
  </script>
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
