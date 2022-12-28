<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit Nilai Belief</title>
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">

  <style>
    .submit {
      background-color: #4154f1;
      border: none;
      color: white;
      padding: 5px 20px;
      border-radius: 3px;
    }

    .submit:hover {
      background-color: #717ff5;
      border: none;
      color: white;
      padding: 5px 20px;
      border-radius: 3px;
    }

    .batal {
      background-color: #dc3545;
      border: none;
      color: white;
      padding: 5px 12px;
      border-radius: 3px;
    }

    .batal:hover {
      background-color: #d76873;
      border: none;
      color: white;
      padding: 5px 12px;
      border-radius: 3px;
    }
  </style>
</head>

<body>
  <section>
    <div class="row mt-5 mx-auto">
      <div class="col-md-8 mt-2 mx-auto">
        <h3 class="text-center mb-4">Edit Nilai Belief Penyakit Lumpuh Bebek</h3>
        <?php
        include "../koneksi.php";
        $kd_gejala = $_GET['id_gejala'];
        $kdpenyakit = $_GET['id_penyakit'];
        $queryP = mysqli_query($koneksi, "SELECT * FROM tb_penyakit WHERE id='$kdpenyakit' ");
        $dataP = mysqli_fetch_array($queryP);
        echo "<b>Nama Penyakit = " . $dataP['kdpenyakit'] . " | " . $dataP['nama_penyakit'];
        ?></b>
        <form id="form1" name="form1" method="post" action="./updatebelief.php?id_penyakit=<?php echo $_GET['id_penyakit']; ?>&id_gejala=<?php echo $_GET['id_gejala']; ?>" enctype="multipart/form-data">
          <div class="table-responsive">
            <table class="table table-striped table-bordered mt-2">
              <thead>
                <tr>
                  <th width='116px' class="text-center">Kode Gejala</th>
                  <th class="text-center">Nama Gejala</th>
                  <th width='10px' class="text-center">Belief</th>
                  <th width='250px' class="text-center">Update</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include "../koneksi.php";
                $query = mysqli_query($koneksi, " SELECT * FROM tb_gejala WHERE id='$_GET[id_gejala]' ") or die(mysqli_error($koneksi));
                while ($row = mysqli_fetch_array($query)) {
                ?>
                  <tr>
                    <td class="text-center"><?php echo $row['kdgejala']; ?></td>
                    <td><?php echo $row['gejala']; ?>
                    <td class="text-center"><input name="updatebelief" type="text" size="2" value="<?php echo $_GET['belief']; ?>"></td>
                    <td class="text-center"><input class="submit" type="submit" value="Update Nilai">
                      <a href="./rules.php" class="ms-2 batal">Batal</a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
        </form>
      </div>
    </div>
    </div>
  </section>

  <!-- Vendor JS Files -->
  <script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../../assets/vendor/quill/quill.min.js"></script>
  <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>

</body>

</html>