<?php session_start();
 include_once"../sc/conek.php";

	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
	//$u = mysql_query("select * from user where namauser='$_SESSION[namauser]'");
	//$uu = mysql_fetch_array($u);
 ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>GLOBAL SEMESTER SYSTEM</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
$kdfak = @mysql_real_escape_string($_GET['kdfak']);
$fak = mysql_query("select * from kejuruan where idkejuruan='$kdfak'");
		$fakk = mysql_fetch_array($fak);
		 $mhs = mysql_query("select * from mahasiswa where idkejuruan='$kdfak'");
//$mhss = mysql_fetch_array($mhs);
		 $jum = mysql_num_rows($mhs);
		 ?>
		 
<form name="form1" method="post" action="">
  <table width="100%" border="0">
    <tr>
      <td><?php  echo"<h3>$fakk[kejuruan]/$fakk[idkejuruan]/$jum&nbsp;mahasiswa</h3>";?></td>
    </tr>
    <tr>
      <td><hr>
          <select name="sm" id="select">
            <option>pilihh semester........</option>
            <?php 
	  $sem = mysql_query("select * from semester  order by idsemester asc limit 100");
	  while($semm = mysql_fetch_array($sem)){
	  $thn = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$semm[idtahun_ajaran]'");
	  $thnn = mysql_fetch_array($thn);
	    if($mhss['idsemester']==$semm['idsemester']){echo"<option value=$semm[idsemester] selected>$semm[semester]&nbsp; $thnn[ajaran]&nbsp;$semm[ajaran]</option>";
		}else{
	  echo"<option value=$semm[idsemester]>$semm[semester]&nbsp; $thnn[ajaran]&nbsp;$semm[ajaran]</option>";
	  }
	  }
	  ?>
          </select>
          <input name="pindah" type="submit" id="pindah" value="pidah semester"></td>
    </tr>
  </table>
  <?php
  if(isset($_POST['pindah'])){
  $sm = @$_POST['sm'];
  mysql_query("update mahasiswa set idsemester='$sm' where idkejuruan='$kdfak'");
   echo "<script language='javascript'>alert('SEMESTER BERHASIL DIPINDAH')</script>";
	echo "<script language='javascript'>window.location = 'gsemester2.php?kdfak=$fakk[idkejuruan]'</script>";
	exit();
  
  }
  
  ?>
</form>
</body>
</html>
<?php
}
?>