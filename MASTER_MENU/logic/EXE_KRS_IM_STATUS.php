<?php
    if(isset($_POST['impbtn'])){
        $no_krs02 = 1;
            while($no_krs02 <= $cn_vmhs01_sw){
                $nim = @$sql_escape($_POST['nim'.$no_krs02]);
                $smt = @$sql_escape($_POST['smt'.$no_krs02]);
                $kj = @$sql_escape($_POST['kj'.$no_krs02]);
                $acc = @$sql_escape($_POST['acc'.$no_krs02]);
                $krs = @$sql_escape($_POST['krs'.$no_krs02]);
                $mhs = @$sql_escape($_POST['mhs'.$no_krs02]);
                $st = @$sql_escape($_POST['st'.$no_krs02]);
                $uts = @$sql_escape($_POST['uts'.$no_krs02]);
                $uas = @$sql_escape($_POST['uas'.$no_krs02]);
                $save_krs_im_01 = $call_q("$in krs_tahun (idkrs_tahun,acc,krs,mhs,st,uts,uas,idmahasiswa,idsemester,idkejuruan)VALUES('','$acc','$krs','$mhs','$st','$uts','$uas','$nim','$smt','$kj')");
                        //$save_krs_im_01 = "";
                      
                    if($save_krs_im_01){
                        echo"<span class=badge-success>$nim Sukses tersimpan</span><br>";
					//include"../sd/LOAD_SUCCESS.php";
			}else{
                
				include"../sd/LOAD_FAILED.php";
            }
            $no_krs02++; }
?>

    <?php } ?>