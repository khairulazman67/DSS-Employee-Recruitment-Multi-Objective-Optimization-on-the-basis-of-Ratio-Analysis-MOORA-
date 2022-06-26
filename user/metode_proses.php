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

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<?php include_once 'atribut/foot.php'; ?>

<?php
if (isset($_POST['proses'])) { 
  $sql_k_hasil_alternatif = "TRUNCATE TABLE hasil_alternatif";
  $konek->query($sql_k_hasil_alternatif);

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

  $query_k = $konek->query('SELECT * FROM data_kriteria');
  $id_kriteria = [];
  while ($row_k = $query_k->fetch_array(MYSQLI_ASSOC)) {
    $id_kriteria[] = $row_k['id'];
  }

  foreach ($data_post as $key => $value) {

    //Cek IPK
    if($value['IPK']<2 || $value['IPK'] >4){
      $outIPK = 20;
    }
    elseif($value['IPK'] >= 2 && $value['IPK']<2.7){
      $outIPK = 50;
    }
    elseif($value['IPK']>=2.7 && $value['IPK']< 3){
      $outIPK = 70;
    }
    elseif($value['IPK']>=3 && $value['IPK']<3.25){
      $outIPK = 80;
    }
    elseif($value['IPK']>=3.25 && $value['IPK']<=4){
      $outIPK = 100;
    }else{
      $outIPK =0;
    }
    

    //Cek Pengalaman
    if($value['pengalamanKerja']<=0){
      $outPengalaman = 10;
    }
    elseif($value['pengalamanKerja']> 0 && $value['pengalamanKerja']<= 2){
      $outPengalaman = 40;
    }
    elseif($value['pengalamanKerja']> 2 && $value['pengalamanKerja']<= 3){
      $outPengalaman = 60;
    }
    elseif($value['pengalamanKerja'] > 3 && $value['pengalamanKerja']<= 4){
      $outPengalaman = 80;
    }
    elseif($value['pengalamanKerja']> 4 ){
      $outPengalaman = 100;
    }else{
      $outPengalaman =0;
    }
    
    //Cek Umur
    if($value['umur'] <17 || $value['umur'] >27){
      $outUmur = 10;
    }
    elseif($value['umur'] >= 17 && $value['umur'] <=19){
      $outUmur = 50;
    }
    elseif($value['umur'] >=20 && $value['umur'] <= 23){
      $outUmur = 80;
    }
    elseif($value['umur'] >23 && $value['umur']<=25){
      $outUmur = 100;
    }
    elseif($value['umur'] >=26 && $value['umur']<=27){
      $outUmur = 60;
    }else{
      $outUmur =0;
    }
    

    //Cek Nilai Psikotest
    if($value['nilaiPsikotest'] <10 || $value['nilaiPsikotest'] > 100){
      $outPsikotest= 10;
    }
    elseif($value['nilaiPsikotest'] >= 10 && $value['nilaiPsikotest'] <= 20){
      $outPsikotest = 40;
    }
    elseif($value['nilaiPsikotest'] >20 && $value['nilaiPsikotest'] <= 40){
      $outPsikotest = 80;
    }
    elseif($value['nilaiPsikotest'] >40 &&  $value['nilaiPsikotest'] <= 90){
      $outPsikotest = 60;
    }
    elseif($value['nilaiPsikotest'] >90 && $value['nilaiPsikotest'] <= 100){
      $outPsikotest = 100;
    }
    else{
      $outPsikotest =0;
    }
    // print_r('Psikotest '.$outPsikotes.'<br>');

    //Cek Nilai Wawancara
    if($value['nilaiWawancara'] <10 || $value['nilaiWawancara'] > 100){
      $outWawancara= 10;
    }
    elseif($value['nilaiWawancara'] >= 30 && $value['nilaiWawancara'] <= 60){
      $outWawancara = 40;
    }
    elseif($value['nilaiWawancara'] >60 && $value['nilaiWawancara'] <= 80){
      $outWawancara = 80;
    }
    elseif($value['nilaiWawancara'] >80 && $value['nilaiWawancara'] <= 100){
      $outWawancara = 100;
    }else{
      $outWawancara =0;
    }

    print_r('Psikotest',$outPsikotes.'<br>');
    print_r('Wawancara',$outWawancara.'<br>');
    print_r('Pengalaman',$outPengalaman.'<br>');
    print_r('Umur',$outUmur.'<br>');
    print_r('IPK',$outIPK.'<br>');

    // return
    $outPsikotes = $outPsikotes/100;
    $outWawancara = $outWawancara/100;
    $outPengalaman = $outPengalaman/100;
    $outUmur = $outUmur/100;
    $outIPK = $outIPK/100;

    $sql = "INSERT INTO hasil_alternatif (id_alternatif, id_calon, alternatif, IPK, umur, pengalamanKerja, nilaiPsikotest, nilaiWawancara) VALUES ('$value[id_alternatif]', '$value[id_calon]', '$value[alternatif]', '$outIPK', '$outUmur', '$outPengalaman', '$outPsikotest', '$outWawancara')";
    $query = $konek->query($sql);
  }

  if ($query) {
    echo "<script>alert('Berhasil !');</script>";
    echo "<script>window.location.href = \"metode_proses.php\"</script>";
  } else {
    echo "<script>alert('Gagal !');</script>";
  }

} else if (isset($_POST['kosongkan'])) {

  $sql_k_hasil_alternatif = "TRUNCATE TABLE hasil_alternatif";
  $konek->query($sql_k_hasil_alternatif);

  echo "<script>alert('Berhasil mengosongkan tabel!')</script>";
  echo "<script>window.location.href = \"metode_proses.php\"</script>";

}
?>