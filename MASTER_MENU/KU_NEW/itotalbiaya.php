<?php //session_start();
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
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
$spi = mysql_query("select * from spi where idmahasiswa='$mhss[idmahasiswa]' order by idspi desc limit 1");
$spii = mysql_fetch_array($spi);
$jumspi = $bii['spi'] - $spii['pembayaran'];
$k1t = @number_format($jumspi,"0","",".");
$k2t = @number_format($bii['sks'],"0","",".");
$k3t = @number_format($bii['semester'],"0","",".");
$k4t = @number_format($bii['registrasi'],"0","",".");
$k5t = @number_format($bii['pkm'],"0","",".");
$k6t = @number_format($bii['do'],"0","",".");
?>
<form name="form1" method="post" action="">
  <table width="533" border="0" align="center" bgcolor="#004080">
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
	
	$k = mysql_query("select sum(jumlah) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' and idsemester='$mhss[idsemester]' ");
	$kk = mysql_fetch_array($k);
	
	
	$k1 = mysql_query("select sum(jumlah) as krp from p_sks where idmahasiswa='$mhss[idmahasiswa]' and app='2' and idsemester='$mhss[idsemester]'");
	$kk1 = mysql_fetch_array($k1);
	
	
	$ju_krs = $kk['kr'] + $kk1['krp'];
	$bi_prak = $kk1['krp'] * $bii['praktikum'];
	$bi_jum = $ju_krs * $bii['sks'];
	echo"<b>$ju_krs SKS</b>";
	
	
	
	
	 ?>
        <?php $j_sks = $bi_jum + $bi_prak; 
	  $r_sks = number_format($j_sks,"0","",".");
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
      <td><select name="bea" id="bea">
        <option>maaf siswa tidak ada beasiswa</option>
        <?php
    $bea = mysql_query("select * from bea order by potongan desc limit 2000");
  while($beaa = mysql_fetch_array($bea)){
  $k8t = @number_format($beaa['potongan'],"0","",".");
  if($beaa['idbea']==$mhss['idbea']){
    echo"<option value=$beaa[idbea] selected>$beaa[idbea]&nbsp;Rp.$k8t</option>";
  }else{
  echo"<option value=$beaa[idbea]>$beaa[idbea]&nbsp;Rp.$k8t</option>";
  }
  }
  
  ?>
      </select></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="36">Status</td>
      <td><select name="st" id="st">
        <option>pilih status...........</option>
        <option value="BL">BELUM LUNAS</option>
        <option value="L">LUNAS</option>
      </select></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="36">Bayar</td>
      <td><?php
	
	  ?>
      <input name="byr" type="text" id="byr" size="45"></td>
    </tr>
    <tr align="center" bgcolor="#FFFFFF">
      <td><?php 
	    $bea1 = @mysql_query("select * from bea where idbea='$mhss[idbea]'");
  $beaa1 = @mysql_fetch_array($bea1);
  $o = @$beaa1['potongan'];
	  //@$dis = $bii['semester'] / (100/$beaa1['potongan']);
	  
	  
	  $tots1 = $jumspi + $bii['semester'];
	  			$tots2 = $j_sks + $bii['registrasi'];
				$tots3 = $bii['pkm'] + $bii['do'];
				$jumtots = $tots1 + $tots2;
				$jumtots2 = $jumtots + $tots3;
				$jumtots3 = $jumtots2 - $o;
				
				$k7t = @number_format($jumtots3,"0","",".");
				echo"<span class=sb>TOT&nbsp;:Rp.$k7t</span>";
	    ?></td>
      <td><?php
	  $biy = @mysql_query("select * from totbiy where idmahasiswa='$kdmhs' and idsemester='$mhss[idsemester]'");
  $biyy = @mysql_fetch_array($biy);
	  
				$totbiy = $jumtots2 - $o;
				$totbiy2 = $biyy['jumlah'];
				
				$k9t = @number_format($totbiy2,"0","",".");
				echo"<span class=sb><font color=red>Ter&nbsp;:Rp.$k9t</font></span><br>";
	  
	  ?>      <?php 
	  
	
				
				if($biyy['jumlah']>=$jumtots3){
				echo"<font color=green><b>LUNAS</b></a></font>";
				}else{
				echo"<font color=green><b> (BELUM LUNAS)</b></a></font>";
				}
				 ?>  </td>
    </tr>
    <tr align="center" bgcolor="#FFFFFF">
      <td colspan="2">
	  <?php
	  if($biyy['jumlah']>=$totbiy){
	  
	  ?>
	  <input name="simpan" type="submit" id="simpan6" class="sb" value="simpan pembayaran" disabled>
	  <?php
	  }else{
	  ?>
	   <input name="simpan" type="submit" id="simpan6" class="sb" value="simpan pembayaran">
	   <?php
	   }
	   ?>
	  </td>
    </tr>
  </table>
</form>

<?php
if(isset($_POST['simpan'])){
$tgl = date("Y-m-d");
$ba = @$_POST['bea'];
$st= @$_POST['st'];
$byr= @mysql_real_escape_string($_POST['byr']);
$ju = $biyy['jumlah'] + $byr;
@mysql_query("insert into totbiy(idtotbiy,idmahasiswa,idsemester,idbea,jumlah,status,tgl)values('','$kdmhs','$mhss[idsemester]','$ba','$ju','$st','$tgl')");

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