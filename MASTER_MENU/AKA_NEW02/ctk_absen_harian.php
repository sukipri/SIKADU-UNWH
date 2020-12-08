<?php session_start();
 include_once"../../sc/conek.php";

	
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
a {
	font-size: 13px;
	color: #000099;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #000099;
}
a:hover {
	text-decoration: none;
	color: #000099;
}
a:active {
	text-decoration: none;
	color: #000099;
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
$kdmhs=@mysql_real_escape_string($_GET['kdmhs']);
 $dsn = mysql_query("select * from dosen where iddosen='$kddsn'");
$dsnn = mysql_fetch_array($dsn);
$kj = mysql_query("select * from kejuruan where idkejuruan='$dsnn[idkejuruan]'");
$kjj = mysql_fetch_array($kj);
 $sks1 = mysql_query("select * from sks where idsks='$idsks'");
$skss1 = mysql_fetch_array($sks1);
$kr  = mysql_query("select * from kurikulum where idkurikulum='$skss1[idkurikulum]'");
$krr = mysql_fetch_array($kr);
$smt = mysql_query("select * from semester where idsemester='$skss1[idsemester]'");
$smtt = mysql_fetch_array($smt);


?> 
<h3><br>
   <img src="http://sikadu.unwahas.ac.id/img/logokecil.gif" width="63" height="68">PRESENSI KEHADIRAN MAHASISWA
  <?php

echo" $smtt[semester]</i></h3>";
?><hr color="#FF7735">
</h3>
<table width="100%">
  <tr>
    <td><?php echo"MATA KULIAH : &nbsp; $krr[judul]"; ?></td>
    <td><?php echo"PRODI : &nbsp; $kjj[kejuruan]"; ?></td>
    <td><?php echo"RUANG: &nbsp; $skss1[idruang]"; ?></td>
  </tr>
  <tr>
    <td><?php echo"DOSEN PENGAMPU : &nbsp; $dsnn[nama]"; ?></td>
    <td><?php echo"HARI : &nbsp; $skss1[hari] / $skss1[jam]"; ?></td>
    <td><?php echo"KELAS : $skss1[idkelas] "; ?></td>
  </tr>
</table>
<form name="form1" method="post" action="">
  <table width="100%" border="0" align="center" bgcolor="#000000">
    <tr align="center" bgcolor="#DBDBDB">
      <td width="15%" height="40">Nama</td>
      <td width="12%">NIM </td>
      <td width="5%" bgcolor="#FFFFFF">1</td>
      <td width="5%" bgcolor="#FFFFFF">2</td>
      <td width="4%" bgcolor="#FFFFFF">3</td>
      <td width="4%" bgcolor="#FFFFFF">4</td>
      <td width="3%" bgcolor="#FFFFFF">5</td>
      <td width="4%" bgcolor="#FFFFFF">6</td>
      <td width="4%" bgcolor="#FFFFFF">7</td>
      <td width="4%" bgcolor="#FFFFFF">8</td>
      <td width="4%" bgcolor="#FFFFFF">9</td>
      <td width="4%" bgcolor="#FFFFFF">10</td>
      <td width="4%" bgcolor="#FFFFFF">11</td>
      <td width="5%" bgcolor="#FFFFFF">12</td>
      <td width="5%" bgcolor="#FFFFFF">13</td>
      <td width="4%" bgcolor="#FFFFFF">14</td>
      <td width="4%" bgcolor="#FFFFFF">15</td>
      <td width="4%" bgcolor="#FFFFFF">16</td>
      <td width="6%" bgcolor="#FFFFFF">CATATAN</td>
    </tr>
    <?php
 $krsa = mysql_query("select * from krs where idsks='$idsks'  order by idmahasiswa asc limit 2000 ");
	$i =1;
  while($krssa = mysql_fetch_array($krsa)){
    $sks = mysql_query("select * from sks where idsks='$krssa[idsks]'");
$skss = mysql_fetch_array($sks);
  $sm = mysql_query("select * from semester where idsemester='$skss[idsemester]'");
$smm = mysql_fetch_array($sm);
$mhs = mysql_query("select * from mahasiswa where idmahasiswa='$krssa[idmahasiswa]' ");
$mhss = mysql_fetch_array($mhs);
 

  ?>
    <tr align="center" bgcolor="#FFFFFF">
      <td height="53" align="left"><?php echo"$mhss[nama]"; ?></td>
      <td><?php echo"$krssa[idmahasiswa]"; ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
	 <input name="<?php echo"mhs$i"; ?>" type="hidden" value="<?php echo"$krss[idkrs]"; ?>" >
    <?php
	$i++;
  }
  }
  
 $jumMhs = $i-1;
  ?>
  <input name="<?php echo"n"; ?>" type="hidden" value="<?php echo"$jumMhs"; ?>" >
 
  </table>
</form>
<?php
if(isset($_POST['update'])){
$jumMhs = @$_POST['n'];
for ($i2=1; $i2<=$jumMhs; $i2++)
{
$nimMhs = @$_POST['mhs'.$i2];
$nimMhs2 = @$_POST['mhss'.$i2];
$nilai = @$_POST['absen'.$i2];
//$nilai2 = @$_POST['nilaii'.$i2];
//$nilai3 = @$_POST['nilai3'.$i2];
//$nilai4 = @$_POST['nilai4'.$i2];

mysql_query("update krs set ahr='$nilai' where idkrs='$nimMhs' ");

}
echo"<center><b>Data Berhasil Di simpan</b></center>";

?>
</body>
</html>
<?PHP } ?>