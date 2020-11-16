<?php //session_start();
 //include_once"../sc/conek.php";

	
	
 ?>
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
<style type="text/css">
<!--
.style1 {
	color: #FF3333;
	font-weight: bold;
}
-->
</style>
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


mysql_query("update user_mhs set username='$un',passuser='$pu',email='$email',namaibu='$namaibu' where idmahasiswa='$uu[idmahasiswa]'");
echo "<script language='javascript'>alert('User mahasiswa berhasil diupdate')</script>";
	echo "<script language='javascript'>window.location = '?mng=edit_akun'</script>";
	exit();
	
	}
?>
<?php

?>
<form action="" method="post" name="form1" onSubmit="MM_validateForm('nim','','R','username','','R','email','','RisEmail','namaibu','','R','passuser','','R');return document.MM_returnValue">
  <table width="100%" border="0" align="center" bgcolor="#00B058" class="table table-bordered table-sm">
    <tr valign="top" bgcolor="#FFFFFF">
      <td colspan="3"><h3 class="badge badge-info">Input User Mahasiswa &nbsp;</h3></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td width="104" height="49">NIM</td>
      <td width="411"><input name="nim" type="text" id="nim" size="40" disabled value="<?php echo"$uu[idmahasiswa]"; ?>" class="form-control"></td>
      <td width="577" rowspan="5"><div class="alert alert-dismissible alert-success">
 	<b>#INFORMASI  PENGISIAN</b>
  <ul>
  <li>Segera ganti Password default anda dengan yang baru 
  <li> Lengkapi alamat email anda 
  <li>Isi nama ibu kandung anda
  <li>Simpan  password sikadu online anda dengan baik 
  </ul>
</div></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="44">Username</td>
      <td><input name="username" type="text" id="username" size="40" value="<?php echo"$uu[username]"; ?>" class="form-control"></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="50">Passuser</td>
      <td><input name="passuser" type="password" id="passuser" size="40" class="form-control"><br>
      <span class="style1">*(Jangan Gunakan Spasi</span></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="50">Email</td>
      <td><input name="email" type="text" id="email" size="40" value="<?php echo"$uu[email]"; ?>" class="form-control"></td>
    </tr>
    <tr valign="middle" bgcolor="#FFFFFF">
      <td height="50">Nama Ibu </td>
      <td><input name="namaibu" type="text" id="namaibu" size="40" value="<?php echo"$uu[namaibu]"; ?>" class="form-control"></td>
    </tr>
    <tr align="right" valign="middle" bgcolor="#FFFFFF">
      <td height="50" colspan="3"><input name="simpan" type="submit" id="simpan" value="Update user mahasiswa" class="btn btn-success"></td>
    </tr>
  </table>
</form>

