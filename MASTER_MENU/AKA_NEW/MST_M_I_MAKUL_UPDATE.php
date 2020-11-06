<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
<form name="form1" method="post" action="">
	  <table width="600" border="0" class="table" style="max-width:40rem; ">
		<tr>
		  <td><select name="nama" id="nama" class="form-control" required>
			<option value=""> Program Studi</option>
			<?php
			 $fak = $call_q("select * from kejuruan order by idkejuruan");
			 while($fakk = $call_fas($fak)){
			 
			 echo"
			 <option value=$fakk[idkejuruan]>$fakk[idkejuruan]&nbsp; / &nbsp;$fakk[kejuruan]&nbsp;$fakk[progdi]</option>";
			 }
			 
			 ?>
		  </select></td>
		  <td><select name="sms" id="sms" class="form-control" required>
			<option value="">Pilih Semester</option>
			<?php
			$sm = $call_q("select * from semester order by idmain asc limit 100");
	  while($smm = $call_fas($sm)){
	  $th = $call_q("select * from tahun_ajaran where idtahun_ajaran='$smm[idtahun_ajaran]'");
	  $thh = $call_fas($th);
	  echo"<option value=$smm[idsemester]>$smm[semester] &nbsp; $thh[ajaran] &nbsp; $smm[ajaran]  </option>";
	  }
			?>
		  </select></td>
		  <td> <button class="btn btn-info" name="cari"><i class="fa fa-send"></i> &nbsp; G.O</button></td>
		</tr>
	  </table>   
	</form>
	
	
	  <table width="100%" border="0" align="center" bgcolor="#7DFF7D" class="table table-bordered table-striped">
		<tr align="center" class="table-primary">
		  <td width="142" height="35">Kode Mapel</td>
		  <td width="160">Judul</td>
		  <td width="160">Semester</td>
		  <td width="81">Jumlah </td>
		  <td width="150">Action</td>
		</tr>
		<?php
	   if(isset($_POST['cari'])){
	   $nama = @$sql_escape($_POST['nama']);
		$sms = @$sql_escape($_POST['sms']);
	  $sks = $call_q("$call_sel sks where idkejuruan='$nama' and idsemester='$sms'  order by judul asc limit 2000");
	  while($skss = $call_fas($sks)){
	  $sm = $call_q("$sl idsemester,idtahun_ajaran,semester FROM semester where idsemester='$skss[idsemester]'");
	$smm = $call_fas($sm);
	 $dsn = $call_q("$sl iddosen,idkejuruan,nama FROM dosen where iddosen='$skss[iddosen]'");
	$dsnn = $call_fas($dsn);
	$kj = $call_q("$sl idkejuruan,idfakultas,kejuruan FROM kejuruan where idkejuruan='$skss[idkejuruan]'");
	$kjj = $call_fas($kj);
	$kr  = $call_q("select * from kurikulum where idkurikulum='$skss[idkurikulum]'");
	$krr = $call_fas($kr);
	  
	  ?>
		
		<?php
	   if($skss['app']=="1"){
	  ?>
	  	<div id=<?php echo"$skss[idsks]"; ?>>
		<tr align="center" bgcolor="#FFFFFF">
		  <td height="50"><?php echo"<a href=#>$skss[idsks]</a><br>$kjj[kejuruan]"; ?></td>
		  <td><?php echo"<b>$krr[judul]</b><br>
		<u>Oleh &nbsp; $dsnn[nama]</u><br>$skss[idkelas]
		"; ?></td>
		  <td><?php echo"$smm[semester]<br><b><font color=blue>$skss[hari]</font><br> $skss[jam]  WIB<br>
		Ruang &nbsp; $skss[idruang]
		</b>"; ?></td>
		  <td><?php echo"$skss[jumlah]&nbsp;SKS<br>Kuota &nbsp; $skss[kuota]"; ?><br>
			<?php 
		$mhs = $call_q("select * from krs where idsks='$skss[idsks]' and app='2'");
		$jummhs = mysql_num_rows($mhs);
		?>
			<?php echo"<a href=#$skss[idsks] onClick=MM_openBrWindow('ctk_absen_harian.php?kddsn=$dsnn[iddosen]&idsks=$skss[idsks]#$skss[idsks]','','scrollbars=yes,width=800,height=800')>"; ?>
			<?php
		
		echo"Diambil &nbsp; $jummhs</a> "; ?></td>
		  <td align="left">
		 
		  <ul><li><a href=<?php echo"?pilih=vsks&sks=edit_sks&kdsks=$skss[idsks]"; ?>>Edit SKS</a></li>
		   <li><a href=<?php echo"?pilih=SKS_UPDATE_KURIKULUM&IDSKS=$skss[idsks]&IDKR=$skss[idkurikulum]"; ?>>Edit SKS Kurikulum</a></li>
			 <li> <?php
		echo"
		<a href=#$skss[idsks] onClick=MM_openBrWindow('mabsen.php?kddsn=$skss[iddosen]&idsks=$skss[idsks]#$skss[idsks]','','scrollbars=yes,width=500,height=800')>"; ?>
		  Absensi / Presensi </a></li>
			 <li><?php echo"<a href=?pilih=vsks&idsks=$skss[idsks]>"; ?>Hapus SKS</a></li><li><a href="<?php echo"#$skss[idsks]"; ?>" onClick="MM_openBrWindow('<?php echo"isoal_01.php?idsks=$skss[idsks]#$skss[idsks]"; ?>','','scrollbars=yes,width=1250,height=500')">Buat Soal</a></li>
			 <li><a href="<?php echo"#$skss[idsks]"; ?>" onClick="MM_openBrWindow('<?php echo"hasil_kuis_01.php?idsks=$skss[idsks]&idfk=$kjj[idfakultas]#$skss[idsks]"; ?>','','scrollbars=yes,width=1250,height=500')">Hasil Kuisioner</a></li></ul></td>
		</tr>
		</div>
		<?php
	  }elseif($skss['app']=="2"){
	  
	 
	  
	  ?>
		<tr align="center" bgcolor="#FFFFFF">
		  <td height="50"><?php echo"<a href=#>$skss[idsks]</a><br>$kjj[kejuruan]"; ?></td>
		  <td><?php echo"<b>$krr[judul]</b><br>
		<u>Oleh &nbsp; $dsnn[nama]</u>
		"; ?></td>
		  <td><?php echo"$smm[semester]<br><b><font color=blue>$skss[hari]</font><br> $skss[jam]  WIB <br>	Ruang &nbsp; $skss[idruang]</b>"; ?></td>
		  <td><?php echo"$skss[jumlah]"; ?></td>
		  <td><a href=<?php echo"?pilih=vsks&sks=edit_sks&kdsks=$skss[idsks]"; ?>><img src="../img/edit-32.png" width="32" height="32" border="0"></a>&nbsp;
			  <?php
		echo"
		<a href=# onClick=MM_openBrWindow('mabsen.php?kddsn=$skss[iddosen]&idsks=$skss[idsks]','','scrollbars=yes,width=500,height=800')>"; ?>
			  <img src="../img/bookmark-32.png" width="32" height="32"><img src="../img/error-32.png" width="32" height="32"></td>
		</tr>
		<?php }}} ?>
	</table>
</body>
<?php } ?>
