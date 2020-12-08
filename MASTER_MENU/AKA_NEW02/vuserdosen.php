<?php session_start();
 include_once"../sc/conek.php";
	include"css.php";
	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
			$u = mysql_query("select * from akademik where namauser='$_SESSION[namauser]'");
	$uu = mysql_fetch_array($u);
 ?>
   <?php

if($uu['akses']==2){



?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>USER DOSEN</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body><br><br>
<?php
if(isset($_GET['duser'])){
$duser = @mysql_real_escape_string($_GET['duser']);
mysql_query("delete from user_dsn where iddosen='$duser'");
echo"<center>User super admin berhasil di hapus</center>";
}
?>
<?php
if(isset($_GET['reset'])){
$reset = @mysql_real_escape_string($_GET['reset']);
$fill = "bismillah2014";
$pass = md5($fill);
mysql_query("update user_dsn set passuser='$pass' where iddosen='$reset'");
echo"<center>Password has been reset</center>";
}
?>
<?php
$us1 = mysql_query("select * from user_dsn order by iduser_dsn asc limit 10000000");
$jumus = mysql_num_rows($us1);
?>
<table width="681" border="0" align="center" bgcolor="#EA7500" class="table table-bordered">
  <tr align="center" valign="top" bgcolor="#FFFFFF">
    <td colspan="5">USER DOSEN :&nbsp; <?php echo"<b><i>$jumus</i></b>"; ?></td>
  </tr>
  <tr align="center" valign="top" bgcolor="#FFFFFF">
    <td width="87">#</td>
    <td width="298">Nama user </td>

    <td width="227">Pass</td>
    <td width="51">action</td>
  </tr>
  <?php
    $us = mysql_query("select * from  user_dsn order by iduser_dsn asc limit 10000000");
while($uss = mysql_fetch_array($us)){
  ?>

  <tr align="center" valign="top" bgcolor="#FFFFFF">
    <td><?php echo"$uss[iddosen]"; ?></td>
    <td><?php echo"$uss[username]"; ?></td>
    <td><a href="<?php echo"vuserdosen.php?reset=$uss[iddosen]"; ?>" class="btn btn-info">Reset Password</a></font></td>
    <td><?php echo"<a href=vuserdosen.php?duser=$uss[iddosen]><img src=../img/uncheck-32.png></a>"; ?></td>
  </tr>
  <?php } ?>
</table>
<?php
}else{
echo"<h3>MAAF ACCESS DITOLAK</h3>";
}
?>

</body>
</html>
<?php
}
?>