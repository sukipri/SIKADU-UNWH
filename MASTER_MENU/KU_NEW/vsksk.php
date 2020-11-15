<?php session_start();
 include_once"../sc/conek.php";
 include"css.php";

	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
	$u = mysql_query("select * from user where namauser='$_SESSION[namauser]'");
	$uu = mysql_fetch_array($u);
	$u1 = mysql_query("select * from akademik where namauser='$_SESSION[namauser]'");
	$uu1 = mysql_fetch_array($u1);
	$u2 = mysql_query("select * from user_bu where username='$_SESSION[namauser]'");
	$uu2 = mysql_fetch_array($u2);
	$u3 = mysql_query("select * from user_ku where username='$_SESSION[namauser]'");
	$uu3 = mysql_fetch_array($u3);
	
 ?>
 	<?php if($uu3['akses']==11){ ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>JADWAL MENGAJAR</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
</head>


<body>

<?php
//switch(@mysql_real_escape_string($_GET['sks'])){
//case'edit_sks':
//include"edit_sks.php";
//break;
//case'edit_praktikum':
//include"edit_praktikum.php";
//break;

//}
?><h3>

<?php

 $kddsn = @mysql_real_escape_string($_GET['kddsn']);
  $dsnid = mysql_query("select * from dosen where iddosen='$kddsn' ");
$dsnnid = mysql_fetch_array($dsnid);
echo"<b>$dsnnid[iddosen]<br>$dsnnid[nama]</b>";
?></h3>
<form name="form2" method="post" action="">
  <table width="234" class="table">
    <tr>
      <td width="168"><select name="cari" id="cari" class="form-control">
        <option>semester......................</option>
        <?php
		$sm = mysql_query("select * from semester order by idmain asc");
  while($smm = mysql_fetch_array($sm)){
  $th = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$smm[idtahun_ajaran]'");
  $thh = mysql_fetch_array($th);
  echo"<option value=$smm[idsemester]>$smm[semester] &nbsp; $thh[ajaran] &nbsp; $smm[ajaran]  </option>";
  }
		?>
      </select></td>
      <td width="526"><input name="cari_data" type="submit" id="cari_data2" value="Submit" class="btn btn-success"></td>
    </tr>
  </table>
</form>
<table width="100%" border="0" align="center" bgcolor="#CECECE" class="table table-bordered">
  <tr align="center" bgcolor="#E4E4E4">
    <td width="142" height="35">Kode Mapel</td>
    <td width="237">Judul</td>
    <td width="156">Semester</td>
    <td width="56">Jumlah </td>
    </tr>
  <?php
  $kddsn = @mysql_real_escape_string($_GET['kddsn']);
 if(isset($_POST['cari_data'])){
	$cari = @$_POST['cari'];
  $sks = mysql_query("select * from sks where iddosen='$kddsn' and idsemester='$cari' order by idsemester asc limit 2000");
  while($skss = mysql_fetch_array($sks)){
  $sm = mysql_query("select * from semester where idsemester='$skss[idsemester]'");
$smm = mysql_fetch_array($sm);
 $dsn = mysql_query("select * from dosen where iddosen='$skss[iddosen]'");
$dsnn = mysql_fetch_array($dsn);
$kj = mysql_query("select * from kejuruan where idkejuruan='$skss[idkejuruan]'");
$kjj = mysql_fetch_array($kj);
$kr  = mysql_query("select * from kurikulum where idkurikulum='$skss[idkurikulum]'");
$krr = mysql_fetch_array($kr);
  
  ?>
  <?php
  
  ?>
  <tr align="center" bgcolor="#FFFFFF">
    <td height="50"><?php echo"$skss[idsks]<br>$kjj[kejuruan]<br>$skss[idkelas]"; ?></td>
    <td><?php echo"<b>$krr[judul]</b><br>
	<u>Oleh &nbsp; $dsnn[nama]</u>
	"; ?></td>
    <td><?php echo"$smm[semester]<br><b><font color=blue>$skss[hari]</font><br> $skss[jam]  WIB<br>
	Ruang &nbsp; $skss[idruang]
	</b>"; ?></td>
    <td><?php echo"$skss[jumlah]&nbsp;SKS<br>Kuota &nbsp; $skss[kuota]"; ?><br>
      <?php 
	$mhs = mysql_query("select * from krs where idsks='$skss[idsks]' and app='2'");
	$jummhs = mysql_num_rows($mhs);
	?>
      <?php echo"<a href=# onClick=MM_openBrWindow('../SU_admin/ctk_absen_harian.php?kddsn=$dsnn[iddosen]&idsks=$skss[idsks]','','scrollbars=yes,width=800,height=800')>"; ?>
      <?php
	
	echo"Diambil &nbsp; $jummhs</a> "; ?></td>
  </tr>
 
  <?php
 
   }
   }
  ?>
</table>


</body>
</html>
<?php //akses akademik ?>
<?php }elseif($uu1['akses']==2){ ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>JADWAL MENGAJAR</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
</head>


<body>

<?php
//switch(@mysql_real_escape_string($_GET['sks'])){
//case'edit_sks':
//include"edit_sks.php";
//break;
//case'edit_praktikum':
//include"edit_praktikum.php";
//break;

//}
?><h3>

<?php

 $kddsn = @mysql_real_escape_string($_GET['kddsn']);
  $dsnid = mysql_query("select * from dosen where iddosen='$kddsn' ");
$dsnnid = mysql_fetch_array($dsnid);
echo"<b>$dsnnid[iddosen]<br>$dsnnid[nama]</b>";
?></h3>
<form name="form2" method="post" action="">
  <table width="234" class="table">
    <tr>
      <td width="168"><select name="cari" id="cari" class="form-control">
        <option>semester......................</option>
        <?php
		$sm = mysql_query("select * from semester");
  while($smm = mysql_fetch_array($sm)){
  $th = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$smm[idtahun_ajaran]'");
  $thh = mysql_fetch_array($th);
  echo"<option value=$smm[idsemester]>$smm[semester] &nbsp; $thh[ajaran] &nbsp; $smm[ajaran]  </option>";
  }
		?>
      </select></td>
      <td width="526"><input name="cari_data" type="submit" id="cari_data2" value="Submit" class="btn btn-success"></td>
    </tr>
  </table>
</form>
<table width="100%" border="0" align="center" bgcolor="#CECECE" class="table table-bordered">
  <tr align="center" bgcolor="#E4E4E4">
    <td width="142" height="35">Kode Mapel</td>
    <td width="237">Judul</td>
    <td width="156">Semester</td>
    <td width="56">Jumlah </td>
    </tr>
  <?php
  $kddsn = @mysql_real_escape_string($_GET['kddsn']);
 if(isset($_POST['cari_data'])){
	$cari = @$_POST['cari'];
  $sks = mysql_query("select * from sks where iddosen='$kddsn' and idsemester='$cari' order by idsemester asc limit 2000");
  while($skss = mysql_fetch_array($sks)){
  $sm = mysql_query("select * from semester where idsemester='$skss[idsemester]'");
$smm = mysql_fetch_array($sm);
 $dsn = mysql_query("select * from dosen where iddosen='$skss[iddosen]'");
$dsnn = mysql_fetch_array($dsn);
$kj = mysql_query("select * from kejuruan where idkejuruan='$skss[idkejuruan]'");
$kjj = mysql_fetch_array($kj);
$kr  = mysql_query("select * from kurikulum where idkurikulum='$skss[idkurikulum]'");
$krr = mysql_fetch_array($kr);
  
  ?>
  <?php
  
  ?>
  <tr align="center" bgcolor="#FFFFFF">
    <td height="50"><?php echo"$skss[idsks]<br>$kjj[kejuruan]<br>$skss[idkelas]"; ?></td>
    <td><?php echo"<b>$krr[judul]</b><br>
	<u>Oleh &nbsp; $dsnn[nama]</u>
	"; ?></td>
    <td><?php echo"$smm[semester]<br><b><font color=blue>$skss[hari]</font><br> $skss[jam]  WIB<br>
	Ruang &nbsp; $skss[idruang]
	</b>"; ?></td>
    <td><?php echo"$skss[jumlah]&nbsp;SKS<br>Kuota &nbsp; $skss[kuota]"; ?><br>
      <?php 
	$mhs = mysql_query("select * from krs where idsks='$skss[idsks]' and app='2'");
	$jummhs = mysql_num_rows($mhs);
	?>
      <?php echo"<a href=# onClick=MM_openBrWindow('../SU_admin/ctk_absen_harian.php?kddsn=$dsnn[iddosen]&idsks=$skss[idsks]','','scrollbars=yes,width=800,height=800')>"; ?>
      <?php
	
	echo"Diambil &nbsp; $jummhs</a> "; ?></td>
  </tr>
 
  <?php
 
   }
   }
  ?>
</table>


</body>
</html>
<?php }else{ echo"<h3>Maaf Akses Ditolak</h3>"; }?>

<?php
}
?>