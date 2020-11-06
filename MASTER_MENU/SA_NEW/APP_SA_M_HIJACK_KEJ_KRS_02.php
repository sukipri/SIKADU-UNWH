<?php session_start();
	include_once"../../sc/conek.php";
	include_once"css.php";
	include"../../NEW_CODE/code_rand.php";
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
			//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
			header('location:index.php');
		} else {
		$u = mysql_query("select * from user where namauser='$_SESSION[namauser]'");
		$uu = mysql_fetch_array($u);
		$u_a = mysql_query("$sl akses FROM akademik where namauser='$_SESSION[namauser]'");
		$uu_a = $call_fas($u_a);
		$u_ku = mysql_query("$sl akses FROM user_ku where idku='$_SESSION[namauser]'");
		$uu_ku = $call_fas($u_ku);
		$u_dsn = $call_q("select iduser_dsn,iddosen,username,passuser,akses,kj from user_dsn where iddosen='$_SESSION[namauser]'");
		$uu_dsn = mysql_fetch_array($u_dsn);
		//$ku = $call_q("select * from ku where idku='$uu[idku]'");
		//$kuu = $call_fas($ku);

			//$IDDSN=$sql_escape($_GET['kddsn']);
			
		//$kdmhs = "$kuu[idku]";
	 ?>
	   <?php if($uu['akses']==14){ ?>
	   <style> body{padding-top:2rem;}</style>
	 <body>
	 	<?php
			$IDKEJ = @$sql_escape($_GET['IDKEJ']);
		?>
			
			<form method="post">
		<button class="btn btn-outline-success fixed-top" name="up"><i class="fas fa-cloud-upload-alt"></i>&nbsp;Unggah Data</button>
			
 	 <table width="100%" border="0" class="table table-bordered table-striped">
          <tr class="table-info">
            <td width="2%">#</td>
            <td width="25%">Kode Kurikulum</td>
            <td width="30%">Kode Sks </td>
            <td width="43%">Krs Filler </td>
          </tr>
		  <?php
		  	$vsks = mysql_query("$sl idsks,idkejuruan,idkurikulum FROM sks WHERE idkejuruan='$IDKEJ'");
				$no = 1;
				  while($vskss = mysql_fetch_array($vsks)){
		  ?>
		  <tr>
		    <td><?php echo"$no"; ?></td>
		  <td><?php echo"$vskss[idkurikulum]"; ?></td>
		  <td><?php echo"$vskss[idsks]"; ?>
		  <input type="hidden" name="<?php echo"up_kej$no"; ?>" value="<?php echo"$vskss[idkejuruan]"; ?>">
		  </td>
		  <td>
		  <?php
		  		$vkrs = $call_q("$sl idkrs,idsks FROM krs WHERE idsks='$vskss[idsks]'");
				$no_krs = 1;
					$jum_vkrs = $call_nr($vkrs);
						echo"<b>$jum_vkrs</b>";
					while($vkrss = $call_fas($vkrs)){
					?>
						<input type="hidden" name="<?php echo"up_krs$no_krs"; ?>" value="<?php echo"$vkrss[idsks]"; ?>">
				<?php } ?>
		 
		  </td>
		  </tr>
		  <?php $no++;} ?>
        </table>
		</form>
		<?php
				if(isset($_POST['up'])){
					$no_up = 1;
						$up_kej = $_POST['up_kej'.$no_up];
						$up_krs = $_POST['up_krs'.$no_up];
							while($no_up <= $jum_vkrs){
								$call_q("$up krs set idkejuruan='$up_kej' WHERE idsks='$up_krs'");
							}
								?>
									<div class="alert alert-dismissible alert-success">
										<b>Suksess Meng-update</b>
									</div>
							<?php } ?>
	 </body>
	 
	 <?php
	}else{echo"<h1><center>MAAF AKSES TIDAK DI IJINKAN<br><a href=index.php>klik untuk kembali</a></center></h1>";
	} }
	?>