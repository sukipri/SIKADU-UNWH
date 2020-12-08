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
	<form name="form1" method="post" action="">
	<table width="624" align="center">
	  <tr>
		<td colspan="3" valign="top"><span class="style343"><img src="http://sikadu.unwahas.ac.id/img/search2.png" width="44" height="50">[<a href="?aka=icari_nim">Pencarian NIM</a>&nbsp; / &nbsp; <a href="?aka=icari">Mini Feed</a>] per Progdi
		  </span><hr color="#F27900">
		  <a href="#above">*(Clik for Choose Export data
		  </a> </td>
	  </tr>
	  <tr>
		<td width="325" valign="top"><select name="cari" class="form-control" required>
		  <option value="">kode Program Studi</option>
		  <?php
			 $fak = mysql_query("select * from kejuruan order by idkejuruan");
			 while($fakk = mysql_fetch_array($fak)){
			 
			 echo"
			 <option value=$fakk[idkejuruan]>$fakk[idkejuruan]&nbsp; / &nbsp;$fakk[kejuruan]&nbsp;$fakk[progdi]</option>";
			 }
			 
			 ?>
		</select>      </td>
		<td width="227" valign="top"><select name="ang" id="ang" class="form-control" required>
		  <option value="">Tahun</option>
		  <?php
			 $aj = mysql_query("select * from tahun_ajaran order by ajaran asc limit 200");
			 while($ajj = mysql_fetch_array($aj)){
			 
			 echo"
			 <option value=$ajj[idtahun_ajaran]>$ajj[ajaran]</option>";
			 }
			 
			 ?>
		</select></td>
		<td width="56" valign="top">
		<button class="btn btn-info" name="cari_data"><i class="fa fa-send"></i>&nbsp;Cari Data</button>
		</td>
	  </tr>
	</table><br>
	  <table width="851" align="center" bgcolor="#00A854" class="table table-bordered table-sm table-striped">
		<tr align="left" valign="top" bgcolor="#FFA477">
		  <td width="117">NO</td>
		  <td width="117" height="28">NIM</td>
		  <td width="266">Progdi</td>
		  <td width="120">Semester</td>
		  <td width="155">Nama</td>
		  <td width="36">action</td>
		</tr>
		<?php 
	  if(isset($_POST['cari_data'])){
	$nama = mysql_real_escape_string($_POST['cari']);
	$ang = mysql_real_escape_string($_POST['ang']);
	$mhs = mysql_query("$sl idmahasiswa,idkejuruan,idgelombang,iddosen,idsemester,idtahun_ajaran,nama,alamat,asal,idkelas,mhs,st,uas,uts from mahasiswa where idkejuruan='$nama' and idtahun_ajaran='$ang' ");
	$no = 1;
	while($mhss = mysql_fetch_array($mhs)){
	
	$kj = mysql_query("select  idkejuruan,idfakultas,kejuruan from kejuruan where idkejuruan='$mhss[idkejuruan]'");
	$kjj = mysql_fetch_array($kj);
	$gel = mysql_query("select * from gelombang where idgelombang='$mhss[idgelombang]'");
	$gell = mysql_fetch_array($gel);
	$sm = mysql_query("select idsemester,idtahun_ajaran,semester from semester where idsemester='$mhss[idsemester]'");
	$smm = mysql_fetch_array($sm);
	$us = mysql_query("select iduser_mhs,idmahasiswa,username,passuser from user_mhs where idmahasiswa='$mhss[idmahasiswa]'");
	$uss = mysql_fetch_array($us);
	 $rsem = mysql_query("select * from rekamsemester where idmahasiswa='$mhss[idmahasiswa]' and idsemester='$mhss[idsemester]'");
		$rsemm = mysql_fetch_array($rsem);
	   $ft = mysql_query("select * from foto_mhs where idmahasiswa='$mhss[idmahasiswa]' order by idfoto desc limit 1");
	  $ftt  = mysql_fetch_array($ft);
	   $dsn = mysql_query("select iddosen,idkejuruan,nama from dosen where iddosen='$mhss[iddosen]'");
	$dsnn = mysql_fetch_array($dsn);
	
	  ?>
		<tr align="left" valign="top" bgcolor="#FFFFFF">
		  <td width="117"><?php echo"$no"; ?></td>
		  <td width="117" height="36"><?php echo"<font color=blue><b>$mhss[idmahasiswa]</b></font><br><br><b>$mhss[idkelas]</b>"; ?>
		  
		 <?php
		 $ftht = mysql_num_rows($ft);
		 if($ftht==1){
		 ?>
		 <a href="http://sikadu.unwahas.ac.id/file/<?php echo"$ftt[foto]"; ?>" class="btn btn-default" target="_blank">
		 <?php
		 echo"<center><img src=http://sikadu.unwahas.ac.id/file/dsncilik_$ftt[foto] width=150 height=150></center>"; 
		 }else{
		 ?>
		 </a>
		  <a href="#" class="btn btn-danger">
		 <?php
		 echo"<center><img src=http://sikadu.unwahas.ac.id/img/no.jpg class=img-responsive></center>"; 
		 }
		 ?>
		 </a>
		
		  </td>
		  <td width="266"><?php echo"$kjj[kejuruan]"; ?><br>
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
			<br><?php echo"<b>$mhss[asal]</b>"; ?><br><br> <span class="label label-primary"><?php echo"Dosen wali&nbsp;$dsnn[nama]"; ?></span>
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
		
		
		?><br> <?php
			if($mhss['uas']==1){
				?>
				
				<span class="label label-danger">UAS Belum Aktif</span>
				<?php
			}else{
			?>
			<span class="label label-success">UAS Aktif</span>
			<?php
			}
		
		
		?> <br> <?php
			if($mhss['uts']==1){
				?>
				
				<span class="label label-danger">UTS Belum Aktif</span>
				<?php
			}else{
			?>
			<span class="label label-success">UTS Aktif</span>
			<?php
			}
		
		
		?> <br><br>  <div class="panel panel-info">
	  <div class="panel-heading">
		<h3 class="panel-title">KRS yang diambil</h3>
	  </div>
	  <div class="panel-body">
	 <?php
	  $krs = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]' and idsemester='$mhss[idsemester]' ");
	  while($krss = mysql_fetch_array($krs)){
	  $sks = mysql_query("select * from sks where idsks='$krss[idsks]' ");
	$skss = mysql_fetch_array($sks);
	  $sm = mysql_query("select * from semester where idsemester='$skss[idsemester]'");
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
	<?PHP } ?>
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
	  <?php  echo"<font color=red><b>$uss[passuser]</b></font>";?>
	  
	  </td>
		  <td width="120"><?php echo"<b>$smm[semester]</b>"; ?></td>
		  <td width="155"><?php echo"<b>$mhss[nama]</b><br>$mhss[alamat]"; ?><br>
		  <a href="<?php echo"#$mhss[idmahasiswa]"; ?>" onClick="MM_openBrWindow('../../SU_admin/qrmhs.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=230,height=230')">Lihat QR-CODE</a></td>
		  <td width="36"><a href="<?php echo"#$mhss[idmahasiswa]"; ?>"  onClick="MM_openBrWindow('../SU_admin/m2_mhs.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="../img/bill%20of%20document.png" width="30" height="30" border="0" title="Management Mahasiswa" ></a>&nbsp;&nbsp;</td>
		</tr>
		<?php
		$no++; }}
	
	?>
	  </table>
	</form>
	<div id="above">
	<?php
	 if(isset($_POST['cari_data'])){
	$nama = mysql_real_escape_string($_POST['cari']);
	$ang = mysql_real_escape_string($_POST['ang']);
	$mhs = mysql_query("select * from mahasiswa where idkejuruan='$nama' and idtahun_ajaran='$ang'  ");
	$no = 1;
	$mhss = mysql_fetch_array($mhs);
	$mhs01 = mysql_query("select * from mahasiswa where idkejuruan='$nama' and krs='1' and idtahun_ajaran='$ang' ");
	$mhss01 = mysql_num_rows($mhs01);
	$mhs02 = mysql_query("select * from mahasiswa where idkejuruan='$nama' and krs='2' and idtahun_ajaran='$ang' ");
	$mhss02 = mysql_num_rows($mhs02);
	?>
	<table width="100%" class="table">
	
	<tr align="left" valign="top" bgcolor="#D4D4D4">
		  <td width="7%">&nbsp;</td>
		  <td width="24%" height="36"><a href="../SU_admin/ctk_excel_mhs.php<?php echo"?idkj=$mhss[idkejuruan]"; ?>" class="btn btn-success" target="_blank">Export .XLS </a></td>
		  <td width="9%"><h4>TOTAL</h4></td>
		  <td width="20%"><?php echo"<h4>Aktif KRS:&nbsp; $mhss02</h4>"; ?></td>
		  <td width="39%"><?php echo"<h4>NON-Aktif KRS:&nbsp; $mhss01</h4>"; ?></td>
		  <td width="1%"><?php
	  $jummhs= @mysql_num_rows($mhs);
	echo"<h4><center>$jummhs</center></h4>";
	?></td>
	  
	  </tr>
	</table>
	<?php
	}
	?>
	</div>
	</body>
	</html>
<?PHP } ?>