	<?php session_start();
	include_once"../../sc/conek.php";
	include"css.php";
	//include"../NEW_CODE/GR_01.php";
	//	include"../NEW_CODE/code_rand.php";
		include"../../NEW_CODE/code_rand.php";
		include"../../NEW_CODE/CODE_GET.php";
		
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
			//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
			header('location:index.php');
		} else {
		$u = mysql_query("select idakademik,idfakultas,namauser,passuser,akses FROM akademik where namauser='$_SESSION[namauser]'");
		$uu = mysql_fetch_array($u);
		$aka = mysql_query("select idakademik,idfakultas,namauser,passuser,akses FROM akademik where idakademik='$uu[idakademik]'");
		$akaa = mysql_fetch_array($aka);
		//$kdmhs = $kuu['idku'];
		include"../../sc/s_o_2.php";
	 ?>
	 
	 <?php
	
	if($uu['akses']==2){
	
	
	?>
	 
	</head>
	<style type="text/css">
	<!--
	body {
		padding-top:80px;
		background-color: #FFFFFF;
	}
	
	.wow:hover{background-color:#FFC1C1;}
	
	.style2 {color: #000000}
	-->
	</style>
	<body>

    <!--
	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <a class="navbar-brand" href="admin_aka.php" >
			<img src="../img/logo-unwahas.png" alt="Brand" height="50" border="0">
		  </a>
		 
	
	
		</div>
		<p class="navbar-text navbar-right">
		<br>&nbsp; &nbsp; <?php echo"ID PASS&nbsp;<u>$uu[idakademik]</u> &nbsp;&nbsp; ID Session $uu[passuser]"; ?> <a href="?aka=eakun" class="btn btn-success">Setting akun</a>&nbsp;<a href="metu.php" class="btn btn-danger">
	LOG OUT</a></p>
	  </div>
	</nav>
	 -->
     	<!-- -->
		<?PHP include"MENU_01.php"; ?>
        <!-- -->
        <div style="padding-top:3rem;"></div>
		<div class="container">
			<?php include_once"../logic/page_logic_sa.php"; ?>
		</div>
	<hr>
	
	&copy; sikadu.unwahas.ac.id dev bejotech <span class="style2">
		  <?php
		  include"../../sc/s_o.php";
		   echo "&nbsp; //SO&nbsp;<b><font color=blue>".$os; "</font></b>"; ?>
		</span>
	
	</body>
	</html>
	<?php
	}else{ echo"<h1><center>MAAF AKSES TIDAK DI IJINKAN<br><a href=index.php>klik untuk kembali</a></center></h1>";
	} ?>
<?PHP } ?>