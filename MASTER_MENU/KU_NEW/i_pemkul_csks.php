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
<form name="form1" method="post" action="">
  <select name="select">
    <option>pilih semester.................</option>
	<?php
	  $rsem = mysql_query("select * from rekamsemester where idmahasiswa='$mhss[idmahasiswa]'");
while($rsemm = mysql_fetch_array($rsem)){
echo"";

}
	
	?>
  </select>
  <input type="submit" name="Submit" value="Submit">
</form>
</body>
</html>
<?php
}
?>