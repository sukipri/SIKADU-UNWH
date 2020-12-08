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
<style type="text/css">
<!--
.style343 {font-size: 24px}
.style1 {
	color: #990000;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<form name="form1" method="post" action="">
<table width="624" align="center">
  <tr>
    <td width="616" valign="top"><span class="style343"><img src="../img/search2.png" width="44" height="50">[<a href="">Pencarian Mahsiswa</a>] per Progdi
      <hr color="#F27900">
    </span>*(Masukan Kode Mahasiwa yang sudah terdaftar</td>
  </tr>
  <tr>
    <td valign="top"><span class="style1">BELUM MELAKUKAN TINDAK KRS </span></td>
  </tr>
</table>
<select name="cari">
  <option>-------kode Program Studi-----------</option>
  <?php
		 $fak = mysql_query("select * from kejuruan order by idkejuruan");
		 while($fakk = mysql_fetch_array($fak)){
		 
		 echo"
		 <option value=$fakk[idkejuruan]>$fakk[idkejuruan]&nbsp; / &nbsp;$fakk[kejuruan]&nbsp;$fakk[progdi]</option>";
		 }
		 
		 ?>
</select>  
<input name="cari_data" type="submit" id="cari_data" value="Submit">  
  <table width="748" align="center" bgcolor="#00A854" class="table">
    <tr align="center" valign="top" bgcolor="#FFA477">
      <td width="26">#</td>
      <td width="238" height="28">NIM</td>
      <td width="145">Progdi</td>
      <td width="120">Semester</td>
      <td width="155">Nama</td>
      <td width="36">action</td>
    </tr>
    <?php 
  if(isset($_POST['cari_data'])){
$nama = mysql_real_escape_string($_POST['cari']);
$mhs = mysql_query("select * from mahasiswa where st='1' and idkejuruan='$nama' ");
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

  ?>
    <tr align="center" valign="top" bgcolor="#FFFFFF">
      <td width="26"><?php echo"$no"; ?></td>
      <td width="238" height="36"><?php echo"<font color=blue><b>$mhss[idmahasiswa]</b></font><br><font color=green><b>$uss[passuser]</b></font><br><b>$mhss[idkelas]</b>"; ?></td>
      <td width="145"><?php echo"$kjj[kejuruan]"; ?></td>
      <td width="120"><?php echo"<b>$smm[semester]</b>"; ?></td>
      <td width="155"><?php echo"$mhss[nama]"; ?></td>
      <td width="36"><a href="#"  onClick="MM_openBrWindow('m2_mhs.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="../img/bill%20of%20document.png" width="30" height="30" border="0" title="Management Mahasiswa" ></a>&nbsp;&nbsp;</td>
    </tr>
    <?php
	$no++;
}
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