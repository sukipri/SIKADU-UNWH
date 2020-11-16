<?php session_start();
 //include_once"../sc/conek.php";

	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
 ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>detail laporan semester</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
$kdmhs = @mysql_real_escape_string($_GET['kdmhs']);

$mhs = mysql_query("select * from mahasiswa where idmahasiswa='$kdmhs'");
$mhss = mysql_fetch_array($mhs);
$kj = mysql_query("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
$kjj = mysql_fetch_array($kj);
//$ack = rand("22","11");
$ang = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$mhss[idtahun_ajaran]'");
$angg = mysql_fetch_array($ang);
$bi = mysql_query("select * from biaya_kuliah where idkejuruan='$mhss[idkejuruan]' and idkelas='$mhss[idkelas]' and idtahun_ajaran='$angg[idtahun_ajaran]'"); 
$bii = mysql_fetch_array($bi); 
$sm = mysql_query("select * from semester where idsemester='$mhss[idsemester]'");
$smm = mysql_fetch_array($sm);
$bea = mysql_query("select * from bea where idbea='$mhss[idbea]'");
$beaa= mysql_fetch_array($bea);


?>
<table width="100%" border="0">
  <tr>
    <td><hr color="#000000"></td>
  </tr>
  <tr>
    <td align="center"><?php echo"<b>$kjj[kejuruan]&nbsp;$angg[ajaran]&nbsp; $mhss[idmahasiswa]&nbsp;&nbsp;<h3>LAP.PEM.SKS</h3></b>"; ?></td>
  </tr>
  <tr>
    <td><hr color="#000000"></td>
  </tr>
</table>
<?php

$by = mysql_query("select * from nota_sks where idmahasiswa='$kdmhs' order by idnota_sks asc limit 2000");
while($byy= mysql_fetch_array($by)){
$sm1 = mysql_query("select * from semester where idsemester='$byy[idsemester]'");
$smm1 = mysql_fetch_array($sm1);
$ang1 = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$smm1[idtahun_ajaran]'");
$angg1 = mysql_fetch_array($ang1);
$k = mysql_query("select sum(jumlah) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and idsemester='$byy[idsemester]'   ");
	$kk = mysql_fetch_array($k);
	

$kby1 = number_format($bii['sks'],"0","",".");
$kby2 = number_format($byy['pembayaran'],"0","",".");

?>
<table width="100%" border="0">
  <tr>
    <td colspan="2" bgcolor="#DBDBDB"><?php echo"<b>$smm1[semester]&nbsp; $angg1[ajaran] &nbsp;$smm1[ajaran]</b>"; ?></td>
  </tr>
  <tr>
    <td><?php echo"Biaya Per SKS&nbsp;<b>Rp.$kby1</b>"; 
				echo"<br>Pembayaran&nbsp;<b>Rp.$kby2</b>";
				echo"<br>TOTAL SKS&nbsp;<b>$kk[kr]</b>";
				echo"<br>Pada&nbsp;<b>$byy[tgl]</b>";
	
	?></td>
    <td><?php
		if($byy['bea']=="Y"){
		echo"<h3><font color=green>BEASISWA<br>$beaa[potongan]%</font></h3>";
		
		}elseif($byy['bea']=="T"){
		echo"<h3><font color=blue>REGULER</font></h3>";
		
		}
	
	
	?></td>
  </tr>
</table>
<?php
}
?>
</body>
</html>
<?php
}
?>