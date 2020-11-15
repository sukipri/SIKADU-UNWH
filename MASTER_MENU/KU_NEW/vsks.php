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
<h4>Management SKS <a href="?ku=csks">[Pencarian SKS </a>]</h4>
<hr color="#FF8040">
 <?php
  $idsks = @mysql_real_escape_string($_GET['idsks']);
  if(isset($_GET['idsks'])){
  mysql_query("delete from sks where idsks='$idsks'");
   echo "<script language='javascript'>alert('SKS  Berhasil di hapus')</script>";
	echo "<script language='javascript'>window.location = '?ku=vsks'</script>";
	exit();
	}
  ?>
<?php
switch(@mysql_real_escape_string($_GET['sks'])){
case'edit_sks':
include"edit_sks.php";
break;
case'edit_praktikum':
include"edit_praktikum.php";
break;

}
?>
<form name="form1" method="post" action="">
  <select name="nama" id="nama">
    <option>-------kode Program Studi-----------</option>
    <?php
		 $fak = mysql_query("select * from kejuruan order by idkejuruan");
		 while($fakk = mysql_fetch_array($fak)){
		 
		 echo"
		 <option value=$fakk[idkejuruan]>$fakk[idkejuruan]&nbsp; / &nbsp;$fakk[kejuruan]&nbsp;$fakk[progdi]</option>";
		 }
		 
		 ?>
  </select>
  <input name="cari" type="submit" id="cari" value="cari sks">
   
</form>


  <table width="100%" border="0" align="center" bgcolor="#7DFF7D" class="table table-bordered">
    <tr align="center" class="danger">
      <td width="142" height="35">Kode Mapel</td>
      <td width="160">Judul</td>
      <td width="160">Semester</td>
      <td width="81">Jumlah </td>
      <td width="150">Action</td>
    </tr>
	<?php
   if(isset($_POST['cari'])){
   $nama = @mysql_real_escape_string($_POST['nama']);
  $sks = mysql_query("select * from sks where idkejuruan='$nama'  order by idsemester asc limit 2000");
  while($skss = mysql_fetch_array($sks)){
  $sm = mysql_query("select * from semester where idsemester='$skss[idsemester]'");
$smm = mysql_fetch_array($sm);
 $dsn = mysql_query("select * from dosen where iddosen='$skss[iddosen]'");
$dsnn = mysql_fetch_array($dsn);
$kj = mysql_query("select * from kejuruan where idkejuruan='$skss[idkejuruan]'");
$kjj = mysql_fetch_array($kj);
$kr  = mysql_query("select * from kurikulum where idkurikulum='$skss[idkurikulum]'");
$krr = mysql_fetch_array($kr);
  
  ?>
   
    <?php
   if($skss['app']=="1"){
  ?>
    <tr align="center" bgcolor="#FFFFFF">
      <td height="50"><?php echo"<a href=#>$skss[idsks]</a><br>$kjj[kejuruan]"; ?></td>
      <td><?php echo"<b>$krr[judul]</b><br>
	<u>Oleh &nbsp; $dsnn[nama]</u><br>$skss[idkelas]
	"; ?></td>
      <td><?php echo"$smm[semester]<br><b><font color=blue>$skss[hari]</font><br> $skss[jam]  WIB<br>
	Ruang &nbsp; $skss[idruang]
	</b>"; ?></td>
      <td><?php echo"Sks &nbsp;$skss[jumlah]<br>kuota &nbsp;$skss[kuota]"; ?><br>
      <?php 
	$mhs = mysql_query("select * from krs where idsks='$skss[idsks]'");
	$jummhs = mysql_num_rows($mhs);
	
	echo"Diambil &nbsp; $jummhs "; ?></td>
      <td><a href=<?php echo"?ku=vsks&sks=edit_sks&kdsks=$skss[idsks]"; ?>><img src="../img/edit-32.png" width="32" height="32" border="0"></a>&nbsp;
          <?php
	echo"
	<a href=# onClick=MM_openBrWindow('mabsen.php?kddsn=$skss[iddosen]&idsks=$skss[idsks]','','scrollbars=yes,width=500,height=800')>"; ?>
          <img src="../img/bookmark-32.png" width="32" height="32" border="0" title="cetak& input absensi">&nbsp;<?php echo"<a href=?ku=vsks&idsks=$skss[idsks]>"; ?><img src="../img/error-32.png" width="32" height="32"></a></td>
    </tr>
    <?php
  }elseif($skss['app']=="2"){
  
 
  
  ?>
    <tr align="center" bgcolor="#FFFFFF">
      <td height="50"><?php echo"<a href=#>$skss[idsks]</a><br>$kjj[kejuruan]"; ?></td>
      <td><?php echo"<b>$krr[judul]</b><br>
	<u>Oleh &nbsp; $dsnn[nama]</u>
	"; ?></td>
      <td><?php echo"$smm[semester]<br><b><font color=blue>$skss[hari]</font><br> $skss[jam]  WIB <br>	Ruang &nbsp; $skss[idruang]</b>"; ?></td>
      <td><?php echo"$skss[jumlah]"; ?></td>
      <td><a href=<?php echo"?pilih=vsks&sks=edit_sks&kdsks=$skss[idsks]"; ?>><img src="../img/edit-32.png" width="32" height="32" border="0"></a>&nbsp;
          <?php
	echo"
	<a href=# onClick=MM_openBrWindow('mabsen.php?kddsn=$skss[iddosen]&idsks=$skss[idsks]','','scrollbars=yes,width=500,height=800')>"; ?>
          <img src="../img/bookmark-32.png" width="32" height="32"><img src="../img/error-32.png" width="32" height="32"></td>
    </tr>
    <?php
  }
   }
  
   
  ?>
</table>

  <?php
  }
  ?>
  
  <!--<h3><br>
    SKS PRAKTKUM</h3>
  <table width="715" border="0" align="center" bgcolor="#FF8040">
    <tr align="center" bgcolor="#7DFF7D">
      <td width="142" height="35">Kode Mapel</td>
      <td width="237">Judul</td>
      <td width="156">Semester</td>
      <td width="56">Jumlah </td>
      <td width="102">Action</td>
    </tr>
    <?php
  $psks1 = mysql_query("select * from praktikum ");
  while($pskss1 = mysql_fetch_array($psks1)){
   $sks1 = mysql_query("select * from kurikulum where idkurikulum='$pskss1[idkurikulum]'");
 $skss1 = mysql_fetch_array($sks1);
  $sm1 = mysql_query("select * from semester where idsemester='$pskss1[idsemester]'");
$smm1 = mysql_fetch_array($sm1);
 $dsn1 = mysql_query("select * from dosen where iddosen='$pskss1[iddosen]'");
$dsnn1 = mysql_fetch_array($dsn1);
$kj1 = mysql_query("select * from kejuruan where idkejuruan='$dsnn1[idkejuruan]'");
$kjj1 = mysql_fetch_array($kj1);
 
  ?>
    <?php
   if($pskss1['idkelas']=="A"){
  ?>
    <tr align="center" bgcolor="#FFA477">
      <td height="50"><?php echo"<a href=#>$pskss1[idpraktikum]</a><br>$kjj1[kejuruan]"; ?></td>
      <td><?php echo"<b>$skss1[judul]</b><br>
	<u>Oleh &nbsp; $dsnn1[nama]</u>
	"; ?></td>
      <td><?php echo"$smm1[semester]<br><b><font color=blue>$pskss1[hari]</font><br> $pskss1[jam]  WIB<br>
	Ruang &nbsp; $pskss1[idruang]
	</b>"; ?></td>
      <td><?php echo"$pskss1[jumlah]"; ?></td>
      <td><a href=<?php echo"?pilih=vsks&sks=edit_praktikum&idpr=$pskss1[idpraktikum]&iddosen=$pskss1[iddosen]&idkurikulum=$pskss1[idkurikulum]"; ?>><img src="../img/edit-32.png" width="32" height="32" border="0"></a>
          <?php
	echo"
	<a href=# onClick=MM_openBrWindow('mabsen2.php?kddsn=$pskss1[iddosen]&idsks=$pskss1[idpraktikum]','','scrollbars=yes,width=500,height=800')>"; ?>
          <img src="../img/bookmark-32.png" width="32" height="32"></td>
    </tr>
    <?php
  }elseif($pskss1['idkelas']=="B"){
  
 
  
  ?>
    <tr align="center" bgcolor="#FF9797">
      <td height="50"><?php echo"<a href=#>$pskss1[idpraktikum]</a><br>$kjj1[kejuruan]"; ?></td>
      <td><?php echo"<b>$skss1[judul]</b><br>
	<u>Oleh &nbsp; $dsnn1[nama]</u>
	"; ?></td>
      <td><?php echo"$smm1[semester]<br><b><font color=blue>$pskss1[hari]</font><br> $pskss1[jam]  WIB<br>
	Ruang &nbsp; $pskss1[idruang]
	</b>"; ?></td>
      <td><?php echo"$pskss1[jumlah]"; ?></td>
      <td><a href=<?php echo"?pilih=vsks&sks=edit_praktikum&idpr=$pskss1[idpraktikum]&iddosen=$pskss1[iddosen]&idkurikulum=$pskss1[idkurikulum]"; ?>><img src="../img/edit-32.png" width="32" height="32" border="0"></a>&nbsp;
          <?php
	echo"
	<a href=# onClick=MM_openBrWindow('mabsen2.php?kddsn=$pskss1[iddosen]&idsks=$pskss1[idpraktikum]','','scrollbars=yes,width=500,height=800')>"; ?>
          <img src="../img/bookmark-32.png" width="32" height="32"></td>
    </tr>
    <?php
  }
   }
   
  ?>
  </table>
  -->


<table width="229" border="0">
  <tr>
    <td width="95" height="44" bgcolor="#FFA477">AKTIF</td>
    <td width="124" bgcolor="#FF9797">DISABLE</td>
  </tr>
</table>

</body>
</html>
<?php
}
?>