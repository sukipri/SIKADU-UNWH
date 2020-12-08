<?php session_start();
 include_once"../sc/conek.php";

	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
	$u = mysql_query("select * from user where namauser='$_SESSION[namauser]'");
	$uu = mysql_fetch_array($u);
 ?><?php
if(isset($_GET['idk01'])){
//krs
$idk01 = @mysql_real_escape_string($_GET['idk01']);
@mysql_query("update mahasiswa set uas='2' where idkejuruan='$idk01'");
@mysql_query("update kejuruan set aktt='A' where idkejuruan='$idk01'");
 echo"<center><h2>AKTIVASI KARTU UAS BERHASIL</h2></center>";
}

?>

<?php
}
?>