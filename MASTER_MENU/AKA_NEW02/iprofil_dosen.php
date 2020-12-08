<?php //session_start();
 include_once"../sc/conek.php";

	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
 ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>
</head>

<body>
<?php
$acak = rand("0000000","99999999");
if(isset($_POST['simpan'])){
$progdi = @$_POST['progdi'];
$fak = @$_POST['fak'];
$nama = @mysql_real_escape_string($_POST['nama']);
$alamat = @htmlspecialchars($_POST['alamat']);
$provinsi =  @mysql_real_escape_string($_POST['provinsi']);
$kota   = @mysql_real_escape_string($_POST['kota']);
$al = "$alamat &nbsp; $kota &nbsp; $provinsi";
$kodepos   = @mysql_real_escape_string($_POST['kodepos']);
$email   = @$_POST['email'];
$agama   = @mysql_real_escape_string($_POST['agama']);
$jeniskelamin   = @mysql_real_escape_string($_POST['jeniskelamin']);
$tempat = mysql_real_escape_string($_POST['tempat']);
$tgl = @mysql_real_escape_string($_POST['tgl']);
$bulan = @mysql_real_escape_string($_POST['bulan']);
$tahun = @mysql_real_escape_string($_POST['tahun']);
$negara = @mysql_real_escape_string($_POST['negara']);
$ttl = "$tempat&nbsp; $tgl &nbsp; $bulan &nbsp; $tahun";
$tlp = @mysql_real_escape_string($_POST['tlp']);
$gelar = @mysql_real_escape_string($_POST['gelar']);
$noktp = @$_POST['noktp'];
$ket = @mysql_real_escape_string($_POST['ket']);
$kelas = @mysql_real_escape_string($_POST['kelas']);
$cek = @mysql_real_escape_string($_POST['cek']);
$nip = @mysql_real_escape_string($_POST['nip']);
$nidn = @mysql_real_escape_string($_POST['nidn']);

$tc = "$acak";
$kode = "$progdi.$tc";
mysql_query("insert into dosen(iddosen,idnid,idkejuruan,idfakultas,nama,alamat,negara,email,agama,jeniskelamin,ttl,noktp,status,tlp,gelar)values('$nip','$nidn','$progdi','$fak','$nama','$al','$negara','$email','$agama','$jeniskelamin','$ttl','$noktp','2','$tlp','$gelar')");
 echo "<script language='javascript'>alert('daftar dosen  Berhasil di simpan ke database')</script>";
	echo "<script language='javascript'>window.location = '?aka=idosen'</script>";
	exit();
}
?>
<h3>Input Dosen
</h3>
<div class="container">
<form action="" method="post" enctype="multipart/form-data" name="form1" onSubmit="MM_validateForm('nama','','R','gelar','','R','kodepos','','R','email','','RisEmail','tlp','','RisNum','noktp','','R','alamat','','R');return document.MM_returnValue">
  <table width="686" border="0" align="center" bgcolor="#00A854" class="table table-bordered">
    <tr valign="middle" bgcolor="#FFFFFF">
      <td width="144" height="46">NIP</td>
      <td width="532">
      <input name="nip" type="text" id="nip" class="form-control"></td>
      <td width="532" rowspan="13"> <div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">X </button>
 Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede 
 Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede 
</div></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="51">NIDN</td>
      <td><input name="nidn" type="text" id="nidn" class="form-control"></td>
      </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="51">Pengampu</td>
      <td><select name="progdi" id="select" class="form-control">
          <option>-------kode Program Studi-----------</option>
          <?php
		 $fak = mysql_query("select * from kejuruan order by idkejuruan");
		 while($fakk = mysql_fetch_array($fak)){
		 
		 echo"
		 <option value=$fakk[idkejuruan]>$fakk[idkejuruan]&nbsp; / &nbsp;$fakk[kejuruan]&nbsp;$fakk[progdi]</option>";
		 }
		 
		 ?>
      </select></td>
      </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="51">Fakultas</td>
      <td><select name="fak" class="form-control" id="fak">
        <option>-------kode Program Studi-----------</option>
        <?php
		 $fak1 = mysql_query("select * from fakultas order by idfakultas");
		 while($fakk1= mysql_fetch_array($fak1)){
		 
		 echo"
		 <option value=$fakk1[idfakultas]>$fakk1[idfakultas]&nbsp; / &nbsp;$fakk1[fakultas]</option>";
		 }
		 
		 ?>
      </select></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="51">Nama</td>
      <td><input name="nama" type="text" id="nama" size="55" class="form-control">
        <input type="text" name="gelar" placeholder="Gelar" class="form-control"></td>
      </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="35">Alamat</td>
      <td><textarea name="alamat" cols="60" wrap="VIRTUAL" id="alamat" class="form-control"></textarea>
        <br>
        <input name="provinsi" type="text" id="provinsi" placeholder="provinsi" class="form-control">
        <input name="kota" type="text" id="kota" placeholder="kota" class="form-control">
        <input name="kodepos" type="text" id="kodepos" value="(kodepos)" size="20" maxlength="8" class="form-control"></td>
      </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="53">Kewarganegaraan</td>
      <td><select name="negara" id="negara" multiple class="form-control">
        <option>------pilih kewarganegaraan----</option>
        <option value="WNA">WNA</option>
        <option value="WNI">WNI</option>
      </select></td>
      </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="35">email</td>
      <td><input name="email" type="text" id="email" size="40" class="form-control"></td>
      </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="56">Agama</td>
      <td><select name="agama" id="agama" multiple class="form-control">
        <option>------pilih agama----</option>
   
        <option value="islam">Islam</option>
        <option value="khatolik">Khatolik</option>
		     <option value="kristen">Kristen</option>
        <option value="hindu">Hindu</option>
        <option value="budha">Budha</option>
        <option value="lainya">lainya</option>
      </select></td>
      </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="59">Jenis Kelamin </td>
      <td><select name="jeniskelamin" id="jeniskelamin" multiple class="form-control">
        <option>---------------jenis kelamin-------------</option>
        <option value="Laki-Laki">Laki-Laki</option>
        <option value="Wanita">Wanita</option>
      </select></td>
      </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="90">TTL</td>
      <td><input name="tempat" type="text" id="tempat" placeholder="tempat lahir" class="form-control">        
        <select name="tgl" id="tgl" multiple class="form-control">
            <option>-----tanggal----</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="25">24</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
        </select>
          <select name="bulan" id="bulan" multiple class="form-control">
            <option>-------bulan--------</option>
            <option value="januari">januari</option>
            <option value="februari">februari</option>
            <option value="maret">maret</option>
            <option value="april">april</option>
            <option value="mei">mei</option>
            <option value="juni">juni</option>
            <option value="juli">juli</option>
            <option value="agustus">agustus</option>
            <option value="september">september</option>
            <option value="oktober">oktober</option>
            <option value="novermber">november</option>
            <option value="desember">desember</option>
          </select>
          <select name="tahun" id="tahun" multiple class="form-control">
            <option>--------tahun------</option>
            <option value="1980">1980</option>
            <option value="1981">1981</option>
            <option value="1982">1982</option>
            <option value="1983">1983</option>
            <option value="1984">1984</option>
            <option value="1985">1985</option>
            <option value="1986">1986</option>
            <option value="1987">1987</option>
            <option value="1988">1988</option>
            <option value="1989">1989</option>
            <option value="1990">1990</option>
            <option value="1991">1991</option>
            <option value="1992">1992</option>
            <option value="1993">1993</option>
            <option value="1994">1994</option>
            <option value="1995">1995</option>
            <option value="1996">1996</option>
      </select></td>
      </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="90">Telpon</td>
      <td><input name="tlp" type="text" id="tlp" size="55" class="form-control"></td>
      </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="90">No KTP </td>
      <td><input name="noktp" type="text" id="noktp" size="55" class="form-control">
        <font color="#990000">&nbsp;</font></td>
      </tr>
    <tr align="right" valign="middle" bgcolor="#FFFFFF">
      <td height="90" colspan="3"><input class="btn btn-success" name="simpan" type="submit" id="simpan" value="simpan data dosen"></td>
    </tr>
  </table>
</form>
</div>
</body>
</html>
<?php
}
?>