	<?php 
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
			//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
			header('location:index.php');
		} else {
	 ?>
	  <?php if($uu['akses']==11){ ?>

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
	  <table width="784" align="center" class="table table-sm">
		<tr>
		  <td colspan="4" valign="top"><span class="style343"><img src="../../img/search2.png" width="44" height="50">Cari PerProdi[IPK] <a href="?ku=icari_ipk_nim" class="btn btn-default">Per / NIM</a>
				<hr color="#F27900">
			
			  *(Masukan Kode Mahasiwa yang sudah terdaftar</td>
		</tr>
		<tr>
		  <td width="250" valign="top">
		  <select name="cari" class="form-control" required>
			  <option value="">kode Program Studi</option>
			  <?php
			 $fak = $call_q("select idkejuruan,idfakultas,kejuruan from kejuruan where idfakultas='$uu[idfakultas]' order by idkejuruan");
			 while($fakk = $call_fas($fak)){
			 
			 echo"
			 <option value=$fakk[idkejuruan]>$fakk[idkejuruan]&nbsp; / &nbsp;$fakk[kejuruan]&nbsp;$fakk[progdi]</option>";
			 }
			 
			 ?>
		  </select></td>
		  <td width="148" valign="top"><select name="ang" id="ang" class="form-control" required>
			  <option value="">Tahun.</option>
			  <?php
			 $aj = $call_q("select * from tahun_ajaran order by ajaran asc limit 200");
			 while($ajj = $call_fas($aj)){
			 
			 echo"
			 <option value=$ajj[idtahun_ajaran]>$ajj[ajaran]</option>";
			 }
			 
			 ?>
		  </select></td>
		  <td width="148" valign="top">
		  <select name="sms" id="sms" class="form-control" required>
			  <option value="">semester</option>
			  <?php
			$sm = $call_q("select idsemester,idtahun_ajaran,semester from semester order by idmain asc limit 100");
	  while($smm = $call_fas($sm)){
	  $th = $call_q("select * from tahun_ajaran where idtahun_ajaran='$smm[idtahun_ajaran]'");
	  $thh = $call_fas($th);
	  echo"<option value=$smm[idsemester]>$smm[semester] &nbsp; $thh[ajaran] &nbsp; $smm[ajaran]  </option>";
	  }
			?>
		  </select></td>
		  <td width="210" valign="top"><button class="btn btn-info btn-sm" name="cari_data"><i class="fa fa-send"></i>&nbsp;Cari Data</button></td>
		</tr>
	  </table>
	  <div align="center">  </div>
	</form><br>
	<div class="container">
	<table width="100%" align="center" class="table table-bordered table-striped table-sm">
	  <tr align="center" valign="top" class="table-info">
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
		 $nama = @trim($sql_escape($_POST['cari']));
		$ang = @trim($sql_escape($_POST['ang']));
		$semes = @$_POST['sms'];
		$mhs = $call_q("$sl idmahasiswa,idkejuruan,idgelombang,idkelas,idsemester,iddosen,nama,st,krs,idtahun_ajaran,mhs FROM mahasiswa WHERE idkejuruan='$nama' and idtahun_ajaran='$ang' and mhs='2' ");
			$no = 1;
		while($mhss = $call_fas($mhs)){
	
		$kj = $call_q("$sl idkejuruan,idfakultas,kejuruan FROM kejuruan where idkejuruan='$mhss[idkejuruan]'");
		$kjj = $call_fas($kj);
		$gel = $call_q("select * from gelombang where idgelombang='$mhss[idgelombang]'");
		$gell = $call_fas($gel);
		$sm = $call_q("$sl idsemester,idtahun_ajaran,semester  FROM semester where idsemester='$semes'");
		$smm = $call_fas($sm);
		$us = $call_q("select iduser_mhs,idmahasiswa,username,passuser FROM user_mhs where idmahasiswa='$mhss[idmahasiswa]'");
		$uss = $call_fas($us);
		$rsem = $call_q("select * from rekamsemester where idmahasiswa='$mhss[idmahasiswa]' and idsemester='$smm[idsemester]'");
		$rsemm = $call_fas($rsem);
	
	  ?>
	  <tr align="center" valign="top">
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
				$jum_sks = $call_q(" select sum(jumlah) as j_sks from krs where idsemester='$semes' and idmahasiswa='$mhss[idmahasiswa]' and app='2'");
				$jum_skss = $call_fas($jum_sks);
					echo"$jum_skss[j_sks]";
		?>
		
		</td>
		<td width="76">
		<?php 
				$jum_sks2 = @$call_q(" select sum(jumlah) as j_sks2 from krs where  idmahasiswa='$mhss[idmahasiswa]' and app2='2' and app='2' ");
				$jum_skss2 = @$call_fas($jum_sks2);
					echo"$jum_skss2[j_sks2]";
		?>
		</td>
		<td width="60"><?php echo"$rsemm[ip]"; ?></td>
		<td width="98">
		<?php   $k3 = @$call_q("select sum(total2) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and app2='2'    ");
				$kk3 = $call_fas($k3);  ?>
		<?php 
			@$bg = $kk3['kr'] / $jum_skss2['j_sks2'];
			$pembg = @number_format($bg,2);
				echo"$pembg"; 
				
		  ?>
		</td>
	  </tr>
		
	
	
	
		<?php
			$no++;}}
	
		?>
	</table>
	</div>
	</body>
	</html>
	<?php
	}else{
	
	echo"<h1><center>MAAF AKSES TIDAK DI IJINKAN<br><a href=index.php>klik untuk kembali</a></center></h1>";
	
	}
	?>
	<?php
	}
	?>