<?php 
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
		?>
       <div style="padding-top:20px;"></div>
		<span class="badge badge-success">#Update Global UAS</span>
       	 <hr> 
  <form method="post">
        <div style="overflow:auto;width:auto;height:400px;padding:10px;border:1px solid #eee">
        <table width="100%" border="0" class="table table-bordered table-sm table-striped" style="max-width:60rem;">
              <tr class="table-primary">
                <td width="3%">#</td>
                <td width="16%">NIM</td>
                <td width="57%">Nama</td>
                <td width="24%">&nbsp;</td>
              </tr>
              <?php 
			  	$unw_uts_no = 1;
				//MAHASISWA
					$unw_vmhs01_sw = $call_q("$sl idmahasiswa,idkejuruan,idsemester,nama,idtahun_ajaran,idsemester  FROM mahasiswa WHERE mhs='2' AND krs='2' AND idsemester='$vsmm_up[idsemester]' ");
						$unw_cn_vmhs01_sw = $call_nr($unw_vmhs01_sw);
						while($unw_vmhs01_sww = $call_fas($unw_vmhs01_sw)){
				//REKAM BRI
			  	$unw_vrbri01_sw = $call_q("$sl id_biaya_rekam,idmain_rekam,idmahasiswa,idsemester,app FROM biaya_02_rekam WHERE idmahasiswa='$unw_vmhs01_sww[idmahasiswa]' AND app='2' AND  idsemester='$vsmm_up[idsemester]'");
			  		$unw_cn_vrbri01_sww = $call_nr($unw_vrbri01_sw);

			  ?>
              	<input type="hidden" value="<?php echo"$unw_vmhs01_sww[idmahasiswa]"; ?>" name="<?php echo"unw_nim$unw_uts_no"; ?>">
              <tr>
                <td><?php echo"$unw_uts_no"; ?></td>
                <td><?php echo"$unw_vmhs01_sww[idmahasiswa]"; ?></td>
                <td><?php echo"$unw_vmhs01_sww[nama]"; ?></td>
                <td>
                <!-- -->
                	<?php
						
							
						if($unw_cn_vrbri01_sww < 1  ){ 
							//echo"$unw_cn_vrbri01_sww";
							//$aktif_uts = "2";
							//echo"$aktif_uts";
						?>
                        	 <input type="hidden" value="<?php echo"1"; ?>" name="<?php echo"unw_uts$unw_uts_no"; ?>"> 
							<span class="badge badge-warning">#masih ada tagihan</span>
                        	 
						<?php }elseif($unw_cn_vrbri01_sww > 0 ){
								//$aktif_uts = "1";
									//echo"$aktif_uts";
							 ?>
                             <input type="hidden" value="<?php echo"2"; ?>" name="<?php echo"unw_uts$unw_uts_no"; ?>"> 
							<span class="badge badge-success">#Tidak ada tagihan</span>
             
                       
                        <?php } ?>
                <!-- -->
                </td>
              </tr>
              <?php $unw_uts_no++;} ?>
		</table>
	</div>
    <br><br>
        <button name="unw_bu_uas_simpan_01" class="btn btn-success">UPDATE</button>
</form> 
        	<!-- -->
            	<?php include"../logic/EXE_BU_UJIAN_UAS.php"; ?>
            <!-- -->
<?php } ?>