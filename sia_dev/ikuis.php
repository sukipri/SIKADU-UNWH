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

<h3>INPUT KUISIONER</h3>
<hr>
<?php
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

	mysql_query("insert into kuis(idkuis,idfakultas,soal,a,b,c,d,e,app)values('','$kjur','$soal','$a','$b','$c','$d','$e','$app')");
	echo "<script language='javascript'>alert('DATA KUISIONER BERHASIL DISIMPAN')</script>";
	echo "<script language='javascript'>window.location = '?aka=mkuis&kuis=ikuis'</script>";
	exit();
	
}
?>
<form name="form1" method="post" action="">
  <table width="663" border="0" align="center" bgcolor="#D96C00" class="table table-bordered">
    <tr bgcolor="#FFFFFF">
      <td width="81" height="40">FAKULTAS</td>
      <td width="572"><select name="kjur" multiple id="select" onChange="javascript:rubah(this)" class="form-control">
          <option>-------kode Program Studi-----------</option>
          <?php
		 $fak = mysql_query("select * from fakultas order by idfakultas");
		 while($fakk = mysql_fetch_array($fak)){
		 
		 echo"
		 <option value=$fakk[idfakultas]>$fakk[idfakultas]&nbsp; / &nbsp;$fakk[fakultas]</option>";
		 }
		 
		 ?>
      </select></td>
      <td width="572" rowspan="10" valign="top"> <div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">X </button>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede 
</div></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="45">SKS</td>
      <td><input name="sks" class="form-control" type="text" id="sks" size="45" placeholder="MASUKASN KODE SKS" disabled />
        *(cek dengan benar kode sks </td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="45">SOAL</td>
      <td><textarea name="soal" cols="80" wrap="VIRTUAL" id="soal" class="form-control"></textarea></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="39">A</td>
      <td><textarea name="a" cols="80" wrap="VIRTUAL" id="a" class="form-control"></textarea></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="41">B</td>
      <td><textarea name="b" cols="80" wrap="VIRTUAL" id="b" class="form-control"></textarea></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="42">C</td>
      <td><textarea name="c" cols="80" wrap="VIRTUAL" id="c" class="form-control"></textarea></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="40">D</td>
      <td><textarea name="d" cols="80" wrap="VIRTUAL" id="d" class="form-control"></textarea></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="34">E</td>
      <td><textarea name="e" cols="80" wrap="VIRTUAL" id="e" class="form-control"></textarea></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="45">Status</td>
      <td><select name="app" id="app" class="form-control" multiple>
        <option value="2">AKTIF</option>
        <option value="1">TIDAK AKTIF</option>
      </select></td>
    </tr>
    <tr align="right" bgcolor="#FFFFFF">
      <td height="35">&nbsp;</td>
      <td height="35"><input name="simpan" type="submit" id="simpan" value="simpan data" class="form-control"></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
}
?>