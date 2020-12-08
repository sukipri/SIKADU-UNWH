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
		<td colspan="3" valign="top"><span class="style343"><img src="http://sikadu.unwahas.ac.id/img/search2.png" width="44" height="50">[<a href="?aka=icari_nim">Pencarian NIM</a>&nbsp; / &nbsp; <a href="?aka=icari_full">Max Feed</a>] per Progdi MiniFeed
		  </span><hr color="#F27900">
		  <a href="#above">*(Clik for Choose Export data
		  </a> </td>
	  </tr>
	  <tr>
		<td width="325" valign="top"><select name="cari" class="form-control" required>
		  <option value="">Progdi</option>
		  <?php
			 $fak = $call_q("select * from kejuruan order by idkejuruan");
			 while($fakk =$call_fas($fak)){
			 
			 echo"
			 <option value=$fakk[idkejuruan]>$fakk[idkejuruan]&nbsp; / &nbsp;$fakk[kejuruan]&nbsp;$fakk[progdi]</option>";
			 }
			 
			 ?>
		</select>      </td>
		<td width="227" valign="top"><select name="ang" id="ang" class="form-control" required>
		  <option value="">Tahun</option>
		  <?php
			 $aj = $call_q("select * from tahun_ajaran order by ajaran asc limit 200");
			 while($ajj =$call_fas($aj)){
			 
			 echo"
			 <option value=$ajj[idtahun_ajaran]>$ajj[ajaran]</option>";
			 }
			 
			 ?>
		</select></td>
		<td width="56" valign="top">
		<input name="cari_data" type="submit" id="cari_data2" value="Submit" class="btn btn-success"></td>
	  </tr>
	</table><br>
	  <table width="851" align="center" class="table table-bordered table-striped table-sm">
		<tr align="left" valign="top" class="table-info">
		  <td width="24">NO</td>
		  <td width="212" height="28">NIM</td>
		  <td width="269">Progdi</td>
		  <td width="121">Semester</td>
		  <td width="157">Nama</td>
		  <td width="40">action</td>
		</tr>
		<?php 
	  if(isset($_POST['cari_data'])){
	$nama =$sql_escape($_POST['cari']);
	$ang =$sql_escape($_POST['ang']);
	$mhs = $call_q("$sl idmahasiswa,idkejuruan,idgelombang,iddosen,idsemester,idtahun_ajaran,nama,alamat,asal,idkelas,mhs from mahasiswa where idkejuruan='$nama' and idtahun_ajaran='$ang'   ");
	$no = 1;
	while($mhss =$call_fas($mhs)){
	
	$kj = $call_q("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
	$kjj =$call_fas($kj);
	$kj = $call_q("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
	$kjj =$call_fas($kj);
	$gel = $call_q("select * from gelombang where idgelombang='$mhss[idgelombang]'");
	$gell =$call_fas($gel);
	$sm = $call_q("select * from semester where idsemester='$mhss[idsemester]'");
	$smm =$call_fas($sm);
	$us = $call_q("select * from user_mhs where idmahasiswa='$mhss[idmahasiswa]'");
	$uss =$call_fas($us);
	   $ft = $call_q("select * from foto_mhs where idmahasiswa='$mhss[idmahasiswa]' order by idfoto desc limit 1");
	  $ftt  =$call_fas($ft);
	   $dsn = $call_q("select iddosen,idkejuruan,nama  from dosen where iddosen='$mhss[iddosen]'");
	$dsnn =$call_fas($dsn);
	
	  ?>
		<tr align="left" valign="top">
		  <td width="24"><?php echo"$no"; ?></td>
		  <td width="212" height="96"><?php echo"<font color=blue><b>$mhss[idmahasiswa]</b></font><br><br><b>$mhss[idkelas]</b>"; ?>
		
		
		  </td>
		  <td width="269"><?php echo"$kjj[kejuruan]"; ?><br>
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
	   
	  
	  </td>
		  <td width="121"><?php echo"<b>$smm[semester]</b>"; ?><br>
		  <a href="<?php echo"#$mhss[idmahasiswa]"; ?>" onClick="MM_openBrWindow('../../SU_admin/qrmhs.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=230,height=230')">Lihat QR-CODE</a></td>
		  <td width="157"><?php echo"<b>$mhss[nama]</b><br>$mhss[alamat]"; ?></td>
		  <td width="40"><a href="<?php echo"#$mhss[idmahasiswa]"; ?>"  onClick="MM_openBrWindow('../../SU_admin/m2_mhs.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="http://sikadu.unwahas.ac.id/img/bill%20of%20document.png" width="30" height="30" border="0" title="Management Mahasiswa" ></a>&nbsp;&nbsp;</td>
		</tr>
		<?php
		$no++; }}
	
	?>
	  </table>
	</form>
	<div id="above">
	<?php
	 if(isset($_POST['cari_data'])){
	$nama =$sql_escape($_POST['cari']);
	$ang =$sql_escape($_POST['ang']);
	$mhs = $call_q("select * from mahasiswa where idkejuruan='$nama' and idtahun_ajaran='$ang'  ");
	$no = 1;
	$mhss =$call_fas($mhs);
	$mhs01 = $call_q("select * from mahasiswa where idkejuruan='$nama' and krs='1' and idtahun_ajaran='$ang' ");
	$mhss01 = mysql_num_rows($mhs01);
	$mhs02 = $call_q("select * from mahasiswa where idkejuruan='$nama' and krs='2' and idtahun_ajaran='$ang' ");
	$mhss02 = mysql_num_rows($mhs02);
	$mhs03 = $call_q("select * from mahasiswa where idkejuruan='$nama' and mhs='2' and idtahun_ajaran='$ang' ");
	$mhss03 = mysql_num_rows($mhs03);
	$mhs04 = $call_q("select * from mahasiswa where idkejuruan='$nama' and mhs='3' and idtahun_ajaran='$ang' ");
	$mhss04 = mysql_num_rows($mhs04);
	$mhs05 = $call_q("select * from mahasiswa where idkejuruan='$nama' and mhs='4' and idtahun_ajaran='$ang' ");
	$mhss05 = mysql_num_rows($mhs05);
	$mhs06 = $call_q("select * from mahasiswa where idkejuruan='$nama' and mhs='5' and idtahun_ajaran='$ang' ");
	$mhss06 = mysql_num_rows($mhs06);
	$mhs07 = $call_q("select * from mahasiswa where idkejuruan='$nama' and asal='pindahan' and idtahun_ajaran='$ang' ");
	$mhss07 = mysql_num_rows($mhs07);
	$mhs08 = $call_q("select * from mahasiswa where idkejuruan='$nama' and asal='baru' and idtahun_ajaran='$ang' ");
	$mhss08 = mysql_num_rows($mhs08);
	?>
	<table width="100%" class="table">
	
	<tr align="left" valign="top" bgcolor="#D4D4D4">
		  <td width="7%">&nbsp;</td>
		  <td width="24%" height="36"><a href="../SU_admin/ctk_excel_mhs.php<?php echo"?idkj=$mhss[idkejuruan]"; ?>" class="btn btn-success" target="_blank">Export .XLS </a></td>
		  <td width="9%"><h4>TOTAL</h4></td>
		  <td width="20%"><?php echo"<h4>Aktif KRS:&nbsp; $mhss02</h4>"; ?></td>
		  <td width="27%"><?php echo"<h4>NON-Aktif KRS:&nbsp; $mhss01</h4>"; ?></td>
		  <td width="13%"><?php
	  $jummhs= @mysql_num_rows($mhs);
	echo"<h4><center>$jummhs</center></h4>";
	?></td>
	  
	  </tr>
	<tr align="left" valign="top" bgcolor="#D4D4D4">
	  <td>&nbsp;</td>
	  <td height="36">MHS AKTIF &nbsp; <?php echo"<h4>$mhss03</h4>"; ?> </td>
	  <td>MHS CUTI&nbsp; <?php echo"<h4>$mhss04</h4>"; ?> </td>
	  <td>MHS LULUS&nbsp; <?php echo"<h4>$mhss05</h4>"; ?></td>
	  <td>MHS KELUAR&nbsp; <?php echo"<h4>$mhss06</h4>"; ?></td>
	  <td>&nbsp;</td>
	</tr>
	<tr align="left" valign="top" bgcolor="#D4D4D4">
	  <td>&nbsp;</td>
	  <td height="36">MHS PINDAHAN&nbsp; <?php echo"<h4>$mhss07</h4>"; ?></td>
	  <td>MHS BARU&nbsp; <?php echo"<h4>$mhss08</h4>"; ?></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>	<div id="resi"><a href="ctk_resi_bank.php<?php echo"?idkj=$mhss[idkejuruan]&idsm=$mhss[idsemester]"; ?>" class="btn btn-success" target="_blank">Export SKS2 .XLS </a></div>	</td>
	</tr>
	</table>
<?PHP } ?>
	</div>
	</body>

<?PHP } ?>