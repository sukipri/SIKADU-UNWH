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
<title>USER MAHASISWA</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body><br><br>
<?php
if(isset($_GET['duser'])){
$duser = @mysql_real_escape_string($_GET['duser']);
mysql_query("delete from user_mhs where iduser_mhs='$duser'");
echo"<center>User Mahasiswa berhasil di hapus</center>";
}
?>
<?php
if(isset($_GET['reset'])){
$reset = @mysql_real_escape_string($_GET['reset']);
$fill = "unwahasku";
$pass = md5($fill);
mysql_query("update user_mhs set passuser='$pass' where idmahasiswa='$reset'");
echo"<center>Password has been reset</center>";
}
?>
<?php
$us1 = mysql_query("select * from user_mhs order by iduser_mhs asc limit 10000000");
$jumus = mysql_num_rows($us1);

?>
<form name="form1" method="post" action="">
  <table width="681" border="0" align="center" bgcolor="#EA7500" class="table table-bordered">
    <tr align="center" valign="top" bgcolor="#FFFFFF">
      <td colspan="4">User Mahasiswa :&nbsp; <?php echo"<b><i>$jumus</i></b>"; ?> </td>
    </tr>
    <tr align="center" valign="top" bgcolor="#FFFFFF">
      <td>&nbsp;</td>
      <td><input name="cari" type="text" class="form-control" id="cari"></td>
      <td><input name="go" type="submit" class="btn btn-success" id="go" value="Submit"></td>
      <td>&nbsp;</td>
    </tr>
	<?php if(isset($_POST['go'])){ ?>
    <tr align="center" valign="top" bgcolor="#FFFFFF" class="danger">
      <td width="84">NIM</td>
      <td width="288">Nama user </td>
      <td width="239">Pass</td>
      <td width="52">action</td>
    </tr>
    <?php
	$cari = @$_POST['cari'];
$us = mysql_query("select * from user_mhs where idmahasiswa='$cari'");
while($uss = mysql_fetch_array($us)){
//$tipe = mysql_query("select * from tipe where idtipe='$brtt[idtipe]'");
//$tipee = mysql_fetch_array($tipe);

?>
    <tr align="center" valign="top" bgcolor="#FFFFFF">
      <td><?php echo"$uss[idmahasiswa]"; ?></td>
      <td><?php echo"$uss[username]"; ?></td>
      <td><a href="<?php echo"vuser_mahasiswa.php?reset=$uss[idmahasiswa]"; ?>" class="btn btn-info">Reset Password</a></td>
      <td><?php echo"<a href=vuser_mahasiswa.php?duser=$uss[iduser_mhs]><img src=../img/uncheck-32.png></a>"; ?></td>
    </tr>
    <?php } 
	}
	?>
  </table>
</form>
</body>
</html>
<?php
}else{
echo"<h3>MAAF ACCESS DITOLAK</h3>";
}
?>
<?php
}
?>