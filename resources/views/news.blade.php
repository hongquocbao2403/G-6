<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Tin tức - FASHION AI</title>
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

    .news-container {
      max-width: 1100px;
      margin: auto;
      padding: 20px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
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
      height: 200px;
      object-fit: cover;
    }

    .news-content {
      padding: 20px;
    }

    .news-content h3 {
      font-size: 20px;
      margin-bottom: 10px;
    }

    .news-content p {
      font-size: 16px;
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

    .slider {
      position: relative;
      max-width: 1100px;
      margin: 40px auto;
      overflow: hidden;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0);
    }

    .slides {
      display: flex;
      transition: transform 0.5s ease-in-out;
    }

    .slide {
      min-width: 100%;
    }

    .slide img {
      width: 100%;
      height: 400px;
      object-fit: cover;
    }

    .slider-btn {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background: rgba(0,0,0,0.5);
      color: white;
      border: none;
      padding: 12px;
      font-size: 18px;
      cursor: pointer;
      z-index: 10;
      border-radius: 50%;
    }

    .slider-btn:hover {
      background: rgba(0,0,0,0.7);
    }

    .prev {
      left: 10px;
    }

    .next {
      right: 10px;
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

  <!-- News Section -->
  <div class="news-header">
    <h1>Tin tức mới nhất</h1>
    <p>Những xu hướng và cập nhật mới về thời trang và công nghệ AI</p>
  </div>

  <div class="news-container">
    <div class="news-card">
      <img src="New1.jpg" alt="Bài viết 1">
      <div class="news-content">
        <h3>Câu lạc bộ Haute Couture Xuân – Hè 2025</h3>
        <p>25 buổi trình diễn thời trang cao cấp nổi bật sự tinh xảo và thủ công bậc thầy.</p>
        <a href="https://www.elle.vn/the-gioi-thoi-trang/thoi-trang-haute-couture-xuan-he-2025/" target="_blank">Đọc thêm</a>
      </div>
    </div>
    <div class="news-card">
      <img src="New2.jpg" alt="Bài viết 2">
      <div class="news-content">
        <h3>Xu hướng thời trang 2025</h3>
        <p>Kết hợp phong cách ứng dụng với công nghệ tạo nên trào lưu bùng nổ.</p>
        <a href="https://sunfly.com.vn/blogs/tin-tuc-thoi-trang/xu-huong-thoi-trang-2025-nhung-phong-cach-nao-dang-len-ngoi" target="_blank">Đọc thêm</a>
      </div>
    </div>
    <div class="news-card">
      <img src="New3.png" alt="Bài viết 3">
      <div class="news-content">
        <h3>Thời trang kết hợp AI</h3>
        <p>Khi AI bắt tay với thời trang, ngành công nghiệp đạt cột mốc phát triển vượt bậc.</p>
        <a href="https://vneconomy.vn/techconnect/ky-nguyen-hop-tac-giua-thoi-trang-va-cong-nghe.htm" target="_blank">Đọc thêm</a>
      </div>
    </div>
  </div>

  <!-- Tin HOT Slider -->
    <div class="news-header" style="margin-top: 60px;">
    <h1>Tin HOT nhất 🔥</h1>
    <p>Những cập nhật cực kỳ nổi bật và xu hướng AI - Thời trang mới nhất hiện nay</p>
    </div>
    <div class="slider-hot" style="position: relative; width: 100%; max-width: 1000px; margin: auto; overflow: hidden; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
    <div class="slides-hot" id="slidesHot" style="display: flex; transition: transform 0.5s ease-in-out;">
        <div class="slide-hot" style="min-width: 100%; position: relative;">
        <img src="New4.jpg" alt="Bài viết 4" style="width: 100%; height: 400px; object-fit: cover;">
        <div class="news-content" style="position: absolute; bottom: 0; background: rgba(0,0,0,0.5); color: white; padding: 20px; width: 100%;">
            <h3>'Fashionista giấu mặt' phối đồ như bức tranh</h3>
            <p>Lena - fashionista nổi tiếng với phong cách chụp giấu mặt - được khen đẹp như tranh.</p>
            <a href="https://vnexpress.net/fashionista-giau-mat-phoi-do-nhu-buc-tranh-4870776.html" target="_blank" style="color: rgb(32, 29, 213);">Đọc thêm</a>
        </div>
        </div>
        <div class="slide-hot" style="min-width: 100%; position: relative;">
        <img src="New5.jpg" alt="Bài viết 5" style="width: 100%; height: 400px; object-fit: cover;">
        <div class="news-content" style="position: absolute; bottom: 0; background: rgba(0,0,0,0.5); color: white; padding: 20px; width: 100%;">
            <h3>4 combo màu cùng tông kem</h3>
            <p>Tông kem đang chứng minh rằng sự tối giản chưa bao giờ nhàm chán.</p>
            <a href="https://www.elle.vn/xu-huong-thoi-trang/phoi-do-tong-mau-kem-2025/" target="_blank" style="color: rgb(32, 29, 213);">Đọc thêm</a>
        </div>
        </div>
        <div class="slide-hot" style="min-width: 100%; position: relative;">
        <img src="New6.jpg" alt="Bài viết 6" style="width: 100%; height: 400px; object-fit: cover;">
        <div class="news-content" style="position: absolute; bottom: 0; background: rgba(0,0,0,0.5); color: white; padding: 20px; width: 100%;">
            <h3>AI có thể thay thế nhà thiết kế thời trang?</h3>
            <p>Đây vừa là một cơ hội lớn, vừa là một thách thức cho các nhà thiết kế.</p>
            <a href="https://www.acfc.com.vn/blog/15-phong-cach-thoi-trang-sanh-dieu-ban-can-biet-de-phoi-do-chuan-gu.html" target="_blank" style="color:rgb(32, 29, 213);">Đọc thêm</a>
        </div>
        </div>
        <div class="slide-hot" style="min-width: 100%; position: relative;">
        <img src="New7.jpg" alt="Bài viết 6" style="width: 100%; height: 400px; object-fit: cover;">
        <div class="news-content" style="position: absolute; bottom: 0; background: rgba(0,0,0,0.5); color: white; padding: 20px; width: 100%;">
            <h3>Nghệ thuật phối đồ theo phong cách layer đẹp chuẩn fashionista</h3>
            <p>Phong cách layer là một trong những xu hướng thời trang nổi bật, cho phép bạn thể hiện cá tính và sự sáng tạo...</p>
            <a href="https://onoff.vn/blog/nghe-thuat-phoi-do-theo-phong-cach-layer/" target="_blank" style="color:rgb(32, 29, 213);">Đọc thêm</a>
        </div>
        </div>
    </div>
    <button class="slider-btn prev" onclick="prevHot()">❮</button>
    <button class="slider-btn next" onclick="nextHot()">❯</button>
    </div>
  <!-- Footer -->
  <footer>
    <div style="max-width: 1200px; margin: auto; display: flex; flex-wrap: wrap; justify-content: space-between;">
      <div style="flex: 1 1 250px; margin-bottom: 30px;">
        <h3>FASHION AI</h3>
        <p>Định hình phong cách thời trang của bạn với trí tuệ nhân tạo tiên tiến.</p>
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

  <!-- JS for both sliders -->
    <script>
    const slidesHot = document.getElementById('slidesHot');
    const totalHot = slidesHot.children.length;
    let hotIndex = 0;

    function showHotSlide(index) {
        slidesHot.style.transform = `translateX(-${index * 100}%)`;
    }

    function nextHot() {
        hotIndex = (hotIndex + 1) % totalHot;
        showHotSlide(hotIndex);
    }

    function prevHot() {
        hotIndex = (hotIndex - 1 + totalHot) % totalHot;
        showHotSlide(hotIndex);
    }

    // Tự động chuyển slide HOT mỗi 4s
    setInterval(nextHot, 4000);
    </script>
</body>
</html>
