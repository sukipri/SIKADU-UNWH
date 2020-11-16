
<?php //session_start();
 include_once"../sc/conek.php";

	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
 ?>
<table width="900" border="0" align="center">
  <tr align="center">
    <td width="9%" height="102"><a href="?mng=profil">EDIT PROFIL<br>
      <img src="img/pencil.png" width="66" height="66" border="0"></a></td>
    <td width="8%"><a href="?mng=ikrs">INPUT KRS<br>
      <img src="img/folder%20document2.png" width="64" height="64" border="0"></a></td>
    <td width="9%"><a href="?mng=vkrs">LIHAT KRS<br>
      <img src="img/bill%20of%20document.png" width="64" height="64" border="0"></a></td>
    <td width="9%"><a href="?mng=v_ikhs">LIHAT KHS<br>
      <img src="img/page.png" width="66" height="66" border="0"></a></td>
    <td width="10%">PESAN<br>      <img src="img/envelope_64x64.png" width="64" height="64" border="0">        </td>
    <td width="11%">KEUANGAN<br>        <img src="img/wallet_64x64.png" width="64" height="64" border="0"></td>
    <td width="18%"><a href="?mng=cetak_kartu">CETAK KARTU<br>
        <img src="img/desktop%20file.png" width="64" height="64" border="0"></a></td>
    <td width="16%"><a href="#">INFO AKADEMIK<br>
        <img src="img/promo_green.png" width="66" height="66" border="0"></a></td>
    <td width="10%"><a href="metu.php">LOG OUT<br>
        <img src="img/promo_red.png" width="66" height="66" border="0"></a></td>
  </tr>
</table>
  
<?php
}
?>