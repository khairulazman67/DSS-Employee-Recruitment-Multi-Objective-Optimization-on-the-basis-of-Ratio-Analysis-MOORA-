<?php
	
	$host     = 'localhost';
	$user     = 'root';
  $password = 'root';
  $db       = 'spk_karyawan';

	$konek = new mysqli($host,$user,$password,$db);
  if ($konek->connect_errno) {
    echo "gagal". $konek->connect_errno;}
  else {
    //echo "berhasil";
  }
 ?>
