<?php 
if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
	$u = $call_q("select * from user where namauser='$_SESSION[namauser]'");
	$uu = mysql_fetch_array($u);
 ?>
<body>

<b>#INPUT KUISIONER</b>
<hr>
<?php
if(isset($_POST['simpan'])){
	$kjur = @$sql_escape($_POST['kjur']);
	$sks = @$sql_escape($_POST['sks']);
	$soal = @$sql_escape($_POST['soal']);
	$a = @$sql_escape($_POST['a']);
	$b = @$sql_escape($_POST['b']);
	$c = @$sql_escape($_POST['c']);
	$c = @$sql_escape($_POST['c']);
	$d = @$sql_escape($_POST['d']);
	$e = @$sql_escape($_POST['e']);
	$app= @$sql_escape($_POST['app']);

	$call_q("insert into kuis(idkuis,idfakultas,soal,a,b,c,d,e,app)values('','$kjur','$soal','$a','$b','$c','$d','$e','$app')");
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
          <option>Program Studi</option>
          <?php
		 $fak = $call_q("select * from fakultas order by idfakultas");
		 while($fakk = mysql_fetch_array($fak)){
		 
		 echo"
		 <option value=$fakk[idfakultas]>$fakk[idfakultas]&nbsp; / &nbsp;$fakk[fakultas]</option>";
		 }
		 
		 ?>
      </select></td>
      <td width="572" rowspan="10" valign="top">
       <div class="alert alert-dismissible alert-danger">
  		<b>()Informasi</b>
  		</div>
</td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="45">SKS</td>
      <td><input name="sks" class="form-control" type="text" id="sks" size="45" placeholder="MASUKASN KODE SKS" disabled />
        *(cek dengan benar kode sks </td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="45">SOAL</td>
      <td><textarea name="soal" cols="80" wrap="VIRTUAL" required id="soal" class="form-control form-control-sm"></textarea></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="39">A</td>
      <td><textarea name="a" cols="80" wrap="VIRTUAL" id="a" required class="form-controlform-control-sm"></textarea></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="41">B</td>
      <td><textarea name="b" cols="80" wrap="VIRTUAL" id="b" required class="form-control form-control-sm"></textarea></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="42">C</td>
      <td><textarea name="c" cols="80" wrap="VIRTUAL" id="c" required class="form-control form-control-sm"></textarea></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="40">D</td>
      <td><textarea name="d" cols="80" wrap="VIRTUAL" id="d" required class="form-control form-control-sm"></textarea></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="34">E</td>
      <td><textarea name="e" cols="80" wrap="VIRTUAL" id="e" required class="form-control form-control-sm"></textarea></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="45">Status</td>
      <td><select name="app" id="app" class="form-control" required multiple>
        <option value="2">AKTIF</option>
        <option value="1">TIDAK AKTIF</option>
      </select></td>
    </tr>
    <tr align="right" bgcolor="#FFFFFF">
      <td height="35">&nbsp;</td>
      <td height="35"><input name="simpan" type="submit" id="simpan" value="simpan data" class="btn btn-success btn-sm"></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
}
?>