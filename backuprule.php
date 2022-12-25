<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <!-- Awal tampilan tambah rule -->
  <div class="konten">
    <form id="form1" name="form1" method="post" action="simpan_kaidah_produksi.php" enctype="multipart/form-data">
      <div>
        <h5 class="text-center">Tambah Rule Penyakit Lumpuh Bebek</h5>
        <table class="tab" width="650" border="0" align="center" cellpadding="4" cellspacing="1" bordercolor="#F0F0F0" bgcolor="#FFFFFF">
          <tr bgcolor="#FFFFFF">
            <td><strong class="ms-2">Pilih Gejala</strong></td>
            <!-- <td>&nbsp;</td> -->
          </tr>
          <tr bgcolor="#FFFFFF">
            <td colspan="2">
              <ul style="list-style:none;"> <?php
                                            include "../koneksi.php";
                                            $arrPenyakit = array();
                                            $arrGejala = array();
                                            $query = mysqli_query($koneksi, "SELECT * FROM tb_gejala ORDER BY id") or die("Query Error..!" . mysqli_error($koneksi));
                                            while ($row = mysqli_fetch_array($query)) {
                                              $arrGejala["$row[id]"] = $row['kdgejala'] . "," . $row['gejala'];
                                            ?>
                  <li><input class="cekbok" type="checkbox" name="gejala[]" id="gejala" value="<?php echo $row['id']; ?>">&nbsp;
                    <?php echo $row['kdgejala'] . "<strong>&nbsp;|&nbsp;</strong>" . $row['gejala']; ?>
                    <span class="check"></span>
                  </li>
                <?php } ?>
              </ul><strong>&nbsp;&nbsp;Pilih Penyakit
                <select name="TxtKdPenyakit" id="TxtKdPenyakit">
                  <option value="NULL">Daftar Penyakit</option>
                  <?php
                  $sqlp = "SELECT * FROM tb_penyakit ORDER BY id";
                  $qryp = mysqli_query($koneksi, $sqlp)
                    or die("SQL Error: " . mysqli_error($koneksi));
                  while ($datap = mysqli_fetch_array($qryp)) {
                    if ($datap['id'] == $kdsakit) {
                      $cek = "selected";
                    } else {
                      $cek = "";
                    }
                    $arrPenyakit["$datap[id]"] = $datap['nama_penyakit'];
                    echo "<option value='$datap[id]' $cek>$datap[id]&nbsp;|&nbsp;$datap[nama_penyakit]</option>";
                  }
                  ?>
                </select><br><br>&nbsp;&nbsp;Nilai Belief
                <!-- <p class="ms-2
                          ">Nilai Belief</p> -->
                <input type="text" name="cf" size="5" class="ms-4">
              </strong>
            </td>
            <!-- CF<input type="text" name="cf" size="5"></strong></td> -->
          </tr>
          <tr bgcolor="#FFFFFF">
            <td>&nbsp;</td>
            <td><input class="setrule" type="submit" name="Submit" value="Set Rule" />
              <input class="reset" type="reset" name="Submit2" value="Reset" />
            </td>
          </tr>
        </table>
      </div>
    </form>
  </div>
  <!-- Akhir tampilan tambah rule -->

  <!-- Awal tampilan tabel data rule -->
  <!-- Akhir tampilan tabel data rule -->
</body>

</html>