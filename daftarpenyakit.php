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
    .table {
      border-radius: 40px;
      overflow: hidden;
      font-family: "Poppins", sans-serif;
      border-radius: 8px;
      overflow: hidden;
    }

    .warning {
      color: #daa812;
    }
  </style>
</head>

<body>
  <?php
  include './admin/koneksi.php';
  // mengaktifkan session
  session_start();
  ?>

  <section>
    <div class="card mt-4 col-md-10 mx-auto">
      <div class="card-body">
        <div class="mt-4">
          <a href="./index.php" type="button" class="btn btn-outline-danger btn-sm ms-3"><i class="bi bi-box-arrow-left"></i> Kembali</a>
        </div>
        <div class="table-responsive mt-4">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th><b>No</b></th>
                <th class="text-center"><strong>Deskripsi Penyakit</strong></th>
              </tr>
            </thead>
            <?php
            include "./admin/koneksi.php";
            $sql = "SELECT * FROM tb_penyakit ORDER BY kdpenyakit";
            $qry = mysqli_query($koneksi, $sql) or die("SQL Error" . mysqli_error($koneksi));
            $no = 0;
            while ($data = mysqli_fetch_array($qry)) {
              $no++;
            ?>
              <tbody>
                <tr>
                  <td>
                    <div align="center"><?php echo $no; ?></div>
                  </td>
                  <td>
                    <div align="justify">
                      <div align="left"><?php echo "<h4><em>$data[nama_penyakit]</em></h4>"; ?></div>
                      <ul>
                        <li><label>Definisi Penyakit :</label>
                          <p class="text-info"><?php echo "$data[definisi]"; ?></p>
                        </li>
                        <li><label>Saran :</label>
                          <p class="warning"><?php echo "$data[solusi]"; ?></p>
                        </li>
                      </ul>

                  </td>
                </tr>
              </tbody>
            <?php
            }
            ?>
          </table>
        </div>
      </div>
    </div>
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