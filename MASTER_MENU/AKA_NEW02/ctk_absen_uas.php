<?php session_start();
 include_once"../../sc/conek.php";

	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
	$u = mysql_query("select * from user where namauser='$_SESSION[namauser]'");
	$uu = mysql_fetch_array($u);
	$aka = mysql_query("select idakademik,idfakultas,namauser,passuser,akses FROM akademik where idakademik='$uu[idakademik]'");
		$akaa = mysql_fetch_array($aka);
 ?>
<style type="text/css">
<!--
body,td,th {
	font-size: 13px;
}
a {
	font-size: 13px;
	color: #000099;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #000099;
}
a:hover {
	text-decoration: none;
	color: #000099;
}
a:active {
	text-decoration: none;
	color: #000099;
}
-->
</style>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
</head>

<body>
<?php
$kddsn=@mysql_real_escape_string($_GET['kddsn']);
$idsks=@mysql_real_escape_string($_GET['idsks']);
 $dsn = mysql_query("select * from dosen where iddosen='$kddsn'");
$dsnn = mysql_fetch_array($dsn);
$kj = mysql_query("select * from kejuruan where idkejuruan='$dsnn[idkejuruan]'");
$kjj = mysql_fetch_array($kj);


?> 

<br>
  <?php
 $sks1 = mysql_query("select * from sks where idsks='$idsks'");
$skss1 = mysql_fetch_array($sks1);
$kr  = mysql_query("select * from kurikulum where idkurikulum='$skss1[idkurikulum]'");
$krr = mysql_fetch_array($kr);
$smt = mysql_query("select * from semester where idsemester='$skss1[idsemester]'");
$smtt = mysql_fetch_array($smt);
//echo"<i>Kode MK &nbsp; $skss1[idsks]/&nbsp;$krr[judul] /&nbsp; Jumlah &nbsp; $skss1[jumlah]</i></h3>";
?>
<table width="100%" border="0">
  <tr>
    <td width="12%"><img src="http://sikadu.unwahas.ac.id/img/logokecil.gif" width="73" height="83"></td>
    <td width="88%"><h3>
 DAFTAR HADIR DAN NILAI UJIAN SEMESTER
  <?php

echo" <br><br>$smtt[semester]</i></h3>";
?>
</h3></td>
  </tr>
</table>
<table width="100%">
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo"MATA KULIAH : &nbsp; $krr[judul]"; ?></td>
    <td><?php echo"PRODI : &nbsp; $kjj[kejuruan]"; ?></td>
    <td><?php echo"RUANG: &nbsp; $skss1[idruang]"; ?></td>
  </tr>
  <tr>
    <td><?php echo"DOSEN PENGAMPU : &nbsp; $dsnn[nama]"; ?></td>
    <td><?php echo"HARI : &nbsp; $skss1[hari] / $skss1[jam]"; ?></td>
    <td><?php echo"KELAS : $skss1[idkelas] "; ?></td>
  </tr>
</table>
<hr color="#000000">
<form name="form1" method="post" action="">
  <table width="100%" border="0" align="center" bgcolor="#000000">
    <tr align="center" bgcolor="#FFFFFF">
      <td width="6%" rowspan="2">NO</td>
      <td width="17%" rowspan="2">Nama Mahasiswa </td>
      <td width="22%" rowspan="2">NIM</td>
      <td height="40" colspan="6">NILAI</td>
      <td width="29%" rowspan="2">Tanda Tangan </td>
    </tr>
    <tr align="center" bgcolor="#00E171">
      <td width="4%" height="40" bgcolor="#FFFFFF">KT</td>
      <td width="5%" bgcolor="#FFFFFF">SSP</td>
      <td width="4%" bgcolor="#FFFFFF">TS</td>
      <td width="4%" bgcolor="#FFFFFF">AS</td>
      <td width="5%" bgcolor="#FFFFFF">NA</td>
      <td width="4%" bgcolor="#FFFFFF">NH</td>
    </tr>
    <?php
    $krs = mysql_query("select * from krs where idsks='$idsks' ");
	$i =1;
  while($krss = mysql_fetch_array($krs)){
    $sks = mysql_query("select * from sks where idsks='$krss[idsks]' and app='2'");
$skss = mysql_fetch_array($sks);
  $sm = mysql_query("select * from semester where idsemester='$skss[idsemester]'");
$smm = mysql_fetch_array($sm);
$mhs = mysql_query("select * from mahasiswa where idmahasiswa='$krss[idmahasiswa]'");
$mhss = mysql_fetch_array($mhs);
  ?>
    <tr align="center" bgcolor="#FFFFFF">
      <td height="37"><?php echo"$i"; ?></td>
      <td height="37"><?php //echo"$mhss[nama]"; ?>
      <?php $nama=strtoupper($mhss[nama]); echo $nama;?></td>
      <td><?php echo"$krss[idmahasiswa]"; ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;      </td>
    </tr>
    <?php
	$i++;
  }
  
  //$jumMhs = $i-1;
  ?>
  <input name="<?php echo"n"; ?>" type="hidden" value="<?php echo"$jumMhs"; ?>" >
  </table>
</form><BR>
<table width="100%" border="0">
  <tr>
    <td width="73%">*)KETERANGAN </td>
    <td width="27%" align="left"><?php
	$date = date("d/m/Y");
	echo"Semarang &nbsp; <i>$date</i>";
	
	 ?></td>
  </tr>
  <tr>
    <td>KT = KARYA TULIS / TUGAS SEJENIS<BR>SSP SISIPAN ,dapat berupa ujian kecil sejenis<br>TS = TENGAH SEMESTER<BR>AS = AHIR SEMESTER <BR>NA = NILAI AKHIR (Angka),sebagai akumulasi nilai ujian yang diisi dengan angka dengan asumsi mengacu pada proporsionalitas pedoman penilaian<br> NH = NILAI AKHIR (Huruf),sebagai akumulasi nilai ujian yang diisi dengan huruf dengan asumsi mengacu pada proposionalitas pedoman penilaian</td>
    <td align="left" valign="bottom">NPP:</td>
  </tr>
</table>
<?php
//if(isset($_POST['update'])){
//$jumMhs = @$_POST['n'];
//for ($i2=1; $i2<=$jumMhs; $i2++)
//{
//$nimMhs = @$_POST['mhs'.$i2];
//$nimMhs2 = @$_POST['mhss'.$i2];
//$nilai = @$_POST['nilai'.$i2];
//$nilai2 = @$_POST['nilaii'.$i2];
//$nilai3 = @$_POST['nilai3'.$i2];
//$nilai4 = @$_POST['nilai4'.$i2];

//mysql_query("update krs set kt='$nilai',ssp='$nilai2',ts='$nilai3,as='$nilai4' where idkrs='$nimMhs and idkrs='$nimMhs2'");

//}
//echo"<center><b>Data Berhasil Di simpan</b></center>";
//}
?>
</body>
<?PHP } ?>