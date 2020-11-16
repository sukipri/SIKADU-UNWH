	<?php  include_once"pop.php"; ?>
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
	<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Untitled Document</title>
	</head>
	
	<body>
	<div class="alert alert-dismissible alert-warning">
	  <b>#SELAMAT DATANG DI SIKADU UNWAHAS</b>
	  <ul>
	  <li>Jika anda baru pertama kali menggunakan sistem ini segera UPDATE data pribadi anda di menu &quot;Edit Profil Mahasiswa&quot; </li>
	  <li> Isi data anda dengan benar, terutama pada kolom Dosen Wali dan Kelas</li>
	  <li>Segera ganti password sikadu online anda dengan yang baru di menu &quot;Edit Akun Sikadu&quot; dan simpan dengan baik </li>
	  <li>Gunakan Akun anda dengan sebaik-baiknya. </li>
	  <li><b>Jika ada pertanyaan tentang SIKADU Kirim MyMail anda ke ID 8008 </b> </li>
	  </ul>
	</div>
	<br>
	
	<table width="600" border="0" class="table table-bordered table-sm table-striped" style="max-width:55rem;">
	  <tr>
		<td width="245"> 
		<?php
		$ftht = mysql_num_rows($ft);
		 if($ftht==1){
		 ?>
		
		 <?php
		 echo"<center><img src=http://sikadu.unwahas.ac.id/file/$ftt[foto] class=img-responsive width=350 height=350></center><br>"; 
		 }else{
		 ?>
	 <a href="#" onClick="MM_openBrWindow('u_foto/index.php','','scrollbars=yes,width=500,height=500')">
		
		 <?php
		 echo"<center><img src=http://sikadu.unwahas.ac.id/img/no.jpg class=img-responsive></center>"; 
		 } ?>
		 </a>
		
		 </td>
		<td width="345">
        <table width="600" border="0" class="table">
		  <tr>
			<td width="101" height="30">Nama</td>
			<td width="230"><?php echo"$mhss[nama]"; ?></td>
		  </tr>
		  <tr>
			<td height="28">Alamat</td>
			<td><?php echo"$mhss[alamat]"; ?></td>
		  </tr>
		  <tr>
			<td height="32">Email</td>
			<td><?php echo"$mhss[email]"; ?></td>
		  </tr>
		  <tr>
			<td height="33">Hp/tlp</td>
			<td><?php echo"$mhss[tlp]"; ?></td>
		  </tr>
		  <tr>
			<td height="30">Wali Dosen </td>
			<td><?php echo"$dsnn2[nama]"; ?> &nbsp; <a href="?mng=newmail&iduntuk=<?php echo"$dsnn2[iddosen]"; ?>" class="btn btn-warning btn-sm">Send MyMail</a></td>
		  </tr>
		  <tr>
			<td height="31">Semester</td>
			<td><?php echo"$mhss[idsemester]"; ?></td>
		  </tr>
		  <tr>
			<td height="32">Kelas</td>
			<td><?php echo"$mhss[idkelas]"; ?></td>
		  </tr>
		  <tr>
			<td>Jenis Kelamin </td>
			<td><?php echo"$mhss[jeniskelamin]"; ?></td>
		  </tr>
		</table>
		<?php
		$ms = mysql_query("select * from mymail where untuk='$mhss[idmahasiswa]' and baca='1' order by idmain desc limit 50   ");
		while($mms = mysql_fetch_array($ms)){
	  
	  
	  ?>
		<div class="alert alert-dismissible alert-success">
	  <button type="button" class="close" data-dismiss="alert"><?php echo"$mms[tgl]"; ?></button>
	  <strong>Pesan Baru!!</strong> Dari <a href="<?php echo"?mng=viewinbox&&dari=$mms[dari]&untuk=$mms[untuk]#dwn_$mms[idmain] "; ?>" class="alert-link"><?php echo"$mms[dari]-$mms[nama]"; ?></a>&nbsp;please....,read it!
	</div>
	<?php
	}
	?>
	</td>
	  </tr>
	</table>
	<br>
	
	<!-- Stack the columns on mobile by making one full-width and the other half-width -->
	
	</body>
	</html>
