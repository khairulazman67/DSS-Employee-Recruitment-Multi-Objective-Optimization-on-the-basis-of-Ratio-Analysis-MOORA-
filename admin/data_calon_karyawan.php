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
                    <h5 class="mt-2 font-weight-bold text-info"> <b> Data Calon Karyawan </b></h5>
                  </div>
                  <div class="col-lg-6 col-xl-6" style="text-align: right;">
                    <a class="btn btn-info" href="data_calon_karyawan_tambah.php">Tambah Data Calon Karyawan</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table border="border-left-info" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead align="center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>IPK</th>
                    <th>Umur</th>
                    <th>Pengalaman Kerja</th>
                    <th>Nilai Psikotes</th>
                    <th>Nilai Wawancara</th>
                    <th>Aksi</th>
                  </thead>
                  <tbody>
                    <?php
                      $query  = "SELECT * FROM data_calon_karyawan";
                      $result = $konek->query($query);
                      while ($row=$result->fetch_array(MYSQLI_ASSOC)) { ?>
                      <tr>
                        <td align="center"><?php echo $row['id']; ?></td>
                        <td align="center"><?php echo $row['namacalon']; ?></td>
                        <td align="center"><?php echo $row['IPK']; ?></td>
                        <td align="center"><?php echo $row['umur']; ?> Tahun</td>
                        <td align="center"><?php echo $row['pengalamanKerja']; ?> Tahun</td>
                        <td align="center"><?php echo $row['nilaiPsikotest']; ?></td>
                        <td align="center"><?php echo $row['nilaiWawancara']; ?></td>

                        <td align="center">
                          <a class="btn btn-info btn-icon-split"
                            href="data_calon_karyawan_ubah.php?id=<?php echo $row['id'] ?>">
                            <span class="icon text-white">
                              <i class="fas fa-edit"></i>
                            </span>
                          </a>
                          <a class="btn btn-danger btn-icon-split"
                            href="data_calon_karyawan_hapus.php?id=<?php echo $row['id'] ?>">
                            <span class="icon text-white">
                              <i class="fas fa-trash"></i>
                            </span>
                          </a>
                        </td>
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