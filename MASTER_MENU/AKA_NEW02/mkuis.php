<?php 


//session_start();

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
<div class="container">
<table width="507" height="63" border="0" align="center" class="table table-bordered" bgcolor="#00F279">
  <tr align="center" bgcolor="#FFFFFF">
    <td width="237" height="59"><a href="?aka=mkuis&kuis=ikuis" class=" btn btn-warning "><img src="../img/terminal-32.png" width="32" height="32" border="0"><br>
    Input Kuisioner</a></td>
    <td width="260"><a href="?aka=mkuis&kuis=vkuis" class="btn btn-warning"><img src="../img/track-32.png" width="32" height="32" border="0"><br>
    Data Kuisioner</a></td>
  </tr>
</table><br>
<?php
	switch(@mysql_real_escape_string($_GET['kuis'])){
	case'ikuis':
	include"ikuis.php";
	break;
	case'vkuis':
	include"vkuis.php";
	break;
	case'edit_kuis':
	include"edit_kuis.php";
	break;
	
	}

?>
</div>
</body>
</html>
<?php
}
?>