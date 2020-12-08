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

<body><form name="form1" method="post" action="">
  <table width="500" class="table">
    <tr> 
      <td width="284"><input name="cari" type="text" id="cari" size="45" class="form-control"></td>
      <td width="204"><input name="cari_data" type="submit" id="cari_data2" value="pencarian"></td>
    </tr>
  </table>
<div style="overflow:auto;width:auto;height:auto;padding:10px;border:1px solid #eee">
<table width="100%" border="0" align="center" bgcolor="#00B058">
  <tr align="center" bgcolor="#FFFFFF">
    <td width="22%"><strong>Kode Kurikulum </strong></td>
    <td width="27%"><strong>SKS</strong></td>
    <td width="21%"><strong>Kejuruan</strong></td>
    <td width="30%"><strong>Judul</strong></td>
  </tr>
  <?php
  if(isset($_POST['cari_data'])){
  $cari = @mysql_real_escape_string($_POST['cari']);
   $kr = mysql_query("select * from kurikulum where idkurikulum LIKE '%$cari%' ");
while($krr = mysql_fetch_array($kr)){
  $sm = mysql_query("select * from semester where idsemester='$krr[idsemester]'");
$smm = mysql_fetch_array($sm);
  $smth = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$smm[idtahun_ajaran]'");
$smmth = mysql_fetch_array($smth);
 $fak1 = mysql_query("select * from kejuruan where idkejuruan='$krr[idkejuruan]' order by kejuruan");
		$fakk1 = mysql_fetch_array($fak1);
  
  ?>
  <tr align="center" bgcolor="#FFFFFF">
    <td height="42"><strong><?php echo"<a href=?mng=isks&kddsn=$kddsn&idkr=$krr[idmain]>$krr[idkurikulum]"; ?></strong></td>
    <td><strong><?php echo"$krr[sks]"; ?></strong></td>
    <td><strong><?php echo"$fakk1[kejuruan]&nbsp; $fakk1[progdi]"; ?></strong></td>
    <td><strong><?php echo"$krr[judul]<br><i>$krr[juduleng]</i>"; ?></strong></td>
  </tr>
  <?php
  }
  }
  ?>
</table></div>
</form>

</body>
</html>
<?php
}
?>