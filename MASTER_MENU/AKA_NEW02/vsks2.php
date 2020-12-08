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
<table width="100%" border="0" bgcolor="#00F279">
  <tr>
    <td width="284"><h3>DAFTAR KEJURUAN </h3></td>
    <td width="487" rowspan="2" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><?php  
		 $fak = mysql_query("select * from kejuruan  order by kejuruan");
		 while($fakk = mysql_fetch_array($fak)){
		
		 echo"
		 <a href=?aka=vsks2&iduts01=$fakk[idkejuruan]>
		$fakk[kejuruan]&nbsp;$fakk[progdi]</a><br><br>";
		 
		}
		 ?></td>
  </tr>
</table>
</body>
</html>
<?php
}
?>