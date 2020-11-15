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
</head>

<body>
<?php
$kdsks=@mysql_real_escape_string($_GET['kdsks']);
 $sks = mysql_query("select * from sks where idsks='$kdsks'");
$skss = mysql_fetch_array($sks);
 $sm = mysql_query("select * from semester where idsemester='$skss[idsemester]'");
$smm = mysql_fetch_array($sm);
 $dsn = mysql_query("select * from dosen where iddosen='$skss[iddosen]'");
$dsnn = mysql_fetch_array($dsn);
$kj = mysql_query("select * from kejuruan where idkejuruan='$skss[idkejuruan]'");
$kjj = mysql_fetch_array($kj);
$kr = mysql_query("select * from kurikulum where idkurikulum='$skss[idkurikulum]'");
$krr = mysql_fetch_array($kr);

?>
<?php
if(isset($_POST['simpan'])){
$semester   = @mysql_real_escape_string($_POST['semester']);
$judul   = @mysql_real_escape_string($_POST['judul']);
$jumlah  = @mysql_real_escape_string($_POST['jumlah']);
$hari  = @mysql_real_escape_string($_POST['hari']);
$jam  = @mysql_real_escape_string($_POST['jam']);
$dosen  = @mysql_real_escape_string($_POST['dosen']);
$kelas  = @mysql_real_escape_string($_POST['kelas']);
$kuota  = @mysql_real_escape_string($_POST['kuota']);
$batas  = @mysql_real_escape_string($_POST['batas']);
$app  = @mysql_real_escape_string($_POST['app']);
$kdruang  = @mysql_real_escape_string($_POST['kdruang']);
mysql_query("update sks set iddosen='$dosen',idsemester='$semester',idruang='$kdruang',idkurikulum='$judul',jumlah='$jumlah',hari='$hari',jam='$jam',idkelas='$kelas',kuota='$kuota',app='$app',batas_dosen='$batas' where idsks='$kdsks' ");
mysql_query("update krs set jumlah='$jumlah' where idsks='$kdsks'");
 echo "<script language='javascript'>alert('SKS  Berhasil di edit ke database')</script>";
	echo "<script language='javascript'>window.location = '?pilih=vsks'</script>";
	exit();
}
?>
<form action="" method="post" name="form1" onSubmit="MM_validateForm('judul','','R','jumlah','','RisNum');return document.MM_returnValue">
  <h4>Edit SKS
  </h4>
  <table width="765" border="0" align="center" class="table table-bordered">
    <tr valign="middle" bgcolor="#F0F0F0">
      <td width="275" height="47">Kode Mapel </td>
      <td width="480"><?php echo"<b>$skss[idsks]</b><br>-$krr[judul]-"; ?></td>
    </tr>
    <tr valign="middle" bgcolor="#F0F0F0">
      <td height="54">Dosen</td>
      <td><select name="dosen" class="form-control">
	  <?php
		
		$dsn01 = mysql_query("select * from dosen ");
while($dsnn01 = mysql_fetch_array($dsn01)){
if($dsnn01['iddosen']==$skss['iddosen']){
echo"<option value=$dsnn01[iddosen] selected>$dsnn01[nama]</option>";
}else{ 
echo"<option value=$dsnn01[iddosen]>$dsnn01[nama]</option>";
}

}

		?>
      </select>      </td>
    </tr>
    <tr valign="middle" bgcolor="#F0F0F0">
      <td height="54">Kejuruan</td>
      <td><?php echo"<b>$kjj[kejuruan]</b>"; ?></td>
    </tr>
    <tr valign="middle" bgcolor="#F0F0F0">
      <td height="54">Semester Sebelumnya </td>
      <td><?php echo"<b>$smm[semester]</b>"; ?></td>
    </tr>
    <tr valign="middle" bgcolor="#F0F0F0">
      <td height="54">Semester</td>
      <td><select name="semester" class="form-control">
        <option>semester......................</option>
		<?php
		$sm1 = mysql_query("select * from semester ");
  while($smm1 = mysql_fetch_array($sm1)){
   $th = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$smm[idtahun_ajaran]'");
  $thh = mysql_fetch_array($th);
  
  if($smm1['idsemester']==$skss['idsemester']){
    echo"<option value=$smm1[idsemester] selected>$smm1[semester] &nbsp; $thh[ajaran] &nbsp; $smm1[ajaran]</option>";
  }else{
  echo"<option value=$smm1[idsemester]>$smm1[semester] &nbsp; $thh[ajaran] &nbsp; $smm1[ajaran]</option>";
  }
  }
		?>
      </select></td>
    </tr>
    <tr valign="middle" bgcolor="#F0F0F0">
      <td height="51">Judul</td>
      <td><input type="text" name="judul" id="judul" readonly="" value="<?php
	 
	   $skskr = mysql_query("select * from kurikulum where idkurikulum='$skss[idkurikulum]'");
	  $sksskr = mysql_fetch_array($skskr);
	  echo"$sksskr[idkurikulum]";
	  ?>" class="form-control">      </td>
    </tr>
    <tr valign="middle" bgcolor="#F0F0F0">
      <td height="37">Jumlah / QTY </td>
      <td><input name="jumlah" type="text" id="jumlah" size="10" value="<?php echo"$skss[jumlah]"; ?>" class="form-control"></td>
    </tr>
    <tr valign="middle" bgcolor="#F0F0F0">
      <td height="37">Waktu</td>
      <td><select name="jam" class="form-control">
	  <?php
	  $jam = mysql_query("select * from jam");
	  while($jamm = mysql_fetch_array($jam)){
	  if($jamm['jam']==$skss['jam']){
	  echo"<option value=$jamm[jam] selected>$jamm[jam]</option>";
	  }else{
	   echo"<option value=$jamm[jam]>$jamm[jam]</option>";
	  }
	  }
	  
	  
	  ?>
	  
	  
	  </select>
      *(00.00</td>
    </tr>
    <tr valign="middle" bgcolor="#F0F0F0">
      <td height="37">Hari</td>
      <td><select name="hari" id="hari" class="form-control">
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
    <tr valign="middle" bgcolor="#F0F0F0">
      <td height="37">Kelas</td>
      <td><select name="kelas" id="kelas" class="form-control">
        <option>kelas...........</option>
        <?php
		     $kls = mysql_query("select * from kelas");
  while($klss = mysql_fetch_array($kls)){
  if($klss['idkelas']==$skss['idkelas']){
  echo"<option value=$klss[idkelas] selected>$klss[kelas]</option>";
  }else{
  echo"<option value=$klss[idkelas]>$klss[kelas]</option>";
  
  }
  }
		   
		   ?>
      </select></td>
    </tr>
    <tr valign="middle" bgcolor="#F0F0F0">
      <td height="37">Kuota mahasiswa </td>
      <td><input name="kuota" type="text" id="kuota" size="15" value="<?php echo"$skss[kuota]"; ?>" class="form-control"></td>
    </tr>
    <tr valign="middle" bgcolor="#F0F0F0">
      <td height="37">Ruang</td>
      <td><select name="kdruang" id="kdruang" class="form-control">
        <option>ruang..................</option>
        <?php $r = mysql_query("select * from ruang");
		while($rr = mysql_fetch_array ($r)){
		if($rr['idruang']==$skss['idruang']){
		$g = mysql_query("select * from gedung where idgedung='$rr[idgedung]'");
		$gg = mysql_fetch_array ($g);
		echo"<option value=$rr[idruang] selected>$gg[gedung] / $rr[idruang]</option>";
		}else{
		$g = mysql_query("select * from gedung where idgedung='$rr[idgedung]'");
		$gg = mysql_fetch_array ($g);
		echo"<option value=$rr[idruang]>$gg[gedung] / $rr[idruang]</option>";
		}
		}?>
      </select></td>
    </tr>
    <tr valign="middle" bgcolor="#F0F0F0">
      <td height="37">APP</td>
      <td><select name="app" id="app" class="form-control">
        <option value="1">AKTIF</option>
        <option value="2">TIDAK AKTIF</option>
      </select></td>
    </tr>
    <tr valign="middle" bgcolor="#F0F0F0">
      <td height="37">BATAS DOSEN </td>
      <td><input name="batas" type="date" id="batas" value="<?php echo"$skss[batas_dosen]"; ?>" class="form-control"></td>
    </tr>
    <tr align="center" valign="middle" bgcolor="#F0F0F0">
      <td height="37" colspan="2"><input name="simpan" type="submit" id="simpan" value="edit data sks" class="btn btn-success"></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
}
?>