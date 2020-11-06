<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
		?>
			
           		<div class="list-group" style="max-width:25rem;">
                 <div style="overflow:auto;width:auto;height:360px;padding:10px;border:1px solid #eee">
                 <?php
				 	$no_kode_kelas = 0;
				 		$kode_kelas = array("REG","EKS","PAKET","PA","PB","BM","BSW");
						
							while($no_kode_kelas < count($kode_kelas)){
					/*
					$vkls01_sw = $call_q("$call_sel kelas order by idkelas asc");
						while($vkls01_sww = $call_fas($vkls01_sw)){
							*/
					?>
                    	<a href="<?php echo"?HLM=BU_MST_M&SUB=BU_MST_M_DT_TGH_M&SUB_CHILD=BU_MST_M_DT_TGH_M_03_01&SUB_CHILD_02=BU_MST_M_DT_TGH_M_03_03&IDKEJ01=$IDKEJ01&IDJTGH01=$IDJTGH01&IDAJR01=$IDAJR01&IDKLS01=$kode_kelas[$no_kode_kelas]"; ?>" class="list-group-item list-group-item-action"><?php echo"$kode_kelas[$no_kode_kelas]"; ?></a>	
							
		<?php $no_kode_kelas++; } ?>
        </div>
                </div>
        
        
        <?php } ?>