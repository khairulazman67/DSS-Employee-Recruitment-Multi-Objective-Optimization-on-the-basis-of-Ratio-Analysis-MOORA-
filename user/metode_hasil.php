<?php
//-- query untuk mendapatkan semua data kriteria di tabel data_kriteria
$sql = 'SELECT * FROM data_kriteria';
$result = $konek->query($sql);
//-- menyiapkan variable penampung berupa array
$kriteria=array();
//-- melakukan iterasi pengisian array untuk tiap record data yang didapat
foreach ($result as $row) {
    $kriteria[$row['id_kriteria']]=array($row['kode'],$row['kriteria'],$row['type'],$row['bobot']);
}

//-- query untuk mendapatkan semua data kriteria di tabel hasil_alternatif
$sql = 'SELECT * FROM hasil_alternatif';
$result = $konek->query($sql);
//-- menyiapkan variable penampung berupa array
$alternatif=array();
//-- melakukan iterasi pengisian array untuk tiap record data yang didapat
foreach ($result as $row) {
    $alternatif[
      $row['id_alternatif']] =
    array(
      $row['alternatif'],
      $row['IPK'],
      $row['umur'],
      $row['pengalamanKerja'],
      $row['nilaiPsikotest'],
      $row['nilaiWawancara'],
    );
}

// Menghitung Nilai Pembagian
$rowtocol=array();
$hasilPembagi=array();
foreach($alternatif as $keyrow => $row){
    $rowtocol[0][$keyrow] = $row[1];
    $rowtocol[1][$keyrow] = $row[2];
    $rowtocol[2][$keyrow] = $row[3];
    $rowtocol[3][$keyrow] = $row[4];
    $rowtocol[4][$keyrow] = $row[5];
}

for($i=0;$i<count($rowtocol);$i++ ){
    $tmp = 0.00;
    $hasil = 0.00;
    for($j=1;$j<=count($rowtocol[$i]);$j++){
      $tmp = pow(($rowtocol[$i][$j]),2);
      $hasil = $hasil+$tmp;
    }
    $hasilnilai[$i] = sqrt($hasil);
}

// Membuat Matriks Normalisasi
$normal = $alternatif;
for($i=1;$i<=count($normal);$i++ ){
  $tmp = array();
  for($j=1;$j<=count($normal[$i]);$j++){
    $tmp[0]=$normal[$i][0];
    $tmp[$j] =($normal[$i][$j])/($hasilnilai[$j-1]);
    // $normal[$i][$j]=$tmp;
  }
  $normal[$i]=$tmp;
}
$kriteria2 = array();
foreach ($kriteria as $key => $value) {
  $kriteria2[$key]=$value[3];
}

// Membuat Matriks Normalisasi
$optimal = $normal;
for($i=1;$i<=count($optimal);$i++ ){
  $tmp = array();
  for($j=1;$j<count($optimal[$i])-1;$j++){
    $tmp[0]=$optimal[$i][0];
    $tmp[$j] =($optimal[$i][$j])*($kriteria2[$j]);
  }
  $optimal[$i]=$tmp;
}
//Perhitungan Min Max Yi
$tipebobot = array();
foreach ($kriteria as $key => $value) {
  $tipebobot[$key]=$value[2];
}

$optimasi = $optimal;
for($i=1;$i<=count($optimasi);$i++ ){
  $tmp = array();
  $benefit = 0.00;
  $cost = 0.00;
  for($j=1;$j<count($optimasi[$i]);$j++){
    if($tipebobot[$j]=="Benefit"){
      $benefit = $benefit+$optimasi[$i][$j];
    }else{
      $cost = $cost+$optimasi[$i][$j];
    }
    $tmp[0]=$optimasi[$i][0];
  }
  $tmp[1]=$benefit;
  $tmp[2]=$cost;
  $tmp[3]=$benefit-$cost;
  $optimasi[$i]=$tmp;
}
$sql_k_hasil_alternatif = "TRUNCATE TABLE hasil_akhir";
$konek->query($sql_k_hasil_alternatif);

foreach ($optimasi as $key => $value) {
  $sql = "INSERT INTO hasil_akhir (namaCalon, nilaiMax, nilaiMin, nilaiYi) VALUES ('$value[0]', '$value[1]', '$value[2]', '$value[3]')";
    $query = $konek->query($sql);
}


// usort($optimasi,function($a,$b){return strnatcmp($b[3],$a[3]);});


?>

<br />

<div class="container-fluid">
  <div class="col-xl-12 col-lg-8">
    <div class="card shadow mb-4">
      <div class="card-header">
        <div class="row">
          <div class="col-lg-6 col-xl-6">
            <h5 class="mt-2 font-weight-bold" style="Color: #92A323;"> <b> Pengambilan Nilai Alternatif </b></h5>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table border="border-left-info" class="table table-bordered" width="100%" cellspacing="0">
          <thead align="center">
            <tr>
              <th>Alternatif</th>
              <?php
                foreach ($kriteria as $key => $value) {
                  echo "<th>".$value[1]."</th>";
                }
              ?>
            </tr>
          </thead>
          <tbody align="center">
            <?php
              foreach ($alternatif as $key => $value) {
                echo "<tr>";
                  echo "<td>".$alternatif[$key][0]."</td>";
                  echo "<td>".$alternatif[$key][1]."</td>";
                  echo "<td>".$alternatif[$key][2]."</td>";
                  echo "<td>".$alternatif[$key][3]."</td>";
                  echo "<td>".$alternatif[$key][4]."</td>";
                  echo "<td>".$alternatif[$key][5]."</td>";
                echo "</tr>";
              }
              ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="col-xl-12 col-lg-8">
    <div class="card shadow mb-4">
      <div class="card-header">
        <div class="row">
          <div class="col-lg-6 col-xl-6">
            <h5 class="mt-2 font-weight-bold" style="Color: #92A323;"> <b> Membuat Matriks Normalisasi </b></h5>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table border="border-left-info" class="table table-bordered" width="100%" cellspacing="0">
          <thead align="center">
            <tr>
              <th>Alternatif</th>
              <?php
                  foreach ($kriteria as $key => $value) {
                  echo "<th>".$value[1]."</th>";
                }
                ?>
            </tr>
          </thead>
          <tbody align="center">
            <?php
              foreach ($normal as $key => $value) {
                echo "<tr>";
                echo "<td>".$alternatif[$key][0]."</td>";
                echo "<td>".$value[1]."</td>";
                echo "<td>".$value[2]."</td>";
                echo "<td>".$value[3]."</td>";
                echo "<td>".$value[4]."</td>";
                echo "<td>".$value[5]."</td>";

                echo "</tr>";
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="col-xl-12 col-lg-8">
    <div class="card shadow mb-4">
      <div class="card-header">
        <div class="row">
          <div class="col-lg-6 col-xl-6">
            <h5 class="mt-2 font-weight-bold" style="Color: #92A323;"> <b> Optimalisasi Bobot </b></h5>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table border="border-left-info" class="table table-bordered" width="100%" cellspacing="0">
          <thead align="center">
            <tr>
              <th>Alternatif</th>
              <?php
                  foreach ($kriteria as $key => $value) {
                  echo "<th>".$value[1]."</th>";
                }
                ?>
            </tr>
          </thead>
          <tbody align="center">
            <?php
              foreach ($optimal as $key => $value) {
                echo "<tr>";
                echo "<td>".$alternatif[$key][0]."</td>";
              for ($i=1; $i < count($value) ; $i++) {
                echo "<td>".$value[$i]."</td>";
                }
                echo "</tr>";
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<div class="container-fluid">
  <div class="col-xl-12 col-lg-8">
    <div class="card shadow mb-4">
      <div class="card-header">
        <div class="row">
          <div class="col-lg-6 col-xl-6">
            <h5 class="mt-2 font-weight-bold" style="Color: #92A323;"> <b> Menghitung Nilai Optimasi </b></h5>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table border="border-left-info" class="table table-bordered" width="100%" cellspacing="0">
          <thead align="center">
            <tr>
              <th>Alternatif</th>
              <th>Max</th>
              <th>Min</th>
              <th>Yi (Max-Min)</th>
            </tr>
          </thead>
          <tbody align="center">
            <?php
              foreach ($optimasi as $key => $value) {
                echo "<tr>";
                echo "<td>".$alternatif[$key][0]."</td>";
              for ($i=1; $i < count($value) ; $i++) {
                echo "<td>".$value[$i]."</td>";
                }
                echo "</tr>";
              }
              ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="col-xl-12 col-lg-8">
    <div class="card shadow mb-4">
      <div class="card-header">
        <div class="row">
          <div class="col-lg-6 col-xl-6">
            <h5 class="mt-2 font-weight-bold" style="Color: #92A323;"> <b> Hasil Rekomendasi </b></h5>
          </div>
        </div>
      </div>
      <div class="card-body">
      <table border="border-left-info" class="table table-bordered" width="100%" cellspacing="0">
          <thead align="center">
            <tr>
              <th>Nama</th>
              <th>Nilai</th>
              <th>Ranking</th>
            </tr>
          </thead>
          <tbody align="center">
          <?php

            $query="SELECT * FROM hasil_akhir ORDER BY nilaiYi DESC";
            $result=$konek->query($query);
            $i=1;
            while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
              ?>
            <tr>
            <td ><?php echo $row['namaCalon']; ?></td>
            <td ><?php echo $row['nilaiYi']; ?></td>
            <td ><?php echo $i ?></td>
            </tr>
          <?php $i++; } ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>