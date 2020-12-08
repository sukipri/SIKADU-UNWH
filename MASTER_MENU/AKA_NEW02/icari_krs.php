<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
    <div id="now">  
<form name="form1" method="post" action="#now">
  <table width="624" align="center">we
    <tr>
      <td width="616" colspan="2" valign="top"><span class="style343"><img src="../img/search2.png" width="44" height="50">Pencarian Mahsiswa 
          <hr color="#F27900">
      </span>*(Masukan Kode Mahasiwa yang sudah terdaftar</td>
    </tr>
    <tr>
      <td valign="top"><input name="cari" type="text" id="cari" size="37" class="form-control" required></td>
      <td valign="top"><input name="cari_data" type="submit" id="cari_data" class="btn btn-success" value="cari mahasiswa"></td>
    </tr>
  </table>

</form>
</div>
<br>
	<?php 
  if(isset($_POST['cari_data'])){
$nama = @mysql_real_escape_string($_POST['cari']);
$mhs = mysql_query("select * from mahasiswa WHERE nama LIKE '%$nama%' or idmahasiswa='$nama'");
$no = 1;


  ?>

    <table width="100%" class="table table-bordered">
      <tr class="success">
        <td width="12%">#NIM</td>
        <td width="32%">#NAMA</td>
        <td width="22%">#KELAS</td>
        <td width="34%">#ACTION</td>
      </tr>
	  <?php 
	  while($mhss = mysql_fetch_assoc($mhs)){
$kj = mysql_query("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
$kjj = mysql_fetch_assoc($kj);
$kj = mysql_query("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
$kjj = mysql_fetch_assoc($kj);
$gel = mysql_query("select * from gelombang where idgelombang='$mhss[idgelombang]'");
$gell = mysql_fetch_assoc($gel);
$sm = mysql_query("select * from semester where idsemester='$mhss[idsemester]'");
$smm = mysql_fetch_assoc($sm);
$us = mysql_query("select * from user_mhs where idmahasiswa='$mhss[idmahasiswa]'");
$uss = mysql_fetch_assoc($us);
  $ft = mysql_query("select * from foto_mhs where idmahasiswa='$mhss[idmahasiswa]' order by idfoto desc limit 1");
  $ftt  = mysql_fetch_assoc($ft);
   $dsn = mysql_query("select * from dosen where iddosen='$mhss[iddosen]'");
$dsnn = mysql_fetch_assoc($dsn);
	  ?>
      <tr>
        <td><?php echo"$mhss[idmahasiswa]"; ?></td>
        <td><?php echo"$mhss[nama]"; ?></td>
        <td><?php echo"$smm[semester]"; ?></td>
        <td><a href="#" onClick="MM_openBrWindow('<?php echo"vmakul.php?KDMHS=$mhss[idmahasiswa]&KELAS=$mhss[idkelas]#8234628364283"; ?>','','scrollbars=yes,width=700,height=500')">Entry KRS Active</a></td>
      </tr>
	  <?php } } ?>
    </table>

</body>
</html>
