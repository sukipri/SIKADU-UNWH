<?php  
			echo"<br><br>";
				switch(@$sql_escape($_GET['SUB_CHILD'])){
			//MHS
				case'MHS_PROF_01':
					include"MHS_PROF_01.php";
				break;
			//KRS
				case'MHS_KRS_I':
					include"MHS_KRS_I.php";
				break;
				case'MHS_KRS_V':
					include"MHS_KRS_V.php";
				break;
				case'MHS_KHS_V':
					include"MHS_KHS_V.php";
				break;
				case'MHS_KRS_UPDATE':
					include"MHS_KRS_UPDATE.php";
				break;
			//AKT
				case'MHS_AKT':
					include"MHS_AKT.php";
				break;
			//GRAFIK
			case'MHS_GRAFIK':
					include"MHS_GRAFIK.php";
				break;
//AKADEMIK.................................
			case'APPS_IM_KRS_M_GL_01':	
				include"APPS_IM_KRS_M_GL_01.php";
			break;
			case'APPS_IM_KRS_M_GL_02':
				include"APPS_IM_KRS_M_GL_02.php";
			break;
			case'APPS_IM_KRS_M_GL_VIEW':
				include"APPS_IM_KRS_M_GL_VIEW.php";
			break;

//BU_NEW....................................................................
			//MENU KEU Tagihan Pembayaran//
				case'BU_MST_M_UANG_01':
					include"BU_MST_M_UANG_01.php";
				break;
				case'BU_MST_M_UANG_01_TGH':
					include"BU_MST_M_UANG_01_TGH.php";
				break;
				case'BU_MST_M_UANG_02_TGH':
					include"BU_MST_M_UANG_02_TGH.php";
				break;
				case'BU_MST_M_UANG_BY_KEJ':
					include"BU_MST_M_UANG_BY_KEJ.php";
				break;
				case'BU_MST_M_UANG_BY_NIM':
					include"BU_MST_M_UANG_BY_NIM.php";
				break;
				case'BU_MST_M_UANG_HIS_PEM':
					include"BU_MST_M_UANG_HIS_PEM.php";
				break;
				case'BU_MST_M_UANG_RPT_TGH':
					include"BU_MST_M_UANG_RPT_TGH.php";
				break;
				case'BU_MST_M_UANG_UP_UJIAN':
					include"BU_MST_M_UANG_UP_UJIAN.php";
				break;
				

			//Menu Keu Data Tagihan//
				case'BU_MST_M_DT_TGH_M_01':
					include"BU_MST_M_DT_TGH_M_01.php";
				break;
				case'BU_MST_M_DT_TGH_M_02':
					include"BU_MST_M_DT_TGH_M_02.php";
				break;
				case'BU_MST_M_DT_TGH_M_02_UP':
                    include"BU_MST_M_DT_TGH_M_02_UP.php";
                break;
				case'BU_MST_M_DT_TGH_M_03':
					include"BU_MST_M_DT_TGH_M_03.php";
				break;
				case'BU_MST_M_DT_TGH_M_03_01':
					include"BU_MST_M_DT_TGH_M_03_01.php";
				break;

//SIA_NEW.....................................................................
				//MASTER
				case'SIA_MST_M_PROFIL_PR':
					include"SIA_MST_M_PROFIL_PR.php";
				break;
				case'SIA_MST_M_PROFIL_US':
					include"SIA_MST_M_PROFIL_US.php";
				break;
				case'SIA_MST_M_KRS_CARI':
					include"SIA_MST_M_KRS_CARI.php";
				break;
				case'SIA_MST_M_KRS_KELAS':
					include"SIA_MST_M_KRS_KELAS.php";
				break;
				case'SIA_MST_M_KRS_KELAS_KRS':
					include"SIA_MST_M_KRS_KELAS_KRS.php";
				break;
				case'SIA_MST_M_KRS_MNG':
					include"SIA_MST_M_KRS_MNG.php";
				break;
				//APP
				case'SIA_APP_M_KEU_M_TAGIHAN':
				include"SIA_APP_M_KEU_M_TAGIHAN.php";
			break;
				
	
	
//CLOSE SIA_NEW			
				}
				
				?>