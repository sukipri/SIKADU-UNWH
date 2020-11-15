<?php 


//session_start();

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

<h3>EDIT KUISIONER</h3>
<hr>
<?php
$idkuis = @mysql_real_escape_string($_GET['idkuis']);
if(isset($_POST['simpan'])){
	$kjur = @mysql_real_escape_string($_POST['kjur']);
	$sks = @mysql_real_escape_string($_POST['sks']);
	$soal = @mysql_real_escape_string($_POST['soal']);
	$a = @mysql_real_escape_string($_POST['a']);
	$b = @mysql_real_escape_string($_POST['b']);
	$c = @mysql_real_escape_string($_POST['c']);
	$c = @mysql_real_escape_string($_POST['c']);
	$d = @mysql_real_escape_string($_POST['d']);
	$e = @mysql_real_escape_string($_POST['e']);
	$app= @mysql_real_escape_string($_POST['app']);

	mysql_query("update kuis set idfakultas='$kjur',soal='$soal',a='$a',b='$b',c='$c',d='$d',e='$e',app='$app' where idkuis='$idkuis'");
	echo "<script language='javascript'>alert('DATA KUISIONER BERHASIL DIUPDATE')</script>";
	echo "<script language='javascript'>window.location = '?pilih=mkuis&kuis=ikuis'</script>";
	exit();
	
}
?>
<?php

$kuis = mysql_query("select * from kuis where idkuis='$idkuis'");
	//$no =1;
	 $kuiss = mysql_fetch_array($kuis);
	  ?>
<form name="form1" method="post" action="">
  <table width="663" border="0" bgcolor="#D96C00">
    <tr bgcolor="#FFFFFF">
      <td width="146" height="40">FAKULTAS</td>
      <td width="507"><select name="kjur" id="select" onChange="javascript:rubah(this)">
          <option>-------kode Program Studi-----------</option>
          <?php
		 $fak = mysql_query("select * from fakultas order by idfakultas");
		 while($fakk = mysql_fetch_array($fak)){
		 if($fakk['idfakultas']==$kuiss['idfakultas']){
		 echo"
		 <option value=$fakk[idfakultas] selected>$fakk[idfakultas]&nbsp; / &nbsp;$fakk[fakultas]</option>";
		 }else{
		 echo"
		 <option value=$fakk[idfakultas]>$fakk[idfakultas]&nbsp; / &nbsp;$fakk[fakultas]&nbsp;$fakk[progdi]</option>";
		 }
		 }
		 
		 ?>
      </select></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="45">SKS</td>
      <td><input name="sks" type="text" id="sks" size="45" placeholder="MASUKASN KODE SKS" value="<?php //echo"$kuiss[idsks]"; ?>" disabled />
        *(cek dengan benar kode sks </td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="45">SOAL</td>
      <td><textarea name="soal" cols="80" wrap="VIRTUAL" id="soal"><?php echo"$kuiss[soal]"; ?></textarea></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="39">A</td>
      <td><textarea name="a" cols="80" wrap="VIRTUAL" id="a"><?php echo"$kuiss[a]"; ?></textarea></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="41">B</td>
      <td><textarea name="b" cols="80" wrap="VIRTUAL" id="b"><?php echo"$kuiss[b]"; ?></textarea></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="42">C</td>
      <td><textarea name="c" cols="80" wrap="VIRTUAL" id="c"><?php echo"$kuiss[c]"; ?></textarea></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="40">D</td>
      <td><textarea name="d" cols="80" wrap="VIRTUAL" id="d"><?php echo"$kuiss[d]"; ?></textarea></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="34">E</td>
      <td><textarea name="e" cols="80" wrap="VIRTUAL" id="e"><?php echo"$kuiss[e]"; ?></textarea></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="45">Status</td>
      <td><select name="app" id="app">
        <option value="2">AKTIF</option>
        <option value="1">TIDAK AKTIF</option>
      </select></td>
    </tr>
    <tr align="right" bgcolor="#FFFFFF">
      <td height="35" colspan="2"><input name="simpan" type="submit" id="simpan" value="simpan data"></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
}
?>