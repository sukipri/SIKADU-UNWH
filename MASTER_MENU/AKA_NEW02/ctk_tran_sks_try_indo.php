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
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
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
$us = mysql_query("select * from user_mhs where idmahasiswa='$mhss[idmahasiswa]'");
$uss = mysql_fetch_array($us);
$ft = mysql_query("select * from foto_mhs where idmahasiswa='$mhss[idmahasiswa]'");
  $ftt  = mysql_fetch_array($ft);
  ?>
<body>
<!--
<table width="100%" border="0" align="center">
  <tr>
    <td width="10%"><img src="../img/logokecil.gif" width="81" height="78"></td>
    <td width="90%" align="center"><h3>UNIVERSITAS WAHID HASYIM <br>TRANSKRIP AKADEMIK MAHASISWA</h3></td>
  </tr>
</table>
<br>
-->
<div class="container">

<table width="100%" border="0" align="center">
  <tr>
    <td width="21%">Nama Lengkap <i>(Full Name)</i> </td>
    <td width="39%">: 
      <?php $nama=strtoupper($mhss[nama]); echo $nama;?></td>
    <td width="24%">Keputusan Pendirian PT<br> <em>(Certificate of Establishment) </em></td>
    <td width="16%">: <?php echo"$fakk[fakultas]"; ?></td>
  </tr>
  <tr>
    <td>N I M <em>(Index Number)</em> </td>
    <td>: <?php echo"$mhss[idmahasiswa]"; ?></td>
    <td>Fakultas<em> (Faculty) </em></td>
    <td>: <?php echo"$fakk[fakultas]"; ?></td>
  </tr>
  <tr>
    <td>NIRM <em>(Index Registration Number)</em> </td>
    <td>: <?php echo"$mhss[idmahasiswa]"; ?></td>
    <td>Program Pendidikan <em> (Education Program) </em></td>
    <td>: <?php echo"$fakk[fakultas]"; ?></td>
  </tr>
  <tr>
    <td>Tempat, Tgl Lahir <em>(Place, Date of birth)</em> </td>
    <td>: <?php echo"$mhss[tgl_lahir]"; ?></td>
    <td>Program Studi <em>(Major) </em></td>
    <td>: <?php echo"$kjj[kejuruan]"; ?></td>
  </tr>
  <tr>
    <td>Nomor <em>( Number)</em> </td>
    <td>: </td>
    <td>Status <em>(Status)</em> </td>
    <td>: TERAKREDITASI</td>
  </tr>
</table>
<hr color="#000000">
<table frame="box" rules=cols width="100%" border="0" align="center">
  <tr align="center" bgcolor="#FFFFFF">
    <td  align="center" "width="21" bgcolor="#FFFFFF">No <em>Numb</em></td>
    <td width="281" height="35" bgcolor="#FFFFFF">MATA KULIAH<br>
      <em> (S</em>ubject) </td>
    <td width="53" bgcolor="#FFFFFF">NILAI/ <em>GRADE</em></td>
    <td width="62" bgcolor="#FFFFFF">BOBOT/ <em>WEIGHT</em></td>
    <td width="65" bgcolor="#FFFFFF">KREDIT/ <em>CREDIT</em></td>
    <td width="54">MUTU/ <em>VALUE</em></td>
    <td width="748">&nbsp;</td>
  </tr>
  <?php
  $krs = mysql_query("select idmahasiswa,idsks, idkurikulum, angka_baru as angka,jumlah_baru as jumlah,  jumlah_baru as total2 ,huruf_baru as huruf, (jumlah_baru*angka_baru) as xx from mahasiswa_trans where idmahasiswa='$kdmhs' UNION
  select idmahasiswa, idsks, idpraktikum as idkurikulum, angka, jumlah as jumlah, total2,huruf, (jumlah*angka) as xx from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and app2='2' limit 0,52");
 $no = 0;
  while($krss = mysql_fetch_array($krs)){
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
$kuri = mysql_query("select * from kurikulum where idkurikulum='$krss[idkurikulum]'");
$kurii = mysql_fetch_array($kuri);
  ?>
  <tr align="center" bgcolor="#FFFFFF">
    <td  align="center"><?php
$no++;


?>
        <?php echo"$no"; ?></td>
    <td align="left"> <?php echo"<b>$krr[judul]</b><b>$kurii[judul]</b>";// echo"<br><i>$krr[juduleng]</i><i>$kurii[juduleng]</i>"; ?>
        <?php if(empty($dsnn['nama']))//{ echo"MIGRASI SIA LAMA"; }else { echo"$dsnn[nama]"; } ?>
        <?php //echo"<b>$kurii[judul]</b><br>$kurii[juduleng]"; ?>
    </td>
    <td><?php echo"$krss[huruf]"; ?></td>
    <td><?php echo"$krss[angka]"; ?>
        <?php //echo"$krss[angka_baru]"; ?></td>
    <td><?php 
	
	
	//echo"$skss[jumlah]";
	?>
        <?php echo"$krss[jumlah]"; ?></td>
    <td><?php //echo"$krss[total2]"; ?>
        <?php $hitung = $krss['jumlah'] * $krss['angka']; echo number_format($hitung,2); ?></td> 
    <td width="748">&nbsp;</td>
  </tr>
  <?php
  }
  ?>
  <?php
  $krt = mysql_query("select * from mahasiswa_trans where idmahasiswa='$kdmhs'");
	while($krtt = mysql_fetch_array($krt)){
	$kuri = mysql_query("select * from kurikulum where idkurikulum='$krtt[idkurikulum]'");
	$kurii = mysql_fetch_array($kuri);
	
	  
   ?>
  <?php
  
  }
  ?>
</table>

<div id="Layer1" style="position:absolute; width:562px; z-index:1; left: 531px; top: 139px; height: 125px;">
  <table width="100%" height="84" border="0" align="center" frame="box" rules=cols>
    <tr align="center" bgcolor="#FFFFFF">
      <td width="20">No<em> Numb</em></td>
      <td width="275" height="35" bgcolor="#FFFFFF">MATA KULIAH<em><br>
(Subject) </em> </td>
      <td width="52" bgcolor="#FFFFFF">NILAI/ <em>GRADE</em></td>
      <td width="61" bgcolor="#FFFFFF">BOBOT/ <em>WEIGHT</em></td>
      <td width="64" bgcolor="#FFFFFF">KREDIT/ <em>CREDIT</em></td>
      <td width="53" bgcolor="#FFFFFF">MUTU/ <em>VALUE</em></td>
    </tr>
    <?php
  $krs = mysql_query("select idmahasiswa,idsks, idkurikulum, angka_baru as angka,jumlah_baru as jumlah,  jumlah_baru as total2 ,huruf_baru as huruf from mahasiswa_trans where idmahasiswa='$kdmhs' UNION
  select idmahasiswa, idsks, idpraktikum as idkurikulum, angka, jumlah as jumlah, total2,huruf from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and app2='2' ORDER BY  idkurikulum DESC limit 52,120");
 $no = 52;
  while($krss = mysql_fetch_array($krs)){
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
$kuri = mysql_query("select * from kurikulum where idkurikulum='$krss[idkurikulum]'");
$kurii = mysql_fetch_array($kuri);
  ?>
    <tr align="center" bgcolor="#FFFFFF">
      <td align="center"><?php
$no++;


?>
          <?php echo"$no"; ?></td>
      <td align="left"> <?php echo"<b>$krr[judul]</b><b>$kurii[judul]</b>";// echo"<br><i>$krr[juduleng]</i><i>$kurii[juduleng]</i>"; ?>
          <?php if(empty($dsnn['nama']))//{ echo"MIGRASI SIA LAMA"; }else { echo"$dsnn[nama]"; } ?>
          <?php //echo"<b>$kurii[judul]</b><br>$kurii[juduleng]"; ?>
      </td>
      <td><?php echo"$krss[huruf]"; ?></td>
      <td><?php echo"$krss[angka]"; ?>
          <?php //echo"$krss[angka_baru]"; ?></td>
      <td><?php 
	
	
	//echo"$skss[jumlah]";
	?>
          <?php echo"$krss[jumlah]"; ?></td>
      <td><?php //echo"$krss[total2]"; ?>
          <?php $hitung = $krss['jumlah'] * $krss['angka']; echo number_format($hitung,2); ?></td>
    </tr>
    <?php
  }
  ?>
    <?php
  $krt = mysql_query("select * from mahasiswa_trans where idmahasiswa='$kdmhs'");
	while($krtt = mysql_fetch_array($krt)){
	$kuri = mysql_query("select * from kurikulum where idkurikulum='$krtt[idkurikulum]'");
	$kurii = mysql_fetch_array($kuri);
	
	  
   ?>
    <?php
  
  }
  ?>
  </table>
</div>
<table align="center" width="100%"  border="1">
   
  <tr bgcolor="#FFFFFF">
    <td colspan="3" rowspan="4" align="left"><?php echo"Judul Skripsi : "?> <br> <?php echo"Thesis Title : "?></td>
    <td align="left"  width="305" height="42">Jumlah<br><i>(Total)</i></td>
    <td  align="center" width="269"><?php	
	
	$k = mysql_query("select sum(jumlah) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and app2='2'  ");
	$kk = mysql_fetch_array($k);
	
	$k2 = mysql_query("select sum(jumlah_baru) as krt from mahasiswa_trans where idmahasiswa='$kdmhs'  ");
	$kk2 = mysql_fetch_array($k2);
	$hit_krs = $kk['kr'] + $kk2['krt'];
	echo"<br><b>$hit_krs</b>"; 
	
	//total nilai
$aa = mysql_query("select sum(jumlah_baru*angka_baru) as xx from mahasiswa_trans where idmahasiswa='$kdmhs'");
$aaa=mysql_fetch_array($aa);

$bb= mysql_query("select sum(jumlah*angka) as yy from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and app2='2'");
$bbb=mysql_fetch_array($bb);

$hit_total=$aaa['xx'] + $bbb['yy'];
$ipk=$hit_total / $hit_krs;
	
	
	?>
| <?php echo"<b>$hit_total</b>";?> </td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF">
    <td align="left" height="27">Indek Prestasi<br><i>(Grade Point Average)</i></td>
    <td>      
	<?php
	//total nilai
$aa = mysql_query("select sum(jumlah_baru*angka_baru) as xx from mahasiswa_trans where idmahasiswa='$kdmhs'");
$aaa=mysql_fetch_array($aa);

$bb= mysql_query("select sum(jumlah*angka) as yy from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and app2='2'");
$bbb=mysql_fetch_array($bb);

$hit_total=$aaa['xx'] + $bbb['yy'];
$ipk=$hit_total / $hit_krs;

echo number_format($ipk,2);
	
 
	//$rk = mysql_query("select  sum(ip) as ips from rekamsemester where idmahasiswa='$kdmhs'");
//$rkk = mysql_fetch_array($rk);
	//echo"$rkk[ips]";
	
	 ?></td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF">
    <td align="left" height="27">Tanggal Lulus<br><i>(Date of Graduate)</i> </td>
    <td>&nbsp;</td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF">
    <td align="left" height="42">Predikat Kelulusan<br><i>(Predicate of Graduate)</i> </td>
    <td><?php 
	  
	If($ipk >= 3.51)
{
   $predikat="DENGAN PUJIAN";
}
 elseif ($ipk>= 2.76)
{
   $predikat="SANGAT MEMUASKAN";
}elseif ($ipk>=2)
{
   $predikat="MEMUASKAN";
}
 echo"<b>$predikat</b>";
	  
	   	
	?>
	</td>
  </tr>
</table>

<table width="100%"  border="0">
  <tr align="center">
    <td align="left"width="45%" >NIRL &nbsp;&nbsp;&nbsp;: </td>
    <td width="55%">Semarang, </td>
  </tr>
  <tr align="center">
    <td  align="left">Tanggal :</td>
    <td>DISAHKAN OLEH<i>(Legalized by)</i></td>
  </tr>
  <tr align="center">
    <td >REKTOR <i>(Rector)</i></td>
    <td>DEKAN<i>(Dean)</i></td>
  </tr>
  <tr align="center">
    <td height="66">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr align="center">
    <td height="42"> <strong>Prof. Dr. H. Mahmutarom HR, SH., MH.</strong><br>
NPP.01.99.0.0005</td>
    <td>&nbsp;</td>
  </tr>
</table>
</div>
</body>
</html>
<?php
}
?>