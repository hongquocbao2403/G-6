<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>User Dashboard - Fashion AI</title>
  <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;600;700&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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
      gap: 15px;
      flex-wrap: wrap;
    }

    .enhanced-btn {
      background: linear-gradient(135deg, #4fc1fe, #00d4ff);
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      font-weight: 600;
      color: white !important;
      border: none;
      border-radius: 16px;
      padding: 10px 24px;
      font-size: 16px;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: all 0.3s ease;
      text-align: center;
      text-decoration: none;
    }

    .enhanced-btn:hover {
      background: linear-gradient(135deg, #00c6ff);
      transform: translateY(-2px);
      box-shadow: 0 6px 14px rgba(0, 0, 0, 0.15);
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      top: 100%;
      left: 50%;
      transform: translateX(-50%);
      background-color: #fff;
      min-width: 180px;
      box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
      border-radius: 10px;
      z-index: 10;
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

    .logout {
      background-color: #3498db;
      color: white;
      border: none;
      cursor: pointer;
      padding: 10px 20px;
      border-radius: 10px;
      font-weight: bold;
      transition: 0.3s;
    }

    .logout:hover {
      background-color: #2980b9;
    }

    .search-style-box {
      margin: 40px auto;
      max-width: 550px;
      text-align: center;
      position: relative;
    }

    .search-style-box input {
      width: 100%;
      padding: 15px 20px;
      border-radius: 12px;
      font-size: 16px;
      border: 1px solid #ccc;
      outline: none;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
      transition: 0.3s;
    }

    .search-style-box input:focus {
      border-color: #3498db;
      box-shadow: 0 0 10px rgba(52, 152, 219, 0.3);
    }

    #suggestions {
      list-style: none;
      padding: 0;
      margin-top: 10px;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      display: none;
      position: absolute;
      width: 107%;
      z-index: 20;
      text-align: left;
    }

    #suggestions li {
      padding: 12px 20px;
      cursor: pointer;
    }

    #suggestions li:hover {
      background-color: #f0f0f0;
    }

    .container {
      max-width: 1100px;
      margin: auto;
      padding: 60px 20px;
      text-align: center;
    }

    h1 {
      font-size: 44px;
      color: #2c3e50;
    }

    .user-greeting {
      font-size: 20px;
      color: #fff;
    }

    footer {
      background: rgb(32, 92, 152);
      color: #fff;
      padding: 60px 20px 40px;
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
  </style>
</head>
<body>

  <!-- Navbar -->
  <div class="navbar">
    <div class="logo-section">
      <h2>FASHION AI</h2>
    </div>
    <div class="actions">
      <a href="{{ route('upload.image') }}" class="enhanced-btn"><i class="fas fa-magnifying-glass"></i> Dự đoán</a>
      <a href="{{ route('user.posts.index') }}" class="enhanced-btn"><i class="fas fa-pen-to-square"></i> Blog</a>
      <a href="{{ route('vip.index') }}" class="enhanced-btn"><i class="fas fa-crown"></i> Đăng ký VIP</a>
      <a href="{{ route('styles.public.index') }}" class="enhanced-btn"><i class="fas fa-shirt"></i> Bộ sưu tập</a>
      <div class="dropdown">
        <a href="{{ route('user.profile') }}" class="enhanced-btn"><i class="fas fa-user"></i> Hồ sơ</a>
      </div>
      <form id="logout" action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout">Đăng xuất</button>
      </form>
    </div>
  </div>

  <!-- Search Box -->
  <div class="search-style-box">
    <input type="text" id="styleSearch" placeholder="🔍 Nhập phong cách bạn muốn tìm (ví dụ: Bohemian, Minimalist...)">
    <ul id="suggestions"></ul>
  </div>

  <!-- Content -->
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

  <!-- Script -->
  <script>
    const input = document.getElementById("styleSearch");
    const suggestions = document.getElementById("suggestions");
    let styles = [];

    // Load styles.json
    fetch("/data/styles.json")
      .then(response => response.json())
      .then(data => {
        styles = data;
      })
      .catch(error => {
        console.error("Không thể tải styles.json:", error);
      });

    input.addEventListener("input", function () {
      const query = this.value.toLowerCase();
      suggestions.innerHTML = "";

      if (!query) {
        suggestions.style.display = "none";
        return;
      }

      const matches = styles.filter(style => style.name.toLowerCase().includes(query));
      if (matches.length === 0) {
        const li = document.createElement("li");
        li.textContent = "Không tìm thấy phong cách phù hợp";
        li.style.color = "#999";
        suggestions.appendChild(li);
      } else {
        matches.forEach(match => {
          const li = document.createElement("li");
          li.textContent = match.name;
          li.onclick = () => {
            input.value = match.name;
            suggestions.innerHTML = "";
            window.location.href = `/style/${match.slug}`;
          };
          suggestions.appendChild(li);
        });
      }

      suggestions.style.display = "block";
    });

    // Tự động chuyển khi bấm Enter
    input.addEventListener("keydown", function (e) {
      if (e.key === "Enter" && styles.length > 0) {
        const match = styles.find(style => style.name.toLowerCase() === input.value.toLowerCase());
        if (match) {
          window.location.href = `/style/${match.slug}`;
        }
      }
    });

    document.addEventListener("click", function (e) {
      if (!suggestions.contains(e.target) && e.target !== input) {
        suggestions.style.display = "none";
      }
    });

    // Ajax logout
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
