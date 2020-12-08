<?php session_start();
 include_once"../sc/conek.php";

	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
	$u = mysql_query("select * from user where namauser='$_SESSION[namauser]'");
	$uu = mysql_fetch_array($u);
	
 ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>CETAK TRANSKRIP SKS</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
</head>
<?php
$kdmhs=@mysql_real_escape_string($_GET['kdmhs']);
 $mhs = mysql_query("select * from mahasiswa where idmahasiswa='$kdmhs'");
$mhss = mysql_fetch_array($mhs);
 $mhsak = mysql_query("select * from user_mhs where idmahasiswa='$kdmhs'");
$mhssak = mysql_fetch_array($mhsak);
$ang = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$mhss[idtahun_ajaran]'");
$angg = mysql_fetch_array($ang);
$kj = mysql_query("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
$kjj = mysql_fetch_array($kj);
$fak = mysql_query("select * from fakultas where idfakultas='$kjj[idfakultas]'");
$fakk = mysql_fetch_array($fak);
$kl = mysql_query("select * from kelas where idkelas='$mhss[idkelas]'");
$kll = mysql_fetch_array($kl);
$rsem = mysql_query("select * from rekamsemester where idmahasiswa='$kdmhs' and app='2' order by idrekamsemester asc limit 1");
$rsemm = mysql_fetch_array($rsem);

$sm = mysql_query("select * from semester where idsemester='$mhss[idsemester]'");
$smm = mysql_fetch_array($sm);
$us = mysql_query("select * from user_mhs where idmahasiswa='$mhss[idmahasiswa]'");
$uss = mysql_fetch_array($us);
$ft = mysql_query("select * from foto_mhs where idmahasiswa='$mhss[idmahasiswa]'");
  $ftt  = mysql_fetch_array($ft);
  ?>
<body>
<table width="100%" border="0" align="center">
  <tr>
    <td width="10%"><img src="../img/logokecil.gif" width="81" height="78"></td>
    <td width="90%" align="center"><h3>UNIVERSITAS WAHID HASYIM <br>DAFTAR PRESTASI AKADEMIK MAHASISWA</h3></td>
  </tr>
</table>
<h3>&nbsp;</h3>

<table width="100%" border="0" align="center">
  <tr>
    <td width="17%">Nama Lengkap </td>
    <td width="52%"><?php echo"$mhss[nama]"; ?></td>
    <td width="15%">Fakultas</td>
    <td width="16%"><?php echo"$fakk[fakultas]"; ?></td>
  </tr>
  <tr>
    <td>NIM</td>
    <td><?php echo"$mhss[idmahasiswa]"; ?></td>
    <td>Jurusan/Progdi</td>
    <td><?php echo"$kjj[kejuruan]"; ?></td>
  </tr>
  <tr>
    <td>Tempat,tgl Lahir </td>
    <td><?php echo"$mhss[tgl_lahir]"; ?></td>
    <td>Status</td>
    <td>TERAKREDITASI</td>
  </tr>
</table><hr color="#000000">
<table width="100%" border="0" align="center" bgcolor="#000000">
  <tr align="center" bgcolor="#FFFFFF">
    <td width="237" height="35">MATA KULIAH </td>
    <td width="156">NILAI</td>
    <td width="116">JUMLAH</td>
    <td width="116">MUTU</td>
  </tr>
  <?php
  	$krs = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]'");
  	while($krss = mysql_fetch_array($krs)){
  	$sks = mysql_query("select * from sks where idsks='$krss[idsks]' ");
	$skss = mysql_fetch_array($sks);
 	 $sm = mysql_query("select * from semester where idsemester='$skss[idsemester]'");
	$smm = mysql_fetch_array($sm);
 	$dsn = mysql_query("select * from dosen where iddosen='$skss[iddosen]'");
	$dsnn = mysql_fetch_array($dsn);
	$kj = mysql_query("select * from kejuruan where idkejuruan='$dsnn[idkejuruan]'");
	$kjj = mysql_fetch_array($kj);
	$kr  = mysql_query("select * from kurikulum where idkurikulum='$skss[idkurikulum]'");
	$krr = mysql_fetch_array($kr);
  
  ?>
  <tr align="center" bgcolor="#FFFFFF">
    <td height="50"><?php echo"<b>$krr[judul]</b><br><i>$krr[juduleng]</i><br>
	<u>Oleh &nbsp; $dsnn[nama]</u><br>
	"; ?>
    </td>
    <td><?php echo"$krss[angka]"; ?></td>
    <td><?php 
	
	
	echo"$krss[jumlah]";
	?>
    </td>
    <td>&nbsp;</td>
  </tr>
   <?php
  }
  ?>
  <tr align="center" bgcolor="#FFFFFF">
    <td colspan="2" rowspan="2">&nbsp;</td>
    <td height="50">Total KRS</td>
    <td><?php
	
	$k = mysql_query("select sum(jumlah) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2'  ");
	$kk = mysql_fetch_array($k);
	echo"<br><b>$kk[kr]</b>";
	
	
	
	 ?></td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF">
    <td height="50">IPS</td>
    <td><?php
	$rk = mysql_query("select  sum(ip) as ips from rekamsemester where idmahasiswa='$kdmhs'");
$rkk = mysql_fetch_array($rk);
	echo"$rkk[ips]";
	
	 ?></td>
  </tr>
</table>
<h4><br>
  <br>
  <br>
  
  
</h4>
</body>
</html>
<?php
}
?>