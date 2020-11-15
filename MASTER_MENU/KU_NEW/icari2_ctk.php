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
      <td width="616" colspan="2" valign="top"><span class="style343"><img src="../img/search2.png" width="44" height="50">Pencarian Mahsiswa /<a href="">Cari PerProdi
      </a>        <hr color="#F27900">
      </span>
	  <div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">X </button>
 Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede 
</div>
	  *(Masukan Kode Mahasiwa yang sudah terdaftar</td>
    </tr>
    <tr>
      <td valign="top"><input name="cari" type="text" class="form-control" id="cari" size="37">      </td>
      <td valign="top"><input name="cari_data" type="submit" id="cari_data3" value="cari mahasiswa" class="btn btn-info"></td>
    </tr>
  </table>
  <div align="center">  </div>
</form><br>
<div class="container">
<table width="100%" align="center" bgcolor="#FF7735" class="table table-bordered">
  <tr align="center" valign="top" bgcolor="#FFA477">
    <td width="31" height="36" valign="middle">#</td>
    <td width="220" valign="middle">NIM</td>
    <td width="104" valign="middle">Progdi</td>
    <td width="119" valign="middle">Semester</td>
    <td width="321" valign="middle">Nama</td>
    <td width="34" valign="middle">UAS</td>
    <td width="30" valign="middle">UTS</td>
    <td width="31" valign="middle">KRS</td>
    <td width="32" valign="middle">KHS</td>
    <td width="87" valign="middle">TRANSKRIP</td>
  </tr>
  
  
	<?php 
  if(isset($_POST['cari_data'])){
$nama = mysql_real_escape_string($_POST['cari']);
$mhs = mysql_query("select * from mahasiswa WHERE idmahasiswa LIKE '%$nama%' ");
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
 $rsem = mysql_query("select * from rekamsemester where idmahasiswa='$mhss[idmahasiswa]' and idsemester='$mhss[idsemester]'");
	$rsemm = mysql_fetch_array($rsem);

  ?>
  <tr align="center" valign="top" bordercolor="#CEE7FF" bgcolor="#FFFFFF">
    <td width="31"><?php echo"$no"; ?></td>
    
	<td width="220" height="36"><?php echo"<font color=blue><b>$mhss[idmahasiswa]</b></font><br><font color=green><b>$uss[passuser]</b><br><b>$mhss[idkelas]</b>"; ?></td>
    <td width="104"><?php echo"$kjj[kejuruan]"; ?></td>
    <td width="119"><?php echo"<b>$smm[semester]</b>"; ?></td>
    <td width="321"><?php echo"$mhss[nama]"; ?></td>
    <td width="34"><a href="#"  onClick="MM_openBrWindow('ctk_kartu_ujian.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="../img/bill%20of%20document.png" width="30" height="30" border="0" title="Cetak Kartu Ujian Ahir" ></a></td>
    <td width="30"><a href="#"  onClick="MM_openBrWindow('ctk_kartu_ujian_uts.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="../img/bill%20of%20document.png" width="30" height="30" border="0" title="Cetak Kartu Ujian Ahir" ></a></td>
    <td width="31"><a href="#"  onClick="MM_openBrWindow('../SU_admin/ctk_krs_mhs.php?<?php echo"kdmhs=$mhss[idmahasiswa]&idsm=$mhss[idsemester]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="../img/bill%20of%20document.png" width="30" height="30" border="0" title="Cetak Kartu Ujian Ahir" ></a></td>
    <td width="32"><a href="#"  onClick="MM_openBrWindow('../SU_admin/m2_mhs.php?<?php echo"mng=v_ikhs&kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="../img/bill%20of%20document.png" width="30" height="30" border="0" title="Cetak Kartu Ujian Ahir" ></a></td>
    <td width="87"><a href="#"  onClick="MM_openBrWindow('ctk_tran_sks.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="../img/bill%20of%20document.png" width="30" height="30" border="0" title="Cetak Kartu Ujian Ahir" ></a></td>
  </tr>
	



<?php
$no++;
}
}

?>
</table>
   </div>
<?php

?>



</body>
</html>
<?php
}
?>