<?php //session_start();
 include_once"../sc/conek.php";

	
	
 ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Pengisian PMB</title>
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
<script language="javascript" type="text/javascript">
function createRequestObject()
{
var ro;
var browser = navigator.appName;
if(browser == "Microsoft Internet Explorer")
{
ro = new ActiveXObject("Microsoft.XMLHTTP");
}
else
{
ro = new XMLHttpRequest();
}
return ro;
}

var xmlhttp = createRequestObject();
function rubah(pilih)
{
var idPropinsi = pilih.value;

if (!idPropinsi) return;
xmlhttp.open('get', 'ambil_kab.php?idPropinsi='+idPropinsi, true);
xmlhttp.onreadystatechange = function()
{
if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200))
document.getElementById("kab").innerHTML = xmlhttp.responseText;
return false;
}

xmlhttp.send(null);
}
</script>
</head>

<body>
<div class="container">
<table width="100%" align="center" bgcolor="#FFFFFF">
  <tr>
    <td width="748" valign="top"><h3><font color="#008040">Pengisian Mahasisiswa </font></h3>      </td>
    <td width="1" valign="top">&nbsp;</td>
    <td width="118" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" valign="top"><hr color="#008040"></td>
  </tr>
  <tr>
    <td colspan="2" valign="top"><form action="" method="post" enctype="multipart/form-data" name="form1" onSubmit="MM_validateForm('nama','','R','kodepos','','RisNum','email','','RisEmail','tlp2','','R','noktp','','R','alamat','','R');return document.MM_returnValue">
      <table width="586" height="2524" bgcolor="#00A854" class="table table-bordered">
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="46">Tahun Ajaran </td>
          <td>
            <select name="ajaran" id="ajaran" class="form-control">
              <option>------------Tahun.......</option>
              <?php
		 $aj = mysql_query("select * from tahun_ajaran order by ajaran asc limit 200");
		 while($ajj = mysql_fetch_array($aj)){
		 
		 echo"
		 <option value=$ajj[idtahun_ajaran]>$ajj[ajaran]</option>";
		 }
		 
		 ?>
			 



            </select></td>
        </tr>
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="75">NIM</td>
          <td><input name="nim" type="text" id="nim" class="form-control"></td>
        </tr>
        <tr valign="middle" bgcolor="#FFFFFF">
          <td width="151" height="75">Program studi </td>
          <td width="423"><select name="progdi" id="progdi" class="form-control">
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
          <td height="65">Semester</td>
          <td><select name="semester" id="semester" class="form-control">
            <option>semester........................</option>
			<?php
			$sm = mysql_query("select * from semester");
			while($smm = mysql_fetch_array($sm)){
			 $smth = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$smm[idtahun_ajaran]'");
$smmth = mysql_fetch_array($smth);
			
			echo"<option value=$smm[idsemester]>$smm[semester]&nbsp; $smmth[ajaran]&nbsp;$smm[ajaran]</option>";
			}
			?>
          </select></td>
        </tr>
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="65">Keterangan semester </td>
          <td><select name="semes" class="form-control">
            <option value="semester 1">semester 1</option>
			 <option value="semester 2">semester 2</option>
			  <option value="semester 3">semester 3</option>
			   <option value="semester 4">semester 4</option>
			    <option value="semester 5">semester 5</option>
				 <option value="semester 6">semester 6</option>
				  <option value="semester 7">semester 7</option>
				   <option value="semester 8">semester 8</option>
				    <option value="semester 9">semester 9</option>
          </select></td>
        </tr>
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="65">kelas            </td>
          <td><select name="kelas" id="kelas" class="form-control">
            <option>kelas...........</option>
           <?php
		     $kls = mysql_query("select * from kelas");
  while($klss = mysql_fetch_array($kls)){
  echo"<option value=$klss[idkelas]>$klss[kelas]</option>";
  
  }
		   
		   ?>
		   
		   
                    </select></td>
        </tr>
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="65">Beasiswa</td>
          <td><select name="bea" id="bea" class="form-control">
            <option>pilih kode beasiswa.........</option>
			 <option value="T">tidak ada beasiswa</option>
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
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="65">Nama</td>
          <td><input name="nama" type="text" id="nama" size="55" class="form-control"></td>
        </tr>
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="54">Wali Dosen </td>
          <td><select name="wali" id="wali" class="form-control">
            <option>pilih dosen......................</option>
            <?php
		$dsn = mysql_query("select * from dosen order by nama desc limit 2000");
  while($dsnn = mysql_fetch_array($dsn)){
  echo"<option value=$dsnn[iddosen]>$dsnn[iddosen]&nbsp;/&nbsp;<b>$dsnn[nama]</b>  / &nbsp;$dsnn[gelar]</option>";
  }
		?>
          </select></td>
        </tr>
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="130">Alamat</td>
          <td><textarea name="alamat" cols="60" wrap="VIRTUAL" id="alamat" class="form-control"></textarea><br>
            </td>
        </tr>
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="54">Provinsi</td>
          <td><input name="provinsi" type="text" id="provinsi" class="form-control"></td>
        </tr>
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="54">Kota</td>
          <td><input name="kota" type="text" id="kota" class="form-control"></td>
        </tr>
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="54">Kode Pos </td>
          <td><input name="kodepos" type="text" id="kodepos" class="form-control"></td>
        </tr>
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="54">Kewarganegaraan</td>
          <td><select name="negara" id="negara" class="form-control">
            <option>------pilih kewarganegaraan----</option>
            <option value="WNA">WNA</option>
            <option value="WNI">WNI</option>
          </select></td>
        </tr>
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="55">Email</td>
          <td><input name="email" type="text" id="email" size="40" class="form-control"></td>
        </tr>
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="62">Agama</td>
          <td><select name="agama" id="agama" class="form-control">
            <option>------pilih agama----</option>
         
            <option value="islam">Islam</option>
			   <option value="kristen">Kristen</option>
            <option value="khatolik">Khatolik</option>
            <option value="hindu">Hindu</option>
            <option value="budha">Budha</option>
            <option value="lainya">lainya</option>
          </select></td>
        </tr>
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="63">Jenis Kelamin </td>
          <td><select name="jeniskelamin" id="jeniskelamin" class="form-control">
            <option>---------------jenis kelamin-------------</option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Wanita">Wanita</option>
          </select> 
            </td>
        </tr>
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="48">Tempat Tanggal Lahir </td>
          <td>                        <input name="tempat" type="text" id="tempat" class="form-control">
            <select name="tgl" id="tgl" class="form-control">
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
            <select name="bulan" id="bulan" class="form-control">
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
            <select name="tahun" id="tahun" class="form-control">
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
          <td height="53">Telpon (<strong><font color="#0000FF">yang bisa di hubungi</font></strong>) </td>
          <td><input name="tlp" type="text" id="tlp2" size="55" class="form-control"></td>
        </tr>
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="56">No KTP</td>
          <td><input name="noktp" type="text" id="noktp" size="55" class="form-control">
            <font color="#990000"><strong>*(Jika sudah meiliki </strong></font></td>
        </tr>
        <tr align="right" valign="middle" bgcolor="#FFFFFF">
          <td height="48" align="left">Lulusan</td>
          <td align="left"><select name="lulusan" id="lulusan" class="form-control">
            <option>lulusan..........</option>
            <option value="IPA">IPA</option>
            <option value="IPS">IPS</option>
            <option value="bahasa">BAHASA</option>
            <option value="keagamaan">KEAGAAMAAN</option>
            <option value="lainya">lainya</option>
          </select></td>
        </tr>
        <tr align="right" valign="middle" bgcolor="#FFFFFF">
          <td height="46" align="left">Tahun Lulus </td>
          <td align="left"><select name="tahun_lulus" id="tahun_lulus" class="form-control">
            <option>tahun lulus...........</option>
            <option value="2014">2014</option>
            <option value="2013">2013</option>
            <option value="2012">2012</option>
            <option value="2011">2011</option>
            <option value="2010">2010</option>
            <option value="2009">2009</option>
            <option value="2008">2008</option>
            <option value="2007">2007</option>
          </select></td>
        </tr>
        <tr align="right" valign="middle" bgcolor="#FFFFFF">
          <td height="53" align="left">Gelombang</td>
          <td align="left"><input name="gelombang" type="text" id="gelombang" size="35" class="form-control"></td>
        </tr>
        <tr align="right" valign="middle" bgcolor="#FFFFFF">
          <td height="53" align="left">Status NIM </td>
          <td align="left"><select name="st_nim" class="form-control">
            <option value="1">AKTIF</option>
            <option>NON AKTIF</option>
          </select></td>
        </tr>
        <tr align="right" valign="middle" bgcolor="#FFFFFF">
          <td height="53" align="left">Status Mahasiswa </td>
          <td align="left">            <select name="mhs" id="mhs" class="form-control">
            <option>status nim .........</option>
            <option value="2">AKTIF</option>
            <option value="1">TIDAK AKTIF</option>
            <option value="3">CUTI</option>
            <option value="4">LULUS</option>
            <option value="5">KELUAR</option>
            </select></td>
        </tr>
        <tr align="right" valign="middle" bgcolor="#FF8040">
          <td height="26" colspan="2" align="left">INTANSI</td>
          </tr>
        <tr align="right" valign="middle" bgcolor="#FFFFFF">
          <td height="38" align="left">Nama Instansi  </td>
          <td align="left"><input name="nm_its" type="text" id="nm_its" size="55" class="form-control"></td>
        </tr>
        <tr align="right" valign="middle" bgcolor="#FFFFFF">
          <td height="48" align="left">Alamat Instansi </td>
          <td align="left"><textarea name="almt_its" cols="66" rows="6" wrap="VIRTUAL" id="almt_its"></textarea class="form-control"></td>
        </tr>
        <tr align="right" valign="middle" bgcolor="#FFFFFF">
          <td height="48" align="left">Telpon Instansi </td>
          <td align="left"><input class="form-control" name="tlp_its" type="text" id="tlp_its" size="40"></td>
        </tr>
        <tr align="right" valign="middle" bgcolor="#FF8040">
          <td height="25" colspan="2" align="left">ASAL SEKOLAH DAN UNIVERSITAS </td>
          </tr>
        <tr align="right" valign="middle" bgcolor="#FFFFFF">
          <td height="48" align="left">Asal Sekolah SMU/SMA/SMK/STM </td>
          <td align="left"><input name="asal_skl" type="text" id="asal_skl" class="form-control">
            (NISN)</td>
        </tr>
        <tr align="right" valign="middle" bgcolor="#FFFFFF">
          <td height="48" align="left">Asal Unisversitas</td>
          <td align="left"><input name="asal_uni" type="text" id="asal_uni2" class="form-control"></td>
        </tr>
        <tr align="right" valign="middle" bgcolor="#FF8040">
          <td height="21" colspan="2" align="left">ALAMAT DAN KONTAK YANG AKTIF </td>
          </tr>
        <tr align="right" valign="middle" bgcolor="#FFFFFF">
          <td height="36" align="left">Alamat Aktif </td>
          <td align="left"><textarea name="almt_aktif" class="form-control" cols="55" rows="6" wrap="VIRTUAL" id="almt_aktif"></textarea></td>
        </tr>
        <tr align="right" valign="middle" bgcolor="#FFFFFF">
          <td height="48" align="left">Nama Aktif </td>
          <td align="left"><input class="form-control" name="nm_aktif" type="text" id="nm_aktif" size="55"></td>
        </tr>
        <tr align="right" valign="middle" bgcolor="#FFFFFF">
          <td height="48" align="left">Pekerjaan Aktif </td>
          <td align="left"><input name="pkrj_aktif" type="text" id="pkrj_aktif" size="55" class="form-control"></td>
        </tr>
        <tr align="right" valign="middle" bgcolor="#FFFFFF">
          <td height="48" align="left">Telpon Aktif </td>
          <td align="left"><input name="tlp_aktif" type="text" id="nm_aktif3" size="55" class="form-control"></td>
        </tr>
        <tr align="right" valign="middle" bgcolor="#FF8040">
          <td height="21" colspan="2" align="left">U/ MAHASISWA LUAR </td>
          </tr>
        <tr align="right" valign="middle" bgcolor="#FFFFFF">
          <td height="48" align="left">Alamat Sementara </td>
          <td align="left"><textarea name="alamat_luar" cols="55" rows="5" wrap="VIRTUAL" id="alamat_luar" class="form-control"></textarea></td>
        </tr>
        <tr align="right" valign="middle" bgcolor="#FFFFFF">
          <td height="48" align="left">Telepon</td>
          <td align="left"><input name="tlpluar" type="text" id="tlp_aktif" size="55" class="form-control"></td>
        </tr>
        <tr align="right" valign="middle" bgcolor="#FF8040">
          <td height="21" colspan="2" align="left">Profil Orang Tua </td>
          </tr>
        <tr align="right" valign="middle" bgcolor="#FFFFFF">
          <td height="48" align="left">Nama ORTU (IBU) </td>
          <td align="left"><input name="nama_ortu" type="text" id="tlp_sementara" size="55" class="form-control"></td>
        </tr>
        <tr align="right" valign="middle" bgcolor="#FFFFFF">
          <td height="48" align="left">Nama ORTU(AYAH) </td>
          <td align="left"><input name="nama_ortu2" type="text" id="nama_ortu2" size="55" class="form-control"></td>
        </tr>
        <tr align="right" valign="middle" bgcolor="#FFFFFF">
          <td height="48" align="left">Alamat Ortu </td>
          <td align="left"><textarea name="alamat_ortu" cols="55" rows="5" wrap="VIRTUAL" id="alamat_ortu" class="form-control"></textarea></td>
        </tr>
        <tr align="right" valign="middle" bgcolor="#FFFFFF">
          <td height="48" align="left">Profesi Ortu  </td>
          <td align="left"><input name="profesi_ortu" type="text" id="nama_ortu" size="55" class="form-control"></td>
        </tr>
        <tr align="right" valign="middle" bgcolor="#FFFFFF">
          <td height="43" align="left">Pendidikan Ortu </td>
          <td align="left"><select name="pendidikan_ortu" id="pendidikan_ortu" class="form-control">
            <option>pendidikan orang tua</option>
            <option value="SD">SD</option>
            <option value="SMP">SMP</option>
            <option value="SMA">SMA</option>
            <option value="S1">S1</option>
            <option value="S2">S2</option>
            <option value="S3">S3</option>
                    </select></td>
        </tr>
        <tr align="right" valign="middle" bgcolor="#FFFFFF">
          <td height="60" colspan="2"><input name="simpan" type="submit" id="simpan" value="daftarkan sekarang" class="form-control"></td>
          </tr>
      </table>
        </form>      </td>
    <td valign="top"><div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert"><span class="close">INFORMASI  PENGISIAN </span></button>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede 
</div></td>
  </tr>
</table>
</div>
<?php 
if(isset($_POST['simpan'])){
$progdi = @$_POST['progdi'];
$mhs = @$_POST['mhs'];
$nim = @mysql_real_escape_string($_POST['nim']);
$ajaran = @mysql_real_escape_string($_POST['ajaran']);
$nama = @mysql_real_escape_string($_POST['nama']);
$semester = @mysql_real_escape_string($_POST['semester']);
$alamat = @htmlspecialchars($_POST['alamat']);
$provinsi =  @mysql_real_escape_string($_POST['provinsi']);
$kota   = @mysql_real_escape_string($_POST['kota']);
$al = "$alamat";
$kodepos   = @mysql_real_escape_string($_POST['kodepos']);
$email   = @$_POST['email'];
$agama   = @mysql_real_escape_string($_POST['agama']);
$jeniskelamin   = @mysql_real_escape_string($_POST['jeniskelamin']);
$tempat = mysql_real_escape_string($_POST['tempat']);
$tgl = @mysql_real_escape_string($_POST['tgl']);
$bulan = @mysql_real_escape_string($_POST['bulan']);
$tahun = @mysql_real_escape_string($_POST['tahun']);
$negara = @mysql_real_escape_string($_POST['negara']);
$ttl = " $tgl &nbsp; $bulan &nbsp; $tahun";
$tlp = mysql_real_escape_string($_POST['tlp']);
$noktp = @$_POST['noktp'];
$kelas = @mysql_real_escape_string($_POST['kelas']);
$lulusan = @mysql_real_escape_string($_POST['lulusan']);
$tahun_lulus = @mysql_real_escape_string($_POST['tahun_lulus']);
$statusnim = @mysql_real_escape_string($_POST['st_nim']);
$nm_instansi = @mysql_real_escape_string($_POST['nm_its']);
$almt_instansi = @mysql_real_escape_string($_POST['almt_its']);
$tlp_instansi = @mysql_real_escape_string($_POST['tlp_its']);
$asal_skl = @mysql_real_escape_string($_POST['asal_skl']);
$asal_uni = @mysql_real_escape_string($_POST['asal_uni']);
$almt_aktif = @mysql_real_escape_string($_POST['almt_aktif']);
$nm_aktif = @mysql_real_escape_string($_POST['nm_aktif']);
$pekerjaan_aktif = @mysql_real_escape_string($_POST['pkrj_aktif']);
$tlp_aktif = mysql_real_escape_string($_POST['tlp_aktif']);
$alamat_luar = mysql_real_escape_string($_POST['alamat_luar']);
$tlp_luar = mysql_real_escape_string($_POST['tlpluar']);
$nm_ortu = mysql_real_escape_string($_POST['nama_ortu']);
$nm_ortu2 = mysql_real_escape_string($_POST['nama_ortu2']);
$wali = mysql_real_escape_string($_POST['wali']);
$bea = mysql_real_escape_string($_POST['bea']);
$semes = mysql_real_escape_string($_POST['semes']);
$gelombang = mysql_real_escape_string($_POST['gelombang']);
$profesi_ortu = mysql_real_escape_string($_POST['profesi_ortu']);
$pendidikan_ortu = mysql_real_escape_string($_POST['pendidikan_ortu']);
//$ket = @mysql_real_escape_string($_POST['ket']);
//$cek = @mysql_real_escape_string($_POST['cek']);
//$tc = "$tgl2-$acak";
//$kode = "$progdi.$tc";

$m = mysql_query("select * from mahasiswa where idmahasiswa='$nim' and idkejuruan='$progdi'");
$mh = mysql_num_rows($m);

mysql_query("insert into mahasiswa(idmahasiswa,idkejuruan,idsemester,idgelombang,semester,idtahun_ajaran,iddosen,idkelas,nama,alamat,idprovinsi,idkota,email,agama,jeniskelamin,tgl_lahir,tempat_lahir,kodepos,negara,tlp,noktp,mhs,st,idbea,thn_lulus,jurusan,status_nim,nama_instansi,alamat_instansi,tlp_instansi,asal_sekolah,asal_uni,alamat_aktif,nama_aktif,pekerjaan_aktif,tlp_aktif,alamat_luar,tlp_luar,nama_ortu,nama_ortu2,profesi_ortu,pendidikan_ortu)values('$nim','$progdi','$semester','$gelombang','$semes','$ajaran','$wali','$kelas','$nama','$al','$provinsi','$kota','$email','$agama','$jeniskelamin','$ttl','$tempat','kodepos','$negara','$tlp','$noktp','$mhs','2','$bea','$thn_lulus','$lulusan','$statusnim','$nm_instansi','$almt_instansi','tlp_instansi','$asal_skl','$asal_uni','$almt_aktif','$nm_aktif','$pekerjaan_aktif','$tlp_aktif','$alamat_luar','$tlp_luar','$nm_ortu','$nm_ortu2','$profesi_ortu','$pendidikan_ortu')");
@mysql_query("insert into rekamsemester(idrekamsemester,idmahasiswa,idsemester,ip)values('','$nim','$semester','0')");
  echo "<script language='javascript'>alert('data mahasiswa  Berhasil di simpan ke database')</script>";
	echo "<script language='javascript'>window.location = '?aka=m_mahasiswa&mhs=i_profil_mahasiswa'</script>";
	exit();
}


?>
</body>
</html>
