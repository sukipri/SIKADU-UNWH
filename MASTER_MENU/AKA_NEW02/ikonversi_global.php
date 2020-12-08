<?php //session_start();
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
<form name="form1" method="post" action="">
<table width="624" align="center">
  <tr>
    <td colspan="3" valign="top">
      <img src="http://sikadu.unwahas.ac.id/img/box_64x64.png" width="35" height="34">
KONVERSI MAHASISWA (GLOBAL MOVEMENT)   
<hr color="#F27900">      </td>
  </tr>
  <tr>
    <td width="325" valign="top"><select name="cari" class="form-control">
      <option>Progdi</option>
      <?php
		 $fak = $call_q("select * from kejuruan order by idkejuruan");
		 while($fakk = $call_fas($fak)){
		 
		 echo"
		 <option value=$fakk[idkejuruan]>$fakk[idkejuruan]&nbsp; / &nbsp;$fakk[kejuruan]&nbsp;$fakk[progdi]</option>";
		 }
		 
		 ?>
    </select>      </td>
    <td width="227" valign="top"><select name="ang" id="ang" class="form-control">
      <option>Tahun</option>
      <?php
		 $aj = $call_q("select * from tahun_ajaran order by ajaran asc limit 200");
		 while($ajj = $call_fas($aj)){
		 
		 echo"
		 <option value=$ajj[idtahun_ajaran]>$ajj[ajaran]</option>";
		 }
		 
		 ?>
    </select></td>
    <td width="56" valign="top"><input name="cari_data" type="submit" id="cari_data2" value="Submit" class="btn btn-success"></td>
  </tr>
</table><br>
  <table width="748" align="center" bgcolor="#00A854" class="table table-bordered">
    <tr align="left" valign="top" bgcolor="#FFA477">
      <td height="28" colspan="2">DATA KONVERSI </td>
    </tr>
    <?php 
		  if(isset($_POST['cari_data'])){
		$nama = $sql_escape($_POST['cari']);
		$ang = $sql_escape($_POST['ang']);
		$mhs = $call_q("select idmahasiswa,idkejuruan,iddosen,idgelombang,idsemester,idtahun_ajaran,nama,idkelas,mhs,krs,st,alamat from mahasiswa where idkejuruan='$nama' and idtahun_ajaran='$ang'  ");
		$no = 1;
		$mhss = $call_fas($mhs);
		$jum_mhs = mysql_num_rows($mhs);
		
		$kj = $call_q("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
		$kjj = $call_fas($kj);
		$kj = $call_q("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
		$kjj = $call_fas($kj);
		$gel = $call_q("select * from gelombang where idgelombang='$mhss[idgelombang]'");
		$gell = $call_fas($gel);
		$sm = $call_q("select * from semester where idsemester='$mhss[idsemester]'");
		$smm = $call_fas($sm);
		$us = $call_q("select * from user_mhs where idmahasiswa='$mhss[idmahasiswa]'");
		$uss = $call_fas($us);
		   $ft = $call_q("select * from foto_mhs where idmahasiswa='$mhss[idmahasiswa]' order by idfoto desc limit 1");
		  $ftt  = $call_fas($ft);
		   $dsn = $call_q("select * from dosen where iddosen='$mhss[iddosen]'");
		$dsnn = $call_fas($dsn);

  ?>
    <tr align="left" valign="top" bgcolor="#FFFFFF">
      <td width="517" height="36"><?php echo"$kjj[kejuruan]<br>$jum_mhs Mahasiswa<br>angkatan $ang<br>Semester $mhss[idsemester]"; ?>
	
	  </td>
      <td width="219">  <a href="#" class="btn btn-info" onClick="MM_openBrWindow('../../SU_admin/isks_conversi_konfirmasi.php<?php echo"?idkj=$kjj[idkejuruan]&idthn=$ang"; ?>','','scrollbars=yes,width=500,height=500')">Klik Untuk Konfirmasi</a></td>
    </tr>
   <?php
}
?>
  </table>
</form>
<div id="above"></div>
</body>
<?PHP } ?>