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
<style type="text/css">
<!--
.style18 {font-family: Arial; font-size: 16px; }
.style16 {font-family: Arial; font-size: 14px; }
.style12 {font-family: Arial; font-size: 12px; }
.style6 {font-family: "Times New Roman", Times, serif}
.style19 {font-size: 14px}
-->
</style>
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
  <tr class="style16">
    <td  width="21%" valign="top"> <span class="style16">NAMA LENGKAP <br> 
      <em class="style16">(Full Name) </em></span></td>
    <td width="30%"  valign="top" ><span class="style16">: 
        <?php $nama=strtoupper($mhss[nama]); echo $nama;?> 
      </span></td>
    <td valign="top"  width="22%"><span class="style16">KEPUTUSAN PENDIRIAN PT<br> 
      <em class="style16">(Certificate of Establishment) </em></span></td>
    <td valign="top" width="27%"><span class="style16">: SK MENDIKNAS NO.124/D/0/2000 </span></td>
  </tr>
  <tr class="style16">
    <td valign="top"><span class="style16">N I M</span> <span class="style16"><br>
      </span><span class="style16"><em>(Student Number)</em> </span></td>
    <td valign="top" class="style16"><span class="style16">: <?php echo"$mhss[idmahasiswa]"; ?></span></td>
    <td valign="top" ><span class="style16">PROGRAM<br>
        <em class="style16">(Program) </em></span></td>
    <td valign="top" class="style16"><span class="style16">: PASCASARJANA <BR> &nbsp;&nbsp;<em>(Postgraduate)</em>      </span></td>
  </tr>
  <tr class="style16">
    <td valign="top" ><span class="style16">KELAHIRAN<br>
      </span><span class="style16"><em>(Place, Date of birth)</em> </span></td>
    <td valign="top" class="style16"><span class="style16">:       
      <?php $tempat=strtoupper($mhss[tempat_lahir]); echo $tempat;?>
      <?php echo" , $mhss[tgl_lahir]"; ?></span></td>
    <td valign="top" >PROGRAM STUDI <span class="style16"><br>
        <em class="style16">(Course/Departemen Major) </em></span></td>
    <td valign="top" class="style16"><span class="style16">:        <?php 
	  
	If($kjj[idjur]=='A')
{
   $prodi="PENDIDIKAN AGAMA ISLAM <BR><em>&nbsp;&nbsp;(Islamic Education)</em>" ;
}
 elseif ($kjj[idjur]=='B')
{
   $prodi="MUAMALAT <br> <em>&nbsp;&nbsp;(Muamalat)</em>";
}else
{
   $prodi="PENDIDIKAN AGAMA ISLAM";
}
 echo"$prodi";
	  
	   	
	?>
    </span></td>
  </tr>
  <tr class="style16">
    <td valign="top" >N I R M<br>
      <span class="style16"><em>(Student index Number)</em> </span></td>
    <td valign="top" class="style16"><span class="style16">: <?php echo"$mhss[nirm]"; ?></span></td>
    <td valign="top" >LULUSAN PROGRAM<span class="style16"><br>
        <em class="style16">(Graduate Program) </em></span></td>
    <td valign="top" class="style16"><span class="style16">: 
        STRATA 2 <br>&nbsp;&nbsp;<em>(Master)</em>
    </span></td>
  </tr>
  <tr class="style16">
    <td valign="top" >N I R L<br>
      <span class="style16"><em>(Graduation index Number)</em> </span></td>
    <td valign="top" >: <?php echo"$mhss[nirl]"; ?></td>
    <td valign="top"  class="style16">GELAR KESARJANAAN <br>
        <em class="style16">(Akademic Degree)</em> </td>
    <td valign="top"><span class="style16">:</span> <?php 
	  
	If($kjj[idjur]=='A')
{
   $gelar="MAGISTER PENDIDIKAN (M.Pd.) <br> <em>&nbsp;&nbsp;(Master of Education)</em>";
}
 elseif ($kjj[idjur]=='B')
{
   $gelar="MAGISTER HUKUM (M.H.) <br> <em>&nbsp;&nbsp;(Master of Law)</em>";
}else
{
   $program="MAGISTER PENDIDIKAN (M.Pd.)";
}
 echo"$gelar";
	  
	   	
	?>    
      <em class="style16">&nbsp;</em></td>
  </tr>
  <tr class="style16">
    <td valign="top" >NOMOR<br>
      <span class="style16"><em>(Number)</em> </span></td>
    <td valign="top" >: <?php echo"$mhss[nomor_ijasah]"; ?></td>
    <td class="style16" valign="top" >STATUS<br>
      <em class="style16">(Status)</em> </td>
    <td valign="top">:
      <?php 
	  
	If($kjj[idjur]=='A')
{
   $status="TERAKREDITASI  A BAN PT <br>&nbsp;&nbsp;<i>(Accredited A by BAN PT)</i>" ;
}
 elseif ($kjj[idjur]=='B')
{
   $status="TERAKREDITASI  B BAN PT <br>&nbsp;&nbsp;<i>(Accredited B by BAN PT)</i>";
}else
{
   $status="TERAKREDITASI BAN PT <br>&nbsp;&nbsp;<i>(Accredited by BAN PT)</i>";
}
 echo"$status";
	  
	   	
	?></td>
  </tr>
  <tr class="style16">
  <td height="21">Nomor Ijazah Nasional <br><em>(National Certificate Number)</em></td>
    <td>: <?php echo"$mhss[no_ijazah_nas]"; ?></td>
  </tr>
</table>
<table width="100%" height="44" border="3" align="center" rules="cols">
  <tr align="center" bgcolor="" style="border: 1px solid;">
    <td width="58" bgcolor=""><span class="style18">No</span></td>
    <td width="496" height="40" bgcolor=""><span class="style16">MATA KULIAH <em><br>
      (Subject) </em></span></td>
    <td width="106" bgcolor=""><span class="style16">NILAI/ <br>
    <em>(Grade)</em></span></td>
    <td width="106" bgcolor=""><span class="style16">BOBOT/ <br>
      <em>(Weight)</em>      </span></td>
    <td width="110" bgcolor=""><span class="style16">KREDIT/ <br>
    <em>(Credit)</em></span></td>
    <td width="107"#cccccc"><span class="style16">MUTU/ <br>
    <em>(Value)</em></span></td>
    </tr>

    <tr align="center" bgcolor="" style="border-bottom: 3px solid;">
    <td width="58" bgcolor=""></td>
    <td width="496" height="3" bgcolor=""></td>
    <td width="106" bgcolor=""></td>
    <td width="106" bgcolor=""></td>
    <td width="110" bgcolor=""></td>
    <td width="107"></td>
    </tr>
	
  <?php
  //$krs = mysql_query("select idmahasiswa,idsks, idkurikulum, angka_baru as angka,jumlah_baru as jumlah,  jumlah_baru as total2 ,huruf_baru as huruf, (jumlah_baru*angka_baru) as xx from mahasiswa_trans where idmahasiswa='$kdmhs' UNION
  //select idmahasiswa, idsks, idpraktikum as idkurikulum, angka, jumlah as jumlah, total2,huruf, (jumlah*angka) as xx from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and app2='2' and angka>'1' limit 0,35");
 $krs = mysql_query("select  kurikulum.idmain, mahasiswa_trans.idmahasiswa,mahasiswa_trans.idsks, mahasiswa_trans.idkurikulum as idkurikulum, mahasiswa_trans.angka_baru as angka,mahasiswa_trans.jumlah_baru as jumlah,  mahasiswa_trans.jumlah_baru as total2 ,mahasiswa_trans.huruf_baru as huruf, (jumlah_baru*angka_baru) as xx 
	FROM mahasiswa_trans INNER JOIN kurikulum ON mahasiswa_trans.idkurikulum=kurikulum.idkurikulum where mahasiswa_trans.idmahasiswa='$kdmhs' 
  UNION
  SELECT  kur_urut.idmain, krs.idmahasiswa, krs.idsks, krs.idpraktikum AS idkurikulum, krs.angka AS angka, krs.jumlah AS jumlah, krs.total2, krs.huruf, (krs.jumlah * krs.angka) AS xx FROM krs INNER JOIN kur_urut ON krs.idsks = kur_urut.idsks 
  where krs.idmahasiswa='$mhss[idmahasiswa]' and app='2' and app2='2' and angka>'1' ORDER BY idmain ASC limit 0,35");
 
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

  <?php
  //$krs = mysql_query("select idmahasiswa,idsks, idkurikulum, angka_baru as angka,jumlah_baru as jumlah,  jumlah_baru as total2 ,huruf_baru as huruf, (jumlah_baru*angka_baru) as xx from mahasiswa_trans where idmahasiswa='$kdmhs' UNION
  //select idmahasiswa, idsks, idpraktikum as idkurikulum, angka, jumlah as jumlah, total2,huruf, (jumlah*angka) as xx from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and app2='2' and angka>'1' limit 0,35");
 $krs = mysql_query("select  kurikulum.idmain, mahasiswa_trans.idmahasiswa,mahasiswa_trans.idsks, mahasiswa_trans.idkurikulum as idkurikulum, mahasiswa_trans.angka_baru as angka,mahasiswa_trans.jumlah_baru as jumlah,  mahasiswa_trans.jumlah_baru as total2 ,mahasiswa_trans.huruf_baru as huruf, (jumlah_baru*angka_baru) as xx 
	FROM mahasiswa_trans INNER JOIN kurikulum ON mahasiswa_trans.idkurikulum=kurikulum.idkurikulum where mahasiswa_trans.idmahasiswa='$kdmhs' 
  UNION
  SELECT  kur_urut.idmain, krs.idmahasiswa, krs.idsks, krs.idpraktikum AS idkurikulum, krs.angka AS angka, krs.jumlah AS jumlah, krs.total2, krs.huruf, (krs.jumlah * krs.angka) AS xx FROM krs INNER JOIN kur_urut ON krs.idsks = kur_urut.idsks 
  where krs.idmahasiswa='$mhss[idmahasiswa]' and app='2' and angka>'1' ORDER BY idmain ASC limit 0,35");
 
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
    <td width="57" height="50"  align="center" style="vertical-align: top"> <span class="style16">
      <?php
$no++;


?>
      <?php echo"$no"; ?> </span></td>
    <td width="496" align="left" style="vertical-align: top"><span class="style16"><?php echo"  &nbsp;&nbsp;$krr[judul] $kurii[judul]";?> </span> <span class="style16"><?php echo"<br><i>&nbsp;&nbsp;$krr[juduleng]</i><i>$kurii[juduleng]</i>"; ?>
          <?php if(empty($dsnn['nama']))//{ echo"MIGRASI SIA LAMA"; }else { echo"$dsnn[nama]"; } ?>
          <?php //echo"<b>$kurii[judul]</b><br>$kurii[juduleng]"; ?>
    </span></td>
    <td width="104"> <span class="style16"><?php echo"$krss[huruf]"; ?> </span></td>
    <td width="104"><span class="style16"><?php $angka2=$krss['angka']; ?>
          <?php //echo"$krss[angka_baru]"; 
		  	echo number_format($angka2,2); ?>
    </span></td>
    <td width="112"><span class="style16"> <?php echo"$krss[jumlah]"; ?>
          <?php 
	
	
	//echo"$skss[jumlah]";
	?>
    </span> </td>
    <td width="106"><span class="style16">
      <?php //echo"$krss[total2]"; ?>
      <?php $hitung = $krss['jumlah'] * $krss['angka']; echo number_format($hitung,2); ?>
    </span> </td>
  </tr>
  <?php
  }
  ?>
    
  <tr bgcolor="#FFFFFF" style="border-top:3px solid;">
    <td colspan="2" rowspan="4" align="left" style="vertical-align: top;"> <br>
      <div style="margin-left: 15px;font-size: 13px;">
    <u>Judul Tesis</u><br>
    <?php echo"$mhss[judul]"; ?>
              <?php //echo"&nbsp;Judul Skripsi : "?>
              <?php //echo"&nbsp;Thesis Title : "?>
              <?php //echo"&nbsp;<i>$mhss[title]</i>"; ?><br>
      <u><em>The Title of Thesis </em></u><br>
      <?php //echo"$mhss[judul]"; ?>
              <?php //echo"&nbsp;Judul Skripsi : "?>
              <?php //echo"&nbsp;Thesis Title : "?>
              <?php echo"$mhss[title]"; ?></div>
    </td>

    <td  width="225" colspan="2" height="42" align="left" style="border:1px solid;" class="style16"> &nbsp;&nbsp;<span class="style16">JUMLAH</span><span class="style16"><br>
        <i> &nbsp;&nbsp;(Total)</i></span></td>
    <td width="113"  valign="center" align="center" class="style16"><span class="style16"><?php	
	
	$k = mysql_query("select sum(jumlah) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' AND angka >'1' and app='2' ");
	$kk = mysql_fetch_array($k);
	
	$k2 = mysql_query("select sum(jumlah_baru) as krt from mahasiswa_trans where idmahasiswa='$kdmhs'  ");
	$kk2 = mysql_fetch_array($k2);
	$hit_krs = $kk['kr'] + $kk2['krt'];
	echo"$hit_krs"; 
	
	//total nilai
$aa = mysql_query("select sum(jumlah_baru*angka_baru) as xx from mahasiswa_trans where idmahasiswa='$kdmhs'");
$aaa=mysql_fetch_array($aa);

$bb= mysql_query("select sum(jumlah*angka) as yy from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2'");
$bbb=mysql_fetch_array($bb);

$hit_total=$aaa['xx'] + $bbb['yy'];
$ipk=$hit_total / $hit_krs;
	
	
	?> 
 </span></td>
    <td width="108"  align="center" class="style18"><?php echo number_format($hit_total,2)?></td>
  </tr>
  <tr align="left" bgcolor="#FFFFFF" style="border:1px solid;">
    <td height="27" colspan="2" width="270" align="left" class="style16"><span class="style19">&nbsp;&nbsp;INDEK PRESTASI KUMULATIF</span> <span class="style16"> <br>
      <i>&nbsp;&nbsp;(Grade Point Average)</i></span></td>
    <td colspan="2" class="style18">      
	  <div align="left"><span class="style16">
	    <?php
	//total nilai
$aa = mysql_query("select sum(jumlah_baru*angka_baru) as xx from mahasiswa_trans where idmahasiswa='$kdmhs'");
$aaa=mysql_fetch_array($aa);

$bb= mysql_query("select sum(jumlah*angka) as yy from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' ");
$bbb=mysql_fetch_array($bb);

$hit_total=$aaa['xx'] + $bbb['yy'];
$ipk=$hit_total / $hit_krs;
echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo number_format($ipk,2);
	
 
 
	//$rk = mysql_query("select  sum(ip) as ips from rekamsemester where idmahasiswa='$kdmhs'");
//$rkk = mysql_fetch_array($rk);
	//echo"$rkk[ips]";
	
	 ?>
      </span></div></td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF" style="border:1px solid;">
    <td height="27" align="left" colspan="2" class="style16"><span class="style16">&nbsp;&nbsp;PREDIKAT KELULUSAN</span><span class="style16"><br>
      <i>&nbsp;&nbsp;(Predicate of Graduate)</i></span></td>
    <td colspan="2" class="style16"><div align="left">
      <?php 
	  
	If($ipk >= 3.76)
{
   $predikat="Dengan Pujian";
   $predikat2="<span class='style16'><i>(Cumlaude)</i></span>";
}
 elseif ($ipk>= 3.51)
{
   $predikat="Sangat Memuaskan";
   $predikat2="<span class='style16'><i>(Very Satisfactory)</i></span>";
}elseif ($ipk>=3.00)
{
   $predikat="Memuaskan";
   $predikat2="<span class='style16'><i>(Satisfactory)</i></span>";
}
 echo"&nbsp;&nbsp;&nbsp;&nbsp;$predikat<br>";
  echo"&nbsp;&nbsp;&nbsp;&nbsp;$predikat2";
	  
	   	
	?>
    </div></td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF" style="border:1px solid;">
    <td height="42" align="left" colspan="2" class="style18"><span class="style16">&nbsp;&nbsp;TANGGAL LULUS</span><span class="style16"><br>
      <i>&nbsp;&nbsp;(Date of Graduate)</i> </span><span class="style16"> </span></td>
    <td colspan="2" class="style16"><div align="left"><span class="style16">      <?php echo"&nbsp;&nbsp;&nbsp;&nbsp;$mhss[tgl_wisuda]"; ?> </span></div></td>
  </tr>
</table>

<table width="100%"  border="0">
  <tr align="left" class="style16">
    <td colspan="2">&nbsp;</td>
    <td width="31%" class="style18">&nbsp;</td>
	<td width="32%" class="style16"><div align="left"></div></td>
  </tr>
  <tr align="left" class="style16">
    <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;Disahkan oleh <i>(Legalized by)</i></td>
    <td class="style16">&nbsp;</td>
	<td class="style16"><div align="left">Semarang, <?php echo"$mhss[tgl_cetak]"; ?></div></td>
  </tr>
  <tr align="center" class="style16">
 
    <td colspan="2" class="style16" ><div align="left">&nbsp;&nbsp;&nbsp;&nbsp;<i>Direktur, <i>(Director)</i></i></div></td>
    <td>&nbsp;</td>
	
    <td class="style16"><div align="left">Ketua Program Studi, <em>(Head of Program)</em></div></td>
  </tr>
  <tr align="center" class="style16">
    <td colspan="2">&nbsp;</td>
    <td class="style16"><p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
  </tr>
  <tr align="center" class="style16">
    <td width="2%" height="42" class="style16"><div align="left"><span class="style16"><br>
  </span></div></td>
    <td align="left" width="35%" class="style16"><strong><?php echo"$fakk[link]"; ?></strong></td>
    <td>&nbsp;</td>
    <td class="style16"><div align="left"><span class="style16"><strong>
      <?php $kj = mysql_query("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
$kjj = mysql_fetch_array($kj);
echo"<b>$kjj[pejabat]</b>"; ?>
    </strong></span></div></td>
  </tr>
</table>
</div>
</body>
</html>
<?php
}
?>