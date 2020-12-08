<?php session_start();
 include_once"../sc/conek.php";

	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
	$u = mysql_query("select * from user where namauser='$_SESSION[namauser]'");
	$uu = mysql_fetch_array($u);
 ?>
<?php
if(isset($_GET['idk02'])){
//krs
$idk02 = @mysql_real_escape_string($_GET['idk02']);
@mysql_query("update mahasiswa set uas='1' where idkejuruan='$idk02'");
@mysql_query("update kejuruan set aktt='TA' where idkejuruan='$idk02'");
 echo"<center><h2>NON AKTIF KARTU UAS BERHASIL</h2></center>";
}

?>
<?php
}
?>