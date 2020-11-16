<?php session_start();
 include_once"../sc/conek.php";
	include"css.php";
	include"../sc/bar128.php";
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
	$u = mysql_query("select * from user_mhs where idmahasiswa='$_SESSION[namauser]'");
	$uu = mysql_fetch_array($u);
	
 ?>
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
 $mhs = mysql_query("select * from mahasiswa where idmahasiswa='$uu[idmahasiswa]'");
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
  $sm = mysql_query("select * from semester where idsemester='$rsemm[idsemester]'");
$smm = mysql_fetch_array($sm);
 $th = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$smm[idtahun_ajaran]'");
$thh = mysql_fetch_array($th);
 $dsn = mysql_query("select * from dosen where iddosen='$skss[iddosen]'");
$dsnn = mysql_fetch_array($dsn);
$kj = mysql_query("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
$kjj = mysql_fetch_array($kj);
 $dsn2 = mysql_query("select * from dosen where iddosen='$mhss[iddosen]'");
$dsnn2 = mysql_fetch_array($dsn2);
$fk = mysql_query("select * from fakultas where idfakultas='$kjj[idfakultas]'");
$fkk = mysql_fetch_array($fk);
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
    <td width="101" align="right"><img src="../img/logokecil.gif" width="52" height="52"></td>
    <td width="304" align="center"><strong> <?php echo"UNIVERSITAS WAHID HASYIM";?> </strong><?php echo"<h4>$fkk[fakultas] - $kjj[kejuruan] </h4>"; ?><b>KARTU HASIL STUDI</b><br><?php echo strtoupper($smm['semester']); ?></td>
    <td width="151" align="center"><?php echo bar128(stripslashes($mhss['idmahasiswa'])); ?></td>
  </tr>
  
</table>
<table width="100%" border="0" align="center" class="table table-bordered table-sm">
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
          <td><?PHP echo strtoupper($mhss['nama']); ?></td>
        </tr>
    </table></td>
    <td width="53%"><table width="336" border="0">
        <tr>
          <td width="80"><strong>Progdi</strong></td>
          <td width="12"><strong>:</strong></td>
          <td width="230"><?php echo"<b>$kjj[idkejuruan]-$kjj[kejuruan]-$mhss[kode_kelas]</b>"; ?></td>
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
  <table width="100%" border="0" align="center" bgcolor="#808080" class="table table-bordered table-sm">
    <tr align="center" bgcolor="#7DFF7D">
      <td width="25">NO</td>
      <td width="49" height="17">KODE</td>
      <td width="190">NAMA MATA KULIAH </td>
      <td width="45">HURUF  </td>
      <td width="45">ANGKA  </td>
      <td width="45">KREDIT</td>
      <td width="45">MUTU</td>
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
$pem = @number_format($krss['angka'],2);
  
  ?>
    <tr align="center" bgcolor="#FFFFFF">
      <td><?php echo"$no"; ?></td>
      <td height="17"><?php echo strtoupper($skss['idkurikulum']); ?></td>
      <td align="left"><?php echo strtoupper($krr['judul']); ?> </td>
      <td>
      <?php echo"$krss[huruf]"; ?> </td>
      <td><?php echo"<b>$pem</b><br>
	
	"; ?> </td>
      <td><?php 
	
	
	echo"$krss[jumlah]";
	?></td>
      <td>
	   <?php
	  $kuis = mysql_query("select * from kuis where idfakultas='$fkk[idfakultas]'");
	  $kuiss = mysql_fetch_array($kuis);
	  $kuis_jawab = mysql_query("select * from kuis_jawab where idmahasiswa='$uu[idmahasiswa]' and idsks='$krss[idsks]'");
	  $cek_jawab = @mysql_num_rows($kuis_jawab);
	  if($cek_jawab<=0){
	  echo"ISI KUISIONER";
	  }else{
	  ?>
	  <?php 
	  if($krss['app2']==1){
	  echo" Update nilai di Management KHS"; 
	  }else{
	    echo"$krss[total2]"; 
		}
		}
		
	  ?></td>
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
      <td>&nbsp;</td>
      <td height="20"><?php echo"<a href=#>$skssp[idpraktikum]</a><br>$kjjp[kejuruan]"; ?></td>
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
      <td height="20" colspan="4"><?php
	  $date = date("d/m/Y");
	  echo"Semarang, $date";
	  
	  ?></td>
      <td height="20">SKS SMT</td>
      <td height="20"><?php
	
	$k = mysql_query("select sum(jumlah) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2'  and idsemester='$rsemm[idsemester]'");
	$kk = mysql_fetch_array($k);
	echo"<b>$kk[kr]</b>";
	
	
	
	 ?></td>
      <td height="20"><?php
	
	$k5 = mysql_query("select sum(total2) as tot from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2'  and idsemester='$rsemm[idsemester]'");
	$kk5 = mysql_fetch_array($k5);
	echo"<b>$kk5[tot]</b>";
	
	
	
	 ?></td>
    </tr>
    <tr align="center" bgcolor="#FFFFFF">
      <td height="38" colspan="4"><?php 
	$rsem = mysql_query("select * from rekamsemester where idmahasiswa='$kdmhs' order by idrekamsemester asc limit 1");
$rsemm = mysql_fetch_array($rsem);

	echo"<b>MAKS SKS $rsemm[bsks]</b>

	
	";
	
	?></td>
      <td height="38" colspan="3"><?php
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
$jumtot = $kk['kr'] / $kjumm['krj'] ;
$tmbh = $jumtotp + $jumtot;
$decjumtot = number_format($tmbh,1,'.','');
//echo"$rsemm01[ip]";
echo"IP.SMT:&nbsp;&nbsp;&nbsp;$rsemm01[ip]";
//}
	    
	  ?>      </td>
    </tr>
    <tr align="center" bgcolor="#FFFFFF">
      <td height="38" colspan="4">&nbsp;</td>
      <td height="38" colspan="3"><?php   $k2 = mysql_query("select sum(jumlah) as krt from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and app2='2'   ");
	$kk2 = mysql_fetch_array($k2); echo"SKS.Kumulatif : &nbsp;$kk2[krt]"; ?><br>
	<?php   $k3 = mysql_query("select sum(ip) as rs from rekamsemester where idmahasiswa='$mhss[idmahasiswa]'    ");
	$kk3 = mysql_fetch_array($k3);  ?>
	<?php 
	$bg = $kk['kr'] / $kk2['krt'];
	$pembg = number_format($bg,2);
	 echo"IP.Kumulatif : &nbsp;$pembg"; 
	  ?>
	</td>
    </tr>
  </table>
  <table width="100%" border="0" class="table">
    <tr align="center">
      <td width="46%"><strong><?php echo"MAHASISWA<br><br><br><br>$mhss[nama]"; ?></strong></td>
      <td width="54%"><strong><?php echo"
	DOSEN WALI<br><br><br><br><b>$dsnn2[nama]</b>"; ?></strong></td>
    </tr>
  </table>
</form>
  <br>

</body>
</html>
<?php
}
?>