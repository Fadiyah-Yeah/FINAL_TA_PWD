<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Landing Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    .navbar {
      background-color: #042440;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 1000;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .navbar .nav-link,
    .navbar .navbar-brand {
      color: white;
    }

    .navbar .nav-link:hover,
    .navbar .navbar-brand:hover {
      color: #ffc107;
    }

    body {
      padding-top: 70px;
      font-family: 'Segoe UI', sans-serif;
      background-color: rgba(255, 255, 255, 0.2);
      background: linear-gradient(-45deg, #2F4156, #567C8D, #C8D9E6, #F5EFEB, #FFFFFF);
      justify-content: center;
      align-items: center;
    }

    section {
      height: 100vh;
      padding: 60px 20px;
    }

    .card {
      margin-right: auto;
      margin-left: auto;
      width: 65%;
      box-shadow: 0 15px 25px rgba(129, 124, 124, 0.2);
      border-radius: 20px;
      backdrop-filter: blur(14px);
      background-color: rgba(255, 255, 255, 0.2);
      padding: 0%;
      text-align: justify;
    }

    /* Tambahan CSS khusus untuk #hal1 (Home) */
    #hal1 {
      /* background: linear-gradient(135deg, #2F4156 0%, #567C8D 50%, #C8D9E6 100%);
  color: #f0e6d2;  */
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 60px 20px;
      /* box-shadow: inset 0 0 100px rgba(0,0,0,0.2); */
    }

    #hal1 h1 {
      font-size: 3rem;
      font-weight: 900;
      /* color: #ffc107; */
      text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
      margin-bottom: 0.5rem;
    }

    #hal1 p {
      font-size: 1.3rem;
      max-width: 700px;
      margin: 0 auto 2rem;
      /* color: #f0e6d2; */
      text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
      line-height: 1.6;
    }

    #hal1 .btn-primary {
      background-color: #ffc107;
      border-color: #ffc107;
      padding: 0.75rem 2.5rem;
      font-size: 1.2rem;
      font-weight: 600;
      transition: background-color 0.3s ease;
      box-shadow: 0 8px 15px rgba(255, 193, 7, 0.4);
    }

    #hal1 .btn-primary:hover {
      background-color: #e0a800;
      border-color: #e0a800;
      box-shadow: 0 12px 20px rgba(224, 168, 0, 0.6);
    }

    #hal1 .apple-icon {
      font-size: 4rem;
      margin-bottom: 1rem;
      color: #ffc107;
      text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
    }

    #hal2 {
      /* background-color: #f5f7fa; Warna background cerah tapi lembut */
      color: #042440;
      /* Warna teks biru tua */
      padding: 60px 20px;
    }

    #hal2 h1 {
      font-weight: 900;
      font-size: 2.8rem;
      margin-bottom: 1rem;
      text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
    }

    #hal2 h5 {
      font-size: 1.2rem;
      line-height: 1.6;
      margin-bottom: 2.5rem;
      color: #1a2e42;
      text-shadow: 0 1px 2px rgba(255, 255, 255, 0.8);
    }

    #hal2 .card {
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      background-color: rgba(255, 255, 255, 0.85);
    }

    #hal2 .card:hover {
      transform: translateY(-10px);
      box-shadow: 0 16px 30px rgba(0, 0, 0, 0.15);
    }

    #hal2 .card-img-top {
      border-top-left-radius: 15px;
      border-top-right-radius: 15px;
      height: 160px;
      object-fit: cover;
    }

    #hal2 .btn-primary.btn-sm {
      background-color: #ffc107;
      border-color: #ffc107;
      font-weight: 600;
      transition: background-color 0.3s ease;
    }

    #hal2 .btn-primary.btn-sm:hover {
      background-color: #e0a800;
      border-color: #e0a800;
    }

    #hal4 {
      /* background-color: #f0f4f8; Warna background lembut */
      color: #042440;
      padding: 60px 20px;
    }

    #hal4 h1 {
      font-weight: 900;
      font-size: 2.8rem;
      margin-bottom: 2.5rem;
      color: #042440;
      text-shadow: 0 1px 3px rgba(255, 255, 255, 0.9);
    }

    .creator-card {
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 20px;
      padding: 25px;
      box-shadow: 0 15px 30px rgba(129, 124, 124, 0.15);
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .creator-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 25px 45px rgba(129, 124, 124, 0.3);
    }

    .fixed-size-img {
      width: 120px;
      height: 120px;
      object-fit: cover;
      border-radius: 50%;
      margin-bottom: 15px;
      border: 3px solid #ffc107;
      box-shadow: 0 5px 15px rgba(255, 193, 7, 0.5);
    }

    #hal4 h3 {
      font-weight: 700;
      color: #042440;
      margin-bottom: 5px;
    }

    #hal4 h4 {
      font-weight: 500;
      color: #567C8D;
      margin-bottom: 0;
    }


    .fixed-size-img {
      width: 3cm;
      height: 3cm;
      object-fit: cover;
      border-radius: 50%;
    }

    .creator-card {
      background-color: rgba(255, 255, 255, 0.2);
      border-radius: 20px;
      padding: 20px;
      box-shadow: 0 15px 25px rgba(129, 124, 124, 0.2);
      text-align: center;
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
          <li class="nav-item"><a class="nav-link" href="Beranda.php">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="Beranda.php #hal3">Blog</a></li>
          <li class="nav-item"><a class="nav-link" href="Homepage.php #hal4">About</a></li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="LoginAkun.php"><i class="bi bi-people-fill"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <!-- Halaman 1 -->
  <section id="hal1" class="hal1 d-flex align-items-center" data-aos="fade-up">
    <div class="container text-center">
      <i class="bi bi-apple apple-icon"></i> <!-- Icon Apple dari Bootstrap Icons -->
      <h1><b>"TALK About APPLE With AppleTalk"</b></h1>
      <p>
        AppleTalk menyajikan ulasan mendalam mengenai produk Apple, mulai dari spesifikasi hingga fitur yang ditawarkan.
        Kami juga memberikan berita terbaru, tips penggunaan, serta rekomendasi terbaik untuk Anda yang menggemari teknologi Apple.
      </p>
      <p>
        Bergabunglah dengan komunitas kami dan dapatkan informasi terpercaya agar Anda tetap update dengan dunia Apple.
      </p>
      <a href="#hal2" class="btn btn-primary">Let's Get Started</a>
    </div>
  </section>


  <!-- Halaman 2 -->
  <br><br>
  <section id="hal2" class="hal2 text-black py-5" data-aos="fade-right">
    <div class="row align-items-center">
      <div class="col-12 mb-4 text-center">
        <h1 class="text-lg"><b>WHAT WE DO</b></h1>
        <h5>
          AppleTalk memberikan ulasan mendalam dan objektif tentang produk-produk Apple.
          Kami menyajikan informasi berdasarkan referensi terpercaya yang dapat membantu Anda memahami fitur, performa, serta perkembangan teknologi Apple secara komprehensif.
        </h5>
      </div>
    </div>

    <!-- Baris baru: Card berada di bawah teks -->
    <div class="row g-4 justify-content-center">
      <div class="col-6 col-md-4 d-flex justify-content-center">
        <div class="card" style="width: 14rem;">
          <img src="image/LihatReview.png" class="card-img-top" alt="Review">
          <div class="card-body">
            <h5 class="card-title">Review</h5>
            <p class="card-text">Ulasan mendalam seputar keunggulan dan kelemahan produk Apple.</p>
            <a href="ProdukIphone/ReviewIphone16pro.php" class="btn btn-primary btn-sm">Lihat Review</a>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-4 d-flex justify-content-center">
        <div class="card" style="width: 14rem;">
          <img src="image/BacaBerita.png" class="card-img-top" alt="News">
          <div class="card-body">
            <h5 class="card-title">News</h5>
            <p class="card-text">Informasi terkini dan update terbaru dari dunia Apple.</p>
            <a href="Beranda.php #hal3" class="btn btn-primary btn-sm">Baca Berita</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Halaman 4 -->
  <section id="hal4" class="hal4 text-black py-5" data-aos="fade-left">
    <div class="container">
      <h1 class="text-center">CREATOR</h1>
      <div class="row g-4 justify-content-center mt-4">
        <div class="col-12 col-md-5">
          <div class="creator-card h-100 d-flex flex-column align-items-center">
            <img src="image//Creator1.jpg" class="fixed-size-img mb-3" alt="Creator 1">
            <h3>M.Shofa Azmy</h3>
            <h4>124240058</h4>
          </div>
        </div>
        <div class="col-12 col-md-5">
          <div class="creator-card h-100 d-flex flex-column align-items-center">
            <img src="image/Creator2.jpg" class="fixed-size-img mb-3" alt="Creator 2">
            <h3>Fadiyah C.T</h3>
            <h4>124240041</h4>
          </div>
        </div>
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
    AOS.init({
      duration: 1200,
      once: true
    });

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
</body>

</html>