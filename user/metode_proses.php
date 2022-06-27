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
      <style>
        .buttonGreen{
          background-color: #0F996E;
          color:white;
        }
        .buttonGreen:hover{
          background-color: green;
          color:white;
        }
      </style>
      <!-- begin:: content -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-12 col-lg-8">
            <div class="card shadow mb-4">
              <div class="card-header">
                <div class="row">
                  <div class="col-lg-6 col-xl-6">
                    <h5 class="mt-2 font-weight-bold" style="Color: #0F996E;"> <b> Proses Moora </b></h5>
                  </div>
                  <div class="col-lg-6 col-xl-6" style="text-align: right;">
                    <form method="post">
                      <input type="submit" name="kosongkan" value="Kosongkan" class="btn btn-danger">
                      <button type="submit" name="proses" value="Proses"  class="btn buttonGreen"> Hitung Moora</button>
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
  $query="SELECT * FROM kriteriaIPK";
  $result=$konek->query($query);
  while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
    $dataIPK[] = array(
      'id'   => $row['id'],
      'IPK'        => $row['IPK'],
      'bilanganfuzzy'      => $row['bilanganfuzzy'],
      'nilai'             => $row['nilai'],
    );
  };

  $query="SELECT * FROM kriteriaPengalaman";
  $result=$konek->query($query);
  while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
    $dataPengalaman[] = array(
      'id'   => $row['id'],
      'lamaKerja'        => $row['lamaKerja'],
      'bilanganfuzzy'      => $row['bilanganfuzzy'],
      'nilai'             => $row['nilai'],
    );
  };

  $query="SELECT * FROM kriteriaPsikotest";
  $result=$konek->query($query);
  while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
    $dataPsikotest[] = array(
      'id'   => $row['id'],
      'jumlahNilai'        => $row['jumlahNilai'],
      'bilanganfuzzy'      => $row['bilanganfuzzy'],
      'nilai'             => $row['nilai'],
    );
  };

  $query="SELECT * FROM kriteriaWawancara";
  $result=$konek->query($query);
  while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
    $dataWawancara[] = array(
      'id'   => $row['id'],
      'jumlahNilai'        => $row['jumlahNilai'],
      'bilanganfuzzy'      => $row['bilanganfuzzy'],
      'nilai'             => $row['nilai'],
    );
  };

  foreach ($data_post as $key => $value) {
    // return ;
    //Cek IPK
    if($value['IPK']<floatval($dataIPK[4]['IPK']) || $value['IPK'] >4){
      $outIPK = floatval($dataIPK[4]['nilai']);
    }
    elseif($value['IPK'] >= floatval($dataIPK[4]['IPK']) && $value['IPK']<floatval($dataIPK[3]['IPK'])){
      $outIPK = floatval($dataIPK[3]['nilai']);
    }
    elseif($value['IPK']>=floatval($dataIPK[3]['IPK'])&& $value['IPK']< floatval($dataIPK[2]['IPK'])){
      $outIPK = floatval($dataIPK[2]['nilai']);
    }
    elseif($value['IPK']>=floatval($dataIPK[2]['IPK']) && $value['IPK']<floatval($dataIPK[1]['IPK'])){
      $outIPK = floatval($dataIPK[1]['nilai']);
    }
    elseif($value['IPK']>=floatval($dataIPK[1]['IPK'])&& $value['IPK']<=4){
      $outIPK = floatval($dataIPK[0]['nilai']);
    }else{
      $outIPK =0;
    }
    

    //Cek Pengalaman
    if($value['pengalamanKerja']<=0){
      $outPengalaman = floatval($dataPengalaman[4]['nilai']);
    }
    elseif($value['pengalamanKerja']> floatval($dataPengalaman[4]['lamaKerja']) && $value['pengalamanKerja']<= floatval($dataPengalaman[3]['lamaKerja'])){
      $outPengalaman = floatval($dataPengalaman[3]['nilai']);
    }
    elseif($value['pengalamanKerja']> floatval($dataPengalaman[3]['lamaKerja']) && $value['pengalamanKerja']<= floatval($dataPengalaman[2]['lamaKerja'])){
      $outPengalaman = floatval($dataPengalaman[2]['nilai']);
    }
    elseif($value['pengalamanKerja'] > floatval($dataPengalaman[2]['lamaKerja']) && $value['pengalamanKerja']<= floatval($dataPengalaman[1]['lamaKerja'])){
      $outPengalaman = floatval($dataPengalaman[1]['nilai']);
    }
    elseif($value['pengalamanKerja']> floatval($dataPengalaman[1]['lamaKerja']) ){
      $outPengalaman = floatval($dataPengalaman[0]['nilai']);
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
    if($value['nilaiPsikotest'] < floatval($dataPsikotest[4]['jumlahNilai'])){
      $outPsikotest= floatval($dataPsikotest[4]['nilai']);
    }
    elseif($value['nilaiPsikotest'] >= floatval($dataPsikotest[4]['jumlahNilai']) && $value['nilaiPsikotest'] <= floatval($dataPsikotest[3]['jumlahNilai'])){
      $outPsikotest = floatval($dataPsikotest[3]['nilai']);
    }
    elseif($value['nilaiPsikotest'] >floatval($dataPsikotest[3]['jumlahNilai']) && $value['nilaiPsikotest'] <= floatval($dataPsikotest[2]['jumlahNilai'])){
      $outPsikotest = floatval($dataPsikotest[2]['nilai']);
    }
    elseif($value['nilaiPsikotest'] >floatval($dataPsikotest[2]['jumlahNilai']) &&  $value['nilaiPsikotest'] <= floatval($dataPsikotest[1]['jumlahNilai'])){
      $outPsikotest = floatval($dataPsikotest[1]['nilai']);
    }
    elseif($value['nilaiPsikotest'] >floatval($dataPsikotest[1]['jumlahNilai']) && $value['nilaiPsikotest'] <= floatval($dataPsikotest[0]['jumlahNilai'])){
      $outPsikotest = floatval($dataPsikotest[0]['nilai']);
    }
    else{
      $outPsikotest =0;
    }
    // print_r('Psikotest '.$outPsikotes.'<br>');

    //Cek Nilai Wawancara
    if($value['nilaiWawancara'] <floatval($dataWawancara[4]['jumlahNilai'])){
      $outWawancara= floatval($dataWawancara[4]['nilai']);
    }
    elseif($value['nilaiWawancara'] >= floatval($dataWawancara[4]['jumlahNilai']) && $value['nilaiWawancara'] <= floatval($dataWawancara[3]['jumlahNilai'])){
      $outWawancara = floatval($dataWawancara[3]['nilai']);
    }
    elseif($value['nilaiWawancara'] >floatval($dataWawancara[3]['jumlahNilai']) && $value['nilaiWawancara'] <= floatval($dataWawancara[2]['jumlahNilai'])){
      $outWawancara = floatval($dataWawancara[2]['nilai']);
    }
    elseif($value['nilaiWawancara'] >floatval($dataWawancara[2]['jumlahNilai']) && $value['nilaiWawancara'] <= floatval($dataWawancara[1]['jumlahNilai'])){
      $outWawancara = floatval($dataWawancara[1]['nilai']);
    }
    elseif($value['nilaiWawancara'] >floatval($dataWawancara[1]['jumlahNilai']) && $value['nilaiWawancara'] <= floatval($dataWawancara[0]['jumlahNilai'])){
      $outWawancara = floatval($dataWawancara[0]['nilai']);
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