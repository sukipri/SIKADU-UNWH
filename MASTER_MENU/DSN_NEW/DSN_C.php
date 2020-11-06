<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
		<form name="form1" method="post" action="">
		<table width="100%" border="0" class="table">
			<tr>
			  <td width="590"><input name="cari" type="text" id="cari"  placeholder="masukan nama dosen" required class="form-control"></td>
			  <td width="63"><button class="btn btn-success btn-lg" name="cari_data"><i class="fa fa-search"></i></button></td>
			  <td width="450"><a href="?HLM=DSN_M&SUB=DSN_CP" class="btn btn-warning"><i class="fa fa-graduation-cap"></i>&nbsp;Cari berdasarkan progdi</a></td>
			</tr>
		  </table>
		</form><br>
		<?php
		  if(isset($_POST['cari_data'])){
		  $car = @$sql_escape(trim($_POST['cari']));
		?>
		<table width="100%" height="74" border="0" align="center" class="table table-hover">
		  <tr align="center" valign="top" class="table-primary">
			<td width="142" height="31">NID</td>
			<td width="404">Nama</td>
			<td width="82">Gelar</td>
			<td width="154">Pengampu</td>
			<td width="286">Action</td>
		  </tr>
		  <?php
		
		  $dsn = $call_q("select * from dosen where nama LIKE '%$car%' or iddosen='$car' order by nama desc limit 2000");
		  while($dsnn = $call_fas($dsn)){
		  $kj = $call_q("select * from kejuruan where idkejuruan='$dsnn[idkejuruan]'");
		$kjj = $call_fas($kj);
		  ?>
		  <tr align="center" valign="top" bgcolor="#FFFFFF">
			<td height="37" align="left"><?php echo"<b>$dsnn[iddosen]</b>"; ?></td>
			<td align="left"><?php echo"$dsnn[nama]"; ?></td>
			<td align="left"><?php echo"$dsnn[gelar]"; ?></td>
			<td align="left"><?php echo"$kjj[kejuruan]"; ?></td>
			<td>
			<a href="<?php echo"?HLM=DSN_M&SUB=DSN_M_SKS&IDDSN=$dsnn[iddosen]#GET_DATA"; ?>" class="btn btn-primary"><i class="	fa fa-list-alt"></i>&nbsp;Input SKS</a>
			<a href="<?php echo"?HLM=DSN_M&SUB=DSN_M_02&IDDSN=$dsnn[iddosen]#GET_DATA"; ?>" class="btn btn-info"><i class="fa fa-sliders"></i>&nbsp;Atur Dosen</a>
			</td>
		  </tr>
		  <?php } ?>
</table>
		<?php  } ?>
</body>
<?php } ?>
