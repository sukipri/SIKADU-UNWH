<?php //session_start();
if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {

 ?>
<style type="text/css">
<!--
.style1 {
	color: #800000;
	font-weight: bold;
}
-->
</style>
</head>

<body>

<?php

if(isset($_POST['simpan'])){
	$semester   = @$sql_escape($_POST['semester']);
	$judul   = @$sql_escape($_POST['judul']);
	$eng   = @$sql_escape($_POST['eng']);
	$jumlah  = @$sql_escape($_POST['jumlah']);
	$hari  = @$sql_escape($_POST['hari']);
	$jam  = @$sql_escape($_POST['jam']);
	$kelas  = @$sql_escape($_POST['kelas']);
	$kjur  = @$sql_escape($_POST['kjur']);
	$kdruang  = @$sql_escape($_POST['kdruang']);
	$sks  = @$sql_escape($_POST['sks']);
	$main  = @$sql_escape($_POST['main']);
	$kdsk  = @$sql_escape($_POST['kdsk']);


$ack_mpl = rand("88888","99999");
$kj_mpl =  @$sql_escape($_POST['kd']);
$kr = $call_q("select * from kurikulum where idkurikulum='$kj_mpl'");
$hkr = $call_nr($kr);
if($hkr >=1){
echo "<script language='javascript'>alert('maaf KODE $kj_mpl sudah di gunakan')</script>";
	echo "<script language='javascript'>window.location = '?pilih=i_kurikulum'</script>";
	exit();
	}else{

$call_q("insert into kurikulum(idmain,idkurikulum,idsemester,idkejuruan,judul,juduleng,status,sks,idsk)values('$main','$kj_mpl','$semester','$kjur','$judul','$eng','Y','$sks','$kdsk')");
 echo "<script language='javascript'>alert('Kurikulum  Berhasil di simpan ke database')</script>";
	echo "<script language='javascript'>window.location = '?aka=i_kurikulum'</script>";
	exit();
}
}
$ack_mpl = rand("88888","99999");
$kj_mpl = @"$kjur.$ack_mpl";
?>
<form action="" method="post" name="form1" onSubmit="MM_validateForm('judul','','R','jumlah','','RisNum');return document.MM_returnValue">
  <h4>Input Kurikulum |</h4>
  <hr color="#FF8040">
  <table width="100%" border="0" align="center" bgcolor="#FF8000" class="table table-bordered table-sm">
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="47">ID MAIN KURIKULUM (urut) </td>
      <td><input name="main" type="text" id="main" required class="form-control form-control-sm">
        <span class="style1">*(Tidak Boleh ada data yang kembar </span></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="47">Kode Kurikulum (RELASI) </td>
      <td><input name="kd" type="text" id="kd" class="form-control form-control-sm" required></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="47">Kode SK </td>
      <td><input name="kdsk" type="text" id="kdsk" class="form-control form-control-sm" required></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td width="151" height="47">Semester</td>
      <td width="374"><select name="semester" multiple>
        <option>Semester</option>
        <?php
		$sm = $call_q("select * from semester");
  while($smm = mysql_fetch_array($sm)){
   $smtj = $call_q("select * from tahun_ajaran where idtahun_ajaran='$smm[idtahun_ajaran]'");
$smmtj = mysql_fetch_array($smtj);
  echo"<option value=$smm[idsemester]>$smm[semester] &nbsp; $smmtj[ajaran] &nbsp; $smm[ajaran]  </option>";
  }
		?>
      </select></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="54">Kejuruan</td>
      <td><select name="kjur" id="kjur" onChange="javascript:rubah(this)" required multiple class="form-control">
        <option>Progdi</option>
        <?php
		 $fak = $call_q("select * from kejuruan order by idkejuruan");
		 while($fakk = mysql_fetch_array($fak)){
		 
		 echo"
		 <option value=$fakk[idkejuruan]>$fakk[idkejuruan]&nbsp; / &nbsp;$fakk[kejuruan]&nbsp;$fakk[progdi]</option>";
		 }
		 
		 ?>
      </select></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="54">Jumlah SKS </td>
      <td><input name="sks" type="text" id="sks" size="13" class="form-control form-control-sm" required></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="54">Judul</td> 
      <td><input name="judul" type="text" id="judul" size="55" class="form-control form-control-sm" required>
      </td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="51">Judul inggris(english title) </td>
      <td><input name="eng" type="text" id="eng" size="55" class="form-control form-control-sm" required></td>
    </tr>
    <tr align="center" valign="middle" bgcolor="#FFFFFF">
      <td height="37" colspan="2"><input class="form-control" name="simpan" class="btn btn-success" type="submit" id="simpan" value="simpan data kurikulum"></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
}
?>