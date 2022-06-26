<?php
// fungsi untuk mengambil url data json
function UrlJson($value)
{

	// menampilkan jika ada error pada saat mengambil data
	$json_error = array (
		JSON_ERROR_DEPTH                 => 'Maksimum kedalaman JSON terlampaui',
		JSON_ERROR_STATE_MISMATCH        => 'Format JSON tidak valid',
		JSON_ERROR_CTRL_CHAR             => 'Control Character Error, Mungkin jenis encoding tidak sesuai',
		JSON_ERROR_SYNTAX                => 'Syntax error, Apakah string mengandung karakter escape?',
		JSON_ERROR_UTF8                  => 'Terdapat character non UTF-8, Mungkin jenis encoding tidak sesuai',
		JSON_ERROR_RECURSION             => 'Terdapat recursive pada nilai yang di encode',
		JSON_ERROR_INF_OR_NAN            => 'Terdapat nilai INF atau NAN pada string',
		JSON_ERROR_UNSUPPORTED_TYPE      => 'Terdapat nilai yang tidak dapat di encode',
		JSON_ERROR_INVALID_PROPERTY_NAME => 'Terdapat nama property yang tidak dapat di encode',
		JSON_ERROR_UTF16                 => 'Terdapat character non UTF-16, Mungkin jenis encoding tidak sesuai'
	);

	// untuk mengambil api youtube dengan json
	$url    = $value;
	$data   = file_get_contents($url);
	$decode = json_decode($data, true);

	// menampilkan apa bila terjadi error
	$last_error = json_last_error();
	if ($last_error == 0) {
		// print_r($decode);
	} else {
		echo $json_error[$last_error];
	}

  // mengembalikan hasil
	return $decode;

}

// fungsi untuk format rupiah
function formatDollar($angka)
{

	$hasil_rupiah = "$. ".number_format($angka, 0);
	return $hasil_rupiah;
 
}
// untuk data cryptocurrencies
$url  = UrlJson("https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest?start=1&limit=500&convert=USD&CMC_PRO_API_KEY=3ee84e1e-cb04-40e4-b21c-2e8b8b2d2262");
$data = $url['data'];
?>

<?php include_once 'atribut/head.php'; ?>

<style>
  div.dataTables_wrapper
  div.dataTables_filter {
    text-align: left;
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
        <h3>Selamat Datang Pada Sistem Pendukung Keputusan Penerimaan Karyawan Baru Perumda Tirta Pase Menggunakan Metode Multi Objective Optimization On The Basis Of Radio Analysus (MOORA)
Akses Sistem
</h3>
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
<script type = "text/javascript">

  var untukDatatables = function () {
    $('#tabel-criptocurrencies-dt').DataTable({
      ordering: false,
      pageLength: 100,
      lengthMenu: [100, 200, 300, 400],
      dom: "<'row'<'col-sm-6'f><'col-sm-6'p>>",
      language: {
        paginate: {
          next: '<i class="fa fa-arrow-right"></i>',
          previous: '<i class="fa fa-arrow-left"></i>',
          first: '<i class="fa fa-step-arrow-left"></i>',
          last: '<i class="fa fa-step-arrow-right"></i>'
        }
      }
    });
  }();

  function khashConverter() {
    document.converter.mhash.value = document.converter.khash.value / 1000
    document.converter.ghash.value = document.converter.khash.value / 1000000
    document.converter.thash.value = document.converter.khash.value / 1000000000
  }

  function mhashConverter() {
    document.converter.khash.value = document.converter.mhash.value * 1000
    document.converter.ghash.value = document.converter.mhash.value / 1000
    document.converter.thash.value = document.converter.mhash.value / 1000000
  }

  function ghashConverter() {
    document.converter.khash.value = document.converter.ghash.value * 1000000
    document.converter.mhash.value = document.converter.ghash.value * 1000
    document.converter.thash.value = document.converter.ghash.value / 1000
  }

  function thashConverter() {
    document.converter.khash.value = document.converter.thash.value * 1000000000
    document.converter.mhash.value = document.converter.thash.value * 1000000
    document.converter.ghash.value = document.converter.thash.value * 1000
  }
  
  // eksekusi jquery
  jQuery(document).ready(function () {
    untukDatatables;
  });
</script>