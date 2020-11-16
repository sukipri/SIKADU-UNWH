	<?php 
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
			//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
			header('location:index.php');
		} else {
	 ?>
	  <?php if($uu['akses']==11){ ?>

	<script language="JavaScript" type="text/JavaScript">
	<!--
	function MM_openBrWindow(theURL,winName,features) { //v2.0
	  window.open(theURL,winName,features);
	}
	//-->
	</script>
	</head>
	
	<body>
    	<h5>#DATA DOSEN / FAKULTAS</h5>
        <br>
	<form name="form1" method="post" action="">
	  <table width="600" border="0" class="table table-sm">
		<tr>
		  <td><input name="cari" required autocomplete="off" type="text" id="cari" size="20" placeholder="masukan nama dosen" class="form-control form-control-sm"></td>
		  <td><button class="btn btn-info btn-sm" name="cari_data"><i class="fa fa-send"></i>&nbsp;Cari Data</button></td>
		  <td><a href="?ku=csks" class="btn btn-warning">Edit SKS &nbsp;/ Daftar SKS</a></td>
		</tr>
	  </table>
	</form>
    <br>
    <?PHP  if(isset($_POST['cari_data'])){
	  $car = @$sql_escape($_POST['cari']);  ?>
	<table width="100%" height="74" border="0" align="center" class="table table-bordered table-striped table-sm">
	  <tr class="table-info">
		<td width="97" height="31"><strong>NID</strong></td>
		<td width="148"><strong>Nama</strong></td>
		<td width="120"><strong>Gelar</strong></td>
		<td width="104"><strong>Pengampu</strong></td>
		<td width="290"><strong>Action</strong></td>
	  </tr>
	  <?php
	 
	  $dsn = $call_q("select iddosen,idkejuruan,nama,gelar from dosen where nama LIKE '%$car%' order by nama desc limit 2000");
	  while($dsnn = $call_fas($dsn)){
	  $kj = $call_q("select idkejuruan,idfakultas,kejuruan from kejuruan where idkejuruan='$dsnn[idkejuruan]'");
	$kjj = $call_fas($kj);
	  ?>
	  <tr align="left" valign="top" bgcolor="#FFFFFF">
		<td height="37"><?php echo"<b>$dsnn[iddosen]</b>"; ?></td>
		<td><?php echo"$dsnn[nama]"; ?></td>
		<td><?php echo"$dsnn[gelar]"; ?></td>
		<td><?php echo"$kjj[kejuruan]"; ?></td>
		<td><a href="#" onClick="MM_openBrWindow('vsksk.php?<?php echo"kddsn=$dsnn[iddosen]"; ?>','','scrollbars=yes,width=900,height=900')">JADWAL DOSEN</a>&nbsp;|&nbsp;<a href="<?php echo"#kddsn=$dsnn[iddosen]"; ?>" onClick="MM_openBrWindow('../../SU_admin/m3_dosen.php?mng=csks2&<?php echo"kddsn=$dsnn[iddosen]"; ?>','','scrollbars=yes,width=900,height=900')">MANAGEMENT DOSEN</a></td>
	  </tr>
	<?PHP } ?>
	</table>
    <?PHP } ?>
	</body>
	<?php
	}else{
	
	echo"<h1><center>MAAF AKSES TIDAK DI IJINKAN<br><a href=index.php>klik untuk kembali</a></center></h1>";
	
	}
	?>
	<?php
	}
	?>