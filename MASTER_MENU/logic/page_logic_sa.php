	<?php  
			switch(@$sql_escape($_GET['HLM'])){
				default:
						//include"GRAF.php";
			break;
				case'FAK_M':
					include"FAK_M.php";
				break;
				case'KEJ_M':
					include"KEJ_M.php";
				break;
				case'KUR_M':
					include"KUR_M.php";
				break;
				case'SEM_M':
					include"SEM_M.php";
				break;
				case'DSN_M':
					include"DSN_M.php";
				break;
				case'SKS_M':
					include"SKS_M.php";
				break;
				case'MHS_M':
					include"MHS_M.php";
				break;
				case'USER_M':
					include"USER_M.php";
				break;
				case'CETAK_KARTU_CARI':
						include"CETAK_KARTU_CARI.php";
				break;
				case'CETAK_KARTU_CARI_PROGDI':
						include"CETAK_KARTU_CARI_PROGDI.php";
				break;
				case'CETAK_TRANS_CARI':
						include"CETAK_TRANS_CARI.php";
				break;
				case'CETAK_KHS_CARI':
						include"CETAK_KHS_CARI.php";
				break;
				case'CETAK_ABSEN_CARI':
						include"CETAK_ABSEN_CARI.php";
				break;
				case'GLOBAL_M':
						include"GLOBAL_M.php";
				break;
					case'MAIL_M':
						include"MAIL_M.php";
				break;

	//AKADEMIK_NEW
			//MASTER
				case'MST_M':
					include"MST_M.php";
				break;
			//APPS
				case'APPS_M':
					include"APPS_M.php";
				break;
			//REPORT
				case'LAP_M':
					include"LAP_M.php";
				break;

	//BU_NEW
				//MASTER
					case'BU_MST_M':
						include"BU_MST_M.php";
					break;

					
				//MOBILE BU MENU
					case'MB_BU_HIS_TGH':
						include"MB_BU_HIS_TGH.php";
					break;
	//Close BU_NEW
						
	//SIA_NEW
				//MASTER
					case'SIA_MST_M':
						include"SIA_MST_M.php";
					break;
				// APP
					case'SIA_APP_M':
						include"SIA_APP_M.php";
					break;

				
					
	//CLOSE SIA_NEW					
		
}
 	?> 