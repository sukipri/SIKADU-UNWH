    <?php
        //DATA QUERING
        /*KEUANGAN.........................................................................*/
            //Jenis tagihan
			$vjtgh = $call_q("$sl kode FROM tb_jenis_tagihan ");
                    $nr_vjtgh = $call_nr($vjtgh);
                    $hit_vjtgh = $nr_vjtgh + 1;
                    $hit_zero = sprintf("%02d", $hit_vjtgh);
                    $c_kode_vjtgh= "JT$date_ack_tiny$hit_zero";
            //master Tagihan 01
                $vtgh01 = $call_q("$sl kode FROM tb_tagihan_01 ");
                    $nr_vtgh01 = $call_nr($vtgh01);
                    $hit_vtgh01 = $nr_vtgh01 + 1;
                    $hit_zero = sprintf("%02d", $hit_vtgh01);
                    $c_kode_vtgh01= "TG$date_ack_tiny$hit_zero";
            //master Tagihan 01 rec
                $vtghr01 = $call_q("$sl kode FROM tb_tagihan_01_rec ");
                    $nr_vtghr01 = $call_nr($vtghr01);
                    $hit_vtghr01 = $nr_vtghr01 + 1;
                    $hit_zero_vtghr01 = sprintf("%02d", $hit_vtghr01);
                    $c_kode_vtghr01= "REC$date_ack_tiny$hit_zero_vtghr01";
            //master tb_info_keu
            $vinkeu01 = $call_q("$sl info_kode_keu FROM tb_info_keu ");
            $nr_vinkeu01 = $call_nr($vinkeu01);
            $hit_vinkeu01 = $nr_vinkeu01 + 1;
            $hit_zero_vinkeu01 = sprintf("%02d", $hit_vinkeu01);
            $c_kode_vinkeu01= "IKEU$date_ack_tiny$hit_zero_vinkeu01";
        /*MAHASIWA.........................................................................*/
                //tb_tagihan_temp
                $vttemp01 = $call_q("$sl kode FROM tb_tagihan_01_temp ");
                    $nr_vttemp01 = $call_nr($vttemp01);
                    $hit_vttemp01 = $nr_vttemp01 + 1;
                    $hit_zero_vttemp01 = sprintf("%02d", $hit_vttemp01);
                    $c_kode_vttemp01= "REC$date_ack_tiny$hit_zero_vttemp01";
                //TB_FORM_AJUAN_01
                 $vfaju01 = $call_q("$sl form_kode_01 FROM tb_form_ajuan_01 ");
                    $nr_vfaju01 = $call_nr($vfaju01);
                    $hit_vfaju01 = $nr_vfaju01 + 1;
                    $hit_zero_vfaju01 = sprintf("%02d", $hit_vfaju01);
                    $c_kode_vfaju01= "FAJ$date_ack_tiny$hit_zero_vfaju01";
            
    //for default condition
        //DATA GET//
            /*Keuangan*/
                //DELETE//
                $IDDELTGH = @$sql_escape($_GET['IDDELTGH']);
               //GET VIEW//
                $IDTG101 = @$sql_escape($_GET['IDTG101']);
                $IDKEJ01  = @$sql_escape($_GET['IDKEJ01']);
                $IDJTGH01  = @$sql_escape($_GET['IDJTGH01']);
                $IDAJR01  = @$sql_escape($_GET['IDAJR01']);
                $IDKLS01 = @$sql_escape($_GET['IDKLS01']);

            /* AKADEMIK */
                $IDKJ01 = @$sql_escape($_GET['IDKJ01']);

            /* MAHASISWA */
                //GET VIEW//
                $IDMHS01 = @$sql_escape($_GET['IDMHS01']);
                $IDBYR01 = @$sql_escape($_GET['IDBYR01']); //ID Biaya tagihan
                $IDJKDBY01 = @$sql_escape($_GET['IDJKDBY01']); //Jenis tagihan
                $BYNOM01 = @$sql_escape($_GET['BYNOM01']); //Nominal
                $BYKDURT01 = @$sql_escape($_GET['BYKDURT01']); //Kode urut Pembayaran
                $IDBTREC01  = @$sql_escape($_GET['IDBTREC01']); //idmain tagihan_rec
                //DELETE//
                $IDDELTTEMP= @$sql_escape($_GET['IDDELTTEMP']);

            /*ADmin Fakultas */
                $IDFAJU01 = @$sql_escape($_GET['IDFAJU01']);
				


    //SEMESTER
    $vsm_a = $call_q("$call_sel semester WHERE aktif='2'");
    $vsm_aa = $call_fas($vsm_a);
 

?>