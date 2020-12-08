<?php session_start();
 include_once"../../sc/conek.php";
	include"css.php";
	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
		$u = mysql_query("select * from user where namauser='$_SESSION[namauser]'");
	$uu = mysql_fetch_array($u);
	$aka = mysql_query("select idakademik,idfakultas,namauser,passuser,akses FROM akademik where idakademik='$uu[idakademik]'");
		$akaa = mysql_fetch_array($aka);
	
 ?>

<style type="text/css">
<!--
body,td,th {
	font-size: 13px;
}
a:link {
	color: #003399;
	font-weight: bold;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #003399;
}
a:hover {
	text-decoration: none;
	color: #003399;
}
a:active {
	text-decoration: none;
	color: #003399;
}
.btn {
  background: #CCC; 
  color: #FFF;
  display: inline-block;
  border-radius: 4px;
  box-shadow: inset 0 1px 0 rgba(255,255,255,0.2);
  font-family: Arial, sans-serif;
  line-height: 2.5em;
  padding: 0 3em;
  text-decoration: none; 
   background: linear-gradient(#6BDB55,#57B245);
  text-shadow: 1px 1px 1px #57B245; 
  line-height: 3em;
  padding: 0 3.5em; 
}
-->
</style>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
</head>
<body>
<?php
$kddsn=@mysql_real_escape_string($_GET['kddsn']);
$idsks=@mysql_real_escape_string($_GET['idsks']);

 $dsn = mysql_query("select * from dosen where iddosen='$kddsn'");
$dsnn = mysql_fetch_array($dsn);
$kj = mysql_query("select * from kejuruan where idkejuruan='$dsnn[idkejuruan]'");
$kjj = mysql_fetch_array($kj);



?> 
<h3>INPUT &amp; CETAK ABSENSI MAHASISWA
<br>
<?php
 $sks1 = mysql_query("select * from sks where idsks='$idsks'");
$skss1 = mysql_fetch_array($sks1);
$kr  = mysql_query("select * from kurikulum where idkurikulum='$skss1[idkurikulum]'");
$krr = mysql_fetch_array($kr);
echo"<i>Kode MK &nbsp; $skss1[idsks]/&nbsp;$krr[judul] /&nbsp; Jumlah &nbsp; $skss1[jumlah]</i></h3>";
?>
<table width="100%" border="0" bgcolor="#FFFFFF">
  <tr align="center" bgcolor="#FFFFFF">
    <td height="35"><?php echo"<a href=# class=btn onClick=MM_openBrWindow('absen_realtime.php?kddsn=$kddsn&idsks=$idsks','','scrollbars=yes,width=800,height=800')>"; ?>
      <!-- <a href="?absen=ihabsen<?php echo"&kddsn=$kddsn&idsks=$idsks"; ?>" class="btn"> -->
      <img src="http://sikadu.unwahas.ac.id/img/link-32.png" width="32" height="32" border="0"><br>
INPUT ABSENSI MAHASISWA </td>
    <td><?php echo"<a href=# class=btn onClick=MM_openBrWindow('ctk_lap_absensi_harian.php?kddsn=$kddsn&idsks=$idsks','','scrollbars=yes,width=800,height=800')>"; ?><!-- <a href="?absen=ihabsen<?php echo"&kddsn=$kddsn&idsks=$idsks"; ?>" class="btn"> --> <img src="http://sikadu.unwahas.ac.id/img/link-32.png" width="32" height="32" border="0"><br>
    CETAK LAPORAN ABSENSI HARIAN </a></td>
    <td><?php echo"<a href=# class=btn onClick=MM_openBrWindow('ctk_absen_uts.php?kddsn=$kddsn&idsks=$idsks','','scrollbars=yes,width=800,height=800')>"; ?>
      <!-- <a href="?absen=ihabsen<?php echo"&kddsn=$kddsn&idsks=$idsks"; ?>" class="btn"> -->
      <img src="http://sikadu.unwahas.ac.id/img/link-32.png" width="32" height="32" border="0"><br>
CETAK MANUAL ABSENSI UTS</td>
  </tr>
  <tr align="center" bgcolor="#FFFFFF">
    <td width="31%" height="35"><?php echo"<a href=# class=btn onClick=MM_openBrWindow('ctk_absen_harian.php?kddsn=$kddsn&idsks=$idsks','','scrollbars=yes,width=800,height=800')>"; ?><!-- <a href="?absen=ihabsen<?php echo"&kddsn=$kddsn&idsks=$idsks"; ?>" class="btn"> --> <img src="http://sikadu.unwahas.ac.id/img/link-32.png" width="32" height="32" border="0"><br>
    CETAK MANUAL ABSENSI HARIAN </a> </td>
    <td width="27%"><?php echo"<a href=# class=btn onClick=MM_openBrWindow('ctk_absen_uas.php?kddsn=$kddsn&idsks=$idsks','','scrollbars=yes,width=800,height=800')>"; ?><!-- <a href="?absen=ihabsen<?php echo"&kddsn=$kddsn&idsks=$idsks"; ?>" class="btn"> --> <img src="http://sikadu.unwahas.ac.id/img/link-32.png" width="32" height="32" border="0"><br>
CETAK MANUAL ABSENSI UAS </a></td>
    <td width="42%">&nbsp;</td>
  </tr>
</table>
<br>
<?php
switch(@mysql_real_escape_string($_GET['absen'])){

case'ihabsen':
include"bciabsen.php";
break;


}
?>


</body>
</html>
<?PHP } ?>