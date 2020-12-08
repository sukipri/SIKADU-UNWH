<?php //session_start();
 include_once"../sc/conek.php";
 include"css.php";

	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
	$u = mysql_query("select * from akademik where namauser='$_SESSION[namauser]'");
	$uu = mysql_fetch_array($u);
	
	
 ?>
 <?php if($uu['akses']==2){ ?>
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

<body>
<h3>Rekap Registrasi Mahasiswa <hr>
</h3>
<?php
include"grafik.php";
?>
<table width="600" border="0" class="table">
    <tr>
      <td width="288"><?php
$kj = mysql_query("select * from kejuruan order by kejuruan asc limit 200000");
  $no = 1;
$kjj = mysql_fetch_array($kj);
 
  $mhs = mysql_query("select * from mahasiswa where idkejuruan='$kjj[idkejuruan]' ");
 	$mhss = mysql_fetch_array($mhs);
	
	?>
        <div class="alert alert-dismissible alert-info">
          <button type="button" class="close" data-dismiss="alert">X</button>
      <?php echo"<center><h4>Semester Aktif &nbsp; $mhss[idsemester]</h4></center>"; ?> </div></div></td>
      <td width="302">  <div class="alert alert-dismissible alert-warning">
          <button type="button" class="close" data-dismiss="alert">X</button>
		  <?php   $mhstot = mysql_query("select * from mahasiswa  ");
 	$totmhs = mysql_num_rows($mhstot);
	$ty = number_format($totmhs,"0","",".");
	 echo"<h4>Total Mahasiswa  &nbsp;$ty</h4>"; ?> 
	 </div></div>
	 </td>
    </tr>
    <tr>
      <td><div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">X</button>
		  <?php   $mhstot1 = mysql_query("select * from mahasiswa where krs='1' ");
 	$totmhs1 = mysql_num_rows($mhstot1);
	$ty1 = number_format($totmhs1,"0","",".");
	 echo"<h4>Total Mahasiswa Belum KRS &nbsp;$ty1</h4>"; ?> 
	 </div></div></td>
      <td><div class="alert alert-dismissible alert-success">
          <button type="button" class="close" data-dismiss="alert">X</button>
		  <?php   $mhstot2 = mysql_query("select * from mahasiswa where krs='2' ");
 	$totmhs2 = mysql_num_rows($mhstot2);
	$ty2 = number_format($totmhs2,"0","",".");
	 echo"<h4>Total Mahasiswa Sudah KRS &nbsp;$ty2</h4>"; ?> 
	 </div></div></td>
    </tr>
    <tr>
      <td colspan="2">
	  <b><i>Statistik Per Tahun Ajaran</i></b><br>
	  <?php 
	  $tha = mysql_query("select * from tahun_ajaran order by idtahun_ajaran asc");
	  while($thaa = mysql_fetch_array($tha)){
	  $mhsth = mysql_query("select * from mahasiswa where idtahun_ajaran='$thaa[idtahun_ajaran]' ");
 	$mhsthh = mysql_num_rows($mhsth);
	$tyh = number_format($mhsthh,"0","",".");
	  
	   ?>
	  <a class="btn btn-primary btn-sm"><?php echo"$thaa[ajaran] : $tyh"; ?></a>
	  <?php
	  }
	  ?>	  </td>
    </tr>
    <tr>
      <td colspan="2">
	  <b><i>Statistik Per tahun dan Per Prodi</i></b><br>
	  <?php 
	  $tha2 = mysql_query("select * from tahun_ajaran order by idtahun_ajaran asc");
	  while($thaa2 = mysql_fetch_array($tha2)){
	
	  
	   ?>
	   <br> <br>
	 <div class="well well-sm">
<?php echo"$thaa2[ajaran]"; ?>
</div>
	  <?php
	  $kjt2 = mysql_query("select * from kejuruan order by idkejuruan asc");
	  while($kjtt2 = mysql_fetch_array($kjt2)){
	    $mhsth2 = mysql_query("select * from mahasiswa where idtahun_ajaran='$thaa2[idtahun_ajaran]' and idkejuruan='$kjtt2[idkejuruan]' ");
 	$mhsthh2 = mysql_num_rows($mhsth2);
	$tyh2 = number_format($mhsthh2,"0","",".");
	  ?>
	<span class="label label-success"><?php echo"$kjtt2[kejuruan] : $tyh2"; ?></span>
	  <?php
	  }
	  }
	  ?>
	  </td>
    </tr>
</table>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="?bu=pem_kul">SMT</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
      
       
		 <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Semester<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
		    <?php
  $sm = mysql_query("select * from semester order by idmain asc");
			while($smm = mysql_fetch_array($sm)){
			
			
			
			
  ?>
            <li><a href="?aka=belumkrs&krs=semes<?php echo"&idsm=$smm[idsemester]"; ?>" class="btn btn-default"><?php echo"$smm[semester]"; ?></a></li>
            <?php
 }
 ?>
           
          </ul>
        </li>
      </ul>
    
   
    </div>
  </div>
</nav>



<?php
	switch(@$_GET['krs']){
	default:
	
?>
<table width="100%" class="table table-bordered">
<?php
  $kj = mysql_query("select * from kejuruan order by idkejuruan asc limit 200000");
  $no = 1;
  while($kjj = mysql_fetch_array($kj)){
  $fak = mysql_query("select * from fakultas where idfakultas='$kjj[idfakultas]'");
  $fakk = mysql_fetch_array($fak);
  $mhs = mysql_query("select * from mahasiswa where idkejuruan='$kjj[idkejuruan]' ");
  $jum_mhs = mysql_num_rows($mhs);
 
  $mhs1 = mysql_query("select * from mahasiswa where idkejuruan='$kjj[idkejuruan]' and mhs='3' ");
  $jum_mhs1 = mysql_num_rows($mhs1);

 
  ?>
  <tr align="center" class="success">
    <td width="4%">NO</td>
    <td width="12%">KEJURUAN</td>
    <td width="20%">JML MHS REG.ADMIN</td>
    <td width="10%">CUTI</td>
    <td width="13%">JML ISI KRS</td>
    <td width="19%">BELUM ISI KRS </td>
    <td width="13%">ACC KRS </td>
    <td width="9%">BELUM ACC KRS </td>
  </tr>
   
  <tr align="center">
    <td><?php echo"$no"; ?></td>
    <td><?php echo"$kjj[kejuruan]"; ?></td>
    <td><?php echo"$jum_mhs"; ?></td>
    <td><?php ?></td>
    <td><?php
	$mhs3 = mysql_query("select * from mahasiswa where idkejuruan='$kjj[idkejuruan]'  and krs='2'");
	$mhss = mysql_num_rows($mhs3);
	//if($hjj > 0 ){
	//echo"<b><center>Sudah krs";
	//}else{
	//echo"Belum";
	//} 
	echo"<a href=# onClick=MM_openBrWindow('krson.php?idfak=$kjj[idkejuruan]','','scrollbars=yes,width=600,height=600')>$mhss</a>";
  
	 ?></td>
    <td><?php 
		$ht = $jum_mhs - $mhss;
		echo"<a href=# onClick=MM_openBrWindow('krsoff.php?idfak=$kjj[idkejuruan]','','scrollbars=yes,width=600,height=600')>$ht</a>";
		?></td>
    <td>
	<?php 
	$mhs4 = @mysql_query("select * from mahasiswa where acc='2' and idkejuruan='$kjj[idkejuruan]'");
	$mhss4 = @mysql_num_rows($mhs4);
	echo"$mhss4";
	?>	</td>
    <td><?php 
	$mhs5 = @mysql_query("select * from mahasiswa where acc='1' and st='2' and idkejuruan='$kjj[idkejuruan]'");
	$mhss5 = @mysql_num_rows($mhs5);
	echo"$mhss5";
	@$percen = $mhss4 / $mhss ;
	$hitpercen = $percen * 100;
	//krs
	$percen1 = $mhss / $jum_mhs ;
	$hitpercen1 = $percen1 * 100;
	$bulat = ceil($hitpercen);
	$bulat1 = ceil($hitpercen1);
	?></td>
  </tr>
  <tr align="left">
    <td colspan="8">
	<span class="label label-primary">ACC KRS<?php echo"&nbsp;$bulat%";?></span>
	<div class="progress progress-striped">
  <div class="progress-bar progress-bar-primary" style="width: <?php echo"$bulat%";?>"></div>
</div>
</div>
<span class="label label-success">Sudah KRS<?php echo"&nbsp;$bulat1%";?></span>
<div class="progress progress-striped">
  <div class="progress-bar progress-bar-success" style="width: <?php echo"$bulat1%";?>"></div>
</div></td>
  </tr>
  <?php
  $no++;
  }
  ?>
</table>
<?php
break;
case'semes':

?>
<table width="100%" class="table table-bordered">
  <tr align="center">
    <td width="10%">NO</td>
    <td width="22%">KEJURUAN</td>
    <td width="22%">JML MHS REG.ADMIN</td>
    <td width="12%">CUTI</td>
    <td width="14%">JML ISI KRS</td>
    <td width="14%">BELUM ISI KRS</td>
    <td width="14%"> ACC KRS</td>
    <td width="14%">BELUM ACC KRS</td>
  </tr>
   <?php
  $kj = mysql_query("select * from kejuruan order by kejuruan asc limit 200000");
  $no = 1;
  while($kjj = mysql_fetch_array($kj)){
  $fak = mysql_query("select * from fakultas where idfakultas='$kjj[idfakultas]'");
  $fakk = mysql_fetch_array($fak);
  
  $mhs = mysql_query("select * from mahasiswa where idkejuruan='$kjj[idkejuruan]' ");
  $jum_mhs = mysql_num_rows($mhs);
 
  $mhs1 = mysql_query("select * from mahasiswa where idkejuruan='$kjj[idkejuruan]' and mhs='3' ");
  $jum_mhs1 = mysql_num_rows($mhs1);

 
  ?>
  <tr>
    <td><?php echo"$no"; ?></td>
    <td><?php echo"$kjj[kejuruan]"; ?></td>
    <td><?php echo"$jum_mhs"; ?></td>
    <td><?php ?></td>
    <td><?php
	$idsm = @$_GET['idsm'];
	$mhs3 = mysql_query("select * from krs_tahun where idkejuruan='$kjj[idkejuruan]'  and krs='2' and idsemester='$idsm'");
	$mhss = mysql_num_rows($mhs3);
	//if($hjj > 0 ){
	//echo"<b><center>Sudah krs";
	//}else{
	//echo"Belum";
	//} 
	echo"<a href=# onClick=MM_openBrWindow('krson.php?idfak=$kjj[idkejuruan]','','scrollbars=yes,width=600,height=600')>$mhss</a>";
  
	 ?></td>
    <td><?php 
		$ht = $jum_mhs - $mhss;
		echo"<a href=# onClick=MM_openBrWindow('krsoff.php?idfak=$kjj[idkejuruan]','','scrollbars=yes,width=600,height=600')>$ht</a>";
		?></td>
    <td>    <?php 
	$mhs4 = mysql_query("select * from krs_tahun where acc='2' and idkejuruan='$kjj[idkejuruan]' and idsemester='$idsm'");
	$mhss4 = mysql_num_rows($mhs4);
	echo"$mhss4";
	?></td>
    <td><?php 
	$mhs5 = mysql_query("select * from krs_tahun where acc='1' and idkejuruan='$kjj[idkejuruan]' and idsemester='$idsm'");
	$mhss5 = mysql_num_rows($mhs5);
	echo"$mhss5";
	//$percen = $mhss4 / $mhss ;
	//$hitpercen = $percen * 100;
	//krs
	//$percen1 = $mhss / $jum_mhs ;
	//$hitpercen1 = $percen1 * 100;
	//$bulat = ceil($hitpercen);
	//$bulat1 = ceil($hitpercen1);
	?>	</td>
  </tr>
  <?php
  $no++;
  }
  ?>
</table>
<?php
}
?>


</body>
</html>
<?php }else{ echo"<h3>Akses ditolak</h3>"; } ?>
<?php
}
?>
