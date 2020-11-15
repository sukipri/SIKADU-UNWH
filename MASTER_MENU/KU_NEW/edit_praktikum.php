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

</head>

<body>
<?php

?>
<?php
$idpr = @mysql_real_escape_string($_GET['idpr']);
$iddosen = @mysql_real_escape_string($_GET['iddosen']);
$idkurikulum = @mysql_real_escape_string($_GET['idkurikulum']);
   $dsn1 = mysql_query("select * from dosen where iddosen='$iddosen'");
$dsnn1 = mysql_fetch_array($dsn1);
$p = mysql_query("select * from praktikum where idpraktikum='$idpr'");
$pp = mysql_fetch_array($p);
?>
<?php
if(isset($_POST['edit'])){
$semester   = @mysql_real_escape_string($_POST['semester']);
$judul   = @mysql_real_escape_string($_POST['judul']);
$jumlah  = @mysql_real_escape_string($_POST['jumlah']);
$hari  = @mysql_real_escape_string($_POST['hari']);
$jam  = @mysql_real_escape_string($_POST['jam']);
$kelas  = @mysql_real_escape_string($_POST['kelas']);
$kdruang  = @mysql_real_escape_string($_POST['kdruang']);

@mysql_query("update praktikum set idkurikulum='$judul',idruang='$kdruang',idsemester='$semester',idkejuruan='$dsnn1[idkejuruan]',iddosen='$iddosen',jumlah='$jumlah',hari='$hari',jam='$jam',idkelas='$kelas' where idpraktikum='$idpr'");
 echo "<script language='javascript'>alert('Praktikum sks  Berhasil di UPDATE ke database')</script>";
	echo "<script language='javascript'>window.location = '?pilih=vsks'</script>";
	exit();
}
?>

<form action="" method="post" name="form1" \>
  <h3>Input SKS
Praktikum  </h3>
  <hr color="#FF8040">
  <table width="100%" border="0" align="center" bgcolor="#00A854">
    <tr valign="middle" bgcolor="#FFA477">
      <td height="21" colspan="2">&nbsp;</td>
    </tr>
    <tr align="left" valign="middle" bgcolor="#FFA477">
      <td width="104" height="51">Judul</td>
      <td width="650"><select name="judul" id="judul">
	  <option>Pilih Judul Praktikum SKS ...............................</option>
	  <?php
	   
	  $sks = mysql_query("select * from kurikulum where idkejuruan='$dsnn1[idkejuruan]'");
	  while($skss = mysql_fetch_array($sks)){
	  $sm = mysql_query("select * from semester where idsemester='$skss[idsemester]'");
 $smm = mysql_fetch_array($sm);
 $p1 = mysql_query("select * from praktikum where idkurikulum='$skss[idkurikulum]'");
$pp1 = mysql_fetch_array($p1);
  $th = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$smm[idtahun_ajaran]'");
  $thh = mysql_fetch_array($th);
if($skss['idkurikulum']==$skss['idkurikulum']){
 echo"<option value=$skss[idkurikulum] selected>$skss[judul]&nbsp;$smm[semester]&nbsp;/&nbsp;$thh[ajaran]/&nbsp;$smm[ajaran]/&nbsp;$skss[kelas]</option>";
}else{
 echo"<option value=$skss[idkurikulum]>$skss[judul]&nbsp;$smm[semester]&nbsp;/&nbsp;$thh[ajaran]/&nbsp;$smm[ajaran]/&nbsp;$skss[kelas]</option>";
	  
	}
	  }
	  
	  ?>
      </select></td>
    </tr>
    <tr align="left" valign="middle" bgcolor="#FFA477">
      <td height="37">Semester</td>
      <td><select name="semester">
        <option>semester......................</option>
        <?php
		$sm = mysql_query("select * from semester");
  while($smm = mysql_fetch_array($sm)){
  if($smm['idsemester']==$pp['idsemester']){
   echo"<option value=$smm[idsemester] selected>$smm[semester] &nbsp; $smm[tahun] &nbsp; $smm[ajaran]  </option>";
  }else{
  echo"<option value=$smm[idsemester]>$smm[semester] &nbsp; $smm[tahun] &nbsp; $smm[ajaran]  </option>";
  }
  }
		?>
      </select></td>
    </tr>
    <tr align="left" valign="middle" bgcolor="#FFA477">
      <td height="37">Jumlah / QTY </td>
      <td><input name="jumlah" type="text" id="jumlah" size="10" value="<?php echo"$pp[jumlah]"; ?>"></td>
    </tr>
    <tr align="left" valign="middle" bgcolor="#FFA477">
      <td height="37">Waktu</td>
      <td><input name="jam" type="text" id="jam" size="25" value="<?php echo"$pp[jam]"; ?>">
*(00.00</td>
    </tr>
    <tr align="left" valign="middle" bgcolor="#FFA477">
      <td height="37">Hari</td>
      <td><select name="hari" id="hari">
        <option>hari.........</option>
		
        <option value="senin">senin</option>
        <option value="selasa">selesa</option>
        <option value="rabu">rabu</option>
        <option value="kamis">kamis</option>
        <option value="jumat">jumat</option>
        <option value="sabtu">sabtu</option>
        <option value="minggu">minggu</option>
      </select></td>
    </tr>
    <tr align="left" valign="middle" bgcolor="#FFA477">
      <td height="37">Kelas</td>
      <td><select name="kelas" id="kelas">
        <option>kelas...........</option>
        <?php
		     $kls = mysql_query("select * from kelas");
  while($klss = mysql_fetch_array($kls)){
  echo"<option value=$klss[idkelas]>$klss[kelas]</option>";
  
  }
		   
		   ?>
      </select></td>
    </tr>
    <tr align="left" valign="middle" bgcolor="#FFA477">
      <td height="37">Ruang</td>
      <td><select name="kdruang" id="kdruang">
        <option>ruang..................</option>
		<?php $r = mysql_query("select * from ruang");
		while($rr = mysql_fetch_array ($r)){
		$g = mysql_query("select * from gedung where idgedung='$rr[idgedung]'");
		$gg = mysql_fetch_array ($g);
		if($rr['idruang']==$pp['idruang']){
		echo"<option value=$rr[idruang] selected>$gg[gedung] / $rr[idruang]</option>";
		
		}else{
		echo"<option value=$rr[idruang]>$gg[gedung] / $rr[idruang]</option>";
		}
		
		}?>
      </select></td>
    </tr>
    <tr align="center" valign="middle" bgcolor="#FFA477">
      <td height="37" colspan="2"><input name="edit" type="submit" id="edit" value="simpan data sks"></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
}
?>