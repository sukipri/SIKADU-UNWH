	<?php

	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {

	?>
<body>
 <?php
		if(isset($_POST['edit'])){
		$progdi = @$_POST['progdi'];
		$fk = @$_POST['fk'];
		$nama = $sql_escape(trim($_POST['nama']));
		$alamat = $sql_char(trim($_POST['alamat']));
		$email   = @$_POST['email'];
		$agama   = $sql_escape(trim($_POST['agama']));
		$jeniskelamin   = $sql_escape(trim($_POST['jeniskelamin']));
		$negara = $sql_escape(trim($_POST['negara']));
		$ttl = @$_POST['ttl'];
		$tlp = $sql_escape(trim($_POST['tlp']));
		$gelar = $sql_escape(trim($_POST['gelar']));
		$noktp = @$_POST['noktp'];
		$nip = $sql_escape(trim($_POST['nip']));
		$nidn = $sql_escape(trim($_POST['nidn']));
		
		
		$call_q("$up dosen set idnid='$nidn',nama='$nama',alamat='$alamat',negara='$negara',email='$email',agama='$agama',jeniskelamin='$jeniskelamin',ttl='$ttl',noktp='$noktp',status='1',tlp='$tlp',gelar='$gelar' where iddosen='$IDDSN'") or die ("Update Gagal");
		?> <div class="alert alert-dismissible alert-success">
  				<button type="button" class="close" data-dismiss="alert">&times;</button>
 				 <strong>Well done!</strong> You successfully Save.......
					</div>
					 <?php } ?>
<form action="" method="post" enctype="multipart/form-data" name="form1" onSubmit="MM_validateForm('nama','','R','gelar','','R','kodepos','','R','email','','RisEmail','tlp','','RisNum','noktp','','R','alamat','','R');return document.MM_returnValue">
  <table width="798" border="0" align="center" bgcolor="#CECECE" class="table table-bordered">
    <tr valign="middle" bgcolor="#FFFFFF">
      <td width="110" height="72">NIP/NIP</td>
      <td width="432">
        <input name="nip" type="text" id="nip" value="<?php echo"$dsnn[iddosen]"; ?>" readonly=""  class="form-control"></td>
      <td width="242" rowspan="15" align="center" valign="top">
	  	
	  	  </td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="51">NIDN</td>
      <td><input name="nidn" type="text" id="nidn" value="<?php echo"$dsnn[idnid]"; ?>"  class="form-control"></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="73">Nama</td>
      <td><input name="nama" type="text" value="<?php echo"$dsnn[nama]"; ?>"  class="form-control"></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="73">Gelar</td>
      <td><input name="gelar" type="text" value="<?php echo"$dsnn[gelar]"; ?>"  class="form-control"></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="73">FAKULTAS</td>
      <td><select name="fk" id="fk"   class="form-control" disabled>
        <option>-------kode Program Studi-----------</option>
        <?php
		 $fk = $call_q("$sl idfaklutas,fakultas FROM fakultas order by fakultas");
		 while($fkk = $call_fas($fk)){
		 if($fkk['idfakultas']==$dsnn['idfakultas']){
		 echo"
		 <option value=$fkk[idfakultas] selected>$fkk[fakultas]&nbsp; / &nbsp;$fkk[fakultas]</option>";
		 }else{
		 echo"  <option value=$fkk[idfakultas]>$fkk[fakultas]&nbsp; / &nbsp;$fkk[fakultas]</option>";
		 }
		 
		 }
		 
		 ?>
      </select></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="73">Home Base </td>
      <td><select name="progdi" id="select"  class="form-control" disabled>
          <option>-------kode Program Studi-----------</option>
          <?php
		 $fak = $call_q("$sl idkejuruan,kejuruan,progdi FROM kejuruan order by idkejuruan");
		 while($fakk = $call_fas($fak)){
		 if($fakk['idkejuruan']==$dsnn['idkejuruan']){
		 echo"
		 <option value=$fakk[idkejuruan] selected>$fakk[idkejuruan]&nbsp; / &nbsp;$fakk[kejuruan]&nbsp;$fakk[progdi]</option>";
		 }else{
		 echo" <option value=$fakk[idkejuruan]>$fakk[idkejuruan]&nbsp; / &nbsp;$fakk[kejuruan]&nbsp;$fakk[progdi]</option>";
		 }} ?>
      </select></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="70">Nama Lengkap </td>
      <td><input name="nama" type="text" id="nama" size="55" value="<?php echo"$dsnn[nama]"; ?>"  disabled class="form-control" placeholder="Masukkan Nama Lengkap" >
          <input type="text" name="gelar" placeholder="Masukkan Gelar Anda" value="<?php echo"$dsnn[gelar]"; ?>"  disabled class="form-control"></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="93">Alamat</td>
      <td><textarea name="alamat" cols="60" wrap="VIRTUAL" id="alamat"  class="form-control"> <?php echo"$dsnn[alamat]"; ?></textarea>
          <br>
      </td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="53">Kewarganegaraan</td>
      <td><input name="negara" type="text" id="negara" size="40" value="<?php echo"$dsnn[negara]"; ?>"  class="form-control"></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="57">E-mail</td>
      <td><input name="email" type="text" id="email" size="40" value="<?php echo"$dsnn[email]"; ?>"  class="form-control"></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="56">Agama</td>
      <td><input name="agama" type="text" id="agama" size="40" value="<?php echo"$dsnn[agama]"; ?>"  class="form-control"></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="59">Jenis Kelamin </td>
      <td><input name="jeniskelamin" type="text" id="jeniskelamin" size="40" value="<?php echo"$dsnn[jeniskelamin]"; ?>"  class="form-control">*(L = Laki-Laki &nbsp; P = Perempuan</td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="90">TTL</td>
      <td><textarea name="ttl" wrap="VIRTUAL" class="form-control" id="ttl"><?php echo"$dsnn[ttl]"; ?></textarea>*(Semarang 10 Agustus 1991</td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="90">Telepon</td>
      <td><input name="tlp" type="text" id="tlp" size="55" value="<?php echo"$dsnn[tlp]"; ?>"  class="form-control"></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="90">No KTP </td>
      <td><input name="noktp" type="text" id="noktp" size="55" value="<?php echo"$dsnn[noktp]"; ?>" class="form-control">
          <font color="#990000">&nbsp;</font></td>
    </tr>
    <tr align="left" valign="middle" bgcolor="#FFFFFF">
      <td height="90" colspan="3"><button class="btn btn-success btn-lg" name="edit"><i class="fa fa-paper-plane"></i>&nbsp Simpan Data</button></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php } ?>
