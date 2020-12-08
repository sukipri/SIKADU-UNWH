	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
	<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Untitled Document</title>
	<script language="JavaScript" type="text/JavaScript">
	<!--
	function MM_openBrWindow(theURL,winName,features) { //v2.0
	  window.open(theURL,winName,features);
	}
	//-->
	</script>
	</head>
	
	<body>
	<h4>Input Nilai Konversi &nbsp;<a href="?aka=ikonversi_kejuruan" class="btn btn-danger">Input Per Kejuruan</a>&nbsp; <a href="?aka=ikonversi_global" class="btn btn-success">Global Konversi</a></h4>
	<form name="form1" method="post" action="?aka=ikonversi">
	  <table width="600" border="0" class="table table-bordered">
		<tr>
		  <td width="428"><input type="text" name="kdmhs" class="form-control" placeholder="masukan nim lengkap"></td>
		  <td width="162"><input type="submit" name="go" value="Submit" class="btn btn-warning"></td>
		</tr>
	  </table>
	</form>
	<?php 
	$idmain_del = @mysql_real_escape_string($_GET['idmain_del']);
	if(isset($_GET['idmain_del'])){
	
	mysql_query("delete from mahasiswa_trans where idmain='$idmain_del'");
	
	}
	 ?>
	<?php
	if(isset($_POST['go'])){
	$kdmhs=@mysql_real_escape_string($_POST['kdmhs']);
	 $mhs = mysql_query("select * from mahasiswa where idmahasiswa='$kdmhs'");
	$mhss = mysql_fetch_array($mhs);
	if($mhss['asal']=="pindahan"){
	?>
	<table width="600" border="0" class="table table-bordered">
	  <tr>
		<td width="372"><?php echo"NIM:&nbsp;$mhss[idmahasiswa]"; ?></td>
		<td width="218"><?php echo"ANGKATAN:&nbsp;$mhss[idtahun_ajaran]"; ?></td>
	  </tr>
	  <tr>
		<td><?php echo"NAMA:&nbsp;$mhss[nama]"; ?></td>
		<td><?php echo"KODE PROGDI:&nbsp;$mhss[idkejuruan]"; ?></td>
	  </tr>
	  <tr align="center">
		<td colspan="2"><a href="?aka=ikonversi&kdmhs=<?php echo"$kdmhs"; ?>" class="btn btn-success">Masukan Mata Kuliah yang diakui</a>	</td>
	  </tr>
	</table>
	<?php
	}else{
	echo"<center><h4>Sorry The Student Is not Transfered</h4></center>";
	
	}
	?>
	<?php
	
	}
	?>
	<?php
	if(isset($_GET['kdmhs'])){
	$kdmhs=@mysql_real_escape_string($_GET['kdmhs']);
	 $mhs = mysql_query("select * from mahasiswa where idmahasiswa='$kdmhs'");
	$mhss = mysql_fetch_array($mhs);
	?>
	<button data-toggle="collapse" data-target="#demo" class="btn btn-success">Tambah Data </button>
	
	<div id="demo" class="collapse">
	
	<form name="form2" method="post" action="">
	  <table width="600" border="0" class="table table-bordered">
		<tr>
		  <td width="372"><?php echo"NIM:&nbsp;$mhss[idmahasiswa]"; ?></td>
		  <td width="218"><?php echo"ANGKATAN:&nbsp;$mhss[idtahun_ajaran]"; ?></td>
		</tr>
		<tr>
		  <td><?php echo"NAMA:&nbsp;$mhss[nama]"; ?></td>
		  <td><?php echo"KODE PROGDI:&nbsp;$mhss[idkejuruan]"; ?></td>
		</tr>
		<tr align="center" bgcolor="#D4D4D4">
		  <td><input type="text" name="kode" class="form-control" placeholder="Kode Mata Kuliah Asal">
		  <input type="text" name="judul" class="form-control" placeholder="Judul Mata Kuliah Asal">
		  <input name="jumlah" type="text" class="form-control" id="jumlah" placeholder="Jumlah SKS Asal">  
		  <input name="nas" type="text" class="form-control" id="nas" placeholder="Nilai Angka Asal">      
		  <input name="huruf" type="text" class="form-control" id="huruf" placeholder="Nilai Huruf Asal"></td>
		  <td><br><br><input type="submit" name="simpan" value="Submit" class="btn btn-primary form-control"><br><br>Atau<br><br><a href="#" class="btn btn-success">Upload .XLS</a></td>
		</tr>
	  </table>
	</form>
	</div><a href="?aka=ikonversi&kdmhs=<?php echo"$kdmhs"; ?>" class="btn btn-success"><img src="../img/reload-32.png" border="0"></a>
	
	  <table width="941" border="0" class="table table-bordered">
		<tr>
		  <td width="30">NO</td>
		  <td width="112">Kode Mata Kuliah Asal </td>
		  <td width="110">Mata Kuliah </td>
		  <td width="55">SKS</td>
		  <td width="80">Nilai Huruf</td>
		  <td width="262">Hasil</td>
		  <td colspan="2">Konversi Nilai </td>
		</tr>
		<?php
		$mhs2 = mysql_query("select * from mahasiswa_trans where idmahasiswa='$kdmhs'");
		$no = 1;
	while($mhss2 = mysql_fetch_array($mhs2)){
		?>
		<tr>
		  <td><?php echo"$no"; ?></td>
		  <td height="34"><?php echo"$mhss2[idsks]"; ?></td>
		  <td><?php echo"$mhss2[judul]"; ?></td>
		  <td><?php echo"$mhss2[jumlah]"; ?></td>
		  <td><?php echo"$mhss2[huruf]"; ?></td>
		  <td>
		
		<?php   $kr  = mysql_query("select * from kurikulum where idkurikulum='$mhss2[idkurikulum]'");
	$krr = mysql_fetch_array($kr);
		echo"<b>$krr[judul]</b><br>($mhss2[angka_baru])-($mhss2[huruf_baru])-($mhss2[jumlah_baru])";
	 ?>
	
	</td>
		  <td width="153">
	
			<a href="#" class="btn btn-info" onClick="MM_openBrWindow('../SU_admin/isks_conversi.php<?php echo"?kdmhs=$mhss[idmahasiswa]&kode=$mhss2[idsks]&idmain=$mhss2[idmain]"; ?>','','scrollbars=yes,width=500,height=500')">Masukan Mata Kuliah
		  </a>	  </td>
		  <td width="105"> <a href="<?php echo"?aka=ikonversi&idmain_del=$mhss2[idmain]&kdmhs=$mhss2[idmahasiswa]";?>" class="btn btn-danger">HAPUS
		  </a>	;</td>
		</tr>
		
		<?php
		$no++;
		}
		?>
		<tr>
		  <td>&nbsp;</td>
		  <td height="43">JUMLAH SKS </td>
		  <td>&nbsp;</td>
		  <td><?php
		   $jumsks_lama = mysql_query("select sum(jumlah) as jm_lama from mahasiswa_trans where idmahasiswa='$kdmhs'"); 
		   $jumsks_lama_hasil = mysql_fetch_array($jumsks_lama);
		   echo"$jumsks_lama_hasil[jm_lama]";
		   ?></td>
		  <td>&nbsp;</td>
		  <td><?php
		   $jumsks_lama2 = mysql_query("select sum(jumlah_baru) as jm_baru from mahasiswa_trans where idmahasiswa='$kdmhs'"); 
		   $jumsks_lama_hasil2 = mysql_fetch_array($jumsks_lama2);
		   echo"$jumsks_lama_hasil2[jm_baru]";
		   ?></td>
		  <td colspan="2"> <a href="#" class="btn btn-default" onClick="MM_openBrWindow('../SU_admin/ctk_konversi_nilai.php<?php echo"?kdmhs=$mhss[idmahasiswa]&kode=$mhss2[idsks]&idmain=$mhss2[idmain]"; ?>','','scrollbars=yes,width=800,height=500')"><img src="../img/print-32.png" width="20" height="20" border="0">&nbsp;Cetak Konversi</a>        </td>
		</tr>
	  </table>
	<br>
	<?php
	if(isset($_POST['simpan'])){
		$kode = @$_POST['kode'];
		$judul = @$_POST['judul'];
		$jumlah = @$_POST['jumlah'];
		$kt = @$_POST['kt'];
		$ssp = @$_POST['ssp'];
		$ts = @$_POST['ts'];
		$nas = @$_POST['nas'];
		$huruf = @$_POST['huruf'];
			mysql_query("insert into mahasiswa_trans(idmahasiswa,idsks,judul,jumlah,kt,ssp,ts,nas,huruf)values('$mhss[idmahasiswa]','$kode','$judul','$jumlah','$kt','$ssp','$ts','$nas','$huruf')");
			echo"<center><h4>Data successfuly</h2></center>";
			}
	
	?>
	<?php
	}
	?>
	</body>
	</html>
