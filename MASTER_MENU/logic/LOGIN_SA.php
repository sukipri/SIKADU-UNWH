<?php
	
	 //session_start();
	 //include"../config/connec_01_srv.php";
	 if(isset($_POST["kirim"])){ 
	$username=@trim($_POST["username"]);
	$passuser=@trim($_POST["passuser"]);  
	$mdpass=md5($passuser);
	$dt=mysql_query("select iduser,namauser,passuser,akses from user where namauser='$username' AND passuser='$mdpass'");
	$bc=mysql_fetch_row($dt);
	if($bc > 1){
	      // di gunakan untuk mengawali perintah session
	    
		   $_SESSION['namauser']=$bc[1];  // di gunakan untuk membandingkan variabel session dengan database
		   $_SESSION['passuser']=$bc[2];
		   header("location:HOME.php");
		 }else{
		echo "<font color=red>Upss..Username Salah</font>";
	/* echo "<script language='javascript'>window.location = '../?HLM=SQL_LOGIN'</script>"; */
	exit();
		}
	}else{
	echo "<font color=red>Upss..Password Salah</font>";
	/* echo "<script language='javascript'>window.location = '../?HLM=SQL_LOGIN'</script>"; */
	exit();
	}
   
   
?>