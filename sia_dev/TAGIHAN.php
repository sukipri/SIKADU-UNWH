	<?php //session_start();
	// include_once"../sc/conek.php";
	 //include_once"css.php";
	
		
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
			//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
			header('location:index.php');
		} else {
		/* KODE TRANSAKSI */
			//$jum_byr_02 = $call_q("select idmain_rekam from biaya_02_rekam");
							//$jum_byrr_02 = mysql_num_rows($jum_byr_02);
		$an_03= rand(0,99);
		//$text_ahir = substr($uu['idmahasiswa'],0,11);
		$nim= $mhss['idmahasiswa'];
		//$text_ahir = $mhss[idmahasiswa];
		
		//echo $text_ahir;
		$text_ahir = intval($nim);

			//$KODE_TRAN = "$text_ahir$an_03$ack_small_XL$date_ack_tiny$time_ack_tiny";
			$KODE_TRAN = "$text_ahir$an_03$ack_small_XL$time_ack_tiny$date_ack_tiny";
			$KODE_TRAN2 = substr($KODE_TRAN,0,13);
				//echo"$KODE_TRAN";
				
					
	 ?>
		<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
        </script>
		<body>
			
						
						<?php
									class mhs{
										}
								
								$kj = $call_q("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
								$kjj = $call_fas($kj);
								$ambil_mhs= new mhs();
										$ambil_mhs->km_nim="$mhss[idmahasiswa]";
										$ambil_mhs->km_nama="$mhss[nama]";
										$ambil_mhs->kj_jur = "$kjj[kejuruan]";		
						?>
						<form action="" method="post">
			<table width="100%"  border="0" class="table-sm">
				  <tr>
					<td width="7%"><img src="../img/logokecil.gif" width="52" height="52"></td>
					<td width="60%"><h4>UNIVERSITAS WAHID HASYIM SEMARANG <br> 
					RINCIAN TAGIHAN PEMBAYARAN MAHASISWA</h4></td>
					<td width="33%" class="table-primary"><img src="https://bri.co.id/o/bri-corporate-theme/images/logo-white.png"></td>
				  </tr>
	  </table>
					<br>
					<?php
						//echo"$IDMAIN";
						
						$ID1 = @$sql_escape($_GET['ID1']);
						$ID2 = @$sql_escape($_GET['ID2']);
						$ID3 = @$sql_escape($_GET['ID3']);
						$ID4 = @$sql_escape($_GET['ID4']);
						$ID5 = @$sql_escape($_GET['ID5']);
						$ID6 = @$sql_escape($_GET['ID6']);
						//echo $ID3;
							if(isset($_GET['SAVE'])){
									//$save = $call_q("insert into biaya_02_rekam_bri(idmain_rekam,idbiaya_02,idmahasiswa,nama,kode_bayar,nominal,tgl,idsemester,app)values('$ID1','$ID5','$ID2','$mhss[nama]','$ID3','$ID4','$date_html5 $time_html5','$ID6','1')");
									$save = $call_q("$up biaya_02_rekam_bri set idmain_rekam='$KODE_TRAN2',app='3' WHERE idmahasiswa='$ID2' and app='1'");
									//$save = $call_q("$up biaya_02_rekam_bri set idmain_rekam='$KODE_TRAN2',app='3' WHERE idmahasiswa='$ID2' and id_biaya_rekam='$ID3' ");

									//$save_02 = $call_q("$up biaya_02_rekam_bri set app='3' WHERE idmahasiswa='$ID2'");
									if ($save) {  header("location:?mng=TAGIHAN#SAVING"); ?> 
								<!--
								<div class="alert alert-dismissible alert-success">
		  <button type="button" class="close" data-dismiss="alert">INFORMASI PENGISIAN </button>
		   <strong>Bagus!</strong> Tagihan Masuk Dalam Daftar Pembayaran.
		  </div> -->
											<?php }else{ ?>
									<div class="alert alert-dismissible alert-danger">
							 <button type="button" class="close" data-dismiss="alert">&times;</button>
							 <strong>Oh snap!</strong> <a href="#" class="alert-link">Change a few things up</a> and try submitting again.
							</div>
					<?php } } ?>
					
					
	<div style="overflow:auto;width:auto;height:30rem;padding:10px;border:1px solid #eee">
	<table width="100%"  border="0" class="table table-bordered table-sm">
	  <tr class="table-success">
		<td width="12%">#</td>
		<td width="16%">UPLOAD TANGGAL </td>
		<td width="15%">NAMA TRANSAKSI </td>
		<td width="12%">TOTAL.Rp</td>
		<td width="25%">KETERANGAN</td>
		<td width="20%">STATUS</td>
	  </tr>
			<?php
			class biaya{
					}
						 $by = $call_q("select * from biaya_02_rekam_bri where idmahasiswa='$kdmhs' and (app='1' or app='3')");
						 $no_by = 1;
						while($byy = $call_fas($by)){
							$sm = $call_q("select idsemester,idtahun_ajaran,semester from semester where idsemester='$byy[THN]'");
							$smm = mysql_fetch_assoc($sm);
								$data_biaya = new biaya();
						
						$data_biaya->by_tanggal="$byy[upload]";
						$data_biaya->by_kode="$byy[idmain_rekam]";
						$data_biaya->by_nominal="$byy[nominal]";
						$data_biaya->by_ket="$byy[kode_bayar]";
						$data_biaya->sm_semester="$byy[idsemester]";
						$data_biaya->sm_ket2="$byy[kode]";
						$jum= @number_format($data_biaya->by_nominal,"0","",".");
				?>
	  <tr>
		<td><?php if($byy['app']==1){?>
		  <a href="<?php echo"admin_sia_ui.php?mng=TAGIHAN&ID1=$IDMAIN$no_by&ID2=$uu[idmahasiswa]&ID4=$byy[nominal]&SAVE=SAVE&ID5=$byy[idbiaya_02]&ID6=$byy[THN]#SAVING";
		  //echo"admin_sia_ui.php?mng=TAGIHAN&ID1=$IDMAIN$no_by&ID2=$uu[idmahasiswa]&ID3=$byy[id_biaya_rekam]&ID4=$byy[nominal]&SAVE=SAVE&ID5=$byy[idbiaya_02]&ID6=$byy[THN]#SAVING"; ?>" class="btn btn-warning btn-sm"><i class="fa fa-hand-grab-o"></i>&nbsp;Bayar BRI</a>
		<?php }elseif($byy['app']==2){echo"<font color=green><b>#PAID</b></font>";?>
					<?php }  ?>		</td>		
		<td><?php echo $data_biaya->by_tanggal; ?></td>
		<td><?php echo $data_biaya->by_kode; ?></td>
		<td align="right"><?php echo "Rp.".$jum; ?></td>
		<td><?php echo $data_biaya->sm_semester; ?> <?php echo $data_biaya->by_ket; ?> </td>
		<td><?php if($byy['app']==1){ echo"<font color=red><b>Belum Dibayar</b></font>";
					}elseif($byy['app']==2){echo"<font color=green><b>Sudah Dibayar</b></font>";}elseif($byy['app']==3){echo"<font color=blue><b>Menunggu Pembayaran</b></font>";}  ?>		</td>
	  </tr>
	   <?php $no_by++;} ?>
	  <tr class="table-warning">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><strong>TOTAL</strong></td>
		<td align="right">
		<?php 
				$jum_by = $call_q("select sum(nominal) as nom from biaya_02_rekam_bri where idmahasiswa='$kdmhs' and (app='1' or app='3')");
					$jum_byy = $call_fas($jum_by);
					$jum02= @number_format($jum_byy['nom'],"0","",".");
					echo"Rp.$jum02";
					
		 ?>		</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	  </tr>
	</table>
	
	
		<br>
		<?php
					if(isset($_POST['simpan'])){
					echo"BRIVA";
						$no_byr_02 = 1;
						$jum_byr = $call_q("$sl idmahasiswa,app FROM biaya_02_rekam_bri where idmahasiswa='$kdmhs' and app='3'  order by idsemester desc");
							$jum_byrr = $call_nr($jum_byr);
							echo"$jum_byrr";
							//echo"$jum_byrr";
						while($no_byr_02 <= $jum_byrr){
							$idmain = @$_POST['idmain'.$no_byr_02];
								@$call_q("update biaya_02_rekam_bri set idmain_rekam='$KODE_TRAN2' where idmahasiswa='$kdmhs' and app='3'");
								echo"saya $idmain<br>";
							$no_byr_02++;
							
						}
					
					} 
						if(isset($_GET['DL'])){
							$DEL = @$sql_escape($_GET['DEL']);
							$IDBY = @$sql_escape($_GET['IDBY']);
							@$call_q("$up biaya_02_rekam_bri set idmain_rekam='0' , app='1' where idmahasiswa='$DEL' and idmain_rekam='$IDBY'");
								//header("location:DELETE_TAGIHAN.php?IDDEL=$DEL&IDBY=$byy_r[idbiaya_02]###");
								header("location:?mng=TAGIHAN");
						
						}
						/*
						switch(@$sql_escape($_GET['KODE'])){
							case'KODE':
								include"../API/FETCHING/F_01_SAVE.php";
							break;
					}
					*/
		?>
		
		<table width="100%" border="0" class="table table-bordered table-sm">
                  <tr class="table-info">
                    <td width="7%">KODE</td>
                    <td width="5%">NIM</td>
                    <td width="13%">KODE BAYAR</td>
                    <td width="17%">NOMINAL</td>
					 <td width="25%">KODE SEMESTER</td>
					  <td width="13%">STATUS</td>
                      <td width="20%">####</td>
                  </tr>
				  <?php 
				   $by_r = $call_q("$call_sel biaya_02_rekam_bri where idmahasiswa='$kdmhs' AND app='3' order by idsemester desc ");
						 $no_byr = 1;
				  	while($byy_r = $call_fas($by_r)){
						$sm_r = $call_q("$sl idsemester,idtahun_ajaran,semester from semester where idsemester='$byy_r[idsemester]'");
						$smm_r = mysql_fetch_assoc($sm_r);
						$hit_byy_r = number_format($byy_r['nominal']);
				  ?>
                  <tr>
                    <td><?php echo"$byy_r[idmain_rekam]"; ?><input type="hidden" name="<?php echo"idmain$no_byr"; ?>" value="<?php echo"$byy_r[idmain_rekam]"; ?>"></td>
                    <td><?php echo"$byy_r[idmahasiswa]"; ?></td>
                    <td><?php echo"$byy_r[kode]"; ?></td>
                   <td align="right"><?php echo"Rp.$hit_byy_r"; ?></td>
				    <td><?php echo"$smm_r[semester]"; ?></td>
					  <td>
					<?php if($byy_r['app']==1){ echo"<font color=blue><b>Dalam Proses</b></font>";
					}elseif($byy_r['app']==2){echo"<font color=green><b>Terbayar</b></font>";}  ?>
					  </td>
				      <td>
					  <!--<a href="<?php echo"?mng=TAGIHAN&DEL=$byy_r[idmahasiswa]&IDBY=$byy_r[idmain_rekam]&DL=DL#DELETE";
					  //echo"?mng=TAGIHAN&DEL=$byy_r[id_biaya_rekam]&IDBY=$byy_r[idbiaya_02]&DL=DL#DELETE"; ?>" onClick="return konfirmasi()" class="btn btn-danger btn-sm">Hapus</a>&nbsp;-->
					  <a href="<?php echo"CTK_TAGIHAN.php?IDTG=$byy_r[kode]#";  ?>" target="_blank" class="btn btn-warning btn-sm"><i class="fa fa-print"></i>&nbsp;Cetak</a>
					  </td>
                  </tr>
				  
				  <?php $no_byr++;} ?>
				  
				  <tr class="table-swarning">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><strong>TOTAL</strong></td>
		<td align="right">
		<?php 
				$jum_by = $call_q("select sum(nominal) as nom from biaya_02_rekam_bri where idmahasiswa='$kdmhs' and app='3'");
					$jum_byy = $call_fas($jum_by);
					$jum02= @number_format($jum_byy['nom'],"0","",".");
					echo"Rp.$jum02";
					
		 ?>		</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	  </tr>
	  
	  
				  
                </table>
				<div style="margin-top:2.4rem; "></div>
				<?php 
					$by_r_02 = $call_q("$call_sel biaya_02_rekam_bri where idmahasiswa='$kdmhs' AND app='3' order by tgl desc ");
							$byy_r_02 = $call_fas($by_r_02);
							$jum_byr = mysql_query("select sum(nominal) as nom from biaya_02_rekam_bri where idmahasiswa='$kdmhs' AND app='3' AND idmain_rekam='$byy_r_02[idmain_rekam]'");
					$jum_byyr = mysql_fetch_array($jum_byr);
					$jum02= @number_format($jum_byyr['nom'],"0","",".");
					//echo"Rp.";
				?>
					<center>
			<?php if(empty($byy_r_02['kode'])){echo"";}else{ ?>		
			
				<div class="alert alert-dismissible alert-success" style="max-width:30rem; ">
						<?php echo"Kode :<b>$byy_r_02[idmain_rekam]</b><br>"; 
						echo"Mhs:<b>$mhss[nama]</b><br>";
						echo"jumlah:<b>$jum_byyr[nom]</b><br>";
						echo"keterangan:<b>$kdmhs</b><br>";
						echo"Akan di buatkan kode bayar Briva";
						?><br>
							<a href="#" onClick="MM_openBrWindow('<?php echo"http://sikadu.unwahas.ac.id/BU/test/briva/LAP_GAWE.php?IDKODE=$byy_r_02[idmain_rekam]&IDMHS=$kdmhs&JUM=$jum_byyr[nom]&KET=$mhss[nama]#AMBIL=AMBIL&SAVING";?>','','scrollbars=yes,width=500,height=200')" class="btn btn-primary btn-sm">Proses Sekarang</a>
							</div>
							<?php } ?>
						<br>
						<!-- <button class="btn btn-info btn-sm" name="simpan" onClick="return konfirmasi_simpan()"><i class="fa fa-send"></i>&nbsp;Ambil kode pembayaran</button>&nbsp;	
							</center>-->
		
	</form>
			<?php 
			/*
				if(isset($_GET['AMBIL'])){
					include"../BU/test/briva/create_briva.php";
				
				}
				*/
			?>
	<?php } ?>
		