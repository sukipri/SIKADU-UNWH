<?php session_start();
 include_once"../sc/conek.php";
 //include"css.php";

	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
 ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>CETAK REKAP PEMBAYARAN</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style18 {font-family: Arial; font-size: 16px; }
-->
</style>
</head>

<body>
<b>Universitas Wahid Hasyim </b><br>
<b>REKAP PEMBAYARAN KULIAH</b>
<?php
	$kj=@mysql_real_escape_string($_GET['kj']);
	$tgl=@mysql_real_escape_string($_GET['tgl1']);
	$tgl2=@mysql_real_escape_string($_GET['tgl2']);
	$xtgl=left($tgl,2);
	$kj1 = mysql_query("select * from kejuruan where idkejuruan='$kj'");
$kjj1 = mysql_fetch_array($kj1);
?><br>
<form name="form1" method="post" action="">
  <table width="100%"  border="0" class="table">
    <tr>
      <td width="26%" height="21"><?php echo"Tanggal : $tgl"; ?></td>
	  
	  
      <td width="22%"><?php //echo"Sampai $tgl2"; ?>
        <span class="style18">
        <?php 
	  
	If($xtgl = 01)
{
   $predikat="JANUARI";
}
 elseif ($xtgl = 02)
{
   $predikat="FEBRUARI";
}elseif ($xtgl =3/)
{
   $predikat="MARET";
}
 echo"$predikat";
	  
	   	
	?>
      </span></td>
      <td width="34%"><?php echo"$kj"; ?></td>
      <td width="18%"><strong> <?php echo"$kjj1[kejuruan]"; ?></strong></td>
    </tr>
  </table>
  <table width="100%"  rules="all"  border="1" bordercolor="#000000" class="table">
    <tr>
      <td width="22%" align="center"><strong>KODE TRANSAKSI </strong></td>
      <td width="45%" align="center"><strong>NAMA</strong></td>
      <td width="33%" align="center"><strong>TOTAL Rp </strong></td>
    </tr>
	<?php 
	 
	$by = mysql_query("select sum(NOMINAL) as nom from biaya_02 where TGL like '$tgl'  and idkejuruan='$kj' and KODE='SPI'");
	$byy = mysql_fetch_array($by);
	$by2 = mysql_query("select sum(NOMINAL) as nom from biaya_02 where TGL like '$tgl'  and idkejuruan='$kj' and KODE='SKRIPSI'");
	$byy2 = mysql_fetch_array($by2);
	$by3 = mysql_query("select sum(NOMINAL) as nom from biaya_02 where TGL like '$tgl'  and idkejuruan='$kj' and KODE='SKS'");
	$byy3 = mysql_fetch_array($by3);
	$by4 = mysql_query("select sum(NOMINAL) as nom from biaya_02 where TGL like '$tgl'  and idkejuruan='$kj' and KODE='PRAK'");
	$byy4 = mysql_fetch_array($by4);
	$by5 = mysql_query("select sum(NOMINAL) as nom from biaya_02 where TGL like '$tgl'  and idkejuruan='$kj' and KODE='PKM'");
	$byy5 = mysql_fetch_array($by5);
	$by6 = mysql_query("select sum(NOMINAL) as nom from biaya_02 where TGL like '$tgl'  and idkejuruan='$kj' and KODE='SPP'");
	$byy6= mysql_fetch_array($by6);
	$by7 = mysql_query("select sum(NOMINAL) as nom from biaya_02 where TGL like '$tgl'  and idkejuruan='$kj' and KODE='PMB'");
	$byy7= mysql_fetch_array($by7);
	$by8 = mysql_query("select sum(NOMINAL) as nom from biaya_02 where TGL like '$tgl'  and idkejuruan='$kj' and KODE='REG'");
	$byy8= mysql_fetch_array($by8);
	$by8 = mysql_query("select sum(NOMINAL) as nom from biaya_02 where TGL like '$tgl'  and idkejuruan='$kj' and KODE='REG'");
	$byy8= mysql_fetch_array($by8);
	$by8 = mysql_query("select sum(NOMINAL) as nom from biaya_02 where TGL like '$tgl'  and idkejuruan='$kj' and KODE='REG'");
	$byy8= mysql_fetch_array($by8);
	$by9 = mysql_query("select sum(NOMINAL) as nom from biaya_02 where TGL like '$tgl'  and idkejuruan='$kj' and KODE='OPS'");
	$byy9= mysql_fetch_array($by9);
	$by10 = mysql_query("select sum(NOMINAL) as nom from biaya_02 where TGL like '$tgl'  and idkejuruan='$kj' and KODE='KKN'");
	$byy10= mysql_fetch_array($by10);
	$by11 = mysql_query("select sum(NOMINAL) as nom from biaya_02 where TGL like '$tgl'  and idkejuruan='$kj' and KODE='KKL'");
	$byy11= mysql_fetch_array($by11);
	$by12 = mysql_query("select sum(NOMINAL) as nom from biaya_02 where TGL like '$tgl'  and idkejuruan='$kj' and KODE='PKL'");
	$byy12= mysql_fetch_array($by12);
	$by13 = mysql_query("select sum(NOMINAL) as nom from biaya_02 where TGL like '$tgl'  and idkejuruan='$kj' and KODE='PPL'");
	$byy13= mysql_fetch_array($by13);
	$by14 = mysql_query("select sum(NOMINAL) as nom from biaya_02 where TGL like '$tgl'  and idkejuruan='$kj' and KODE='KP'");
	$byy14= mysql_fetch_array($by14);
	$by15 = mysql_query("select sum(NOMINAL) as nom from biaya_02 where TGL like '$tgl'  and idkejuruan='$kj' and KODE='PRA'");
	$byy15= mysql_fetch_array($by15);
	$by16 = mysql_query("select sum(NOMINAL) as nom from biaya_02 where TGL like '$tgl'  and idkejuruan='$kj' and KODE='SEMINAR'");
	$byy16= mysql_fetch_array($by16);
	$by17= mysql_query("select sum(NOMINAL) as nom from biaya_02 where TGL like '$tgl'  and idkejuruan='$kj' and KODE='TOEFL'");
	$byy17= mysql_fetch_array($by17);
	$by18= mysql_query("select sum(NOMINAL) as nom from biaya_02 where TGL like '$tgl'  and idkejuruan='$kj' and KODE='INFAQ'");
	$byy18= mysql_fetch_array($by18);
	$by19= mysql_query("select sum(NOMINAL) as nom from biaya_02 where TGL like '$tgl'  and idkejuruan='$kj' and KODE='WSD'");
	$byy19= mysql_fetch_array($by19);
	$by20= mysql_query("select sum(NOMINAL) as nom from biaya_02 where TGL like '$tgl'  and idkejuruan='$kj' and KODE LIKE '%PENDAFT%'");
	$byy20= mysql_fetch_array($by20);
	
	$k1 = @number_format($byy['nom'],"0","",".");
	$k2 = @number_format($byy2['nom'],"0","",".");
	$k3 = @number_format($byy3['nom'],"0","",".");
	$k4 = @number_format($byy4['nom'],"0","",".");
	$k5 = @number_format($byy5['nom'],"0","",".");
	$k6 = @number_format($byy6['nom'],"0","",".");
	$k7 = @number_format($byy7['nom'],"0","",".");
	$k8 = @number_format($byy8['nom'],"0","",".");
	$k9 = @number_format($byy9['nom'],"0","",".");
	$k10 = @number_format($byy10['nom'],"0","",".");
	$k11 = @number_format($byy11['nom'],"0","",".");
	$k12 = @number_format($byy12['nom'],"0","",".");
	$k13 = @number_format($byy13['nom'],"0","",".");
	$k14 = @number_format($byy14['nom'],"0","",".");
	$k15 = @number_format($byy15['nom'],"0","",".");
	$k16 = @number_format($byy16['nom'],"0","",".");
	$k17 = @number_format($byy17['nom'],"0","",".");
	$k18 = @number_format($byy18['nom'],"0","",".");
	$k19 = @number_format($byy19['nom'],"0","",".");
	$k20 = @number_format($byy20['nom'],"0","",".");
			?>
    <tr>
      <td>4111SPI</td>
      <td>SPI</td>
      <td align="right"><?php echo"Rp.$k1"; ?></td>
    </tr>
    <tr>
      <td>4111SKRIPSI</td>
      <td>SKRIPSI</td>
      <td align="right"><?php echo"Rp.$k2"; ?></td>
    </tr>
    <tr>
      <td>4111SKS</td>
      <td>SKS</td>
      <td align="right"><?php echo"Rp.$k3"; ?></td>
    </tr>
    
    <tr>
      <td>4111PKM</td>
      <td>PKM</td>
      <td align="right"><?php echo"Rp.$k5"; ?></td>
    </tr>
    <tr>
      <td>4111SPP</td>
      <td>SPP</td>
      <td align="right"><?php echo"Rp.$k6"; ?></td>
    </tr>
    <tr>
      <td>4111PMB</td>
      <td>PMB</td>
      <td align="right"><?php echo"Rp.$k7"; ?></td>
    </tr>
    <tr>
      <td>4111REG</td>
      <td>REG</td>
      <td align="right"><?php echo"Rp.$k8"; ?></td>
    </tr>
    <tr>
      <td>4111OPS</td>
      <td>OPS</td>
      <td align="right"><?php echo"Rp.$k9"; ?></td>
    </tr>
    <tr>
      <td>4111PRA</td>
      <td>PRA</td>
      <td align="right"><?php echo"Rp.$k15"; ?></td>
    </tr>
    <tr>
      <td>4111KKN</td>
      <td>KKN</td>
      <td align="right"><?php echo"Rp.$k10"; ?></td>
    </tr>
    <tr>
      <td>4111KKL</td>
      <td>KKL</td>
      <td align="right"><?php echo"Rp.$k11"; ?></td>
    </tr>
    <tr>
      <td>4111PKl</td>
      <td>PKL</td>
      <td align="right"><?php echo"Rp.$k12"; ?></td>
    </tr>
    <tr>
      <td>4111PPL</td>
      <td>PPL</td>
      <td align="right"><?php echo"Rp.$k13"; ?></td>
    </tr>
    <tr>
      <td>4111KP</td>
      <td>KP</td>
      <td align="right"><?php echo"Rp.$k14"; ?></td>
    </tr>
    <tr>
      <td>4111SEMINAR</td>
      <td>SEMINAR</td>
      <td align="right"><?php echo"Rp.$k16"; ?></td>
    </tr>
    <tr>
      <td>4111TOEFL</td>
      <td>TOEFL</td>
      <td align="right"><?php echo"Rp.$k17"; ?></td>
    </tr>
    <tr>
      <td>4111INFAQ</td>
      <td>INFAQ</td>
      <td align="right"><?php echo"Rp.$k18"; ?></td>
    </tr>
    <tr>
      <td>4111WSD</td>
      <td>WSD</td>
      <td align="right"><?php echo"Rp.$k19"; ?></td>
    </tr>
    <tr>
      <td>4111PENDAFT.MHS BARU</td>
      <td> PENDAFT.MHS BARU </td>
      <td align="right"><?php echo"Rp.$k20"; ?></td>
    </tr>
    <tr class="success">
      <td>&nbsp;</td>
      <td>TOTAL</td>
      <td align="right"><strong><?php 
	  $by21 = mysql_query("select sum(NOMINAL) as nom from biaya_02 where TGL like '$tgl'  and idkejuruan='$kj'");
	$byy21 = mysql_fetch_array($by21);
	$k21 = @number_format($byy21['nom'],"0","",".");
	echo"Rp.$k21";
	 ?></strong></td>
    </tr>
	<?php  ?>
  </table>
  <p>&nbsp;</p>
  <table width="1037" border="0">
    <tr>
      <td width="1031" align="center"><strong><h2>
        <?php 
	  $by21 = mysql_query("select sum(NOMINAL) as nom from biaya_02 where TGL like '$tgl'  and idkejuruan='$kj'");
	$byy21 = mysql_fetch_array($by21);
	$k21 = @number_format($byy21['nom'],"0","",".");
	echo "Total Rp.$k21" ;
	 ?></h2><br>
      </strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td></td>
    </tr>
    <tr>
      <td align="right"><strong>
        <?php 
$mysqlDateTime = date('d-m-Y');
echo "SEMARANG ,$mysqlDateTime"; 
	 ?>
      </strong></td>
    </tr>
    <tr>
      <td><div align="right">PETUGAS,</div></td>
    </tr>
    <tr>
      <td><p>&nbsp;</p>      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="center"></div></td>
    </tr>
    <tr>
      <td height="21"><div align="right">____________________</div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>
<?php
}
?>