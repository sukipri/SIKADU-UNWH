<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
		?>
	
		<body>
		<?php
			$idb = @$sql_escape($_GET['idb']);
			if(isset($_GET['idb'])){
				$call_q("delete from biaya_02 where idbiaya_02='$idb'");
			
			}
		
		?>
	<form name="form1" method="post" action="">
	  <h4>History Pembayaran
	  </h4>
	
      <div class="input-group mb-3">
 		 <input type="text" autocomplete="off" name="nama" class="form-control" style="max-width:20rem;" required>
  			<div class="input-group-append">
  			 <button class="btn btn-success" name="go"><i class="fas fa-search"></i>&nbsp;Cari</button>
  			</div>
			</div>
	  <br>
	  <table width="600" border="0" class="table table-bordered table-sm" style="max-width:60rem;">
		<tr class="table-success">
		  <td>#</td>
		  <td height="33"><strong>PRODI</strong></td>
		  <td><strong>KELAS</strong></td>
		  <td><strong>NAMA</strong></td>
		  <td><strong>NIM</strong></td>
		  <td><strong>Pengambilan Tagihan </strong></td>
		  <td>INPUT</td>
		</tr>
		<?PHP 
			if(isset($_POST['go'])){
			$kj = @$_POST['kj'];
			$nama = @$sql_escape($_POST['nama']);
			$no = 1;
			$km = $call_q("select idmahasiswa,idkejuruan,idtahun_ajaran,idsemester,iddosen,nama,kode_kelas,idgelombang from mahasiswa where  idmahasiswa='$nama' or nama LIKE '%$nama%'");
			while($kmm = $call_fas($km)){
			$fakj = $call_q("select idkejuruan,idfakultas,kejuruan from kejuruan where idkejuruan='$kmm[idkejuruan]'");
			 $fakkj = $call_fas($fakj);
			 $gl = $call_q("select * from gelombang where idgelombang='$kmm[idgelombang]'");
				$gll = $call_fas($gl);
			
		 ?>
		<tr>
		  <td><?php echo"$no"; ?></td>
		  <td height="36"><?php echo"$fakkj[kejuruan]<br>$gll[gelombang] / $gll[tahun]"; ?></td>
		  <td><?php echo"$kmm[kode_kelas]"; ?></td>
		  <td><?php echo"$kmm[nama]"; ?></td>
		  <td><?php echo"$kmm[idmahasiswa]"; ?></td>
		  <td><?php 
		  $byr = $call_q("select * from biaya_02_rekam where idmahasiswa='$kmm[idmahasiswa]' order by tgl ");
			
			while($byyr = $call_fas($byr)){
				$vby = $call_q("$call_sel biaya_02 WHERE idbiaya_02='$byyr[idbiaya_02]'");
					$byy = $call_fas($vby);
			$k1 = @number_format($byy['NOMINAL'],"0","",".");
				if($byyr['app']==1){ echo"<font color=red><b>#</b></font>";
				}elseif($byyr['app']==2){echo"<font color=green><b>#</b></font>";}
				echo"&nbsp;$byy[REMARK]&nbsp;[$byy[TGL]]-[$byy[THN] / $byy[KODE]-$k1&nbsp;$byy[KETERANGAN]"; ?>
				<!-- [<a href="<?php //echo"?bu=pem_kul&pkp=import_biaya_nim&idb=$byy[idbiaya_02]#biaya"; ?>" onClick="return konfirmasi()">Hapus</a>]<br> -->
			<br>
			<?php }
				$jumby = $call_q("select sum(NOMINAL) as totby from biaya_02_rekam where idmahasiswa='$kmm[idmahasiswa]' AND app='1'");
				$jumbyy = $call_fas($jumby);
					$k3 = @number_format($jumbyy['totby'],"0","",".");
						
				echo "<strong>TOTAL:&nbsp;Rp.$k3";
			 ?> 
		  </td>
		  <td>
		 	<!--
            <a href="#biaya"  onClick="MM_openBrWindow('../../BU/add_biaya.php?<?php //echo"kdmhs=$kmm[idmahasiswa]"; ?>','','scrollbars=yes,width=700,height=450')" class="btn btn-success"><i class="fas fa-money-check-alt"></i>&nbsp;INPUT BIAYA</a><br><br>
            -->
			
			
		
		  </td>
		</tr>
		<?php $no++; }}?>
		
		<tr>
		  <td height="36"><div id="total"></div></td>
		  <td height="36">&nbsp;</td>
		  <td>&nbsp;</td>
		  <td height="36">&nbsp;</td>
		  <td height="36">TOTAL</td>
		  <td height="36">
		  <?PHP 
			if(isset($_POST['go'])){
			$nama = @$_POST['nama'];
			//$ang = mysql_real_escape_string($_POST['ang']);
			$km = $call_q("$sl idmahasiswa,idkejuruan,idsemester,mhs FROM mahasiswa where idmahasiswa='$nama' and mhs='2'");
			$kmm = $call_fas($km);
			$by1 = $call_q("select sum(NOMINAL) as tot from biaya_02 where NIM='$kmm[idmahasiswa]'");
			
			$byy1 = $call_fas($by1);
			$k2 = @number_format($byy1['tot'],"0","",".");
			//echo"Rp.$k2";
			}
		 ?> &nbsp; <a href="<?php echo"dtl_biaya_mhs.php?kdmhs=$nama"; ?>" target="_blank" class="btn btn-warning"><i class="far fa-money-bill-alt"></i>&nbsp;Cetak Total Biaya</a></td>
		  <?php //echo"$kmm[idmahasiswa]"; ?>
		  <td height="36">&nbsp;</td>
		</tr>
		
	  </table>
	</form>
	</body>
<?php } ?>