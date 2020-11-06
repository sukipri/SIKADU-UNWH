<?php 
	ob_start();
		session_start();
	include_once"../../sc/conek.php";
	include_once"css.php";
	include"../../NEW_CODE/code_rand.php";
	$vsm_a = $call_q("$call_sel semester WHERE aktif='2'");
				$vsm_aa = $call_fas($vsm_a);
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
		$u_bu = $call_q("$sl iduser_bu,idbu,username,passuser,akses from user_bu where username='$_SESSION[namauser]'");
		$uu_bu = $call_fas($u_bu); 
		//$ku = $call_q("select * from ku where idku='$uu[idku]'");
		//$kuu = $call_fas($ku);

			//$IDDSN=$sql_escape($_GET['kddsn']);
			
		//$kdmhs = "$kuu[idku]";
	 ?>
<body>
	<?php if($uu['akses']==14 OR $uu_a['akses']==2 OR $uu_ku['akses']==11 OR $uu_bu['akses']==8){ ?>
	<?php 
		$IDKJ = @$sql_escape($_GET['IDKJ']);
		$IDANG = @$sql_escape($_GET['IDANG']);
	?>
			<?php require_once"../sd/LOAD_LAYOUT.php"; ?>
	<form action="" method="post">
	<table width="100%" border="0" class="table table-bordered table-striped">
					  <tr class="table-success">
					  	<td>NO</td>
						<td>Kejuruan</td>
						<td>TGL</td>
						<td>REMARK</td>
						<td>NIM</td>
						<td>KODE</td>
						<td>BANK</td>
						<td>NOMINAL</td>
						<td>THN</td>
						<td>Keterangan</td>
						<td>Upload</td>
						<td>&nbsp;</td>
					  </tr>
				<?php
					$no = 1 ;
					 $by_02 = $call_q("$call_sel  biaya_02 where idkejuruan='$IDKJ' AND left(NIM,2)='18' AND THN='$vsm_aa[idsemester]' AND app='1' order by NIM ");
							while($byy_02 = $call_fas($by_02)){
								
								$k1 = @number_format($byy_02['NOMINAL'],"0","",".");
				?>
					  <tr>
					    <td><?php echo"$no"; ?></td>
					    <td><?php echo"$byy_02[idkejuruan]"; ?></td>
					    <td><?php echo"$byy_02[TGL]"; ?></td>
					    <td><?php echo"$byy_02[REMARK]"; ?></td>
					    <td><?php echo"$byy_02[NIM]"; ?></td>
					    <td><?php echo"$byy_02[KODE]"; ?></td>
					    <td><?php echo"$byy_02[BANK]"; ?></td>
					    <td><?php echo"Rp.$k1"; ?></td>
					    <td><?php echo"$byy_02[THN]"; ?></td>
					    <td>
						<textarea class="form-control" name="ket">
						<?php echo"$byy_02[KETERANGAN]"; ?>
						</textarea>
						<input type="hidden" name="<?php echo"idby$no"; ?>" value="<?php echo"$byy_02[idbiaya_02]"; ?>">
						<input type="hidden" name="<?php echo"idkj$no"; ?>" value="<?php echo"$byy_02[idkejuruan]"; ?>">
						<input type="hidden" name="<?php echo"tgl$no"; ?>" value="<?php echo"$byy_02[TGL]"; ?>">
						<input type="hidden" name="<?php echo"nim$no"; ?>" value="<?php echo"$byy_02[NIM]"; ?>">
						<input type="hidden" name="<?php echo"nom$no"; ?>" value="<?php echo"$byy_02[NOMINAL]"; ?>">
						<input type="hidden" name="<?php echo"kd$no"; ?>" value="<?php echo"$byy_02[KODE]"; ?>">
						</td>
					    <td><?php echo"$byy_02[upload]"; ?></td>
						<td></td>
      </tr>
		
	  <?php $no++;} ?>
	  			  <tr>
					    <td>&nbsp;</td>
					    <td>&nbsp;</td>
					    <td>&nbsp;</td>
					    <td>&nbsp;</td>
					    <td>&nbsp;</td>
					    <td>&nbsp;</td>
					    <td>&nbsp;</td>
					    <td>&nbsp;</td>
					    <td>&nbsp;</td>
					    <td><button class="btn btn-success" name="up"><i class="fas fa-upload"></i>&nbsp; Upload</button></td>
					    <td>&nbsp;</td>
					    <td></td>
      </tr> 
	</table>
	<?php
			$jum_by_02 = $call_nr($by_02);
				if(isset($_POST['up'])){
					$no_up = 1 ;
						while($no_up <= $jum_by_02){
							
							$idby = @$_POST['idby'.$no_up];
							$nim = @$_POST['nim'.$no_up];
							$kd = @$_POST['kd'.$no_up];
							$nom= @$_POST['nom'.$no_up];
							$tgl= @$_POST['tgl'.$no_up];
							$IDMAIN_ex = "$idby$ack_cr32_big$no_up";
								//echo"$IDMAIN_ex<br>";
							$call_q("$in biaya_02_rekam(idmain_rekam,idbiaya_02,idmahasiswa,kode_bayar,nominal,tgl,idsemester,app,bank)VALUES('$IDMAIN_ex','$idby','$nim','$kd','$nom','$tgl','$vsm_aa[idsemester]','1','TEST')");
							
						$no_up++;}
								//header("location:BU_MST_M_UANG_02_TGH_02.php?IDKJ=$IDKJ&IDANG=$IDANG");
									echo "<script language='javascript'>alert('Proses Import Berhasil')</script>";
									echo "<script language='javascript'>window.location = 'BU_MST_M_UANG_02_TGH_02.php?IDKJ=$IDKJ&IDANG=$IDANG'</script>";
			?>
				
			
			<?php } ?>
	</form>
</body>
<?php
	}else{echo"<h1><center>MAAF AKSES TIDAK DI IJINKAN<br><a href=index.php>klik untuk kembali</a></center></h1>";
	} }
	ob_flush();
	?>
