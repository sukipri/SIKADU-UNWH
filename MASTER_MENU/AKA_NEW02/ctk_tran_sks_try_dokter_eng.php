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
.style18 {font-family: Arial; font-size: 12px; }
.style16 {font-family: Arial; font-size: 12px; }
.style20 {
	font-family: Arial;
	font-size: 12px;
	font-weight: bold;
	font-style: italic;
}
.style6 {
	font-family: "Times New Roman", Times, serif;
	font-weight: bold;
	font-style: italic;
}
.style23 {font-family: "Times New Roman", Times, serif}
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
    <td  width="195" valign="top"> <span class="style16"><em class="style16">Full Name</em></span></td>
    <td width="251"  valign="top" ><span class="style16">: 
        <?php $nama=strtoupper($mhss[nama]); echo $nama;?> 
      </span></td>
    <td width="161"><span class="style16"><em class="style16">Certificate of Establishment</em></span></td>
    <td valign="top" width="222"><span class="style16">: SK MENDIKNAS NO.124/D/0/2000 </span></td>
  </tr>
  <tr class="style16">
    <td valign="top"><span class="style16"><em>Index Number</em></span></td>
    <td valign="top" class="style16"><span class="style16">: <?php echo"$mhss[idmahasiswa]"; ?></span></td>
    <td><span class="style16"><em class="style16">Faculty</em></span></td>
    <td valign="top" class="style16"><span class="style16">: 
        <?php $fakultas=strtoupper($fakk[fakultas]); echo "MEDICINE";
		//$fakultas." / ".""; ?>
    </span></td>
  </tr>
  <tr class="style16">
    <td><span class="style16"><em>Place, Date of birth</em></span></td>
    <td valign="top" class="style16"><span class="style16">:       
      <?php $tempat=strtoupper($mhss[tempat_lahir]); echo $tempat;?>
      <?php echo" , $mhss[tgl_lahir]"; ?></span></td>
    <td><span class="style16"><em>Education Program</em></span></td>
    <td valign="top" class="style16"><span class="style16">: 
        <?php 
	  
	If($kjj[idjur]==502)
{
   $program="PROFESI / Profession";
}
 elseif ($kjj[idjur]=='A')
{
   $program="MASTER";
}else
{
   $program="SARJANA";
}
 //echo"$program";
 echo "BACHELOR";
	  
	   	
	?>
</span></td>
  </tr>
  <tr class="style16">
    <td><span class="style16"><em>Number</em></span></td>
    <td valign="top" class="style16"><span class="style16">: <?php echo"$mhss[nomor_ijasah]"; ?></span></td>
    <td><span class="style16"><em class="style16">Major</em></span></td>
    <td valign="top" class="style16"><span class="style16">: 
        <?php $kejuruan=strtoupper($kjj[kejuruan]); //echo $kejuruan." ".""; 
		echo "MEDICINE";?>
        <?php $kj2 = mysql_query("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
$kjj2 = mysql_fetch_array($kj2);
//echo"<b>$kjj2[akt6]</b>"; ?>
</span></td>
  </tr>
  <tr class="style16">
    <td height="21"><em>National Certificate Number</em></td>
    <td>: <?php echo"$mhss[no_ijazah_nas]"; ?></td>
    <td class="style16"><em class="style16">Status</em></td>
    <td valign="top">: ACCREDITED BY LAM-PTKES</td>
  </tr>
</table>
<table width="100%" height="226" border="3" align="center" rules="cols" >
  <tr align="center" bgcolor="" style="border-bottom:1px solid;">
    <td width="43" bgcolor=""><span class="style20">Numb</span></td>
    <td width="510" height="40" bgcolor=""><span class="style20">Subject</span></td>
    <td width="69" bgcolor=""><span class="style20">Grade</span></td>
    <td width="74" bgcolor=""><span class="style20">Weight      </span></td>
    <td width="75" bgcolor=""><span class="style20">Credit</span></td>
    <td width="63"#cccccc"><span class="style20">Value</span></td>
    </tr>
    <tr align="center" bgcolor="" style="border-bottom:inset;">
    <td width="43" bgcolor=""></td>
    <td width="510" height="3" bgcolor=""></td>
    <td width="69" bgcolor=""></td>
    <td width="74" bgcolor=""></td>
    <td width="75" bgcolor=""></td>
    <td width="63" #cccccc"></td>
    </tr>
	
  <?php
  //$krs = mysql_query("select idmahasiswa,idsks, idkurikulum, angka_baru as angka,jumlah_baru as jumlah,  jumlah_baru as total2 ,huruf_baru as huruf, (jumlah_baru*angka_baru) as xx from mahasiswa_trans where idmahasiswa='$kdmhs' UNION
  //select idmahasiswa, idsks, idpraktikum as idkurikulum, angka, jumlah as jumlah, total2,huruf, (jumlah*angka) as xx from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and app2='2' and angka>'1' limit 0,35");
 $krs = mysql_query("select  kurikulum.idmain, mahasiswa_trans.idmahasiswa,mahasiswa_trans.idsks, mahasiswa_trans.idkurikulum as idkurikulum, mahasiswa_trans.angka_baru as angka,mahasiswa_trans.jumlah_baru as jumlah,  mahasiswa_trans.jumlah_baru as total2 ,mahasiswa_trans.huruf_baru as huruf, (jumlah_baru*angka_baru) as xx 
	FROM mahasiswa_trans INNER JOIN kurikulum ON mahasiswa_trans.idkurikulum=kurikulum.idkurikulum where mahasiswa_trans.idmahasiswa='$kdmhs' 
  UNION
  SELECT  kur_urut.idmain, krs.idmahasiswa, krs.idsks, krs.idpraktikum AS idkurikulum, krs.angka AS angka, krs.jumlah AS jumlah, krs.total2, krs.huruf, (krs.jumlah * krs.angka) AS xx FROM krs INNER JOIN kur_urut ON krs.idsks = kur_urut.idsks 
  where krs.idmahasiswa='$mhss[idmahasiswa]' and app='2' and app2='2' and angka>'1' ORDER BY idmain ASC limit 0,70");
 
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
<!--</table>

<table width="100%" height="54" border="3" align="center"  rules="cols" > -->
  <?php
  //$krs = mysql_query("select idmahasiswa,idsks, idkurikulum, angka_baru as angka,jumlah_baru as jumlah,  jumlah_baru as total2 ,huruf_baru as huruf, (jumlah_baru*angka_baru) as xx from mahasiswa_trans where idmahasiswa='$kdmhs' UNION
  //select idmahasiswa, idsks, idpraktikum as idkurikulum, angka, jumlah as jumlah, total2,huruf, (jumlah*angka) as xx from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and app2='2' and angka>'1' limit 0,35");
 $krs = mysql_query("select  kurikulum.idmain, mahasiswa_trans.idmahasiswa,mahasiswa_trans.idsks, mahasiswa_trans.idkurikulum as idkurikulum, mahasiswa_trans.angka_baru as angka,mahasiswa_trans.jumlah_baru as jumlah,  mahasiswa_trans.jumlah_baru as total2 ,mahasiswa_trans.huruf_baru as huruf, (jumlah_baru*angka_baru) as xx 
	FROM mahasiswa_trans INNER JOIN kurikulum ON mahasiswa_trans.idkurikulum=kurikulum.idkurikulum where mahasiswa_trans.idmahasiswa='$kdmhs' 
  UNION
  SELECT  kur_urut.idmain, krs.idmahasiswa, krs.idsks, krs.idpraktikum AS idkurikulum, krs.angka AS angka, krs.jumlah AS jumlah, krs.total2, krs.huruf, (krs.jumlah * krs.angka) AS xx FROM krs INNER JOIN kur_urut ON krs.idsks = kur_urut.idsks 
  where krs.idmahasiswa='$mhss[idmahasiswa]' and app='2' and angka>'1' ORDER BY idmain ASC limit 0,70");
 
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
    <td width="43" height="0"   align="center" valign="top"> <span class="style18">
      <?php
$no++;


?>
      <?php echo"$no"; ?> </span></td>
    <td width="510" align="left"><span class="style18"><?php //echo"<strong>  &nbsp;&nbsp;$krr[judul] $kurii[judul]</strong>";?><?php echo"<i>&nbsp;&nbsp;$krr[juduleng]</i><i>$kurii[juduleng]</i>"; ?>
          <?php if(empty($dsnn['nama']))//{ echo"MIGRASI SIA LAMA"; }else { echo"$dsnn[nama]"; } ?>
          <?php //echo"<b>$kurii[judul]</b><br>$kurii[juduleng]"; ?></span></td>
    <td width="69"> <span class="style18"><?php echo"$krss[huruf]"; ?> </span></td>
    <td width="74"><span class="style18"><?php $angka2=$krss['angka']; ?>
          <?php //echo"$krss[angka_baru]"; 
		  	echo number_format($angka2,2); ?>
    </span></td>
    <td width="75"><span class="style18"> <?php echo"$krss[jumlah]"; ?>
          <?php 
	
	
	//echo"$skss[jumlah]";
	?>
    </span> </td>
    <td width="63"><span class="style18">
      <?php //echo"$krss[total2]"; ?>
      <?php $hitung = $krss['jumlah'] * $krss['angka']; echo number_format($hitung,2); ?>
    </span> </td>
  </tr>
  <?php
  }
  ?>
  <?php
/*  $krt = mysql_query("select * from mahasiswa_trans where idmahasiswa='$kdmhs'");
	while($krtt = mysql_fetch_array($krt)){
	$kuri = mysql_query("select * from kurikulum where idkurikulum='$krtt[idkurikulum]'");
	$kurii = mysql_fetch_array($kuri);
	
	  
   ?>
  <?php
  
  }
  */?>

   
  <tr bgcolor="#FFFFFF" style="border:1px solid;">
    <td colspan="2" rowspan="4" align="center"><strong>&nbsp;</strong><br>
      <?php //echo"$mhss[title]"; ?>
      <table width="95%"  border="0">
        <tr align="center">
          <td align="left"><span class="style6"><u>THESIS TITLE</u></span><em><strong><span class="style23"><u>:</u></span></strong></em></td>
        </tr>
      </table>
      <table width="95%"  border="0">
        <tr align="center">
          <td height="95%" align="left"><?php //echo"$mhss[judul]"; ?>
              <?php //echo"&nbsp;Judul Skripsi : "?>
              <?php //echo"&nbsp;Thesis Title : "?>
              <?php echo"<i>$mhss[title]</i>"; ?></td>
        </tr>
      </table>
      <br>
      <br></td>
    <td height="22" align="left" colspan="2" class="style18"> <span class="style16"><i>Total</i></span></td>
    <td width="75"  valign="center" align="center" class="style18"><span class="style18"><?php	
	
	$k = mysql_query("select sum(jumlah) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and angka>'1'  ");
	$kk = mysql_fetch_array($k);
	
	$k2 = mysql_query("select sum(jumlah_baru) as krt from mahasiswa_trans where idmahasiswa='$kdmhs'  ");
	$kk2 = mysql_fetch_array($k2);
	$hit_krs = $kk['kr'] + $kk2['krt'];
	echo"$hit_krs"; 
	
	//total nilai
$aa = mysql_query("select sum(jumlah_baru*angka_baru) as xx from mahasiswa_trans where idmahasiswa='$kdmhs'");
$aaa=mysql_fetch_array($aa);

$bb= mysql_query("select sum(jumlah*angka) as yy from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and angka>'1'  ");
$bbb=mysql_fetch_array($bb);

$hit_total=$aaa['xx'] + $bbb['yy'];
$ipk=$hit_total / $hit_krs;
	
	
	?> 
 </span></td>
    <td width="63"  align="center" class="style18"><?php echo number_format($hit_total,2)?></td>
  </tr>
  <tr align="left" bgcolor="#FFFFFF" style="border:1px solid;">
    <td height="27" align="left" colspan="2" class="style18"><span class="style16"><i>Grade Point Average</i></span></td>
    <td colspan="2" class="style18">      
	  <div align="center"><span class="style18">
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
	//echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo number_format($ipk2,2);
	?>
	  </span></div></td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF" style="border:1px solid;">
    <td height="27" colspan="2" align="left" class="style18"><span class="style16"><i>Date of Graduate</i></span></td>
    <td colspan="2" class="style18"><div align="center"><span class="style18"><?php echo"$mhss[tgl_wisuda]"; ?></span></div></td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF" style="border:1px solid;">
    <td height="33" colspan="2" align="left" class="style18"><span class="style16"><i>Predicate of Graduate</i></span></td>
    <td colspan="2" class="style18"><div align="center"><span class="style18">
      <?php 
	  
	If($ipk >= 3.51)
{
   $predikat="<i>Cumlaude</i>";
}
 elseif ($ipk>= 3.01)
{
   $predikat=" <i>Very Satisfactorily</i>";
}elseif ($ipk>=2.76)
{
   $predikat=" <i>Satisfactorily</i>";
}
 echo"$predikat";
	  
	   	
	?>
    </span></div></td>
  </tr>
</table>

<table width="100%"  border="0">
  <tr align="left" class="style18">
    <td width="37%">&nbsp;</td>
    <td width="34%" class="style18">&nbsp;</td>
	<td width="29%" class="style18">&nbsp;</td>
  </tr>
  <tr align="center" class="style18">
    <td>&nbsp;</td>
    <td class="style18">&nbsp;</td>
	<td class="style18">&nbsp;</td>
  </tr>
  <tr align="center" class="style18">
 
    <td class="style18" >&nbsp;</td>
    <td>&nbsp;</td>
	
    <td class="style18">&nbsp;</td>
  </tr>
  <tr align="center" class="style18">
    <td>&nbsp;</td>
    <td class="style18">&nbsp;</td>
  </tr>
  <tr align="center" class="style18">
    <td height="42" class="style18">&nbsp;</td>
    <td>&nbsp;</td>
    <td class="style18">&nbsp;</td>
  </tr>
</table>
</div>
</body>
</html>
<?php
}
?>