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
<title>CETAK TRANSKRIP SKS</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
</head>
<?php
$kdmhs=@mysql_real_escape_string($_GET['kdmhs']);
 $mhs = mysql_query("select * from mahasiswa where idmahasiswa='$kdmhs'");
$mhss = mysql_fetch_array($mhs);
 $mhsak = mysql_query("select * from user_mhs where idmahasiswa='$kdmhs'");
$mhssak = mysql_fetch_array($mhsak);
$ang = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$mhss[idtahun_ajaran]'");
$angg = mysql_fetch_array($ang);
$kj = mysql_query("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
$kjj = mysql_fetch_array($kj);
$fak = mysql_query("select * from fakultas where idfakultas='$kjj[idfakultas]'");
$fakk = mysql_fetch_array($fak);
$kl = mysql_query("select * from kelas where idkelas='$mhss[idkelas]'");
$kll = mysql_fetch_array($kl);
$rsem = mysql_query("select * from rekamsemester where idmahasiswa='$kdmhs' and app='2' order by idrekamsemester asc limit 1");
$rsemm = mysql_fetch_array($rsem);
$sm = mysql_query("select * from semester where idsemester='$mhss[idsemester]'");
$smm = mysql_fetch_array($sm);
include"code_transkrip_farmasi.php";
?>
<body>
<table width="100%" border="0" align="center">
  <tr>
    <td width="10%"><img src="../img/logokecil.gif" width="81" height="78"></td>
    <td width="90%" align="center"><h3>UNIVERSITAS WAHID HASYIM <br>TRANSKRIP AKADEMIK MAHASISWA</h3></td>
  </tr>
</table>
<br>
<div class="container">

<table width="100%" border="0" align="center">
  <tr>
    <td width="17%">Nama Lengkap </td>
    <td width="52%"><?php echo"$mhss[nama]"; ?></td>
    <td width="15%">Fakultas</td>
    <td width="16%"><?php echo"$fakk[fakultas]"; ?></td>
  </tr>
  <tr>
    <td>NIM</td>
    <td><?php echo"$mhss[idmahasiswa]"; ?></td>
    <td>Jurusan/Progdi</td>
    <td><?php echo"$kjj[kejuruan]"; ?></td>
  </tr>
  <tr>
    <td>Tempat,tgl Lahir </td>
    <td><?php echo"$mhss[tgl_lahir]"; ?></td>
    <td>Status</td>
    <td>TERAKREDITASI</td>
  </tr>
</table><hr color="#000000">
<table width="100%" border="0" align="center" class="table table-bordered">
  <tr align="center" bgcolor="#FFFFFF">
    <td width="33"><div align="center">No<br>
          <em>Numb.</em></div></td>
    <td width="676" height="35">MATA KULIAH<br>
      <em>Subject </em></td>
    <td width="106">NILAI<br>
      <em>Grade</em></td>
    <td width="122">BOBOT<br>
      <em>Weight</em></td>
    <td width="169">KREDIT<br>
      <em>Credit</em></td>
    <td width="182">MUTU<br>
      <em>Value</em></td>
  </tr>
  <?php
  $krs = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and app2='2'");
$krss = mysql_fetch_array($krs);
  $sks = mysql_query("select * from sks where idsks='$krss[idsks]' ");
$skss = mysql_fetch_array($sks);
  $sm = mysql_query("select * from semester where idsemester='$skss[idsemester]'");
$smm = mysql_fetch_array($sm);
 $dsn = mysql_query("select * from dosen where iddosen='$skss[iddosen]'");
$dsnn = mysql_fetch_array($dsn);
$kj = mysql_query("select * from kejuruan where idkejuruan='$dsnn[idkejuruan]'");
$kjj = mysql_fetch_array($kj);
$kr  = mysql_query("select * from kurikulum where idkurikulum='$skss[idkurikulum]'");
$krr = mysql_fetch_array($kr);
  
  ?>
  <tr align="center" bgcolor="#FFFFFF">
    <td align="left"><div align="center">1</div></td>
    <td height="20" align="left"><p>FARMAKOTERAPI TERAPAN<br>
        <em>Applied Pharmacotherapy</em>    </td>
    <td><?php echo"$trr[huruf]"; ?></td>
    <td><?php echo"$trr[angka]"; ?></td>
    <td><?php echo"$trr[jumlah]"; ?></td>
    <td><?php echo"$trr[total2]"; ?></td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF">
    <td align="left"><div align="center">2</div></td>
    <td height="20" align="left">PELAYANAN KEFARMASIAN<br>
      <em>Pharmaceutical Care </em></td>
    <td><?php echo"$trr2[huruf]"; ?></td>
    <td><?php echo"$trr2[angka]"; ?></td>
    <td><?php echo"$trr2[jumlah]"; ?></td>
    <td><?php echo"$trr2[total2]"; ?></td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF">
    <td align="left"><div align="center">3</div></td>
    <td height="20" align="left">COMPOUNDING AND DISPENSING<br>
      <em>Compounding and Dispensing</em></td>
    <td><?php echo"$trr3[huruf]"; ?></td>
    <td><?php echo"$trr3[angka]"; ?></td>
    <td><?php echo"$trr3[jumlah]"; ?></td>
    <td><?php echo"$trr3[total2]"; ?></td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF">
    <td align="left"><div align="center">4</div></td>
    <td height="20" align="left">MANAJEMEN FARMASI DAN SDM<br>
      <em>Pharmacy and Human Resources Management </em></td>
   <td><?php echo"$trr4[huruf]"; ?></td>
    <td><?php echo"$trr4[angka]"; ?></td>
    <td><?php echo"$trr4[jumlah]"; ?></td>
    <td><?php echo"$trr4[total2]"; ?></td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF">
    <td align="left"><div align="center">5</div></td>
    <td height="20" align="left">ILMU KESEHATAN MASYARAKAT<br>
      <em>Public Health</em></td>
    <td><?php echo"$trr5[huruf]"; ?></td>
    <td><?php echo"$trr5[angka]"; ?></td>
    <td><?php echo"$trr5[jumlah]"; ?></td>
    <td><?php echo"$trr5[total2]"; ?></td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF">
    <td align="left"><div align="center">6</div></td>
    <td height="20" align="left">ETIKA DAN PERUNDANG-UNDANGAN FARMASI<br>
      <em>Pharmacy Law and Ethics</em></td>
     <td><?php echo"$trr6[huruf]"; ?></td>
    <td><?php echo"$trr6[angka]"; ?></td>
    <td><?php echo"$trr6[jumlah]"; ?></td>
    <td><?php echo"$trr6[total2]"; ?></td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF">
    <td align="left"><div align="center">7</div></td>
    <td height="20" align="left">      KOMUNIKASI DAN KONSELING<br>
      <em>Communication and Counseling</em></td>
      <td><?php echo"$trr7[huruf]"; ?></td>
    <td><?php echo"$trr7[angka]"; ?></td>
    <td><?php echo"$trr7[jumlah]"; ?></td>
    <td><?php echo"$trr7[total2]"; ?></td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF">
    <td align="left"><div align="center">8</div></td>
    <td height="20" align="left">TEOLOGI ISLAM<br>
      <em>Islamic Theology</em></td>
      <td><?php echo"$trr8[huruf]"; ?></td>
    <td><?php echo"$trr8[angka]"; ?></td>
    <td><?php echo"$trr8[jumlah]"; ?></td>
    <td><?php echo"$trr8[total2]"; ?></td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF">
    <td align="left"><div align="center">9</div></td>
    <td height="20" align="left">FARMASI INDUSTRI<br>
      <em>Industrial Pharmacy</em></td>
     <td><?php echo"$trr9[huruf]"; ?></td>
    <td><?php echo"$trr9[angka]"; ?></td>
    <td><?php echo"$trr9[jumlah]"; ?></td>
    <td><?php echo"$trr9[total2]"; ?></td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF">
    <td align="left"><div align="center">10</div></td>
    <td height="20" align="left">FARMASI RUMAH SAKIT<br>
      <em>Hospital Pharmacy</em></td>
    <td><?php echo"$trr10[huruf]"; ?></td>
    <td><?php echo"$trr10[angka]"; ?></td>
    <td><?php echo"$trr10[jumlah]"; ?></td>
    <td><?php echo"$trr10[total2]"; ?></td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF">
    <td align="left"><div align="center">11</div></td>
    <td height="20" align="left">SWAMEDIKASI<br>
      <em>Self-medication</em></td>
  <td><?php echo"$trr11[huruf]"; ?></td>
    <td><?php echo"$trr11[angka]"; ?></td>
    <td><?php echo"$trr11[jumlah]"; ?></td>
    <td><?php echo"$trr11[total2]"; ?></td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF">
    <td align="left"><div align="center">12</div></td>
    <td height="20" align="left">FORMULASI TEKNOLOGI SEDIAAN FARMASI<br>
      <em>Formulation Technology of Pharmaceutical Preparation</em></td>
  <td><?php echo"$trr12[huruf]"; ?></td>
    <td><?php echo"$trr12[angka]"; ?></td>
    <td><?php echo"$trr12[jumlah]"; ?></td>
    <td><?php echo"$trr12[total2]"; ?></td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF">
    <td align="left"><div align="center">13</div></td>
    <td height="20" align="left">JAMINAN KUALITAS OBAT DAN MAKANAN<br>
      <em>Drugs and Food Quality Assurance</em></td>
  <td><?php echo"$trr13[huruf]"; ?></td>
    <td><?php echo"$trr13[angka]"; ?></td>
    <td><?php echo"$trr13[jumlah]"; ?></td>
    <td><?php echo"$trr13[total2]"; ?></td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF">
    <td align="left"><div align="center">14</div></td>
    <td height="20" align="left">PRAKTEK KERJA PROFESI DI APOTEK<br>
      <em>Professional Practice in Pharmacy</em></td>
    <td><?php echo"$trr14[huruf]"; ?></td>
    <td><?php echo"$trr14[angka]"; ?></td>
<td><?php echo"$trr14[jumlah]"; ?></td>
<td><?php echo"$trr14[total2]"; ?></td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF">
    <td align="left"><div align="center">15</div></td>
    <td height="20" align="left">PRAKTEK KERJA PROFESI DI PEMERINTAHAN<br>
      <em>Professional Practice in Government Institution</em></td>
  <td><?php echo"$trr15[huruf]"; ?></td>
    <td><?php echo"$trr15[angka]"; ?></td>
    <td><?php echo"$trr15[jumlah]"; ?></td>
    <td><?php echo"$trr15[total2]"; ?></td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF">
    <td align="left"><div align="center">16</div></td>
    <td height="20" align="left">PRAKTEK KERJA PROFESI DI RUMAH SAKIT<br>
      <em>Professional Practice in Hospital</em></td>
   <td><?php echo"$trr16[huruf]"; ?></td>
    <td><?php echo"$trr16[angka]"; ?></td>
    <td><?php echo"$trr16[jumlah]"; ?></td>
    <td><?php echo"$trr16[total2]"; ?></td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF">
    <td align="left"><div align="center">17</div></td>
    <td height="20" align="left">      PRAKTEK KERJA PROFESI DI INDUSTRI<br>
      <em>Professional Practice in Industry</em></td>
  <td><?php echo"$trr17[huruf]"; ?></td>
    <td><?php echo"$trr17[angka]"; ?></td>
    <td><?php echo"$trr17[jumlah]"; ?></td>
    <td><?php echo"$trr17[total2]"; ?></td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF">
    <td colspan="4" rowspan="2" align="left"><div align="center"><?php echo"$mhss[nama_aktif]"; ?></div></td>
    <td height="31">Total KRS</td>
    <td><?php
	
	$k = mysql_query("select sum(jumlah) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and app2='2'  ");
	$kk = mysql_fetch_array($k);
	
	$k2 = mysql_query("select sum(jumlah_baru) as krt from mahasiswa_trans where idmahasiswa='$kdmhs'  ");
	$kk2 = mysql_fetch_array($k2);
	$hit_krs = $kk['kr'];
	echo"<br><b>$hit_krs</b>"; ?></td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF">
    <td height="27">IPS</td>
    <td><?php
	$rk = mysql_query("select  sum(total2) as ips from krs where idmahasiswa='$kdmhs'");
$rkk = mysql_fetch_array($rk);
	$hit_ips = $rkk['ips'] / $hit_krs ;
	$k1 = @number_format($hit_ips,2);
	echo"$k1";
	
	 ?></td>
  </tr>
</table>
<table width="100%"  border="0">
  <tr align="center">
    <td width="45%" height="34">REKTOR (RECTOR)</td>
    <td width="55%">Semarang, <?php echo date('d F Y'); ?> <br>
      DISAHKAN OLEH (LEGALIZED)<br>
      DEKAN (DECAN)</td>
  </tr>
  <tr align="center">
    <td height="89">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr align="center">
    <td>Dr.H Mudzakkir Ali,M.A<br> 
      NPP.01.99.0.0003</td>
    <td> Aqnes Budiarti,SF.,M.Sc., Apt. <br>
      NPP. 0029017801 </td>
  </tr>
</table>

</div>
</body>
</html>
<?php
}
?>