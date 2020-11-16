<?php session_start();
 //include_once"../sc/conek.php";

	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
	$u = mysql_query("select * from user where namauser='$_SESSION[namauser]'");
	$uu = mysql_fetch_array($u);
 ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>DETAIL LAPORAN TOTAL BIAYA</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

<?php
$kdmhs = @mysql_real_escape_string($_GET['kdmhs']);

  $tbiy = @mysql_query("select * from totbiy where idmahasiswa='$kdmhs' order by idtotbiy asc limit 200");
  while($tbiyy = mysql_fetch_array($tbiy)){

$mhs = mysql_query("select * from mahasiswa where idmahasiswa='$kdmhs'");
$mhss = mysql_fetch_array($mhs);
$kj = mysql_query("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
$kjj = mysql_fetch_array($kj);
$ack = rand("22","11");
$ang = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$mhss[idtahun_ajaran]'");
$angg = mysql_fetch_array($ang);
$bi = mysql_query("select * from biaya_kuliah where idkejuruan='$mhss[idkejuruan]' and idkelas='$mhss[idkelas]' and idtahun_ajaran='$angg[idtahun_ajaran]'"); 
$bii = mysql_fetch_array($bi); 
$sm = mysql_query("select * from semester where idsemester='$tbiyy[idsemester]'");
$smm = mysql_fetch_array($sm);
$spi = mysql_query("select * from spi where idmahasiswa='$mhss[idmahasiswa]' order by idspi desc limit 1");
$spii = mysql_fetch_array($spi);
$jumspi = $bii['spi'] - $spii['pembayaran'];
$k1t = @number_format($jumspi,"0","",".");
$k2t = @number_format($bii['sks'],"0","",".");
$k3t = @number_format($bii['semester'],"0","",".");
$k4t = @number_format($bii['registrasi'],"0","",".");
$k5t = @number_format($bii['pkm'],"0","",".");
$k6t = @number_format($bii['do'],"0","",".");

	$k = mysql_query("select sum(jumlah) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' and idsemester='$mhss[idsemester]' ");
	$kk = mysql_fetch_array($k);
	
	
	$k1 = mysql_query("select sum(jumlah) as krp from p_sks where idmahasiswa='$mhss[idmahasiswa]' and app='2' and idsemester='$mhss[idsemester]'");
	$kk1 = mysql_fetch_array($k1);
	
	
	$ju_krs = $kk['kr'] + $kk1['krp'];
	$bi_prak = $kk1['krp'] * $bii['praktikum'];
	$bi_jum = $ju_krs * $bii['sks'];
  $bea1 = @mysql_query("select * from bea where idbea='$mhss[idbea]'");
  $beaa1 = @mysql_fetch_array($bea1);
  $o = @$beaa1['potongan'];
	  //@$dis = $bii['semester'] / (100/$beaa1['potongan']);
	  $j_sks = $bi_jum + $bi_prak; 
	  $r_sks = number_format($j_sks,"0","",".");
	  
	  
	  $tots1 = $jumspi + $bii['semester'];
	  			$tots2 = $j_sks + $bii['registrasi'];
				$tots3 = $bii['pkm'] + $bii['do'];
				$jumtots = $tots1 + $tots2;
				$jumtots2 = $jumtots + $tots3;
				$jumtots3 = $jumtots2 - $o;
?>
<?php echo"<h3>$smm[semester]</h3>"; ?><form name="form1" method="post" action="">
  <table width="800" border="0" align="center" bgcolor="#004080">
    <tr bgcolor="#FFFFFF">
      <td width="156" height="36">SPI</td>
      <td width="367"><?php echo"Rp.$k1t"; ?></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="36">Semester</td>
      <td height="36"><?php echo"Rp.$k3t"; ?></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="59">SKS+Praktikum</td>
      <td height="59"><?php
	
	echo"<b>$ju_krs SKS</b>";
	
	
	
	
	 ?>
        <?php 
	  echo"Rp.$r_sks"; ?>
        <input type="hidden" name="tot_sks" value="<?php echo"$j_sks"; ?>"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="36">PKM</td>
      <td height="36"><?php echo"Rp.$k5t"; ?></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="36">Registrasi</td>
      <td height="36"><?php echo"Rp.$k4t"; ?></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="36">Dana Oprasional </td>
      <td height="36"><?php echo"Rp.$k6t"; ?></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="36">Beasiswa</td>
      <td>
        
        <?php
    $bea = mysql_query("select * from bea where idbea='$mhss[idbea]' order by potongan desc limit 2000");
  while($beaa = mysql_fetch_array($bea)){
  $k8t = @number_format($beaa['potongan'],"0","",".");
 
  echo" $beaa[idbea]&nbsp;Rp.$k8t";
  
  }
  
  ?>
      </td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="36">Status</td>
      <td><?php 
	  
	
				
				if($tbiyy['jumlah']>=$jumtots3){
				echo"<font color=green><b>LUNAS</b></a></font>";
				}else{
				echo"<font color=green><b> BELUM LUNAS</b></a></font>";
				}
				 ?></td>
    </tr>
    <tr align="center" bgcolor="#FFFFFF">
      <td><?php 
	  
				
				$k7t = @number_format($jumtots3,"0","",".");
				echo"<span class=sb>TOT&nbsp;:Rp.$k7t</span>";
	    ?></td>
      <td><?php
	  $biy = @mysql_query("select * from totbiy where idmahasiswa='$kdmhs' and idsemester='$mhss[idsemester]'");
  $biyy = @mysql_fetch_array($biy);
	  
				$totbiy = $jumtots2 - $o;
				$totbiy2 = $tbiyy['jumlah'];
				
				$k9t = @number_format($totbiy2,"0","",".");
				echo"<span class=sb><font color=red>Ter&nbsp;:Rp.$k9t</font></span>";
	  
	  ?>        </td>
    </tr>
    <tr align="center" bgcolor="#FFFFFF">
      <td colspan="2">&nbsp;
	  </td>
    </tr>
  </table>
  <?php
  }
  ?>
</form>

<?php
if(isset($_POST['simpan'])){
$tgl = date("Y-m-d");
$ba = @$_POST['bea'];
$st= @$_POST['st'];
$byr= @mysql_real_escape_string($_POST['byr']);
@mysql_query("insert into totbiy(idtotbiy,idmahasiswa,idsemester,idbea,jumlah,status,tgl)values('','$kdmhs','$mhss[idsemester]','$ba','$byr','$st','$tgl')");

 echo "<script language='javascript'>alert('semester   Berhasil di simpan ke UPDATE')</script>";
	echo "<script language='javascript'>window.location = '?kdmhs=$kdmhs'</script>";
	exit();
	}
?>
</body>
</html>
<?php
}
?>