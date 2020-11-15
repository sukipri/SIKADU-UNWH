<?php session_start();
 include_once"../sc/conek.php";

	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
 ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>REKAPTULASI KEUANGAN</title>
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
a:link {
	color: #000099;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #000099;
}
a:hover {
	text-decoration: none;
	color: #000099;
}
a:active {
	text-decoration: none;
	color: #000099;
}
-->
</style></head>

<body>
<table width="100%" border="0" bgcolor="#00B058">
  <tr align="center" bgcolor="#FFFFFF">
    <td width="36%" height="45">
	<?php 
	$kdmhs = @mysql_real_escape_string($_GET['kdmhs']);
$mhs = mysql_query("select * from mahasiswa where idmahasiswa='$kdmhs'");
$mhss = mysql_fetch_array($mhs);
	echo"
	<a href=# onClick=MM_openBrWindow('vdku.php?kdmhs=$kdmhs','','scrollbars=yes,width=800,height=800')> "; ?><img src="../img/bill%20of%20document.png" width="39" height="43" border="0"> <br>
    LAPORAN KEUANGAN SEMESTER</a></td>
    <td width="33%"><?php 
	
	echo"
	<a href=# onClick=MM_openBrWindow('vdku2.php?kdmhs=$kdmhs','','scrollbars=yes,width=800,height=800')> "; ?>      <img src="../img/bill%20of%20document.png" width="39" height="43" border="0"><br>
LAPORAN KEUANGAN SKS </td>
    <td width="27%"><?php 
	
	echo"
	<a href=# onClick=MM_openBrWindow('vdku3.php?kdmhs=$kdmhs','','scrollbars=yes,width=800,height=800')> "; ?>      <img src="../img/bill%20of%20document.png" width="39" height="43" border="0"><br>
LAPORAN KEUANGAN SPI</a></td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF">
    <td height="45"><?php 
	
	echo"
	<a href=# onClick=MM_openBrWindow('vdku4.php?kdmhs=$kdmhs','','scrollbars=yes,width=800,height=800')> "; ?><img src="../img/bill%20of%20document.png" width="39" height="43" border="0"><br>
LAPORAN KEUANGAN TOTAL</a></td>
    <td><?php 
	
	echo"
	<a href=# onClick=MM_openBrWindow('vdku5.php?kdmhs=$kdmhs','','scrollbars=yes,width=800,height=800')> "; ?><img src="../img/bill%20of%20document.png" width="39" height="43" border="0"><br>
LAPORAN KEUANGAN PKM </a></td>
    <td><img src="../img/bill%20of%20document.png" width="39" height="43" border="0"><br>
LAPORAN KEUANGAN CUTI </td>
  </tr>
</table>

</body>
</html>
<?php
}
?>