<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="description">
  <meta content="" name="keywords">
  <title>Edit Data Penyakit</title>
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>
  <?php
  include "../koneksi.php";

  $kdpenyakit = $_POST['kdpenyakit'];
  $penyakit = $_POST['edit_penyakit'];
  $definisi = $_POST['edit_definisi'];
  $solusi = $_POST['edit_solusi'];
  $sql = "UPDATE tb_penyakit SET nama_penyakit='$penyakit',definisi='$definisi', solusi='$solusi' WHERE id='$kdpenyakit'";
  $result = mysqli_query($koneksi, $sql) or die("SQL Error" . mysqli_error($koneksi));

  if ($result) {
    echo "<table style='margin-top:150px;' align='center'><tr><td>";
    echo "<div style='width:500px; height:50px auto; border:1px solid #CCC; font-family:Poppins; padding:3px 3px 3px 3px;'>";
    echo "<center>terima kasih, data berhasil diubah</center><br>";
    echo "<center><a href='./penyakit.php' class='btn btn-primary btn-sm'>OK</a></center>";
    echo "</div>";
    echo "</td></tr></table>";
  } else {
    echo "<center><font color='#ff0000'><strong>Maaf gagal mengupdate data</strong></font></center><br>";
    echo "<center><a href='./penyakit.php' class='btn btn-danger btn-sm'>Kembali</a></center>";
  }
  ?>
</body>

</html>