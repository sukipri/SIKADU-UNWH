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
		
	 ?>
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
	<html>
	<head>
	<title>Untitled Document</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	</head>
	
	<body>
	<?php
	
	 
	 if($mhss['iddosen']==0){
	 
	
	?>
	<form name="form1" method="post" action="">
	  <h3 align="center">Manakah Wali Dosen Anda
	?  </h3>
		<div align="center">Jika Tidak Ada &nbsp;<a href="secure_face.php" class="btn btn-success">KLIK </a>&nbsp;Untuk Merefresh lagi </div>
		<br>
		<table width="600" border="0" class="table">
		<tr>
		  <td align="center">
		  <div class="container">
			<input name="go" type="submit" id="go" value="pilih" class="btn btn-primary btn-lg"><br>
			<?php 
		if(isset($_POST['go'])){
		$nama = @$_POST['nama'];
			if(empty($_POST['nama'])){
			?>
			<div class="alert alert-dismissible alert-danger">
	  <button type="button" class="close" data-dismiss="alert">X</button>
	  <strong>Ayoo Diisi Dahulu!!!</strong> 
	</div>
			
			
		<?php
		}else{
		mysql_query("update mahasiswa set iddosen='$nama' where idmahasiswa='$mhss[idmahasiswa]'");
		header("location:PHOTO_BOOM.php");
		}
		}
	?><br>
			<table width="200" class="table table-bordered">
		  <?php
		  $dsn = mysql_query("select * from dosen where idfakultas='$kejj[idfakultas]'");
	  while($dsnn = mysql_fetch_array($dsn)){
		  
		  ?>
			<tr>
			  <td align="center"><label>
			  <?php
		$ft = mysql_query("select * from foto_dsn where iddosen='$dsnn[iddosen]'  order by idfoto desc limit 1");
		  $ftt = mysql_fetch_array($ft);
		  $hft = mysql_num_rows($ft);
		  
		 
		  
		  ?> <?php
		 $ftht = mysql_num_rows($ft);
		 if($ftht==1){
		 ?>
		
		 <?php
		 echo"<center><img src=../file/$ftt[foto] width=200 height=200></center>"; 
		 }else{
		 ?>
		
		
		 <?php
		 echo"<center><img src=../img/no.jpg width=200 height=200></center>"; 
		 }
		 
		 
		 ?>
		
				<input type="radio" name="nama" value="<?php echo"$dsnn[iddosen]"; ?>">
				<?php echo"$dsnn[nama]"; ?></label></td>
			</tr>
			<?php } ?>
		  
		  </table></div></td>
		</tr>
	  </table>
	</form>
	<?php
	}else{
		header("location:PHOTO_BOOM.php");
	}
	?>
	</body>
	</html>
	<?php
	}
	?>