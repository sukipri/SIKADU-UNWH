<?php  include_once"../sc/conek.php";  ?>
<?php $tg = date("d-m-Y");
	$rd = rand('99','88');
	$idkj = @mysql_real_escape_string($_GET['idkj']);  
	$idsm = @mysql_real_escape_string($_GET['idsm']);  
    $fak = mysql_query("select * from kejuruan where idkejuruan='$idkj'");
		 $fakk = mysql_fetch_array($fak);
 ?>
<?php // Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");

// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=resi_mhs-$fakk[kejuruan].xls"); 

include"ctk_resi_mahasiswa.php";
?>