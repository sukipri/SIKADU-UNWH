	<?php session_start();
	include_once"../../sc/conek.php";
	include_once"css.php";
	include"../../NEW_CODE/code_rand.php";
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
			//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
			header('location:index.php');
		} else {
		$u = $call_q("$sl iduser_ku,idku,idfakultas,username,passuser,akses FROM user_ku where username='$_SESSION[namauser]'");
		$uu = $call_fas($u);
		//$ku = $call_q("select * from ku where idku='$uu[idku]'");
		//$kuu = $call_fas($ku);
		$fak02 = $call_q("$call_sel fakultas where idfakultas='$uu[idfakultas]'");
			$fakk02 = $call_fas($fak02);
		//$kdmhs = "$kuu[idku]";
	 ?>
	 <?php if($uu['akses']==11){ ?>
	
	</head>
	<style type="text/css">
	body {
		padding-top: 75px;
}

	.wht{
	color:#FFFFFF;
	}

	</style>
	<body>
				<?PHP include"MENU_01.php"; ?>
	<br>
	<?php //include"awal.php"; ?>
	<br>
	<div class="container">
		<?php include"SWITCH_MENU.php"; ?>
	 </div>
	<br>
		<span class="badge badge-info">&copy; sikadu.unwahas.ac.id dev bejotech 
		<?php
		  include"../../sc/s_o.php";
		   echo "&nbsp; //SO&nbsp;<b><font color=blue>".$os; "</font></b>"; ?>
		</span>
	</body>

	<?php
	}else{ echo"<h1><center>MAAF AKSES TIDAK DI IJINKAN<br><a href=index.php>klik untuk kembali</a></center></h1>";
	}
	?>
	<?php } ?>