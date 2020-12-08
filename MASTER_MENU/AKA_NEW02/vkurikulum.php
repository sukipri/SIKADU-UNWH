	<?php //session_start();
		error_reporting(0);
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
			//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
			header('location:index.php');
		} else {
		?>
	 
	<body>
	<h3>
	<img src="http://sikadu.unwahas.ac.id/img/track-32.png" width="26" height="25">&nbsp;Lihat Semua Data&nbsp;|
	<a href="?aka=ckurikulum" class="btn btn-warning"><img src="http://sikadu.unwahas.ac.id/img/forward-32.png" width="26" height="25" border="0">&nbsp;Cari Kurikulum </a></h3>
	<div class="container">
	  <form name="form1" method="post" action="">
		<table width="500" class="table table-bordered">
		  <tr>
			<td><select name="kj" class="form-control">
			  <?php
			 $fak = mysql_query("select idkejuruan,idfakultas,kejuruan from kejuruan order by kejuruan");
			 while($fakk = mysql_fetch_array($fak)){
			 echo"<option value=$fakk[idkejuruan]>$fakk[idkejuruan]&nbsp; / &nbsp;$fakk[kejuruan]</option>";
			 }?>
			</select></td>
			<td>  <button class="btn btn-info" name="kjur"><i class="fa fa-send"></i>&nbsp;Cari Data</button></td>
		  </tr>
		</table>	
		<table width="100%" border="0" align="center" bgcolor="#FFFFFF" class="table table-bordered">
		  <tr align="center">
			<td width="11%">IDMAIN</td>
			<td width="18%" bgcolor="#FFC1C1"><strong>Kode Relasi </strong>*(Jangan DIrubah</td>
			<td width="10%"><strong>Kode Kurikulum Sesuai SK </strong></td>
			<td width="10%"><strong>SKS</strong></td>
			<td width="21%"><strong>Kejuruan</strong></td>
			<td width="40%"><strong>Judul</strong></td>
			<td width="40%">&nbsp;</td>
		  </tr>
		  <?php
		  if(isset($_POST['kjur'])){
		  $kj = @$_POST['kj'];
			   $kr = mysql_query("select idmain,idkurikulum,idkejuruan,idsemester,idsk,sks,judul,juduleng,status from kurikulum where idkejuruan='$kj' order by idmain asc limit 1000000 ");
					while($krr = mysql_fetch_array($kr)){
			  $sm = mysql_query("select idsemester,idtahun_ajaran,idsemester from semester where idsemester='$krr[idsemester]'");
					$smm = mysql_fetch_array($sm);
			  $smth = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$smm[idtahun_ajaran]'");
					$smmth = mysql_fetch_array($smth);
			 $fak1 = mysql_query("select idkejuruan,idfakultas,kejuruan from kejuruan where idkejuruan='$kj' order by kejuruan");
					$fakk1 = mysql_fetch_array($fak1);
			@$jumkur = @mysql_num_rows($kr);
	
	  
	  ?>
	  <?php 
		
		
		?>
	
		  <tr align="center" bgcolor="#FFFFFF">
			<td><?php echo"$krr[idmain]"; ?></td>
			<td height="42" bgcolor="#FFC1C1"><strong><?php echo"<a href=?aka=edit_kurikulum&idkr=$krr[idkurikulum]>$krr[idkurikulum]"; ?></strong></td>
			<td><strong><?php echo"<a href=?aka=edit_kurikulum&idkr=$krr[idkurikulum]>$krr[idsk]"; ?></strong></td>
			<td><strong><?php echo"$krr[sks]"; ?></strong></td>
			<td><strong><?php echo"$fakk1[kejuruan]"; ?></strong></td>
			<td><strong><?php echo"$krr[judul]<br><i>$krr[juduleng]</i>"; ?></strong></td>
			<td><?php if($krr[8]=="Y"){?><sss id="<?php echo $krr[0];?>" class="btn btn-info" onclick="ganti(this.id,'NON AKTIFKAN')">AKTIF</sss> <?php }else{?><sss id="<?php echo $krr[0];?>" class="btn btn-danger" onclick="ganti(this.id,'AKTIFKAN')"> NON AKTIF</sss><?php }?></td>			
		  </tr>
		<?PHP }} ?>
		</table>
	  </form>
	
	<?php
	echo"<b>JUMLAH KURIKULUM :&nbsp; $jumkur</b>";
	
	?>
	</div>
	<script type="text/javascript" src="jquery-1.10.1.min.js"></script>
	<script type="text/javascript" src="sjs.js"></script>
	</body>
	</html>
	<?php
	}
	?>