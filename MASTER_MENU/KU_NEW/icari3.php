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
  <table width="624" align="center" class="table">
    <tr class="success">
      <td width="385" valign="top"><span class="style343"><img src="../img/search2.png" width="44" height="50">Pencarian Mahsiswa / NIM
          <hr color="#F27900">
      </span>*(Masukan Kode Mahasiwa yang sudah terdaftar</td>
      <td width="227" valign="top"><a href="#" onClick="MM_openBrWindow('vuser_mahasiswa.php','','scrollbars=yes,width=700,height=700')" class="btn btn-primary btn-lg">USER MAHASIWA </a></td>
    </tr>
    <tr class="danger">
      <td valign="top"><input name="cari" type="text" class="form-control" id="cari" size="37">        </td>
      <td valign="top"><input name="cari_data" type="submit" class="style343" id="cari_data" value="cari mahasiswa"></td>
    </tr>
  </table>
  <div align="center">
  </div>
</form><br>
<table width="100%" align="center" bgcolor="#8AFF8A" class="table table-bordered">
  <tr align="center" valign="top" class="success">
    <td width="51">#</td>
    <td width="149" height="28">NIM</td>
    <td width="191">Progdi</td>
    <td width="178">Semester</td>
    <td width="325">Nama</td>
    <td width="193">KET</td>
  </tr>
  
  
	  <?php 
  if(isset($_POST['cari_data'])){
$nama = mysql_real_escape_string($_POST['cari']);
$mhs = mysql_query("select * from mahasiswa where idmahasiswa LIKE '%$nama%' ");
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
  <tr align="center" valign="top" bgcolor="#FFFFFF" class="table table-bordered">
    <td width="51"><?php echo"$no"; ?></td>
    
	<td width="149" height="36"><?php echo"<font color=blue><b>$mhss[idmahasiswa]</b></font><br><br><b>$mhss[idkelas]</b>"; ?></td>
    <td width="191"><?php echo"$kjj[kejuruan]"; ?></td>
    <td width="178"><?php echo"<b>$smm[semester]</b>"; ?></td>
    <td width="325"><?php echo"$mhss[nama]"; ?></td>
    <td width="193"><?php
		if($mhss['uas']==1){
			?>
			
			<span class="label label-danger">UAS Belum Aktif</span>
			<?php
		}else{
		?>
		<span class="label label-success">UAS Aktif</span>
		<?php
		}
	
	
	?> <br> <?php
		if($mhss['uts']==1){
			?>
			
			<span class="label label-danger">UTS Belum Aktif</span>
			<?php
		}else{
		?>
		<span class="label label-success">UTS Aktif</span>
		<?php
		}
	
	
	?></td>
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