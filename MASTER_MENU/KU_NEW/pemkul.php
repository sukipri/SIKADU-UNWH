<?php session_start();
 include_once"../sc/conek.php";

	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
	$u = mysql_query("select * from user where namauser='$_SESSION[namauser]'");
	$uu = mysql_fetch_array($u);
 ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Proses Pembayaran Kuliah</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">


<style type="text/css">
<!--
body,td,th {
	font-size: 13px;
}
a {
	font-size: 13px;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
.sb {font-size: 30px}
-->
</style></head>

<body>
<?php 
$kdmhs = @mysql_real_escape_string($_GET['kdmhs']);
$mhs = mysql_query("select * from mahasiswa where idmahasiswa='$kdmhs'");
$mhss = mysql_fetch_array($mhs);
$kj = mysql_query("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
$kjj = mysql_fetch_array($kj);
$ack = rand("22","11");
$ang = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$mhss[idtahun_ajaran]'");
$angg = mysql_fetch_array($ang);
$bi = mysql_query("select * from biaya_kuliah where idkejuruan='$mhss[idkejuruan]' and idkelas='$mhss[idkelas]' and idtahun_ajaran='$angg[idtahun_ajaran]'"); 
$bii = mysql_fetch_array($bi); 
$sm = mysql_query("select * from semester where idsemester='$mhss[idsemester]'");
$smm = mysql_fetch_array($sm);
//$krs = mysql_query("select * from krs where  and idmahasiswa='$mhss[idmahasiswa]'");
//$krss = mysql_fetch_array($krs);

$k1 = @number_format($bii['spi'],"0","",".");
$k2 = @number_format($bii['sks'],"0","",".");
$k3 = @number_format($bii['semester'],"0","",".");
$k4 = @number_format($bii['registrasi'],"0","",".");
$k5 = @number_format($bii['pkm'],"0","",".");
$k6 = @number_format($bii['do'],"0","",".");

 ?>
<h3>Proses pembayaran Kuliah <a href="<?php echo"?kdmhs=$kdmhs"; ?>"><img src="../img/home-32.png" width="32" height="32" border="0"></a></h3>

<hr color="#FF8040">

  <form name="form2" method="post" action="">
  <?php
  if(isset($_POST['pindah'])){
	$semester = @$_POST['semester'];
	@mysql_query("update mahasiswa set idsemester='$semester' where idmahasiswa='$kdmhs'");
	 echo "<script language='javascript'>alert('semester   Berhasil di simpan ke UPDATE')</script>";
	echo "<script language='javascript'>window.location = '?kdmhs=$kdmhs'</script>";
	exit();
	}
  ?>
    <table width="100%" border="0" align="center" >
      <tr valign="middle" bgcolor="#7DFF7D">
        <td width="178" height="29">NPM</td>
        <td width="406"><?php echo"<b>$mhss[idmahasiswa]</b>";  ?></td>
      </tr>
      <tr valign="middle" bgcolor="#FFCCCC">
        <td height="21">Nama Mahasiswa </td>
        <td><?php echo"<b>$mhss[nama]</b>"; ?></td>
      </tr>
      <tr valign="middle" bgcolor="#7DFF7D">
        <td height="21">Semester<br>
		
		*(<strong>jika sudah lunas lakukan perpindahan semester</strong></td>
        <td><?php echo"<b>$smm[semester] - $angg[ajaran]-$smm[ajaran]</b>"; ?><hr>
          <select name="semester" id="semester">
            <option>pilihh semester........</option>
            <?php 
	  $sem = mysql_query("select * from semester  order by idsemester asc limit 100");
	  while($semm = mysql_fetch_array($sem)){
	  $thn = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$semm[idtahun_ajaran]'");
	  $thnn = mysql_fetch_array($thn);
	    if($mhss['idsemester']==$semm['idsemester']){echo"<option value=$semm[idsemester] selected>$semm[semester]&nbsp; $thnn[ajaran]&nbsp;$semm[ajaran]</option>";
		}else{
	  echo"<option value=$semm[idsemester]>$semm[semester]&nbsp; $thnn[ajaran]&nbsp;$semm[ajaran]</option>";
	  }
	  }
	  ?>
          </select>
        <input name="pindah" type="submit" id="pindah" value="pidah semester"></td>
      </tr>
      <tr valign="middle" bgcolor="#FFCCCC">
        <td height="21">Kelas</td>
        <td><?php echo"<b>$kjj[kejuruan]</b>"; ?></td>
      </tr>
      <tr valign="middle" bgcolor="#FFCCCC">
        <td height="21">Tahun Ajaran </td>
        <td><?php echo"<b>$angg[ajaran]</b>"; ?></td>
      </tr>
      <tr valign="middle" bgcolor="#FFFFFF"> </tr>
    </table>
  </form>
  <?php
switch(@mysql_real_escape_string($_GET['pemkul'])){
case'i_pemkul_semester':
include"i_pemkul_semester.php";
break;
case'i_pemkul_sks':
include"i_pemkul_sks.php";
break;
case'i_pemkul_registrasi':
include"i_pemkul_registrasi.php";
break;
case'i_bea_reg':
include"i_bea_reg.php";
break;
case'i_bea_semester':
include"i_bea_semester.php";
break;
case'i_bea_sks':
include"i_bea_sks.php";
break;
case'i_pemkul_spi':
include"i_pemkul_spi.php";
break;
case'itotalbiaya':
include"itotalbiaya.php";
break;
case'i_pemkul_pkm':
include"i_pemkul_pkm.php";
break;
case'i_pemkul_do':
include"i_pemkul_do.php";
break;
}
?>

  <form name="form1" method="post" action="<?php echo"pemkul2.php?kdmhs=$kdmhs"; ?>">
  <br><table width="100%" border="0" align="center" bgcolor="#FF8040">
    <tr align="center" valign="middle" bgcolor="#FFFFFF">
      <td width="92" height="71"><a href="?pemkul=i_pemkul_pkm<?php echo"&kdmhs=$kdmhs"; ?>"><img src="../img/remove-from-cart-32.png" width="32" height="32" border="0"><br>
      PKM</a></td>
      <td width="137">	  <a href="?pemkul=i_pemkul_semester<?php echo"&kdmhs=$kdmhs"; ?>"><img src="../img/remove-from-cart-32.png" width="32" height="32" border="0"><br>
      SPP / Semester </a></td>
      <td width="132"><a href="?pemkul=i_pemkul_sks<?php echo"&kdmhs=$kdmhs"; ?>"><img src="../img/remove-from-cart-32.png" width="32" height="32" border="0"><br>
      SKS</a></td>
      <td width="134"><a href="#"><img src="../img/remove-from-cart-32.png" width="32" height="32" border="0"><br>
      Praktikum</a></td>
    </tr>
    <tr align="center" valign="middle" bgcolor="#FFFFFF">
      <td height="75"><a href="?pemkul=i_pemkul_spi<?php echo"&kdmhs=$kdmhs"; ?>"><img src="../img/remove-from-cart-32.png" width="32" height="32" border="0"><br>
      SPI</a></td>
      <td><a href="?pemkul=i_pemkul_do<?php echo"&kdmhs=$kdmhs"; ?>"><img src="../img/remove-from-cart-32.png" width="32" height="32" border="0"><br>
  Dana Oprasiona</a>l</td>
      <td><a href="?pemkul=i_pemkul_registrasi<?php echo"&kdmhs=$kdmhs"; ?>"><img src="../img/remove-from-cart-32.png" width="32" height="32" border="0"><br>
Registrasi</a></td>
      <td><a href="#"><img src="../img/remove-from-cart-32.png" width="32" height="32" border="0"><br>
CUTI</a></td>
    </tr>
    <tr align="center" valign="middle" bgcolor="#FFFFFF">
      <td height="76"><a href="?pemkul=i_bea_semester<?php echo"&kdmhs=$kdmhs"; ?>"><img src="../img/remove-from-cart-32.png" width="32" height="32" border="0"><br>
SPP / Semester(beasiswa) </a></td>
      <td><a href="?pemkul=i_bea_reg<?php echo"&kdmhs=$kdmhs"; ?>"><img src="../img/remove-from-cart-32.png" width="32" height="32" border="0"><br>
Registrasi(beasiswa)</a></td>
      <td><a href="?pemkul=itotalbiaya<?php echo"&kdmhs=$kdmhs"; ?>"><img src="../img/add-to-cart-32.png" width="32" height="32" border="0"><br>
      Pembayaran Total </a></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
<br>

</body>
</html>
<?php
}
?>