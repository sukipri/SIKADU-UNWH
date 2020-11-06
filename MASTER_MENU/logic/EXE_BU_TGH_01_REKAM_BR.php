<?php
    
        $no_mhs_tgh = 1;
        echo"$jum_vmhs01_sw";
        $tgh_tgl = @$sql_escape($_POST['tgh_tgl']);
        $idsemester = @$sql_escape($_POST['idsemester']);
        while($no_mhs_tgh <= $jum_vmhs01_sw){
               $kode_urut = @$sql_escape($_POST['kode_urut'.$no_mhs_tgh]);
                $kode_tgh_rec = @$sql_escape($_POST['kode_tgh_rec'.$no_mhs_tgh]);
                $idmain = @$sql_escape($_POST['idmain'.$no_mhs_tgh]);
                $idsemester = @$sql_escape($_POST['idsemester'.$no_mhs_tgh]);
                $idkejuruan = @$sql_escape($_POST['idkejuruan'.$no_mhs_tgh]);
                $tgh_nom = @$sql_escape($_POST['tgh_nom'.$no_mhs_tgh]);
                $nim = @$sql_escape($_POST['nim'.$no_mhs_tgh]);
                $nama = @$sql_escape($_POST['nama'.$no_mhs_tgh]);
                $kode_bayar = @$sql_escape($_POST['kode_bayar'.$no_mhs_tgh]);
                $idmain_tagihan = @$sql_escape($_POST['idmain_tagihan'.$no_mhs_tgh]);
               
                //echo"$kode_tgh_rec-";
                //$save_tgh_01_rekam = $call_q("$in biaya_02_rekam (id_biaya_rekam,idmahasiswa,nama,kode_bayar,kode,nominal,tgl,idsemester,device)VALUES('','$nim','$nama','$kode_bayar','$kode_urut','$tgh_nom','$date_html5','$idsemester','TEST')");
                $save_tgh_01_rekam_bri = $call_q("$in biaya_02_rekam_bri (id_biaya_rekam,idmahasiswa,nama,kode_bayar,kode,nominal,tgl,idsemester,app,device,THN,idmain_tagihan_01,idkejuruan)VALUES('','$nim','$nama','$kode_bayar','$kode_urut','$tgh_nom','$date_html5','$idsemester','1','TEST','$IDAJR01','$idmain_tagihan','$idkejuruan')");
               /*
                if($save_tgh_01_rekam_bri){
                   include"../sd/LOAD_SUCCESS.php"; 
                }else{
                    include"../sd/LOAD_FAILED.php"; 
                }*/
                $no_mhs_tgh++;
            }

    ?>   
        <meta http-equiv="refresh" content="0; url=<?php echo"?HLM=BU_MST_M&SUB=BU_MST_M_DT_TGH_M&SUB_CHILD=BU_MST_M_DT_TGH_M_03_01&SUB_CHILD_02=BU_MST_M_DT_TGH_M_03_03&IDKEJ01=$IDKEJ01&IDJTGH01=$IDJTGH01&IDAJR01=$IDAJR01"; ?>">
        <?php  ?>