<?php session_start();
 include_once"../sc/conek.php";

	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
	$u = mysql_query("select * from user_mhs where idmahasiswa='$_SESSION[namauser]'");
	$uu = mysql_fetch_array($u);
	$mhs = mysql_query("select * from mahasiswa where idmahasiswa='$uu[idmahasiswa]'");
	$mhss = mysql_fetch_array($mhs);
	
 ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>CETAK KARTU UJIAN</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body,td,th {
	font-size: 12px;
}
-->
</style></head>

<body>
<?php
$kdmhs = @mysql_real_escape_string($_GET['kdmhs']);
$mhs = mysql_query("select * from mahasiswa where idmahasiswa='$kdmhs' and uas='2'");
$mhss = mysql_fetch_array($mhs);
$kl = mysql_query("select * from kelas where idkelas='$mhss[idkelas]' ");
$kll = mysql_fetch_array($kl);
$krs = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]' and idsemester='$mhss[idsemester]' ");
$krss = mysql_fetch_array($krs);
  $sks = mysql_query("select * from sks where idsks='$krss[idsks]' ");
$skss = mysql_fetch_array($sks);
  $sm = mysql_query("select * from semester where idsemester='$skss[idsemester]'");
$smm = mysql_fetch_array($sm);
 $th = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$smm[idtahun_ajaran]'");
$thh = mysql_fetch_array($th);
 $dsn = mysql_query("select * from dosen where iddosen='$skss[iddosen]'");
$dsnn = mysql_fetch_array($dsn);
$kj = mysql_query("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
$kjj = mysql_fetch_array($kj);
 $dsn2 = mysql_query("select * from dosen where iddosen='$mhss[iddosen]'");
$dsnn2 = mysql_fetch_array($dsn2);
?>
<table width="100%" border="0" align="center">
  <tr>
    <td width="337" align="right"><img src="../img/logokecil.gif" width="52" height="52"></td>
    <td width="319" align="center"><strong>KARTU UJIAN <?php echo"<br>$smm[ajaran] tahun $thh[ajaran]<br>UNIVERISTAS WAHID HASYIM";?>
	</strong></td>
    <td width="335" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><hr></td>
  </tr>
</table>



<table width="100%" border="0" align="center">
  <tr>
    <td width="47%"><table width="478" border="0">
      <tr>
        <td width="80"><strong>NIM</strong></td>
        <td width="12"><strong>:</strong></td>
        <td width="372"><?php echo"<b>$mhss[idmahasiswa]</b>"; ?></td>
      </tr>
      <tr>
        <td><strong>Nama</strong></td>
        <td><strong>:</strong></td>
        <td><?php echo"<b>$mhss[nama]</b>"; ?></td>
      </tr>
    </table></td>
    <td width="53%"><table width="336" border="0">
      <tr>
        <td width="80"><strong>Progdi</strong></td>
        <td width="12"><strong>:</strong></td>
        <td width="230"><?php echo"<b>$kjj[idkejuruan]-$kjj[kejuruan]</b>"; ?></td>
      </tr>
      <tr>
        <td><strong>Dosen Wali </strong></td>
        <td><strong>:</strong></td>
        <td><?php echo"<b>$dsnn2[nama]</b>"; ?></td>
      </tr>
    </table></td>
  </tr>
</table>
<br><table width="100%" border="0" align="center" bgcolor="#000000">
  <tr align="center" bgcolor="#FFFFFF">
    <td width="4%" height="31"><strong>NO</strong></td>
    <td width="11%"><strong>KODE MK </strong></td>
    <td width="16%"><strong>NAMA MAKUL </strong></td>
    <td width="10%"><strong>KELAS</strong></td>
    <td width="7%"><strong>SKS</strong></td>
    <td colspan="2"><strong>JADUAL</strong></td>
  </tr>
  <?php
   $no=1;
  $krs1 = mysql_query("select * from krs where idmahasiswa='$kdmhs' and idsemester='$mhss[idsemester]' and app='2' ");
while($krss1 = mysql_fetch_array($krs1)){
  $mhs1 = mysql_query("select * from mahasiswa where idmahasiswa='$krss1[idmahasiswa]'");
$mhss1 = mysql_fetch_array($mhs1);
 $sks1 = mysql_query("select * from sks where idsks='$krss1[idsks]' ");
$skss1 = mysql_fetch_array($sks1);
  $sm1 = mysql_query("select * from semester where idsemester='$skss1[idsemester]'");
$smm1 = mysql_fetch_array($sm1);
 $dsn1 = mysql_query("select * from dosen where iddosen='$skss1[iddosen]'");
$dsnn1 = mysql_fetch_array($dsn1);
 $kr = mysql_query("select * from kurikulum where idkurikulum='$skss1[idkurikulum]' ");
$krr = mysql_fetch_array($kr);
  ?>
  <tr align="center" bgcolor="#FFFFFF">
    <td height="31"><?php echo"$no"; ?></td>
    <td><?php echo"$skss1[idsks]"; ?></td>
    <td><?php echo"$krr[judul]<br>"; ?></td>
    <td><?php echo"$kll[idkelas]"; ?></td>
    <td><?php echo"$krss1[jumlah]"; ?></td>
    <td width="28%">&nbsp;</td>
    <td width="24%">&nbsp;</td>
  </tr>
   <?php
 $no++; }
  ?>
  <?php
   $nop=1;
  $pkrs1 = mysql_query("select * from p_sks where idmahasiswa='$kdmhs' and idsemester='$mhss[idsemester]' ");
while($pkrss1 = mysql_fetch_array($pkrs1)){
  $mhs12 = mysql_query("select * from mahasiswa where idmahasiswa='$krss1[idmahasiswa]'");
$mhss12 = mysql_fetch_array($mhs12);
 $sks12 = mysql_query("select * from praktikum where idpraktikum='$pkrss1[idpraktikum]' ");
$skss12 = mysql_fetch_array($sks12);
  $sm12 = mysql_query("select * from semester where idsemester='$skss12[idsemester]'");
$smm12 = mysql_fetch_array($sm12);
 $dsn12 = mysql_query("select * from dosen where iddosen='$skss12[iddosen]'");
$dsnn12 = mysql_fetch_array($dsn12);
 $kr2 = mysql_query("select * from kurikulum where idkurikulum='$skss12[idkurikulum]' ");
$krr2 = mysql_fetch_array($kr2);
  ?>
  <tr align="center" bgcolor="#FFFFFF">
    <td height="31"><?php echo"$nop.b"; ?></td>
    <td><?php echo"$skss12[idpraktikum]"; ?></td>
    <td><?php echo"$krr2[judul]"; ?></td>
    <td><?php echo"$kll[idkelas]"; ?></td>
    <td><?php echo"$pkrss1[jumlah]"; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php
  $nop++;
  
  }
  ?>
  <tr align="right" bgcolor="#FFFFFF">
    <td height="31" colspan="5">Total Seluruh SKS 
	  <?php
	
	$k = mysql_query("select sum(jumlah) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and idsemester='$mhss[idsemester]' ");
	$kk = mysql_fetch_array($k);

	
	
	
	 ?>	  <?php
	$k1 = mysql_query("select sum(jumlah) as krp from p_sks where idmahasiswa='$mhss[idmahasiswa]' and app='2' and idsemester='$mhss[idsemester]'");
	$kk1 = mysql_fetch_array($k1);
	
	
	?>
	  <?php
	$ju_krs = $kk['kr'] + $kk1['krp'];
	echo"$ju_krs";
	
	?></td>
    <td height="31" colspan="2">Semarang,<?php $date = date("d/m/Y"); echo"$date"; ?></td>
  </tr>
  
</table>
<br><br><table width="100%" border="0">
  <tr align="center">
    <td width="23%"><strong>Catatan<br>
      Kartu Hilang / rusak <br>
didenda Rp.5000</strong></td>
    <td width="35%"><strong><?php echo"
	DOSEN WALI<br><br><br><b>$dsnn2[nama]</b>"; ?></strong></td>
    <td width="15%">Foto 3 X 3</td>
    <td width="27%"><strong><?php echo"MAHASISWA<br><br><br><br><br>$mhss[nama]"; ?></strong></td>
  </tr>
  <tr align="center">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php
}
?>
