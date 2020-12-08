	<?php //session_start();
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
			//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
			header('location:index.php');
		} else {
	 ?>
	
	<body>
	<form name="form1" method="post" action="">
	  <table width="659">
		<tr>
		  <td colspan="2">
          				<div class="alert alert-dismissible alert-info">
                        <b>#Management Dosen & SKS</b>
						</div>
		</td>
		</tr>
		<tr>
		  <td width="312"><input name="cari" type="text" id="cari2" size="45" placeholder="masukan nama dosen" class="form-control form-control-sm" required></td>
		  <td width="335">
		  <button class="btn btn-success btn-sm" name="cari_data"><i class="fa fa-send"></i>&nbsp;Cari Data</button>
	[<a href="?aka=csks">Edit SKS</a>&nbsp;/ <a href="?aka=vsks">Daftar SKS</a>] </td>
		</tr>
	  </table>
	</form><br>
	<table width="100%" height="74" border="0" align="center" bgcolor="#FFFFFF" class="table table-sm table-striped">
	  <tr align="center" class="table-info">
		<td width="97" height="31">NID</td>
		<td width="148">Nama</td>
		<td width="120">Gelar</td>
		<td width="104">Pengampu</td>
		<td width="290">Action</td>
	  </tr>
	  <?php
	  if(isset($_POST['cari_data'])){
	  $car = @$sql_escape($_POST['cari']);
	  $dsn = $call_q("select iddosen,idkejuruan,gelar,nama from dosen where nama LIKE '%$car%' order by nama desc limit 2000");
	  while($dsnn =$call_fas($dsn)){
	  $kj = $call_q("select idkejuruan,idfakultas,kejuruan from kejuruan where idkejuruan='$dsnn[idkejuruan]'");
	$kjj =$call_fas($kj);
	  ?>
	  <tr align="center">
		<td height="37"><?php echo"<b>$dsnn[iddosen]</b>"; ?></td>
		<td><?php echo"$dsnn[nama]"; ?></td>
		<td><?php echo"$dsnn[gelar]"; ?></td>
		<td><?php echo"$kjj[kejuruan]"; ?></td>
		<td><a href="#" onClick="MM_openBrWindow('../../KU/vsksk.php?<?php echo"kddsn=$dsnn[iddosen]"; ?>','','scrollbars=yes,width=900,height=900')">JADWAL DOSEN</a>&nbsp;|&nbsp;<a href="#" onClick="MM_openBrWindow('../../SU_admin/m2_dosen.php?<?php echo"kddsn=$dsnn[iddosen]"; ?>','','scrollbars=yes,width=900,height=900')">Managament Dosen</a></td>
	  </tr>
	<?PHP }} ?>
	</table>
	</body>

<?PHP } ?>