<?php //session_start();
 include_once"../sc/conek.php";

	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
 ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style343 {font-size: 24px}
-->
</style>

<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
</head>

<body>
<form name="form1" method="post" action="">
  <table width="784" align="center" class="table">
    <tr>
      <td colspan="4" valign="top"><span class="style343"><img src="../img/search2.png" width="44" height="50">Cari PerProdi[IPK] <a href="?aka=icari_ipk_nim" class="btn btn-default">Per / NIM</a>
            <hr color="#F27900">
        </span>
          <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">X </button>
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede </div>
          *(Masukan Kode Mahasiwa yang sudah terdaftar</td>
    </tr>
    <tr>
      <td width="250" valign="top"><select name="cari" class="form-control">
          <option>-------kode Program Studi-----------</option>
          <?php
		// $fak = mysql_query("select * from kejuruan where idfakultas='$uu[idfakultas]' order by idkejuruan");
		 $fak = mysql_query("select * from kejuruan order by idkejuruan");
		 while($fakk = mysql_fetch_array($fak)){
		 
		 echo"
		 <option value=$fakk[idkejuruan]>$fakk[idkejuruan]&nbsp; / &nbsp;$fakk[kejuruan]&nbsp;$fakk[progdi]</option>";
		 }
		 
		 ?>
      </select></td>
      <td width="148" valign="top"><select name="ang" id="ang" class="form-control">
          <option>------------Tahun.......</option>
          <?php
		 $aj = mysql_query("select * from tahun_ajaran order by ajaran asc limit 200");
		 while($ajj = mysql_fetch_array($aj)){
		 
		 echo"
		 <option value=$ajj[idtahun_ajaran]>$ajj[ajaran]</option>";
		 }
		 
		 ?>
      </select></td>
      <td width="148" valign="top"><select name="sms" id="sms" class="form-control">
          <option>semester......................</option>
          <?php
		$sm = mysql_query("select * from semester order by idmain asc limit 100");
  while($smm = mysql_fetch_array($sm)){
  $th = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$smm[idtahun_ajaran]'");
  $thh = mysql_fetch_array($th);
  echo"<option value=$smm[idsemester]>$smm[semester] &nbsp; $thh[ajaran] &nbsp; $smm[ajaran]  </option>";
  }
		?>
      </select></td>
      <td width="210" valign="top"><input name="cari_data" type="submit"  value="cari mahasiswa" class="btn btn-info"></td>
    </tr>
  </table>
  <div align="center">  </div>
</form><br>
<div class="container">
<table width="100%" align="center" bgcolor="#FF7735" class="table table-bordered">
  <tr align="center" valign="top" bgcolor="#FFA477">
    <td width="32" height="36" valign="middle">#</td>
    <td width="159" valign="middle">NIM</td>
    <td width="129" valign="middle">Progdi</td>
    <td width="126" valign="middle">Semester</td>
    <td width="243" valign="middle">Nama</td>
    <td width="78" valign="middle">STS</td>
    <td width="78" valign="middle">SKS</td>
    <td width="76" valign="middle">SKS.KUM</td>
    <td width="60" valign="middle">IPS</td>
    <td width="98" valign="middle">IPK</td>
  </tr>
  
  
	<?php 
  if(isset($_POST['cari_data'])){
	 $nama = mysql_real_escape_string($_POST['cari']);
	$ang = mysql_real_escape_string($_POST['ang']);
	$semes = @$_POST['sms'];
	$mhs = mysql_query("select * from mahasiswa WHERE idkejuruan='$nama' and idtahun_ajaran='$ang' and mhs='2' ");
		$no = 1;
	while($mhss = mysql_fetch_array($mhs)){

	$kj = mysql_query("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
	$kjj = mysql_fetch_array($kj);
	$kj = mysql_query("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
	$kjj = mysql_fetch_array($kj);
	$gel = mysql_query("select * from gelombang where idgelombang='$mhss[idgelombang]'");
	$gell = mysql_fetch_array($gel);
	$sm = mysql_query("select * from semester where idsemester='$semes'");
	$smm = mysql_fetch_array($sm);
	$us = mysql_query("select * from user_mhs where idmahasiswa='$mhss[idmahasiswa]'");
	$uss = mysql_fetch_array($us);
 	$rsem = mysql_query("select * from rekamsemester where idmahasiswa='$mhss[idmahasiswa]' and idsemester='$smm[idsemester]'");
	$rsemm = mysql_fetch_array($rsem);

  ?>
  <tr align="center" valign="top" bordercolor="#CEE7FF" bgcolor="#FFFFFF">
    <td width="32"><?php echo"$no"; ?></td>
    
	<td width="159" height="36"><?php echo"<font color=blue><b>$mhss[idmahasiswa]</b></font><br><font color=green><b>$uss[passuser]</b><br><b>$mhss[idkelas]</b>"; ?></td>
    <td width="129"><?php echo"$kjj[kejuruan]"; ?></td>
    <td width="126"><?php echo"<b>$smm[semester]</b>"; ?></td>
    <td width="243"><?php echo"$mhss[nama]"; ?></td>
    <td width="78">
	  <?PHP 
	  
	  if($mhss['mhs']==2){
	  echo"<b><font color=green>AKTIF</font></b>";
	  }elseif(
	  $mhss['mhs']==1){
	  echo"<b><font color=grey>NON-AKTIF</font></b>";
	  }elseif(
	  $mhss['mhs']==3){
	  echo"<b><font color=blue>CUTI</font></b>";
	  }elseif(
	  $mhss['mhs']==4){
	  echo"<b><font color=#006666>LULUS</font></b>";
	  }elseif(
	  $mhss['mhs']==5){
	  echo"<b><font color=red>KELUAR</font></b>";
	  
	   }elseif(
	  $mhss['mhs']==6){
	  echo"<br><b><font color=red>TRANSFER</font></b>";
	  }
	  
	   ?>
	</td>
    <td width="78">
	<?php 
			$jum_sks = mysql_query(" select sum(jumlah) as j_sks from krs where idsemester='$semes' and idmahasiswa='$mhss[idmahasiswa]' and app='2'");
			$jum_skss = mysql_fetch_array($jum_sks);
				echo"$jum_skss[j_sks]";
	?>
	
	</td>
    <td width="76">
	<?php 
			$jum_sks2 = @mysql_query(" select sum(jumlah) as j_sks2 from krs where  idmahasiswa='$mhss[idmahasiswa]' and app2='2' and app='2' ");
			$jum_skss2 = @mysql_fetch_array($jum_sks2);
				echo"lama:$jum_skss2[j_sks2]<br>";
	?> <?php	
	
	//$k = mysql_query("select sum(jumlah) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and app2='2' and angka>'1'");
	$k = mysql_query("select sum(jumlah) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and angka>'1.5'");
	$kk = mysql_fetch_array($k);
	
	$k2 = mysql_query("select sum(jumlah_baru) as krt from mahasiswa_trans where idmahasiswa='$kdmhs'  ");
	$kk2 = mysql_fetch_array($k2);
	$hit_krs = $kk['kr'] + $kk2['krt'];
	echo"baru:$hit_krs"; 
	
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
    <td width="60"><?php echo"$rsemm[ip]"; ?></td>
    <td width="98">
	<?php   $k3 = @mysql_query("select sum(total2) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and app2='2'    ");
			$kk3 = mysql_fetch_array($k3);  ?>
	<?php 
		@$bg = $kk3['kr'] / $jum_skss2['j_sks2'];
		$pembg = @number_format($bg,2);
	 		echo"lama:$pembg<br>"; 
			
	  ?>
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
	?>	</td>
  </tr>
	



	<?php
		$no++;
		
		}
		}

	?>
</table>
</div>
</body>
</html>
<?php
}
?>