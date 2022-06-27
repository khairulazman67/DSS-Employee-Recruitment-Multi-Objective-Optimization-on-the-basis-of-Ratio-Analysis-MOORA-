<?php include_once 'atribut/head.php'; ?>

<?php
$sql    = "SELECT MAX(id) AS maxid FROM data_calon_karyawan";
$carkod = mysqli_query($konek, $sql);
$datkod = mysqli_fetch_array($carkod, MYSQLI_ASSOC);
if ($datkod) {
  $nilkod  = $datkod['maxid'];
  $kode    = $nilkod + 1;
  $kodeoto = $kode;
} else {
  $kodeoto = "1";
}
?>
<style>
  .buttonGreen{
      background-color: #0F996E;
      color:white;
  };
  .buttonGreen:hover{
      background-color: green;
      color:white;
  };
  .textGreen{
    color : #92A323
  }
</style>
<!-- Page Wrapper -->
<div id="wrapper">
  <!-- begin:: siderbar -->
  <?php include_once 'atribut/sidebar.php'; ?>
  <!-- end:: siderbar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">

      <?php include_once 'atribut/navbar.php'; ?>

      <!-- Begin Page Content -->
      <div class="container-fluid">
        <!-- <div class="row"> -->
        <div class="col-xl-12  col-lg-8">
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h5 class="m-0 font-weight-bold " style="color : #92A323"> <b> Tambah Data Karyawan </b></h5>
            </div>
            <div class="card-body">
              <form class="form" method="post" name="converter">
                <div class="form-group">
                  <label class="control-label col-md-12 col-sm-12 col-xs-12">ID</label>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <input class="form-control" type="text" name="id" value="<?= $kodeoto ?>" readonly="readonly">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-12 col-sm-12 col-xs-12">Nama Calon Karyawan</label>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <input class="form-control" type="text" name="namacalon" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-12 col-sm-12 col-xs-12">IPK</label>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <input class="form-control" type="number" name="IPK" step="0.01" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-12 col-sm-12 col-xs-12">Umur</label>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <input class="form-control" type="number" name="umur" placeholder="Tahun"  required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-12 col-sm-12 col-xs-12">Pengalaman Kerja</label>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <input class="form-control" type="number" name="pengalamanKerja" placeholder="Tahun"  required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-12 col-sm-12 col-xs-12">Nilai Psikotest</label>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <input class="form-control" type="number" name="nilaiPsikotest" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-12 col-sm-12 col-xs-12">Nilai Wawancara</label>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <input class="form-control" type="number" name="nilaiWawancara" required>
                  </div>
                </div>
                <input class="btn buttonGreen" type="submit" name="simpan" value="Simpan">
                <a href="data_calon_karyawan.php" class="btn btn-danger">Batal</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End of Page Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; 2019 Marcelino Derry Utomo</span>
    </div>
  </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<?php include_once 'atribut/foot.php'; ?>


</body>

</html>

<?php
if (isset($_POST['simpan'])) {

  $id    = $_POST['id'];
  $namacalon = $_POST['namacalon'];
  $IPK      = $_POST['IPK'];
  $umur     = $_POST['umur'];
  $pengalamanKerja  = $_POST['pengalamanKerja'];
  $nilaiPsikotest    = $_POST['nilaiPsikotest'];
  $nilaiWawancara = $_POST['nilaiWawancara'];

  var_dump($id);
  var_dump($namacalon);
  var_dump($IPK);
  var_dump($umur);
  var_dump($pengalamanKerja);
  var_dump($nilaiPsikotest);
  var_dump($nilaiWawancara);
  $sql_calon   = "SELECT * FROM data_calon_karyawan WHERE namacalon = '$namacalon'";
  $query_calon = $konek->query($sql_calon);
  $cek_calon   = $query_calon->num_rows;

  var_dump($cek_calon);
  if ($cek_calon > 0) {
    echo "<script>alert('Data Sudah Ada!') </script>";
    echo "<script>window.location.href = \"data_calon_karyawan_tambah.php\" </script>";
  } else {
    $query  = "INSERT INTO data_calon_karyawan (id, namacalon, IPK, umur, pengalamanKerja, nilaiPsikotest, nilaiWawancara) VALUES ('$id', '$namacalon','$IPK','$umur','$pengalamanKerja','$nilaiPsikotest','$nilaiWawancara')";
    $tambah = $konek->query($query);
    if ($tambah == true) {
      echo "<script>alert('Data Berhasil Di Tambah') </script>";
      echo "<script>window.location.href = \"data_calon_karyawan.php\" </script>";
    }
    else {
      echo "<script>alert('Data Gagal Di Tambah') </script>";
      echo "<script>window.location.href = \"data_calon_karyawan.php\" </script>";
    } 
  }
}
?>