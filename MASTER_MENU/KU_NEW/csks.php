	<?php //session_start();
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
			//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
			header('location:index.php');
		} else {
		//$u = $call_q("select * from user where namauser='$_SESSION[namauser]'");
		//$uu = $call_fas($u);
		
	 ?>
	   <?php if($uu['akses']==11){ ?>
	<script language="JavaScript" type="text/JavaScript">
	<!--
	function MM_openBrWindow(theURL,winName,features) { //v2.0
	  window.open(theURL,winName,features);
	}
	//-->
	</script>
	<script type="text/javascript" language="JavaScript">
	 function konfirmasi()
	 {
	 tanya = confirm("Anda Yakin Akan Menghapus SKS ?");
	 if (tanya == true) return true;
	 else return false;
	 }</script>
	<body>
	 <?php
	  $idsks = @trim($sql_escape($_GET['idsks']));
	  if(isset($_GET['idsks'])){
	  $call_q("delete from sks where idsks='$idsks'");
	   echo "<script language='javascript'>alert('SKS  Berhasil di hapus')</script>";
		echo "<script language='javascript'>window.location = '?aka=vsks'</script>";
		exit();
		}
	  ?>
      <h5>#Pencarian SKS /FAKULTAS</h5>
	<form name="form1" method="post" action="">
	  <table width="600" border="0" class="table table-sm" style="max-width:40rem;">
		<tr>
		  <td><select name="cari" style="max-width:15rem;" class="form-control form-control-sm" required>
			<option value="">kode Program Studi</option>
			<?php
			 $fak = $call_q("select * from kejuruan where idfakultas='$fakk02[idfakultas]' order by idkejuruan");
			 while($fakk = $call_fas($fak)){
			 
			 echo"
			 <option value=$fakk[idkejuruan]>$fakk[idkejuruan]&nbsp; / &nbsp;$fakk[kejuruan]&nbsp;$fakk[progdi]</option>";
			 }
			 
			 ?>
		  </select></td>
		  <td><select name="sms" id="sms" style="max-width:15rem;" class="form-control form-control-sm" required>
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
		  <td><button class="btn btn-info" name="cari_data"><i class="fa fa-send"></i>&nbsp;Cari Data</button></td>
		</tr>
	  </table>
	</form>
	<h3>&nbsp;</h3>
	<hr color="#FF8040">
		<?php
	  $idsks = @trim($sql_escape($_GET['idsks']));
	  if(isset($_GET['idsks'])){
	  $call_q("delete from sks where idsks='$idsks'");
	   echo "<script language='javascript'>alert('SKS  Berhasil di hapus')</script>";
		echo "<script language='javascript'>window.location = '?pilih=csks'</script>";
		exit();
		}
	  ?>
	<table width="100%" border="0" align="center" class="table table-bordered table-sm table-striped">
	  <tr align="center" class="table-info>
		<td width="142" height="35">Kode Mapel</td>
		<td width="175">Judul</td>
		<td width="165">Semester</td>
		<td width="54">Jumlah </td>
		<td width="157">Action</td>
	  </tr>
	  <?php
	  if(isset($_POST['cari_data'])){
	  $car = @trim($sql_escape($_POST['cari']));
	   $sms =@trim($sql_escape($_POST['sms']));
	  $sks = $call_q("$call_sel  sks where  idkejuruan='$car' and idsemester='$sms' order by judul asc limit 2000");
	  while($skss = $call_fas($sks)){
	  $sm = $call_q("$sl idsemester,idtahun_ajaran,semester from semester where idsemester='$skss[idsemester]'");
	$smm = $call_fas($sm);
	 $dsn = $call_q("select iddosen,idkejuruan,nama from dosen where iddosen='$skss[iddosen]'");
	$dsnn = $call_fas($dsn);
	$kj = $call_q("select idkejuruan,idfakultas,kejuruan from kejuruan where idkejuruan='$skss[idkejuruan]'");
	$kjj = $call_fas($kj);
	 $kr = $call_q("select idmain,idkurikulum,idsemester,idkejuruan,judul,juduleng from kurikulum where idkurikulum='$skss[idkurikulum]'");
	 $krr = $call_fas($kr);
	  
	  ?>
	
	  <tr align="center" bgcolor="#FFFFFF">
		<td height="50"><?php echo"<a href=#>$skss[idsks]</a><br>$kjj[kejuruan]"; ?></td>
		<td><?php echo"<b>$krr[judul]</b><br><b>$krr[juduleng]</b><br>
		<u>Oleh &nbsp; $dsnn[nama]</u><br>$skss[idkelas]
		"; ?></td>
		<td><?php echo"$smm[semester]<br><b><font color=blue>$skss[hari]</font><br> $skss[jam]  WIB<br>Ruang &nbsp; $skss[idruang]</b>"; ?></td>
		<td><?php echo"$skss[jumlah]&nbsp;SKS<br>Kuota &nbsp; $skss[kuota]"; ?><br>
		  <?php 
		$mhs = $call_q("select * from krs where idsks='$skss[idsks]' and app='2'");
		$jummhs = mysql_num_rows($mhs);
		?>
		  <?php echo"<a href=# onClick=MM_openBrWindow('../SU_admin/ctk_absen_harian.php?kddsn=$dsnn[iddosen]&idsks=$skss[idsks]','','scrollbars=yes,width=800,height=800')>"; ?>
		  <?php
		
		echo"Diambil &nbsp; $jummhs</a> "; ?></td>
		<td align="left"> <ul><li><a href=<?php echo"?ku=vsks&sks=edit_sks&kdsks=$skss[idsks]"; ?>>Edit SKS</a></li>
			 <li> <?php
		echo"
		<a href=#$skss[idsks] onClick=MM_openBrWindow('../SU_admin/mabsen.php?kddsn=$skss[iddosen]&idsks=$skss[idsks]#$skss[idsks]','','scrollbars=yes,width=500,height=800')>"; ?>
		  Absensi / Presensi </a></li>
		<li> <a href="<?php echo"?ku=vsks&idsks=$skss[idsks]"; ?>" onclick="return konfirmasi()">Hapus SKS</a></li><li><a href="<?php echo"#$skss[idsks]"; ?>" onClick="MM_openBrWindow('<?php echo"isoal_01.php?idsks=$skss[idsks]#$skss[idsks]"; ?>','','scrollbars=yes,width=320,height=500')">Buat Soal</a></li><li><a href="<?php echo"#$skss[idsks]"; ?>" onClick="MM_openBrWindow('<?php echo"../SU_admin/inilai_krs.php?idsks=$skss[idsks]&kddsn=$skss[iddosen]"; ?>','','scrollbars=yes,width=700,height=700')">Input NIlai</a></li></ul>	</td>
	  </tr>
	<?PHP }} ?>
	</table>
    
    </body>
	<?php
	}else{
	
	echo"<h1><center>MAAF AKSES TIDAK DI IJINKAN<br><a href=index.php>klik untuk kembali</a></center></h1>";
	
	}
	?>
	<?php } ?>