<?php include_once 'atribut/head.php'; ?>

<!-- Page Wrapper -->
<div id="wrapper">
  <!-- begin:: siderbar -->
  <?php include_once 'atribut/sidebar.php'; ?>
  <!-- end:: siderbar -->
  <style>
    .textGreen{
      color:#92A323
    }
  </style>
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
                    <h5 class="mt-2 font-weight-bold textGreen"> <b> Data Alat Mining </b></h5>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table border="border-left-info" class="table table-bordered" id="dataTable" width="100%"
                  cellspacing="0">
                  <thead align="center">
                    <th>ID</th>
                    <th>Nama</th>
                    <th>IPK</th>
                    <th>Umur</th>
                    <th>Pengalaman Kerja</th>
                    <th>Nilai Psikotes</th>
                    <th>Nilai Wawancara</th>
                  </thead>
                  <tbody>
                    <?php
                      $query="SELECT * FROM data_calon_karyawan";
                      $result=$konek->query($query);
                      while ($row=$result->fetch_array(MYSQLI_ASSOC)) { ?>
                    <tr>
                      <td align="center"><?php echo $row['id_calon']; ?></td>
                      <td align="center"><?php echo $row['namacalon']; ?></td>
                      <td align="center"><?php echo number_format($row['IPK']); ?></td>
                      <td align="center"><?php echo $row['umur']; ?> Tahun</td>
                      <td align="center"><?php echo $row['pengalamanKerja']; ?> Tahun</td>
                      <td align="center"><?php echo $row['nilaiPsikotest']; ?></td>
                      <td align="center"><?php echo $row['nilaiWawancara']; ?></td>
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