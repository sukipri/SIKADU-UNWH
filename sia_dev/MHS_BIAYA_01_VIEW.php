<?php 
	//session_start();
	// include_once"../sc/conek.php";
	 //include_once"css.php";
		error_reporting(0);
		
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
			//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
			header('location:index.php');
		} else {
?>
<h3 class="badge badge-warning">#Biaya Tertagih</h3>
	<form method="post">
       <table width="100%" border="0" class="table table-bordered table-sm" style="max-width:40rem;">
              <tr class="table-info">
                <td width="2%">#</td>
                <td width="24%">KODE BIAYA</td>
                <td width="36%">NIM</td>
                <td width="25%">Nominal</td>
                <td width="13%">###</td>
              </tr>
            <?php 
				$no_tgh = 1;
				$vttmp01_sw = $call_q("$sl idmain_tagihan_01_temp,idmain_tagihan_01_rec,idmahasiswa,kode,kode_tagihan,kode_urut,nom01,status FROM tb_tagihan_01_temp WHERE idmahasiswa='$kdmhs' AND status='1' order by tglinput desc");
					$cn_vttmp01_sw02 = $call_nr($vttmp01_sw);
					while($vttmp01_sww = $call_fas($vttmp01_sw)){
					//..CN SUM//
					$cn_vttmp01_sw = $call_q("$sl SUM(nom01) as cn_jum_nom01 FROM tb_tagihan_01_temp WHERE  idmahasiswa='$kdmhs' AND status='1' ");
						$cn_vttmp01_sww = $call_fas($cn_vttmp01_sw);
					//..NOM..//
						$nom_vttmp01_sw = @$nf($vttmp01_sww['nom01']);
						$nom_cn_vttmp01_sw = @$nf($cn_vttmp01_sww['cn_jum_nom01']);
					//..DEclare..//
						$kode_urut_in = "$vttmp01_sww[kode_urut]$vttmp01_sww[kode_tagihan]$mhss[idsemester]";
						
			?>
            	
              <tr>
                <td><?php echo"$no_tgh"; ?>
                	<input type="hidden" name="<?php echo"idmain_temp$no_tgh"; ?>" value="<?php echo"$vttmp01_sww[idmain_tagihan_01_temp]"; ?>">
                    <input type="hidden" name="<?php echo"by_kdtgh$no_tgh"; ?>" value="<?php echo"$vttmp01_sww[kode_tagihan]"; ?>">
                    <input type="hidden" name="<?php echo"kode_urut$no_tgh"; ?>" value="<?php echo"$kode_urut_in"; ?>">
                    <input type="hidden" name="<?php echo"by_nom01$no_tgh"; ?>" value="<?php echo"$vttmp01_sww[nom01]"; ?>">
                </td>
                <td><?php echo"$vttmp01_sww[kode_tagihan]"; ?></td>
                <td><?php echo"$vttmp01_sww[idmahasiswa]"; ?></td>
                <td><?php echo"Rp.$nom_vttmp01_sw"; ?></td>
                <td>
                <?php if($vttmp01_sww['status']=="1"){ ?>
                		<a href="<?php echo"?mng=MHS_BIAYA_01&DELTTEMP=DELTTEMP&IDDELTTEMP=$vttmp01_sww[idmain_tagihan_01_temp]&IDBTREC01=$vttmp01_sww[idmain_tagihan_01_rec]"; ?>" class="badge badge-warning" onclick="return konfirmasi_del()"><i class="far fa-times-circle"></i>&nbsp;Tarik</a>
                <?php } ?>
                </td>
              </tr>
              <?php $no_tgh++; } ?>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td class="table-primary"><?php echo"Rp.$nom_cn_vttmp01_sw"; ?></td>
                <td class="table-primary">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td colspan="2"><p>
                		
                  		<select name="by_bank_temp" class="form-control form-control-sm" required style="max-width:16rem;">
                        <option value="">#Pembayaran Melalui</option>
                        <option value="BRI">BRI</option>
                        <option value="BJT">Bank Jateng</option>
                        </select>
                  <br><br>
                  <button name="by_temp" class="btn btn-success btn-sm"><i class="fas fa-file-upload"></i>&nbsp;Unggah ke Tagihan</button>
                </p></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
      </table>
    	
        	<!-- -->
            	<?php 
					
					$no_tgh02 = 1;
					if(isset($_POST['by_temp'])){
						$by_bank_temp = @$_POST['by_bank_temp'];
						$kode_bayar = "";
						
							if($by_bank_temp=="BRI"){
									//echo"BRI";
									while($no_tgh02 <= $cn_vttmp01_sw02){
										if(empty($_POST['by_kdtgh'.$no_tgh02])){
												echo"<font color=blue><b>Tertagih kosong</b></font>";
										}else{
										$idmain_temp = @$_POST['idmain_temp'.$no_tgh02];
										$by_kdtgh = @$_POST['by_kdtgh'.$no_tgh02];
										$by_nom01 = @$_POST['by_nom01'.$no_tgh02];
										$kode_urut = @$_POST['kode_urut'.$no_tgh02];
											//echo"$by_kdtgh";
										$save_by_bri_01 = $call_q("$in biaya_02_rekam_bri (id_biaya_rekam,idmain_rekam,idmahasiswa,nama,kode_bayar,kode,nominal,tgl,idsemester,app,bank)VALUES('','','$kdmhs','$mhss[nama]','$by_kdtgh','$kode_urut','$by_nom01','$date_html5 $time_html5','$mhss[idsemester]','1','BRI')");
										$up_biaya_01 = $call_q("$up tb_tagihan_01_temp set status='3' WHERE idmain_tagihan_01_temp='$idmain_temp' ");
									$no_tgh02++;}}
								?>
	                                <meta http-equiv="refresh" content="0; url=<?php echo"?mng=MHS_BIAYA_01"; ?>">
								<?php
                            }elseif($by_bank_temp=="BJT"){
									//echo"Jateng";
								$save_by_bjt_01 = $call_q("");
							}
					}
				?>
            	
            <!-- -->
            	<?php 
						if(isset($_GET['DELTTEMP'])){
							$call_q("$del FROM tb_tagihan_01_temp WHERE idmain_tagihan_01_temp='$IDDELTTEMP'");
							$call_q("$up tb_tagihan_01_rec set status='1' WHERE idmain_tagihan_01_rec='$IDBTREC01'");
				?>
                	<meta http-equiv="refresh" content="0; url=<?php echo"?mng=MHS_BIAYA_01"; ?>">	
				<?php } ?>
                    
            <!-- -->
            	
</form>
			
   <?php } ?>