<?php session_start();
 include_once"../sc/conek.php";

	include"css.php";
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
	$u = mysql_query("select * from user where namauser='$_SESSION[namauser]'");
	$uu = mysql_fetch_array($u);
	
 ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>DOWNLOAD MATERI</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
$idsks = @mysql_real_escape_string($_GET['idsks']);
echo"<h3>Download Materi Kuliah $idsks</h3><hr>";
$dw = mysql_query("select * from materi  where idsks='$idsks' order by judul asc limit 2000");
  $no=1;
  while($dww = mysql_fetch_array($dw)){
  ?>
  
	<a href="<?php echo"../file/$dww[file]"; ?> " class="btn btn-primary"><?php echo"$dww[judul]"; ?></a>&nbsp;&nbsp;
	<?php
	}
	?>
</body>
</html>
<?php
}
?>