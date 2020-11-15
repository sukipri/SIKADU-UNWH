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
<?php
$spi = mysql_query("select * from spi where idmahasiswa='$mhss[idmahasiswa]' order by idspi desc limit 1");
$spii = mysql_fetch_array($spi);
if($spii['pembayaran']>=$bii['spi']){
echo"<center><h2>PEMBAYARAN SPI SUDAH LUNAS</h2></center>";
}else{
$krng = $spii['pembayaran'] - $bii['spi'];
$kspi = number_format($spii['pembayaran'],"0","",".");
$kkrng = number_format($krng,"0","",".");
?>
<form name="form1" method="post" action="">
  <table width="535" border="0" align="center" bgcolor="#0000A0">
    <tr bgcolor="#FFFFFF">
      <td width="121" height="36">Biaya</td>
      <td width="404"><?php echo"Rp.$k1"; ?></td>
      <td width="404" rowspan="4"><input name="simpan" type="submit" class="sb" id="simpan" value="simpan pembayaran"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="43">Terbayar</td>
      <td><?php echo"Rp.$kspi"; ?></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="37">Kurang</td>
      <td><?php echo"Rp.$kkrng"; ?></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="37">Bayar</td>
      <td><input name="bayar" type="text" id="bayar" size="55"></td>
    </tr>
  </table>
</form>
<?php
if(isset($_POST['simpan'])){
$byr = @mysql_real_escape_string($_POST['bayar']);
$tgl = date("Y-m-d");
$totl = $spii['pembayaran'] + $byr;
@mysql_query("insert into spi(idspi,idmahasiswa,idsemester,pembayaran,tgl)values('','$kdmhs','$mhss[idsemester]','$totl','$tgl')");
 echo "<script language='javascript'>alert('PEMBAYARAN SPI BERHASIL')</script>";
	echo "<script language='javascript'>window.location = '?kdmhs=$kdmhs'</script>";
	exit();
}
}
?>
</body>
</html>
<?php
}
?>