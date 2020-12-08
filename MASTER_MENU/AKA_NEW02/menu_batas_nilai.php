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
<title>ON OFF BATAS NILAI</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<?php
if(isset($_GET['iduts01'])){
//dosen
$iduts01 = @mysql_real_escape_string($_GET['iduts01']);
//@mysql_query("update mahasiswa set uts='2' where idkejuruan='$iduts01'");
@mysql_query("update kejuruan set akt4='A' where idkejuruan='$iduts01'");
 echo "<script language='javascript'>alert('PENGAKTIFAN NILAI BERHASIL')</script>";
	echo "<script language='javascript'>window.location = '?aka=menu_batas_nilai'</script>";
	exit();
}

?>
<?php
if(isset($_GET['iduts02'])){
//dosen
$iduts02 = @mysql_real_escape_string($_GET['iduts02']);
//@mysql_query("update mahasiswa set uts='1' where idkejuruan='$iduts02'");
@mysql_query("update kejuruan set akt4='TA' where idkejuruan='$iduts02'");
 echo "<script language='javascript'>alert('DISABLE NILAI BERHASIL')</script>";
	echo "<script language='javascript'>window.location = '?aka=menu_batas_nilai'</script>";
	exit();
}

?>
<?php
if(isset($_GET['iduts03'])){
//KAJUR
$iduts03 = @mysql_real_escape_string($_GET['iduts03']);
//@mysql_query("update mahasiswa set uts='2' where idkejuruan='$iduts01'");
@mysql_query("update kejuruan set akt5='A' where idkejuruan='$iduts03'");
 echo "<script language='javascript'>alert('PENGAKTIFAN NILAI BERHASIL')</script>";
	echo "<script language='javascript'>window.location = '?aka=menu_batas_nilai'</script>";
	exit();
}

?>
<?php
if(isset($_GET['iduts04'])){
//kajur
$iduts04 = @mysql_real_escape_string($_GET['iduts04']);
//@mysql_query("update mahasiswa set uts='1' where idkejuruan='$iduts02'");
@mysql_query("update kejuruan set akt5='TA' where idkejuruan='$iduts04'");
 echo "<script language='javascript'>alert('DISABLE NILAI BERHASIL')</script>";
	echo "<script language='javascript'>window.location = '?aka=menu_batas_nilai'</script>";
	exit();
}

?>
<?php
if(isset($_GET['iduts05'])){
//dekan
$iduts05 = @mysql_real_escape_string($_GET['iduts05']);
//@mysql_query("update mahasiswa set uts='2' where idkejuruan='$iduts01'");
@mysql_query("update kejuruan set akt6='A' where idkejuruan='$iduts05'");
 echo "<script language='javascript'>alert('PENGAKTIFAN NILAI BERHASIL')</script>";
	echo "<script language='javascript'>window.location = '?aka=menu_batas_nilai'</script>";
	exit();
}

?>
<?php
if(isset($_GET['iduts06'])){
//dekan
$iduts06 = @mysql_real_escape_string($_GET['iduts06']);
//@mysql_query("update mahasiswa set uts='1' where idkejuruan='$iduts02'");
@mysql_query("update kejuruan set akt6='TA' where idkejuruan='$iduts06'");
 echo "<script language='javascript'>alert('DISABLE NILAI BERHASIL')</script>";
	echo "<script language='javascript'>window.location = '?aka=menu_batas_nilai'</script>";
	exit();
}

?>
<body>
<div class="container">
<table width="100%" border="0" align="center" bgcolor="#00F279" class="table table-bordered">
  <tr bgcolor="#FFFFFF">
    <td width="298"><h3>BATAS NILAI DOSEN /PROGDI </h3></td>
    <td width="391"><h3>KEPALA KEJURUAN </h3></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="54" align="left" valign="top"><?php  
		 $fak = mysql_query("select * from kejuruan  order by kejuruan");
		 while($fakk = mysql_fetch_array($fak)){
		 if($fakk['akt4']=="TA"){
		 echo"
		 <a href=?aka=menu_batas_nilai&iduts01=$fakk[idkejuruan]>
		$fakk[kejuruan]&nbsp;$fakk[progdi]</a>&nbsp;<b>$fakk[akt4]</b><br><br>";
		 }elseif(
		 $fakk['akt4']=="A"){
		 echo"
		 <a href=?aka=menu_batas_nilai&iduts02=$fakk[idkejuruan]>
		$fakk[kejuruan]&nbsp;$fakk[progdi]</a>&nbsp;<b>$fakk[akt4]</b><br><br>";
		}
		}
		 ?></td>
    <td valign="top" bgcolor="#FFFFFF"><?php  
		 $fak = mysql_query("select * from kejuruan  order by kejuruan");
		 while($fakk = mysql_fetch_array($fak)){
		 if($fakk['akt5']=="TA"){
		 echo"
		 <a href=?aka=menu_batas_nilai&iduts03=$fakk[idkejuruan]>
		$fakk[kejuruan]&nbsp;$fakk[progdi]</a>&nbsp;<b>$fakk[akt5]</b><br><br>";
		 }elseif(
		 $fakk['akt5']=="A"){
		 echo"
		 <a href=?aka=menu_batas_nilai&iduts04=$fakk[idkejuruan]>
		$fakk[kejuruan]&nbsp;$fakk[progdi]</a>&nbsp;<b>$fakk[akt5]</b><br><br>";
		}
		}
		 ?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td><h3>DEKAN</h3></td>
    <td><h3>WAKIL REKTOR 2 </h3></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td><?php  
		 $fak = mysql_query("select * from kejuruan  order by kejuruan");
		 while($fakk = mysql_fetch_array($fak)){
		 if($fakk['akt6']=="TA"){
		 echo"
		 <a href=?aka=menu_batas_nilai&iduts05=$fakk[idkejuruan]>
		$fakk[kejuruan]&nbsp;$fakk[progdi]</a>&nbsp;<b>$fakk[akt6]</b><br><br>";
		 }elseif(
		 $fakk['akt6']=="A"){
		 echo"
		 <a href=?aka=menu_batas_nilai&iduts06=$fakk[idkejuruan]>
		$fakk[kejuruan]&nbsp;$fakk[progdi]</a>&nbsp;<b>$fakk[akt6]</b><br><br>";
		}
		}
		 ?></td>
    <td>&nbsp;</td>
  </tr>
</table>
</div>
</body>
</html>
<?php
}
?>