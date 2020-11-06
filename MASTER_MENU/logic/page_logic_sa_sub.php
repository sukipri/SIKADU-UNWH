	<?php  
			echo"<br><br>";
				switch(@$sql_escape($_GET['SUB'])){
				
	//DSN..........................................................
				case'DSN_PROF':
					include"DSN_PROF.php";
				break;
				case'DSN_I':
						include"DSN_I.php";
				break;
				case'DSN_C':
						include"DSN_C.php";
				break;
				case'DSN_CP':
						include"DSN_CP.php";
				break;
				case'DSN_M_02':
						include"DSN_M_02.php";
				break;
				case'DSN_M_PROF':
						include"DSN_M_PROF.php";
				break;
				case'DSN_M_SKS':
						include"DSN_M_SKS.php";
				break;
				case'DSN_SKS_02':
						include"DSN_SKS_02.php";
				break;
				case'DSN_M_AMPU':
						include"DSN_M_AMPU.php";
				break;
				case'DSN_M_WALI':
						include"DSN_M_WALI.php";
				break;
				
				
				
	//AKADEMIK NEW.........................................................
					//MASTER
						case'MST_M_I_MAKUL':
							include"MST_M_I_MAKUL.php";
						break;
						case'MST_M_I_MAKUL_UPDATE':
							include"MST_M_I_MAKUL_UPDATE.php";
						break;
					//APPS
						case'APPS_IM_KRS_M':
							include"APPS_IM_KRS_M.php";
						break;
							
					//REPORT
						case'LAP_M_ST_IPK':
							include"LAP_M_ST_IPK.php";
						break;
						case'LAP_M_ST_IPK_LULUSAN':
							include"LAP_M_ST_IPK_LULUSAN.php";
						break;
						case'AKA_LAP_M_LOG_DATA_01':
							include"AKA_LAP_M_LOG_DATA_01.php";
						break;
	//BU_NEW.......................................................................
				//MENU KEU
					case'BU_MST_M_UANG':
						include"BU_MST_M_UANG.php";
					break;
					case'BU_MST_M_DT_TGH_M':
						include"BU_MST_M_DT_TGH_M.php";
					break;
				
	//SIA_NEW............................................................................
				//MASTER
					case'SIA_MST_M_PROFIL':
						include"SIA_MST_M_PROFIL.php";
					break;
					case'SIA_MST_M_KRS':
						include"SIA_MST_M_KRS.php";
					break;
					case'vkrs':
							
					case'SIA_MST_M_KHS':
						include"SIA_MST_M_KHS.php";
					break;
				//APP
					case'SIA_APP_M_KEU_M':
						include"SIA_APP_M_KEU_M.php";
					break;
//CLOSE SIA_NEW					
				
			}
					?> 