<?php //session_start();
ob_start();
 include_once"../sc/conek.php";
//include "excel_reader2.php";
	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
	$u = mysql_query("select * from user where namauser='$_SESSION[namauser]'");
	$uu = mysql_fetch_array($u);
 ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<script type="text/javascript" language="JavaScript">
 function konfirmasi()
 {
 tanya = confirm("Anda Yakin Akan Menghapus SKS ?");
 if (tanya == true) return true;
 else return false;
 }</script>
<body>

<?php @$kjby = @mysql_real_escape_string($_GET['kjby']); ?>
<?php if(isset($_GET['kjby'])){ ?>
<form name="form1" method="post" action="">
  <h4>PREVIEW BIAYA GLOBAL </h4>
  <br>
  <?php
  
  $BatasAwal = 100;
if (!empty($_GET['page'])) {
$hal = $_GET['page'] - 1;
$MulaiAwal = $BatasAwal * $hal;

} else if (!empty($_GET['page']) and $_GET['page'] === 1) {
$MulaiAwal = 0;
} else if (empty($_GET['page'])) {
$MulaiAwal = 0; } 
?>
  <table width="600" border="0" class="table">
    <tr class="success">
      <td>#</td>
      <td height="33"><strong>PRODI</strong></td>
      <td><strong>KELAS</strong></td>
      <td><strong>NAMA</strong>&nbsp; <a href="#dwn">PAGGING</a></td>
      <td><strong>NIM</strong></td>
      <td><strong>KODE,REMARK &amp; KETERANGAN </strong></td>
    </tr>
	<?PHP 
		$no = $MulaiAwal + 1 ;
		
		$km = mysql_query("select * from mahasiswa where idkejuruan='$kjby'  LIMIT $MulaiAwal , $BatasAwal");
		while($kmm = mysql_fetch_array($km)){
		$fakj = mysql_query("select * from kejuruan where idkejuruan='$kmm[idkejuruan]'");
		 $fakkj = mysql_fetch_array($fakj);
		 $gl = mysql_query("select * from gelombang where idgelombang='$kmm[idgelombang]'");
$gll = mysql_fetch_array($gl);
		
	 ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td height="36"><?php echo"$fakkj[kejuruan]<br>$gll[gelombang] / $gll[tahun]"; ?></td>
      <td><?php echo"$kmm[kode_kelas]"; ?></td>
      <td><?php echo"$kmm[nama]"; ?></td>
      <td><?php echo"$kmm[idmahasiswa]"; ?></td>
      <td><?php 
	  $by = mysql_query("select * from biaya_02 where NIM='$kmm[idmahasiswa]'");
		
		while($byy = mysql_fetch_array($by)){
		$k1 = @number_format($byy['NOMINAL'],"0","",".");
			echo"$byy[REMARK]&nbsp;[$byy[TGL]]-[$byy[THN] / $byy[KODE]-$k1&nbsp;$byy[KETERANGAN]"; ?><br>
		<?php
		
			}
			$jumby = mysql_query("select sum(NOMINAL) as totby from biaya_02 where NIM='$kmm[idmahasiswa]'");
		$jumbyy = mysql_fetch_array($jumby);
		$k3 = @number_format($jumbyy['totby'],"0","",".");
		echo"<hr>";
			
			echo"TOTAL:&nbsp;Rp.$k3";
		 ?></td>
    </tr>
	<?php
	$no++;
	}
	
	
	?>
	
    <tr>
      <td height="36"><div id="total"></div></td>
      <td height="36">&nbsp;</td>
      <td>&nbsp;</td>
      <td height="36">&nbsp;</td>
      <td height="36">TOTAL</td>
      <td height="36">&nbsp;</td>
    </tr>
	
  </table>
  <ul class="pagination pagination-sm" id="dwn">
     <?php

$cekQuery = mysql_query("SELECT * FROM mahasiswa where idkejuruan='$kjby'");
$jumlahData = mysql_num_rows($cekQuery);
if ($jumlahData > $BatasAwal) {
//echo '<br/><center><div style="font-size:10pt;">Page : ';
$a = explode(".", $jumlahData / $BatasAwal);
$b = $a[0];
$c = $b + 1;
for ($i = 1; $i <= $c; $i++) {
//echo '<a style="text-decoration:none;';
if (@$_GET['page'] == $i) {
//echo 'color:red';
}

?>

  
 
<li><a href="<?php echo"?aka=vbiaya_global&kjby=$kjby&page=$i"; ?>" class="btn btn-default"><?php echo"$i"; ?></a></li>
 
 

<?php
}
//echo '</div></center>';
}

?>
</ul>
</form>
<?php
}
?>
</body>
</html>
<?php
}
?>