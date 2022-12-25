<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sistem Pakar Penyakit Lumpuh Bebek</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="./assets/img/favicon.png" rel="icon">
  <link href="./assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="./assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link href="./assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="./assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="./assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="./assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="./assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="./assets/css/style.css" rel="stylesheet">

  <style>
    .konsul {
      background-color: #4154f1;
      border: none;
      color: white;
      padding: 15px 32px;
      border-radius: 3px;
    }

    .konsul:hover {
      background-color: #717ff5;
      border: none;
      color: white;
      padding: 15px 32px;
      border-radius: 3px;
    }

    .adm {
      color: white;
    }

    .adm1 {
      color: white;
    }

    .adm1:hover {
      color: #717ff5;
    }

    .datang {
      color: #4154f1;
    }
  </style>
</head>

<body>

  <!-- <h1 class="text-center mt-5">Ini halaman Awal Sistem Pakar</h1> -->

  <!-- <a href="./admin/login.php" type="button" class="btn btn-primary btn-sm ms-3">Login Admin</a> <br> <br> -->
  <!-- <a href="./konsultasi.php" type="button" class="btn btn-primary btn-sm ms-3">Mulai konsultasi</a> -->

  <section>
    <!-- Awal Container -->
    <div class="container-fluid">
      <!-- Awal Navbar -->
      <nav class="navbar navbar-expand-lg" style="background-color: #4154f1;">
        <div class="container">
          <a class="navbar-brand text-white fw-bold">Sistem Pakar Penyakit Lumpuh Bebek</a>
          <a class="nav-link active adm1 p-2" aria-current="page" href="./index.php"><i class="bi bi-house-fill"></i> Home</a>
          <a class="nav-link active adm1 p-2 me-auto" aria-current="page" href="./daftarpenyakit.php"><i class="bi bi-journal-text"></i> Daftar Penyakit</a>
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <!-- <a class="nav-link active text-white p-2" aria-current="page" href="#"><i class="bi bi-house-door-fill"></i> Home</a>
            <a class="nav-link active text-white p-2" aria-current="page" href="./daftarpenyakit.php"><i class="bi bi-pencil-fill"></i> Daftar Penyakit</a> -->
            <a href="./admin/login.php" type="submit" class=" adm me-md-2"><i class="bi bi-box-arrow-in-right"></i>
              Login Admin</a>
            <!-- <a href="./admin/login.php" type="submit" class="btn btn-light me-md-2"><i class="bi bi-box-arrow-in-right"></i>
              Login Admin</a> -->
          </div>
        </div>
      </nav>
      <!-- Akhir Navbar -->
      <br> <br> <br> <br> <br> <br>

      <!-- Jumbotron -->
      <div class="bg-light p-5 mb-4 rounded">
        <!-- <img src="" class="float-end me-5" width="400px"> -->
        <div class="container-fluid ms-5">
          <h1 class="fw-bold datang">Selamat Datang</h1>
          <!-- <h3 class="fw-bold">Sistem Pakar penyakit Lumpuh Bebek <br> dengan Metode Dempster Shafer</h3> -->
          <p>Sistem Pakar penyakit Lumpuh Bebek ini adalah sebuah sistem yang digunakan <br> untuk mendiagnosa awal jenis penyakit yang menyerang pada bebek berdasarkan <br> gejala yang dialami bebek. Proses diagnosa dengan menentukan gejala-gejala yang <br> terjadi pada bebek, dengan menggunakan metode Dempster Shafer maka sistem dapat <br> memberikan keputusan tentang hasil diagnosa awal.</p>
          <a href="./konsultasi.php" type="button" class="konsul">Mulai Konsultasi</a>
        </div>
      </div>
      <!-- Akhir jumbotron -->
    </div>
    <!-- Akhir Container -->
  </section>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>