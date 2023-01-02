<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit Rule</title>
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
    .updaterule {
      background-color: #4154f1;
      border: none;
      color: white;
      padding: 5px 20px;
      border-radius: 3px;
    }

    .updaterule:hover {
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
      padding: 5px 20px;
      border-radius: 3px;
    }

    .batal:hover {
      background-color: #d76873;
      border: none;
      color: white;
      padding: 5px 20px;
      border-radius: 3px;
    }

    .cekbok {
      cursor: pointer;
      width: 18px;
      height: 18px;
      margin-right: 10px;
      margin-top: 5px;
    }
  </style>

</head>

<body>
  <section>
    <form id="form1" name="form1" method="post" action="./updaterules.php" enctype="multipart/form-data">
      <div class="mt-5">
        <table width="700" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#ffffff">
          <tr>
            <td style="background:linear-gradient(to top, #0CC, #09C);"><strong>Kode Rule : <?php echo $_GET['kdpenyakit']; ?></strong></td>
            <td class=" ps-5" style="background:linear-gradient(to top, #0CC, #09C);"><strong class="ps-2">&nbsp;Edit Data Rule</strong></td>
          </tr>
          <tr class="mt-4">
            <td colspan="2">
              <ul style="list-style:none;" class="mt-3">
                <?php
                include "../koneksi.php";
                $query = mysqli_query($koneksi, "SELECT * FROM tb_gejala ORDER BY id ASC") or die("Query Error..!" . mysqli_error($koneksi));
                while ($row = mysqli_fetch_array($query)) {
                  //mencari data gejala yang di edit
                  $kd_penyakit = $_GET['kdpenyakit'];
                  $kd_gejala = $row['id'];
                  $kueri = mysqli_query($koneksi, "SELECT * FROM tb_rules WHERE id_penyakit='$kd_penyakit' AND id_gejala='$kd_gejala' ORDER BY id_gejala desc ");
                  $edit = mysqli_fetch_array($kueri);
                  if ($edit) {
                    $checked = explode(', ', $edit['id_gejala']);
                  } else {
                    $checked = [];
                  }
                  //end data gejala
                  echo '<li>';
                  echo '<input class="cekbok" type="checkbox" name="gejala[]" id="gejala' . $row['id'] . '" value="' . $row['id'] . '" ' . (in_array($row['id'], $checked) ? 'checked' : '') . '>';
                  echo '<label style="cursor: pointer;" for="gejala' . $row['id'] . '">' . $row['kdgejala'] . '<strong>&nbsp; |&nbsp;&nbsp;</strong>' . $row['gejala'] . '</label>';
                  echo '</li>';
                } ?>
              </ul>

              <strong>
                <div class="daftarpenyakit">
                  <?php
                  $sqlp = "SELECT * FROM tb_penyakit WHERE id='$kd_penyakit' ";
                  $qryp = mysqli_query($koneksi, $sqlp) or die("SQL Error: " . mysqli_error($koneksi));
                  while ($datap = mysqli_fetch_array($qryp)) {
                    echo "Penyakit = $datap[kdpenyakit]&nbsp;|&nbsp;$datap[nama_penyakit]";
                  }
                  ?><input type="hidden" name="daftarpenyakit" value="<?php echo $_GET['kdpenyakit']; ?>" /></div>
              </strong>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>
              <div class=" mt-3">
                <a href="./rules.php"><input class="updaterule" type="submit" name="Submit" value="Update Rule" />
                  <input class="batal" type="button" name="batal" id="batal" value="Batal" /></a>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </form>
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