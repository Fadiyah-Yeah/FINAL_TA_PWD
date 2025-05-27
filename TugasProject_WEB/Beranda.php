<?php
include "KoneksiDatabase.php";
session_start();
//!true = false;
//!false = true;
if (!isset($_SESSION["login"])) {
  header("Location: LoginAkun.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Beranda</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    /* Navbar styles */
    .navbar {
      padding: 10px;
      background-color: #2F4156;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 1000;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand {
      font-weight: bold;
      font-size: 1.6rem;
    }

    .navbar .nav-link,
    .navbar .navbar-brand {
      color: white;
    }

    .navbar .nav-link:hover,
    .navbar .navbar-brand:hover {
      color: rgb(219, 172, 31);
    }

    body {
      padding-top: 60px;
    }

    /* Beranda Section */
    .Beranda-section {
      background: linear-gradient(to top, #F5EFEB, #C8D9E6);
      padding: 60px 0;
      width: 100%;
      height: 900px;
    }

    .Beranda-section .btn-shop {
      background: #567C8D;
      border: none;
      padding: 10px 25px;
      color: white;
      font-weight: 600;
      border-radius: 30px;
      transition: background 0.5s ease;
    }

    .Beranda-section .btn-shop:hover {
      background: #2F4156;
    }

    /* Watch Product */
    .watch-product {
      height: 900px;
      background: linear-gradient(to top, #FFFFFF, #F5EFEB);
      width: 100%;
    }

    .watch-product .circle {
      width: 140px;
      height: 140px;
      border-radius: 50%;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 2px 2px 8px rgb(0 0 0 / 0.1);
      margin: 0 10px;
      transition: transform 0.3s ease;
    }

    .watch-product .circle:hover {
      transform: scale(1.1);
      box-shadow: 2px 2px 15px rgb(0 0 0 / 0.3);
    }

    /* News cards */
    .News {
      background: linear-gradient(to bottom, #FFFFFF, #F5EFEB, #C8D9E6);
    }
    .News .card {
      border: none;
      box-shadow: 0 4px 8px rgb(0 0 0 / 0.1);
      transition: transform 0.3s ease;
    }

    .News .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgb(0 0 0 / 0.15);
    }

    .label-sale,
    .label-new {
      position: absolute;
      top: 10px;
      left: 10px;
      padding: 3px 8px;
      font-size: 0.75rem;
      font-weight: 600;
      border-radius: 20px;
      color: white;
    }

    .label-sale {
      background: #c44141;
    }

    .label-new {
      background: #41c455;
    }

    .btn-shop {
      background: #567C8D;
      color: white;
      border: none;
      padding: 12px 30px;
      font-weight: 600;
      border-radius: 10px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      display: block;
      margin: 40px auto 20px auto;
      width: 150px;
      text-align: center;
    }

    .btn-shop:hover {
      transform: scale(1.1);
      background-color: #2F4156;
      color: white;
    }

    .btn-expand {
      width: 100% !important;
      transition: width 0.4s ease;
    }

    /* Produk Section */
    .produk-section {
      height: 900px;
      padding: 60px 0;
      background: linear-gradient(to left, #F5EFEB, #C8D9E6, #567C8D);
    }

    .produk-section table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 2rem;
    }

    .produk-section table th,
    .produk-section table td {
      padding: 12px 15px;
      border-bottom: 1px solid rgb(0, 0, 0);
      text-align: left;
      font-size: 1rem;
      color: #1d1d1f;
    }

    .produk-section table th {
      width: 30%;
      font-weight: 600;
      color: #3c3c4399;
    }

    .produk-section img {
      max-width: 100%;
      border-radius: 30px;
      box-shadow: 0 10px 20px rgb(0 0 0 / 0.1);
    }

        .footer-social {
      display: flex;
      justify-content: space-between;
      align-items: start;
      flex-wrap: wrap;
    }

    .social-column {
      display: flex;
      flex-direction: column;
      gap: 5px;
    }

    .social-column a {
      color: white;
      text-decoration: none;
    }

    .footer-right {
      text-align: right;
    }
    
    .aos-up {
      opacity: 0;
      transform: translateY(50px);
      transition: all 1s ease;
    }

    .aos-up.aos-animate {
      opacity: 1;
      transform: translateY(0);
    }

    .aos-down {
      opacity: 0;
      transform: translateY(-50px);
      transition: all 1s ease;
    }

    .aos-down.aos-animate {
      opacity: 1;
      transform: translateY(0);
    }
  </style>
</head>

<body>

  <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="image/LogoWeb.png" alt="Logo" width="40" height="40">
                AppleTalk
            </a>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="Homepage.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="ProdukIphone/ReviewIphone16pro.php">Produk</a></li>
                    <li class="nav-item"><a class="nav-link" href="Beranda.php #hal3">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="Homepage.php #hal4">About</a></li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="Logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

  <!-- Beranda Section -->
  <section id="hal1" class="Beranda-section border-bottom border-secondary border-5">
    <div class="container d-flex flex-wrap align-items-center justify-content-center" style="margin-top: 185px;">
      <div class="col-md-5 text-center text-md-start">
        <img src="image/Beranda.jpeg" alt="Iphone" style="width: 400px; height: 400px; border-radius:30px; box-shadow: 0 20px 36px rgb(0 0 0 / 0.1)" class="img-fluid" />
      </div>
      <div class="col-md-6 ps-md-5">
        <h2 class="text-muted">Apple</h4>
          <h1 class="fw-bold mb-4">Inovasi yang Menginspirasi Dunia</h1>
          <h5 class="text-secondary"> Apple adalah salah satu brand teknologi paling berpengaruh dan ikonik di dunia. Dikenal karena desain elegan, performa tinggi, dan integrasi ekosistem yang mulus, Apple telah membangun reputasi kuat sebagai pelopor dalam inovasi digital.</h5>
          <a href="https://www.apple.com/id/iphone/" class="text-decoration-none"><button class="btn btn-shop">Shop Now</button></a>
      </div>
    </div>
  </section>

  <!-- Watch Product -->
  <section id="hal2" class="watch-product py-5 text-center border-bottom border-secondary border-5">
    <div class="container">
      <h3 class="text-uppercase fw-bold " style="margin-bottom: 40px;">Kategori Produk</h3>
      <h2 class="text-muted" style="margin-bottom: 40px;">Beragam Produk Tersedia</h2>
      <div class="d-flex justify-content-center align-items-center flex-wrap" style="gap: 80px;">
        <a href="ProdukIphone/ReviewIphone16pro.php" class="text-decoration-none">
          <div class="circle text-white" style="background-color: rgba(24, 105, 158, 0.86);">
            <h5 class="text-center ">
              iPhone
            </h5>
          </div>
        </a>
        <a href="ProdukMacBook/ReviewMacBookAir13inci.php" class="text-decoration-none">
          <div class="circle text-white" style="background-color: rgb(49, 140, 163);">
            <h5 class="text-center ">
              Macbook
            </h5>
          </div>
        </a>
        <a href="ProdukiPad/ReviewiPad11inci.php" class="text-decoration-none">
          <div class="circle text-white" style="background-color: rgb(18, 183, 224);">
            <h5 class="text-center ">
              iPad
            </h5>
          </div>
        </a>
      </div>
      <div class="d-flex justify-content-center align-items-center flex-wrap" style="gap: 80px; padding-top: 80px;">
        <a href="ProdukTv/tv+.php" class="text-decoration-none">
          <div class="circle text-white" style="background-color: rgba(51, 170, 179, 0.86);">
            <h5 class="text-center ">
              Tv
            </h5>
          </div>
        </a>
        <a href="ProdukWatch/nike.php" class="text-decoration-none">
          <div class="circle text-white" style="background-color: rgb(49, 163, 138);">
            <h5 class="text-center ">
              Watch
            </h5>
          </div>
        </a>
        <a href="ProdukAirPods/gen2.php" class="text-decoration-none">
          <div class="circle text-white" style="background-color: rgb(102, 99, 238);">
            <h5 class="text-center ">
              AirPods
            </h5>
          </div>
        </a>
        <h5 class="text-secondary">Bagi banyak orang, Apple bukan sekadar merek — tapi simbol keandalan, kreativitas, dan kemajuan teknologi.</h5>
      </div>
    </div>
  </section>

  <!-- News -->
  <section id="hal3" class="News py-5">
    <div class="container">
      <h1 class="text-uppercase text-muted mb-2">Blog</h1>
      <h2 class="mb-4 fw-bold">Berita Terkini</h2>
      <div class="row g-4">
        <!-- Product Card -->
        <div class="col-md-4 col-lg-3 position-relative">
          <a href="https://www.apple.com/id/newsroom/2025/03/iphone-16-lineup-available-from-11-April/" class="text-decoration-none">
            <div class="card">
              <span class="label-sale">Top</span>
              <img src="image/BeritaIphone16.jpg" class="card-img-top" alt="Scotch" />
              <div class="card-body text-center">
                <h5 class="card-title">Apple Product</h5>
                <p class="card-text">Jajaran iPhone 16 akan tersedia mulai 11 April!</p>
              </div>
              <p class="card-text p-2">26 Maret 2025</p>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-lg-3 position-relative">
          <a href="https://www.apple.com/id/newsroom/2025/04/apple-surpasses-60-percent-reduction-in-global-greenhouse-gas-emissions/" class="text-decoration-none">
            <div class="card">
              <span class="label-new">New</span>
              <img src="image/BeritaEmisi.jpg" class="card-img-top" alt="Spritz" style="height: 172px;" />
              <div class="card-body text-center">
                <h5 class="card-title">Apple Inovation</h5>
                <p class="card-text">Apple menunjukkan kemajuan dalam bidang lingkungan!</p>
              </div>
              <p class="card-text p-2">16 April 2025</p>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-lg-3 position-relative">
          <a href="https://www.apple.com/id/newsroom/2025/04/what-the-clash-joins-apple-arcade-in-may-among-five-new-games/" class="text-decoration-none">
            <div class="card">
              <span class="label-new">New</span>
              <img src="image/BeritaGame.jpg" class="card-img-top" alt="Manhatten" />
              <div class="card-body text-center">
                <h5 class="card-title">Apple Arcade</h5>
                <p class="card-text">Lima game baru hadir di Apple Arcade pada bulan Mei!</p>
              </div>
              <p class="card-text p-2">8 April 2025</p>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-lg-3 position-relative">
          <a href="https://www.apple.com/id/newsroom/2025/05/universal-music-group-and-apple-music-announce-sound-therapy/" class="text-decoration-none">
            <div class="card">
              <span class="label-new">New</span>
              <img src="image/BeritaSoundMusic.jpg" class="card-img-top" alt="French 75" />
              <div class="card-body text-center">
                <h5 class="card-title">Apple Inovation</h5>
                <p class="card-text">UMG dan Apple Music mengumumkan Sound Therapy!</p>
              </div>
              <p class="card-text p-2">13 Mei 2025</p>
            </div>
          </a>
        </div>
      </div>
      <div class="text-center mt-4">
        <a href="https://www.apple.com/id/newsroom/" class="text-decoration-none"><button class="btn btn-shop px-4">View All</button></a>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-dark text-white py-3">
    <div class="container footer-social">
      <div>
        <p>&copy; 2023 Your Company. All rights reserved.</p>
      </div>
      <div class="footer-right">
        <p class="fw-bold mb-1">Follow us:</p>
        <div class="d-flex gap-4">
          <div class="social-column">
            <span>Creator 1</span>
            <a href="https://www.instagram.com/shofa_azmy27?igsh=ZG55NjM1M3duYmJo"><i class="bi bi-instagram"></i> Instagram</a>
            <a href="https://github.com/Shofa-58"><i class="bi bi-github"></i> GitHub</a>
          </div>
          <div class="social-column">
            <span>Creator 2</span>
            <a href="https://www.instagram.com/trkvsltk_?igsh=MW9teWNtOHZqNDYydw=="><i class="bi bi-instagram"></i> Instagram</a>
            <a href="https://github.com/Fadiyah-Yeah"><i class="bi bi-github"></i> GitHub</a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Script Bootstrap & AOS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

  <script>
    let lastScrollTop = 0;
    window.addEventListener('scroll', function() {
      let currentScroll = window.pageYOffset || document.documentElement.scrollTop;
      const sections = document.querySelectorAll('section');
      sections.forEach(section => {
        if (section.getBoundingClientRect().top < window.innerHeight && section.getBoundingClientRect().bottom > 0) {
          if (currentScroll > lastScrollTop) {
            section.classList.add('aos-up');
            section.classList.remove('aos-down');
          } else {
            section.classList.add('aos-down');
            section.classList.remove('aos-up');
          }
          section.classList.add('aos-animate');
        } else {
          section.classList.remove('aos-animate');
        }
      });
      lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
    }, false);
  </script>
  <script>
    function toggleViewAll() {
      const container = document.getElementById('productCards');
      const btn = document.getElementById('btnViewAll');
      container.classList.toggle('show-all');

      if (container.classList.contains('show-all')) {
        btn.textContent = 'Collapse';
        btn.classList.add('btn-expand');
      } else {
        btn.textContent = 'View All';
        btn.classList.remove('btn-expand');
      }
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
</body>

</html>