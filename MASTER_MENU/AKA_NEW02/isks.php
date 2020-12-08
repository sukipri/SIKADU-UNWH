<?php //session_start();
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
<script language="JavaScript" type="text/javascript">
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
xmlhttp.open('get', 'ambil_kuri.php?idPropinsi='+idPropinsi, true);
xmlhttp.onreadystatechange = function()
{
if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200))
document.getElementById("sks").innerHTML = xmlhttp.responseText;
return false;
}

xmlhttp.send(null);
}
</script>
</head>

<body>
<?php
$ack_mpl = rand("88888","99999");
$kj_mpl = "$kjj[idkejuruan]$ack_mpl";
$idkr = @mysql_real_escape_string($_GET['idkr']);
 $sks = mysql_query("select * from kurikulum  where idmain='$idkr'");
	  $skss = mysql_fetch_array($sks);
	  $sm = mysql_query("select * from semester where idsemester='$skss[idsemester]' ");
 $smm = mysql_fetch_array($sm);
 $smtj = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$smm[idtahun_ajaran]'");
$smmtj = mysql_fetch_array($smtj); 
?>
<?php
if(isset($_POST['simpan'])){
$semester   = @mysql_real_escape_string($_POST['semester']);
$kode_kur   = @$_POST['kode_kur'];
$jumlah  = @mysql_real_escape_string($_POST['jumlah']);
$hari  = @mysql_real_escape_string($_POST['hari']);
$jam  = @mysql_real_escape_string($_POST['jam']);
$kelas  = @mysql_real_escape_string($_POST['kelas']);
$kode  = @mysql_real_escape_string($_POST['kode']);
$kuota  = @mysql_real_escape_string($_POST['kuota']);
$kdruang  = @mysql_real_escape_string($_POST['kdruang']);
$idkjur  = @mysql_real_escape_string($_POST['idkjur']);
$ack = rand("88888","99999999");
$idsks = "$kode_kur.$ack";

mysql_query("insert into sks(idmainsks,idsks,iddosen,idsemester,idkejuruan,idruang,idkurikulum,jumlah,hari,jam,idkelas,kuota)values('','$idsks','$kddsn','$semester','$idkjur','$kdruang','$kode_kur','$jumlah','$hari','$jam','$kelas','$kuota')");
 echo "<script language='javascript'>alert('SKS  Berhasil di simpan ke database')</script>";
	echo "<script language='javascript'>window.location = '?mng=isks&kddsn=$kddsn'</script>";
	exit();
}
?>
<form action="" method="post" name="form1" onSubmit="MM_validateForm('judul','','R','jumlah','','RisNum');return document.MM_returnValue">
  <h3>Input SKS
  </h3><hr color="#FF8040">
  <table width="102%" border="0" align="center" bgcolor="#00A854">
    <tr valign="middle" bgcolor="#FFFFFF">
      <td width="72" height="47">Kode Kurikulum </td>
      <td width="144"><input type="text" name="kode_kur" value="<?php
echo"$skss[idkurikulum]";
?>"><br>//<?php
echo"$skss[judul]";
?></td>
      <td width="552" rowspan="9" valign="top"><h3>KETERANGAN SEMESTER
        </h3>
        <hr>
        <table width="552" border="0" align="center" bgcolor="#00A854">
        <tr align="center" valign="top" bgcolor="#7DFF7D">
          <td width="174" height="28">Kode Semester </td>
          <td width="160">Nama Semester </td>
          <td width="101">Ajaran</td>
          <td width="101">Action</td>
        </tr>
        <?php $sm = mysql_query("select * from semester");
  while($smm = mysql_fetch_array($sm)){
  $aj = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$smm[idtahun_ajaran]'");
		 $ajj = mysql_fetch_array($aj);
   ?>
        <tr align="center" valign="top" bgcolor="#FFFFFF">
          <td height="28"><?php echo"$smm[idsemester]"; ?></td>
          <td><?php echo"$smm[semester]"; ?></td>
          <td><?php echo"$ajj[ajaran]<br><b>$smm[ajaran]</b>"; ?></td>
          <td>&nbsp;</td>
        </tr>
        <?php } ?>
      </table>
	  <div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert"><span class="close">INFORMASI  PENGISIAN </span></button>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede 
</div>
	  </td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="54">Semester</td>
      <td>        <input type="text" name="semester" value="<?php echo"$skss[idsemester]"; ?>"></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="37">Jumlah SKS </td>
      <td><input name="jumlah" type="text" id="jumlah" size="10" value="<?php
echo"$skss[sks]";
?>">      </td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="37">Kode Kejuruan</td>
      <td><input type="text" name="idkjur" value="<?php
echo"$skss[idkejuruan]";
?>"></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="37">Waktu</td>
      <td><select name="jam">
        <?php
	  $jam = mysql_query("select * from jam");
	  while($jamm = mysql_fetch_array($jam)){
	 
	   echo"<option value=$jamm[jam]>$jamm[jam]</option>";
	 
	  }
	  
	  
	  ?>
      </select>
*(00.00</td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="37">Hari</td>
      <td><select name="hari" id="hari">
        <?php
	  $hari = mysql_query("select * from hari");
	  while($harii = mysql_fetch_array($hari)){
	  if($harii['hari']==$skss['hari']){
	  echo"<option value=$harii[hari] selected>$harii[hari]</option>";
	  }else{
	   echo"<option value=$harii[hari]>$harii[hari]</option>";
	  }
	  }
	  
	  
	  ?>
            </select></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="37">Kelas</td>
      <td><select name="kelas" id="kelas">
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
      <td height="37">Kuota Mahasiswa </td>
      <td><input name="kuota" type="text" id="kuota" size="15"></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="37">Ruang</td>
      <td><select name="kdruang" id="kdruang">
        <option>ruang..................</option>
		<?php $r = mysql_query("select * from ruang");
		while($rr = mysql_fetch_array ($r)){
		$g = mysql_query("select * from gedung where idgedung='$rr[idgedung]'");
		$gg = mysql_fetch_array ($g);
		echo"<option value=$rr[idruang]>$gg[gedung] / $rr[idruang]</option>";
		
		}?>
      </select></td>
    </tr>
    <tr align="center" valign="middle" bgcolor="#FFFFFF">
      <td height="37" colspan="3"><input name="simpan" type="submit" id="simpan" value="simpan data sks"></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
}
?>