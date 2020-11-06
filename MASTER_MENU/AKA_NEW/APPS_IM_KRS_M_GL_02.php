<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
?>
	<a href="<?Php echo"?HLM=APPS_M&SUB=APPS_IM_KRS_M&SUB_CHILD=APPS_IM_KRS_M_GL_01"; ?>"><i class="fas fa-angle-double-left"></i></a> <span class="badge badge-info">#Importing Proccess  </span> &nbsp;
    <br>
    <?php
		$vkj01_sw = $call_q("$sl idkejuruan,idjur,kejuruan FROM kejuruan WHERE idkejuruan='$IDKJ01'");
			$vkj01_sww = $call_fas($vkj01_sw);
	?>
    	<h6 class="badge badge-success"><?php echo"$vkj01_sww[kejuruan]"; ?></h6>
		 <!-- -->
         <form method="post">
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
		  		$vmhs01_sw = $call_q("$sl idmahasiswa,idkejuruan,nama,idsemester,idtahun_ajaran,mhs,krs,st,uts,uas,acc,idkelas FROM mahasiswa WHERE idkejuruan='$IDKJ01' ");
		 			$cn_vmhs01_sw = $call_nr($vmhs01_sw);
					while($vmhs01_sww = $call_fas($vmhs01_sw)){
						$vkj01_sw02 = $call_q("$sl idkejuruan,idjur,kejuruan FROM kejuruan WHERE idkejuruan='$IDKJ01'");
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
	         <?php $no_krs++; } echo"Jumlah mahasiswa <b>$cn_vmhs01_sw</b>"; ?>
	</table>
      </div>
      <br>
      	<button name="impbtn" class="btn btn-success"><i class="fas fa-cloud-upload-alt"></i>&nbsp;Import data</button>
    </form>
     <!-- -->
      <div style="overflow:auto;width:400px;height:150px;padding:10px;border:1px solid #eee">
   		<?php include"../logic/EXE_KRS_IM_STATUS.php"; ?>
        </div>
    <!-- -->
<?php } ?>
