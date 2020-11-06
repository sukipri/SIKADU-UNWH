<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
	<span class="badge badge-success">#Import Global Aktifitas KRS mahasiswa</span> &nbsp;   <a href="<?php echo"?HLM=APPS_M&SUB=APPS_IM_KRS_M&SUB_CHILD=APPS_IM_KRS_M_GL_VIEW"; ?>" class="badge badge-warning"><i class="far fa-eye"></i>&nbsp;List import</a>
    <br /><br />
    <form method="post">
    <div class="input-group input-group-sm mb-3" style="max-width:25rem;">
      <select name="kj" class="form-control form-control-sm" required>
      	<option value="">Kejuruan</option>
        <?php 
		$vkj01_sw = $call_q("$sl idkejuruan,idjur,kejuruan FROM kejuruan order by kejuruan asc");
			while($vkj01_sww = $call_fas($vkj01_sw)){
				echo"<option value=$vkj01_sww[idkejuruan]>$vkj01_sww[kejuruan]</option>";
			}
		?>
      </select>
      <select name="smt" disabled="disabled" class="form-control form-control-sm" required>
      	<option value="">Semester</option>
        <?php 
		$vsmt01_sw02 = $call_q("$sl idsemester,idtahun_ajaran,semester,status,aktif FROM semester order by semester desc");	
				while($vsmt01_sww02 = $call_fas($vsmt01_sw02)){
					echo"<option value=$vsmt01_sww02[idsemester]>$vsmt01_sww02[semester]</option>";
				}
		?>
      </select>
          <div class="input-group-append">
            <button name="btnsmt" class="btn btn-success btn-sm">Proses</button>
          </div>
	</div>
    <?php
		if(isset($_POST['btnsmt'])){
			//$smt = @$sql_escape($_POST['smt']);
			$kj = @$sql_escape($_POST['kj']);
	?>
    	<b>#Result Proccess</b>
       
        <div style="overflow:auto;width:auto;height:360px;padding:10px;border:1px solid #eee">
    <table width="100%" border="0" class="table table-sm table-bordered table-striped" style="max-width:60rem;">
          <thead>
          <tr class="table-info">
            <td width="3%">#</td>
            <td width="22%">NIM</td>
            <td width="42%">Nama</td>
            <td width="16%">Kelas</td>
            <td width="17%">Status</td>
          </tr>
          </thead>
          <?php
		  	$no_krs = 1;
		  		$vmhs01_sw = $call_q("$sl idmahasiswa,idkejuruan,nama,idtahun_ajaran,mhs,krs,st,uts,uas,acc,idkelas FROM mahasiswa WHERE idkejuruan='$kj' ");
		 			$cn_vmhs01_sw = $call_nr($vmhs01_sw);
					while($vmhs01_sww = $call_fas($vmhs01_sw)){
						$vkj01_sw02 = $call_q("$sl idkejuruan,idjur,kejuruan FROM kejuruan WHERE idkejuruan='$kj'");
							$vkj01_sww02 = $call_fas($vkj01_sw02);
						
						
		  ?>
          <tr>
            <td><?php echo"$no_krs"; ?>
            <!-- TEx load table -->
            <input type="hidden" name="<?php echo"nim$no_krs"; ?>" value="<?php echo"$vmhs01_sww[idmahasiswa]"; ?>" />	
            <input type="hidden" name="<?php echo"smt$no_krs"; ?>" value="<?php echo"$vmhs01_sww[idsemester]"; ?>" />	
             <input type="hidden" name="<?php echo"kj$no_krs"; ?>" value="<?php echo"$vmhs01_sww[idkejuruan]"; ?>" />	
            <input type="hidden" name="<?php echo"mhs$no_krs"; ?>" value="<?php echo"$vmhs01_sww[mhs]"; ?>" />	
             <input type="hidden" name="<?php echo"st$no_krs"; ?>" value="<?php echo"$vmhs01_sww[st]"; ?>" />	
             <input type="hidden" name="<?php echo"acc$no_krs"; ?>" value="<?php echo"$vmhs01_sww[acc]"; ?>" />	
             <input type="hidden" name="<?php echo"uts$no_krs"; ?>" value="<?php echo"$vmhs01_sww[uts]"; ?>" />	
             <input type="hidden" name="<?php echo"uas$no_krs"; ?>" value="<?php echo"$vmhs01_sww[uas]"; ?>" />	
                
             <!-- -->
            </td>
            <td><?php echo"$vmhs01_sww[idmahasiswa]"; ?></td>
            <td><?php echo"$vmhs01_sww[nama]"; ?></td>
            <td><?php echo"Kelas <b>$vmhs01_sww[idkelas]</b><br>$vkj01_sww02[kejuruan]"; ?></td>
            <td>
             <!-- -->
            <?php
				$vkthn01_sw = $call_q("$sl idkrs_tahun,idmahasiswa,idsemester,idkejuruan FROM krs_tahun WHERE idsemester='$vsmt01_sww[idsemester]'  AND idmahasiswa='$vmhs01_sww[idmahasiswa]'");
					$jum_vkthn01_sw = $call_nr($vkthn01_sw);
			?>
            <?php if($jum_vkthn01_sw > 0) { ?> <span class="badge badge-success">#TerImport</span>
             <?php }else{ ?>
             <span class="badge badge-warning">#Free Import</span>
            <?php } ?>
            <!-- -->
            </td>
          </tr>
          <?php $no_krs++; } //echo"$cn_vmhs01_sw"; ?>
	</table>
    </div>
    <br />
    	<a href="<?php echo"?HLM=APPS_M&SUB=APPS_IM_KRS_M&SUB_CHILD=APPS_IM_KRS_M_GL_02&IDKJ01=$kj"; ?>" class="btn btn-outline-success"><i class="fas fa-cloud-upload-alt"></i>&nbsp;Ceking data</a>
	<?php } ?>
    </form>
   
           
<?php } ?>