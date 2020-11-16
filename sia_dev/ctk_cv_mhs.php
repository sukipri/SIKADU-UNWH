<?php 
session_start();
include_once"../sc/conek.php";
include"css.php";
if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
$u = mysql_query("select * from user_mhs where idmahasiswa='$_SESSION[namauser]'");
	$uu = mysql_fetch_array($u);
 ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<style>

.tbg{border-color:#000000;}
</style>
<body>
<?php
$kdmhs = @mysql_real_escape_string($_GET['kdmhs']);
$mhs = mysql_query("select * from mahasiswa where idmahasiswa='$uu[idmahasiswa]'");
$mhss = mysql_fetch_array($mhs);
$kj = mysql_query("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
$kjj = mysql_fetch_array($kj);
$fk = mysql_query("select * from fakultas where idfakultas='$kjj[idfakultas]'");
$fkk = mysql_fetch_array($fk);

?>
<div class="container">
<center>DATA MAHASISWA ANGKATAN <?PHP  echo"$mhss[idtahun_ajaran]"; ?><br> PROGRAM STUDI <?PHP echo strtoupper($kjj['kejuruan']); ?> <?PHP echo strtoupper($fkk['fakultas']); ?>  <br>UNIVERSITAS WAHID HASYIM</center>
<table width="600" border="1" class="table tbg">
  <tr>
    <td><table width="600" border="0" class="table">
      <tr>
        <td width="192" height="33">NAMA LENGKAP </td>
        <td width="11"><strong>:</strong></td>
        <td width="373"><?PHP echo strtoupper($mhss['nama']); ?> </td>
      </tr>
      <tr>
        <td height="37">NIM</td>
        <td>:</td>
        <td><?PHP echo $mhss['idmahasiswa']; ?></td>
      </tr>
      <tr>
        <td height="37">PROPINSI TEMPAT LAHIR </td>
        <td><strong>:</strong></td>
        <td><?PHP echo strtoupper($mhss['idprovinsi']); ?></td>
      </tr>
      <tr>
        <td>KOTA / KABUPATEN TEMPAT LAHIR </td>
        <td><strong>:</strong></td>
        <td><?PHP echo strtoupper($mhss['idkota']); ?></td>
      </tr>
      <tr>
        <td height="33">JENIS KELAMIN </td>
        <td><strong>:</strong></td>
        <td><?PHP echo strtoupper($mhss['jeniskelamin']); ?></td>
      </tr>
      <tr>
        <td height="39">PROPINSI DOMISILI </td>
        <td><strong>:</strong></td>
        <td><?PHP echo strtoupper($mhss['idprovinsi']); ?></td>
      </tr>
      <tr>
        <td height="32">ALAMAT LENGKAP (KECAMATAN,KELUARAHAN,RT/RW)</td>
        <td><strong>:</strong></td>
        <td><?PHP echo strtoupper($mhss['alamat']); ?></td>
      </tr>
      <tr>
        <td height="33">KODE POS </td>
        <td><strong>:</strong></td>
        <td><?PHP echo strtoupper($mhss['kodepos']); ?></td>
      </tr>
      <tr>
        <td height="35">TELPON RUMAH </td>
        <td><strong>:</strong></td>
        <td><?PHP echo strtoupper($mhss['tlp']); ?></td>
      </tr>
      <tr>
        <td height="38">HANDPHONE</td>
        <td><strong>:</strong></td>
        <td><?PHP echo strtoupper($mhss['tlp']); ?></td>
      </tr>
      <tr>
        <td height="37">E-MAIL</td>
        <td><strong>:</strong></td>
        <td><?PHP echo $mhss['email']; ?></td>
      </tr>
      <tr>
        <td height="44">INSTITUSI ASAL </td>
        <td><strong>:</strong></td>
        <td><?PHP echo strtoupper($mhss['nama_instansi']); ?></td>
      </tr>
      <tr>
        <td height="33">IPK SARJANA </td>
        <td><strong>:</strong></td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
</div>
</body>
</html>

<?php
}
?>
