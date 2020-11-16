<?php session_start();
	 include_once"./../sc/conek.php";
	 include_once"./css.php";
	
	
		
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
			//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
			header('location:index.php');
		} else {
		$u = mysql_query("select iduser_mhs,idmahasiswa,username,akses from user_mhs where idmahasiswa='$_SESSION[namauser]'");
				$uu = mysql_fetch_assoc($u);
		$mhs = mysql_query("select * from mahasiswa where idmahasiswa='$uu[idmahasiswa]'");
		$mhss = mysql_fetch_assoc($mhs);
		$kej = mysql_query("select idkejuruan,idfakultas,kejuruan FROM kejuruan where idkejuruan='$mhss[idkejuruan]'");
		$kejj = mysql_fetch_assoc($kej);
		$kdmhs = $mhss['idmahasiswa'];
			$ft = mysql_query("select * from foto_mhs where idmahasiswa='$mhss[idmahasiswa]' order by idfoto desc limit 1");
				  $ftt  = mysql_fetch_assoc($ft);
		
	 ?>
	<body>
				<?php
		$ftht = mysql_num_rows($ft);
		 if($ftht==1){
		 ?>
		
		 <?php
		 //echo"<center><img src=http://sikadu.unwahas.ac.id/file/$ftt[foto] class=img-responsive></center><br>"; 
		 	header("location:admin_sia_ui.php");
		 }else{
		 	header("location:u_foto/index.php");
		 ?>
			 <?php
		 echo"<center><img src=../img/no.jpg class=img-responsive></center>"; 
		 } ?>
	
	</body>
	<?php
	}
	?>
