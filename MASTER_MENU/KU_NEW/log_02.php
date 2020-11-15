<?php

  if(isset($_POST["kirim"])){ 
	$username=@trim($_POST["username"]);
	$passuser=@trim($_POST["passuser"]);   	
	include"../../sc/conek.php";
	$mdpass=md5($passuser);
	$dt=mysql_query("select iduser_ku,idku,username,passuser,app from user_ku
	where idku='$username' && passuser='$mdpass' && app='2'");
	$bc=mysql_fetch_row($dt);
	if($bc > 1){
	       session_start(); // di gunakan untuk mengawali perintah session
	    
		   $_SESSION['namauser']=$bc[2];  // di gunakan untuk membandingkan variabel session dengan database
		   $_SESSION['passuser']=$bc[3];
	  		header("location:admin_ku.php");
		 
		
		}else{
		header("location:index.php");
		}
	}else{
	 header("location:index.php");
	}
   
   
?>