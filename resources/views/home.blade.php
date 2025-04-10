<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Fashion Style Recognition</title>
  <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;600;700&display=swap" rel="stylesheet">
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

    .navbar .login {
      background-color: #3498db;
      color: #fff;
    }

    .navbar .login:hover {
      background-color: #2980b9;
    }

    .navbar .register {
      background-color: #ecf0f1;
      color: #2c3e50;
      border: 1px solid #bdc3c7;
    }

    .navbar .register:hover {
      background-color: #dcdde1;
    }

    .marquee-bar {
      overflow: hidden;
      white-space: nowrap;
      background: #ecf0f1;
      padding: 10px 0;
    }

    .marquee-text {
      display: inline-block;
      padding-left: 100%;
      animation: marquee 20s linear infinite;
      font-weight: 600;
      color: #2c3e50;
      font-size: 18px;
    }

    @keyframes marquee {
      0% { transform: translateX(0%); }
      100% { transform: translateX(-100%); }
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

    p {
      font-size: 18px;
      margin-bottom: 20px;
      color: #fff;
    }

    .image-container img {
      max-width: 100%;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .image-caption {
      margin-top: 10px;
      font-style: italic;
      color: #666;
    }
    .menu-links {
    display: flex;
    align-items: center;
    gap: 15px;
    }

    .menu-link {
    padding: 10px 18px;
    font-size: 16px;
    text-decoration: none;
    color: #2c3e50;
    font-weight: 500;
    border-radius: 8px;
    transition: background-color 0.3s, color 0.3s;
    }

    .menu-link:hover {
    background-color: rgba(255, 255, 255, 0.6);
    color: #1a5276;
    }


    /* Search bar */
    #styleSearch {
      width: 100%;
      padding: 14px 20px;
      font-size: 16px;
      border-radius: 10px;
      border: 1px solid #ccc;
    }

    #suggestions li {
      padding: 10px;
      cursor: pointer;
      background-color: #fff;
      border: 1px solid #eee;
      margin-top: 5px;
      border-radius: 6px;
      list-style: none;
    }

    #suggestions li:hover {
      background-color: #f2f2f2;
    }

    /* Video */
    .video-wrapper {
      max-width: 700px;
      margin: 50px auto 60px;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }

    .video-wrapper:hover {
      transform: scale(1.01);
    }

    .video-wrapper iframe {
      width: 100%;
      height: 320px;
    }

    .news-section {
      margin-top: 60px;
      text-align: left;
    }

    .news-section h2 {
      font-size: 32px;
      color: #2c3e50;
      margin-bottom: 30px;
      text-align: center;
    }

    .news-cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 30px;
    }

    .news-card {
      background: white;
      border-radius: 12px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
      overflow: hidden;
      transition: transform 0.3s ease;
    }

    .news-card:hover {
      transform: translateY(-5px);
    }

    .news-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .news-content {
      padding: 20px;
    }

    .news-content h3 {
      font-size: 20px;
      margin-bottom: 10px;
      color: #2c3e50;
    }

    .news-content p {
      font-size: 16px;
      color: #555;
    }

    .news-content a {
      display: inline-block;
      margin-top: 10px;
      color: #3498db;
      text-decoration: none;
      font-weight: bold;
    }

    .news-content a:hover {
      text-decoration: underline;
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

      .video-wrapper iframe {
        height: 200px;
      }
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
        <a href="{{ route('gioi-thieu') }}" class="menu-link">Giới thiệu</a>
        <a href="{{ route('tin-tuc') }}" class="menu-link">Tin tức</a>
        <a href="{{ route('login') }}" class="login">Đăng nhập</a>
        <a href="{{ route('register') }}" class="register">Đăng ký</a>
    </div>
  </div>

  <!-- Marquee -->
  <div class="marquee-bar">
    <div class="marquee-text">
      👗👠🧥💄💍 Chào mừng bạn đến với FASHION AI - Nơi định hình phong cách thời trang bằng trí tuệ nhân tạo! 👒🧢👜🧤👓
    </div>
  </div>

  <!-- Main Content -->
  <div class="container">
    <h1>Fashion Style Recognition</h1>
    <p>Khám phá phong cách thời trang của bạn bằng công nghệ AI hiện đại.</p>

    <!-- Search Box -->
    <div style="margin: 30px auto; max-width: 600px;">
      <input type="text" id="styleSearch" placeholder="🔍 Nhập phong cách bạn muốn tìm (ví dụ: Bohemian, Minimalist...)">
      <ul id="suggestions"></ul>
    </div>

    <!-- Image -->
    <div class="image-container">
      <img src="home.jpeg" alt="Fashion Style">
      <div class="image-caption">Công nghệ AI hỗ trợ bạn tìm phong cách phù hợp</div>
    </div>

    <!-- Video -->
    <div class="video-wrapper">
      <iframe src="https://www.youtube.com/embed/6wLHiMVLNbE" title="Giới thiệu Fashion AI" frameborder="0" allowfullscreen></iframe>
    </div>

    <!-- News -->
    <div class="news-section">
      <h2>Bài viết mới nhất</h2>
      <div class="news-cards">
        <div class="news-card">
          <img src="New1.jpg" alt="Bài viết 1">
          <div class="news-content">
            <h3>Câu lạc bộ tinh hoa Haute Couture Xuân – Hè 2025</h3>
            <p>25 buổi trình diễn cho Haute Couture mùa Xuân 2025. Những chi tiết thủ công làm nên sự cuốn hút...</p>
            <a href="https://www.elle.vn/the-gioi-thoi-trang/thoi-trang-haute-couture-xuan-he-2025/">Đọc thêm</a>
          </div>
        </div>
        <div class="news-card">
          <img src="New2.jpg" alt="Bài viết 2">
          <div class="news-content">
            <h3>Xu Hướng Thời Trang 2025: Những Phong Cách Nào Đang Lên Ngôi?</h3>
            <p>Kết hợp giữa ứng dụng và sáng tạo trong ngành thời trang đang tạo nên xu hướng mới...</p>
            <a href="https://sunfly.com.vn/blogs/tin-tuc-thoi-trang/xu-huong-thoi-trang-2025-nhung-phong-cach-nao-dang-len-ngoi">Đọc thêm</a>
          </div>
        </div>
        <div class="news-card">
          <img src="New3.png" alt="Bài viết 3">
          <div class="news-content">
            <h3>Kỷ nguyên hợp tác giữa thời trang và công nghệ</h3>
            <p>AI có thể giúp tăng từ 150 - 275 tỷ USD lợi nhuận cho ngành thời trang trong tương lai...</p>
            <a href="https://vneconomy.vn/techconnect/ky-nguyen-hop-tac-giua-thoi-trang-va-cong-nghe.htm">Đọc thêm</a>
          </div>
        </div>
      </div>
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

  <!-- JS Search -->
  <script>
    const styles = [
      "Bohemian", "Minimalist", "Vintage", "Sporty", "Casual",
      "Grunge", "Streetwear", "Chic", "Preppy", "Business",
      "Punk", "Goth", "Y2K", "Retro", "Classic", "E-girl", "Tomboy"
    ];
    const input = document.getElementById("styleSearch");
    const suggestions = document.getElementById("suggestions");

    input.addEventListener("input", function () {
      const query = this.value.toLowerCase();
      suggestions.innerHTML = "";
      if (query.length === 0) return;

      const matches = styles.filter(style => style.toLowerCase().includes(query));
      matches.forEach(match => {
        const li = document.createElement("li");
        li.textContent = match;
        li.addEventListener("click", () => {
          input.value = match;
          suggestions.innerHTML = "";
          alert("Bạn vừa chọn phong cách: " + match);
          // TODO: Điều hướng đến trang kết quả hoặc hiển thị ảnh tương ứng
        });
        suggestions.appendChild(li);
      });
    });

    document.addEventListener("click", function (e) {
      if (!suggestions.contains(e.target) && e.target !== input) {
        suggestions.innerHTML = "";
      }
    });
  </script>

</body>
</html>
