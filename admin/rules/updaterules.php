<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit Data Rules</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../assets/img/favicon.png" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">

  <style>
    .ok {
      background-color: #4154f1;
      border: none;
      color: white;
      padding: 5px 20px;
      border-radius: 3px;
    }

    .ok:hover {
      background-color: #717ff5;
      border: none;
      color: white;
      padding: 5px 20px;
      border-radius: 3px;
    }
  </style>

</head>

<body>
  <div>
    <?php
    include "../koneksi.php";
    $kd_penyakit = $_POST['daftarpenyakit'];

    // ambil semua data rule yang belum diupdate
    $querySelect = "SELECT * FROM tb_rules WHERE id_penyakit='$kd_penyakit' AND id_gejala NOT IN (" . implode(',', $_POST['gejala']) . ")";
    $resultSelect = mysqli_query($koneksi, $querySelect);
    $dataRule = array();
    while ($row = mysqli_fetch_array($resultSelect)) {
      $dataRule[] = array(
        'id_penyakit' => $row['id_penyakit'],
        'id_gejala' => $row['id_gejala'],
        'belief' => $row['belief']
      );
    }

    // // hapus semua data rule yang terkait dengan id_penyakit yang sesuai
    // $queryDel = mysqli_query($koneksi, "DELETE FROM tb_rules WHERE id_penyakit='$kd_penyakit' ");

    // hapus data yang tidak terdapat di dalam array yang didapat dari form dengan metode POST
    foreach ($dataRule as $rule) {
      $queryDel = "DELETE FROM tb_rules WHERE id_penyakit='{$rule['id_penyakit']}' AND id_gejala='{$rule['id_gejala']}'";
      $resultDel = mysqli_query($koneksi, $queryDel);
    }

    if (isset($_POST['gejala'])) {
      $seleksi   = htmlentities(implode(',', $_POST['gejala']));
    }
    $data = $seleksi;

    $barisinputan = $data;
    $barisinputan = explode(",", $barisinputan);

    for ($mulai = 0; $mulai < count($barisinputan); $mulai++) {
      $inputan = $barisinputan[$mulai];

      // cek apakah data gejala terkait telah diubah atau tidak
      $query = "SELECT * FROM tb_rules WHERE id_penyakit='$kd_penyakit' AND id_gejala='$inputan'";
      $result = mysqli_query($koneksi, $query);
      $row = mysqli_fetch_array($result);

      // jika data gejala terkait belum ada, tambahkan data baru dengan nilai belief 0
      if (!$row) {
        $sql = "INSERT INTO tb_rules (id_penyakit,id_gejala,belief) VALUES ('$kd_penyakit','$inputan','0')";
      } else {
        // jika data gejala terkait sudah ada, gunakan query UPDATE untuk mengubah nilai belief saja
        $sql = "UPDATE tb_rules SET belief='{$row['belief']}' WHERE id_penyakit='$kd_penyakit' AND id_gejala='$inputan'";
      }
      $query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
    }
    echo "<br><br><br>";
    echo "<center><strong>Data Rule Berhasil di Update</strong></center>";
    echo "<br>";
    echo "<center><a class='ok' href='./rules.php'>OK</a></center>";
    ?>
  </div>

  <!-- Vendor JS Files -->
  <script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../../assets/vendor/quill/quill.min.js"></script>
  <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>
  <script src="../../assets/js/jquery.min.js"></script>
  <script src="../../assets/js/jquery.truncatable.js"></script>

  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>

</body>

</html>