<?php session_start();
include"../sc/conek.php";
$u = mysql_query("select * from user_mhs where idmahasiswa='$_SESSION[namauser]'");
	$uu = mysql_fetch_array($u);
	@mysql_query("update user_mhs set online='1' where idmahasiswa='$uu[idmahasiswa]'");
session_destroy();

header("location:index.php");

 ?>