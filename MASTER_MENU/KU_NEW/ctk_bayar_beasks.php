<?php session_start();
 include_once"../sc/conek.php";

	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
	$u = mysql_query("select * from user where namauser='$_SESSION[namauser]'");
	$uu = mysql_fetch_array($u);
	include"terbilang.php";
	
	//if(isset($_GET['kdmhs'])){
	
	//mysql_query("update mahasiswa set mhs='3' where idmahasiswa='$kdmhs'");
	
 ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>pembayaran semester</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>

<body>
<?php
$kdmhs =@ mysql_real_escape_string($_GET['kdmhs']);
$mhs = mysql_query("select * from mahasiswa where idmahasiswa='$kdmhs'");
$mhss = mysql_fetch_array($mhs);
$kj = mysql_query("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
$kjj = mysql_fetch_array($kj);
  $bea1 = mysql_query("select * from bea where idbea='$mhss[idbea]'");
  $beaa1 = mysql_fetch_array($bea1);
$bi = mysql_query("select * from biaya_kuliah where idkejuruan='$mhss[idkejuruan]' and idkelas='$mhss[idkelas]'"); 
$bii = mysql_fetch_array($bi); 
//$bayar1 = @mysql_real_escape_string($_POST['bayar1']);
//$p1 = @mysql_real_escape_string($_POST['p1']);

if(isset($_POST['simpan'])){
$spi = @mysql_real_escape_string($_POST['spi']);
$semester = @mysql_real_escape_string($_POST['semester']);
$sme = @mysql_real_escape_string($_POST['sm']);
$tot_sks = @mysql_real_escape_string($_POST['tot_sks']);
$d = date("y");
$day = date("d F Y");
$ack = rand("22","11");
$nim = "$kdmhs";
$o = $beaa1['potongan'];
	  $dis = $tot_sks / (100/$beaa1['potongan']);
	  $totdis = $tot_sks - $dis;
if($semester < $totdis){
echo"Maaf Pembayaran Kurang";
}else{
mysql_query("insert into nota_sks(idnota_sks,idmahasiswa,idsemester,tgl,biaya,pembayaran,iduser,bea)values('','$nim','$sme','$day','$tot_sks','$semester','$uu[iduser]','Y')");

mysql_query("update mahasiswa set st='2' where idmahasiswa='$kdmhs'");



?>


<table width="100%" border="0" align="center">
  <tr valign="top" bgcolor="#FFFFFF">
    <td width="267" height="77"><img src="../img/logo_dan_nama_3_2.gif" width="212" height="69"></td>
    <td width="291" align="center" valign="middle"><h2>Tanda Setoran <br>
	SKS
	</h2></td>
    <td width="209"><img src="../img/20110301122202963.jpg" width="121" height="69"></td>
  </tr>
</table>
<table width="100%" border="0" align="center" bgcolor="#00A854">
  <tr valign="top" bgcolor="#00A854">
    <td width="333" align="center">&nbsp;</td>
    <td width="415" align="center">&nbsp;</td>
  </tr>
</table>
<br>
<table width="100%" border="0" align="center" bgcolor="#00A854">
  <tr align="left" valign="middle" bgcolor="#FFFFFF">
    <td width="187" height="58">&nbsp;NIM</td>
    <td width="567"><?php echo"<b>&nbsp;$nim</b>"; ?></td>
  </tr>
  <tr align="left" valign="middle" bgcolor="#FFFFFF">
    <td height="61">&nbsp;Nama</td>
    <td><?php echo"&nbsp;$mhss[nama]"; ?></td>
  </tr>
  <tr align="left" valign="middle" bgcolor="#FFFFFF">
    <td height="44">&nbsp;Prodik</td>
    <td><?php echo"&nbsp;$kjj[kejuruan] &nbsp; $kjj[progdi]"; ?></td>
  </tr>
  <tr align="left" valign="middle" bgcolor="#FFFFFF">
    <td height="48">Terbilang</td>
    <td>&nbsp;#<?php echo Terbilang($semester); ?>#</td>
  </tr>
  <tr align="left" valign="middle" bgcolor="#FFFFFF">
    <td height="62">&nbsp;Jumlah Uang </td>
    <td><?php 
	$jum = number_format($semester,"0","",".");
	echo"&nbsp;Rp.$jum"; ?></td>
  </tr>
  <tr align="left" valign="middle" bgcolor="#FFFFFF">
    <td height="55">kembali</td>
    <td><?php $kmbl = $semester - $totdis; 
	$kmbl_2 = number_format($kmbl,"0","",".");
	echo"&nbsp;Rp.$kmbl_2"; ?></td>
  </tr>
  <tr align="center" valign="middle" bgcolor="#FFFFFF">
    <td height="99" colspan="2"><?php
	
	
	
	
	
	
	 ?>
      <?php 
	$k = mysql_query("select sum(jumlah) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' and idsemester='$mhss[idsemester]' ");
	$kk = mysql_fetch_array($k);
	
	
	$k1 = mysql_query("select sum(jumlah) as krp from p_sks where idmahasiswa='$mhss[idmahasiswa]' and app='2' and idsemester='$mhss[idsemester]'");
	$kk1 = mysql_fetch_array($k1);
	 $k = number_format($bii['sks'],"0","","."); 
	  $k_sks = number_format($tot_sks,"0","","."); 
	   $kdis = number_format($totdis,"0","","."); 
	  $ju_krs = $kk['kr'] + $kk1['krp'];
	
	echo" Jumlah sks yang di ambil <b>$ju_krs</b> &nbsp; Pembayaran per SKS &nbsp; Rp.$k &nbsp; total Biaya seluruh SKS &nbsp; $k_sks &nbsp;($kdis)"; ?></td>
  </tr>
  <tr align="right" valign="middle" bgcolor="#FFFFFF">
    <td height="99" colspan="2"><?php $d = date("d F Y"); echo"<b>Beasiswa &nbsp;$beaa1[potongan]% &nbsp;<i>$d</i></b>"; ?></td>
  </tr>
</table>
<br><br><table width="100%" border="0" align="center">
  <tr valign="top">
    <td width="333" align="center"><?php echo"Penerima <br><br><br>$mhss[nama]"; ?></td>
    <td width="415" align="center"><?php echo"SUPER ADMIN <br><br><br>$uu[nama]"; ?></td>
  </tr>
</table><br><br><br>
<table width="100%" border="0" align="center" bgcolor="#00A854">
  <tr valign="top">
    <td width="333" align="center"><span class="style1">Lembar Merah Untuk Bank Mandiri </span></td>
    <td width="415" align="center"><span class="style1">Lembar Putih Untuk Calon Mahasiswa </span></td>
  </tr>
</table>
<?php
}
}
?>
</body>
</html>
<?php
}
?>