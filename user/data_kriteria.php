<?php include_once 'atribut/head.php'; ?>
<style>
  .textGreen{
    color:#92A323
  }
</style>
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
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
              <div class="card-header">
                <div class="row">
                  <div class="col-lg-6 col-xl-6">
                    <h5 class="mt-2 font-weight-bold textGreen"> <b> Bilangan Fuzzy Tiap Kriteria </b></h5>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table border="border-left-info" class="table table-bordered" width="100%" cellspacing="0">
                  <thead align="center">
                    <th> Kode </th>
                    <th> Nilai </th>
                    <th> Bilangan Fuzzy </th>
                  </thead>
                  <tbody>
                    <?php
                      $query  = "SELECT * FROM fuzzytiapkriteria";
                      $result = $konek->query($query);
                      while ($row=$result->fetch_array(MYSQLI_ASSOC)) { ?>
                      <tr>
                        <td align="center"><?php echo $row['kode']; ?></td>
                        <td align="center"><?php echo $row['nilai']; ?></td>
                        <td align="center"><?php echo $row['bilanganfuzzy']; ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
              <div class="card-header">
                <div class="row">
                  <div class="col-lg-6 col-xl-6">
                    <h5 class="mt-2 font-weight-bold textGreen"> <b> Jenis Dan Bobot Kriteria </b></h5>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table border="border-left-info" class="table table-bordered" width="100%" cellspacing="0">
                  <thead align="center">
                    <th> Kode </th>
                    <th> Kriteria </th>
                    <th> Type </th>
                    <th> Bobot </th>
                  </thead>
                  <tbody>
                    <?php

                      $query="SELECT * FROM data_kriteria";
                      $result=$konek->query($query);

                      while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
                        ?>
                    <tr>
                      <td align="center"><?php echo $row['kode']; ?></td>
                      <td align="center"><?php echo $row['kriteria']; ?></td>
                      <td align="center"><?php echo $row['type']; ?></td>
                      <td align="center"><?php echo $row['bobot']; ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
              <div class="card-header">
                <div class="row">
                  <div class="col-lg-6 col-xl-6">
                    <h5 class="mt-2 font-weight-bold textGreen"> <b> Nilai Untuk Kriteria IPK </b></h5>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table border="border-left-info" class="table table-bordered" width="100%" cellspacing="0">
                  <thead align="center">
                    <th> ID </th>
                    <th> IPK </th>
                    <th> Bilangan Fuzzy </th>
                    <th> Nilai </th>
                  </thead>
                  <tbody>
                    <?php
                      $query  = "SELECT * FROM kriteriaIPK";
                      $result = $konek->query($query);
                      while ($row=$result->fetch_array(MYSQLI_ASSOC)) { ?>
                    <tr>
                      <td align="center"><?php echo $row['id']; ?></td>
                      <td align="center"><?php echo $row['IPK']; ?></td>
                      <td align="center"><?php echo $row['bilanganfuzzy']; ?></td>
                      <td align="center"><?php echo $row['nilai']; ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
              <div class="card-header">
                <div class="row">
                  <div class="col-lg-6 col-xl-6">
                    <h5 class="mt-2 font-weight-bold textGreen"> <b> Nilai Untuk Kriteria Umur </b></h5>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table border="border-left-info" class="table table-bordered" width="100%" cellspacing="0">
                  <thead align="center">
                    <th> ID </th>
                    <th> Umur </th>
                    <th> Bilangan Fuzzy </th>
                    <th> Nilai </th>
                  </thead>
                  <tbody>
                    <?php

                      $query="SELECT * FROM kriteriaUmur";
                      $result=$konek->query($query);

                      while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
                        ?>
                    <tr>
                      <td align="center"><?php echo $row['id']; ?></td>
                      <td align="center"><?php echo $row['umur']; ?></td>
                      <td align="center"><?php echo $row['bilanganfuzzy']; ?></td>
                      <td align="center"><?php echo $row['nilai']; ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
              <div class="card-header">
                <div class="row">
                  <div class="col-lg-6 col-xl-6">
                    <h5 class="mt-2 font-weight-bold textGreen"> <b> Nilai Untuk Kriteria Pengalaman Kerja </b></h5>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table border="border-left-info" class="table table-bordered" width="100%" cellspacing="0">
                  <thead align="center">
                    <th> ID </th>
                    <th> Pengalaman Kerja</th>
                    <th> Bilangan Fuzzy </th>
                    <th> Nilai </th>
                  </thead>
                  <tbody>
                    <?php
                      $query  = "SELECT * FROM kriteriaPengalaman";
                      $result = $konek->query($query);
                      while ($row=$result->fetch_array(MYSQLI_ASSOC)) { ?>
                    <tr>
                      <td align="center"><?php echo $row['id']; ?></td>
                      <td align="center"><?php echo $row['lamaKerja']; ?></td>
                      <td align="center"><?php echo $row['bilanganfuzzy']; ?></td>
                      <td align="center"><?php echo $row['nilai']; ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
              <div class="card-header">
                <div class="row">
                  <div class="col-lg-6 col-xl-6">
                    <h5 class="mt-2 font-weight-bold textGreen"> <b> Nilai Untuk Kriteria Nilai Psikotes</b></h5>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table border="border-left-info" class="table table-bordered" width="100%" cellspacing="0">
                  <thead align="center">
                    <th> ID </th>
                    <th> Jumlah Nilai </th>
                    <th> Bilangan Fuzzy </th>
                    <th> Nilai </th>
                  </thead>
                  <tbody>
                    <?php
                      $query  = "SELECT * FROM kriteriaPsikotest";
                      $result = $konek->query($query);

                      while ($row=$result->fetch_array(MYSQLI_ASSOC)) { ?>
                        <tr>
                          <td align="center"><?php echo $row['id']; ?></td>
                          <td align="center"><?php echo $row['jumlahNilai']; ?></td>
                          <td align="center"><?php echo $row['bilanganfuzzy']; ?></td>
                          <td align="center"><?php echo $row['nilai']; ?></td>
                        </tr>
                      <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
              <div class="card-header">
                <div class="row">
                  <div class="col-lg-6 col-xl-6">
                    <h5 class="mt-2 font-weight-bold textGreen"> <b> Nilai Untuk Kriteria Nilai Wawancara </b></h5>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table border="border-left-info" class="table table-bordered" width="100%" cellspacing="0">
                  <thead align="center">
                    <th> ID </th>
                    <th> Jumlah Nilai </th>
                    <th> Bilangan Fuzzy </th>
                    <th> Nilai </th>
                  </thead>
                  <tbody>
                    <?php

                      $query="SELECT * FROM kriteriaWawancara";
                      $result=$konek->query($query);

                      while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
                        ?>
                    <tr>
                      <td align="center"><?php echo $row['id']; ?></td>
                      <td align="center"><?php echo $row['jumlahNilai']; ?></td>
                      <td align="center"><?php echo $row['bilanganfuzzy']; ?></td>
                      <td align="center"><?php echo $row['nilai']; ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
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