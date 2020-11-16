<?php //session_start();
 //include_once"../sc/conek.php";

	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
	$u = mysql_query("select * from user where namauser='$_SESSION[namauser]'");
	$uu = mysql_fetch_array($u);
 ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<br>

<div class="list-group">
  <a href="#" class="list-group-item active">
   Pilih Kelas
  </a>
  <?php
  	$kls = mysql_query("select * from kelas order by kelas asc limit 100");
	while($klss = mysql_fetch_array($kls)){
	//$lk = mysql_query("select * from link_sikadu where idlink='1'");
	//$lkk = mysql_fetch_array($lk);
	//$exam = md5($lkk['anlink']);
  ?>
  <a href="<?php echo"?mng=KRS_PILIHAN&KELAS=$klss[idkelas]"; ?>" class="list-group-item"><?php echo"$klss[kelas] &nbsp;($klss[idkelas])"; ?>
  </a>
 <?php
 }
 ?>
</div>
<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">INFORMASI PETUNJUK PENGISIAN </button>
  <ul>
  <li>Pilih kelas yang sesuai dengan rombongan kelompok belajar anda
  <li> Pilih mata kuliah dan dosen yang anda bisa mengikuti kelasnya
  <li>  Jangan sampai ada mata kuliah bertimpukan 
  </ul>
</div>
</body>
</html>
<?php
}
?>
