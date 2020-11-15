<?php //session_start();
 include_once"../sc/conek.php";

	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
	//$u = mysql_query("select * from user where namauser='$_SESSION[namauser]'");
	//$uu = mysql_fetch_array($u);
 ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?php
if(isset($_GET['idk01'])){
//krs
$idk01 = @mysql_real_escape_string($_GET['idk01']);
@mysql_query("update mahasiswa set st='2',mhs='2' where idkejuruan='$idk01'");
@mysql_query("update kejuruan set akt='A' where idkejuruan='$idk01'");
 echo "<script language='javascript'>alert('PENGAKTIFAN KRS BERHASIL')</script>";
	echo "<script language='javascript'>window.location = '?ku=g_active'</script>";
	exit();
}

?>
<?php
if(isset($_GET['idk02'])){
//krs
$idk02 = @mysql_real_escape_string($_GET['idk02']);
@mysql_query("update mahasiswa set st='1',mhs='1' where idkejuruan='$idk02'");
@mysql_query("update kejuruan set akt='TA' where idkejuruan='$idk02'");
 echo "<script language='javascript'>alert('DISABLE KRS BERHASIL')</script>";
	echo "<script language='javascript'>window.location = '?ku=g_active'</script>";
	exit();
}

?>
<?php
if(isset($_GET['iduts01'])){
//UTS aktif
$iduts01 = @mysql_real_escape_string($_GET['iduts01']);
@mysql_query("update mahasiswa set uts='2' where idkejuruan='$iduts01'");
@mysql_query("update kejuruan set akttt='A' where idkejuruan='$iduts01'");
 echo "<script language='javascript'>alert('PENGAKTIFAN UTS BERHASIL')</script>";
	echo "<script language='javascript'>window.location = '?ku=g_active'</script>";
	exit();
}

?>
<?php
if(isset($_GET['iduts02'])){
//UTS
$iduts02 = @mysql_real_escape_string($_GET['iduts02']);
@mysql_query("update mahasiswa set uts='1' where idkejuruan='$iduts02'");
@mysql_query("update kejuruan set akttt='TA' where idkejuruan='$iduts02'");
 echo "<script language='javascript'>alert('DISABLE UTS BERHASIL')</script>";
	echo "<script language='javascript'>window.location = '?aka=g_active'</script>";
	exit();
}

?>
<?php
if(isset($_GET['iduas01'])){
//UTS aktif
$iduas01 = @mysql_real_escape_string($_GET['iduas01']);
@mysql_query("update mahasiswa set uas='2' where idkejuruan='$iduas01'");
@mysql_query("update kejuruan set aktt='A' where idkejuruan='$iduas01'");
 echo "<script language='javascript'>alert('PENGAKTIFAN UAS BERHASIL')</script>";
	echo "<script language='javascript'>window.location = '?aka=g_active'</script>";
	exit();
}

?>
<?php
if(isset($_GET['iduas02'])){
//UTS
$iduas02 = @mysql_real_escape_string($_GET['iduas02']);
@mysql_query("update mahasiswa set uas='1' where idkejuruan='$iduas02'");
@mysql_query("update kejuruan set aktt='TA' where idkejuruan='$iduas02'");
 echo "<script language='javascript'>alert('DISABLE UAS BERHASIL')</script>";
	echo "<script language='javascript'>window.location = '?aka=g_active'</script>";
	exit();
}

?>
<body>
<h3>*(Global system enggine<hr color="#FFC082"></h3>
<table width="100%" border="0" align="center" bgcolor="#FFC082">
  <tr>
    <td width="28%" height="67"><strong>AKTIVASI KRS </strong></td>
    <td width="25%"><strong>DISABLE UAS SYSTEM </strong></td>
    <td width="20%"><strong>DISABLE UTS SYSTEM </strong></td>
    <td width="27%">&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td><?php  
		 $fak = mysql_query("select * from kejuruan where idfakultas='$fakk02[idfakultas]'  order by kejuruan");
		 while($fakk = mysql_fetch_array($fak)){
		 if($fakk['akt']=="TA"){
		 echo"
		<a href=?ku=g_active&idk01=$fakk[idkejuruan]>$fakk[kejuruan]&nbsp;$fakk[progdi]</a>&nbsp;<b>$fakk[akt]</b><br><br>";
		 }elseif(
		 $fakk['akt']=="A"){
		  echo"
		<a href=?ku=g_active&idk02=$fakk[idkejuruan]>$fakk[kejuruan]&nbsp;$fakk[progdi]</a>&nbsp;<b>$fakk[akt]</b><br><br>";
		}
		}
		 ?> </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php
}
?>