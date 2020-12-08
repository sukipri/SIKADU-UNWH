<?php 
//session_start();
include_once"../sc/conek.php";
include"css.php";
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
<style>
.bgs{background-color:#51A8FF;}
</style>
<body>
<h4>Smart Room *Beta
</h4>
<form name="form1" method="post" action="">
  <table width="600" border="0" class="table">
    <tr>
      <td width="242"><select name="hari" id="hari" class="form-control">
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
      <td width="173"><select name="jam" class="form-control">
        <?php
	  $jam = mysql_query("select * from jam");
	  while($jamm = mysql_fetch_array($jam)){
	 
	   echo"<option value=$jamm[jam]>$jamm[jam]</option>";
	 
	  }
	  
	  
	  ?>
      </select></td>
      <td width="173"><input name="go" type="submit" id="go" value="L.O.O.K"class="btn btn-success"></td>
    </tr>
  </table>
</form>
<hr>


 <?php
 	if(isset($_POST['go'])){
 
 ?>
	
	
 <div class="list-group">
  <?php
  //empire
  $rng = mysql_query("select * from gedung order by idgedung asc limit 2000");
  while($rnng = mysql_fetch_array($rng)){
  ?>
   <a href="#" class="list-group-item active">
   <?php echo"<b><h2>Gedung &nbsp;$rnng[idgedung]</h2></b>"; ?>
  </a>
  <?php 
  	$hari = @$_POST['hari'];
	$jam = @$_POST['jam'];
	$sm = mysql_query("select * from semester where aktif='2'");
	$smm = mysql_fetch_array($sm);
	$sks = mysql_query("select * from sks where hari='$hari' and jam='$jam' and idsemester='$smm[idsemester]'");
	while($skss = mysql_fetch_array($sks)){
	 $dsn = mysql_query("select * from dosen where iddosen='$skss[iddosen]'");
$dsnn = mysql_fetch_array($dsn);
$kj = mysql_query("select * from kejuruan where idkejuruan='$dsnn[idkejuruan]'");
$kjj = mysql_fetch_array($kj);
$kr  = mysql_query("select * from kurikulum where idkurikulum='$skss[idkurikulum]'");
$krr = mysql_fetch_array($kr);
   ?>
 <?php  
 //room
 $rn = mysql_query("select * from ruang where idgedung='$rnng[idgedung]' and idruang='$skss[idruang]'");
  while($rnn = mysql_fetch_array($rn)){ 
  
  ?>
  
  <a href="#" onClick="MM_openBrWindow('../SU_admin/ctk_absen_harian.php<?php echo"?kddsn=$skss[iddosen]&idsks=$skss[idsks]"; ?>','','scrollbars=yes,width=700,height=700')" class="list-group-item success">
  <?php echo"<b>$rnn[idruang]</b><br>Kode Makul &nbsp; $krr[idsk] <br> Makul &nbsp; $krr[judul] <br>Dosen &nbsp; $dsnn[nama] <br>Progdi &nbsp; $kjj[kejuruan]<br>$skss[hari] - $skss[jam]"; ?><br>
    <?php 
	$mhs = mysql_query("select * from krs where idsks='$skss[idsks]' and app='2'");
	$jummhs = mysql_num_rows($mhs);
	echo"Diambil &nbsp; $jummhs Mahasiswa";
	?>
  </a>
 
   <?php } } ?>
   	
<?php
}
?>
</div>
<?php
}
?>



</body>
</html>
<?php
}
?>