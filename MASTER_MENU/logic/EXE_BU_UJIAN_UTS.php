<?php
    if(isset($_POST['unw_bu_uts_simpan_01'])){
        $unw_uts_no_02 = 1;
        while($unw_uts_no_02 <= $unw_cn_vmhs01_sw){
            $unw_nim = @$sql_escape($_POST['unw_nim'.$unw_uts_no_02]);
            $unw_uts = @$sql_escape($_POST['unw_uts'.$unw_uts_no_02]);
            
                //$unw_up_tgh_rbri_01 = $call_q("$up mahasiswa2 set uts='$unw_uts' WHERE idmahasiswa='$unw_nim'");
                $unw_up_tgh_rbri_01 = $call_q("$up mahasiswa2 set uts='2' WHERE idmahasiswa='$unw_nim'");

            //echo"Nyantoll";
            $unw_uts_no_02++; }}
    
?>
