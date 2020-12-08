	<?php //session_start();
	include_once"../sc/conek.php";
	
		
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
			//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
			header('location:index.php');
		} else {
		//$u = mysql_query("select * from akademik where namauser='$_SESSION[namauser]'");
		//$uu = mysql_fetch_array($u);
		//$aka = mysql_query("select * from akademik where idakademik='$uu[idakademik]'");
		//$akaa = mysql_fetch_array($aka);
		//$kdmhs = $kuu['idku'];
		//$kdmhs = $kuu['idku'];
	 ?>
	 <?php
	
	if($uu['akses']==2){
	
	
	?>
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
	<html>
	<head>
	<title>Untitled Document</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	</head>
	
	<body>
	<div style="overflow:auto;width:auto;height:360px;padding:10px;border:1px solid #eee">
	<table height="351"  border="0" class="table table-bordered">
	  <tr>
		<td width="24%" height="76" align="center" class="wow"><a href="?aka=vprofil_dosen" class="btn btn-primary"><img src="../img/address-book-32.png" width="32" height="32" border="0"><br>
		 Jadwal Makul & mng dosen </a><br></td>
		<td width="18%" align="center" class="wow"><a href="?aka=i_profil_mahasiswa" class="btn btn-success"><img src="../img/add-folder-32.png" width="32" height="32" border="0"><br>
	Input Data Mahasiswa</a></td>
		<td width="20%" align="center" class="wow"><a href="?aka=icari2" class="btn btn-primary"><img src="../img/page.png" width="32" height="32" border="0"><br>
	Cetak Kartu UTS,UAS,KRS,KHS</a><br></td>
		<td width="23%" align="center" class="wow"><a href="?aka=icari" class="btn btn-success"><img src="../img/usb-32.png" width="32" height="32" border="0"><br>
	MANAGEMENT MAHASISWA</a><br></td>
		<td width="23%" align="center" class="wow"><a href="?aka=ikurikulum" class="btn btn-primary"><img src="../img/add-32.png" width="32" height="32" border="0"><br>
	MANAGEMENT KURIKULUM </a></td>
	  </tr>
	  <tr>
		<td height="67" align="center" class="wow"><a href="?aka=ikonversi" class="btn btn-success"><img src="../img/save-32.png" width="23" height="25" border="0"><br>
		Konversi Mahasiswa </a><br></td>
		<td align="center" class="wow"><a href="?aka=presensi" class="btn btn-primary"><img src="../img/bookmark-32.png" width="32" height="32" border="0"><br>
	Cetak Presensi & Nilai</a></td>
		<td align="center" class="wow"><a href="?aka=menu_batas_nilai" class="btn btn-success"><img src="../img/unlock-32.png" width="32" height="32" border="0"><br>
		ON / OFF NILAI <br> 
		</a></td>
		<td align="center" class="wow"><a href="?aka=mkuis" class="btn btn-primary disable"><img src="../img/comments-32.png" width="32" height="32" border="0"><br>
		MENU KUIS</a></td>
		<td align="center" class="wow"><a href="?aka=##g_active##" class="btn btn-success"><img src="../img/bill%20of%20document.png" width="32" height="32" border="0"><br>
	Data Aktivasi</a></td>
	  </tr>
	  <tr>
		<td height="68" align="center" class="wow"><a href="?aka=belumkrs" class="btn btn-primary"><img src="../img/export-32.png" width="32" height="32" border="0"><br>
	Statistik & Rekap Mahasiswa</a></td>
		<td align="center" class="wow"><a href="?aka=idosen" class="btn btn-success"><img src="../img/shield-on-32.png" width="32" height="32" border="0"><br>
	INPUT DOSEN</a></td>
		<td align="center" class="wow"><a href="?aka=iudosen" class="btn btn-primary"><img src="../img/user-32.png" width="32" height="32" border="0"><br>
	User dosen</a></td>
		<td align="center" class="wow"><a href="?aka=imahasiswa" class="btn btn-success"><img src="../img/user-32.png" width="32" height="32" border="0"><br>
	User Mahasiswa</a></td>
		<td align="center" class="wow"><a href="?aka=sroom" class="btn btn-primary"><img src="../img/bulb-on-32.png" width="32" height="32" border="0"><br>
		Smart Room </a></td>
	  </tr>
	  <tr>
		<td height="64" align="center" class="wow"><a href="?aka=vsks_kuis" class="btn btn-success"><img src="../img/help-32.png" width="32" height="32" border="0"><br>
		  Hasil Kuisioner</a></td>
		<td align="center" class="wow"><a href="?aka=vbiaya_global" class="btn btn-primary"><img src="../img/wallet-32.png" width="32" height="32" border="0"><br>
		  Biaya Mahasiswa Global</a></td>
		 <td align="center" class="wow"><a href="?aka=vtranskrip" class="btn btn-primary"><img src="../img/nilai.jpg" width="32" height="32" border="0"><br>
		  Cetak Transkrip </a></td>
		 <td align="center" class="wow"><a href="?aka=icari_krs" class="btn btn-success"><img src="../img/clipboard-32.png" width="32" height="32" border="0"><br>
		  Input KRS</a></td>
		<td align="center" class="wow"><a href="?aka=iwisuda" class="btn btn-success"><img src="http://sikadu.unwahas.ac.id/img/wisud.jpg" width="32" height="32" border="0"><br>
		  Wisuda</a></td>
	  </tr>
	  <tr>
	    <td width="135"  align="center" valign="top"><a href="?aka=icari_ipk_progdi" class="btn btn-success"><img src="../img/documents_32.png" width="32" height="32" border="0"><br> 
        Management <br>Daftar  IPK</a><br>*(Daftar IPK</td>

	    <td align="center" class="wow"><br><a href="../MASTER_MENU/AKA_NEW/" class="btn btn-info btn-lg">AKADEMIK V.1.2</a></td>
	    <td align="center" class="wow">&nbsp;</td>
	    <td align="center" class="wow">&nbsp;</td>
	    <td align="center" class="wow">&nbsp;</td>
      </tr>
	</table>
	</div>
	</body>
	</html>
	<?php
	}else{
	
	echo"<h1><center>MAAF AKSES TIDAK DI IJINKAN<br></center></h1>";
	
	}
	?>
	<?php } ?>
	