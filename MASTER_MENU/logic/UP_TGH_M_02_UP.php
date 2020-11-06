<?php
			if(isset($_POST['simpan'])){
				$kode_urut = @$sql_escape($_POST['kode_urut']);
				$kej = @$sql_escape($_POST['kej']);
				$jenis_tagihan = @$sql_escape($_POST['jenis_tagihan']);
				$gelombang = @$sql_escape($_POST['gelombang']);
				$tahun_ajaran = @$sql_escape($_POST['tahun_ajaran']);
				$nominal = @$sql_escape($_POST['nominal']);
				$ket = @$sql_escape($_POST['ket']);
				$rule = @$sql_escape($_POST['rule']);
				$rule02 = @$sql_escape($_POST['rule02']);
				$masa_biaya = @$sql_escape($_POST['masa_biaya']);
					$up_tagihan_01 = $call_q("$up tb_tagihan_01 set idmain_jenis_tagihan='$jenis_tagihan',idgelombang='$gelombang',idtahun_ajaran='$tahun_ajaran',idkejuruan='$kej',kode_urut='$kode_urut',rule='$rule',rule_02='$rule02',masa_biaya='$masa_biaya',nominal='$nominal' WHERE idmain_tagihan_01='$IDTG101'");
				
		if($up_tagihan_01){
					include"../sd/LOAD_SUCCESS.php";
			?>
				<meta http-equiv="refresh" content="0; url=<?php echo"?HLM=BU_MST_M&SUB=BU_MST_M_DT_TGH_M&SUB_CHILD=BU_MST_M_DT_TGH_M_02_UP&IDTG101=$IDTG101"; ?>">
			<?php }else{
				include"../sd/LOAD_FAILED.php";
	?>
    
    <?php } }?>