<?php session_start();
	include_once"../../sc/conek.php";
	include_once"css.php";
	include"../../NEW_CODE/code_rand.php";
			include_once"../../NEW_CODE/CODE_GET.php";
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
			//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
			header('location:index.php');
		} else {
		$u = $call_q("select * from user where namauser='$_SESSION[namauser]'");
		$uu = mysql_fetch_array($u);
		$u_a = $call_q("$sl akses FROM akademik where namauser='$_SESSION[namauser]'");
		$uu_a = $call_fas($u_a);
		$u_ku = $call_q("$sl akses FROM user_ku where idku='$_SESSION[namauser]'");
		$uu_ku = $call_fas($u_ku);
		$u_bu = $call_q("$sl iduser_bu,idbu,username,passuser,akses from user_bu where username='$_SESSION[namauser]'");
		$uu_bu = $call_fas($u_bu); 
		//$ku = $call_q("select * from ku where idku='$uu[idku]'");
		//$kuu = $call_fas($ku);
				$vsm_up = $call_q("$call_sel semester WHERE aktif='2'");
					$vsmm_up = $call_fas($vsm_up);
			//$IDDSN=$sql_escape($_GET['kddsn']);
			
		//$kdmhs = "$kuu[idku]";
	 ?>
	 <style>
	 body{padding-top:5rem;}
	 </style>
	 
<body>
  <?php require_once"../sd/LOAD_LAYOUT.php"; ?>
<!--
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">
-->
  <?php if($uu['akses']==14 OR $uu_a['akses']==2 OR $uu_ku['akses']==11 OR $uu_bu['akses']==8){ ?>
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
