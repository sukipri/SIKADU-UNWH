<?php
	  switch(@mysql_real_escape_string($_GET['mng'])){
	  default:
		  include"popup.php";
	  
	 break;
	  case'PROFIL_MAHASISWA':
		 include"edit_profil.php";
	  break;
	   case'KRS_PILIHAN':
	 	include"ikrs.php";
	  break;
	  case'CARI_KELAS':
		  include"vkelas.php";
	  break;
		case'vkrs':
			 include"vkrs.php";
	  break;
	   case'v_ikhs':
		 include"v_ikhs.php";
	  break;
		case'mlap':
		 include"mlap.php";
	  break;
	   case'AKUN':
		 include"emahasiswa.php";
	  break;
	   case'infoaka':
		 include"infoaka.php";
	  break;
	   case'cetak_kartu':
		 include"cetak_kartu.php";
	  break;
		case'vfaq':
	 	include"../sc/vfaq.php";
	  break;
	   case'inbox':
		 include"inbox.php";
	  break;
	   case'viewinbox':
		 include"viewinbox.php";
	  break;
	   case'newmail':
		 include"newmail.php";
	  break;
	  case'icari':
	  	include"icari.php";
	  break;
	  //case'pembayaran':
	  //include"pembayaran.php";
	  break;
	  case'CARI_MAKUL':
	  	include"icari_krs.php";
	  break;
	  case'TAGIHAN':
	  	include"TAGIHAN.php";
	  break;
	  case'TAGIHAN_02':
		include"TAGIHAN_02.php";
	  break;
	  case'MHS_TGH_METODE':
		include"MHS_TGH_METODE.php";
	  break;
	  case'MHS_BIAYA_01':
	  	include"MHS_BIAYA_01.php";
	  break;
	  case'FORM_PENGAJUAN_01':
		include"FORM_PENGAJUAN_01.php";
	  break;
	  }
	  
	  ?>