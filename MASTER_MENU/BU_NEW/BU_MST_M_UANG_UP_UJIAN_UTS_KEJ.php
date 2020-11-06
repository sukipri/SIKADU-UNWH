<?php 
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
		?>
		 <div style="padding-top:20px;"></div>
		<span class="badge badge-success">#Update Global UTS</span>
       	 <hr> 
         <form method="post">
         
         <div class="input-group input-group-sm mb-3">
              <select required name="kej" style="max-width:10rem;" class="form-control form-control-sm">
                <option>Progdi</option>
                <?php
                     $vkjj_sw = $call_q("$sl idkejuruan,idfakultas,progdi,kejuruan FROM  kejuruan order by idkejuruan");
                         while($vkjj_sww = $call_fas($vkjj_sw)){
                         echo" <option value=$vkjj_sww[idkejuruan]>$vkjj_sww[idkejuruan]&nbsp; / &nbsp;$vkjj_sww[kejuruan]&nbsp;$vkjj_sww[progdi]</option>";
                    }
                 ?>
     	 </select>
         <select name="tahun_ajaran" style="max-width:10rem;" class="form-control form-control-sm" required>
            <option value="">Tahun ajaran</option>
			<?php
				$vajr_sw = $call_q("$call_sel tahun_ajaran order by ajaran desc limit 10");            
					while($vajr_sww = $call_fas($vajr_sw)){
						
							echo"<option value=$vajr_sww[idtahun_ajaran]>$vajr_sww[ajaran]</option>";	
					}
            ?>
            </select>
              <div class="input-group-append">
                <button name="unw_bu_uts_cari_01" class="btn btn-success">UPDATE</button>
              </div>
		</div>
         </form>
     <?php 
	 	if(isset($_POST['unw_bu_uts_cari_01'])){
			$kej = @$sql_escape($_POST['kej']);
			$tahun_ajaran = @$sql_escape($_POST['tahun_ajaran']);
			
	 	?>	
		 <meta http-equiv="refresh" content="0; url=<?php echo"?HLM=BU_MST_M&SUB=BU_MST_M_UANG&SUB_CHILD=BU_MST_M_UANG_UP_UJIAN&SUB_CHILD_02=BU_MST_M_UANG_UP_UJIAN_UTS&IDKEJ01=$kej&IDAJR01=$tahun_ajaran"; ?>">
		<?php } ?>  
         
         
       <?php } ?>