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
		  <td colspan="4" valign="top"><span class="style343"><img src="http://sikadu.unwahas.ac.id/img/search2.png" width="44" height="50">Cari PerProdi
			<a href="?aka=icari2" class="btn btn-default">Per / NIM</a>
			  <hr color="#F27900">
		  </span>
		  <div class="alert alert-dismissible alert-info">
          	<b>#Cari Kartu  sesuai progdi masing masing jurusan</b>
	
			</div>
		  *(Masukan Kode Mahasiwa yang sudah terdaftar</td>
		</tr>
		<tr>
		  <td width="250" valign="top">
          <select required name="cari" class="form-control form-control-sm" required>
			<option value="">kode Program Studi</option>
			<?php
			 $fak = mysql_query("select  idkejuruan,idfakultas,kejuruan from kejuruan order by idkejuruan");
			 while($fakk = mysql_fetch_array($fak)){
			 
			 echo"
			 <option value=$fakk[idkejuruan]>$fakk[idkejuruan]&nbsp; / &nbsp;$fakk[kejuruan]&nbsp;$fakk[progdi]</option>";
			 }
			 
			 ?>
		  </select></td>
		  <td width="148" valign="top"><select name="ang" required  id="ang" class="form-control form-control-sm" required>
			<option value="">Tahun</option>
			<?php
			 $aj = mysql_query("select * from tahun_ajaran order by ajaran asc limit 200");
			 while($ajj = mysql_fetch_array($aj)){
			 
			 echo"
			 <option value=$ajj[idtahun_ajaran]>$ajj[ajaran]</option>";
			 }
			 
			 ?>
		  </select></td>
		  <td width="148" valign="top">
		  <select name="sms" id="sms" class="form-control form-control-sm"  required>
			<option value="">semester</option>
			<?php
			$sm = mysql_query("select idsemester,idtahun_ajaran,semester from semester order by idmain asc limit 100");
	  while($smm = mysql_fetch_array($sm)){
	  $th = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$smm[idtahun_ajaran]'");
	  $thh = mysql_fetch_array($th);
	  echo"<option value=$smm[idsemester]>$smm[semester] &nbsp; $thh[ajaran] &nbsp; $smm[ajaran]  </option>";
	  }
			?>
		  </select></td>
		  <td width="210" valign="top">
		   <button class="btn btn-success" name="cari_data"><i class="fa fa-send"></i>&nbsp;Cari Data</button>
		  </td>
		</tr>
	  </table>
	  <div align="center">  </div>
	</form><br>
	<?php
	 if(isset($_POST['cari_data'])){
	 $nama = mysql_real_escape_string($_POST['cari']);
	$ang = mysql_real_escape_string($_POST['ang']);
	$semes = @$_POST['sms'];
	 ?>
	<div class="container">
	<a href="#" class="btn btn-primary"  onClick="MM_openBrWindow('../../SU_admin/icari4_pagging.php?<?php echo"nama=$nama&ang=$ang&semes=$semes"; ?>','','scrollbars=yes,width=900,height=900')">Pagging Overview</a>
	<table width="92%" align="center" class="table table-bordered table-sm table-striped">
	  <tr align="center" class="table-info">
		<td width="32" height="36" valign="middle">#</td>
		<td width="232" valign="middle">NIM</td>
		<td width="109" valign="middle">Progdi</td>
		<td width="125" valign="middle">Semester</td>
		<td width="338" valign="middle">Nama</td>
		<td width="35" valign="middle">UAS</td>
		<td width="31" valign="middle">UTS</td>
		<td width="32" valign="middle">KRS</td>
		<td width="33" valign="middle">KHS</td>
		<td width="87" valign="middle">TRANSKRIP</td>
		<td width="54" valign="middle">IND</td>
		<td width="51" valign="middle">ENG</td>
	  </tr>
	  
	  
		<?php 
	 
	
	//$mhs = mysql_query("select * from mahasiswa WHERE idkejuruan='$nama' and idtahun_ajaran='$ang' and mhs='2' or mhs='3' "); filter mhs by aktif
	$mhs = mysql_query("select * from mahasiswa WHERE idkejuruan='$nama' and idtahun_ajaran='$ang' ");
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
	
	  ?>
	  <tr align="center" valign="top" bordercolor="#CEE7FF" bgcolor="#FFFFFF">
		<td width="32"><?php echo"$no"; ?></td>
		
		<td width="232" height="36"><?php echo"<font color=blue><b>$mhss[idmahasiswa]</font></b><br><b>$mhss[idkelas]</b>"; ?>
		<br>
		Status &nbsp;
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
		  echo"<b><font color=red>TRANSFER</font></b>";
		  }
		  
		   ?>
		</td>
		<td width="109"><?php echo"$kjj[kejuruan]"; ?></td>
		<td width="125"><?php echo"<b>$smm[semester]</b>"; ?></td>
		<td width="338"><?php echo"$mhss[nama]"; ?></td>
		<td width="35"><a href="#"  onClick="MM_openBrWindow('../PUBLIC_PRINT/ctk_kartu_ujian.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="http://sikadu.unwahas.ac.id/img/bill%20of%20document.png" width="30" height="30" border="0" title="Cetak Kartu Ujian Ahir" ></a></td>
		<td width="31"><a href="#"  onClick="MM_openBrWindow('../PUBLIC_PRINT/AKA/ctk_kartu_ujian_uts.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="http://sikadu.unwahas.ac.id/img/bill%20of%20document.png" width="30" height="30" border="0" title="Cetak Kartu Ujian Ahir" ></a></td>
		<td width="32"><a href="#"  onClick="MM_openBrWindow('../PUBLIC_PRINT/ctk_krs_mhs.php?<?php echo"kdmhs=$mhss[idmahasiswa]&idsm=$semes"; ?>','','scrollbars=yes,width=900,height=900')"><img src="http://sikadu.unwahas.ac.id/img/bill%20of%20document.png" width="30" height="30" border="0" title="Cetak Kartu Ujian Ahir" ></a></td>
		<td width="33"><a href="#"  onClick="MM_openBrWindow('../SU_admin/m2_mhs.php?<?php echo"mng=v_ikhs&kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="http://sikadu.unwahas.ac.id/img/bill%20of%20document.png" width="30" height="30" border="0" title="Cetak Kartu Ujian Ahir" ></a></td>
		<td width="87"><a href="#"  onClick="MM_openBrWindow('../PUBLIC_PRINT/ctk_tran_sks_try.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="http://sikadu.unwahas.ac.id/img/reg.png" width="30" height="30" border="0" title="Cetak Kartu Ujian Ahir" ></a></td>
		 <td width="54"><a href="#"  onClick="MM_openBrWindow('../PUBLIC_PRINT/ctk_tran_sks_try_indo.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="http://sikadu.unwahas.ac.id/img/ind.png" width="30" height="30" border="0" title="Cetak Kartu Ujian Ahir" ></a></td>
	  <td width="51"><a href="#"  onClick="MM_openBrWindow('../PUBLIC_PRINT/ctk_tran_sks_try_eng.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="http://sikadu.unwahas.ac.id/img/eng.png" width="30" height="30" border="0" title="Cetak Kartu Ujian Ahir" ></a></td>
	  </tr>
		
	
	
	
	<?php
	$no++;
	}
	
	
	?>
	</table>
	<?php
	}
	?>
	</div>
	<?php
	
	?>
	
	
	
	</body>
	</html>
	<?php
	}
	?>