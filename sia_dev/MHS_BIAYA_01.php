<?php 
	//session_start();
	// include_once"../sc/conek.php";
	 //include_once"css.php";
	
		
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
			//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
			header('location:index.php');
		} else {
			?>
           
		<h3 class="badge badge-info">#Biaya Kuliah Mahasiswa</h3>
        <br />
        <table width="100%" class="table table-bordered table-sm" style="max-width:40rem;">
        <tr class="table-success">
        	<td width="4%">#</td>
            <td width="18%">Kode Biaya</td>
            <td width="23%">KODE Biaya</td>
            <td width="25%">Nominal</td>
            <td width="30%">&nbsp;</td>
            <td width="30%">Status</td>
        </tr>
         <?php 
   		$no_mhs02 = 1;
		$vtrec01_sw = $call_q("$call_sel tb_tagihan_01_rec WHERE idmahasiswa='$kdmhs'");
   			while($vtrec01_sww = $call_fas($vtrec01_sw)){
				//..//
			$vjtgh_sw = $call_q("$sl idmain_jenis_tagihan,nama FROM tb_jenis_tagihan WHERE idmain_jenis_tagihan='$vtrec01_sww[idmain_jenis_tagihan]'");
				$vjtgh_sww = $call_fas($vjtgh_sw);
		//..NOM..//
			$nom_vtrec01_sw = @$nf($vtrec01_sww['nom01']);
		?>
  	
        <tr>
        	<td><?php echo"$no_mhs02"; ?></td>
            <td><?php echo"$vtrec01_sww[kode]"; ?></td>
            <td><?php echo"$vjtgh_sww[nama]"; ?></td>
            <td><?php echo"Rp.$nom_vtrec01_sw"; ?></td>
            <td>
            	  <?php if($vtrec01_sww['status']=="1"){ ?>
            		<a href="<?php echo"?mng=MHS_BIAYA_01&SVBY=SVBY&IDBYR01=$vtrec01_sww[idmain_tagihan_01_rec]&IDJKDBY01=$vjtgh_sww[nama]&BYNOM01=$vtrec01_sww[nom01]&BYKDURT01=$vtrec01_sww[kode_urut]"; ?>" class="btn btn-primary btn-sm"><i class="fas fa-share-square"></i>&nbsp;Tagihkan</a>
               <?php }elseif($vtrec01_sww['status']=="3"){ ?>
               <?php } ?>
            </td>
            <td>
            <?php if($vtrec01_sww['status']=="1"){ ?>
            		<span class="badge badge-warning">Belum Tertagih</span>
            <?php }elseif($vtrec01_sww['status']=="3"){ ?>
            <span class="badge badge-info">Tertagih</span>
            <?php } ?>
            </td>
        </tr>
    		<?php $no_mhs02++; } ?>
         <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        </table>
        		<!-- BTN SVBY -->
                		<?php
						//..// 
							
						//.//
							if(isset($_GET['SVBY'])){
								
								$save_biaya_01 = $call_q("$in tb_tagihan_01_temp(idmain_tagihan_01_temp,idmain_tagihan_01_rec,idmahasiswa,kode,kode_tagihan,kode_urut,nom01,tglinput,status,uploader)VALUES('$IDMAIN','$IDBYR01','$kdmhs','$c_kode_vttemp01','$IDJKDBY01','$BYKDURT01','$BYNOM01','$date_html5','1','$kdmhs')");  
								$up_biaya_rec = $call_q("$up tb_tagihan_01_rec set status='3' WHERE idmain_tagihan_01_rec='$IDBYR01'");	
									if($save_biaya_01){
										include"LAYOUT/NOTIF/NF_SAVE_SUCCESS.php";
								?>		
								   <meta http-equiv="refresh" content="0; url=<?php echo"?mng=MHS_BIAYA_01"; ?>">
				        <?php }else{ include"LAYOUT/NOTIF/NF_SAVE_FAILED.php";	 ?>
                        	
                            <?php }} ?>
                <!--  -->
        		
          <!-- -->
          	<br />
			<?php include"MHS_BIAYA_01_VIEW.php"; ?>
          <!-- -->
            
 <?php } ?>