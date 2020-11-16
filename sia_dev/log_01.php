<?php

  if(isset($_POST["kirim"])){ 
	$username=@trim($_POST["nim"]);
	$passuser=@trim($_POST["passuser"]);  // sulis --> 9e39fe12c7c9c968ceabcd0b80d622a7 	
	include"../sc/conek.php";
	$mdpass=md5($passuser);
	$dt=mysql_query("select iduser_mhs,idmahasiswa,passuser,app from user_mhs
	where idmahasiswa='$username' && passuser='$mdpass' && app='2'");
	$bc=mysql_fetch_row($dt);
	if($bc > 1){
	       session_start(); // di gunakan untuk mengawali perintah session
	    
		   $_SESSION['namauser']=$bc[1];  // di gunakan untuk membandingkan variabel session dengan database
		   $_SESSION['passuser']=$bc[3];
	  		header("location:secure_face.php");
		 
		
		}else{
		header("location:index.php");
		}
	}else{
	 header("location:index.php");
	}
   
   
?>