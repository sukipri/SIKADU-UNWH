	<?php //session_start();
	 include_once"../sc/conek.php";
	
		
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
			//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
			header('location:index.php');
		} else {
	 ?>
	<style type="text/css">
	<!--
	.style343 {font-size: 24px}
	-->
	</style>
	
	</head>
	
	<body>
	<br>
	<table width="775" align="center" class="table table-bordered table-striped table-sm">
	  <tr align="left" valign="top" class="table-info">
		<td width="38">#</td>
		<td width="226" height="28" align="center">NIM</td>
		<td width="145">Progdi</td>
		<td width="120">Semester</td>
		<td width="155">Nama</td>
	  </tr>
	  
	  
		<?php 
			  if(isset($_POST['cari_data'])){
			$nama = mysql_real_escape_string($_POST['cari']);
			$mhs = mysql_query("$sl  idmahasiswa,idkejuruan,iddosen,idkelas,kode_kelas,idsemester,idgelombang,nama,mhs,asal,st,uas,uts,alamat FROM mahasiswa WHERE nama LIKE '%$nama%' or idmahasiswa='$nama'");
			$no = 1;
			while($mhss = mysql_fetch_array($mhs)){
			
			$kj = mysql_query("select idkejuruan,idfakultas,kejuruan from kejuruan where idkejuruan='$mhss[idkejuruan]'");
				$kjj = mysql_fetch_array($kj);
				$gel = mysql_query("select * from gelombang where idgelombang='$mhss[idgelombang]'");
				$gell = mysql_fetch_array($gel);
				$sm = mysql_query("select idsemester,idtahun_ajaran,semester from semester where idsemester='$mhss[idsemester]'");
				$smm = mysql_fetch_array($sm);
				$us = mysql_query("select iduser_mhs,idmahasiswa,username,passuser from user_mhs where idmahasiswa='$mhss[idmahasiswa]'");
				$uss = mysql_fetch_array($us);
				   $ft = mysql_query("select * from foto_mhs where idmahasiswa='$mhss[idmahasiswa]' order by idfoto desc limit 1");
				  $ftt  = mysql_fetch_array($ft);
				   $dsn = mysql_query("select iddosen,idkejuruan,nama from dosen where iddosen='$mhss[iddosen]'");
				$dsnn = mysql_fetch_array($dsn);
	
	  ?>
	  <tr align="left" valign="top" bgcolor="#FFFFFF">
		<td width="38"><?php echo"$no"; ?></td>
		
		<td width="226" height="36" align="center"><?php echo"<font color=blue><b>$mhss[idmahasiswa]</b></font><br><br><b>$mhss[idkelas]</b>"; ?>
		  <?php
		 $ftht = mysql_num_rows($ft);
		 if($ftht==1){
		 ?>
		  <a href="http://sikadu.unwahas.ac.id/file/<?php echo"$ftt[foto]"; ?>"  target="_blank">
		  <?php
		 echo"<center><img src=http://sikadu.unwahas.ac.id/file/dsncilik_$ftt[foto] width=150 height=150></center>"; 
		 }else{
		 ?>
		  </a> <a href="#" >
		  <?php
		 echo"<center><img src=http://sikadu.unwahas.ac.id/img/no.jpg class=img-responsive></center>"; 
		 }
		 
		 
		 ?>
		  </a>
		  
		</td>
		<td width="145"><?php echo"$kjj[kejuruan]"; ?><br>
		  <?PHP 
		  
		  if($mhss['mhs']==2){
		  echo"<b><font color=green>AKTIF</font></b>";
		  }elseif(
		  $mhss['mhs']==1){
		  echo"<b><font color=grey>NON-AKTIF</font></b>";
		  }elseif(
		  $mhss['mhs']==3){
		  echo"<b><font color=blue>CUTI</font></b>";
		  }elseif(
		  $mhss['mhs']==4){
		  echo"<b><font color=#006666>LULUS</font></b>";
		  }elseif(
		  $mhss['mhs']==5){
		  echo"<b><font color=red>KELUAR</font></b>";
		  
		   }elseif(
		  $mhss['mhs']==6){
		  echo"<br><b><font color=red>TRANSFER</font></b>";
		  }
		  
		   ?>
		  <br>
		  <?php echo"<b>$mhss[asal]</b>"; ?><br>
		  <span class="label label-primary"><?php echo"Dosen wali&nbsp;$dsnn[nama]"; ?></span>
		  <br> <br>  <?php
			if($mhss['st']==1){
				?>
		  <span class="label label-danger">KRS Belum Aktif</span>
		  <?php
			}else{
			?>
		  <span class="label label-success">KRS Aktif</span>
		  <?php
			}
		
		
		?>
		  <br>
		  <?php
			if($mhss['uas']==1){
				?>
		  <span class="label label-danger">UAS Belum Aktif</span>
		  <?php
			}else{
			?>
		  <span class="label label-success">UAS Aktif</span>
		  <?php
			}
		
		
		?>
		  <br>
		  <?php
			if($mhss['uts']==1){
				?>
		  <span class="label label-danger">UTS Belum Aktif</span>
		  <?php
			}else{
			?>
		  <span class="label label-success">UTS Aktif</span>
		  <?php
			}
		
		
		?>
	<br><br>
	<a href="?mng=newmail&iduntuk=<?php echo"$mhss[idmahasiswa]"; ?> " class="btn btn-success"><img src="../img/mail-32.png">&nbsp;Kirim MyMail</a>
		  </td>
		<td width="120"><?php echo"<b>$smm[semester]</b>"; ?>
		
		</td>
		<td width="155"><?php echo"<b>$mhss[nama]</b><br>$mhss[alamat]"; ?><br></td>
	  </tr>
		
	
	
	
	<?php
	$no++;
	}
	}
	
	?>
	</table>

	</body>
	</html>
	<?php
	}
	?>