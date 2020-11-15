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

if(isset($_POST['simpan'])){
$semester   = @mysql_real_escape_string($_POST['semester']);
$judul   = @mysql_real_escape_string($_POST['judul']);
$eng   = @mysql_real_escape_string($_POST['eng']);
$jumlah  = @mysql_real_escape_string($_POST['jumlah']);
$hari  = @mysql_real_escape_string($_POST['hari']);
$jam  = @mysql_real_escape_string($_POST['jam']);
$kelas  = @mysql_real_escape_string($_POST['kelas']);
$kjur  = @mysql_real_escape_string($_POST['kjur']);
$kdruang  = @mysql_real_escape_string($_POST['kdruang']);


$ack_mpl = rand("88888","99999");
$kj_mpl =  @mysql_real_escape_string($_POST['kd']);
$kr = mysql_query("select * from kurikulum where idkurikulum='$kj_mpl'");
$hkr = mysql_num_rows($kr);
if($hkr >=1){
echo "<script language='javascript'>alert('maaf KODE $kj_mpl sudah di gunakan')</script>";
	echo "<script language='javascript'>window.location = '?pilih=i_kurikulum'</script>";
	exit();
	}else{

mysql_query("insert into kurikulum(idkurikulum,idsemester,idkejuruan,judul,juduleng,status)values('$kj_mpl','$semester','$kjur','$judul','$eng','Y')");
 echo "<script language='javascript'>alert('Kurikulum  Berhasil di simpan ke database')</script>";
	echo "<script language='javascript'>window.location = '?pilih=i_kurikulum'</script>";
	exit();
}
}
$ack_mpl = rand("88888","99999");
$kj_mpl = @"$kjur.$ack_mpl";
?>
<form action="" method="post" name="form1" onSubmit="MM_validateForm('judul','','R','jumlah','','RisNum');return document.MM_returnValue">
  <h3>Input Kurikulum | <a href="?pilih=vkurikulum">view Daftar Kurikulum </a></h3>
  <hr color="#FF8040">
  <table width="100%" border="0" align="center" bgcolor="#FF8000">
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="47">Kode Kurikulum </td>
      <td><input name="kd" type="text" id="kd"></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td width="151" height="47">Semester</td>
      <td width="374"><select name="semester">
        <option>semester......................</option>
        <?php
		$sm = mysql_query("select * from semester");
  while($smm = mysql_fetch_array($sm)){
   $smtj = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$smm[idtahun_ajaran]'");
$smmtj = mysql_fetch_array($smtj);
  echo"<option value=$smm[idsemester]>$smm[semester] &nbsp; $smmtj[ajaran] &nbsp; $smm[ajaran]  </option>";
  }
		?>
      </select></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="54">Kejuruan</td>
      <td><select name="kjur" id="kjur" onChange="javascript:rubah(this)">
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
      <td height="54">Judul</td>
      <td><input name="judul" type="text" id="judul" size="55"></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="51">Judul inggris(english title) </td>
      <td><input name="eng" type="text" id="eng" size="55"></td>
    </tr>
    <tr align="center" valign="middle" bgcolor="#FFFFFF">
      <td height="37" colspan="2"><input name="simpan" type="submit" id="simpan" value="simpan data kurikulum"></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
}
?>