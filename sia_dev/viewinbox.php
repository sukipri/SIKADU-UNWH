<?php //session_start();
 include_once"../sc/conek.php";
 //include_once"css.php";

	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
	$u = mysql_query("select * from user_mhs where idmahasiswa='$_SESSION[namauser]'");
	$uu = mysql_fetch_array($u);
	$mhs = mysql_query("select * from mahasiswa where idmahasiswa='$uu[idmahasiswa]'");
	$mhss = mysql_fetch_array($mhs);
	$kdmhs = $mhss['idmahasiswa'];
 ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>


<body>
  <?php
  $dari = @mysql_real_escape_string($_GET['dari']);
  $untuk = @mysql_real_escape_string($_GET['untuk']);
  	$ms_update = mysql_query("update mymail set baca='2' where dari='$dari' and  untuk='$kdmhs'  ");
  	$ms = mysql_query("select * from mymail where dari='$dari' and  untuk='$kdmhs' order by tgl asc  ");
	while($mms = mysql_fetch_array($ms)){
	?>
<table width="600" border="0" class="table">
  <tr class="success">
    <td><div id="dwn_<?php echo"$mms[idmain]"; ?>"><?php echo"<b>Subject:&nbsp; $mms[judul]</b><br><b>FROM:&nbsp;<a href=?mng=newmail&iduntuk=$mms[dari]>$mms[dari]</a>-$mms[nama]</b><br>$mms[tgl]"; ?></div> </td>
  </tr>
  <tr>
    <td height="102"><?php echo"$mms[isi]"; ?> </td>
  </tr>
  <?php
  }
  ?>
  <tr>
    <td height="49">*(Untuk membalas pesan klik langsung pada ID pengirim ( <strong>FROM: </strong> XXXX)</td>
  </tr>
</table>

</body>
</html>
<?php
}
?>