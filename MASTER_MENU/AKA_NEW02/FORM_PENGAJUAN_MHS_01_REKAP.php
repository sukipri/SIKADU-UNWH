<?php 
	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
	
 ?>
 		<h5><i class="far fa-file"></i>&nbsp;REKAP PENGAJUAN CUTI - </h5>
        <br>
      	<span class="badge badge-info">#Daftar Ajuan</span>
      	<br><br>
        <form method="post">
        <div class="input-group input-grup-sm mb-3" style="max-width:30rem;">
          <input type="date" name="unw_form_tglinput_01" class="form-control form-control-sm" required>
          <input type="date" name="unw_form_tglinput02_01" class="form-control form-control-sm" required>
          <div class="input-group-append">
           <button class="btn btn-success btn-sm" name="unw_cari_form_ajuan_01">Cari Data</button>
          </div>
		</div>
        
        </form>
        <?PHP 
			if(isset($_POST['unw_cari_form_ajuan_01'])){
				$unw_form_tglinput_01 = @$sql_escape($_POST['unw_form_tglinput_01']);
				$unw_form_tglinput02_01 = @$sql_escape($_POST['unw_form_tglinput02_01']);				
				
		?>
        
          <table width="100%" border="0" class="table table-bordered table-sm table-striped">
              <tr class="table-info">
                <td width="16%">Tanggal Input</td>
                <td width="21%">Tanggal Ajuan</td>
                <td width="16%">Jenis Ajuan</td> 
                <td width="25%">Keterangan</td>
                <td width="22%">Status</td>
              </tr>
              <?PHP 
			  
                $form_vaju01_sw = $call_q("$call_sel tb_form_ajuan_01   WHERE   form_tglinput_01 BETWEEN '$unw_form_tglinput_01' AND '$unw_form_tglinput02_01' order by form_tglinput_01 desc");
                    while($form_vaju01_sww = $call_fas($form_vaju01_sw)){
						//MHS
							$mhs_vmhs01_sw = $call_q("$sl idmahasiswa,idkejuruan,idsemester,idkelas,nama FROM mahasiswa WHERE idmahasiswa='$form_vaju01_sww[idmahasiswa]'");
              					$mhs_vmhs01_sww = $call_fas($mhs_vmhs01_sw);
						//-Semester-//
							$unw_vsem01_sw02 = $call_q("$call_sel semester WHERE idsemester='$form_vaju01_sww[idsemester]' ");
								$unw_vsem01_sww02 = $call_fas($unw_vsem01_sw02);
              ?>
              <tr>
                <td><?PHP echo "$mhs_vmhs01_sww[idmahasiswa]<br>$mhs_vmhs01_sww[nama]"; ?></td>
                <td><?PHP echo FS_DATE($form_vaju01_sww['form_tglajuan_01']); ?>
                	<br />
                    <?php echo"$unw_vsem01_sww02[semester]"; ?>
                </td>
                <td><?PHP echo "$form_vaju01_sww[form_jenis_01]"; ?></td>
                <td><?PHP echo "$form_vaju01_sww[form_ket_01]"; ?></td>
                <td>
                <?PHP if($form_vaju01_sww['form_status_01']=="KU2"){ ?>
                    <a href="<?PHP echo"?aka=FORM_PENGAJUAN_MHS_01_DTL&IDFAJU01=$form_vaju01_sww[idmain_form_ajuan_01]"; ?>" class="btn text-dark"><i class="fas fa-check"></i>&nbsp;belum Diproses</span></a>
                	
				<?PHP }elseif($form_vaju01_sww['form_status_01']=="AKA2"){ ?>
                <a href="<?PHP echo"?aka=FORM_PENGAJUAN_MHS_01_DTL&IDFAJU01=$form_vaju01_sww[idmain_form_ajuan_01]"; ?>" class="btn text-success"><span class="text-success"><i class="fas fa-check-circle"></i>&nbsp;Pengajuan Diterima</span></a>
                 <?PHP }elseif($form_vaju01_sww['form_status_01']=="AKA4"){ ?>
               <a href="<?PHP echo"?aka=FORM_PENGAJUAN_MHS_01_DTL&IDFAJU01=$form_vaju01_sww[idmain_form_ajuan_01]"; ?>" class="btn text-info"> <span class="text-info "><i class="fas fa-check-double"></i>&nbsp;Pengajuan Diproses</span></a>
                <?PHP }elseif($form_vaju01_sww['form_status_01']=="AKA3"){ ?>
                <a href="<?PHP echo"?aka=FORM_PENGAJUAN_MHS_01_DTL&IDFAJU01=$form_vaju01_sww[idmain_form_ajuan_01]"; ?>" class="btn text-danger"><span class="text-danger"><i class="fas fa-times-circle"></i>&nbsp;Pengajuan Ditolak</span></a>
                <?PHP } ?>
                </td>
              </tr>
              <?PHP } ?>
        </table>
        <?PHP } ?>
 
 <?PHP } ?>