<?php //session_start();
 include_once"../sc/conek.php";

	
	
 ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>DAFTAR AKUN SIKDAU</title>
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
$nim = @mysql_real_escape_string($_POST['nim']);
$un = @mysql_real_escape_string($_POST['username']);
$email = @mysql_real_escape_string($_POST['email']);
$namaibu = @mysql_real_escape_string($_POST['namaibu']);
$pu = @md5(mysql_real_escape_string($_POST['passuser']));
$ck = mysql_query("select * from user_mhs where idmahasiswa='$nim'");
$ck_cek = mysql_num_rows($ck);
if($ck_cek > 0){
echo "<script language='javascript'>alert('Maaf NIM $nim sudah ada')</script>";
	echo "<script language='javascript'>window.location = '?pilih=muser&mu=imahasiswa'</script>";
	exit();
	}else{
mysql_query("insert into user_mhs(iduser_mhs,idmahasiswa,username,passuser,email,namaibu)values('','$nim','$un','$pu','$email','$namaibu')");
echo "<script language='javascript'>alert('User mahasiswa berhasil disimpan')</script>";
	echo "<script language='javascript'>window.location = '?pilih=muser&mu=imahasiswa'</script>";
	exit();
	}
	}
?>
<?php

?>
<form action="" method="post" name="form1" onSubmit="MM_validateForm('nim','','R','username','','R','email','','RisEmail','namaibu','','R','passuser','','R');return document.MM_returnValue">
  <table width="489" border="0" align="center" bgcolor="#00B058">
    <tr valign="top" bgcolor="#FFFFFF">
      <td colspan="2"><h3>Input User Mahasiswa &nbsp;</h3></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td width="117" height="49">NIM</td>
      <td width="362"><input name="nim" type="text" id="nim" size="40"></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="44">Username</td>
      <td><input name="username" type="text" id="username" size="40"></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="50">Passuser</td>
      <td><input name="passuser" type="password" id="passuser" size="40"></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="50">Email</td>
      <td><input name="email" type="text" id="email" size="40"></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="50">Nama Ibu </td>
      <td><input name="namaibu" type="text" id="namaibu" size="40"></td>
    </tr>
    <tr align="right" valign="middle" bgcolor="#FFFFFF">
      <td height="50" colspan="2"><input name="simpan" type="submit" id="simpan" value="simpan user mahasiswa"></td>
    </tr>
  </table>
</form>

</body>
</html>
