<?php 
	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
	
 ?>
 	<?PHP 
	      $form_vaju01_sw = $call_q("$call_sel tb_form_ajuan_01  WHERE idmain_form_ajuan_01='$IDFAJU01'");
                  $form_vaju01_sww = $call_fas($form_vaju01_sw);
				  //MHS
							$mhs_vmhs01_sw = $call_q("$sl idmahasiswa,idkejuruan,idsemester,idkelas,nama FROM mahasiswa WHERE idmahasiswa='$form_vaju01_sww[idmahasiswa]'");
              					$mhs_vmhs01_sww = $call_fas($mhs_vmhs01_sw);
					//-Semester-//
					$unw_vsem01_sw02 = $call_q("$call_sel semester WHERE idsemester='$form_vaju01_sww[idsemester]' ");
						$unw_vsem01_sww02 = $call_fas($unw_vsem01_sw02);
	?>
 		<h5><i class="far fa-file"></i>&nbsp;FORM PENGAJUAN <?PHP echo"$form_vaju01_sww[form_jenis_01] - $mhs_vmhs01_sww[nama]"; ?> </h5>
        <br>
      	<span class="badge badge-danger">#Detail Ajuan</span>
      	<br><br>
        <form method="post">
        
        <div class="card border-primary mb-3" style="max-width: 20rem;">
          <div class="card-header">Verifikasi pengajuan mahasiswa</div>
          <div class="card-body">
            <!-- -->
            	<input type="text" readonly="readonly" class="form-control form-control-sm" value="<?PHP echo"$form_vaju01_sww[form_kode_01]"; ?>" />
                <br />
                
                <input type="text" readonly="readonly" class="form-control form-control-sm" value="<?PHP echo"$form_vaju01_sww[idmahasiswa]"; ?>" />
                 <br />
                 
                 <input type="text" readonly="readonly" class="form-control form-control-sm" value="<?PHP echo"$unw_vsem01_sww02[semester]"; ?>" />
               	 <br />
                 
                <input type="text" readonly="readonly" class="form-control form-control-sm" value="<?PHP echo"$mhs_vmhs01_sww[nama]"; ?>" />
                <br />
            	
                Keterangan Ajuan
                <br />
            	<textarea name="#" class="form-control" readonly="readonly"><?PHP echo"$form_vaju01_sww[form_ket_01]"; ?></textarea>
               	<br />
                 <?PHP if($form_vaju01_sww['form_status_01']=="KU2"){ ?>
                    <a href="<?PHP echo"?ku=FORM_AJUAN_MHS_01_DTL&IDFAJU01=$form_vaju01_sww[idmain_form_ajuan_01]"; ?>" class="btn text-dark"><i class="fas fa-check"></i>&nbsp;belum Diproses</span></a>
                <?PHP }elseif($form_vaju01_sww['form_status_01']=="AKA2"){ ?>
                <span class="text-success"><i class="fas fa-check-circle"></i>&nbsp;Pengajuan Diterima</span>
                 <?PHP }elseif($form_vaju01_sww['form_status_01']=="AKA4"){ ?>
                <span class="text-info "><i class="fas fa-check-double"></i>&nbsp;Pengajuan Diproses</span>
                <?PHP }elseif($form_vaju01_sww['form_status_01']=="AKA3"){ ?>
                <span class="text-danger"><i class="fas fa-times-circle"></i>&nbsp;Pengajuan Ditolak</span>
                <?PHP } ?>
                 <select name="form_status_01" class="form-control form-control-sm" requred>
                 <option value="">Status</option>
                 
                 <option value="AKA2">Diterima</option>
                 <option value="AKA3">DiTolak</option>
                 <option value="AKA4">Diproses</option>
                 </select>
                 
                Catatan
                <br />
            	<textarea required name="form_ketjawab_01" class="form-control"><?PHP echo"$form_vaju01_sww[form_ketjawab_01]"; ?></textarea>
                
                <br />
                <button name="unw_form_ajuan_up_01" class="btn btn-success btn-sm"><i class="fas fa-paper-plane"></i>&nbsp;Kirim Ajuan</button>
                
            <!-- -->
          </div>
		</div>
        </form>
        	<?PHP if(isset($_POST['unw_form_ajuan_up_01'])){ 
						$form_status_01 = @$sql_escape($_POST['form_status_01']);
						$form_ketjawab_01 = @$sql_escape($_POST['form_ketjawab_01']);
							
								$up_form_ajuan_01 = $call_q("$up tb_form_ajuan_01 set form_status_01='$form_status_01',form_ketjawab_01='$form_ketjawab_01' WHERE idmain_form_ajuan_01='$IDFAJU01'");
			
			?>
            		<meta http-equiv="refresh" content="0; url=<?php echo"?aka=FORM_PENGAJUAN_MHS_01_DTL&IDFAJU01=$IDFAJU01"; ?>">	
 			<?PHP } ?>
 <?PHP } ?>