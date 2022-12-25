<?php
include "../koneksi.php";
$aksi = $_GET['aksi'];
$data_hapus = $_GET['data_hapus'];
// hapus Penyakit
if ($aksi == "gejala") {
  $sql = "DELETE FROM tb_gejala WHERE id='$data_hapus'";
  $result = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
  //jika berhasil di hapus
  if ($result) {
    echo "sukses";
  } else {
    echo "gagal";
  }
}
