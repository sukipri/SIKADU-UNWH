	<?php
		//INCLUDE_DATA
			require_once"GR_01.php";
			require_once"stack_Q.php";
			require_once"DATA_COMP.php";
		//ENCODING STACK
	date_default_timezone_set("Asia/Bangkok");
	$ack_big = rand('999999','888888');
	$ack_small = rand('9999','7777');
	$ack_small_XL = rand('9','9');
	$ack_md5 = md($ack_big);
	$ack_cr32_big = cr($ack_big);
	$ack_cr32_small = cr($ack_small);
	$ack_sha1 = hs($ack_big);
	$date_ack = date("Ymd");
	$YR = date("Y");
	$MH = date("m");
	$DY= date("d");
	$date_ack_tiny = date("ymd");
	$time_ack_tiny = date("his");
	$time_ack = date("h-i-s");
	$am = date("A");
	$time_html5 = date("h:i:s");
	$skrg = date("Y-m-d H:i:s");
	$date_html5 = date("Y-m-d");
	$date_html5_02 = date("d/m/Y");
	$date_html5_tiny = date("y-m-d");

	function FS_DATE($fsdate)
	{
		$MONTH= array (1 =>   'Januari',
					'Februari',
					'Maret',
					'April',
					'Mei',
					'Juni',
					'Juli',
					'Agustus',
					'September',
					'Oktober',
					'November',
					'Desember'
				);
		$split = explode('-', $fsdate);
		return $split[2] . ' ' . $MONTH[ (int)$split[1] ] . ' ' . $split[0];
	}




	$nf = @number_format;
		//IDMAIN FIELDS
	$IDMAIN = "$ack_cr32_big$date_ack_tiny$time_ack_tiny";
		//SECURE Digit Random
		$an = rand('9998','8888');
		$an_02 = rand('99','99');
		
	?>
