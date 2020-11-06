<?php
    if(isset($_POST['up_bri'])){
        $no_bri = 1;
            while($no_bri<=$jum_data){
                $kode_bri = @$sql_escape($_POST['kode_bri'.$no_bri]);
                    $save_bri_01 = $call_q("$up biaya_02_rekam_bri set app='2',bank='BRI',tgl='now()' WHERE idmain_rekam='$kode_bri'");
                if($save_bri_01) {
                    echo"<font color=green><b>Berhasil>>$kode_bri</b></font><br>";
                }else{
                    echo"<font color=red><b>Gagal>>$kode_bri</b></font><br>";
                }
            $no_bri++; }

    }

?>