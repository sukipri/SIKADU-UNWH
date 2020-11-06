<?php session_start();
	include_once"../../sc/conek.php";
	include_once"css.php";
	include"../../NEW_CODE/code_rand.php";
			include_once"../../NEW_CODE/CODE_GET.php";
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
			//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
			header('location:F_LOGIN.php');
		} else {
		$u = mysql_query("select * from user where namauser='$_SESSION[namauser]'");
		$uu = mysql_fetch_array($u);
		$u_a = mysql_query("$sl akses FROM akademik where namauser='$_SESSION[namauser]'");
		$uu_a = $call_fas($u_a);
		$u_ku = mysql_query("$sl akses FROM user_ku where idku='$_SESSION[namauser]'");
		$uu_ku = $call_fas($u_ku);
		$u_bu = $call_q("$sl iduser_bu,idbu,username,passuser,akses from user_bu where username='$_SESSION[namauser]'");
		$uu_bu = $call_fas($u_bu); 
		//$ku = $call_q("select * from ku where idku='$uu[idku]'");
		//$kuu = $call_fas($ku);

			//$IDDSN=$sql_escape($_GET['kddsn']);
			
		//$kdmhs = "$kuu[idku]";
	 ?>
<body>
 <?php if($uu['akses']==14 OR $uu_a['akses']==2 OR $uu_ku['akses']==11 OR $uu_bu['akses']==8){ ?>
	<?php include_once"MENU.php"; ?>

	<div class="container">
    
	<?php include"../logic/page_logic_sa.php"; ?>
		
 
	</div>
       <?php include"FOOTER.php"; ?>
  
</body>
  </body>
    <?php
		}else{
		  include'../logic/H_LOCATION.php';
		} }
		ob_flush();
	?>

