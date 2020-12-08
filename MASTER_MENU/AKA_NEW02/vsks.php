<?php //session_start();
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {

 ?>
<body>
<div class="container">
<h3>Management SKS &nbsp;&nbsp;<a href="?aka=csks" class="btn btn-warning">Pencarian SKS </a></h3> 

<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert"><span class="close">INFORMASI  PENGISIAN </span></button>
  <ul type="1"><li>Pilih program studi</li><li>Pilih semester</li><li>Pilih program studi</li><li>klik <b>cari sks</b></li></ul>
</div>
  <?php
  	$no = 0;
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
      <td width="189"><select name="nama" id="nama" required class="form-control form-control-sm">
        <option>PROGDI</option>
        <?php
		 $fak = mysql_query("select * from kejuruan order by idkejuruan");
		 while($fakk = mysql_fetch_array($fak)){
		 
		 echo"
		 <option value=$fakk[idkejuruan]>$fakk[idkejuruan]&nbsp; / &nbsp;$fakk[kejuruan]&nbsp;$fakk[progdi]</option>";
		 }
		 
		 ?>
      </select></td>
      <td width="190"><select required name="sms" id="sms" class="form-control form-control-sm ">
        <option>Semester</option>
        <?php
			
		$sm = mysql_query("select * from semester order by idmain asc limit 100");
  while($smm = mysql_fetch_array($sm)){
  $th = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$smm[idtahun_ajaran]'");
  $thh = mysql_fetch_array($th);
  echo"<option value=$smm[idsemester]>$smm[semester] &nbsp; $thh[ajaran] &nbsp; $smm[ajaran]  </option>";
  }
		?>
      </select></td>
      <td width="107"> <button class="btn btn-success btn-sm" name="cari"><i class="fa fa-send"></i>&nbsp;Cari Data</button></td>
    </tr>
  </table>   
</form>
<br>


  <table width="100%" border="0" align="center"  class="table table-bordered table-sm table-striped" id="presensi">
    <tr align="center" class="table-info">
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
  $sks = mysql_query("select s.idsemester, s.iddosen, s.idkejuruan, s.idkurikulum, s.idsks, s.idkelas, s.hari, s.jam, s.idruang, s.jumlah, s.kuota, s.app, i.kejuruan, l.judul, o.nama, u.semester from sks s, kejuruan i, kurikulum l, dosen o, semester u where s.idkejuruan='$nama' and s.idsemester='$sms' and s.idsemester=u.idsemester and s.iddosen=o.iddosen and s.idkejuruan=i.idkejuruan and s.idkurikulum=l.idkurikulum  order by s.judul asc limit 2000");
  while($skss = mysql_fetch_array($sks)){
  //$sm = mysql_query("select * from semester where idsemester='$skss[idsemester]'");
//$smm = mysql_fetch_array($sm);
// $dsn = mysql_query("select * from dosen where iddosen='$skss[iddosen]'");
//$dsnn = mysql_fetch_array($dsn);
//$kj = mysql_query("select * from kejuruan where idkejuruan='$skss[idkejuruan]'");
//$kjj = mysql_fetch_array($kj);
//$kr  = mysql_query("select * from kurikulum where idkurikulum='$skss[idkurikulum]'");
//$krr = mysql_fetch_array($kr);
  
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
   if($skss[11]=="1"){
  ?>
  <div id="<?php echo"$skss[4]"; ?>">
    <tr align="center">
      <td><?php
$no++;


?>
        <?php echo'<div style="font-size:1.0em;color:black;font-family: Arial, Helvetica, sans-serif;">'.$no. '</div>'; ?></td>
      <td height="50"><?php echo"<a href=#>$skss[4]</a><br>$skss[12]"; ?></td>
      <td><?php echo"<b>$skss[13]</b><br>
	<u>Oleh &nbsp; $skss[14]</u><br>$skss[5]
	"; ?></td>
      <td><?php echo"$skss[15]<br><b><font color=blue>$skss[6]</font><br> $skss[7]  WIB<br>
	Ruang &nbsp; $skss[8]
	</b>"; ?></td>
      <td><?php echo"Sks &nbsp;$skss[9]<br>kuota &nbsp;$skss[10]"; ?><br>
      <?php 
	$mhs = mysql_query("select * from krs where idsks='$skss[4]' and app='2'");
	$jummhs = mysql_num_rows($mhs);
	
	echo"Diambil &nbsp; $jummhs "; ?></td>
      <td align="left">
		
		  <ul><li><a href=<?php echo"?aka=edit_sks&kdsks=$skss[4]"; ?>>Edit SKS</a></li>
         <li> <?php
	echo"
	<a href=#$skss[4] onClick=MM_openBrWindow('../SU_admin/mabsen.php?kddsn=$skss[1]&idsks=$skss[4]#$skss[4]','','scrollbars=yes,width=500,height=800')>"; ?>
      Absensi / Presensi </a></li>
         <li> <a href="<?php echo"?aka=vsks&idsks=$skss[4]"; ?>" onclick="return konfirmasi()">Hapus SKS</a></li><li><a href="<?php echo"#$skss[4]"; ?>" onClick="MM_openBrWindow('<?php echo"isoal_01.php?idsks=$skss[4]#$skss[4]"; ?>','','scrollbars=yes,width=320,height=500')">Buat Soal</a></li>
		 <li><a href="<?php echo"#$skss[4]"; ?>" onClick="MM_openBrWindow('<?php echo"../SU_admin/inilai_krs.php?idsks=$skss[4]&kddsn=$skss[1]"; ?>','','scrollbars=yes,width=700,height=700')">Input NIlai</a></li>
		 </ul>	  </td>
    </tr>
	</div>
    <?php
  }elseif($skss[11]=="2"){
  
 
  
  ?>
    <tr align="center" bgcolor="#FF9797">
      <td>&nbsp;</td>
      <td height="50"><?php echo"<a href=#>$skss[4]</a><br>$skss[12]"; ?></td>
      <td><?php echo"<b>$skss[13]</b><br>
	<u>Oleh &nbsp; $skss[14]</u>
	"; ?></td>
      <td><?php echo"$skss[15]<br><b><font color=blue>$skss[6]</font><br> $skss[7]  WIB <br>	Ruang &nbsp; $skss[8]</b>"; ?></td>
      <td><?php echo"$skss[9]"; ?></td>
      <td><a href=<?php echo"?pilih=vsks&sks=edit_sks&kdsks=$skss[4]"; ?>><img src="../img/edit-32.png" width="32" height="32" border="0"></a>&nbsp;
          <?php
	echo"
	<a href=# onClick=MM_openBrWindow('mabsen.php?kddsn=$skss[1]&idsks=$skss[4]','','scrollbars=yes,width=500,height=800')>"; ?>
          <img src="../img/bookmark-32.png" width="32" height="32"><img src="../img/error-32.png" width="32" height="32"></td>
    </tr>
 <?PHP }} ?>
</table>
<?PHP } ?>
  
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
 <?PHP }} ?>
  </table>
  -->
</div>

</body>

<?PHP } ?>