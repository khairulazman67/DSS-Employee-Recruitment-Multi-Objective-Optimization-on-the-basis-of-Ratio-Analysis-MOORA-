<?php include_once 'atribut/head.php'; ?>

<!-- Page Wrapper -->
<div id="wrapper">
  <!-- begin:: siderbar -->
  <?php include_once 'atribut/sidebar.php'; ?>
  <!-- end:: siderbar -->

  <div id="content-wrapper" class="d-flex flex-column">
    <!-- begin:: main content -->
    <div id="content">

      <?php include_once 'atribut/navbar.php'; ?>

      <!-- begin:: content -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-12 col-lg-8">
            <div class="card shadow mb-4">
              <div class="card-header">
                <div class="row">
                  <div class="col-lg-6 col-xl-6">
                    <h5 class="mt-2 font-weight-bold text-info"> <b> Proses Moora </b></h5>
                  </div>
                  <div class="col-lg-6 col-xl-6" style="text-align: right;">
                    <form method="post">
                      <input type="submit" name="kosongkan" value="Kosongkan" class="btn btn-danger">
                      <button type="submit" name="proses" value="Proses"  class="btn btn-info"> Hitung Moora</button>
                    </form>
                  </div>
                </div>
              </div>

              <?php include_once 'metode_hasil.php'; ?>

            </div>
          </div>
        </div>
      </div>
      <!-- end:: content -->
    </div>
    <!-- end:: main content -->
  </div>
</div>
<!-- End of Page Content -->

<!-- Footer -->
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<?php include_once 'atribut/foot.php'; ?>

<?php
if (isset($_POST['proses'])) { 
  $sql = 'SELECT * FROM kriteriaIPK';
  $result = $konek->query($sql);
  //-- menyiapkan variable penampung berupa array
  $kriteriaIPK=array();
  //-- melakukan iterasi pengisian array untuk tiap record data yang didapat
  foreach ($result as $row) {
      $kriteriaIPK[$row['id']]=array($row['IPK'],$row['bilanganfuzzy'],$row['nilai']);
  };
  $outIPK =0;
  $nilai =3;
  $outnilai = 0.00;
    if($nilai<=floatval($kriteriaIPK[5][0])){
      $outnilai= floatval($kriteriaIPK[5][2]);
    }
    elseif($nilai>=floatval($kriteriaIPK[5][0]) and $nilai<=floatval($kriteriaIPK[4][0])){
      $outnilai = floatval($kriteriaIPK[4][2]);
    }
    elseif($nilai>=floatval($kriteriaIPK[4][0]) and $nilai<=floatval($kriteriaIPK[3][0])){
      $outnilai = floatval($kriteriaIPK[3][2]);
    }
    elseif($nilai>=floatval($kriteriaIPK[3][0]) and $nilai<=floatval($kriteriaIPK[2][0])){
      $outnilai = floatval($kriteriaIPK[2][2]);
    }
    elseif($nilai>=floatval($kriteriaIPK[2][0]) and $nilai<=floatval($kriteriaIPK[1][0])){
      $outnilai = floatval($kriteriaIPK[1][2]);
    }
    elseif($nilai>=floatval($kriteriaIPK[1][0]) and $nilai<=4.0){
      $outnilai = floatval($kriteriaIPK[1][2]);
    }else{
      $outnilai =10;
    }

  // var_dump($outnilai);


  $sql = 'SELECT * FROM kriteriaPengalaman';
  $result = $konek->query($sql);
  //-- menyiapkan variable penampung berupa array
  $kriteriaPengalaman=array();
  //-- melakukan iterasi pengisian array untuk tiap record data yang didapat
  foreach ($result as $row) {
    $kriteriaPengalaman[$row['id']]=array($row['lamaKerja'],$row['bilanganfuzzy'],$row['nilai']);
  }

  $nilaiPel = 7;
  $outnilaiPel = 0;
  // print_r($kriteriaPengalaman[5][0]);
  if($nilaiPel<=floatval($kriteriaPengalaman[5][0])){
    $outnilaiPel = floatval($kriteriaPengalaman[5][2]);
  }
  elseif($nilaiPel>floatval($kriteriaPengalaman[5][0]) && $nilaiPel<=floatval($kriteriaPengalaman[4][0])){
    $outnilaiPel = floatval($kriteriaPengalaman[4][2]);
  }
  elseif($nilaiPel>floatval($kriteriaPengalaman[4][0]) && $nilaiPel<=floatval($kriteriaPengalaman[3][0])){
    $outnilaiPel = floatval($kriteriaPengalaman[3][2]);
  }
  elseif($nilaiPel>floatval($kriteriaPengalaman[3][0]) && $nilaiPel<=floatval($kriteriaPengalaman[2][0])){
    $outnilaiPel = floatval($kriteriaPengalaman[2][2]);
  }
  elseif($nilaiPel>=floatval($kriteriaPengalaman[2][0]) && $nilaiPel<=floatval($kriteriaPengalaman[1][0])){
    $outnilaiPel = floatval($kriteriaPengalaman[2][2]);
  }
  elseif($nilaiPel>=floatval($kriteriaPengalaman[1][0])){
    $outnilaiPel = floatval($kriteriaPengalaman[1][2]);
  }else{
    $outnilaiPel =0;
  }
  // print_r($outnilaiPel);

  function umur($nilaiUmur){
    $outnilaiUmur = 0;
    // print_r($kriteriaPengalaman[5][0]);
    if($nilaiUmur<17 || $nilaiUmur >27){
      $outnilaiUmur = 10;
    }
    elseif($nilaiUmur>= 17 && $nilaiUmur<=19){
      $outnilaiUmur = 50;
    }
    elseif($nilaiUmur>=20 && $nilaiUmur<= 23){
      $outnilaiUmur = 80;
    }
    elseif($nilaiUmur>23 && $nilaiUmur<=25){
      $outnilaiUmur = 100;
    }
    elseif($nilaiUmur>=26 && $nilaiUmur<=27){
      $outnilaiUmur = floatval($kriteriaPengalaman[2][2]);
    }else{
      $outnilaiUmur =0;
    }
    return $outnilaiUmur;
  }
  // print_r(umur(100));

  function wawancara($nilaiwawancara){
    $outnilaiWawancara = 0;
    // print_r($kriteriaPengalaman[5][0]);
    if($nilaiwawancara<10 || $nilaiwawancara > 100){
      $outnilaiWawancara= 10;
    }
    elseif($nilaiwawancara>= 30 && $nilaiwawancara <= 60){
      $outnilaiWawancara = 40;
    }
    elseif($nilaiwawancara >60 && $nilaiwawancara <= 80){
      $outnilaiWawancara = 80;
    }
    elseif($nilaiwawancara>80 && $nilaiwawancara <= 100){
      $outnilaiWawancara = 100;
    }else{
      $outnilaiWawancara =0;
    }
    return $outnilaiWawancara;
  }

  function psikotest($nilaipsikotes){
    $outnilaiPsikotes = 0;
    // print_r($kriteriaPengalaman[5][0]);
    if($nilaipsikotes<10 || $nilaipsikotes > 100){
      $outnilaiPsikotes= 10;
    }
    elseif($nilaipsikotes>= 10 && $nilaipsikotes <= 20){
      $outnilaiPsikotes = 40;
    }
    elseif($nilaipsikotes >20 && $nilaipsikotes <= 40){
      $outnilaiPsikotes = 80;
    }
    elseif($nilaipsikotes>40 && $nilaipsikotes <= 90){
      $outnilaiPsikotes = 60;
    }
    elseif($nilaipsikotes>90 && $nilaipsikotes <= 100){
      $outnilaiPsikotes = 100;
    }
    else{
      $outnilaiPsikotes =0;
    }
    return $outnilaiPsikotes;
  }
  print_r(psikotest(100));

} else if (isset($_POST['kosongkan'])) {

  $sql_k_moo_alternatif = "TRUNCATE TABLE moo_alternatif";
  $konek->query($sql_k_moo_alternatif);
  $sql_k_moo_nilai = "TRUNCATE TABLE moo_nilai";
  $konek->query($sql_k_moo_nilai);

  echo "<script>alert('Berhasil mengosongkan tabel!')</script>";
  echo "<script>window.location.href = \"metode_proses.php\"</script>";

}
?>