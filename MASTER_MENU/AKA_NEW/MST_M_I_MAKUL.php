<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>


	<form name="form1" method="post" action="">
	  <table width="659">
		<tr>
		  <td colspan="2"><h5>Entri Mata Kuliah</h5></td>
		</tr>
		<tr>
		  <td width="312"><input name="cari" type="text" id="cari2" size="45" placeholder="masukan nama dosen" class="form-control" required></td>
		  <td width="335">
		  <button class="btn btn-info" name="cari_data"><i class="fa fa-send"></i> &nbsp; G.O</button>	</td>
		</tr>
	  </table>
	</form><br>
	<table width="100%" height="74" border="0" align="center" bgcolor="#FFFFFF" class="table">
	  <tr align="center" valign="top" bgcolor="#FFFFFF">
		<td width="97" height="31">NID</td>
		<td width="148">Nama</td>
		<td width="120">Gelar</td>
		<td width="104">Pengampu</td>
		<td width="290">Action</td>
	  </tr>
	  <?php
	  if(isset($_POST['cari_data'])){
	  $car = @mysql_real_escape_string($_POST['cari']);
	  $dsn = mysql_query("select iddosen,idkejuruan,gelar,nama from dosen where nama LIKE '%$car%' order by nama desc limit 2000");
	  while($dsnn = mysql_fetch_array($dsn)){
	  $kj = mysql_query("select idkejuruan,idfakultas,kejuruan from kejuruan where idkejuruan='$dsnn[idkejuruan]'");
	$kjj = mysql_fetch_array($kj);
	  ?>
	  <tr align="center" valign="top" bgcolor="#FFFFFF">
		<td height="37"><?php echo"<b>$dsnn[iddosen]</b>"; ?></td>
		<td><?php echo"$dsnn[nama]"; ?></td>
		<td><?php echo"$dsnn[gelar]"; ?></td>
		<td><?php echo"$kjj[kejuruan]"; ?></td>
		<td><a href="#" class="btn btn-warning btn-sm" onClick="MM_openBrWindow('../KU/vsksk.php?<?php echo"kddsn=$dsnn[iddosen]"; ?>','','scrollbars=yes,width=900,height=900')">JADWAL DOSEN</a>
		&nbsp;
		<a href="#" class="btn btn-warning btn-sm" onClick="MM_openBrWindow('../../SU_admin/m2_dosen.php?<?php echo"kddsn=$dsnn[iddosen]"; ?>','','scrollbars=yes,width=900,height=600')">Managament Dosen</a></td>
	  </tr>
	  <?php
	  }
	  }
	  ?>
	</table>

<?php } ?>