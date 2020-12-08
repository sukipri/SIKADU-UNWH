<?php session_start();
 include_once"../sc/conek.php";

	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
 ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Data Mahasiswa</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<style type="text/css">
<!--
.style343 {font-size: 24px}
-->
</style>
</head>

<body>
  <?php
  $idfak = @mysql_real_escape_string($_GET['idfak']);
		 $fak = mysql_query("select * from kejuruan where idkejuruan='$idfak'");
		$fakk = mysql_fetch_array($fak);
		 
		?>  
<form name="form1" method="post" action="">
<table width="624" align="center">
  <tr>
    <td width="616" valign="top"><span class="style343"><img src="../img/search2.png" width="44" height="50">Data Mahasiswa <?php echo"$fakk[kejuruan]"; ?>
        <hr color="#F27900">
    </span></td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
  </tr>
</table>


  <table width="748" align="center" bgcolor="#FFA477">
    <tr align="center" valign="top" bgcolor="#FFA477">
      <td width="24">#</td>
      <td width="115" height="28">NIM</td>
      <td width="123">NAMA</td>
      <td width="205">SMT SEKARANG</td>
      <td width="155">IPK</td>
      <td width="98">IPS</td>
    </tr>
    <?php 

$mhs = mysql_query("select * from mahasiswa where idkejuruan='$fakk[idkejuruan]' ");
$no = 1;
while($mhss = mysql_fetch_array($mhs)){

$kj = mysql_query("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
$kjj = mysql_fetch_array($kj);
$kj = mysql_query("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
$kjj = mysql_fetch_array($kj);
$gel = mysql_query("select * from gelombang where idgelombang='$mhss[idgelombang]'");
$gell = mysql_fetch_array($gel);
$sm = mysql_query("select * from semester where idsemester='$mhss[idsemester]'");
$smm = mysql_fetch_array($sm);
$us = mysql_query("select * from user_mhs where idmahasiswa='$mhss[idmahasiswa]'");
$uss = mysql_fetch_array($us);
$krs = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]'");
$krss = mysql_fetch_array($krs);

  ?>
    <tr align="center" valign="top" bgcolor="#FFFFFF">
      <td width="24"><?php echo"$no"; ?></td>
      <td width="115" height="36"> <?php echo"<a href=#  onClick=MM_openBrWindow('../SU_admin/m2_mhs.php?kdmhs=$mhss[idmahasiswa]','','scrollbars=yes,width=900,height=900')>
	  <font color=blue><b>$mhss[idmahasiswa]</b></font></a><br><b>$mhss[idkelas]</b>"; ?></td>
      <td width="123"><?php echo"$mhss[nama]"; ?></td>
      <td width="205"><?php echo"<b>$smm[semester]</b>"; ?></td>
      <td width="155"><?php $rekam = mysql_query("select * from rekamsemester where idmahasiswa='$mhss[idmahasiswa]' order by idrekamsemester asc limit 1");
$rekamm = mysql_fetch_array($rekam); echo"$rekamm[ip]"; ?></td>
      <td width="98"><?php
	$rk = mysql_query("select  sum(ip) as ips from rekamsemester where idmahasiswa='$mhss[idmahasiswa]'");
$rkk = mysql_fetch_array($rk);
	echo"IPS:&nbsp;$rkk[ips]";
	
	 ?></td>
    </tr>
    <?php
	$no++;
}


?>
  </table>
  <?php
  $jummhs= @mysql_num_rows($mhs);
echo"<center>$jummhs</center>";
?>
</form>
</body>
</html>
<?php
}
?>