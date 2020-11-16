<?php
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
 ?>
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
      <td colspan="4" valign="top"><span class="style343"><img src="../../img/search2.png" width="44" height="50">Cari PerProdi
        <a href="?ku=icari2_ctk" class="btn btn-default">Per / NIM</a>
		  <hr color="#F27900">
      </span>
	  
	  *(Masukan Kode Mahasiwa yang sudah terdaftar</td>
    </tr>
    <tr>
      <td width="250" valign="top"><select name="cari" required class="form-control form-control-sm">
        <option value="">kode Program Studi</option>
        <?php
		 $fak =$call_q("select * from kejuruan where idfakultas='$uu[idfakultas]' order by idkejuruan");
		 while($fakk = $call_fas($fak)){
		 
		 echo"
		 <option value=$fakk[idkejuruan]>$fakk[idkejuruan]&nbsp; / &nbsp;$fakk[kejuruan]&nbsp;$fakk[progdi]</option>";
		 }
		 
		 ?>
      </select></td>
      <td width="148" valign="top"><select required name="ang" id="ang" class="form-control form-control-sm">
        <option value="">Tahun</option>
        <?php
		 $aj =$call_q("select * from tahun_ajaran order by ajaran asc limit 200");
		 while($ajj = $call_fas($aj)){
		 
		 echo"
		 <option value=$ajj[idtahun_ajaran]>$ajj[ajaran]</option>";
		 }
		 
		 ?>
      </select></td>
      <td width="148" valign="top"><select name="sms" required id="sms" class="form-control form-control-sm">
        <option value="">Semester</option>
        <?php
		$sm =$call_q("select * from semester order by idmain asc limit 100");
			  while($smm = $call_fas($sm)){
			  $th =$call_q("select * from tahun_ajaran where idtahun_ajaran='$smm[idtahun_ajaran]'");
			  $thh = $call_fas($th);
			  echo"<option value=$smm[idsemester]>$smm[semester] &nbsp; $thh[ajaran] &nbsp; $smm[ajaran]  </option>";
 		 }
		?>
      </select></td>
      <td width="210" valign="top"><input name="cari_data" type="submit" id="cari_data3" value="cari mahasiswa" class="btn btn-info"></td>
    </tr>
  </table>
  <div align="center">  </div>
</form><br>
<?php
 if(isset($_POST['cari_data'])){
 $nama = $sql_escape($_POST['cari']);
$ang = $sql_escape($_POST['ang']);
$semes = @$_POST['sms'];
 ?>
<div class="container">
<a href="#" class="btn btn-primary"  onClick="MM_openBrWindow('../../SU_admin/icari4_pagging.php?<?php echo"nama=$nama&ang=$ang&semes=$semes"; ?>','','scrollbars=yes,width=900,height=900')">Pagging Overview</a>
<table width="100%" align="center"  class="table table-bordered table-striped table-sm">
  <tr align="center" valign="top" class="table-info">
    <td width="31" height="36" valign="middle">#</td>
    <td width="220" valign="middle">NIM</td>
    <td width="104" valign="middle">Progdi</td>
    <td width="119" valign="middle">Semester</td>
    <td width="321" valign="middle">Nama</td>
    <td width="34" valign="middle">UAS</td>
    <td width="30" valign="middle">UTS</td>
    <td width="31" valign="middle">KRS</td>
    <td width="32" valign="middle">KHS</td>
    <td width="87" valign="middle">TRANSKRIP</td>
  </tr>
  
  
	<?php 
 

$mhs =$call_q("$sl idmahasiswa,idkejuruan,iddosen,idsemester,idgelombang,nama,idkelas,mhs FROM mahasiswa WHERE idkejuruan='$nama' and idtahun_ajaran='$ang' and mhs='2' or mhs='3' ");
$no = 1;
while($mhss = $call_fas($mhs)){
$kj =$call_q("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
$kjj = $call_fas($kj);
$kj =$call_q("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
$kjj = $call_fas($kj);
$gel =$call_q("select * from gelombang where idgelombang='$mhss[idgelombang]'");
$gell = $call_fas($gel);
$sm =$call_q("select * from semester where idsemester='$mhss[idsemester]'");
$smm = $call_fas($sm);
$us =$call_q("select * from user_mhs where idmahasiswa='$mhss[idmahasiswa]'");
$uss = $call_fas($us);
 $rsem =$call_q("select * from rekamsemester where idmahasiswa='$mhss[idmahasiswa]' and idsemester='$mhss[idsemester]'");
	$rsemm = $call_fas($rsem);

  ?>
  <tr align="center" valign="top" bordercolor="#CEE7FF">
    <td width="31"><?php echo"$no"; ?></td>
    
	<td width="220" height="36"><?php echo"<font color=blue><b>$mhss[idmahasiswa]</b></font><br><b>$mhss[idkelas]</b><br>"; ?>

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
    <td width="104"><?php echo"$kjj[kejuruan]"; ?></td>
    <td width="119"><?php echo"<b>$smm[semester]</b>"; ?></td>
    <td width="321"><?php echo"$mhss[nama]"; ?></td>
    <td width="34"><a href="#"  onClick="MM_openBrWindow('../../AKA/ctk_kartu_ujian.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="../../img/bill%20of%20document.png" width="30" height="30" border="0" title="Cetak Kartu Ujian Ahir" ></a></td>
    <td width="30"><a href="#"  onClick="MM_openBrWindow('../../AKA/ctk_kartu_ujian_uts.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="../../img/bill%20of%20document.png" width="30" height="30" border="0" title="Cetak Kartu Ujian Ahir" ></a></td>
    <td width="31"><a href="#"  onClick="MM_openBrWindow('../../SU_admin/ctk_krs_mhs.php?<?php echo"kdmhs=$mhss[idmahasiswa]&idsm=$semes"; ?>','','scrollbars=yes,width=900,height=900')"><img src="../../img/bill%20of%20document.png" width="30" height="30" border="0" title="Cetak Kartu Ujian Ahir" ></a></td>
    <td width="32"><a href="#"  onClick="MM_openBrWindow('../../SU_admin/m2_mhs.php?<?php echo"mng=v_ikhs&kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="../../img/bill%20of%20document.png" width="30" height="30" border="0" title="Cetak Kartu Ujian Ahir" ></a></td>
    <td width="87"><a href="#"  onClick="MM_openBrWindow('ctk_tran_sks_try_urut.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="../../img/bill%20of%20document.png" width="30" height="30" border="0" title="Cetak Transkrip" ></a></td>
  </tr>
	



<?php
$no++; } ?>
</table>
<?PHP } ?>
</div>
<?php

?>



</body>
<?PHP } ?>