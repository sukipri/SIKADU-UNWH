
<?php //session_start();
 include_once"../sc/conek.php";

	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
 ?><style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<table width="95" border="0" align="left" bgcolor="#00EA75">
  <tr>
    <td width="89" align="center" bgcolor="#FFFFFF"><a href="?mng=profil">EDIT PROFIL<br>
        <img src="img/pencil.png" width="66" height="66" border="0"></a></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><a href="?mng=ikrs">INPUT KRS<br>
        <img src="img/folder%20document2.png" width="64" height="64" border="0"></a></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><a href="?mng=vkrs">LIHAT KRS<br>
        <img src="img/bill%20of%20document.png" width="64" height="64" border="0"></a></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><a href="?mng=v_ikhs">LIHAT KHS<br>
        <img src="img/page.png" width="66" height="66" border="0"></a></td>
  </tr>
  <tr align="center">
    <td align="center" bgcolor="#FFFFFF"><a href="?mng=cetak_kartu">CETAK KARTU<br>
      <img src="img/desktop%20file.png" width="64" height="64" border="0"></a></td>
  </tr>
  <tr align="center">
    <td align="center" bgcolor="#FFFFFF">PESAN<br>          <img src="img/envelope_64x64.png" width="64" height="64" border="0"> </td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF">KEUANGAN<br>        <img src="img/wallet_64x64.png" width="64" height="64" border="0"></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><a href="?mng=infoaka">INFO AKADEMIK<br>
    <img src="img/promo_green.png" width="66" height="66" border="0"></a></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><a href="metu.php">LOG OUT<br>
        </a><a href="metu.php"><img src="img/promo_red.png" width="66" height="66" border="0"></a></td>
  </tr>
</table>
<?php
}
?>
