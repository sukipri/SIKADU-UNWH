<?php //session_start();
 include_once"../sc/conek.php";

	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
	//$u = mysql_query("select * from user where namauser='$_SESSION[namauser]'");
	//$uu = mysql_fetch_array($u);
 ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
</head>
<style>
.btn {
  background: #00D269;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}

.btn:hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
}</style>
<body>
<h3>GLOBAL MOVING SYSTEM</h3>
<hr> 
<table width="648" border="0" bgcolor="#FFC082">
  <tr bgcolor="#FFC082">
    <td width="324" height="37">SEMESTER</td>
    <td width="314">REKAM SEMESTER </td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="40"><?php

 $fak = mysql_query("select * from kejuruan  where idfakultas='$uu[idfakultas]'");
		 while($fakk = mysql_fetch_array($fak)){
		
		 $mhs = mysql_query("select * from mahasiswa where idkejuruan='$fakk[idkejuruan]'");
$mhss = mysql_fetch_array($mhs);
		 
		 echo"
		<a href=# onClick=MM_openBrWindow('gsemester2.php?kdfak=$fakk[idkejuruan]','','scrollbars=yes,width=600,height=300') >$fakk[idkejuruan]&nbsp; / &nbsp;$fakk[kejuruan]&nbsp;$fakk[progdi]</a><br>Semester aktif &nbsp;$mhss[idsemester]<br>";
		
		 
		 }
		 ?></td>
    <td><?php

 $fak = mysql_query("select * from kejuruan  where idfakultas='$uu[idfakultas]'");
		 while($fakk = mysql_fetch_array($fak)){
		
		 $mhs = mysql_query("select * from mahasiswa where idkejuruan='$fakk[idkejuruan]'");
$mhss = mysql_fetch_array($mhs);
		 
		 echo"
		<a href=# onClick=MM_openBrWindow('i_rekamsemester.php?kdjur=$fakk[idkejuruan]','','scrollbars=yes,width=800,height=700') >$fakk[idkejuruan]&nbsp; / &nbsp;$fakk[kejuruan]&nbsp;$fakk[progdi]</a><br>Semester aktif &nbsp;$mhss[idsemester]<br>";
		
		 
		 }
		 ?></td>
  </tr>
</table>
</body>
</html>
<?php
}
?>