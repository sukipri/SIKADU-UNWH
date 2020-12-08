<?php session_start();
 include_once"../sc/conek.php";

	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
	$u = mysql_query("select * from user where namauser='$_SESSION[namauser]'");
	$uu = mysql_fetch_array($u);
	
 ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>MANAGEMENT KHS</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body,td,th {
	font-size: 13px;
}
a {
	font-size: 13px;
	color: #0033CC;
	font-weight: bold;
}
a:link {
	text-decoration: none;
	color: #000000;
}
a:visited {
	text-decoration: none;
	color: #000000;
}
a:hover {
	text-decoration: none;
	color: #000000;
}
a:active {
	text-decoration: none;
	color: #000000;
}
-->
</style></head>

<body>

<?php
$tahun = @mysql_real_escape_string($_GET['tahun']);
	$kdmhs=@mysql_real_escape_string($_GET['kdmhs']);
 $mhs = mysql_query("select * from mahasiswa where idmahasiswa='$kdmhs'");
$mhss = mysql_fetch_array($mhs);
	$rsem = mysql_query("select * from rekamsemester where idrekamsemester='$tahun'");
$rsemm = mysql_fetch_array($rsem);
$smd = mysql_query("select * from semester ");
$smmd = mysql_fetch_array($smd);
 $smtj01d = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$smmd[idtahun_ajaran]'");
$smmtj01d = mysql_fetch_array($smtj01d);
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

//echo"<h3>NIM &nbsp; $mhss[idmahasiswa]/&nbsp; $smmtj01d[ajaran]&nbsp;$smmd[ajaran]</h3><hr>";
?>
<?php
$idkhs = @mysql_real_escape_string($_GET['idkhs']);
if(isset($_GET['idkhs'])){
$jumkhs = @mysql_real_escape_string($_GET['jumkhs']);
@mysql_query("update krs set total2='$jumkhs',app2='2' where idkrs='$idkhs'"); 

}
?>
<?php
$idkhsp = @mysql_real_escape_string($_GET['idkhsp']);
if(isset($_GET['idkhsp'])){
$jumkhsp = @mysql_real_escape_string($_GET['jumkhsp']);
@mysql_query("update p_sks set total2='$jumkhsp',app2='2' where idp_sks='$idkhsp'"); 

}
?>
<table width="100%" border="0" align="center">
  <tr>
    <td width="337" align="right"><img src="../img/logokecil.gif" width="52" height="52"></td>
    <td width="319" align="center"><strong>KARTU HASIL STUDI <?php echo"<br>$smm[semester] <br>UNIVERISTAS WAHID HASYIM";?> </strong></td>
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
          <td width="372"><?php ///echo"<b>$mhss[idmahasiswa]</b>"; ?>
          <?php $nama=strtoupper($mhss[nama]); echo "<b>$nama</b>";?></td>
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
<form name="form1" method="post" action="">
  <table width="100%" border="0" align="center" bgcolor="#808080">
    <tr align="center" bgcolor="#7DFF7D">
      <td width="117" height="35">Kode </td>
      <td width="190">Judul
      </td>
      <td width="84">Huruf</td>
      <td width="76">Angka</td>
      <td width="86">SKS</td>
      <td width="185">Mutu</td>
    </tr>
    <?php
	
	
  $krs = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]'  and idsemester='$rsemm[idsemester]'   ");
  $no =1;
  while($krss = mysql_fetch_array($krs)){
  $sks = mysql_query("select * from sks where idsks='$krss[idsks]'  ");
$skss = mysql_fetch_array($sks);
  $sm = mysql_query("select * from semester ");
$smm = mysql_fetch_array($sm);
 $dsn = mysql_query("select * from dosen where iddosen='$skss[iddosen]'");
$dsnn = mysql_fetch_array($dsn);
$kj = mysql_query("select * from kejuruan where idkejuruan='$skss[idkejuruan]'");
$kjj = mysql_fetch_array($kj);
$kr  = mysql_query("select * from kurikulum where idkurikulum='$skss[idkurikulum]'");
$krr = mysql_fetch_array($kr);
 $smtj01 = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$smm[idtahun_ajaran]'");
$smmtj01 = mysql_fetch_array($smtj01);
$total01 =$krss['kt']+$krss['ssp'];
$total02 = $krss['ts']+$krss['nas'];
$sub_total = $total01 + $total02;
$total = $krss['total'];
  
  ?>
    <tr align="center" bgcolor="#FFFFFF">
      <td height="50"><?php echo"<a href=#>$skss[idsks]</a><br>$kjj[kejuruan]"; ?></td>
      <td><?php echo"$krr[judul]<br><i>$krr[juduleng]</i>
	
	"; ?></td>
      <td>
      <?php $jum_pk = $total;
	  
		if($jum_pk <=0){
		echo"nilai belum ada";
		
		}elseif($jum_pk <=50){
		$e = "E";
		$boe = mysql_query("select * from bobot where kodebobot='$e' and idkejuruan='$mhss[idkejuruan]'");
		$booe  = mysql_fetch_array($boe);
		$jboe = $booe['nilai'] * $krss['jumlah'];
		if($krss['app2']==1){
			echo"<a href=v_dkhs.php?idkhs=$krss[idkrs]&jumkhs=$jboe&kdmhs=$kdmhs&tahun=$tahun>lihat nilai</a>";
			}elseif($krss['app2']==2){
		
		echo"<a href=v_dkhs.php?idkhs=$krss[idkrs]&jumkhs=$jboe&kdmhs=$kdmhs&tahun=$tahun>$e</a>";
		
		}
		
		
		}elseif($jum_pk <=55){
		$d = "D";
		$bod = mysql_query("select * from bobot where kodebobot='$d' and idkejuruan='$mhss[idkejuruan]'");
		$bood  = mysql_fetch_array($bod);
		$jbod = $bood['nilai'] * $krss['jumlah'];
		if($krss['app2']==1){
			echo"<a href=v_dkhs.php?idkhs=$krss[idkrs]&jumkhs=$jbod&kdmhs=$kdmhs&tahun=$tahun>lihat nilai</a>";
			}elseif($krss['app2']==2){
		
		echo"<a href=v_dkhs.php?idkhs=$krss[idkrs]&jumkhs=$jbod&kdmhs=$kdmhs&tahun=$tahun>$d</a>";
		
		}
		}elseif($jum_pk <=60){
		$cd = "CD";
		$bocd = mysql_query("select * from bobot where kodebobot='$cd' and idkejuruan='$mhss[idkejuruan]'");
		$boocd  = mysql_fetch_array($bocd);
		$jbocd = $boocd['nilai'] * $krss['jumlah'];
		if($krss['app2']==1){
			echo"<a href=v_dkhs.php?idkhs=$krss[idkrs]&jumkhs=$jbocd&kdmhs=$kdmhs&tahun=$tahun>lihat nilai</a>";
			}elseif($krss['app2']==2){
		
		echo"<a href=v_dkhs.php?idkhs=$krss[idkrs]&jumkhs=$jbocd&kdmhs=$kdmhs&tahun=$tahun>$cd</a>";
		
		}
		}elseif($jum_pk <=65){
		
		$c = "C";
		$boc = mysql_query("select * from bobot where kodebobot='$c' and idkejuruan='$mhss[idkejuruan]'");
		$booc  = mysql_fetch_array($boc);
		$jboc = $booc['nilai'] * $krss['jumlah'];
		if($krss['app2']==1){
			echo"<a href=v_dkhs.php?idkhs=$krss[idkrs]&jumkhs=$jboc&kdmhs=$kdmhs&tahun=$tahun>lihat nilai</a>";
			}elseif($krss['app2']==2){
		
		echo"<a href=v_dkhs.php?idkhs=$krss[idkrs]&jumkhs=$jboc&kdmhs=$kdmhs&tahun=$tahun>$c</a>";
		
		}
		}elseif($jum_pk <=70){
		$bc = "BC";
		$bobc = mysql_query("select * from bobot where kodebobot='$bc' and idkejuruan='$mhss[idkejuruan]'");
		$boobc  = mysql_fetch_array($bobc);
		$jbobc = $boobc['nilai'] * $krss['jumlah'];
		if($krss['app2']==1){
			echo"<a href=v_dkhs.php?idkhs=$krss[idkrs]&jumkhs=$jbobc&kdmhs=$kdmhs&tahun=$tahun>lihat nilai</a>";
			}elseif($krss['app2']==2){
		
		echo"<a href=v_dkhs.php?idkhs=$krss[idkrs]&jumkhs=$jbobc&kdmhs=$kdmhs&tahun=$tahun>$bc</a>";
		
		}
		}elseif($jum_pk <=75){
		$b = "B";
		$bob = mysql_query("select * from bobot where kodebobot='$b' and idkejuruan='$mhss[idkejuruan]'");
		$boob  = mysql_fetch_array($bob);
		$jbob = $boob['nilai'] * $krss['jumlah'];
		if($krss['app2']==1){
			echo"<a href=v_dkhs.php?idkhs=$krss[idkrs]&jumkhs=$jbob&kdmhs=$kdmhs&tahun=$tahun>lihat nilai</a>";
			}elseif($krss['app2']==2){
		
		echo"<a href=v_dkhs.php?idkhs=$krss[idkrs]&jumkhs=$jbob&kdmhs=$kdmhs&tahun=$tahun>$b</a>";
		
		}
		
		}elseif($jum_pk <=80){
		$ab = "AB";
		$boab = mysql_query("select * from bobot where kodebobot='$ab' and idkejuruan='$mhss[idkejuruan]'");
		$booab  = mysql_fetch_array($boab);
		$jboab = $booab['nilai'] * $krss['jumlah'];
		if($krss['app2']==1){
			echo"<a href=v_dkhs.php?idkhs=$krss[idkrs]&jumkhs=$jboab&kdmhs=$kdmhs&tahun=$tahun>lihat nilai</a>";
			}elseif($krss['app2']==2){
		
		echo"<a href=v_dkhs.php?idkhs=$krss[idkrs]&jumkhs=$jboab&kdmhs=$kdmhs&tahun=$tahun>$ab</a>";
		
		}
		
		
		
		}elseif($jum_pk <=100){
		$a = "A";
		$boa = mysql_query("select * from bobot where kodebobot='$a' and idkejuruan='$mhss[idkejuruan]'");
		while($booa  = mysql_fetch_array($boa)){
	
		$jboa = $booa['nilai'] * $krss['jumlah'];
			if($krss['app2']==1){
			echo"<a href=v_dkhs.php?idkhs=$krss[idkrs]&jumkhs=$jboa&kdmhs=$kdmhs&tahun=$tahun>lihat nilai</a>";
			}elseif($krss['app2']==2){
		echo"<a href=v_dkhs.php?idkhs=$krss[idkrs]&jumkhs=$jboa&kdmhs=$kdmhs&tahun=$tahun>$a</a>";
		
		
		}
		}
		
		}
		
		 ?></td>
      <td><?php echo"<b>$krss[angka]</b><br>
	
	"; ?> </td>
      <td><?php 
	
	
	echo"$krss[jumlah]";
	?></td>
      <td><?php //echo"$dsnn[nama]"; ?></td>
    </tr>
	<?php
  $no++;
 }
  ?>
   <?php
	
	
  $krsp = mysql_query("select * from p_sks where idmahasiswa='$mhss[idmahasiswa]' and idsemester='$rsemm[idsemester]'    ");
  $no =1;
  while($krssp = mysql_fetch_array($krsp)){
  $sksp = mysql_query("select * from praktikum where idpraktikum='$krssp[idpraktikum]' and idsemester='$rsemm[idsemester]' ");
$skssp = mysql_fetch_array($sksp);
  $smp = mysql_query("select * from semester ");
$smmp = mysql_fetch_array($smp);
 $dsnp = mysql_query("select * from dosen where iddosen='$skssp[iddosen]'");
$dsnnp = mysql_fetch_array($dsnp);
$kjp = mysql_query("select * from kejuruan where idkejuruan='$dsnnp[idkejuruan]'");
$kjjp = mysql_fetch_array($kjp);
$krp  = mysql_query("select * from kurikulum where idkurikulum='$skssp[idkurikulum]'");
$krrp = mysql_fetch_array($krp);
 $smtj01p = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$smmp[idtahun_ajaran]'");
$smmtj01p = mysql_fetch_array($smtj01p);
//$total01 =$krss['kt']+$krss['ssp'];
//$total02 = $krss['ts']+$krss['nas'];
//$sub_total = $total01 + $total02;
$totalp = $krssp['total'];
  
  ?>
    <tr align="center" bgcolor="#FFFFFF">
      <td height="50"><?php echo"<a href=#>$skssp[idpraktikum]</a><br>$kjjp[kejuruan]"; ?></td>
      <td><?php echo"$krrp[judul]
	
	"; ?></td>
      <td>
      <?php $jum_pkp = $totalp;
	  
		if($jum_pkp <=0){
		echo"nilai belum ada";
		
		}elseif($jum_pkp <=50){
		$ep = "E";
		$boep = mysql_query("select * from bobot where kodebobot='$ep' and idkejuruan='$mhss[idkejuruan]'");
		$booep  = mysql_fetch_array($boep);
		$jboep = $booep['nilai'] * $krssp['jumlah'];
		if($krssp['app2']==1){
			echo"<a href=v_dkhs.php?idkhsp=$krssp[idp_sks]&jumkhsp=$jboep&kdmhs=$kdmhs&tahun=$tahun>lihat nilai</a>";
			}elseif($krssp['app2']==2){
		
		echo"<a href=v_dkhs.php?idkhsp=$krssp[idp_sks]&jumkhsp=$jboep&kdmhs=$kdmhs&tahun=$tahun>$ep</a>";
		
		}
		
		
		}elseif($jum_pkp <=55){
		$dp = "D";
		$bodp = mysql_query("select * from bobot where kodebobot='$dp' and idkejuruan='$mhss[idkejuruan]'");
		$boodp  = mysql_fetch_array($bodp);
		$jbodp = $boodp['nilai'] * $krssp['jumlah'];
		if($krssp['app2']==1){
			echo"<a href=v_dkhs.php?idkhsp=$krssp[idp_sks]&jumkhsp=$jbodp&kdmhs=$kdmhs&tahun=$tahun>lihat nilai</a>";
			}elseif($krssp['app2']==2){
		
		echo"<a href=v_dkhs.php?idkhsp=$krssp[idp_sks]&jumkhsp=$jbodp&kdmhs=$kdmhs&tahun=$tahun>$dp</a>";
		
		}
		}elseif($jum_pkp <=60){
		$cdp = "CD";
		$bocdp = mysql_query("select * from bobot where kodebobot='$cdp' and idkejuruan='$mhss[idkejuruan]'");
		$boocdp  = mysql_fetch_array($bocdp);
		$jbocdp = $boocdp['nilai'] * $krssp['jumlah'];
		if($krssp['app2']==1){
			echo"<a href=v_dkhs.php?idkhsp=$krssp[idp_sks]&jumkhsp=$jbocdp&kdmhs=$kdmhs&tahun=$tahun>lihat nilai</a>";
			}elseif($krssp['app2']==2){
		
		echo"<a href=v_dkhs.php?idkhsp=$krssp[idp_sks]&jumkhsp=$jbocdp&kdmhs=$kdmhs&tahun=$tahun>$cdp</a>";
		
		}
		}elseif($jum_pkp <=65){
		
		$cp = "C";
		$bocp = mysql_query("select * from bobot where kodebobot='$cp' and idkejuruan='$mhss[idkejuruan]'");
		$boocp  = mysql_fetch_array($bocp);
		$jbocp = $boocp['nilai'] * $krssp['jumlah'];
		if($krssp['app2']==1){
			echo"<a href=v_dkhs.php?idkhsp=$krssp[idp_sks]&jumkhsp=$jbocp&kdmhs=$kdmhs&tahun=$tahun>lihat nilai</a>";
			}elseif($krssp['app2']==2){
		
		echo"<a href=v_dkhs.php?idkhsp=$krssp[idp_sks]&jumkhsp=$jbocp&kdmhs=$kdmhs&tahun=$tahun>$cp</a>";
		
		}
		}elseif($jum_pkp <=70){
		$bcp = "BC";
		$bobcp = mysql_query("select * from bobot where kodebobot='$bcp' and idkejuruan='$mhss[idkejuruan]'");
		$boobcp  = mysql_fetch_array($bobcp);
		$jbobcp = $boobcp['nilai'] * $krssp['jumlah'];
		if($krssp['app2']==1){
			echo"<a href=v_dkhs.php?idkhsp=$krssp[idp_sks]&jumkhsp=$jbobcp&kdmhs=$kdmhs&tahun=$tahun>lihat nilai</a>";
			}elseif($krssp['app2']==2){
		
		echo"<a href=v_dkhs.php?idkhsp=$krssp[idp_sks]&jumkhsp=$jbobcp&kdmhs=$kdmhs&tahun=$tahun>$bcp</a>";
		
		}
		}elseif($jum_pkp <=75){
		$bp = "B";
		$bobp = mysql_query("select * from bobot where kodebobot='$bp' and idkejuruan='$mhss[idkejuruan]'");
		$boobp  = mysql_fetch_array($bobp);
		$jbobp = $boobp['nilai'] * $krssp['jumlah'];
		if($krssp['app2']==1){
			echo"<a href=v_dkhs.php?idkhsp=$krssp[idp_sks]&jumkhsp=$jbobp&kdmhs=$kdmhs&tahun=$tahun>lihat nilai</a>";
			}elseif($krssp['app2']==2){
		
		echo"<a href=v_dkhs.php?idkhsp=$krssp[idp_sks]&jumkhsp=$jbobp&kdmhs=$kdmhs&tahun=$tahun>$bp</a>";
		
		}
		
		}elseif($jum_pkp <=80){
		$abp = "AB";
		$boabp = mysql_query("select * from bobot where kodebobot='$abp' and idkejuruan='$mhss[idkejuruan]'");
		$booabp  = mysql_fetch_array($boabp);
		$jboabp = $booabp['nilai'] * $krssp['jumlah'];
		if($krssp['app2']==1){
			echo"<a href=v_dkhs.php?idkhsp=$krssp[idp_sks]&jumkhsp=$jboabp&kdmhs=$kdmhs&tahun=$tahun>lihat nilai</a>";
			}elseif($krssp['app2']==2){
		
		echo"<a href=v_dkhs.php?idkhsp=$krssp[idp_sks]&jumkhsp=$jboabp&kdmhs=$kdmhs&tahun=$tahun>$abp</a>";
		
		}
		
		
		
		}elseif($jum_pkp <=100){
		$ap = "A";
		$boap = mysql_query("select * from bobot where kodebobot='$ap' and idkejuruan='$mhss[idkejuruan]'");
		while($booap  = mysql_fetch_array($boap)){
	
		$jboap = $booap['nilai'] * $krssp['jumlah'];
			if($krssp['app2']==1){
			echo"<a href=v_dkhs.php?idkhsp=$krssp[idp_sks]&jumkhsp=$jboap&kdmhs=$kdmhs&tahun=$tahun>lihat nilai</a>";
			}elseif($krssp['app2']==2){
		echo"<a href=v_dkhs.php?idkhsp=$krssp[idp_sks]&jumkhsp=$jboap&kdmhs=$kdmhs&tahun=$tahun>$ap</a>";
		
		
		}
		}
		
		}
		
		 ?></td>
      <td><?php echo"<b>$smmp[semester]</b><br>
	
	"; ?> </td>
      <td><?php 
	
	
	echo"$krssp[jumlah]";
	?></td>
      <td>        <?php //echo"$dsnnp[nama]"; ?></td>
    </tr>
	<?php
  $no++;
 }
  ?>
	
  
    <tr align="center" bgcolor="#FFFFFF">
      <td height="50" colspan="3"><?php
	  $date = date("d/m/Y");
	  echo"Semarang,$date<br>KABAG AKADEMIK";
	  
	  ?></td>
      <td height="50">SKS SMT</td>
      <td height="50"><?php
	
	$k = mysql_query("select sum(jumlah) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and idsemester='$mhss[idsemester]'  ");
	$kk = mysql_fetch_array($k);
	echo"<br><b>$kk[kr]</b>";
	
	
	
	 ?></td>
      <td height="50">&nbsp;</td>
    </tr>
    <tr align="center" bgcolor="#FFFFFF">
      <td height="50" colspan="3"><?php 
	$rsem = mysql_query("select * from rekamsemester where idmahasiswa='$kdmhs' order by idrekamsemester asc limit 1");
$rsemm = mysql_fetch_array($rsem);

	echo"<b>MAKS SKS $rsemm[bsks]</b>

	
	";
	
	?></td>
      <td height="50" colspan="3"><?php
	  $kp = mysql_query("select sum(total2) as kp from p_sks where idmahasiswa='$mhss[idmahasiswa]' and app='2'   ");
	$kkp = mysql_fetch_array($kp);
	$kjump = mysql_query("select sum(jumlah) as krjp from p_sks where idmahasiswa='$mhss[idmahasiswa]' and app='2'    ");
	$kjummp = mysql_fetch_array($kjump);
	
		
//if($rsemm01['ip']==0){
//@mysql_query("update rekamsemester set ip='$jumtot' where idmahasiswa='$mhss[idmahasiswa]' and //idsemester='$smm[idsemester]'");

//}else{

//}
	    
	  ?><br><?php
	  $k = mysql_query("select sum(total2) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2'    ");
	$kk = mysql_fetch_array($k);
	$kjum = mysql_query("select sum(jumlah) as krj from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2'    ");
	$kjumm = mysql_fetch_array($kjum);
	
		$rsem01 = mysql_query("select * from rekamsemester where idmahasiswa='$mhss[idmahasiswa]' and idrekamsemester='$tahun' ");
$rsemm01 = mysql_fetch_array($rsem01);
//if($rsemm01['ip']==0){
//@mysql_query("update rekamsemester set ip='$jumtot' where idmahasiswa='$mhss[idmahasiswa]' and //idsemester='$smm[idsemester]'");

//}else{
@$jumtotp = @$kkp['kp'] / @$kjummp['krjp'] ;
@$jumtot = $kk['kr'] / $kjumm['krj'] ;
@$tmbh = $jumtotp + $jumtot;
@$decjumtot = number_format($tmbh,1,'.','');
//echo"$rsemm01[ip]";
echo"IP:&nbsp;&nbsp;&nbsp;$rsemm01[ip]";
//}
	    
	  ?>      </td>
    </tr>
    <tr align="center" bgcolor="#FFFFFF">
      <td height="50" colspan="3">Kartu Hilang/Rusak <br>didenda Rp.5000</td>
      <td height="50" colspan="3">&nbsp;</td>
    </tr>
  </table>
  <br><br>
  <table width="100%" border="0">
    <tr align="center">
      <td width="46%"><strong><?php echo"MAHASISWA<br><br><br><br><br>$mhss[nama]"; ?></strong></td>
      <td width="54%"><strong><?php echo"
	DOSEN WALI<br><br><br><b>$dsnn2[nama]</b>"; ?></strong></td>
    </tr>
    <tr align="center">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
  <br>

</body>
</html>
<?php
}
?>