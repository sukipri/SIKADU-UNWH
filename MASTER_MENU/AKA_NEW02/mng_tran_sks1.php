<?php session_start();
 include_once"../sc/conek.php";
 	include"css.php";
	include"../NEW_CODE/stack_Q.php";
	include"../NEW_CODE/GR_01.php";
	include"../NEW_CODE/code_rand.php";
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
	$u = $call_q("$call_sel user where namauser='$_SESSION[namauser]'");
	$uu = $call_fas($u);
	
 ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
<style type="text/css">
<!--
.style2 {font-family: Tahoma}
-->
</style>
</head>
<?php
$kdmhs=$sql_escape($_GET['kdmhs']);
 $mhs = $call_q("$call_sel mahasiswa where idmahasiswa='$kdmhs'");
$mhss = $call_fas($mhs);
 $mhsak = $call_q("$call_sel user_mhs where idmahasiswa='$kdmhs'");
$mhssak = $call_fas($mhsak);
$ang = $call_q("$call_sel tahun_ajaran where idtahun_ajaran='$mhss[idtahun_ajaran]'");
$angg = $call_fas($ang);
$kj = $call_q("$call_sel kejuruan where idkejuruan='$mhss[idkejuruan]'");
$kjj = $call_fas($kj);
$fak = $call_q("$call_sel fakultas where idfakultas='$kjj[idfakultas]'");
$fakk = $call_fas($fak);
$kl = $call_q("$call_sel kelas where idkelas='$mhss[idkelas]'");
$kll = $call_fas($kl);
$rsem = $call_q("$call_sel rekamsemester where idmahasiswa='$kdmhs' and app='2' order by idrekamsemester asc limit 1");
$rsemm = $call_fas($rsem);
$sm = $call_q("$call_sel semester where idsemester='$mhss[idsemester]'");
$smm = $call_fas($sm);
include"code_transkrip_farmasi.php";
?>
<body>
		<?php
			$IDMAKUL = @$sql_escape($_GET['IDMAKUL']);
				if(isset($_GET['IDMAKUL'])){
					$call_q("update krs set app='1' , app2='1' where idmahasiswa='$kdmhs' and idkrs='$IDMAKUL'");
					header("location:mng_tran_sks.php?kdmhs=$kdmhs");
						?>
						
				<?php 	} ?>
				
				<?php
			$IDMAKULOPEN = @$sql_escape($_GET['IDMAKULOPEN']);
				if(isset($_GET['IDMAKULOPEN'])){
					$call_q("update krs set app='2' , app2='2' where idmahasiswa='$kdmhs' and idkrs='$IDMAKULOPEN'");
					header("location:mng_tran_sks.php?kdmhs=$kdmhs");
						?>
						
				<?php 	} ?>
				
<table width="100%" border="0" align="center">
  <tr>
    <td width="17%" height="61">
	
	
	<img src="../img/logokecil.gif" width="67" height="59">
	</td>
    <td width="83%" align="center"><h3 class="style2">UNIVERSITAS WAHID HASYIM <br>
    TRANSKRIP  AKADEMIK SEMENTARA MAHASISWA<br>[management data] </h3></td>
  </tr>
</table>
<br>
<div class="container">

<table width="100%" rules="none" border="0" align="center">
  <tr>
    <td width="17%"><span class="style2">Nama Lengkap<br>
        <em>(Full Name) </em></span></td>
    <td width="49%"><span class="style2">: <?php echo"$mhss[nama]"; ?></span></td>
    <td width="15%"><span class="style2">KeputusanPendirian PT.<br>
	    <em>(Certificate of Establishment)
      </em></span></td>
    <td width="19%"><span class="style2">: SK. MENDIKNAS NO.124/D/0/2000 </span></td>
  </tr>
  <tr>
    <td><span class="style2">N I M<br>
        <em>(Index Number) </em></span></td>
    <td><span class="style2">: <?php echo"$mhss[idmahasiswa]"; ?></span></td>
    <td width="15%"><span class="style2">Fakultas<BR>
        <em>(Faculty)</em></span></td>
    <td width="19%"><span class="style2">: <?php echo"$fakk[fakultas]"; ?></span></td>
  </tr>
  <tr>
    <td><span class="style2">Tempat, Tgl Lahir <br>
      <em>(Place, Date of Birth) </em></span></td>
    <td><span class="style2">: <?php echo"$mhss[tgl_lahir]"; ?></span></td>
    <td><span class="style2">Program Studi<br>
	    <em>(Major)
      </em>	</span></td>
    <td><span class="style2">: <?php echo"$kjj[kejuruan]"; ?></span></td>
  </tr>
  <tr>
    <td><span class="style2">Nomor<br>
        <em>(Number) </em></span></td>
    <td><span class="style2">: <?php echo"$mhss[tgl_lahir]"; ?></span></td>
    <td><span class="style2">Status<br>
        <em>(Status)</em></span></td>
    <td><span class="style2">: TERAKREDITASI</span></td>
  </tr>
</table>
<br>
<table width="100%" border="0" align="center" rules="all" class="table table-bordered">
  <tr align="center"  bgcolor="#FFFFFF">
    <td><span class="style2">No<br>
        <em>Numb.</em></span></td>
    <td height="35"><span class="style2">KODE SMT <em></em></span></td>
    <td><span class="style2">MAKUL</span></td>
    <td>ANGKA</td>
    <td><span class="style2">NILAI<br>
        </span></td>
    <td><span class="style2">KODE KURIKULUM & KODE SKS<em></em></span></td>
    <td><span class="style2">COMPARASI<em></em></span></td>
    <td><span class="style2">ACTION<em></em></span></td>
  </tr>
  	<?php
		$mkrs = $call_q("$call_sel 	krs where idmahasiswa='$kdmhs' and angka>'0' ");
			$no = 1;
			while($mkrss = $call_fas($mkrs)){
					
					$msks = $call_q("$call_sel sks where idsks='$mkrss[idsks]' ");
					$mskss = $call_fas($msks);
				$mkr  = $call_q("$call_sel kurikulum where idkurikulum='$mskss[idkurikulum]'");
				$mkrr = $call_fas($mkr);
					$data_expd = explode("." , $mkrss['idsks']);
						$data_get_expd = "$data_expd[0]";
					$mkrs_ex = $call_q("$call_sel 	krs where idmahasiswa='$kdmhs' and app='2' and app2='2' and idsks LIKE '%$data_get_expd%'");
								$mkrss_hit = mysql_num_rows($mkrs_ex);
	?>
  <tr align="center"  bgcolor="#FFFFFF">
    <td width="48"><div align="center" class="style2"><?php echo"$no"; ?></div></td>
    <td width="95" height="35"><span class="style2"><?php echo"$mkrss[idsemester]"; ?></span></td>
    <td width="352" align="left"><span class="style2"><?php echo"$mkrr[judul]"; ?></span></td>
    <td width="115" align="center"><a href="#" onClick="MM_openBrWindow('<?php echo"i_krs_kt.php?idkrs=$mkrss[idkrs]&kddsn=$mskss[iddosen]&idsks=$mskss[idsks]&kdmhs=$mkrss[idmahasiswa]#getdata"; ?>','','scrollbars=yes,width=600,height=400')"><?php echo"$mkrss[huruf]"; ?></a></td>
    <td width="115" align="center">
	<a href="#" onClick="MM_openBrWindow('<?php echo"i_krs_kt.php?idkrs=$mkrss[idkrs]&kddsn=$mskss[iddosen]&idsks=$mskss[idsks]&kdmhs=$mkrss[idmahasiswa]#getdata"; ?>','','scrollbars=yes,width=600,height=400')"><?php echo"$mkrss[angka]"; ?></a></td>
    <td width="155"><span class="style2"><?php echo"$mkrr[idkurikulum] 	$mskss[idsks]"; ?></span></td>
  
	<?php
		if($mkrss_hit <=1){ ?> 
			  <td width="111" class="success">&nbsp;</td>
	 <?php }elseif($mkrss_hit >=2){	  ?>
	 <td width="95" class="danger">&nbsp;</td>
	 <?php } ?>
	
    <td width="95">
	<?php if($mkrss['app']=='2' && 	$mkrss['app2']=='2'){ ?>
	<a href="<?php echo"mng_tran_sks.php?kdmhs=$kdmhs&IDMAKUL=$mkrss[idkrs]#DISABLE"; ?>">
	<img src="../img/unlock-32.png" width="32" height="32"></a>
	<?php }elseif($mkrss['app']=='1' && $mkrss['app2']=='1'){ ?>
	<a href="<?php echo"mng_tran_sks.php?kdmhs=$kdmhs&IDMAKULOPEN=$mkrss[idkrs]#DISABLE"; ?>">
	<img src="../img/lock-32.png">
	</a>
	<?php 	} ?>
	</td>
  </tr>
  <?php $no++;} ?>
  <?php
  $krs = $call_q("$call_sel krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and app2='2'");
$krss = $call_fas($krs);
  $sks = $call_q("$call_sel sks where idsks='$krss[idsks]' ");
$skss = $call_fas($sks);
  $sm = $call_q("$call_sel semester where idsemester='$skss[idsemester]'");
$smm = $call_fas($sm);
 $dsn = $call_q("$call_sel dosen where iddosen='$skss[iddosen]'");
$dsnn = $call_fas($dsn);
$kj = $call_q("$call_sel kejuruan where idkejuruan='$dsnn[idkejuruan]'");
$kjj = $call_fas($kj);
$kr  = $call_q("$call_sel kurikulum where idkurikulum='$skss[idkurikulum]'");
$krr = $call_fas($kr);
  
  ?>
  <tr align="center" bgcolor="#FFFFFF">
    <td colspan="5" rowspan="4" align="center"><span class="style2">
	<?php
				if($mhss['idkejuruan']=='5502'){
		?>
	<a href="<?php echo"ctk_tran_sks_farmasi.php?kdmhs=$mhss[idmahasiswa]"; ?>" target="_blank"><img src="../img/page.png" width="89" height="76"></a>
	<?php }else{ ?>
	<a href="<?php echo"ctk_tran_sks.php?kdmhs=$mhss[idmahasiswa]"; ?>" target="_blank"><img src="../img/page.png" width="93" height="76"></a>
	<?php } ?>
	</span></td>
    <td height="20"><span class="style2">Jumlah<br>
        <em>(Total)</em></span></td>
    <td><span class="style2">
      <?php
	
	$k = $call_q("select sum(jumlah) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and app2='2'  ");
	$kk = $call_fas($k);
	
	$k2 = $call_q("select sum(jumlah_baru) as krt from mahasiswa_trans where idmahasiswa='$kdmhs'  ");
	$kk2 = $call_fas($k2);
	$hit_krs = $kk['kr'];
	echo"<br><b>$hit_krs</b>"; ?>
    </span></td>
    <td><span class="style2">
      <?php
	$kt = $call_q("select sum(total2) as total2 from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and app2='2'  ");
	$kkt = $call_fas($kt);
	$hit_krst = $kkt['total2'];
	//$k2t = $call_q("select sum(jumlah_baru) as krt from mahasiswa_trans where idmahasiswa='$kdmhs'  ");
	//$kk2t = $call_fas($k2);
	//$hit_krst = $kkt['kr'];
	echo"<br><b>$hit_krst</b>"; ?>
    </span></td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF">
    <td height="20"><span class="style2">Indek Prestasi<br>
        <em>(Grade of Graduate)</em> </span></td>
    <td colspan="2"><span class="style2">
      <?php
	$rk = $call_q("select  sum(total2) as ips from krs where idmahasiswa='$kdmhs'");
$rkk = $call_fas($rk);
	$hit_ips = $rkk['ips'] / $hit_krs ;
	$k1 = @number_format($hit_ips,2);
	echo"$k1";
	
	 ?>
    </span><span class="style2"></span></td>
    </tr>
  <tr align="center" bgcolor="#FFFFFF">
    <td height="20"><span class="style2">Tanggal Lulus <br>
        <em>(Date of Graduate)</em> </span></td>
    <td colspan="2"><span class="style2"><?php echo"$mhss[tgl_wisuda]"; ?></span><span class="style2"></span></td>
    </tr>
  <tr align="center" bgcolor="#FFFFFF">
    <td height="20"><span class="style2">Predikat Kelulusan <br>
        <em>(Predicate of Graduate)</em></span></td>
    <td colspan="2">
	<span class="style2"></span><span class="style2">
		<?php
				if($hit_ips <2.76){
				echo"";
				}elseif($hit_ips<3.01){
				echo"Memuaskan";
				}elseif($hit_ips<3.51){
					echo"Sangat Memuaskan ";
					}elseif($hit_ips<4.01){
					echo"Cum Laude / dengan pujian";
					}
		?>
	</span></td>
    </tr>
</table>
<table width="100%"  border="0">
  <tr align="center">
    <td width="45%" height="34"><span class="style2">REKTOR <em>(Rector)</em></span></td>
    <td width="55%"><span class="style2">Semarang, <?php echo date('d F Y'); ?> <br>
      DISAHKAN OLEH (Legalized By)<br>
      DEKAN (<em>Dean</em>)</span></td>
  </tr>
  <tr align="center">
    <td height="77"><span class="style2"></span></td>
    <td><span class="style2"></span></td>
  </tr>
  <tr align="center">
    <td><span class="style2">Dr.H Mudzakkir Ali,M.A<br> 
      NPP.01 99 0 0003</span></td>
    <td><span class="style2"> Aqnes Budiarti,SF.,M.Sc., Apt. <br>
      NPP. 19780129 200501 2 001 </span></td>
  </tr>
</table>

</div>
</body>
</html>
<?php
}
?>