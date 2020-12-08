<title>PROSES LOGIN</title>  <?php

  if(isset($_POST["kirim"])){ 
	$username=@trim($_POST["username"]);
	$passuser=@trim($_POST["passuser"]);   	
	include"../sc/conek.php";
	$mdpass=md5($passuser);
	$dt=mysql_query("select iduser,idakademik,namauser,passuser,email,namaibu,app from akademik
	where idakademik='$username' && passuser='$mdpass' && app='2'");
	$bc=mysql_fetch_row($dt);
	if($bc > 1){
	       session_start(); // di gunakan untuk mengawali perintah session
	    
		   $_SESSION['namauser']=$bc[2];  // di gunakan untuk membandingkan variabel session dengan database
		   $_SESSION['passuser']=$bc[3];
	  		//echo"<br><br><br><br><h1><center>MAAF.......,SYSTEM MASIH DALAM TAHAP PEMBUATAN<br><a href=metu.php><img src=../img/map_red.png></a></center></h1>";
			header("location:admin_aka.php");
		 
		
		}else{
		header("location:index.php");
		}
	}else{
	 header("location:index.php");
	}
   
   
?>