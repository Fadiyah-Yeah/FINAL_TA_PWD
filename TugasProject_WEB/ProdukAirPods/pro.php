<?php
include "KoneksiDatabase.php";
session_start();
//!true = false;
//!false = true;
if (!isset($_SESSION["login"])) {
  header("Location: LoginAkun.php");
  exit;
}
// Ambil username dari LoginAkun
$username = $_SESSION['username'];

// Di deklarasi tiap page sesuai produk
$produk = "AirPods Pro (Generasi Ke-2)";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $komentar = $_POST["komentar"];

    if (!empty($komentar)) {
        $komentar = mysqli_real_escape_string($conn, $komentar);

        $query = "INSERT INTO coment (username, produk, komentar) VALUES ('$username', '$produk', '$komentar')";
        if(mysqli_query($conn, $query)){
            echo "<script>alert('Komentar berhasil ditambahkan');</script>";
            header("Location: ReviewProduk.php");
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Review Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    function navigateToProduct(dropdown) {
      const select = document.getElementById(dropdown);
      const url = dropdown.value;
      if (url) {
        window.location.href = url;
      }
    }
  </script>

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

    .dropdown-menu {
      background-color: #042440;
    }

    .dropdown-item {
      color: white;
    }
 
    body {
      padding-top: 70px;
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
       background: linear-gradient(135deg, #f3eaff, #ffeede, #fff8f0);
    }

    .hero {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 80px 10%;
      background: linear-gradient(135deg, #ebf4f8, #dfe9f3);
      border-radius: 0 0 40px 40px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .hero-text h1 {
      font-size: 52px;
      font-weight: 800;
      color: #042440;
      margin-bottom: 20px;
      transition: 0.3s ease-in-out;
    }

    .hero-text h1:hover {
      color: #007bff;
    }

    .hero-text p {
      font-size: 22px;
      color: #333;
      margin-top: 10px;
    }

    .hero .dropdown-toggle {
      color: #042440;
      font-size: 24px;
      font-weight: 600;
      background-color: transparent;
      border: none;
      padding: 0;
    }

    .hero img {
      width: 100%;
      max-width: 400px;
      transition: transform 0.3s ease;
    }

    .hero img:hover {
      transform: scale(1.05);
    }

    @media (max-width: 768px) {
      .hero {
        flex-direction: column;
        text-align: center;
        padding: 60px 20px;
      }

      .hero img {
        margin-top: 30px;
      }

      .hero-text h1 {
        font-size: 36px;
      }

      .hero-text p {
        font-size: 18px;
      }
    }

    section {
      min-height: 100vh;
      padding: 20px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .section-hero,
    .section-fitur {
      /* background-color: #f8f8f7; */
      padding: 60px 10%;
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
    }

    .card {
      background: white;
      padding: 20px;
      border-radius: 20px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
      text-align: center;
    }


    .parent {
      display: grid;
      grid-template-columns: repeat(6, 1fr);
      grid-template-rows: repeat(10, minmax(20px, auto));
      gap: 16px;
      padding: 20px;
    }

    .div1 {
      grid-column: span 3 / span 3;
    }

    .div3 {
      grid-column: span 3 / span 3;
      grid-row: span 5 / span 5;
      grid-column-start: 1;
      grid-row-start: 2;
    }

    .div4 {
      grid-column: span 3 / span 3;
      grid-column-start: 4;
      grid-row-start: 1;
    }

    .div5 {
      grid-column: span 3 / span 3;
      grid-row: span 5 / span 5;
      grid-column-start: 4;
      grid-row-start: 2;
    }

    .div6 {
      grid-column: span 6 / span 6;
      grid-row-start: 9;
    }

    .div7 {
      grid-column: span 6 / span 6;
      grid-row-start: 10;
    }

    .section-spesifikasi {
      /* background-color: #fdfbfb; */
      padding: 40px;
      color: #2F4156;
      font-family: 'Segoe UI', sans-serif;
    }

    .div1,
    .div4,
    .div6 {
      background-color: #FFFFFF;
      padding: 24px;
      border-radius: 16px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .div3,
    .div5 {
      grid-row: span 5 / span 5;
      background-color: #C8D9E6;
      padding: 24px;
      border-radius: 16px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .div7 {
      grid-column: span 6;
      text-align: center;
      padding: 20px;
      background-color: #567C8D;
      color: #FFFFFF;
      border-radius: 12px;
    }

    .div1 h1,
    .div4 h1,
    .div6 h1 {
      color: #2F4156;
      font-size: 32px;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .table-table th {
      background-color: #567C8D;
      color: #FFFFFF;
      font-weight: 600;
      padding: 12px 10px;
      vertical-align: middle;
      text-align: left;
      font-size: 14px;
    }

    .table-table td {
      background-color: #FFFFFF;
      color: #2F4156;
      padding: 12px 10px;
      border-bottom: 1px solid #C8D9E6;
      vertical-align: middle;
      text-align: left;
      font-size: 14px;
    }

    .step,
    .card {
      background-color: #C8D9E6;
      border-radius: 16px;
      padding: 16px;
      color: #2F4156;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
      transition: transform 0.2s ease;
      text-align: justify;
    }

    .step:hover,
    .card:hover {
      transform: translateY(-4px);
      background-color: #567C8D;
      color: #FFFFFF;
    }

    .workflow {
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
      justify-content: center;
    }

    .step {
      flex: 1 1 220px;
      background: linear-gradient(135deg, #e0eafc, #cfdef3);
      padding: 20px;
      border-radius: 20px;
      text-align: center;
    }

    .card p:last-child {
      font-size: 20px;
      color: #f5b301;
      margin-top: 10px;
    }

    .footer-right {
      text-align: right;
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
        <img src="LogoWeb.png" alt="Logo" width="30" height="24">
        AppleTalk
      </a>
      <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="../home/Home.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="Beranda.php">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
          <li class="nav-item"><a class="nav-link" href="../home/Home.php#hal4">About</a></li>
        </ul> 
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="LoginAkun.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="s4">
    <!-- Hero Section -->
    <!-- Bagian hero section yang sudah diperbaiki -->
    <section class="section-hero">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 hero-text">
            <div class="dropdown">
              <button class="btn dropdown-toggle" type="button" id="produkDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <h1>AirPods Pro <br> (Generasi Ke-2)</h1>
              </button>
              <ul class="dropdown-menu" aria-labelledby="produkDropdown">
                <li><a class="dropdown-item" href="max.php">AirPods Max</a></li>
                <li><a class="dropdown-item" href="gen2.php">AirPods (Generasi Ke-2)</a></li>
                <li><a class="dropdown-item" href="pro.php">AirPods Pro (Generasi Ke-2) dengan Casing Pengisian daya MagSafe(USB-c)</a></li>
                <li><a class="dropdown-item" href="gen3.php">AirPods (Generasi Ke-3) dengan Casing Pengisian Daya MagSafe</a></li>
              </ul>
            </div>
            <p><b>Harga: </b>Mulai dari Rp 3.999.000</p>
          </div>
          <div class="col-md-6 text-center">
            <img src="pro.png" alt="4" class="img-fluid">
          </div>
        </div>
      </div>
    </section>

    <!-- Spesifikasi -->
    <section class="section-spesifikasi text-white" id="spesifikasi">

      <div class="parent">
        <div class="div1 text-center">
          <h1>SPESIFIKASI</h1>
        </div>
        <div class="div3 table-responsive">
          <table class="table-table table-sm table-striped">
            <thead>
              <tr>
                <th>Teknologi Audio</th>
                <th>Sensor</th>
                <th>Mikrofon</th>
                <th>chip</th>
                <th>Kontrol</th>
                <th>Ukuran & Berat</th>
                <th>Baterai, Konektivitas & Persyaratan Sistem</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Driver Apple Ekskursi tinggi kustom</td>
                <td>Sensor deteksi kulit</td>
                <td>Mikrifon ganda pembentuk sinyal</td>
                <td>Chip headphone Apple H2</td>
                <td>Tekan satu kali untuk memutar atau menjeda media</td>
                <td>AirPods(Masing-Masing): Tinggi 30,9 mm; Lebar 21,8 mm; Tebal 24,0 mm; Berat 5,3 gram</td>
                <td>Waktu dengar hingga 6 jam, waktu bicara hingga 4,5 jam/td>
              </tr>
              <tr>
                <td>Amplifier rentang dinamis tinggi kustom </td>
                <td>Akselerometer pendeteksi gerak</td>
                <td>Mikrofon hadap dalam</td>
                <td>Chip Apple U1 dalam Casing</td>
                <td>Tekan satu kali untuk menjawab panggilan atau mematikan dan menyalakan suara</td>
                <td>Casing : Tinggi 45,2 mm; Lebar 60,6 mm; Tebal 21,7 mm; Berat 50,8 gram</td>
                <td>Bluetooth 5.3</td>
              </tr>
              <tr>
                <td>Peredam Kebisingan Aktif level pro</td>
                <td>Akselerometer pendeteksi biacara</td>
                <td></td>
                <td></td>
                <td>Tekan dua kali untuk mengakhiri panggilan</td>
                <td></td>
                <td>Model iPhone denga iOs versi terbaru</td>
              </tr>
              <tr>
                <td>Audio Adaptif dan Audio Spasial personal</td>
                <td>Kontrol sentuh</td>
                <td></td>
                <td></td>
                <td>Tekan dua kali untuk melompat maju</td>
                <td></td>
                <td>Dapat menggunakan perangkat lunak lama dan perangkat non Apple, namun dengan fungsi terbatas</td>
              </tr>
              <tr>
                <td>Mode Transparansi, Isolasi suara dan Volume personal</td>
                <td></td>
                <td></td>
                <td></td>
                <td>Tekan tiga kali untuk melompat mundur</td>
                <td></td>
                <td> Dengan casing, wkatu dengar 30 jam, waktu bicara 24 jam</td>
              </tr>
              <tr>
                <td>Kesadaran percakapan</td>
                <td></td>
                <td></td>
                <td></td>
                <td>Tekan dan tahan untuk mengganti mode dengar</td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Sistem lubang udara untuk tekanan merata</td>
                <td></td>
                <td></td>
                <td></td>
                <td>Usap ke atas atau ke bawah untuk mengarur volume</td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="div4 text-center">
          <h1>FITUR</h1>
        </div>
        <div class="div5 table-responsive">
          <table class="table-table table-sm table-striped">
            <tr>
              <th>Kesehatan Pendengaran</th>
              <td>Pengurangan Bunyi Keras, Pemacu Percakapan, Bunyi Latar Belakang</td>
            </tr>
            <tr>
              <th>Ketahanan & AKsesibilitas</th>
              <td>Tahan debu, air dan keringat(IP54), Audio dengar langsung, Level heaphone, akomodasi headphone, peningkat percakapan</td>
            </tr>
            <tr>
              <th>Isi Kotak</th>
              <td>AirPod Pro (Generasi ke-2), casing pengisian daya MagSafe(USB-c), Ear tip silikon, Kabel Pengisian daya USB-C</td>
            </tr>
          </table>
        </div>
        <div class="div6 text-center">
          <h1>KESIMPULAN</h1>
        </div>
        <div class="div7 text-center">
          <p>•	AirPods Pro (Generasi ke-2) dengan Casing Pengisian Daya MagSafe (USB C) menawarkan pengalaman audio premium dengan fitur-fitur canggih seperti Peredam Kebisingan Aktif, Audio Adaptif, dan Audio Spasial Personal. Dengan desain tahan debu, air, dan keringat, serta berbagai fitur kesehatan pendengaran dan aksesibilitas, perangkat ini dirancang untuk memberikan kenyamanan dan kualitas suara terbaik bagi pengguna.</p>
        </div>
      </div>

    </section>

    <?php
    $query = mysqli_query($conn, "SELECT username, komentar FROM coment WHERE produk = '$produk' ORDER BY id DESC");
    
    ?>
    <!-- Coment Section -->
    <section class="section" style="background: #f3f6fa;">
    <h2 class="section-title text-center mb-4">User Reviews</h2>
    <div class="container">
  <div class="row justify-content-center g-4 mb-4">
    <?php while ($row = mysqli_fetch_assoc($query)) { ?>
  <div class="col-12 col-sm-6 col-md-4 col-lg-3">
    <div class="card p-3 shadow-sm h-100">
      <h5 class="fw-bold"><?= ($row["username"]) ?></h5>
      <p class="mb-0"><?= nl2br(($row["komentar"])) ?></p>
    </div>
  </div>
  <?php } ?>
  </div>
  </div>

  <!-- Form Komentar -->
  <div class="container">
    <h4 class="text-center mb-3">Tinggalkan Komentar Anda</h4>
    <form method="POST" action="">
      <div class="mb-3">
        <label for="komentar" class="form-label">Komentar</label>
        <textarea name="komentar" class="form-control" id="komentar" rows="3" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Kirim Komentar</button>
    </form>
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
</body>

</html>
