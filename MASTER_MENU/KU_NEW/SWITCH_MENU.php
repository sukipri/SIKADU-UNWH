<?php
	
	switch(@$sql_escape($_GET['ku'])){
	  default:
		 include"../../sc/s_o_2.php";
	  //include"awal.php";
	  break;
	  case'vprofil_dosen':
	  include"vprofil_dosen.php";
	  break;
	  case'vsks':
	  include"vsks.php";
	  break;
	   case'csks':
	  include"csks.php";
	  break;
	   case'iabsen':
	  include"iabsen.php";
	  break;
	   case'icari':
	  include"icari.php";
	  break;
	   case'gsemester':
	  include"gsemester.php";
	  break;
		 case'icari2':
	  include"icari2.php";
	  break;
		 case'icari3':
	  include"icari3.php";
	  break;
	  case'mkuis':
	  include"mkuis.php";
	  break;
	  case'g_active':
	  include"g_active.php";
	  break;
		case'csks':
	  include"csks.php";
	  break;
	  case'vsks':
	  include"vsks.php";
	  break;
	  case'editakun':
	  include"editaku.php";
	  break;
	  case'icari4':
	  include"icari4.php";
	  break;
	case'icari2_ctk':
	  include"icari2_ctk.php";
	  break;
	  case'icari_ipk_nim':
	  include"icari_ipk_nim.php";
	  break;
	  case'icari_ipk_progdi':
	  include"icari_ipk_progdi.php";
	  break;
	  }
	 ?>