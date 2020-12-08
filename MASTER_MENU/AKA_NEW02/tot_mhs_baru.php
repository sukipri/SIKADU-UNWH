<?php //session_start();
 include_once"../sc/conek.php";

	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
 ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
</head>

<body>
<h3>Total Mahasiswa <?php //$gel = mysql_query("select * from gelombang where aktif='Y'");
//$gell = mysql_fetch_array($gel); echo"$gell[tahun]"; ?>
</h3>
<hr color="#00A854">
<br>
<div class="container">
<table width="574" border="0" align="center" bgcolor="#7DFF7D" class="table table-bordered">
  <tr align="center" valign="top" bgcolor="#FFFFFF">
    <td height="32" colspan="3"><?php
include"grafik.php";
?></td>
  </tr>
  <tr align="center" valign="top" bgcolor="#7DFF7D">
    <td width="124" height="32">Kode Kejuruan </td>
    <td width="269">kejuruan</td>
    <td width="167">Jumlah mahasiwa </td>
  </tr>
  <?php
  $kj = mysql_query("select * from kejuruan order by kejuruan desc limit 200000");
  while($kjj = mysql_fetch_array($kj)){
  $fak = mysql_query("select * from fakultas where idfakultas='$kjj[idfakultas]'");
  $fakk = mysql_fetch_array($fak);
  $mhs = mysql_query("select * from mahasiswa where idkejuruan='$kjj[idkejuruan]'");
  $jum_mhs = mysql_num_rows($mhs);
  
  ?>
  <tr align="center" valign="top" bgcolor="#FFFFFF">
    <td height="36"><a href="#" onClick="MM_openBrWindow('detail_mhs_kejuruan.php<?php echo"?idfak=$kjj[idkejuruan]"; ?>','','scrollbars=yes,width=700,height=900')"><?php echo"<b>$kjj[idkejuruan]</b></a>"; ?></td>
    <td bgcolor="#FFFFFF"><?php echo"<b>$kjj[kejuruan]<br><font color=blue>$fakk[fakultas]</font></b>"; ?></td>
    <td><?php echo"<font color=#004080><b>$jum_mhs</b></font>"; ?></td>
  </tr>
  <?php
  }
  ?>
</table>
</div>
</body>
</html>
<?php
}
?>
