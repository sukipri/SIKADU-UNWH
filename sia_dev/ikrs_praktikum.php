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
</head>

<body>
<br><br>
<h3><?php echo"<a href=?mng=ikrs&kdmhs=$kdmhs>INPUT KRS PRAKTIKUM</a>"; ?> |&nbsp; INPUT KRS  </h3>
<hr color="#FF8040">
 <?php

if($mhss['st']==1){

echo"<center><h1>MAAF SEGERA LAKUKAN PEMBAYARAN SKS</h1></center>";
}else{

  
  ?>
<form name="form1" method="post" action="">
<table width="100%" border="0" align="center" bgcolor="#FFFFFF">
  <tr align="center" bgcolor="#7DFF7D">
    <td width="142" height="35">Kode Mapel</td>
    <td width="237">Judul</td>
    <td width="156">Semester</td>
    <td width="56">Jumlah </td>
    <td width="102">Action</td>
  </tr>
   <?php
   $krs = mysql_query("select * from p_sks where idmahasiswa='$mhss[idmahasiswa]'  ");
$krss = mysql_num_rows($krs);
if($krss >= 5){

echo"<center>Maaf Anda sudah memilih KRS Praktikum</center>";
}else{

  
  ?>
  <?php
  

  $psks = mysql_query("select * from praktikum where idkejuruan='$mhss[idkejuruan]'   order by idsemester asc limit 2000");
  $no = 1;
  while($pskss = mysql_fetch_array($psks)){
 //$sks = mysql_query("select * from sks where idsks='$pskss[idsks]' ");
//$skss = mysql_fetch_array($sks);

 $dsn = mysql_query("select * from dosen where iddosen='$pskss[iddosen]'");
$dsnn = mysql_fetch_array($dsn);
$kj = mysql_query("select * from kejuruan where idkejuruan='$dsnn[idkejuruan]'");
$kjj = mysql_fetch_array($kj);
$kr  = mysql_query("select * from kurikulum where idkurikulum='$pskss[idkurikulum]'");
$krr = mysql_fetch_array($kr);
  $sm = mysql_query("select * from semester where idsemester='$krr[idsemester]'");
$smm = mysql_fetch_array($sm);
  
  ?>
  <tr align="center" bgcolor="#DBDBDB">
    <td height="50"><?php echo"<a href=#>$pskss[idpraktikum]</a><br>$kjj[kejuruan]"; ?></td>
    <td><?php echo"<b>$krr[judul]</b><br>
	<u>Oleh &nbsp; $dsnn[nama]</u><br>Dari &nbsp;$smm[semester]
	"; ?></td>
    <td><?php echo"$smm[semester]<br><b><font color=blue>$pskss[hari]</font><br> $pskss[jam]  WIB <br>	Ruang &nbsp; $pskss[idruang]</b>"; ?></td>
    <td><?php echo"$pskss[jumlah]"; ?></td>
    <td>
	<?php
	 $krs1 = mysql_query("select * from p_sks where idpraktikum='$pskss[idpraktikum]'  ");
	$krss1 = mysql_fetch_array($krs1);
	if($krss1['app']==2){
	echo"sudah di ambil";
	}elseif($krss1['app']==1){
	echo"Belum di proses jumlah";
	}else{
	?>
	<?php echo"<a href=?mng=ikrs_praktikum&kdmhs=$kdmhs&idpr=$pskss[idpraktikum]>"; ?>
	<img src="../img/add-32.png"><?php echo"</a>"; ?>
	<?php
	}
	?>
	
	</td>
  </tr>
  <?php
  
  }
  ?>
  <tr>
    <td colspan="3" align="center" valign="top">&nbsp; </td>
    <td align="center" valign="top"><?php
	//$s = @mysql_query("select sum(jumlah) as sk from praktikum where idkejuruan='$kjj[idkejuruan]' and kelas='$mhss[kelas]' and idsemester='$mhss[idsemester]'");
	//$ss = mysql_fetch_array($s);
	
	//echo"<b>$ss[sk]</b>";
	 ?></td>
    <td>&nbsp;</td></tr>
</table>
<br><center>
</center>

</form>
<?php
if(isset($_GET['idpr'])){
$idpr = @mysql_real_escape_string($_GET['idpr']);
//$idsks = @mysql_real_escape_string($_GET['idsks']);
mysql_query("insert into p_sks(idp_sks,idpraktikum,idmahasiswa,idsemester)values('','$idpr','$kdmhs','$mhss[idsemester]')");
 echo "<script language='javascript'>alert('KRS PRATIKUM  Berhasil di simpan ke database')</script>";
	echo "<script language='javascript'>window.location = '?mng=ikrs_praktikum&kdmhs=$kdmhs'</script>";
	exit();
//$jum_sks = mysql_query("select * from p_sks where idmahasiswa='$mhss[idmahasiswa]'");
//$jum_sks_02 = mysql_num_rows($jum_sks);
//if($jum_sks_02 > 5){

 
//}else{
//$jumMK = @$_POST['jumMK'];
//$mk2 = @$_POST['mk2'];



//for($i = 1; $i<= $jumMK; $i++){ $mk = @$_POST['mk'.$i];
//if(!empty($mk)){
//mysql_query("insert into p_sks(idp_sks,idpraktikum,idmahasiswa)values('','$mk','$kdmhs')");
//}
//}


//}
//}
//}
}
}
}
?>
</body>
</html>
<?php
}

?>