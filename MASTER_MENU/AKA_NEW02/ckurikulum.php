	<?php //session_start();
	 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
			//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
			header('location:index.php');
		} else {
		?>
	
	</head>
	
	<body><form name="form1" method="post" action="">
	<a href="?aka=vkurikulum" class="btn btn-warning"><img src="http://sikadu.unwahas.ac.id/img/track-32.png" width="26" height="25" border="0">&nbsp;Lihat Semua Data</a>&nbsp;
	<br>
	<div class="container">
	<table width="645" class="table">
		<tr>
		  <td width="448"><input name="cari" type="text" id="cari2" size="45" class="form-control" autocomplete="off" required></td>
		  <td width="185">  <button class="btn btn-info" name="cari_data"><i class="fa fa-send"></i>&nbsp;Cari Data</button></td>
		</tr>
	  </table>
	
	<table width="100%" border="0" align="center" bgcolor="#00B058" class="table table-bordered">
	  <tr align="center" class="table-info">
		<td width="22%"><strong>Kode Kurikulum </strong></td>
		<td width="27%"><strong>SKS</strong></td>
		<td width="21%"><strong>Kejuruan</strong></td>
		<td width="30%"><strong>Judul</strong></td>
	  </tr>
	  <?php
	  if(isset($_POST['cari_data'])){
	  $cari = @$sql_escape($_POST['cari']);
	   $kr = $call_q("select idmain,idkurikulum,idkejuruan,idsemester,idsk,sks,judul,juduleng from kurikulum where idkurikulum LIKE '%$cari%' ");
		while($krr = $call_fas($kr)){
		  $sm = $call_q("select idsemester,idtahun_ajaran,idsemester from semester where idsemester='$krr[idsemester]'");
		$smm = $call_fas($sm);
		  $smth = $call_q("select * from tahun_ajaran where idtahun_ajaran='$smm[idtahun_ajaran]'");
		$smmth = $call_fas($smth);
		 $fak1 = $call_q("select idkejuruan,idfakultas,kejuruan from kejuruan where idkejuruan='$kj' order by kejuruan");
				$fakk1 = $call_fas($fak1);
	//@$jumkur = @mysql_num_rows($kr);
	  
	  ?>
	  <tr align="center" bgcolor="#FFFFFF">
		<td height="42"><strong><?php echo"<a href=?aka=edit_kurikulum&idkr=$krr[idkurikulum]>$krr[idkurikulum]"; ?></strong></td>
		<td><strong><?php echo"$krr[sks]"; ?></strong></td>
		<td><strong><?php echo"$fakk1[kejuruan]&nbsp; $fakk1[progdi]"; ?></strong></td>
		<td><strong><?php echo"$krr[judul]<br><i>$krr[juduleng]</i>"; ?></strong></td>
	  </tr>
	 <?PHP }} ?>
	</table>
	</form>
	</div>
	</body>
	<?PHP } ?>