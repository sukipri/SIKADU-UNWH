<?php 
include_once"../sc/conek.php";
$id=$_GET['ganti'];
$dg=$_GET['dg'];
if($dg=="NON AKTIFKAN"){$sedt="N";}else{$sedt="Y";}
mysql_query("UPDATE kurikulum SET status = '$sedt' WHERE idmain = '$id'");
?>