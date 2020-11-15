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
<style type="text/css">
<!--
.style343 {font-size: 24px}
-->
</style>

<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
</head>

<body>
<form name="form1" method="post" action="">
  <table width="624" align="center">
    <tr>
      <td width="616" valign="top"><span class="style343"><img src="../img/search2.png" width="44" height="50">Pencarian Mahsiswa 
        <hr color="#F27900">
      </span>*(Masukan Kode Mahasiwa yang sudah terdaftar</td>
    </tr>
    <tr>
      <td valign="top">&nbsp;</td>
    </tr>
  </table>
  <div align="center">
    <input name="cari" type="text" class="style343" id="cari" size="37">
    <input name="cari_data" type="submit" class="style343" id="cari_data2" value="cari mahasiswa">
  </div>
</form><br>
<table width="775" align="center" bgcolor="#FF7735">
  <tr align="center" valign="top" bgcolor="#FFA477">
    <td width="38" rowspan="2" valign="middle">#</td>
    <td width="226" rowspan="2" valign="middle">NIM</td>
    <td width="145" rowspan="2" valign="middle">Progdi</td>
    <td width="120" rowspan="2" valign="middle">Semester</td>
    <td width="155" rowspan="2" valign="middle">Nama</td>
    <td width="63" height="28" colspan="2">action</td>
  </tr>
  
  
	<?php 
  if(isset($_POST['cari_data'])){
$nama = mysql_real_escape_string($_POST['cari']);
$mhs = mysql_query("select * from mahasiswa WHERE  idmahasiswa LIKE '%$nama%' ");
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
    <tr align="center" valign="top" bordercolor="#CEE7FF" bgcolor="#FFA477">
      <td height="36">UAS</td>
      <td>UTS</td>
    </tr>
  <tr align="center" valign="top" bordercolor="#CEE7FF" bgcolor="#FFA477">
    <td width="38"><?php echo"$no"; ?></td>
    
	<td width="226" height="36"><?php echo"<font color=blue><b>$mhss[idmahasiswa]</b></font><br><font color=green><b>$uss[passuser]</b><br><b>$mhss[idkelas]</b>"; ?></td>
    <td width="145"><?php echo"$kjj[kejuruan]"; ?></td>
    <td width="120"><?php echo"<b>$smm[semester]</b>"; ?></td>
    <td width="155"><?php echo"$mhss[nama]"; ?></td>
    <td width="30"><a href="#"  onClick="MM_openBrWindow('ctk_kartu_ujian.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="../img/bill%20of%20document.png" width="30" height="30" border="0" title="Cetak Kartu Ujian Ahir" ></a>&nbsp;&nbsp;</td>
    <td width="31">&nbsp;</td>
  </tr>
	



<?php
$no++;
}
}

?>
</table>
   
<?php

?>



</body>
</html>
<?php
}
?>