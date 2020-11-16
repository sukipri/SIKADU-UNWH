	<?php ob_start(); session_start();
	 include_once"./../sc/conek.php";
	 include_once"./css.php";
	 include"../NEW_CODE/code_rand.php";
		//$get_db = new database();
		//$get_db->conek();
	
		
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		
		}else{
			$IDDEL = @$sql_escape($_GET['IDDEL']);
			$IDBY = @$sql_escape($_GET['IDBY']);
			@$call_q("DELETE FROM biaya_02_rekam where idmain_rekam='$IDDEL'");
			//@$call_q("$up biaya_02 set app='1' where idbiaya_02='$IDBY'");
					header("location:admin_sia_ui.php?mng=TAGIHAN#SAVING");
		}
		?>