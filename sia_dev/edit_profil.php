<?php //session_start();
 //include_once"../sc/conek.php";

	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
	$u = mysql_query("select * from user where namauser='$_SESSION[namauser]'");
	$uu = mysql_fetch_array($u);
 ?>
<h3 class="badge badge-info">Edit Profil Mahasiswa</h3>
<ul class="nav nav-tabs">
  <li class="active"><a href="#home" data-toggle="tab" aria-expanded="true"><i class="fas fa-bookmark"></i>&nbsp;Profile Utama</a></li>
  &nbsp;&nbsp;
  <li class="nav-item"><a href="#profile" data-toggle="tab" aria-expanded="false"><i class="fas fa-bookmark"></i>&nbsp;Instansi</a></li>
  &nbsp;&nbsp;
   <li class=""><a href="#profile2" data-toggle="tab" aria-expanded="false"><i class="fas fa-bookmark"></i>&nbsp;Asal Sekolah & Universitas</a></li>
   &nbsp;&nbsp;
    <li class=""><a href="#profile3" data-toggle="tab" aria-expanded="false"><i class="fas fa-bookmark"></i>&nbsp;Alamat & kontak </a></li>
    &nbsp;&nbsp;
 	 <li class=""><a href="#profile4" data-toggle="tab" aria-expanded="false"><i class="fas fa-bookmark"></i>&nbsp;Profil Orang tua </a></li>
	 
</ul>
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade active in" id="home">
 <form name="form1" method="post" action="">
  <h3>&nbsp;</h3>
  <table width="100%" border="0" align="center" bgcolor="#00B058" class="table table-bordered table-sm" id="profil">
    <tr bgcolor="#FFFFFF">
      <td width="11%" height="38">NIM</td>
      <td><input type="text" class="form-control" name="nim" value="<?php echo"$mhss[idmahasiswa]"; ?>" disabled> </td>
      <td width="36%" rowspan="23"><div class="alert alert-dismissible alert-success">
  <b>#INFORMASI  PENGISIAN</b>
  <ul>
  <li>Periksa data anda dan segera ubah bila ada yang tidak sesuai 
  <li> Pilih Dosen wali anda sekarang
  <li>Pilih kelas anda sekarang   
  </ul>
</div><input name="update" type="submit" id="update" value="UPDATE PROFIL MAHASISWA" class="btn btn-success"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="36">Nama</td>
      <td>
	  <?php if(empty($mhss['nama'])){ ?>
	  <input name="nama" type="text" class="form-control" id="nama" size="45" value="<?php echo"$mhss[nama]"; ?>">
	  <?php }else{ ?>
	   <input name="nama" type="text" class="form-control" id="nama" readonly size="45" value="<?php echo"$mhss[nama]"; ?>">
	   <?php } ?>
	  </td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="40">Email</td>
      <td><input name="email" type="text" class="form-control" id="email" size="45" value="<?php echo"$mhss[email]"; ?>"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="40">Wali Dosen </td>
      <td><select name="wali" class="form-control">
        <option>pilih dosen</option>
        <?php
		$dsn = mysql_query("select * from dosen where idfakultas='$kejj[idfakultas]' order by nama desc limit 2000");
  while($dsnn = mysql_fetch_array($dsn)){
  if($dsnn['iddosen']==$mhss['iddosen']){
  echo"<option value=$dsnn[iddosen] selected>$dsnn[iddosen]&nbsp;/&nbsp;<b>$dsnn[nama]</b>  / &nbsp;$dsnn[gelar]</option>";
  }else{
  echo"<option value=$dsnn[iddosen]>$dsnn[iddosen]&nbsp;/&nbsp;<b>$dsnn[nama]</b>  / &nbsp;$dsnn[gelar]</option>";
  }
  }
		?>
      </select>
      </td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="40">Beasiswa</td>
      <td><select name="bea" id="bea" disabled class="form-control">
       
		<option value="T">TIDAK ADA BEASISWA</option>
		<?php
    $bea = mysql_query("select * from bea order by potongan desc limit 2000");
  while($beaa = mysql_fetch_array($bea)){
  if($beaa['idbea']==$mhss['idbea']){
    echo"<option value=$beaa[idbea] selected>$beaa[idbea]&nbsp;$beaa[potongan]</option>";
  }else{
  echo"<option value=$beaa[idbea]>$beaa[idbea]&nbsp;$beaa[potongan]</option>";
  }
  }
  
  ?>
      </select></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="40">Keterangan semester </td>
      <td><?php
	  echo"<b>$mhss[semester]</b><br>";
	  ?></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="40">Semester</td>
      <td><select name="sm" id="sm" disabled class="form-control">
        <?php
		$sm = mysql_query("select * from semester  ");
  while($smm = mysql_fetch_array($sm)){
  $th = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$smm[idtahun_ajaran]'");
  $thh = mysql_fetch_array($th);
  if($smm['idsemester']==$mhss['idsemester']){
  echo"<option value=$smm[idsemester] selected>$smm[semester] &nbsp; $thh[ajaran] &nbsp; $smm[ajaran]  </option>";
  
  }else{
  
  
  echo"<option value=$smm[idsemester]>$smm[semester] &nbsp; $thh[ajaran] &nbsp; $smm[ajaran]  </option>";
  }
  }
		?>
      </select></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="40">Kelas</td>
      <td><select name="kelas" id="kelas" class="form-control">
        <option>kelas...........</option>
        <?php
		     $kls = mysql_query("select * from kelas ");
  while($klss = mysql_fetch_array($kls)){
  if($klss['idkelas']==$mhss['idkelas']){
  echo"<option value=$klss[idkelas] selected>$klss[kelas]</option>";
  }else{
  
   echo"<option value=$klss[idkelas]>$klss[kelas]</option>";
  }
  }
		   
		   ?>
      </select></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="40">Alamat</td>
      <td><textarea name="alamat" cols="45" wrap="VIRTUAL" id="alamat" class="form-control">
	  <?php 
	  echo"$mhss[alamat]";
	  
	  ?>
	  </textarea></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="40">Provinsi</td>
      <td><input name="provinsi" type="text" id="provinsi" value="<?php echo"$mhss[idprovinsi]"; ?>" class="form-control"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="40">Kota</td>
      <td><input name="kota" type="text" id="kota" value="<?php echo"$mhss[idkota]"; ?>" class="form-control"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="40">Warganegara</td>
      <td><input name="negara" type="text" id="negara" value="<?php echo"$mhss[negara]"; ?>" class="form-control">
*(WNI / WNA </td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="40">Jenis Kelamin </td>
      <td><input name="jeniskelamin" type="text"  value="<?php echo"$mhss[jeniskelamin]"; ?>" size="55" class="form-control"><br>*(Pria / Wanita</td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="40">Telpon </td>
      <td><input name="tlp" type="text" value="<?php echo"$mhss[tlp]"; ?>" size="55" class="form-control"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="40">Agama</td>
      <td><input name="agama" type="text" value="<?php echo"$mhss[agama]"; ?>" size="55" class="form-control"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="40">No KTP</td>
      <td><input name="noktp" type="text" id="noktp" size="55" class="form-control" value="<?php echo"$mhss[noktp]"; ?>">
        <font color="#990000"><strong>*(Jika sudah meiliki </strong></font></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="40">Lulusan</td>
      <td width="27%"><input name="lulusan" type="text" value="<?php echo"$mhss[jurusan]"; ?>" size="35" class="form-control"></td>
      </tr>
    <tr bgcolor="#FFFFFF">
      <td height="40">Tahun Lulus </td>
      <td><input name="tahun_lulus" type="text" value="<?php echo"$mhss[thn_lulus]"; ?>" size="35" class="form-control"></td>
      </tr>
    <tr bgcolor="#FFFFFF">
      <td height="40">Gelombang</td>
      <td><input name="gelombang" type="text" id="gelombang" size="35" class="form-control" value="<?php echo"$mhss[idgelombang]"; ?>" readonly></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="40">Kode pos </td>
      <td><input name="kodepos" type="text" id="kodepos" class="form-control" value="<?php echo"$mhss[kodepos]"; ?>"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="40">Status NIM</td>
      <td>        <input type="text" name="st_nim" class="form-control" readonly  value="<?php echo"$mhss[status_nim]"; ?>"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="40">Status Mahasiswa </td>
      <td>
      <br><?PHP 
	  
	  if($mhss['mhs']==2){
	  echo"<b><font color=green>AKTIF</font></b>";
	  }elseif(
	  $mhss['mhs']==1){
	  echo"<b><font color=grey>NON-AKTIF</font></b>";
	  }elseif(
	  $mhss['mhs']==3){
	  echo"<b><font color=blue>CUTI</font></b>";
	  }elseif(
	  $mhss['mhs']==4){
	  echo"<b><font color=#006666>LULUS</font></b>";
	  }elseif(
	  $mhss['mhs']==5){
	  echo"<b><font color=red>KELUAR</font></b>";
	  
	   }elseif(
	  $mhss['mhs']==6){
	  echo"<b><font color=red>TRANSFER</font></b>";
	  }
	  
	   ?>
	   <?php echo" - <b>$mhss[asal]</b>"; ?></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="40">TTL</td>
      <td>
	  	&nbsp;
	    <input name="tempat_lahir" type="text" id="tempat_lahir" size="35" class="form-control" value="<?php echo"$mhss[tempat_lahir]"; ?>">
	    <input name="ttl" type="text" id="ttl" size="35" class="form-control" value="<?php echo"$mhss[tgl_lahir]"; ?>">
	    </td>
      </tr>
    <tr align="right" bgcolor="#FFFFFF">
      <td height="40" colspan="3">&nbsp;</td>
    </tr>
  </table>
</form>
<?php
if(isset($_POST['update'])){
$nama = @mysql_real_escape_string($_POST['nama']);
$agama = @mysql_real_escape_string($_POST['agama']);
$wali = mysql_real_escape_string($_POST['wali']);
$email = mysql_real_escape_string($_POST['email']);
$kelas = @mysql_real_escape_string($_POST['kelas']);
$bea = @mysql_real_escape_string($_POST['bea']);
$alamat = @mysql_real_escape_string($_POST['alamat']);
$provinsi = @mysql_real_escape_string($_POST['provinsi']);
$kota = @mysql_real_escape_string($_POST['kota']);
$negara = @mysql_real_escape_string($_POST['negara']);
$jeniskelamin   = @mysql_real_escape_string($_POST['jeniskelamin']);
$tlp = mysql_real_escape_string($_POST['tlp']);
$lulusan = @mysql_real_escape_string($_POST['lulusan']);
$tahun_lulus = @mysql_real_escape_string($_POST['tahun_lulus']);
$statusnim = @mysql_real_escape_string($_POST['st_nim']);
$gelombang = mysql_real_escape_string($_POST['gelombang']);
$tgl = @mysql_real_escape_string($_POST['tgl']);
$kodepos = @mysql_real_escape_string($_POST['kodepos']);
$bulan = @mysql_real_escape_string($_POST['bulan']);
$tahun = @mysql_real_escape_string($_POST['tahun']);
$ttl = @mysql_real_escape_string($_POST['ttl']);
$agama = @mysql_real_escape_string($_POST['agama']);
$tempat_lahir = @mysql_real_escape_string($_POST['tempat_lahir']);
@mysql_query("update mahasiswa set nama='$nama',iddosen='$wali',idkelas='$kelas',alamat='$alamat',idprovinsi='$provinsi',idkota='$kota',email='$email',agama='$agama',negara='$negara',jeniskelamin='$jeniskelamin',tlp='$tlp',jurusan='$lulusan',thn_lulus='$tahun_lulus',status_nim='$statusnim',idgelombang='$gelombang',tgl_lahir='$ttl',tempat_lahir='$tempat_lahir' ,kodepos='$kodepos',agama='$agama' where idmahasiswa='$kdmhs'");
 echo "<script language='javascript'>alert('Profil Berhasil di update')</script>";
	echo "<script language='javascript'>window.location = '?kdmhs=$kdmhs'</script>";
	exit();

}
?>
  </div>
  <div class="tab-pane fade" id="profile">
  <form method="post">
    <table width="600" border="0" class="table table-bordered table-sm">
      <tr>
        <td width="109">Nama Intansi</td>
        <td width="133"><input name="nama_its" type="text" id="gelombang4" size="35" class="form-control"  value="<?php echo"$mhss[nama_instansi]"; ?>"></td>
        <td width="344" rowspan="3"><div class="alert alert-dismissible alert-success">
 			<b>#INFORMASI  PENGISIAN </b>

</div><input name="update2" type="submit" class="btn btn-success" id="update2" value="update data instansi"></td>
      </tr>
      <tr>
        <td>Alamat Instansi </td>
        <td><input name="alamat_its" type="text"  size="35" class="form-control" value="<?php echo"$mhss[alamat_instansi]"; ?>"></td>
        </tr>
      <tr>
        <td>Telpon Instansi </td>
        <td><input name="tlp_its" type="text"  size="35" class="form-control" value="<?php echo"$mhss[tlp_instansi]"; ?>"></td>
        </tr>
    </table>
  
  
  </form>
  <?php
  	if(isset($_POST['update2'])){
		$nama_its = @mysql_real_escape_string($_POST['nama_its']);
		$alamat_its = @mysql_real_escape_string($_POST['alamat_its']);
		$tlp_its = @mysql_real_escape_string($_POST['tlp_its']);
		mysql_query("update mahasiswa set nama_instansi='$nama_its',alamat_instansi='$alamat_its',tlp_instansi='$tlp_its' where idmahasiswa='$kdmhs'");
		 echo "<script language='javascript'>alert('Profil Berhasil di update')</script>";
	echo "<script language='javascript'>window.location = '?kdmhs=$kdmhs'</script>";
	exit();
	}
  
  ?>
  </div>
<div class="tab-pane fade" id="profile2">
<form method="post">
  <table border="0" class="table table-bordered">
    <tr>
      <td width="170">Asal Sekolah SMU/SMA/SMK/STM  </td>
      <td width="507"><input name="asal_skl" type="text" class="form-control" id="asal_skl" value="<?php echo"$mhss[asal_sekolah]"; ?>"  size="35"></td>
      <td width="416" rowspan="2"><div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert"><span class="close">INFORMASI  PENGISIAN </span></button>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede 
</div><input name="update3" type="submit" class="btn btn-success" id="update3" value="update data Sekolah"></td>
    </tr>
    <tr>
      <td>Asal Universitas </td>
      <td><input name="asal_uni" type="text" class="form-control" id="asal_uni" value="<?php echo"$mhss[asal_uni]"; ?>"  size="35"></td>
      </tr>
  </table>



</form>
  <?php
  	if(isset($_POST['update3'])){
		$asal_skl = @mysql_real_escape_string($_POST['asal_skl']);
		$asal_uni = @mysql_real_escape_string($_POST['asal_uni']);
		//$tlp_its = @mysql_real_escape_string($_POST['tlp_its']);
		mysql_query("update mahasiswa set asal_sekolah='$asal_skl',asal_uni='$asal_uni' where idmahasiswa='$kdmhs'");
		 echo "<script language='javascript'>alert('Profil Berhasil di update')</script>";
	echo "<script language='javascript'>window.location = '?kdmhs=$kdmhs'</script>";
	exit();
	}
  
  ?>
</div>
<div class="tab-pane fade" id="profile3">
<form method="post">
  <table border="0" class="table table-bordered table-sm">
    <tr>
      <td width="161">Alamat Aktif </td>
      <td width="511"><textarea name="almt_aktif" class="form-control" cols="55" rows="6" wrap="VIRTUAL" id="almt_aktif"><?php echo"$mhss[alamat_aktif]"; ?></textarea></td>
      <td width="421" rowspan="4"><div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert"><span class="close">INFORMASI  PENGISIAN </span></button>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede 
</div><input name="update4" type="submit" class="btn btn-success" id="update4" value="update data Kontak" ></td>
    </tr>
    <tr>
      <td>Nama Aktif </td>
      <td><input class="form-control" name="nm_aktif" type="text" id="nm_aktif" size="55" value="<?php echo"$mhss[nama_aktif]"; ?>"></td>
      </tr>
    <tr>
      <td>Pekerjaan Aktif </td>
      <td><input name="pkrj_aktif" type="text" id="pkrj_aktif" size="55" class="form-control" value="<?php echo"$mhss[pekerjaan_aktif]"; ?>"></td>
      </tr>
    <tr>
      <td>Telpon Aktif </td>
      <td><input name="tlp_aktif" type="text" id="nm_aktif3" size="55" class="form-control" value="<?php echo"$mhss[tlp_aktif]"; ?>"></td>
      </tr>
  </table>


</form>
  <?php
  	if(isset($_POST['update4'])){
		$almt_aktif = @mysql_real_escape_string($_POST['almt_aktif']);
$nm_aktif = @mysql_real_escape_string($_POST['nm_aktif']);
$pekerjaan_aktif = @mysql_real_escape_string($_POST['pkrj_aktif']);
$tlp_aktif = mysql_real_escape_string($_POST['tlp_aktif']);
		//$tlp_its = @mysql_real_escape_string($_POST['tlp_its']);
		mysql_query("update mahasiswa set alamat_aktif='$almt_aktif',nama_aktif='$nm_aktif',pekerjaan_aktif='$pekerjaan_aktif',tlp_aktif='$tlp_aktif' where idmahasiswa='$kdmhs'");
		 echo "<script language='javascript'>alert('Profil Berhasil di update')</script>";
	echo "<script language='javascript'>window.location = '?kdmhs=$kdmhs'</script>";
	exit();
	}
  
  ?>
</div>
<div class="tab-pane fade" id="profile4">
<form method="post">
  <table border="0" class="table table-bordered table-sm">
    <tr>
      <td width="138">Nama ORTU (IBU) </td>
      <td width="528"><input name="nama_ortu" type="text" id="tlp_sementara" size="55" class="form-control" value="<?php echo"$mhss[nama_ortu]"; ?>"></td>
      <td width="427" rowspan="5"><div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert"><span class="close">INFORMASI  PENGISIAN </span></button>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede 
</div><input name="update5" type="submit" class="btn btn-success" id="update5" value="update data Orangtua" ></td>
    </tr>
    <tr>
      <td>Nama ORTU(AYAH) </td>
      <td><input name="nama_ortu2" type="text" id="nama_ortu2" size="55" class="form-control" value="<?php echo"$mhss[nama_ortu2]"; ?>"></td>
      </tr>
    <tr>
      <td>Alamat Ortu </td>
      <td><textarea name="alamat_ortu" cols="55" rows="5" wrap="VIRTUAL" id="alamat_ortu" class="form-control" disabled></textarea></td>
      </tr>
    <tr>
      <td>Profesi Ortu </td>
      <td><input name="profesi_ortu" type="text" id="nama_ortu" size="55" class="form-control" value="<?php echo"$mhss[profesi_ortu]"; ?>"></td>
      </tr>
    <tr>
      <td>Pendidikan Ortu </td>
      <td><input name="pendidikan_ortu" type="text" id="profesi_ortu" size="55" class="form-control" value="<?php echo"$mhss[pendidikan_ortu]"; ?>"></td>
      </tr>
  </table>
</form>
  <?php
  	if(isset($_POST['update5'])){
		$nama_ortu = @mysql_real_escape_string($_POST['nama_ortu']);
		$nama_ortu2 = @mysql_real_escape_string($_POST['nama_ortu2']);
		$profesi_ortu = @mysql_real_escape_string($_POST['profesi_ortu']);
		$pendidikan_ortu = @mysql_real_escape_string($_POST['pendidikan_ortu']);

		//$tlp_its = @mysql_real_escape_string($_POST['tlp_its']);
		mysql_query("update mahasiswa set nama_ortu='$nama_ortu',nama_ortu2='$nama_ortu2',profesi_ortu='$profesi_ortu',pendidikan_ortu='$pendidikan_ortu' where idmahasiswa='$kdmhs'");
		 echo "<script language='javascript'>alert('Profil Berhasil di update')</script>";
	echo "<script language='javascript'>window.location = '?kdmhs=$kdmhs'</script>";
	exit();
	}
  
  ?>
</div>
</div>

<?php
}
?>
