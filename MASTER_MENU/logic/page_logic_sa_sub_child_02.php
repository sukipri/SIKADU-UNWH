<?php
    switch(@$sql_escape($_GET['SUB_CHILD_02'])){
        /*..... BU keuangan...................... */
            //..BRIVA..//
                case'BU_MST_M_UANG_RPT_TGH_BRI':
                    include"BU_MST_M_UANG_RPT_TGH_BRI.php";
                break;
            //..Export Data Tagihan..//
                case'BU_MST_M_DT_TGH_M_03_02':
                    include"BU_MST_M_DT_TGH_M_03_02.php";
                break;
                case'BU_MST_M_DT_TGH_M_03_02_KELAS':
                    include"BU_MST_M_DT_TGH_M_03_02_KELAS.php";
                break;
                case'BU_MST_M_DT_TGH_M_03_03':
                    include"BU_MST_M_DT_TGH_M_03_03.php";
                break;
            //Update kartu Ujian
            case'BU_MST_M_UANG_UP_UJIAN_UTS_KEJ':
                include"BU_MST_M_UANG_UP_UJIAN_UTS_KEJ.php";
            break;
                case'BU_MST_M_UANG_UP_UJIAN_UTS':
                    include"BU_MST_M_UANG_UP_UJIAN_UTS.php";
                break;
                case'BU_MST_M_UANG_UP_UJIAN_UAS':
                    include"BU_MST_M_UANG_UP_UJIAN_UAS.php";
                break;

    }


?>