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
    .gejala {
      color: blue;
      /* border: 1px solid red; */
      padding: 5px;
      display: flex;
      justify-content: center;
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
    <div class="card mt-4 col-md-7 mx-auto">
      <div class="mt-4">
        <a href="./index.php" type="button" class="btn btn-outline-danger btn-sm ms-3"><i class="bi bi-box-arrow-left"></i> Kembali</a>
      </div>
      <h4 class="text-dark d-flex justify-content-center mt-4">Proses Konsultasi Penyakit Lumpuh Bebek</h4>
      <div class="card-body">
        <div class="bg-info rounded-1">
          <h3 class="mt-4 ms-2 p-1">Petunjuk Pengisian</h3>
          <p class="ms-3 me-2 pb-2">Proses konsultasi terdiri dari 15 pertanyaan. Selanjutnya, anda diminta untuk menjawab dengan cara klik opsi gejalanya apabila gejala tersebut sesuai dengan kondisi yang terjadi. Bacalah dan jawab setiap gejala dengan teliti dan seksama.</p>
        </div>

        <h5 class="text-secondary text-center mt-4">Pilih Gejala</h5>
        <?php
        $koneksi = mysqli_connect("localhost", "root", "", "dbpakar");

        // Check connection
        if (mysqli_connect_errno()) {
          echo "Koneksi database gagal : " . mysqli_connect_error();
        }
        ?>
        <form action="./hasilkonsultasi.php" method="POST">
          <?php
          $sqli = "SELECT * FROM tb_gejala";
          // $result = mysqli_query($koneksi, $sqli);
          $result = $koneksi->query($sqli);
          if (isset($_POST['bukti'])) {
            if (count($_POST['bukti']) < 2) {
              echo "<p class=\"gejala\">Mohon maaf anda harus pilih minimal 2 gejala</p>";
            } elseif (count($_POST['bukti']) <= 0) {
              echo "<p class=\"gejala\">Anda harus memilih gejala terlebih dahulu</p>";
            }
          }

          // mengambil baris berikutnya menjadi objek
          while ($row = $result->fetch_object()) {
            echo "<hr> ";
            echo "<label for='checkbox" . $row->id . "' style='cursor: pointer;'>";
            echo "<input style='cursor: pointer; width:20px;height:20px;' type='checkbox' id='checkbox" . $row->id . "' name='bukti[]' value='" . $row->id . "'";
            if (isset($_POST['bukti'])) {
              echo (in_array($row->id, $_POST['bukti']) ? " checked" : "");
            }
            echo ">&ensp; " . $row->id . ". " . $row->gejala . "</label><br>";
          }
          ?>
          <div class="mt-4">
            <button class="btn btn-outline-success btn-md" onclick="return validateForm();" style="width: 130px; height: 40px; cursor: pointer; box-shadow: 0 0 10px rgb(255, 250, 240);"><i class="bi bi-check-lg"></i> Diagnosa</button>
          </div>
        </form>
        <script>
          function validateForm() {
            var boxes = document.getElementsByName("bukti[]");
            var checkboxesChecked = 0;
            for (var i = 0; i < boxes.length; i++) {
              if (boxes[i].checked) {
                checkboxesChecked++;
              }
            }
            if (checkboxesChecked < 2) {
              alert("Maaf, Anda harus memilih minimal 2 gejala");
              return false;
            }
          }
        </script>
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