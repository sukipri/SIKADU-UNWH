	<?php //session_start();
	 include_once"../sc/conek.php";
	
		
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
			//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
			header('location:index.php');
		} else {
	 ?>
	 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
	<html>
	<head>
	<title>Untitled Document</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
	  <table width="624" align="center">
		<tr>
		  <td width="616" colspan="2" valign="top">
<a href="?aka=vtranskrip"><i class="fa fa-clone"></i>&nbsp;Cetak Transkrip Mahasiswa</a> / <a href="?aka=CARI_PERIODE_CETAK"><i class="fa fa-clone"></i>&nbsp;Cetak Periode Wisuda</a>
		  </td>
		</tr>
		<tr>
		  <td valign="top"><input name="cari" type="text" class="form-control" placeholder="Masukan NIM.." id="cari" size="37" required>      </td>
		  <td valign="top"><button class="btn btn-info" name="cari_data"><i class="fa fa-send"></i>&nbsp;Cari Data</button></td>
		</tr>
	  </table>
	  <div align="center">  </div>
	</form><br>
	<div class="container">
	<table width="91%" align="center" bgcolor="#FF7735" class="table table-bordered">
	  <tr align="center" valign="top" bgcolor="#FFA477">
		<td width="22" height="36" valign="middle">#</td>
		<td width="109" valign="middle">NIM</td>
		<td width="66" valign="middle">Progdi</td>
		<td width="81" valign="middle">Semester</td>
		<td width="213" valign="middle">Nama</td>
		<td width="34" valign="middle">EDIT</td>
		<td width="30" valign="middle">REG</td>
		<td width="30" valign="middle">FK</td>
		<td width="30" valign="middle">FK-E</td>
		<td width="30" valign="middle">APT</td>
		<td width="39" valign="middle">FM-I</td>
		<td width="45" valign="middle">FM-E</td>
		<?php /* ilang
		<td width="30" valign="middle">PAI</td>
		<td width="31" valign="middle">FT</td>
		<td width="59" valign="middle">FE/FISIP</td>
		<td width="37" valign="middle">PJKR/FH</td>
		<td width="34" valign="middle">FAPERTA</td> */?>
		<td width="34" valign="middle">PASCA</td>
		<td width="34" valign="middle">KODE</td>
		<td width="34" valign="middle">SEMUA</td>
	  </tr>
	  
	  
		<?php 
		if(isset($_POST['cari_data'])){
		$nama = mysql_real_escape_string(trim($_POST['cari']));
		$mhs = mysql_query("select * from mahasiswa WHERE idmahasiswa LIKE '%$nama%' ");
		$no = 1;
		while($mhss = mysql_fetch_array($mhs)){
	
		$kj = mysql_query("select  idkejuruan,idfakultas,kejuruan FROM kejuruan where idkejuruan='$mhss[idkejuruan]'");
		$kjj = mysql_fetch_array($kj);
		$gel = mysql_query("select * from gelombang where idgelombang='$mhss[idgelombang]'");
		$gell = mysql_fetch_array($gel);
		$sm = mysql_query("select idsemester,idtahun_ajaran,semester  FROM semester where idsemester='$mhss[idsemester]'");
		$smm = mysql_fetch_array($sm);
		$us = mysql_query("select iduser_mhs,idmahasiswa,username,passuser FROM user_mhs where idmahasiswa='$mhss[idmahasiswa]'");
		$uss = mysql_fetch_array($us);
		$rsem = mysql_query("select * from rekamsemester where idmahasiswa='$mhss[idmahasiswa]' and idsemester='$mhss[idsemester]'");
		$rsemm = mysql_fetch_array($rsem);
		?>
	  <tr align="center" valign="top" bordercolor="#CEE7FF" bgcolor="#FFFFFF">
		<td width="22"><?php echo"$no"; ?></td>
		
		<td width="109" height="32"><?php echo"<font color=blue><b>$mhss[idmahasiswa]</b></font><br><font color=green><b>$uss[passuser]</b><br><b>$mhss[idkelas]</b>"; ?></td>
		<td width="66"><?php echo"$kjj[kejuruan]"; ?></td>
		<td width="81"><?php echo"<b>$smm[semester]</b>"; ?></td>
		<td width="213"><?php echo"$mhss[nama]"; ?></td>
		<td width="34"><a href="#"  onClick="MM_openBrWindow('mng_tran_sks.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="http://sikadu.unwahas.ac.id/img/reg.png" width="30" height="30" border="0" title="Transkrip Reguler" ></a></td>
	
		<td width="30"><a href="#"  onClick="MM_openBrWindow('ctk_tran_sks_try.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="http://sikadu.unwahas.ac.id/img/reg.png" width="30" height="30" border="0" title="Transkrip Reguler" ></a></td>
		<td width="30"><a href="#"  onClick="MM_openBrWindow('ctk_tran_sks_try_dokter.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="http://sikadu.unwahas.ac.id/img/reg.png" width="30" height="30" border="0" title="Transkrip FK" ></a></td>
		<td width="30"><a href="#"  onClick="MM_openBrWindow('ctk_tran_sks_try_dokter_eng.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="http://sikadu.unwahas.ac.id/img/reg.png" width="30" height="30" border="0" title="Transkrip FK-eng" ></a></td>
		<td width="30"><a href="#"  onClick="MM_openBrWindow('ctk_tran_sks_try_farm.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="http://sikadu.unwahas.ac.id/img/farm.png" width="30" height="30" border="0" title="Transkrip Apoteker" ></a></td>
		 <td width="39"><a href="#"  onClick="MM_openBrWindow('ctk_tran_sks_try_farm-indo.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="http://sikadu.unwahas.ac.id/img/ind.png" width="28" height="26" border="0" title="Transkrip Farmasy Indonesia" ></a></td>
	  <td width="45"><a href="#"  onClick="MM_openBrWindow('ctk_tran_sks_try_farm-eng.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="http://sikadu.unwahas.ac.id/img/eng.png" width="34" height="26" border="0" title="Transkrip Farmasy English" ></a></td>
	  <?php /* ilang
	  <td width="30"><a href="#"  onClick="MM_openBrWindow('ctk_tran_sks_try_pdf.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="http://sikadu.unwahas.ac.id/img/pdf.jpg" width="30" height="30" border="0" title="Transkrip PAI" ></a></td>
	   <td width="31"><a href="#"  onClick="MM_openBrWindow('ctk_tran_sks_try_ft.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="http://sikadu.unwahas.ac.id/img/pdf.jpg" width="30" height="30" border="0" title="Transkrip FT" ></a></td> 
	   <td width="59" align="center"><a href="#"  onClick="MM_openBrWindow('ctk_tran_sks_try_fe.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="http://sikadu.unwahas.ac.id/img/pdf.jpg" width="30" height="30" border="0" title="Transkrip FE" ></a></td>
	   <td width="37" align="center"><a href="#"  onClick="MM_openBrWindow('ctk_tran_sks_try_pjkr.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="http://sikadu.unwahas.ac.id/img/pdf.jpg" width="30" height="30" border="0" title="Transkrip PJKR/Hukum" ></a></td>
	   <td width="34" align="center"><a href="#"  onClick="MM_openBrWindow('ctk_tran_sks_try_pertanian.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="http://sikadu.unwahas.ac.id/img/pdf.jpg" width="30" height="30" border="0" title="Transkrip PERTANIAN" ></a></td> */?>
		<td width="34" align="center"><a href="#"  onClick="MM_openBrWindow('ctk_tran_sks_try_pasca.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="http://sikadu.unwahas.ac.id/img/pdf.jpg" width="30" height="30" border="0" title="Transkrip Pasca" ></a></td>
		<td width="34" align="center"><a href="#"  onClick="MM_openBrWindow('ctk_tran_sks_try_code.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="http://sikadu.unwahas.ac.id/img/pdf.jpg" width="30" height="30" border="0" title="Transkrip code" ></a></td>
		<td width="34" align="center"><a href="#"  onClick="MM_openBrWindow('kabeh.php?<?php echo"kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=900,height=900')"><img src="http://sikadu.unwahas.ac.id/img/pdf.jpg" width="30" height="30" border="0" title="Semua Progdi" ></a></td>
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