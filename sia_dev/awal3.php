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
</head>

<body>
<table width="160" border="0">
  <tr>
    <td width="154" height="39" valign="top" bgcolor="#79FFBC"><a href="?mng=profil"><img src="../img/tag-32.png" width="20" height="20" border="0">EDIT PROFIL </a></td>
  </tr>
  <tr>
    <td height="43" valign="top" bgcolor="#00F279"><a href="?mng=ikrs"><img src="../img/tag-32.png" width="20" height="20" border="0">INPUT KRS </a></td>
  </tr>
  <tr>
    <td height="47" valign="top" bgcolor="#79FFBC"><a href="?mng=vkrs"><img src="../img/tag-32.png" width="20" height="20" border="0">LIHAT KRS </a></td>
  </tr>
  <tr>
    <td height="47" valign="top" bgcolor="#00F279"><a href="?mng=v_ikhs"><img src="../img/tag-32.png" width="20" height="20" border="0">LIHAT KHS </a></td>
  </tr>
  <tr>
    <td height="51" valign="top" bgcolor="#79FFBC"><a href="?mng=cetak_kartu"><img src="../img/tag-32.png" width="20" height="20" border="0">CETAK KARTU </a></td>
  </tr>
  <tr>
    <td height="40" valign="top" bgcolor="#00F279"><img src="../img/tag-32.png" width="20" height="20">PESAN</td>
  </tr>
  <tr>
    <td height="44" valign="top" bgcolor="#79FFBC"><img src="../img/tag-32.png" width="20" height="20">KEUANGAN</td>
  </tr>
  <tr>
    <td height="44" valign="top" bgcolor="#00F279"><a href="?mng=infoaka"><img src="../img/tag-32.png" width="20" height="20" border="0">INFO AKADEMIK</a> </td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#FF7171"><a href="metu.php"><img src="../img/remove-32.png" width="20" height="20" border="0">KELUAR</a></td>
  </tr>
</table>
</body>
</html>
<?php
}
?>