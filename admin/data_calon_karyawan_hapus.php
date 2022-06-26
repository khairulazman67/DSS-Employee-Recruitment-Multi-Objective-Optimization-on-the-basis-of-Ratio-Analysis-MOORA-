<?php
session_start();
include_once '../db/koneksi.php';

$id   = $_GET['id'];
$sql       = "DELETE FROM data_calon_karyawan WHERE id = '$id' ";
$query     = mysqli_query($konek, $sql);
if ($query) {
  echo "<script>alert('Data Berhasil Di Hapus') </script>";
  echo "<script>window.location.href = \"data_calon_karyawan.php\" </script>";
} else {
  echo "<script>alert ('Data Belum Terhapus')</script>";
  echo "<script>window.location.href = \"data_calon_karyawan.php\" </script>";
}
 ?>
