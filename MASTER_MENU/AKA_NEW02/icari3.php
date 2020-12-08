	<?php //session_start();
	 include_once"../sc/conek.php";
	
		
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
			//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
			header('location:index.php');
		} else {
	 ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
	<html>
	<head>
	<title>Untitled Document</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<script language="JavaScript" type="text/JavaScript">
	<!--
	function MM_openBrWindow(theURL,winName,features) { //v2.0
	  window.open(theURL,winName,features);
	}
	//-->
	</script>
	</head>
	
	<body>
	<form name="form1" method="post" action="">
	  <select name="nama" id="nama" required>
		<option required>kode Program Studi</option>
		<?php
			 $fak = mysql_query("select * from kejuruan order by idkejuruan");
			 while($fakk = mysql_fetch_array($fak)){
			 
			 echo"
			 <option value=$fakk[idkejuruan]>$fakk[idkejuruan]&nbsp; / &nbsp;$fakk[kejuruan]&nbsp;$fakk[progdi]</option>";
			 }
			 
			 ?>
	  </select>
	  <input name="cari" type="submit" id="cari" value="cari dosen pengajar"> 
	  [<a href="?aka=vprofil_dosen">CARI DOSEN</a>] 
	</form><br>
	<table width="742" height="74" border="0" align="center" bgcolor="#00A854">
	  <tr align="center" valign="top" bgcolor="#7DFF7D">
		<td width="105" height="31">NID</td>
		<td width="300">Nama</td>
		<td width="92">Gelar</td>
		<td width="142">Pengampu</td>
		<td width="81">Action</td>
	  </tr>
	  <?php
	  if(isset($_POST['cari'])){
	  $nama= @mysql_real_escape_string($_POST['nama']);
	  $dsn = mysql_query("select * from dosen where idkejuruan='$nama' order by nama desc limit 2000");
	  while($dsnn = mysql_fetch_array($dsn)){
	  $kj = mysql_query("select * from kejuruan where idkejuruan='$dsnn[idkejuruan]'");
	$kjj = mysql_fetch_array($kj);
	  ?>
	  <tr align="center" valign="top" bgcolor="#FFFFFF">
		<td height="37"><?php echo"<b>$dsnn[iddosen]</b>"; ?></td>
		<td><?php echo"$dsnn[nama]"; ?></td>
		<td><?php echo"$dsnn[gelar]"; ?></td>
		<td><?php echo"$kjj[kejuruan]"; ?></td>
		<td><a href="#" onClick="MM_openBrWindow('../SU_admin/m2_dosen.php?<?php echo"kddsn=$dsnn[iddosen]"; ?>','','scrollbars=yes,width=900,height=900')">MANAGEMENT DOSEN</a></td>
	  </tr>
	  <?php
	  }
	  }
	  ?>
	</table>
	</body>
	</html>
	<?php
	}
	?>