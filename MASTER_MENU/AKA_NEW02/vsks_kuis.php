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
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
</head>


<body>
<h4>Hasil Kuisioner</h4>
<hr color="#FF8040">
<?php
switch(@mysql_real_escape_string($_GET['sks'])){
case'edit_sks':
include"edit_sks.php";
break;
case'edit_praktikum':
include"edit_praktikum.php";
break;

}
?>

  <form name="form1" method="post" action="">
    <table width="500" class="table">
      <tr>
        <td width="94"><select name="dosen" class="form-control">
          <option>pilih dosen......................</option>
          <?php
		$dsn = mysql_query("select * from dosen order by nama asc");
  while($dsnn = mysql_fetch_array($dsn)){
 
  echo"<option value=$dsnn[iddosen]><b>$dsnn[nama] / $dsnn[iddosen];</option>";
  
  }
		?>
        </select></td>
        <td width="94"><select name="sm" id="sm" class="form-control">
          <?php
		$sm = mysql_query("select * from semester order by idmain asc ");
  while($smm = mysql_fetch_array($sm)){


  
  
  echo"<option value=$smm[idsemester]>$smm[semester] &nbsp; $thh[ajaran] &nbsp; $smm[ajaran]  </option>";
  }

		?>
        </select></td>
        <td width="107"><input name="cari" type="submit" id="cari2" value="cek hasil" class="btn btn-warning"></td>
      </tr>
    </table>
  </form>
  <table width="100%" border="0" align="center" bgcolor="#CECECE" class="table table-bordered">
  <tr align="center" bgcolor="#E4E4E4">
    <td width="145" height="35">Kode Mapel</td>
    <td width="186">Judul</td>
    <td width="124">Semester</td>
    <td width="167">Jumlah </td>
    <td width="120">Action</td>
  </tr>
  <?php
    if(isset($_POST['cari'])){
 
   $dosen= @mysql_real_escape_string($_POST['dosen']);
     $sm= @mysql_real_escape_string($_POST['sm']);
  $sks = mysql_query("select * from sks where iddosen='$dosen' and idsemester='$sm' ");
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
 
  <tr align="center" bgcolor="#FFFFFF">
    <td height="50"><?php echo"<a href=#>$skss[idsks]</a><br>$kjj[kejuruan]<br>$skss[idkelas]"; ?></td>
    <td><?php echo"<b>$krr[judul]</b><br>
	<u>Oleh &nbsp; $dsnn[nama]</u>
	"; ?></td>
    <td><?php echo"$smm[semester]<br><b><font color=blue>$skss[hari]</font><br> $skss[jam]  WIB<br>
	Ruang &nbsp; $skss[idruang]
	</b>"; ?></td>
    <td><?php echo"$skss[jumlah]&nbsp;SKS<br>Kuota &nbsp; $skss[kuota]"; ?><br>
    </td>
    <td>
	<a href="#" onClick="MM_openBrWindow('<?php echo"../SU_admin/hasil_kuis_01.php?idsks=$skss[idsks]&idfk=$kjj[idfakultas]#$skss[idsks]"; ?>','','scrollbars=yes,width=800,height=800')" class="btn btn-info">Hasil</a>&nbsp;
	</td>
  </tr>
   <?php
  }
  }
   
  ?>


</table>


</body>
</html>
<?php
}
?>