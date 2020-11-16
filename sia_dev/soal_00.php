<?php session_start();
 include_once"../sc/conek.php";
	include"css.php";
	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    echo"MENDING KOE LOGIN SEK OG";
	} else {
	$u = mysql_query("select * from user_mhs where idmahasiswa='$_SESSION[namauser]'");
	$uu = mysql_fetch_array($u);
	
 ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<title>KUISIONER</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	padding-top: 70px;
}
.style1 {font-size: 27px; color:#007AF4;}
.style2 {font-size: 18px}
-->
</style>
</head>

<body>
<?php
	$tahun = @mysql_real_escape_string($_GET['tahun']);
	$kdmhs=@mysql_real_escape_string($_GET['kdmhs']);
	$idsks=@mysql_real_escape_string($_GET['idsks']);
	$kdsks=@mysql_real_escape_string($_GET['kdsks']);
 	$mhs = mysql_query("select * from mahasiswa where idmahasiswa='$uu[idmahasiswa]'");
	$mhss = mysql_fetch_array($mhs);
	 $sm01 = mysql_query("select * from semester where idsemester='$mhss[idsemester]'");
$smm01 = mysql_fetch_array($sm01);
	?>

<center>


</center>
<hr color="#0066CC"> 
 <div class="navbar navbar-default navbar-fixed-top" >
 <center>
<span class="style1"><a href="<?php echo"soal_00.php?kdmhs=$uu[idmahasiswa]"; ?>">CBT-Q </a>[Computer Base Test - Question]</span>
</center>
</div>

 <table width="600" border="0" class="table">
   <tr>
     <td align="center"><h4>MAKUL ANDA </h4></td>
     <td align="center"><h4>HASIL CBT-Q </h4></td>
   </tr>
   <tr>
     <td width="341"><div style="overflow:auto;width:auto;height:450px;padding:10px;border:1px solid #eee">
<?php
  $krs = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]' and idsemester='$mhss[idsemester]' ");
  while($krss = mysql_fetch_array($krs)){
  $sks = mysql_query("select * from sks where idsks='$krss[idsks]' ");
$skss = mysql_fetch_array($sks);
  $sm = mysql_query("select * from semester where idsemester='$skss[idsemester]'");
$smm = mysql_fetch_array($sm);
 $dsn = mysql_query("select * from dosen where iddosen='$skss[iddosen]'");
$dsnn = mysql_fetch_array($dsn);
$kj = mysql_query("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
$kjj = mysql_fetch_array($kj);
$kr  = mysql_query("select * from kurikulum where idkurikulum='$skss[idkurikulum]'");
$krr = mysql_fetch_array($kr);

?>
<div class="panel panel-danger">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo"$krr[judul] / $skss[idsks]"; ?></h3>
  </div>
  <div class="panel-body">
   <?php 
     $sks01 = mysql_query("select * from sks where idsks='$skss[idsks]' ");
$skss01 = mysql_fetch_array($sks01);
  $kr01 = mysql_query("select * from kurikulum where idkurikulum='$skss01[idkurikulum]' ");
$krr01 = mysql_fetch_array($kr01);
$bs = mysql_query("select sum(nilai) as nl from bank_soal where idsks='$skss[idsks]'");
$bss = mysql_fetch_array($bs);
   ?>
   <?php echo"-$krr01[judul]-<br>-$krr01[juduleng]-<br>"; ?>
	Jumlah Nilai <?php echo"$bss[nl]"; ?>
	<br><br><a href="#" onClick="MM_openBrWindow('<?php echo"soal_01.php?idsks=$skss[idsks]"; ?>','','scrollbars=yes,width=900,height=500')" class="btn btn-danger">Kerjakan CBT-Q</a>
  </div>
</div><?php
}
?></div></td>
     <td width="249" valign="top"><?php echo"<center><h5>Semester &nbsp; $smm01[semester]</h5></center>"; ?>
	 <?php
  $krs11 = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]' and idsemester='$mhss[idsemester]' ");
  while($krss11  = mysql_fetch_array($krs11)){
  $sks11  = mysql_query("select * from sks where idsks='$krss11[idsks]' ");
$skss11  = mysql_fetch_array($sks11);
  $sm11  = mysql_query("select * from semester where idsemester='$skss11[idsemester]'");
$smm11  = mysql_fetch_array($sm11);
 $dsn11  = mysql_query("select * from dosen where iddosen='$skss11[iddosen]'");
$dsnn11  = mysql_fetch_array($dsn11 );
$kj11  = mysql_query("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
$kjj11  = mysql_fetch_array($kj11);
$kr11   = mysql_query("select * from kurikulum where idkurikulum='$skss11[idkurikulum]'");
$krr11  = mysql_fetch_array($kr11);

?>
<?php echo"<li>$krr11[judul]</li>"; ?>
<?php
}
?></td>
   </tr>
 </table>
</div>
</body>
</html>
<?php
}
?>