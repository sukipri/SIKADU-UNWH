<head>  
	<!-- css Local -->
	<link href="../sd/bot_simplex.css" rel="stylesheet" type="text/css" />
	<link href="../sd/LOAD_BODY.css" rel="stylesheet" type="text/css" />

    <link href='http://fonts.googleapis.com/css?family=Josefin+Sans:400,600italic,700italic' rel='stylesheet' type='text/css'>
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="icon" href="../IMG/LOGO/logokecil.gif" type="image/gif">
<!-- Latest compiled and minified JavaScript -->
 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<!-- Javacript Local -->
   <script src="../sd/bootstrap.js"></script>   
	<script src="../sd/angular.js"></script>
	<script src="../sd/LOAD_BODY.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-animate.js"></script>
	<?php //include"../logic/title_logic.php"; ?>
	<title><?php echo "S.Admin"; ?></title>
	<style>
			.pd{padding:1em; position:center;}
			
	</style>
	<script type="text/javascript" language="JavaScript">
		function konfirmasi()
		 {
			tanya = confirm("are you sure to cancel / delete data ?");
		 if (tanya == true) return true;
		 else return false;
	 }
	</script>
	<script language="JavaScript" type="text/JavaScript">
	<!--
	function MM_openBrWindow(theURL,winName,features) { //v2.0
	  window.open(theURL,winName,features);
	}
	//-->
	</script>
	<script>
		$(function () {
		$('#datepicker').datepicker({
		autoclose: true
	});
	});
	</script>
</head>