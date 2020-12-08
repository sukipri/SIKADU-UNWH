	<?php
		ob_start();
		session_start();
	include"css.php";
	include"../../sc/redi.php";
	include"../../sc/conek.php";
	include"../../NEW_CODE/code_rand.php";
	?>
	
	
	<style type="text/css">
	<!--
	.style1 {font-size: 20px; color:#FFFF99;}
	.style12 {color:#fff}
	body {
		margin-left: 0px;
		margin-top: 0px;
		margin-right: 0px;
		margin-bottom: 0px;
		
			background-image: url('../img/bk4.jpg');
					height:100%;
					width: 100%;
					 background-repeat: no-repeat;
	}
	.blur {
		opacity: 0.6;
		filter: alpha(opacity=80);
		background-color:#00773C;
	}
	
	.blur2:hover {
		opacity: 1.0;
		filter: alpha(opacity=100); /* For IE8 and earlier */
	}
	.rad {
		border: 0px solid #a1a1a1;
		padding: 10px 40px; 
	 background-color: #00C462;
		width:750px;
		border-radius: 10px;
	}
	.bgk:hover{background-color:#00C462;}
	-->
	</style>
	<script language="JavaScript" type="text/JavaScript">
	<!--
	function MM_openBrWindow(theURL,winName,features) { //v2.0
	  window.open(theURL,winName,features);
	}
	//-->
	</script>
	</head>
	
	<body>
	<br>
	<br><br>
		<?php
			$hasil_01 = "$an$an_02";
		?>
	<form name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
	  <table width="632" border="0" align="center" class="  rad">
		<tr>
		  <td width="72%" align="center"><img src="http://sikadu.unwahas.ac.id/img/logo-unwahas.png" width="385" height="91">        <table width="553" align="center" class="table">
			<tr>
			  <td width="545" class="bgk">
			  	<input name="nim" type="text" autocomplete="off" class="form-control"  style="max-width: 40rem;"  placeholder="Username" required>
				  <br>
				 <input name="passuser" autocomplete="off" type="password" class="form-control" style="max-width: 40rem;"   placeholder="password" required>
				  <br>
				   
					<?php echo"<span class=style1>Kode <b>$hasil_01</b></span>"; ?>
					 <input name="an_sec" type="hidden"  class="form-control" style="max-width: 15rem;" placeholder="Masukan Kode " value="<?php echo"$hasil_01"; ?>"   required>
				    <input name="angka1" type="number"  class="form-control" style="max-width: 15rem;" placeholder="Masukan Kode "   required>
				  <br>
				  <input name="kirim" type="submit" class="btn btn-primary" id="kirim2" value="L.O.G.I.N"></td>
			  <td width="545" rowspan="2" class="bgk">
			  <div class="alert alert-dismissible alert-success">
	  <button type="button" class="close" data-dismiss="alert">LOGIN SIKADU AKADEMIK </button>
	  <ul>
	  <li>Demi Keamanan Account SIKADU Anda Silahkan ganti password secara berkala <br>Lakukan akun sesuai dengan ketentuan yang berlaku</li>
	  <li>Gunakan Akun anda dengan sebaik-baiknya. </li>
	  <li><b>Jika ada pertanyaan tentang SIKADU Kirim MyMail anda ke ID 8008 </b> </li>
	  </ul>
	</div>
			  </td>
			</tr>
			<tr align="center">
			  <td>
			  <?php

		  if(isset($_POST["kirim"])){ 
			$username=@trim($sql_escape($_POST["nim"]));
			$passuser=@trim($sql_escape($_POST["passuser"]));  // MD5 --> 9e39fe12c7c9c968ceabcd0b80d622a7 	
			$angka1=@trim($sql_escape($_POST["angka1"]));
			$an_sec=@trim($sql_escape($_POST["an_sec"]));
				if($angka1!==$an_sec){
					echo"<font color=red><b>Kode Salah</b></font>";
					//echo"$an_sec";
				}elseif( $angka1==$an_sec ){
						//echo"$an_sec";
						
			//include"../sc/conek.php";
			$mdpass=md5($passuser);
				$dt=mysql_query("select iduser,idakademik,namauser,passuser,email,namaibu,app from akademik
	where idakademik='$username' && passuser='$mdpass' && app='2'");
			$bc=mysql_fetch_row($dt);
			if($bc > 1){
				  // session_start(); // di gunakan untuk mengawali perintah session
				
				   $_SESSION['namauser']=$bc[2];  // di gunakan untuk membandingkan variabel session dengan database
				   $_SESSION['passuser']=$bc[3];
					header("location:admin_aka.php");
				 
				}else{
				//header("location:index.php");
					echo"<font color=red><b>Password Dan User Salah</b></font>";
				}
			}else{
			echo"<font color=red><b>Password Dan User Salah</b></font>";
			} }
   						
						
						
   
	?>
			  </td>
	        </tr>
		  </table> 
		  <br>
		  <span class="style12">&copy; sikadu.unwahas.ac.id dev bejotech-@AKA</span> <span class="style2">
		  <?php
		  include"../../sc/s_o.php";
		   echo "&nbsp; //SO&nbsp;<b><font color=blue>".$os; "</font></b>"; ?> </span>
		  </td>
		</tr>
	  </table>
	  
	</form>
		
	</body>
	</html>
	<?php ob_flush();
