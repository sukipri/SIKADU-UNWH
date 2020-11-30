<?php //session_start();
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

</head>

<body>
<br><br>

  <table width="624" align="center">
    <tr>
      <td width="616" valign="top"><span><i class="fas fa-search"></i>&nbsp;Update Kartu UTS & UAS / NIM 
        <hr color="#F27900">
      	</span>
      </td>
    </tr>
    <tr>
      <td valign="top">&nbsp;</td>
    </tr>
  </table>
<form name="form1" method="post" action="">
 <div class="input-group mb-3">
  <input name="cari" type="text" required autocomplete="off" style="max-width:10rem;"  id="cari" class="form-control form-control-sm">
          <div class="input-group-append">
          <button name="cari_data" class="btn btn-success btn-sm"><span><i class="fas fa-search"></i>&nbsp;Cari</span>
          </div>
	</div>
</form>
<br>
<table align="center"  class="table table-bordered table-sm">
  <tr align="center" valign="top"  class="table-warning">
    <td width="38">#</td>
    <td width="133" height="28">NIM</td>
    <td width="144">Progdi</td>
    <td width="201">Semester</td>
    <td width="287">Nama</td>
    <td>Tagihan</td>
    <td width="126">Status</td>
    <td width="126">action</td>
  </tr>
  
  
	<?php 
  if(isset($_POST['cari_data'])){
		$nama = $sql_escape($_POST['cari']);
		$mhs = $call_q("$sl idmahasiswa,idkejuruan,idkelas,iddosen,idsemester,idgelombang,nama,asal,mhs,st,krs,uts,uas from mahasiswa WHERE nama LIKE '%$nama%' or idmahasiswa='$nama'");
		$no = 1;
		while($mhss = $call_fas($mhs)){
		
		$kj = $call_q("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
		$kjj = $call_fas($kj);
		$kj = $call_q("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
		$kjj = $call_fas($kj);
		$gel = $call_q("select * from gelombang where idgelombang='$mhss[idgelombang]'");
		$gell = $call_fas($gel);
		$sm = $call_q("select * from semester where idsemester='$mhss[idsemester]'");
		$smm = $call_fas($sm);
		$us = $call_q("select * from user_mhs where idmahasiswa='$mhss[idmahasiswa]'");
		$uss = $call_fas($us);
		$gl = $call_q("select * from gelombang where idgelombang='$mhss[idgelombang]'");
		$gll = $call_fas($gl);

  ?>
  <tr align="center" valign="top" bgcolor="#FFFFFF">
    <td width="38"><?php echo"$no"; ?></td>
    
	<td width="133" height="36"><?php echo"<font color=blue><b>$mhss[idmahasiswa]</b></font><br><font color=green>$gll[gelombang] / $gll[tahun]<br><b>$mhss[idkelas]</b>"; ?></td>
    <td width="144"><?php echo"$kjj[kejuruan]<br>"; ?><?php echo"Status: $mhss[asal]<br>" ; ?></td>
    <td width="201"><?php echo"<b>$smm[semester]</b>"; ?></td>
    <td width="287"><?php echo"$mhss[nama]<br>" ; ?><?PHP 
	  
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
	  
	   ?></td>
    <td>
    <?PHP 
			$vtgh01_sw = $call_q("$sl id_biaya_rekam,idmain_rekam,idbiaya_02,idmahasiswa,nama,kode_bayar,nominal,tgl,idsemester,app FROM biaya_02_rekam_bri WHERE idmahasiswa='$mhss[idmahasiswa]' ");
				while($vtgh01_sww = $call_fas($vtgh01_sw)){
					//NOM
						$nom_vtgh01_sw = @$nf($vtgh01_sww['nominal']);
					
	?>
    		<span class="badge badge-danger"><?PHP echo"Rp.$nom_vtgh01_sw"; ?></span>
    
    <?PHP } ?>
    </td>
    <td width="126">
      <!-- -->
      <?php
		if($mhss['st']==1){
			?>
      <a class="badge badge-danger"> Belum Aktif</a>
      <?php
		}else{
		?>
      <a class="badge badge-success">  Aktif</a>
      <?php
				}
		?>
      
      <!-- -->
      <?php
		if($mhss['uas']==1){
			?>
      <a class="badge badge-danger"> Belum Aktif</a>
      <?php
		}else{
		?>
      <a class="badge badge-succeess">  Aktif</a>
      <?php
		}
	
	
	?>
      
      <!-- -->
      <?php
		if($mhss['uts']==1){
			?>
      <a class="badge badge-danger"> Belum Aktif</a>
      <?php
		}else{
		?>
      <a class="badge badge-success">  Aktif</a>
      <?php
		}
	
	
	?>
      <!-- -->
      
      
    </td>
    <td width="126"><a href="#"  onClick="MM_openBrWindow('../../SU_admin/m2_mhs.php?mng=<?php echo"aktkrs&kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="../../img/bill%20of%20document.png" width="30" height="30" border="0" title="Management AKTIVASI Mahasiswa" ></a>&nbsp;&nbsp;</td>
  </tr>
	



<?php
$no++; }}
?>
</table>

</body>
<?PHP } ?>