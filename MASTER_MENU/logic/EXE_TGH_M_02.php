	<?php
			if(isset($_POST['simpan'])){
				$kode = @$sql_escape($_POST['kode']);
				$kode_urut = @$sql_escape($_POST['kode_urut']);
				$kej = @$sql_escape($_POST['kej']);
				$jenis_tagihan = @$sql_escape($_POST['jenis_tagihan']);
				$gelombang = @$sql_escape($_POST['gelombang']);
				$tahun_ajaran = @$sql_escape($_POST['tahun_ajaran']);
				$nominal = @$sql_escape($_POST['nominal']);
				$kode_kelas = @$sql_escape($_POST['kode_kelas']);
				$rule = @$sql_escape($_POST['rule']);
				$rule02 = @$sql_escape($_POST['rule02']);
				$ket = @$sql_escape($_POST['ket']);
					$save_tagihan_01 = $call_q("$in tb_tagihan_01(idmain_tagihan_01,idmain_jenis_tagihan,idgelombang,idtahun_ajaran,idkejuruan,kode,kode_urut,kode_kelas,rule,rule_02,nominal,ket,uploader)VALUES('$IDMAIN','$jenis_tagihan','$gelombang','$tahun_ajaran','$kej','$kode','$kode_urut','$kode_kelas','$rule','$rule02','$nominal','$ket','$uu_bu[idbu]')");
		if($save_tagihan_01){
					include"../sd/LOAD_SUCCESS.php";
			}else{
				include"../sd/LOAD_FAILED.php";
	?>
    
    <?php } }?>