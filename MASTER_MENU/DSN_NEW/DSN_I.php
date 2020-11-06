<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
	<?php
			$acak = rand("0000000","99999999");
			if(isset($_POST['simpan'])){
			$progdi = @$_POST['progdi'];
			$nama = @$sql_escape($_POST['nama']);
			$alamat = @htmlspecialchars($_POST['alamat']);
			$provinsi =  @$sql_escape($_POST['provinsi']);
			$kota   = @$sql_escape($_POST['kota']);
			$al = "$alamat &nbsp; $kota &nbsp; $provinsi";
			$kodepos   = @$sql_escape($_POST['kodepos']);
			$email   = @$_POST['email'];
			$agama   = @$sql_escape($_POST['agama']);
			$jeniskelamin   = @$sql_escape($_POST['jeniskelamin']);
			$tempat = $sql_escape($_POST['tempat']);
			$tgl = @$sql_escape($_POST['tgl']);
			$bulan = @$sql_escape($_POST['bulan']);
			$tahun = @$sql_escape($_POST['tahun']);
			$negara = @$sql_escape($_POST['negara']);
			$ttl = "$tempat, $tgl";
			$tlp = @$sql_escape($_POST['tlp']);
			$gelar = @$sql_escape($_POST['gelar']);
			$noktp = @$_POST['noktp'];
			$ket = @$sql_escape($_POST['ket']);
			$kelas = @$sql_escape($_POST['kelas']);
			$cek = @$sql_escape($_POST['cek']);
			$nip = @$sql_escape($_POST['nip']);
			$nidn = @$sql_escape($_POST['nidn']);

		$tc = "$acak";
		$kode = "$progdi.$tc";
		mysql_query("insert into dosen(iddosen,idnid,idkejuruan,nama,alamat,negara,email,agama,jeniskelamin,ttl,noktp,status,tlp,gelar)values('$nip','$nidn','$progdi','$nama','$al','$negara','$email','$agama','$jeniskelamin','$ttl','$noktp','2','$tlp','$gelar')");
		 echo "<script language='javascript'>alert('daftar dosen  Berhasil di simpan ke database')</script>";
			echo "<script language='javascript'>window.location = '?HLM=DSN_M&SUB=DSN_I'</script>";
			exit();} ?>
<form action="" method="post" >
  <table width="686" border="0" align="center" bgcolor="#00A854" class="table table-bordered">
    <tr valign="middle" bgcolor="#FFFFFF">
      <td width="532" height="46">
	  <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">NIP</span>
      </div>
      <input name="nip" type="text" id="nip" class="form-control" required></div></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="51">
	  <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">NIDN</span>
      </div>
	  <input name="nidn" type="text" id="nidn" class="form-control" required></div></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="51">
	  <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">Pengampu</span>
      </div>
	  <select name="progdi" size="10" multiple class="form-control" id="select" required>
          <option>-------kode Program Studi-----------</option>
          <?php
		 $fak = mysql_query("$sl idkejuruan,kejuruan FROM kejuruan order by idkejuruan");
		 while($fakk = mysql_fetch_array($fak)){
		  echo"<option value=$fakk[idkejuruan]>$fakk[idkejuruan]&nbsp; / &nbsp;$fakk[kejuruan]&nbsp;$fakk[progdi]</option>"; }
		 ?>
      </select></div></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="51"><div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">Nama Dosen</span>
      </div><input name="nama" type="text" id="nama" style="max-width: 20rem;" class="form-control" required>
        <input type="text" name="gelar" style="max-width: 20rem;" placeholder="Gelar" class="form-control" required></div></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="35">
	  <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">Alamat</span>
      </div>
	  <textarea name="alamat" cols="60" wrap="VIRTUAL" id="alamat" class="form-control" required></textarea>
	  </div>
        <br>
        <input name="provinsi" type="text" id="provinsi" placeholder="provinsi" class="form-control" required>
        <input name="kota" type="text" id="kota" placeholder="kota" class="form-control" required>
        <input name="kodepos" type="text" id="kodepos" value="(kodepos)" size="20" maxlength="8" class="form-control" required></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="53">
	  <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">Kewarganegaraan</span>
      </div>
	  <select name="negara" id="negara" class="form-control" required>
        <option value=""></option>
        <option value="WNA">WNA</option>
        <option value="WNI">WNI</option>
      </select></div></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="35">
	  
	  <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">Email</span>
      </div>
	  <input name="email" type="email" id="email" size="40" class="form-control" required></div></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="56">
	  <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">Agama</span>
      </div>
	  <select name="agama" id="agama"  class="form-control" required>
        <option value=""></option>
   
        <option value="islam">Islam</option>
        <option value="khatolik">Khatolik</option>
		     <option value="kristen">Kristen</option>
        <option value="hindu">Hindu</option>
        <option value="budha">Budha</option>
        <option value="lainya">lainya</option>
      </select></div></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="59">
	  <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">Jenisw kelamin</span>
      </div>
	  <select name="jeniskelamin" id="jeniskelamin"  class="form-control" required>
        <option value=""></option>
        <option value="Laki-Laki">Laki-Laki</option>
        <option value="Wanita">Wanita</option>
      </select></div></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="90">
	  <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">TTL</span>
      </div><input name="tempat" type="text" id="nama" style="max-width: 20rem;" class="form-control" required>
        <input type="date" name="tgl" style="max-width: 20rem;"  class="form-control" required></div>      
       </td></tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="90">  <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">Telpon</span>
      </div>
	  <input name="tlp" type="number" id="tlp" size="55" class="form-control"></div></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="90">
	    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">No KTP</span>
      </div>
	  <input name="noktp" type="number" id="noktp" size="55" class="form-control" required>
        </div></td>
    </tr>
    <tr align="right" valign="middle" bgcolor="#FFFFFF">
      <td height="90"><button class="btn btn-success" name="simpan"><i class="fa fa-paper-plane"></i>&nbsp Simpan Data</button></td>
    </tr>
  </table>
</form>
</body>
<?php } ?>
