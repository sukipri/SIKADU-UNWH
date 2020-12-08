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

<body>
<form name="form1" method="post" action="">
  <table width="624" align="center">
    <tr>
      <td width="616" colspan="2" valign="top"><span class="style343"><img src="http://sikadu.unwahas.ac.id/img/search2.png" width="44" height="50">Pencarian Mahsiswa [<a href="?aka=icari">per Progdi</a>]
          <hr color="#F27900">
      </span>*(Masukan Kode Mahasiwa yang sudah terdaftar</td>
    </tr>
    <tr>
      <td valign="top"><input name="cari" autocomplete="off" type="text" id="cari" size="37" class="form-control" required></td>
      <td valign="top"><input name="cari_data" type="submit" id="cari_data" class="btn btn-success" value="cari mahasiswa"></td>
    </tr>
  </table>
  <div align="center">  </div>
</form>
<br>
<table width="775" align="center" class="table table-bordered">
  <tr align="left" valign="top">
    <td width="38">#</td>
    <td width="226" height="28" align="center">NIM</td>
    <td width="145">Progdi</td>
    <td width="120">Semester</td>
    <td width="155">Nama</td>
    <td width="63">action</td>
  </tr>
  
  
	<?php 
  if(isset($_POST['cari_data'])){
$nama = mysql_real_escape_string($_POST['cari']);
$mhs = mysql_query("$sl idmahasiswa,idkejuruan,idgelombang,iddosen,idsemester,idtahun_ajaran,nama,alamat,asal,idkelas,mhs,st,uas,uts from mahasiswa WHERE nama LIKE '%$nama%' or idmahasiswa='$nama'");
$no = 1;
while($mhss = mysql_fetch_array($mhs)){

		$kj = mysql_query("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
		$kjj = mysql_fetch_array($kj);
		$kj = mysql_query("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
		$kjj = mysql_fetch_array($kj);
		$gel = mysql_query("select * from gelombang where idgelombang='$mhss[idgelombang]'");
		$gell = mysql_fetch_array($gel);
		$sm = mysql_query("select * from semester where idsemester='$mhss[idsemester]'");
		$smm = mysql_fetch_array($sm);
		$us = mysql_query("select * from user_mhs where idmahasiswa='$mhss[idmahasiswa]'");
		$uss = mysql_fetch_array($us);
		  $ft = mysql_query("select * from foto_mhs where idmahasiswa='$mhss[idmahasiswa]' order by idfoto desc limit 1");
		  $ftt  = mysql_fetch_array($ft);
		   $dsn = mysql_query("select * from dosen where iddosen='$mhss[iddosen]'");
		$dsnn = mysql_fetch_array($dsn);

  ?>
  <tr align="left" valign="top" bgcolor="#FFFFFF">
    <td width="38"><?php echo"$no"; ?></td>
    
	<td width="226" height="36" align="center"><?php echo"<font color=blue><b>$mhss[idmahasiswa]</b></font><br><br><b>$mhss[idkelas]</b>"; ?>
      <?php
	 $ftht = mysql_num_rows($ft);
	 if($ftht==1){
	 ?>
      <a href="http://sikadu.unwahas.ac.id/file/<?php echo"$ftt[foto]"; ?>" class="btn btn-default" target="_blank">
      <?php
	 echo"<center><img src=http://sikadu.unwahas.ac.id/file/dsncilik_$ftt[foto] width=150 height=150></center>"; 
	 }else{
	 ?>
      </a> <a href="#" class="btn btn-danger">
      <?php
	 echo"<center><img src=../img/no.jpg class=img-responsive></center>"; 
	 }
	 
	 
	 ?>
      </a></td>
    <td width="145"><?php echo"$kjj[kejuruan]"; ?><br>
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
      <br>
      <?php echo"<b>$mhss[asal]</b>"; ?><br>
	  <span class="label label-primary"><?php echo"Dosen wali&nbsp;$dsnn[nama]"; ?></span>
      <br> <br>
	  
      <?php
		if($mhss['st']==1){
			?>
      <span class="label label-danger">KRS Belum Aktif</span>
      <?php
		}else{
		?>
      <span class="label label-success">KRS Aktif</span>
      <?php
		}
	
	
	?>
      <br>
      <?php
		if($mhss['uas']==1){
			?>
      <span class="label label-danger">UAS Belum Aktif</span>
      <?php
		}else{
		?>
      <span class="label label-success">UAS Aktif</span>
   <?PHP } ?>
      <br>
      <?php
		if($mhss['uts']==1){
			?>
      <span class="label label-danger">UTS Belum Aktif</span>
      <?php
		}else{
		?>
      <span class="label label-success">UTS Aktif</span>
 <?PHP } ?>
      <br>
      <br>
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">KRS yang diambil</h3>
        </div>
        <div class="panel-body">
          <?php
  $krs = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]' and idsemester='$mhss[idsemester]' ");
  while($krss = mysql_fetch_array($krs)){
  $sks = mysql_query("select * from sks where idsks='$krss[idsks]' ");
$skss = mysql_fetch_array($sks);
  $sm = mysql_query("select * from semester where idsemester='$mhss[idsemester]'");
$smm = mysql_fetch_array($sm);
 $dsn = mysql_query("select * from dosen where iddosen='$skss[iddosen]'");
$dsnn = mysql_fetch_array($dsn);
$kj = mysql_query("select * from kejuruan where idkejuruan='$dsnn[idkejuruan]'");
$kjj = mysql_fetch_array($kj);
$kr  = mysql_query("select * from kurikulum where idkurikulum='$skss[idkurikulum]'");
$krr = mysql_fetch_array($kr);
  ?>
          <?php 
 if($krss['app']=='1'){
 echo"<font color=#FF8888>+$krr[judul]</font><br>";
 }else{
  echo"<font color=#208FFF>+$krr[judul]</font><br>";
 }
 
  ?>
          <br>
          <?php
  }
  ?>
        </div>
     <span class="style1">biru = ACC/</span>  <span class="style2">merah = belum ACC/ </span> 
  <?php
  	$ac = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]' and idsemester='$mhss[idsemester]' and app='2'");
		$jumacc = mysql_num_rows($ac);
		echo"ACC = $jumacc/";
  
  ?>
  <?php
    	$ac1 = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]' and idsemester='$mhss[idsemester]' and app='1'");
		$jumacc1 = mysql_num_rows($ac1);
		echo"Belum ACC = $jumacc1";
  ?>
    <?php  echo"<font color=red><b>$uss[passuser]</b></font>";?></td>
    <td width="120"><?php echo"<b>$smm[semester]</b>"; ?>
	
	</td>
      <td width="155"><?php echo"<b>$mhss[nama]</b><br>$mhss[alamat]"; ?></td>
    <td width="63"><a href="#"  onClick="MM_openBrWindow('../../SU_admin/m2_mhs.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="http://sikadu.unwahas.ac.id/img/bill%20of%20document.png" width="30" height="30" border="0" title="Management Mahasiswa" ></a>&nbsp;&nbsp;</td>
  </tr>
	



<?php
$no++; }} ?>
</table>

</body>
<?php
}
?>