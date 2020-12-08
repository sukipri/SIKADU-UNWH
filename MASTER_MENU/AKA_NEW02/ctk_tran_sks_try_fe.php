<?php session_start();
 include_once"../sc/conek.php";
 	include"css.php";
	include ("../ezpdf/class.ezpdf.php");

	
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
<style type="text/css">
#kiri
{
width:50%;
height:100%;
float:left;
}
#kanan
{
width:50%;
height:100%;
float:right;
}

#footer{

clear: both;
width:100%;
height:100%;
}

.style1 {
	font-size: 10.5px;
	font-family: Arial, Helvetica, sans-serif;
	font-style: normal;
	font-weight: normal;
	letter-spacing: normal;
	vertical-align: top;
	word-spacing: normal;
};
.style5 {
	font-family: "Times New Roman", Times, serif;
	font-weight: bold;
}
</style>

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

<table width="100%" border="0" align="center" >
  <tr>
    <td  valign="top" width="25%">Nama Lengkap <i>(Full Name)</i> </td>
    <td valign="top" width="26%">: 
      <?php $nama=strtoupper($mhss[nama]); echo $nama;?></td>
    <td width="24%">Keputusan Pendirian PT<br> <em>(Certificate of Establishment) </em></td>
    <td width="27%" valign="top">: SK. MENDIKNAS NO. 124/D/0/2000</td>
  </tr>
  <tr>
    <td>N I M <em>(Index Number)</em> </td>
    <td>: <?php echo"$mhss[idmahasiswa]"; ?></td>
    <td>Fakultas<em> (Faculty) </em></td>
    <td valign="top">: <?php //echo"$fakk[fakultas]"; ?>
      <?php $fakultas=($fakk[fakultas]); echo $fakultas;?></td>
  </tr>
  <tr>
    <td valign="top" >Tempat, Tgl Lahir <em>(Place, Date of birth)</em> </td>
    <td valign="top" >: 
      <?php $tempat=strtoupper($mhss[tempat_lahir]); echo $tempat;?>
      <?php echo" , $mhss[tgl_lahir]"; ?></td>
    <td>Program Pendidikan <em> (Education Program) </em></td>
    <td valign="top">: SARJANA / <i>Bachelor</i></td>
  </tr>
  <tr>
    <td>Nomor <em>( Number)</em> </td>
    <td>: <?php echo"$mhss[nomor_ijasah]"; ?> </td>
    <td>Program Studi <em>(Major) </em></td>
    <td valign="top">: <?php //echo"$kjj[kejuruan]"; ?>
    <?php $kejuruan=($kjj[kejuruan]); echo $kejuruan;?></td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
    <td>&nbsp;</td>
    <td>Status <em>(Status)</em> </td>
    <td valign="top">: 
    <?php $kj = mysql_query("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
$kjj = mysql_fetch_array($kj);
echo"$kjj[status]"; ?></td>
  </tr>
</table>
<div id="kiri">
  <table width="99%" height="10" border="0" align="center" frame="box" rules=cols>
 
	<tr valign="top"align="center" bgcolor="#FFFFFF" style="border-color:#000000;border:1px solid;">
      <td width="20" align="center"><p class="style1"><strong>No</strong></p></td>
      <td width="309" valign="top" height="26"><p class="style1"><strong>MATA KULIAH</strong><br>
      <em>Subject</em></p></td>
      <td width="32" height="26" valign="top"><span class="style1"><strong>NILAI</strong> <em>Grade</em></span></td>
      <td width="40" height="26" valign="top"><span class="style1"><strong>BOBOT </strong><em>Weight</em></span></td>
      <td width="43" height="26" valign="top"><span class="style1"><strong>KREDIT </strong><em>Credit</em> </span></td>
      <td width="33" height="26" valign="top"><span class="style1"><strong>MUTU </strong><em>Value</em> </span></td>
    </tr>
    <?php
$hitt = mysql_query("select  kurikulum.idmain, mahasiswa_trans.idmahasiswa,mahasiswa_trans.idsks, mahasiswa_trans.idkurikulum as idkurikulum, mahasiswa_trans.angka_baru as angka,mahasiswa_trans.jumlah_baru as jumlah,  mahasiswa_trans.jumlah_baru as total2 ,mahasiswa_trans.huruf_baru as huruf, (jumlah_baru*angka_baru) as xx 
  FROM mahasiswa_trans INNER JOIN kurikulum ON mahasiswa_trans.idkurikulum=kurikulum.idkurikulum where mahasiswa_trans.idmahasiswa='$kdmhs' 
  UNION
  SELECT DISTINCT (kur_urut.idmain), krs.idmahasiswa, krs.idsks, krs.idpraktikum AS idkurikulum, krs.angka AS angka, krs.jumlah AS jumlah, krs.total2, krs.huruf, (krs.jumlah * krs.angka) AS xx FROM krs INNER JOIN kur_urut ON krs.idsks = kur_urut.idsks 
  where krs.idmahasiswa='$mhss[idmahasiswa]' and app='2' and angka>'1' ORDER BY idmain ASC");
     $cc= mysql_num_rows($hitt);
     $at= ceil($cc/2);
     $bt= $cc/2;
  $krs = mysql_query("select  kurikulum.idmain, mahasiswa_trans.idmahasiswa,mahasiswa_trans.idsks, mahasiswa_trans.idkurikulum as idkurikulum, mahasiswa_trans.angka_baru as angka,mahasiswa_trans.jumlah_baru as jumlah,  mahasiswa_trans.jumlah_baru as total2 ,mahasiswa_trans.huruf_baru as huruf, (jumlah_baru*angka_baru) as xx 
	FROM mahasiswa_trans INNER JOIN kurikulum ON mahasiswa_trans.idkurikulum=kurikulum.idkurikulum where mahasiswa_trans.idmahasiswa='$kdmhs' 
  UNION
  SELECT DISTINCT (kur_urut.idmain), krs.idmahasiswa, krs.idsks, krs.idpraktikum AS idkurikulum, krs.angka AS angka, krs.jumlah AS jumlah, krs.total2, krs.huruf, (krs.jumlah * krs.angka) AS xx FROM krs INNER JOIN kur_urut ON krs.idsks = kur_urut.idsks 
  where krs.idmahasiswa='$mhss[idmahasiswa]' and app='2' and angka>'1' ORDER BY idmain ASC limit 0,$at");

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
      <td  width="20"height="30" align="center" valign="top"><?php
$no++;


?>
          <?php echo'<div style="font-size:1.0em;color:black;font-family: Arial, Helvetica, sans-serif;">'.$no. '</div>'; ?></td>
      <td width="309" align="left" valign="top">  <?php echo'<div style="font-size:0.9em;color:black;font-family: Arial, Helvetica, sans-serif;font-weight: bold;">'.'&nbsp;'.$krr[judul].'&nbsp;'.$kurii[judul].'</div>';?><?php echo '<div style="font-size:1.0em;color:black;font-family: Arial, Helvetica, sans-serif;font-style: italic;">'.'&nbsp;'.$krr[juduleng].'&nbsp;'.$kurii[juduleng].'</div>'; ?>
          <?php if(empty($dsnn['nama']))//{ echo"MIGRASI SIA LAMA"; }else { echo"$dsnn[nama]"; } ?>
          <?php //echo"<b>$kurii[judul]</b><br>$kurii[juduleng]"; ?>          </td>
      <td width="32" valign="top"><?php $krssB= strtoupper($krss[huruf]); echo '<div style="font-size:1.0em;color:black;font-family: Arial, Helvetica, sans-serif;">' .$krssB.  '</div>'; ?></td>
      <td width="40" valign="top"><?php  $krssa=$krss[angka]; $krssn= number_format($krssa,2); ?> <?php echo'<div style="font-size:1.0em;color:black;font-family: Arial, Helvetica, sans-serif;">' .$krssn. '</div>'; ?>
          <?php //echo"$krss[angka_baru]"; ?></td>
      <td width="43" valign="top"><?php 
	
	
	//echo"$skss[jumlah]";
	?>
          <?php echo'<div style="font-size:1.0em;color:black;font-family: Arial, Helvetica, sans-serif;">' .$krss[jumlah]. '</div>'; ?></td>
      <td width="33" valign="top" ><?php //echo"$krss[total2]"; ?>
          <?php $hitung = $krss['jumlah'] * $krss['angka']; $hitungx= number_format($hitung,2); ?><?php echo '<div style="font-size:1.0em;color:black;font-family: Arial, Helvetica, sans-serif;">' .$hitungx. '</div>'; ?></td>
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
<div id="kanan">
  <table width="99%" height="10" border="0" align="center" frame="box" rules=cols>
 
	<tr valign="top"align="center" bgcolor="#FFFFFF" style="border-color:#000000;border:1px solid; ">
      <td width="20" align="center"><p class="style1"><strong>No</strong></p></td>
      <td width="309" valign="top" height="26"><p class="style1"><strong>MATA KULIAH</strong><br>
      <em>Subject</em></p></td>
      <td width="32" height="26" valign="top"><span class="style1"><strong>NILAI</strong> <em>Grade</em></span></td>
      <td width="40" height="26" valign="top"><span class="style1"><strong>BOBOT </strong><em>Weight</em></span></td>
      <td width="43" height="26" valign="top"><span class="style1"><strong>KREDIT </strong><em>Credit</em> </span></td>
      <td width="33" height="26" valign="top"><span class="style1"><strong>MUTU </strong><em>Value</em> </span></td>
    </tr>
 
    <?php
  $krs = mysql_query("select  kurikulum.idmain, mahasiswa_trans.idmahasiswa,mahasiswa_trans.idsks, mahasiswa_trans.idkurikulum as idkurikulum, mahasiswa_trans.angka_baru as angka,mahasiswa_trans.jumlah_baru as jumlah,  mahasiswa_trans.jumlah_baru as total2 ,mahasiswa_trans.huruf_baru as huruf, (jumlah_baru*angka_baru) as xx 
	FROM mahasiswa_trans INNER JOIN kurikulum ON mahasiswa_trans.idkurikulum=kurikulum.idkurikulum where mahasiswa_trans.idmahasiswa='$kdmhs' 
  UNION
  SELECT DISTINCT (kur_urut.idmain), krs.idmahasiswa, krs.idsks, krs.idpraktikum AS idkurikulum, krs.angka AS angka, krs.jumlah AS jumlah, krs.total2, krs.huruf, (krs.jumlah * krs.angka) AS xx FROM krs INNER JOIN kur_urut ON krs.idsks = kur_urut.idsks 
  where krs.idmahasiswa='$mhss[idmahasiswa]' and app='2' and angka>'1' ORDER BY idmain ASC limit $at,$cc");
 $no = $at;
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
      <td  width="20" height="30" align="center" valign="top"><?php
$no++;


?>
          <?php echo'<div style="font-size:1.0em;color:black;font-family: Arial, Helvetica, sans-serif;">'.$no. '</div>'; ?></td>
      <td width="309" align="left" valign="top">          <?php echo'<div style="font-size:0.9em;color:black;font-family: Arial, Helvetica, sans-serif;font-weight: bold;">'.'&nbsp;'.$krr[judul].'&nbsp;'.$kurii[judul].'</div>';?><?php echo '<div style="font-size:1.0em;color:black;font-family: Arial, Helvetica, sans-serif;font-style: italic;">'.'&nbsp;'.$krr[juduleng].'&nbsp;'.$kurii[juduleng].'</div>'; ?>
          <?php if(empty($dsnn['nama']))//{ echo"MIGRASI SIA LAMA"; }else { echo"$dsnn[nama]"; } ?>
          <?php //echo"<b>$kurii[judul]</b><br>$kurii[juduleng]"; ?>          </td>
      <td width="32" valign="top"><?php $krssB= strtoupper($krss[huruf]); echo '<div style="font-size:1.0em;color:black;font-family: Arial, Helvetica, sans-serif;">' .$krssB.  '</div>'; ?></td>
      <td width="40" valign="top"><?php  $krssa=$krss[angka]; $krssn= number_format($krssa,2); ?> <?php echo'<div style="font-size:1.0em;color:black;font-family: Arial, Helvetica, sans-serif;">' .$krssn. '</div>'; ?>
          <?php //echo"$krss[angka_baru]"; ?></td>
      <td width="43" valign="top"><?php 
	
	
	//echo"$skss[jumlah]";
	?>
          <?php echo'<div style="font-size:1.0em;color:black;font-family: Arial, Helvetica, sans-serif;">' .$krss[jumlah]. '</div>'; ?></td>
      <td width="33" valign="top" ><?php //echo"$krss[total2]"; ?>
          <?php $hitung = $krss['jumlah'] * $krss['angka']; $hitungx= number_format($hitung,2); ?><?php echo '<div style="font-size:1.0em;color:black;font-family: Arial, Helvetica, sans-serif;">' .$hitungx. '</div>'; ?></td>
    </tr>
    <?php
  }if ($at<>$bt){
  ?>   
   <tr align="center" bgcolor="" style="border: 0.1px red;">
    <td width="20" style="border-right: 0.1px;" height="33" align="center" valign="top">&nbsp;</td>
  <td width="20" style="border-right: 0.1px;" height="30" align="center" valign="top">&nbsp;</td>
<td width="20" style="border-right: 0.1px;" height="30" align="center" valign="top">&nbsp;</td>
<td width="20" style="border-right: 0.1px;" height="30" align="center" valign="top">&nbsp;</td>
<td width="20" style="border-right: 0.1px;" height="30" align="center" valign="top">&nbsp;</td>
<td width="20" style="border-top: 0.1px;" height="30" align="center" valign="top">&nbsp;</td></tr>

    <?php}
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
<div id="footer">
<table align="center" width="99.5%"  border="1">
   
  <tr bgcolor="#FFFFFF">
    <td colspan="3" rowspan="4" align="center"  valign="top"><table width="95%"  border="0">
        <tr align="center">
          <td align="left" valign="top">&nbsp;<span class="style5"><u>JUDUL SKRIPSI  :</u></span> </td>
        </tr>
      </table>    
       <table width="95%"  border="0">
        <tr align="center">
          <td height="95%" align="left" valign="top"><?php echo"$mhss[judul]"; ?>            <?php //echo"&nbsp;Judul Skripsi : "?>
            <?php //echo"&nbsp;Thesis Title : "?>
            <?php //echo"&nbsp;<i>$mhss[title]</i>"; ?></td>
        </tr>
      </table>      <br>
      <br>      </td>
    <td align="left"  width="313" height="23">&nbsp;Jumlah
      <i>&nbsp;(Total)</i></td>
    <td  align="center" width="115.5"> <table width="100%"  border="0" frame="" rules=all>
  <tr>
    <td width="68%" valign="middle" align="center"><?php	
	
	//$k = mysql_query("select sum(jumlah) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and app2='2' and angka>'1'");
	$k = mysql_query("select sum(jumlah) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and angka>'1'");
	$kk = mysql_fetch_array($k);
	
	$k2 = mysql_query("select sum(jumlah_baru) as krt from mahasiswa_trans where idmahasiswa='$kdmhs'  ");
	$kk2 = mysql_fetch_array($k2);
	$hit_krs = $kk['kr'] + $kk2['krt'];
	echo"$hit_krs"; 
	
	//total nilai
$aa = mysql_query("select sum(jumlah_baru*angka_baru) as xx from mahasiswa_trans where idmahasiswa='$kdmhs'");
$aaa=mysql_fetch_array($aa);
//$bb= mysql_query("select sum(jumlah*angka) as yy from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and app2='2' and angka>'1' ");
$bb= mysql_query("select sum(jumlah*angka) as yy from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2'  and angka>'1' ");
$bbb=mysql_fetch_array($bb);

$hit_total=$aaa['xx'] + $bbb['yy'];
$ipk=$hit_total / $hit_krs;
	//echo"<b>| $hit_total</b>";

	
	?></td>
    <td width="25%" valign="middle" align="center"><?php echo"&nbsp;$hit_total";?></td>
  </tr>
</table></td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF">
    <td align="left" height="23">&nbsp;Indek Prestasi Kumulatif <i>&nbsp;(Grade Point Average)</i></td>
    <td>      
	<?php	
	
	//$k = mysql_query("select sum(jumlah) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and app2='2' and angka>'1'");
	$k = mysql_query("select sum(jumlah) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and angka>'1'");
	$kk = mysql_fetch_array($k);
	
	$k2 = mysql_query("select sum(jumlah_baru) as krt from mahasiswa_trans where idmahasiswa='$kdmhs'  ");
	$kk2 = mysql_fetch_array($k2);
	$hit_krs = $kk['kr'] + $kk2['krt'];
	//echo"<br><b>$hit_krs</b>"; 
	
	//total nilai
$aa = mysql_query("select sum(jumlah_baru*angka_baru) as xx from mahasiswa_trans where idmahasiswa='$kdmhs'");
$aaa=mysql_fetch_array($aa);
//$bb= mysql_query("select sum(jumlah*angka) as yy from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and app2='2' and angka>'1' ");
$bb= mysql_query("select sum(jumlah*angka) as yy from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2'  and angka>'1' ");
$bbb=mysql_fetch_array($bb);

$hit_total=$aaa['xx'] + $bbb['yy'];
$ipk=$hit_total / $hit_krs;
	$ipk2=$hit_total / $hit_krs;
	echo number_format($ipk2,2);
	?>
	<?php
	//total nilai
$aa = mysql_query("select sum(jumlah_baru*angka_baru) as xx from mahasiswa_trans where idmahasiswa='$kdmhs'");
$aaa=mysql_fetch_array($aa);

$bb= mysql_query("select sum(jumlah*angka) as yy from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and app2='2' and angka>'1'");
$bbb=mysql_fetch_array($bb);

$hit_total=$aaa['xx'] + $bbb['yy'];
$ipk=$hit_total / $hit_krs;
//echo number_format($ipk,2);
	
 
 
	//$rk = mysql_query("select  sum(ip) as ips from rekamsemester where idmahasiswa='$kdmhs'");
//$rkk = mysql_fetch_array($rk);
	//echo"$rkk[ips]";
	
	 ?></td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF">
    <td align="left" height="23">&nbsp;Tanggal Lulus<i>&nbsp;(Date of Graduate)</i> </td>
    <td><?php echo"$mhss[tgl_wisuda]"; ?></td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF">
    <td align="left" height="23">&nbsp;Predikat Kelulusan<i>&nbsp;(Predicate of Graduate)</i> </td>
    <td><?php 
	  //echo"$ipk2";
	  $ipk2num=number_format($ipk2,2);
	 // echo"$ipk2num";
	If($ipk2num>= 3.51)
{
   $predikat="Dengan Pujian / <i>Cumlaude</i>";
}
 elseif ($ipk2num>= 3.01)
{
   $predikat="Sangat Memuaskan / <i>Very Satisfactorily</i>";
}
elseif ($ipk2num>=2.76)
{
   $predikat="Memuaskan / <i>Satisfactorily</i>";
}
elseif ($ipk2num>=0)
{
   $predikat="";
}
 echo"$predikat";
	  
	   	
	?>      </td>
  </tr>
</table>
<br>
<table width="100%"  border="0">
  <tr align="center">
    <td align="left"width="45%" >&nbsp;</td>
    <td width="55%"><table width="100%"  border="0">
        <tr>
          <td width="32%">&nbsp;</td>
          <td width="70%">SEMARANG, <?php echo"$mhss[tgl_cetak]"; ?> </td>
        </tr>
      </table></td>
  </tr>
  <tr align="center">
    <td  align="left">&nbsp;</td>
    <td><table width="100%"  border="0">
      <tr>
        <td width="32%">&nbsp;</td>
        <td width="70%">DISAHKAN OLEH <i>( Legalized by )</i></td>
      </tr>
    </table>      </td>
  </tr>
  <tr align="center">
    <td ><table width="100%"  border="0">
      <tr>
        <td width="25%">&nbsp;</td>
        <td width="81%"><br> 
          REKTOR <i>( Rector )</i></td>
      </tr>
    </table>      </td>
    <td><table width="100%"  border="0">
  <tr>
    <td width="32%">&nbsp;</td>
    <td width="70%"><br>
      DEKAN <i>( Dean )</i></td>
  </tr>
</table></td>
  </tr>
  <tr align="center">
    <td height="85">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr align="left">
    <br>
    <td height="27" align="left">      <table width="100%"  border="0">
        <tr>
          <td width="25%">&nbsp;</td>
          <td width="86%"><b>Prof. Dr. H. Mahmutarom HR, SH., MH.<br>
            NPP. 01 99 0 0005</b></td>
        </tr>
      </table></td>
    <td>      <table width="100%"  border="0">
        <tr>
          <td width="30%">&nbsp;</td>
          <td width="66%">            <?php echo"<b>$fakk[link]</b>"; ?></td>
        </tr>
      </table></td>
  </tr>
</table>
</div>
</div>
</body>
</html>
<?php
}
?>