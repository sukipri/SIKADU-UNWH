<?php
    if(isset($_POST['tgh_simpan'])){
        $no_mhs_tgh = 1;
        $tgh_tgl = @$sql_escape($_POST['tgh_tgl']);
        while($no_mhs_tgh <= $jum_vmhs01_sw){
                $kode_urut = @$sql_escape($_POST['kode_urut'.$no_mhs_tgh]);
                $kode_tgh_rec = @$sql_escape($_POST['kode_tgh_rec'.$no_mhs_tgh]);
                $idmain = @$sql_escape($_POST['idmain'.$no_mhs_tgh]);
                $idsemester = @$sql_escape($_POST['idsemester'.$no_mhs_tgh]);
                $idkejuruan = @$sql_escape($_POST['idkejuruan'.$no_mhs_tgh]);
                $tgh_nom = @$sql_escape($_POST['tgh_nom'.$no_mhs_tgh]);
                $nim = @$sql_escape($_POST['nim'.$no_mhs_tgh]);
                //echo"$kode_tgh_rec-";
                $save_tgh_01_rec = $call_q("$in tb_tagihan_01_rec(idmain_tagihan_01_rec,idmain_tagihan_01,idmahasiswa,idmain_jenis_tagihan,idtahun_ajaran,idgelombang,idsemester,idkejuruan,kode,kode_urut,nom01,nom02,tglinput,tglbayar,ket,status,uploader)VALUES('$idmain','$vtgh01_sww[idmain_tagihan_01]','$nim','$IDJTGH01','$IDAJR01','$vgl01_sww[idgelombang]','$idsemester','$idkejuruan','$kode_tgh_rec','$kode_urut','$tgh_nom','','$date_html5','','','1','$uu_bu[idbu]')");
                $no_mhs_tgh++;}

    ?>   
        <meta http-equiv="refresh" content="0; url=<?php echo"?HLM=BU_MST_M&SUB=BU_MST_M_DT_TGH_M&SUB_CHILD=BU_MST_M_DT_TGH_M_03_01&SUB_CHILD_02=BU_MST_M_DT_TGH_M_03_03&IDKEJ01=$IDKEJ01&IDJTGH01=$IDJTGH01&IDAJR01=$IDAJR01"; ?>">
        <?php } ?>