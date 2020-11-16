<?php session_start();
 include_once"./../sc/conek.php";
 include_once"./css.php";
	

	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
	$u = mysql_query("select * from user_mhs where idmahasiswa='$_SESSION[namauser]'");
	$uu = mysql_fetch_array($u);
	$mhs = mysql_query("select * from mahasiswa where idmahasiswa='$uu[idmahasiswa]'");
	$mhss = mysql_fetch_array($mhs);
	$kej = mysql_query("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
	$kejj = mysql_fetch_array($kej);
	$fkl = mysql_query(" select * from fakultas where idfakultas='$kejj[idfakultas]'");
	$fkll = mysql_fetch_array($fkl);
	$dsn2= mysql_query("select * from dosen where iddosen='$mhss[iddosen]'");
	$dsnn2 = mysql_fetch_array($dsn2);
	$kdmhs = $mhss['idmahasiswa'];
		$thmhs = mysql_query("select * from theme_mhs where idmahasiswa='$uu[idmahasiswa]'");
	$thmhss = mysql_fetch_array($thmhs);
		$numthmhs = mysql_num_rows($thmhs);
		
	
 ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<style>
	#pesan{ 
	padding-right:1px;
	padding-left:0px;
	margin-bottom:10px;
	
	}

</style>
<body>
<table width="100%"  border="0" class="table table-bordered">
  <tr>
    <td width="78%"><div style="overflow:auto;width:auto;height:400px;padding:10px;border:1px solid #eee" id="pesan">
	chat<br>chat<br>chat<br>chat<br>chat<br>chat<br>chat<br>chat<br>chat<br>chat<br>chat<br>chat<br>chat<br>chat<br>chat<br>chat<br>chat<br>chat<br>chat<br>chat<br>chat<br>chat<br>chat<br>chat<br>chat<br>chat<br>chat<br>chat<br>chat<br>chat<br>chat<br>chat<br>chat<br>chat<br>
	</div>
	
	</td>
    <td width="22%">&nbsp;</td>
  </tr>
  <tr>
    <td><div id="dwn"> 
      <form name="form1" method="post" action="">
        <textarea name="textarea" class="form-control"></textarea>
      </form>
    </div></td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php
}
?>