<?php ob_start(); session_start();
	include_once"../../sc/conek.php";
	include_once"css.php";
	include"../../NEW_CODE/code_rand.php";
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
			//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
			header('location:index.php');
		} else {
		$u = mysql_query("select * from user where namauser='$_SESSION[namauser]'");
		$uu = mysql_fetch_array($u);
		$u_a = mysql_query("$sl akses FROM akademik where namauser='$_SESSION[namauser]'");
		$uu_a = $call_fas($u_a);
		$u_ku = mysql_query("$sl akses FROM user_ku where idku='$_SESSION[namauser]'");
		$uu_ku = $call_fas($u_ku);
		$u_dsn = $call_q("select iduser_dsn,iddosen,username,passuser,akses,kj from user_dsn where iddosen='$_SESSION[namauser]'");
		$uu_dsn = mysql_fetch_array($u_dsn);
		//$ku = $call_q("select * from ku where idku='$uu[idku]'");
		//$kuu = $call_fas($ku);

			$IDDSN=$sql_escape($_GET['kddsn']);
			
			 $dsn = $call_q("$call_sel dosen where iddosen='$IDDSN'");
			$dsnn = $call_fas($dsn);
			$kj = $call_q("$sl idkejuruan,kejuruan FROM kejuruan where idkejuruan='$dsnn[idkejuruan]'");
			$kjj = $call_fas($kj);
			$fak02 = $call_q("$call_sel fakultas where idfakultas='$dsnn[idfakultas]'");
			$fakk02 = $call_fas($fak02);
		//$kdmhs = "$kuu[idku]";
	 ?>
	  <?php if($uu['akses']==14 OR $uu_a['akses']==2 OR $uu_ku['akses']==11 OR $uu_dsn['akses']==6 ){ ?>
	  <script language="JavaScript" type="text/JavaScript">
			<!--
			function MM_openBrWindow(theURL,winName,features) { //v2.0
			  window.open(theURL,winName,features);
			}
//-->
		</script>
	 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
	<html>
	<head>
	<title>Untitled Document</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	
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
	 tanya = confirm("Anda Yakin Akan Melakukan Eksekusi Data ?");
	 if (tanya == true) return true;
	 else return false;
	 }</script>
	</head>
	
	<body>
	<form method="post">
	<?php $kdmhs=@$sql_escape($_GET['kdmhs']); ?>
	<h3><center><a href="<?php echo""; ?>">KRS SELURUHNYA</a> </center></h3>
	<hr color="#FF8040">
	<?php
	
	 $mhs = $call_q("$sl idmahasiswa,idkejuruan,iddosen,idkelas,idsemester,email,nama,acc,krs,mhs FROM mahasiswa where idmahasiswa='$kdmhs'");
		$mhss = $call_fas($mhs);
	?>
	<?php
	$kdkrs = @$sql_escape($_GET['kdkrs']);
	$kdkr = @$sql_escape($_GET['kdkr']);
	$kr2  = $call_q("select * from kurikulum where idkurikulum='$kdkr'");
	$krr2 = $call_fas($kr2);
	if(isset($_GET['kdkrs'])){
	$idprk = @$_GET['idprk'];
	$j = @$sql_escape($_GET['j']);
	$jp = @$sql_escape($_GET['jp']);
	$jpx = @$sql_escape($_GET['jpx']);
	$jdl = "VALIDASI KRS";
	  $tgl = date("d-m-Y");
	$isi_mymail = "Mata Kuliah <b>$krr2[judul]</b> &nbsp; Sudah Divalidasi <b>$tgl</b> ";
	$call_q("update krs set jumlah='$j',jp='$jpx',idmain_kurikulum='$krr2[idmain]' where idkrs='$kdkrs'");
	$call_q("update krs set app='2' where idkrs='$kdkrs'");
	$call_q("update mahasiswa set acc='2' where idmahasiswa='$kdmhs'");
	$call_q("insert into mymail(untuk,dari,judul,isi,tgl,nama)values('$kdmhs','$uu4[iddosen]','$jdl','$isi_mymail','$tgl','$uu4[username]')");
	//$call_q("update krs set idpraktikum='$idprk' where idkrs='$kdkrs'");
	//$call_q("update krs set jumlah_praktikum='$jp' where idkrs='$kdkrs'");
	
	}
			//Global update
		
	?>
	<?php ?>
	<?php
	$delpkdkrs = @$sql_escape($_GET['delpkdkrs']);
	if(isset($_GET['delpkdkrs'])){
	
	$call_q("delete from p_sks where idp_sks='$delpkdkrs'"); 
	}
	
	?>
	<?php
	$delkdkrs = @$sql_escape($_GET['delkdkrs']);
	if(isset($_GET['delkdkrs'])){
	
	$call_q("delete from krs where idkrs='$delkdkrs'"); 
	}?>
		<div class="container">
	<table width="600" border="0" class="table table-bordered">
	  <tr>
		<td width="113">NIM</td>
		<td width="477"><?php echo"$mhss[idmahasiswa]"; ?></td>
	  </tr>
	  <tr>
		<td>NAMA</td>
		<td><?php echo"$mhss[nama]"; ?></td>
	  </tr>
	  <tr>
		<td>EMAIL</td>
		<td><?php echo"$mhss[email]"; ?></td>
	  </tr>
	</table>

	<blockquote>mohon segera lakukan Proses Jumlah SKS untuk memproses data Krs<br>
	fungsi Lukir MAKUL untuk mengganti atau menukar mata kuliah yang salah pilih</blockquote>
	
	<table width="100%" border="0" align="center" bgcolor="#7DFF7D" class="table table-bordered">
	  <tr align="center" bgcolor="#7DFF7D">
		<td width="126" height="35">Kode Mapel</td>
		<td width="487">Judul , Semester </td>
		<td width="64">Tumbukan</td>
		<td width="109">Jumlah </td>
		<td width="298">action</td>
	  </tr>
	  <?php
			  $krs = $call_q("$call_sel krs where idmahasiswa='$mhss[idmahasiswa]' and idsemester='$mhss[idsemester]'");
			  	$jum_krs = $call_nr($krs);
			  $no = 1;
			  while($krss = $call_fas($krs)){
			  $sks = $call_q("$call_sel  sks where idsks='$krss[idsks]' ");
			$skss = $call_fas($sks);
			  $sm = $call_q("$sl idsemester,idtahun_ajaran,semester FROM semester where idsemester='$skss[idsemester]'");
			$smm = $call_fas($sm);
			 $dsn = $call_q("$sl iddosen,idkejuruan,idfakultas,nama FROM dosen where iddosen='$skss[iddosen]'");
			$dsnn = $call_fas($dsn);
			$kj = $call_q("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
			$kjj = $call_fas($kj);
			$kr  = $call_q("$sl idmain,idkurikulum,idkejuruan,idsemester,judul,juduleng,idsk  FROM kurikulum where idkurikulum='$skss[idkurikulum]'");
			$krr = $call_fas($kr);
	  
	  ?>
	  <tr align="center" bgcolor="#FFFFFF">
		<td height="50"><?php echo"<a href=#>$krr[idsk]</a><br>$kjj[kejuruan]<br>$skss[idkelas]"; ?></td>
		<td><?php echo"<b>$krr[judul]</b><br><i>$krr[juduleng]</i><br>
		<u>Oleh &nbsp; $dsnn[nama]</u><br>
		"; ?>
				<?php echo"<br>$smm[semester]<br><b><font color=blue>$skss[hari]</font><br> $skss[jam]  WIB</b>"; ?>
		
	
		</td>
	   <?php		
	$sks_tb = $call_q("select * from krs where idsemester='$mhss[idsemester]' and idsks='$skss[idsks]' and idmahasiswa='$mhss[idmahasiswa]'");
				$sks_tbb = mysql_num_rows($sks_tb);
				if($sks_tbb > 1){
				echo"<td class=danger>";
						echo"Ada tumbukan";
						echo"</td>";
				}else{
				echo"<td class=success>";
						echo"Tidak ada tumbukan";
						echo"</td>";
					}
					
		
		?>
	   
		<?php if($krss['app']==1){?>
		 <td class="danger">
		 <a href="<?php echo""; ?>" class="btn btn-danger">Belum ACC</a>
		  <input   type="hidden" name="<?php echo"kd02krs$no"; ?>" value="<?php echo"$krss[idkrs]"; ?>">
		 <input type="hidden" name="<?php echo"j$no"; ?>" value="<?php echo"$skss[jumlah]"; ?>">
		  <input  type="hidden" name="<?php echo"jpx$no"; ?>" value="<?php echo"$skss[jp]"; ?>">
		   <input  type="hidden" name="<?php echo"kdkr$no"; ?>" value="<?php echo"$krr[idmain]"; ?>">
		 </td>
		<?php
		}else{
		?>
		 <td class="success">
		<?php echo"$krss[jumlah]";?>
		   </td>
		<?php } ?>
		
	 
		<td align="center">
		
	
	 <a onclick="return konfirmasi()" href="<?php echo"?kdmhs=$kdmhs&delkdkrs=$krss[idkrs]"; ?>" class="btn btn-warning"><img src="http://sikadu.unwahas.ac.id/img/warning-32.png" width="21" height="21" border="0">&nbsp;Hapus MAKUL</a>
	 <br> 
	 <br>
		
	<a href="#" onClick="MM_openBrWindow('<?php echo"../../SU_admin/lukir_krs.php?kdmhs=$kdmhs&idsks=$skss[idsks]"; ?>','','scrollbars=yes,width=600,height=800')" class="btn btn-primary"><img src="http://sikadu.unwahas.ac.id/img/add-to-cart-32.png" width="21" height="21" border="0">&nbsp;Lukir Makul</a></td>
	  </tr>
	   <?php $no++; } ?>
	  <tr align="center" bgcolor="#FFFFFF">
		<td height="50">&nbsp;</td>
		<td height="50">Total KRS</td>
		<td height="50">
		<?php if($mhss['acc']==1){ ?>
			<button class="btn btn-success" name="acc_up" onClick="return konfirmasi()"><i class="fas fa-upload"></i>&nbsp; Acc Keseluruhan</button>
			<?php }elseif($mhss['acc']==2){ ?>
			<button class="btn btn-info" onClick="return konfirmasi()" name="rst"><i class="fas fa-cloud-download-alt"></i>&nbsp; Reset Acc</button>
	<?php } ?>
		</td>
		<td height="50">
		<?php
		$k = $call_q("select sum(jumlah) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2'  and idsemester='$mhss[idsemester]'");
		$kk = $call_fas($k);
		echo"<br><b>$kk[kr]</b>"; ?>
		 </td>
		<td><a href="<?php echo"ctk_tran_sks.php?kdmhs=$mhss[idmahasiswa]"; ?>" target="_blank">CETAK  TRANSCRIP MAHASISWA</a></td>
	  </tr>
	</table>
	</div>
	  <table width="600" border="0" class="table">
		<tr>
		  <td width="79"><h4>
		  
	
	<a href="#" onClick="MM_openBrWindow('<?php echo"../SU_admin/ctk_krs_mhs.php?kdmhs=$kdmhs&idsm=$mhss[idsemester]"; ?>','','scrollbars=yes,width=900,height=800')" class="btn btn-primary btn-lg"><img src=http://sikadu.unwahas.ac.id/img/print-32.png width=32 height=32 border=0 title=cetak KRS><br>Cetak KRS</a>
	
	
		  </h4></td>
		  <td width="511"><div class="alert alert-dismissible alert-danger">
	  <button type="button" class="close" data-dismiss="alert">PERHATIAN</button>
	  <ul>
	 <li>Setelah selesai di ACC dosen wali, Cetak KRS anda dengan klik 'CETAK KRS'</li>
	  <li>Gunakan browser google crhome untuk tampilan terbaik, dan cetak dengan kertas ukuran A4 70 Gr</li>
	   <li>Untuk cetak gunakan CTRL+P, lihat apakah sudah sesuai dengan format</li>
		<li>Apabila ada gambar atau garis yang tidak terlihat, centang pilihan Background Graphics pada browser google crome anda  </li></ul>
	</div></td>
		</tr>
	  </table>
	  </form>
	  
	  <?php
	  	if(isset($_POST['rst'])){
				$call_q("$up mahasiswa set acc='1' WHERE idmahasiswa='$mhss[idmahasiswa]'");
				$call_q("$up krs set jumlah='0',jp='0',idmain_kurikulum='0',app='1' WHERE idmahasiswa='$mhss[idmahasiswa]' AND idsemester='$mhss[idsemester]'");
			header("location:DSN_M_WALI_ACC.php?kdmhs=$kdmhs&IDDSN=$IDDSN&kddsn=$IDDSN");
			
		}
			if(isset($_POST['acc_up'])){
				$no_acc = 1;
				$call_q("$up mahasiswa set acc='2' WHERE idmahasiswa='$mhss[idmahasiswa]'");
				while( $no_acc <= $jum_krs){
				$j = @$sql_escape($_POST['j'.$no_acc]);
				$jpx = @$sql_escape($_POST['jpx'.$no_acc]);
				$kdkr = @$sql_escape($_POST['kdkr'.$no_acc]);
				$kd02krs = @$sql_escape($_POST['kd02krs'.$no_acc]);
				
				$call_q("$up krs set jumlah='$j',jp='$jpx',idmain_kurikulum='$kd02krs',app='2' where idkrs='$kd02krs' ");
				header("location:DSN_M_WALI_ACC.php?kdmhs=$kdmhs&IDDSN=$IDDSN&kddsn=$IDDSN");
			$no_acc++; } }
	  ?>
	  
	</body>
	</html>
	<?php
	}else{echo"<h1><center>MAAF AKSES TIDAK DI IJINKAN</center></h1>";}?>
	<?php } ob_flush(); ?>