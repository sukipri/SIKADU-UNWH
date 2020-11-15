<?php session_start();
 include_once"../sc/conek.php";

	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
	$u = mysql_query("select * from user_ku where username='$_SESSION[namauser]'");
	$uu = mysql_fetch_array($u);
	$ku = mysql_query("select * from ku where idku='$uu[idku]'");
	$kuu = mysql_fetch_array($ku);
	$kdmhs = $kuu['idku'];
 ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>input REKAM SEMESTER</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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

<h3>INPUT REKAM SEMESTER<hr color="#000000"> 
  <?php //$kddsn=@mysql_real_escape_string($_GET['kddsn']);
//$idsks=@mysql_real_escape_string($_GET['idsks']);
$kdjur=@mysql_real_escape_string($_GET['kdjur']); ?>
</h3>
<form name="form1" method="post" action="">
  <table width="100%" border="0" align="center" bgcolor="#FFFFFF">
    <tr align="left" bgcolor="#00E171">
      <td height="40" colspan="4"><input name="update" type="submit" id="update" value="simpan data"></td>
    </tr>
    <tr align="center" bgcolor="#00E171">
      <td width="16%" height="40">Nama</td>
      <td width="16%">NIM </td>
      <td width="19%">Semester </td>
      <td><select name="semester">
        <option>semester......................</option>
        <?php
		$sm = mysql_query("select * from semester");
  while($smm = mysql_fetch_array($sm)){
  $th = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$smm[idtahun_ajaran]'");
  $thh = mysql_fetch_array($th);
  echo"<option value=$smm[idsemester]>$smm[semester] &nbsp; $thh[ajaran] &nbsp; $smm[ajaran]  </option>";
  }
		?>
      </select></td>
    </tr>
    <?php
	
 //$dsn = mysql_query("select * from dosen where iddosen='$kddsn'");
///$dsnn = mysql_fetch_array($dsn);
//$kj = mysql_query("select * from kejuruan where idkejuruan='$dsnn[idkejuruan]'");
//$kjj = mysql_fetch_array($kj);
    //$krs = mysql_query("select * from krs where idsks='$idsks' order by idmahasiswa asc limit 2000 ");
	
  //while($krss = mysql_fetch_array($krs)){
    //$sks = mysql_query("select * from sks where idsks='$krss[idsks]'");
//$skss = mysql_fetch_array($sks);
  //$sm = mysql_query("select * from semester where idsemester='$skss[idsemester]'");
//$smm = mysql_fetch_array($sm);
$fak = mysql_query("select * from kejuruan where idfakultas='$uu[idfakultas]' order by idkejuruan");
		$fakk = mysql_fetch_array($fak);
$mhs = mysql_query("select * from mahasiswa where idkejuruan='$kdjur' ");
$i =1;
while($mhss = mysql_fetch_array($mhs)){
  ?>
    <tr align="center" bgcolor="#FF9F9F">
      <td><?php echo"$mhss[nama]"; ?></td>
      <td><?php echo"$mhss[idmahasiswa]"; ?></td>
      <td><?php echo"$mhss[idsemester]"; ?></td>
      <td width="38%" height="37">&nbsp;	   </td>
    </tr>
    
	 <input name="<?php echo"mhs$i"; ?>" type="hidden" value="<?php echo"$krss[idsks]"; ?>" >
	  <input name="<?php echo"mhss$i"; ?>" type="hidden" value="<?php echo"$mhss[idmahasiswa]"; ?>" >
	    <input name="<?php echo"mhsss$i"; ?>" type="hidden" value="<?php echo"$mhss[idsemester]"; ?>" >
    <?php
	$i++;
  }
  
 $jumMhs = $i-1;
  ?>
  <input name="<?php echo"n"; ?>" type="hidden" value="<?php echo"$jumMhs"; ?>" >
  </table>
  <?php
if(isset($_POST['update'])){
$jumMhs = @$_POST['n'];
for ($i2=1; $i2<=$jumMhs; $i2++)
{
$nimMhs = @$_POST['mhs'.$i2];
$nimMhs2 = @$_POST['mhss'.$i2];
$nimMhs3 = @$_POST['mhsss'.$i2];
$nilai = @$_POST['absen'.$i2];
$semester = @$_POST['semester'];
//$nilai2 = @$_POST['nilaii'.$i2];
//$nilai3 = @$_POST['nilai3'.$i2];
//$nilai4 = @$_POST['nilai4'.$i2];

//mysql_query("update krs set ahr='$nilai' where idkrs='$nimMhs' ");
mysql_query("insert into rekamsemester(idrekamsemester,idmahasiswa,idsemester,ip,app)values('','$nimMhs2','$semester','0','2')");
   
} 
echo "<script language='javascript'>alert('rekam semester  berhasil di simpan ke database')</script>";
	echo "<script language='javascript'>window.location = 'i_rekamsemester.php?kdjur=$kdjur'</script>";
	exit();
}
?>
</form>
</body>
</html>
<?php
}
?>