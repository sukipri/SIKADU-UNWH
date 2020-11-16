<?php //session_start();
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
 ?>
	<script language="JavaScript" type="text/JavaScript">
    <!--
    function MM_openBrWindow(theURL,winName,features) { //v2.0
      window.open(theURL,winName,features);
    }
    //-->
    </script>

<body>
	<h5>#ABSENSI MAHASISWA</h5>
    <br>
<form name="form1" method="post" action="">
  <table width="600" border="0" class="table">
    <tr>
      <td><input name="cari" type="text" id="cari3" size="45" placeholder="masukan nama dosen" class="form-control"></td>
      <td><input name="cari_data" type="submit" id="cari_data2" value="cari dosen pengajar" class="btn btn-success"></td>
    </tr>
  </table>
</form>
<br>
<table width="742" height="74" border="0" align="center" bgcolor="#FFFFFF" class="table table-bordered table-sm table-striped">
  <tr class="table-info">
    <td width="105" height="31"><strong>NID</strong></td>
    <td width="300"><strong>Nama</strong></td>
    <td width="92"><strong>Gelar</strong></td>
    <td width="142"><strong>Pengampu</strong></td>
    <td width="81"><strong>Action</strong></td>
  </tr>
  <?php
  if(isset($_POST['cari_data'])){
  $car = @mysql_real_escape_string($_POST['cari']);
  $dsn = mysql_query("select * from dosen where nama LIKE '%$car%' order by nama desc limit 2000");
  while($dsnn = mysql_fetch_array($dsn)){
  $kj = mysql_query("select * from kejuruan where idkejuruan='$dsnn[idkejuruan]'");
$kjj = mysql_fetch_array($kj);
  ?>
  <tr align="left" valign="top" bgcolor="#FFFFFF">
    <td height="37"><?php echo"<b>$dsnn[iddosen]</b>"; ?></td>
    <td><?php echo"$dsnn[nama]"; ?></td>
    <td><?php echo"$dsnn[gelar]"; ?></td>
    <td><?php echo"$kjj[kejuruan]"; ?></td>
    <td><a href="#" onClick="MM_openBrWindow('absen.php?<?php echo"kddsn=$dsnn[iddosen]"; ?>','','scrollbars=yes,width=900,height=900')">ABSENSI</a></td>
  </tr>
	<?PHP }} ?>
</table>
</body>
<?PHP } ?>