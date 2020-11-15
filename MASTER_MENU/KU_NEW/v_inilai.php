<?php //session_start();
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
<form name="form1" method="post" action="">
  <table width="600" border="0" cellspacing="0" cellpadding="0" class="table">
    <tr>
      <th height="52" scope="col"><input name="cari" type="text" id="cari" size="40" placeholder="Masukkan Kode Mata Kuliah" class="form-control"></th>
      <th scope="col"><select name="sms" id="sms" class="form-control">
        <option>Pilih Semester</option>
        <?php
		$sm = mysql_query("select * from semester order by idmain asc limit 100");
  while($smm = mysql_fetch_array($sm)){
  $th = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$smm[idtahun_ajaran]'");
  $thh = mysql_fetch_array($th);
  echo"<option value=$smm[idsemester]>$smm[semester] &nbsp; $thh[ajaran] &nbsp; $smm[ajaran]  </option>";
  }
		?>
      </select></th>
      <th scope="col"><input name="cari_data" type="submit" id="cari_data" value="Cari Kode Matkul" class="btn btn-primary"></th>
    </tr>
    <tr>
      <th colspan="2" scope="col"><div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">X</button>
  Anda bisa mencari mata kuliah yang anda ampu dengan mengetikkan kode mata kuliah dan atau pilih semester yang anda kehendaki kemudian klik 'Cari Kode Matkul' untuk menampilkan  data anda. Kemudian masukkan nilai mahasiswa anda. Pastikan data yang anda input sudah benar. </div></th>
      <th scope="col">&nbsp;</th>
    </tr>
  </table>
</form>
<h3>&nbsp;</h3>
<hr color="#FF8040">
<?php
//switch(@mysql_real_escape_string($_GET['sks'])){
//case'edit_sks':
//include"edit_sks.php";
//break;
//case'edit_praktikum':
//include"edit_praktikum.php";
//break;


?>
<?php
if($kjj['akt4']=="TA"){
 echo"<center><h3>WAKTU PENGISIAN NILAI SUDAH HABIS</h3></center>";
 }else{
 ?>
<table width="100%" border="0" align="center" bgcolor="#CECECE" class="table table-bordered">
  <tr align="center" bgcolor="#E4E4E4">
    <td width="142" height="35">Kode Matkul </td>
    <td width="237">Mata Kuliah </td>
    <td width="156">Semester</td>
    <td width="56">Jumlah SKS </td>
    <td width="102">Action</td>
  </tr>
  <?php
  if(isset($_POST['cari_data'])){
  $kod = @mysql_real_escape_string($_POST['cari']);
  $sms = @mysql_real_escape_string($_POST['sms']);
  $sks = mysql_query("select * from sks where iddosen='$dsnn[iddosen]' and idsks LIKE '%$kod%' and idsemester='$sms' order by idsemester asc limit 2000");
  while($skss = mysql_fetch_array($sks)){
  $sm = mysql_query("select * from semester where idsemester='$skss[idsemester]'");
$smm = mysql_fetch_array($sm);
 //$dsn1 = mysql_query("select * from dosen where iddosen='$skss[iddosen]'");
//$dsnn1 = mysql_fetch_array($dsn);
$kj = mysql_query("select * from kejuruan where idkejuruan='$skss[idkejuruan]'");
//$kj = mysql_query("select * from kejuruan where idkejuruan='$dsnn[idkejuruan]'");
$kjj = mysql_fetch_array($kj);
$kr  = mysql_query("select * from kurikulum where idkurikulum='$skss[idkurikulum]'");
$krr = mysql_fetch_array($kr);
  
  ?>
 <?php
 
 ?>
  <tr align="center" bgcolor="#FFFFFF">
    <td height="50"><?php echo"<a href=#>$skss[idsks]</a><br>$kjj[kejuruan]<br>$skss[idkelas]"; ?></td>
    <td><?php echo"<b>$krr[judul]</b><br>
	<u>Oleh &nbsp; $dsnn[nama]</u>
	"; ?></td>
    <td><?php echo"$smm[semester]<br><b><font color=blue>$skss[hari]</font><br> $skss[jam]  WIB<br>
	Ruang &nbsp; $skss[idruang]
	</b>"; ?></td>
    <td><?php echo"$skss[jumlah]&nbsp;SKS<br>Kuota &nbsp; $skss[kuota]"; ?><br>
      <?php 
	$mhs = mysql_query("select * from krs where idsks='$skss[idsks]' and app='2'");
	$jummhs = mysql_num_rows($mhs);
	?>
      <?php echo"<a href=# onClick=MM_openBrWindow('ctk_absen_harian.php?kddsn=$kddsn&idsks=$skss[idsks]','','scrollbars=yes,width=800,height=800')>"; ?>
      <?php
	
	echo"Diambil &nbsp; $jummhs</a> "; ?></td>
    <td><?php echo"<a href=# onClick=MM_openBrWindow('inilai_krs.php?kddsn=$kddsn&idsks=$skss[idsks]','','scrollbars=yes,width=800,height=700')>INPUT NILAI </a><br>BTS WKT &nbsp;$skss[batas_dosen]"; ?></td>
  </tr>

 
  <?php
  
  }
   }
  ?>
</table>
<?php
}
?>
  <h3><br>
  </h3>
</body>
</html>
<?php
}
?>