<?php //session_start();
 include_once"../sc/conek.php";

	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
	$u = mysql_query("select * from user where namauser='$_SESSION[namauser]'");
	$uu = mysql_fetch_array($u);
	
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
<script type="text/javascript" language="JavaScript">
 function konfirmasi()
 {
 tanya = confirm("Anda Yakin Akan Menghapus SKS ?");
 if (tanya == true) return true;
 else return false;
 }</script>
</head>


<body>
<div class="container">
<h3>Management SKS &nbsp;&nbsp;<a href="?aka=csks" class="btn btn-warning">Pencarian SKS </a></h3> 

<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert"><span class="close">INFORMASI  PENGISIAN </span></button>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede 
</div>
  <?php
  $idsks = @mysql_real_escape_string($_GET['idsks']);
  if(isset($_GET['idsks'])){
  mysql_query("delete from sks where idsks='$idsks'");
   echo "<script language='javascript'>alert('SKS  Berhasil di hapus')</script>";
	echo "<script language='javascript'>window.location = '?aka=vsks'</script>";
	exit();
	}
  ?>
<form name="form1" method="post" action="">
  <table width="500" class="table">
    <tr>
      <td width="189"><select name="nama" id="nama" class="form-control">
        <option>-------kode Program Studi-----------</option>
        <?php
		 $fak = mysql_query("select * from kejuruan order by idkejuruan");
		 while($fakk = mysql_fetch_array($fak)){
		 
		 echo"
		 <option value=$fakk[idkejuruan]>$fakk[idkejuruan]&nbsp; / &nbsp;$fakk[kejuruan]&nbsp;$fakk[progdi]</option>";
		 }
		 
		 ?>
      </select></td>
      <td width="190"><select name="sms" id="sms" class="form-control">
        <option>semester......................</option>
        <?php
		$sm = mysql_query("select * from semester order by idmain asc limit 100");
  while($smm = mysql_fetch_array($sm)){
  $th = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$smm[idtahun_ajaran]'");
  $thh = mysql_fetch_array($th);
  echo"<option value=$smm[idsemester]>$smm[semester] &nbsp; $thh[ajaran] &nbsp; $smm[ajaran]  </option>";
  }
		?>
      </select></td>
      <td width="107"><input name="cari" type="submit" id="cari2" value="cari sks" class="btn btn-success"></td>
    </tr>
  </table>   
</form>
<br>


  <table width="100%" border="0" align="center" bgcolor="#7DFF7D" class="table table-bordered" id="presensi">
    <tr align="center" bgcolor="#FFFFFF">
      <td width="30">No</td>
      <td width="181" height="35">Kode Mapel</td>
      <td width="314">Mata Kuliah </td>
      <td width="189">Semester</td>
      <td width="96">Jumlah </td>
      <td width="212">Action</td>
    </tr>
	<?php
   if(isset($_POST['cari'])){
   $nama = @mysql_real_escape_string($_POST['nama']);
   $sms = @mysql_real_escape_string($_POST['sms']);
  $sks = mysql_query("select * from sks where idkejuruan='$nama' and idsemester='$sms'   order by judul asc limit 2000");
  while($skss = mysql_fetch_array($sks)){
  $sm = mysql_query("select * from semester where idsemester='$skss[idsemester]'");
$smm = mysql_fetch_array($sm);
 $dsn = mysql_query("select * from dosen where iddosen='$skss[iddosen]'");
$dsnn = mysql_fetch_array($dsn);
$kj = mysql_query("select * from kejuruan where idkejuruan='$skss[idkejuruan]'");
$kjj = mysql_fetch_array($kj);
$kr  = mysql_query("select * from kurikulum where idkurikulum='$skss[idkurikulum]'");
$krr = mysql_fetch_array($kr);
  
  ?>
    <?php
  $idsks = @mysql_real_escape_string($_GET['idsks']);
  if(isset($_GET['idsks'])){
  mysql_query("delete from sks where idsks='$idsks'");
   echo "<script language='javascript'>alert('SKS  Berhasil di hapus')</script>";
	echo "<script language='javascript'>window.location = '?pilih=vsks'</script>";
	exit();
	}
  ?>
    <?php
   if($skss['app']=="1"){
  ?>
  <div id="<?php echo"$skss[idsks]"; ?>">
    <tr align="center" bgcolor="#FFFFFF">
      <td><?php
$no++;


?>
        <?php echo'<div style="font-size:1.0em;color:black;font-family: Arial, Helvetica, sans-serif;">'.$no. '</div>'; ?></td>
      <td height="50"><?php echo"<a href=#>$skss[idsks]</a><br>$kjj[kejuruan]"; ?></td>
      <td><?php echo"<b>$krr[judul]</b><br>
	<u>Oleh &nbsp; $dsnn[nama]</u><br>$skss[idkelas]
	"; ?></td>
      <td><?php echo"$smm[semester]<br><b><font color=blue>$skss[hari]</font><br> $skss[jam]  WIB<br>
	Ruang &nbsp; $skss[idruang]
	</b>"; ?></td>
      <td><?php echo"Sks &nbsp;$skss[jumlah]<br>kuota &nbsp;$skss[kuota]"; ?><br>
      <?php 
	$mhs = mysql_query("select * from krs where idsks='$skss[idsks]' and app='2'");
	$jummhs = mysql_num_rows($mhs);
	
	echo"Diambil &nbsp; $jummhs "; ?></td>
      <td align="left">
		
		  <ul><li><a href=<?php echo"?aka=edit_sks&kdsks=$skss[idsks]"; ?>>Edit SKS</a></li>
         <li> <?php
	echo"
	<a href=#$skss[idsks] onClick=MM_openBrWindow('../SU_admin/mabsen.php?kddsn=$skss[iddosen]&idsks=$skss[idsks]#$skss[idsks]','','scrollbars=yes,width=500,height=800')>"; ?>
      Absensi / Presensi </a></li>
         <li> <a href="<?php echo"?aka=vsks&idsks=$skss[idsks]"; ?>" onclick="return konfirmasi()">Hapus SKS</a></li><li><a href="<?php echo"#$skss[idsks]"; ?>" onClick="MM_openBrWindow('<?php echo"isoal_01.php?idsks=$skss[idsks]#$skss[idsks]"; ?>','','scrollbars=yes,width=320,height=500')">Buat Soal</a></li>
		 <li><a href="<?php echo"#$skss[idsks]"; ?>" onClick="MM_openBrWindow('<?php echo"../SU_admin/inilai_krs.php?idsks=$skss[idsks]&kddsn=$skss[iddosen]"; ?>','','scrollbars=yes,width=700,height=700')">Input NIlai</a></li>
		 </ul>	  </td>
    </tr>
	</div>
    <?php
  }elseif($skss['app']=="2"){
  
 
  
  ?>
    <tr align="center" bgcolor="#FF9797">
      <td>&nbsp;</td>
      <td height="50"><?php echo"<a href=#>$skss[idsks]</a><br>$kjj[kejuruan]"; ?></td>
      <td><?php echo"<b>$krr[judul]</b><br>
	<u>Oleh &nbsp; $dsnn[nama]</u>
	"; ?></td>
      <td><?php echo"$smm[semester]<br><b><font color=blue>$skss[hari]</font><br> $skss[jam]  WIB <br>	Ruang &nbsp; $skss[idruang]</b>"; ?></td>
      <td><?php echo"$skss[jumlah]"; ?></td>
      <td><a href=<?php echo"?pilih=vsks&sks=edit_sks&kdsks=$skss[idsks]"; ?>><img src="../img/edit-32.png" width="32" height="32" border="0"></a>&nbsp;
          <?php
	echo"
	<a href=# onClick=MM_openBrWindow('mabsen.php?kddsn=$skss[iddosen]&idsks=$skss[idsks]','','scrollbars=yes,width=500,height=800')>"; ?>
          <img src="../img/bookmark-32.png" width="32" height="32"><img src="../img/error-32.png" width="32" height="32"></td>
    </tr>
    <?php
  }
   }
  
   
  ?>
</table>

  <?php
  }
  ?>
  
  <!--<h3><br>
    SKS PRAKTKUM</h3>
  <table width="715" border="0" align="center" bgcolor="#FF8040">
    <tr align="center" bgcolor="#7DFF7D">
      <td width="142" height="35">Kode Mapel</td>
      <td width="237">Judul</td>
      <td width="156">Semester</td>
      <td width="56">Jumlah </td>
      <td width="102">Action</td>
    </tr>
    <?php
  $psks1 = mysql_query("select * from praktikum ");
  while($pskss1 = mysql_fetch_array($psks1)){
   $sks1 = mysql_query("select * from kurikulum where idkurikulum='$pskss1[idkurikulum]'");
 $skss1 = mysql_fetch_array($sks1);
  $sm1 = mysql_query("select * from semester where idsemester='$pskss1[idsemester]'");
$smm1 = mysql_fetch_array($sm1);
 $dsn1 = mysql_query("select * from dosen where iddosen='$pskss1[iddosen]'");
$dsnn1 = mysql_fetch_array($dsn1);
$kj1 = mysql_query("select * from kejuruan where idkejuruan='$dsnn1[idkejuruan]'");
$kjj1 = mysql_fetch_array($kj1);
 
  ?>
    <?php
   if($pskss1['idkelas']=="A"){
  ?>
    <tr align="center" bgcolor="#FFA477">
      <td height="50"><?php echo"<a href=#>$pskss1[idpraktikum]</a><br>$kjj1[kejuruan]"; ?></td>
      <td><?php echo"<b>$skss1[judul]</b><br>
	<u>Oleh &nbsp; $dsnn1[nama]</u>
	"; ?></td>
      <td><?php echo"$smm1[semester]<br><b><font color=blue>$pskss1[hari]</font><br> $pskss1[jam]  WIB<br>
	Ruang &nbsp; $pskss1[idruang]
	</b>"; ?></td>
      <td><?php echo"$pskss1[jumlah]"; ?></td>
      <td><a href=<?php echo"?pilih=vsks&sks=edit_praktikum&idpr=$pskss1[idpraktikum]&iddosen=$pskss1[iddosen]&idkurikulum=$pskss1[idkurikulum]"; ?>><img src="../img/edit-32.png" width="32" height="32" border="0"></a>
          <?php
	echo"
	<a href=# onClick=MM_openBrWindow('mabsen2.php?kddsn=$pskss1[iddosen]&idsks=$pskss1[idpraktikum]','','scrollbars=yes,width=500,height=800')>"; ?>
          <img src="../img/bookmark-32.png" width="32" height="32"></td>
    </tr>
    <?php
  }elseif($pskss1['idkelas']=="B"){
  
 
  
  ?>
    <tr align="center" bgcolor="#FF9797">
      <td height="50"><?php echo"<a href=#>$pskss1[idpraktikum]</a><br>$kjj1[kejuruan]"; ?></td>
      <td><?php echo"<b>$skss1[judul]</b><br>
	<u>Oleh &nbsp; $dsnn1[nama]</u>
	"; ?></td>
      <td><?php echo"$smm1[semester]<br><b><font color=blue>$pskss1[hari]</font><br> $pskss1[jam]  WIB<br>
	Ruang &nbsp; $pskss1[idruang]
	</b>"; ?></td>
      <td><?php echo"$pskss1[jumlah]"; ?></td>
      <td><a href=<?php echo"?pilih=vsks&sks=edit_praktikum&idpr=$pskss1[idpraktikum]&iddosen=$pskss1[iddosen]&idkurikulum=$pskss1[idkurikulum]"; ?>><img src="../img/edit-32.png" width="32" height="32" border="0"></a>&nbsp;
          <?php
	echo"
	<a href=# onClick=MM_openBrWindow('mabsen2.php?kddsn=$pskss1[iddosen]&idsks=$pskss1[idpraktikum]','','scrollbars=yes,width=500,height=800')>"; ?>
          <img src="../img/bookmark-32.png" width="32" height="32"></td>
    </tr>
    <?php
  }
   }
   
  ?>
  </table>
  -->
</div>

</body>
</html>
<?php
}
?>