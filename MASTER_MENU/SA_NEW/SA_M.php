<?php session_start();
	include_once"../../sc/conek.php";
	include_once"css.php";
	include"../../NEW_CODE/code_rand.php";
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
			//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
			header('location:index.php');
		} else {
		$u = mysql_query("select * from user where namauser='$_SESSION[namauser]'");
		$uu = mysql_fetch_array($u);
		$u_a = mysql_query("$sl akses FROM akademik where namauser='$_SESSION[namauser]'");
		$uu_a = $call_fas($u_a);
		$u_ku = mysql_query("$sl akses FROM user_ku where idku='$_SESSION[namauser]'");
		$uu_ku = $call_fas($u_ku);
		$u_dsn = $call_q("select iduser_dsn,iddosen,username,passuser,akses,kj from user_dsn where iddosen='$_SESSION[namauser]'");
		$uu_dsn = mysql_fetch_array($u_dsn);
		//$ku = $call_q("select * from ku where idku='$uu[idku]'");
		//$kuu = $call_fas($ku);

			//$IDDSN=$sql_escape($_GET['kddsn']);
			
		//$kdmhs = "$kuu[idku]";
	 ?>
 <style>
	 body{padding-top:5rem;}
	 </style>
	 <script language="JavaScript" type="text/JavaScript">
	<!--
	function MM_openBrWindow(theURL,winName,features) { //v2.0
	  window.open(theURL,winName,features);
	}
	//-->
	</script>
<body>

  <?php if($uu['akses']==14){ ?>
			<?php include_once"MENU_01.php"; ?>
		<div class="container">
			<?php include"../logic/page_logic_sa.php"; ?>
			
		</div>
		<div style="padding-top:15rem; "></div>
  <?php
		  include"../../sc/s_o.php";?>
		  <a class="btn btn-secondary"><?php echo"$os"; ?></a>

</body>
<?php
	}else{echo"<h1><center>MAAF AKSES TIDAK DI IJINKAN<br><a href=index.php>klik untuk kembali</a></center></h1>";
	} }
	?>
