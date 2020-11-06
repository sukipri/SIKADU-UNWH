<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
?>
		<span class="badge badge-warning">#Pilih Angkatan</span>
        <br>
        	<div class="list-group" style="max-width:25rem;">
            <!-- -->
            <div style="overflow:auto;width:auto;height:360px;padding:10px;border:1px solid #eee">
            <?php
				$vtajar01_sw  = $call_q("$call_sel tahun_ajaran order by ajaran desc");
					while($vtajar01_sww = $call_fas($vtajar01_sw)){ 
			?>
			<a href="<?php echo"?HLM=BU_MST_M&SUB=BU_MST_M_DT_TGH_M&SUB_CHILD=BU_MST_M_DT_TGH_M_03_01&SUB_CHILD_02=BU_MST_M_DT_TGH_M_03_03&IDKEJ01=$IDKEJ01&IDJTGH01=$IDJTGH01&IDAJR01=$vtajar01_sww[idtahun_ajaran]"; ?>" class="list-group-item list-group-item-action"><?php echo"Angkatan <i>$vtajar01_sww[ajaran]</i>"; ?></a>
          	<?php } ?>
            </div>
            <!-- -->
			</div>	
        
<?php } ?>