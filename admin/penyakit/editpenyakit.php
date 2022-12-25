<?php
include "../koneksi.php";
$kdubah = $_GET['kdubah'];
if ($kdubah != "") {
  #menampilkan data
  $sql = "SELECT * FROM tb_penyakit WHERE id='$kdubah'";
  $qry = mysqli_query($koneksi, $sql)
    or die("SQL ERROR" . mysqli_error($koneksi));
  $data = mysqli_fetch_array($qry);
  #samakan dengan variabel form
  $id = $data['id'];
  $edit_kdpenyakit = $data['kdpenyakit'];
  $edit_penyakit = $data['nama_penyakit'];
  $edit_definisi = $data['definisi'];
  $edit_solusi = $data['solusi'];
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="description">
  <meta content="" name="keywords">
  <title>Edit data Penyakit</title>
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

</head>

<body>

  <div class="card col-md-6 mx-auto mt-5">
    <div class="card-body">
      <h4 class="text-center">Edit Data Penyakit & Solusi</h4>
      <form method="post" action="./editpenyakit2.php">
        <div class="form-group mb-2">
          <label for="kdpenyakit">Kode Penyakit :</label>
          <input type="text" class="form-control" id="kdpenyakit" name="kdpenyakit" value="<?php echo $edit_kdpenyakit; ?>">
          <input name="kdpenyakit" type="hidden" id="kdpenyakit" value="<?php echo $id; ?>">
        </div>
        <div class="form-group mb-2">
          <label for="nama_penyakit">Nama Penyakit :</label>
          <input type="text" class="form-control" id="edit_penyakit" name="edit_penyakit" value="<?php echo $edit_penyakit; ?>">
        </div>
        <div class="form-group mb-2">
          <label for="definisi">Definisi Penyakit :</label>
          <textarea class="form-control" rows="3" id="edit_definisi" name="edit_definisi"><?php echo $edit_definisi; ?></textarea>
        </div>
        <div class="form-group">
          <label for="solusi">Solusi Penyakit :</label>
          <textarea class="form-control" rows="3" id="edit_solusi" name="edit_solusi"><?php echo $edit_solusi; ?></textarea>
        </div>
        <div class="d-grid gap-2">
          <button type="submit" name="simpan" id="simpan" class="btn btn-primary mt-4 btn-sm">Update</button>
          <a href="./penyakit.php" type="button" class="btn btn-danger btn-sm" name="batal" id="batal">Batal</a>
        </div>
      </form>
    </div>
  </div>

</body>

</html>