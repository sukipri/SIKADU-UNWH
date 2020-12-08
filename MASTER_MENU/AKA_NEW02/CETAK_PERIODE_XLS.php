<?php  include_once"../sc/conek.php";  ?>
<?php $tg = date("d-m-Y");
	$rd = rand('99','88');
	$PRD=@mysql_real_escape_string($_GET['PRD']);
	$JUR=@mysql_real_escape_string($_GET['JUR']);
 ?>
<?php // Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");

// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=PERIODE_$PRD.xls"); 

include"CETAK_PERIODE_XLS_JADI.php";
?>