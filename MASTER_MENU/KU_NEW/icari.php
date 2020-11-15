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
  <table width="622" align="center" class="table">
    <tr>
      <td colspan="3" valign="top"><span class="style343"><img src="../img/search2.png" width="44" height="50">Pencarian Mahsiswa / FAKULTAS
          <hr color="#F27900">
      </span>*(Masukan Kode Mahasiwa yang sudah terdaftar</td>
    </tr>
    <tr>
      <td width="234" valign="top"><select name="cari" class="form-control">
        <option>-------kode Program Studi-----------</option>
        <?php
		 $fak = mysql_query("select * from kejuruan where idfakultas='$uu[idfakultas]' order by idkejuruan");
		 while($fakk = mysql_fetch_array($fak)){
		 
		 echo"
		 <option value=$fakk[idkejuruan]>$fakk[idkejuruan]&nbsp; / &nbsp;$fakk[kejuruan]&nbsp;$fakk[progdi]</option>";
		 }
		 
		 ?>
      </select>        </td>
      <td width="142" valign="top"><select name="ang" id="ang" class="form-control">
        <option>------------Tahun.......</option>
        <?php
		 $aj = mysql_query("select * from tahun_ajaran order by ajaran asc limit 200");
		 while($ajj = mysql_fetch_array($aj)){
		 
		 echo"
		 <option value=$ajj[idtahun_ajaran]>$ajj[ajaran]</option>";
		 }
		 
		 ?>
      </select></td>
      <td width="230" valign="top"><input name="cari_data" type="submit" id="cari_data" value="Submit" class="btn btn-success">
<a href="?ku=icari3">BERDASARKAN NIM</a></td>
    </tr>
  </table>
  <div align="center">
  </div>
</form><br>
<table width="100%" align="center" bgcolor="#8AFF8A" class="table">
  <tr align="center" valign="top" bgcolor="#8AFF8A">
    <td width="51">#</td>
    <td width="149" height="28">NIM</td>
    <td width="191">Progdi</td>
    <td width="178">Semester</td>
    <td width="325">Nama</td>
    <td width="193">action</td>
  </tr>
  
  
	  <?php 
  if(isset($_POST['cari_data'])){
$nama = mysql_real_escape_string($_POST['cari']);
$ang = mysql_real_escape_string($_POST['ang']);
$mhs = mysql_query("select * from mahasiswa where idkejuruan='$nama' and idtahun_ajaran='$ang' and idtahun_ajaran='$ang' and mhs='2' or mhs='3' ");
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
    <td width="51"><?php echo"$no"; ?></td>
    
	<td width="149" height="36"><?php echo"<font color=blue><b>$mhss[idmahasiswa]</b></font><br><br><b>$mhss[idkelas]</b>"; ?>
	<br>
        <?PHP 
	  
	  if($mhss['mhs']==2){
	  echo"<b><font color=green>AKTIF</font></b>";
	  }elseif(
	  $mhss['mhs']==1){
	  echo"<b><font color=grey>NON-AKTIF</font></b>";
	  }elseif(
	  $mhss['mhs']==3){
	  echo"<b><font color=blue>CUTI</font></b>";
	  }elseif(
	  $mhss['mhs']==4){
	  echo"<b><font color=#006666>LULUS</font></b>";
	  }elseif(
	  $mhss['mhs']==5){
	  echo"<b><font color=red>KELUAR</font></b>";
	  
	   }elseif(
	  $mhss['mhs']==6){
	  echo"<br><b><font color=red>TRANSFER</font></b>";
	  }
	  
	   ?></td>
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