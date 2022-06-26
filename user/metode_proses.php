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
  function IPK($nilaiIPK){
    $outnilai = 0.00;

    if($nilaiIPK<2 || $nilaiIPK >4){
      $outnilai = 20;
    }
    elseif($nilaiIPK>= 2 && $nilaiIPK<=2.7){
      $outnilai = 50;
    }
    elseif($nilaiIPK>=2.7 && $nilaiIPK<= 3){
      $outnilai = 70;
    }
    elseif($nilaiIPK>3 && $nilaiIPK<=3.25){
      $outnilai = 80;
    }
    elseif($nilaiIPK>=3.5 && $nilaiIPK<=4){
      $outnilai = 100;
    }else{
      $outnilai =0;
    }

    return $outnilai;
  };
  // var_dump($outnilai);

  function pengalaman($nilaiPel){
    $nilaiPel = 7;
    $outnilai = 0;
    // print_r($kriteriaPengalaman[5][0]);
    if($nilaiPel<=0){
      $outnilai = 10;
    }
    elseif($nilaiPel> 0 && $nilaiPel<= 2){
      $outnilai = 40;
    }
    elseif($nilaiPel> 2 && $nilaiPel<= 3){
      $outnilai = 60;
    }
    elseif($nilaiPel> 3 && $nilaiPel<= 4){
      $outnilai = 80;
    }
    elseif($nilaiPel> 4 ){
      $outnilai = 100;
    }else{
      $outnilai =0;
    }
    return $outnilai;
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
  print_r('Psikotest '.psikotest(100).'<br>');
  print_r('Wawancara '.wawancara(40).'<br>');
  print_r('Pengalaman '.pengalaman(60).'<br>');
  print_r('Umur '.umur(100).'<br>');
  print_r('IPK '.IPK(4).'<br>');

  

  $sql    = "SELECT * FROM data_calon_karyawan";
  $result = $konek->query($sql);
  $no     = 1;

  $data_post = [];
  while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    $data_post[] = array(
      'id_alternatif'   => $row['id'],
      'id_calon'        => $row['id'],
      'alternatif'      => $row['namacalon'],
      'IPK'             => $row['IPK'],
      'umur'            => $row['umur'],
      'pengalamanKerja' => $row['pengalamanKerja'],
      'nilaiPsikotest'  => $row['nilaiPsikotest'],
      'nilaiWawancara'  => $row['nilaiWawancara']
    );
  }

  $query_k = $konek->query('SELECT * FROM moo_kriteria');
  $id_kriteria = [];
  while ($row_k = $query_k->fetch_array(MYSQLI_ASSOC)) {
    $id_kriteria[] = $row_k['id'];
  }

  foreach ($data_post as $key => $value) {


  }

  $sql = 'SELECT * FROM data_calon_karyawan';
  $result = $konek->query($sql);
  //-- menyiapkan variable penampung berupa array
  $kriteria=array();
  //-- melakukan iterasi pengisian array untuk tiap record data yang didapat
  foreach ($result as $row) {
      $kriteria[$row['id']]=array($row['namacalon'],$row['kriteria'],$row['type'],$row['bobot']);
  }

} else if (isset($_POST['kosongkan'])) {

  $sql_k_moo_alternatif = "TRUNCATE TABLE moo_alternatif";
  $konek->query($sql_k_moo_alternatif);
  $sql_k_moo_nilai = "TRUNCATE TABLE moo_nilai";
  $konek->query($sql_k_moo_nilai);

  echo "<script>alert('Berhasil mengosongkan tabel!')</script>";
  echo "<script>window.location.href = \"metode_proses.php\"</script>";

}
?>