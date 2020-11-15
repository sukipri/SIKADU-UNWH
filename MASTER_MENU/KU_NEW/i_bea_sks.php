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
<form name="form1" method="post" action="<?php echo"ctk_print_beasks.php?kdmhs=$kdmhs"; ?>">
  <table width="569" border="0" align="center" bgcolor="#004080">
    <tr bgcolor="#FFFFFF">
      <td width="191" height="36">Biaya Total sks &nbsp;<?php
	
	$k = mysql_query("select sum(jumlah) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' ");
	$kk = mysql_fetch_array($k);
	
	
	$k1 = mysql_query("select sum(jumlah) as krp from p_sks where idmahasiswa='$mhss[idmahasiswa]' and app='2'");
	$kk1 = mysql_fetch_array($k1);
	
	
	$ju_krs = $kk['kr'] + $kk1['krp'];
	$bi_prak = $kk1['krp'] * $bii['praktikum'];
	$bi_jum = $ju_krs * $bii['sks'];
	echo"<b>$ju_krs</b>";
	
	
	
	
	 ?> </td>
      <td width="368"><?php $j_sks = $bi_jum + $bi_prak; 
	  $r_sks = number_format($j_sks,"0","",".");
	  echo"Rp.$r_sks"; ?>
      <input type="hidden" name="tot_sks" value="<?php echo"$j_sks"; ?>"></td>
      <td width="368" rowspan="4"><input name="simpan" type="submit" class="sb" id="simpan" value="simpan pembayaran"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="36">Pilih Semester </td>
      <td height="36"><select name="sm" id="sm">
        <option>pilihh semester........</option>
        <?php 
	  $sem = mysql_query("select * from semester  order by idsemester asc limit 100");
	  while($semm = mysql_fetch_array($sem)){
	  $thn = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$semm[idtahun_ajaran]'");
	  $thnn = mysql_fetch_array($thn);
	    if($mhss['idsemester']==$semm['idsemester']){echo"<option value=$semm[idsemester] selected>$semm[semester]&nbsp; $thnn[ajaran]&nbsp;$semm[ajaran]</option>";
		}else{
	  echo"<option value=$semm[idsemester]>$semm[semester]&nbsp; $thnn[ajaran]&nbsp;$semm[ajaran]</option>";
	  }
	  }
	  ?>
      </select></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="36">Beasiswa</td>
      <td><select name="bea" id="bea">
        <option>maaf siswa tidak ada beasiswa</option>
        <?php
    $bea = mysql_query("select * from bea order by potongan desc limit 2000");
  while($beaa = mysql_fetch_array($bea)){
  if($beaa['idbea']==$mhss['idbea']){
    echo"<option value=$beaa[idbea] selected>$beaa[idbea]&nbsp;$beaa[potongan]</option>";
  }else{
  echo"<option value=$beaa[idbea]>$beaa[idbea]&nbsp;$beaa[potongan]</option>";
  }
  }
  
  ?>
      </select></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="36">Bayar</td>
      <td><?php
	  $bea1 = @mysql_query("select * from bea where idbea='$mhss[idbea]'");
  $beaa1 = @mysql_fetch_array($bea1);
 
	//sesi diskon
  $o = @$beaa1['potongan'];
	  @$dis = $j_sks / (100/$beaa1['potongan']);
	  @$totdis = $j_sks - $dis;
	  ?>        <input name="semester" type="text" id="semester" size="45" value="<?php echo"$totdis"; ?>"></td>
    </tr>
    <tr align="center" bgcolor="#FFFFFF">
      <td colspan="3">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
}
?>