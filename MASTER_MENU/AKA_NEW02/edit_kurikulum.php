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
    .style2 {color: #FF0000}
    -->
    </style>
<body>

<?php
	$idkr = @$sql_escape($_GET['idkr']);
	   $kr = $call_q("select * from kurikulum  where idkurikulum='$idkr'");
	$krr = $call_fas($kr);
	$vsk = $call_q("select * from sks where idkurikulum  LIKE  '%$idkr%'"); 
	$vskk = $call_fas($vsk);
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
	$ack_mpl = rand("88888","99999");
	$kj_mpl =  @$sql_escape($_POST['kd2']);
	$kj_mpl2 =  @$sql_escape($_POST['kd']);
	$main  = @$sql_escape($_POST['main']);


	$call_q("update kurikulum set idmain='$main',idsk='$kj_mpl', idkurikulum='$kj_mpl2', idsemester='$semester',idkejuruan='$kjur',judul='$judul',juduleng='$eng',sks='$sks' where idkurikulum='$idkr'  ");
	$call_q("update sks set jumlah='$sks', idkurikulum ='$kj_mpl2' where idsks='$vskk[idsks]'");
	$call_q("update krs set jumlah='$sks' where idsks='$vskk[idsks]'");
	 echo "<script language='javascript'>alert('Kurikulum  Berhasil edit ke database')</script>";
		echo "<script language='javascript'>window.location = '?aka=vkurikulum'</script>";
		exit();
	}
	$ack_mpl = rand("88888","99999");
	$kj_mpl = @"$kjur.$ack_mpl";
	?>
<form action="" method="post" name="form1" onSubmit="MM_validateForm('judul','','R','jumlah','','RisNum');return document.MM_returnValue">
  <h5>Input Kurikulum | <a href="?aka=vkurikulum">view Daftar Kurikulum </a></h5>
  <hr color="#FF8040">
  <table width="100%" border="0" align="center" bgcolor="#FF8000" class="table table-bordered">
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="47">ID MAIN KURIKULUM </td>
      <td><input name="main" type="text" id="main" value="<?php echo"$krr[idmain]"; ?>" class="form-control">
        <span class="style1">*(Tidak boleh ada data kembar </span></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="47">Kode SKS sesuai SK </td>
      <td><input name="kd2" type="text" id="kd2" value="<?php echo"$krr[idsk]"; ?>" class="form-control"></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="47"><span class="style2">Kode Kurikulum Relasi </span></td>
      <td><input name="kd" type="text" id="kd" value="<?php echo"$krr[idkurikulum]"; ?>" class="form-control"></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td width="151" height="47">Semester</td>
      <td width="374"><select name="semester" class="form-control">
        <option>Semester</option>
        <?php
		$sm = $call_q("select * from semester");
  while($smm = $call_fas($sm)){
   $smtj = $call_q("select * from tahun_ajaran where idtahun_ajaran='$smm[idtahun_ajaran]'");
$smmtj = $call_fas($smtj);
if($smm['idsemester']==$krr['idsemester']){
  echo"<option value=$smm[idsemester] selected>$smm[semester] &nbsp; $smmtj[ajaran] &nbsp; $smm[ajaran]  </option>";
  }else{
  echo"<option value=$smm[idsemester]>$smm[semester] &nbsp; $smmtj[ajaran] &nbsp; $smm[ajaran]  </option>";
  
  }
  }
		?>
      </select></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="54">Jumlah SKS </td>
      <td><input name="sks" type="text" id="sks" size="13" value="<?php echo"$krr[sks]"; ?>" class="form-control"></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="54">Kejuruan</td>
      <td><select name="kjur" id="kjur" onChange="javascript:rubah(this)" class="form-control">
        <option>Progdi</option>
        <?php
		 $fak = $call_q("select * from kejuruan order by idkejuruan");
		 while($fakk = $call_fas($fak)){
		 if($krr['idkejuruan']==$fakk['idkejuruan']){
		 echo"
		 <option value=$fakk[idkejuruan] selected>$fakk[idkejuruan]&nbsp; / &nbsp;$fakk[kejuruan]&nbsp;$fakk[progdi]</option>";
		 }else{
		 echo"
		 <option value=$fakk[idkejuruan]>$fakk[idkejuruan]&nbsp; / &nbsp;$fakk[kejuruan]&nbsp;$fakk[progdi]</option>";
		 }} ?>
      </select></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="54">Judul</td>
      <td><input name="judul" type="text" id="judul" size="55" value="<?php echo"$krr[judul]"; ?>" class="form-control"></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="51">Judul inggris (ENGLISH TITLE) </td>
      <td><input name="eng" type="text" id="eng" size="55" value="<?php echo"$krr[juduleng]"; ?>" class="form-control"></td>
    </tr>
    <tr align="center" valign="middle" bgcolor="#FFFFFF">
      <td height="37" colspan="2"><input name="simpan" type="submit" id="simpan" value="simpan data kurikulum" class="btn btn-success"></td>
    </tr>
  </table>
</form>
</body>
<?PHP } ?>