<?php
include_once "koneksi.php";
$calon_karyawan = $_GET['query'];
$sql = "SELECT * from data_calon_karyawan WHERE kecepatan LIKE '%".$calon_karyawan."%' OR harga LIKE '%".$calon_karyawan."%' OR listrik LIKE '%".$calon_karyawan."%' OR keuntungan LIKE '%".$calon_karyawan."%' ORDER BY id_alat ASC";
$query = $konek->query($sql);
$result = $query->fetch_all(MYSQLI_ASSOC);

foreach($result as $data) {
    $response['suggestions'][] = [
        'value'         => $data['alatmining'],
        'id_alternatif' => $data['id_alat'],
        'alatmining'    => $data['alatmining'],
        'harga'         => $data['harga'],
        'kecepatan'     => $data['kecepatan'],
        'listrik'       => $data['listrik'],
        'keuntungan'    => $data['keuntungan'],
    ];
}

echo json_encode($response);
