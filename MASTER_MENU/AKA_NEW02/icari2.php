	<?php //session_start();
	 include_once"../../sc/conek.php";
	
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
			//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
			header('location:index.php');
		} else {
	 ?>
	<style type="text/css">
	<!--
	
	-->
	</style>

	</head>
	
	<body>
	<form name="form1" method="post" action="">
	  <table width="624" align="center">
		<tr>
		  <td width="616" colspan="2" valign="top">
		  <span class="style343"><img src="http://sikadu.unwahas.ac.id/img/search2.png" width="44" height="50">Pencarian Mahsiswa /<a href="?aka=icari4">Cari PerProdi
		  </a>        <hr color="#F27900">
		  </span>
		  <div class="alert alert-dismissible alert-info">
			<b>#Cetak kartu</b>
            </div>
		  *(Masukan Kode Mahasiwa yang sudah terdaftar</td>
		</tr>
		<tr>
		  <td valign="top"><input name="cari" type="text" class="form-control" id="cari" size="37" autocomplete="off" required>      </td>
		  <td valign="top"><button class="btn btn-info" name="cari_data"><i class="fa fa-send"></i>&nbsp;Cari Data</button></td>
		</tr>
	  </table>
	  <div align="center">  </div>
	</form><br>
	<div class="container">
	<table width="91%" align="center" class="table table-bordered table-sm table-striped">
	  <tr align="center" valign="top" class="table-info">
		<td width="28" height="36" valign="middle">#</td>
		<td width="185" valign="middle">NIM</td>
		<td width="92" valign="middle">Progdi</td>
		<td width="107" valign="middle">Semester</td>
		<td width="384" valign="middle">Nama</td>
		<td width="44" valign="middle">UAS</td>
		<td width="49" valign="middle">UTS</td>
		<td width="48" valign="middle">KRS</td>
		<td width="46" valign="middle">KHS</td>
		
		<td width="48" valign="middle">REG</td>
		<td width="34" valign="middle">FMC</td>
		<td width="34" valign="middle">IND</td>
		<td width="32" valign="middle">ENG</td>
	  </tr>
	  
	  
		<?php 
		if(isset($_POST['cari_data'])){
		$nama = mysql_real_escape_string($_POST['cari']);
		$mhs = mysql_query("select * from mahasiswa WHERE idmahasiswa LIKE '%$nama%' OR nama LIKE '%$nama%' ");
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
	  <tr align="center" valign="top">
		<td width="28"><?php echo"$no"; ?></td>
		
		<td width="185" height="36"><?php echo"<font color=blue><b>$mhss[idmahasiswa]</b></font><br><font color=green><b>$uss[passuser]</b><br><b>$mhss[idkelas]</b>"; ?></td>
		<td width="92"><?php echo"$kjj[kejuruan]"; ?></td>
		<td width="107"><?php echo"<b>$smm[semester]</b>"; ?></td>
		<td width="384"><?php echo"$mhss[nama]"; ?></td>
		<td width="44"><a href="#"  onClick="MM_openBrWindow('../PUBLIC_PRINT/ctk_kartu_ujian.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="http://sikadu.unwahas.ac.id/img/bill%20of%20document.png" width="30" height="30" border="0" title="Cetak Kartu Ujian Ahir" ></a></td>
		<td width="49"><a href="#"  onClick="MM_openBrWindow('../PUBLIC_PRINT/ctk_kartu_ujian_uts.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="http://sikadu.unwahas.ac.id/img/bill%20of%20document.png" width="30" height="30" border="0" title="Cetak Kartu Ujian Ahir" ></a></td>
		<td width="48"><a href="#"  onClick="MM_openBrWindow('../PUBLIC_PRINT/ctk_krs_mhs.php?<?php echo"kdmhs=$mhss[idmahasiswa]&idsm=$mhss[idsemester]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="http://sikadu.unwahas.ac.id/img/bill%20of%20document.png" width="30" height="30" border="0" title="Cetak Kartu Ujian Ahir" ></a></td>
		<td width="46"><a href="#"  onClick="MM_openBrWindow('../../SU_admin/m2_mhs.php?<?php echo"mng=v_ikhs&kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="http://sikadu.unwahas.ac.id/img/bill%20of%20document.png" width="30" height="30" border="0" title="Cetak Kartu Ujian Ahir" ></a></td>
		<td width="48"><a href="#"  onClick="MM_openBrWindow('../PUBLIC_PRINT/ctk_tran_sks_try.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="http://sikadu.unwahas.ac.id/img/reg.png" width="30" height="30" border="0" title="Transkrip Reguler" ></a></td>
		<td width="34"><a href="#"  onClick="MM_openBrWindow('../PUBLIC_PRINT/ctk_tran_sks_try_farm.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="http://sikadu.unwahas.ac.id/img/farm.png" width="30" height="30" border="0" title="Transkrip Farmacy" ></a></td>
		 <td width="34"><a href="#"  onClick="MM_openBrWindow('../PUBLIC_PRINT/ctk_tran_sks_try_indo.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="http://sikadu.unwahas.ac.id/img/ind.png" width="30" height="30" border="0" title="Transkrip Indonesia" ></a></td>
	  <td width="32"><a href="#"  onClick="MM_openBrWindow('../PUBLIC_PRINT/ctk_tran_sks_try_eng.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="http://sikadu.unwahas.ac.id/img/eng.png" width="30" height="30" border="0" title="Transkrip English" ></a></td>
		<td width="5"></td>
	  </tr>
		
	
	
	
	<?php
	$no++;
	}
	}
	
	?>
	</table>
	</div>
	<?php
	
	?>
	
	
	
	</body>
	</html>
	<?php
	}
	?>