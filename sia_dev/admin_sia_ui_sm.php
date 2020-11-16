<?php session_start();
 include_once"./../sc/conek.php";
 include_once"css_sm.php";


	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
	$u = mysql_query("select iduser_mhs,idmahasiswa,username,akses from user_mhs where idmahasiswa='$_SESSION[namauser]'");
				$uu = mysql_fetch_assoc($u);
		$mhs = mysql_query("select * from mahasiswa where idmahasiswa='$uu[idmahasiswa]'");
		$mhss = mysql_fetch_assoc($mhs);
		$kej = mysql_query("select idkejuruan,idfakultas,kejuruan FROM kejuruan where idkejuruan='$mhss[idkejuruan]'");
		$kejj = mysql_fetch_assoc($kej);
		$fkl = mysql_query(" select idfakultas,fakultas FROM fakultas where idfakultas='$kejj[idfakultas]'");
		$fkll = mysql_fetch_assoc($fkl);
		$dsn2= mysql_query("select iddosen,idkejuruan,nama FROM dosen where iddosen='$mhss[iddosen]'");
		$dsnn2 = mysql_fetch_assoc($dsn2);
		$kdmhs = $mhss['idmahasiswa'];
			$thmhs = mysql_query("select * from theme_mhs where idmahasiswa='$uu[idmahasiswa]'");
		$thmhss = mysql_fetch_assoc($thmhs);
			$numthmhs = mysql_num_rows($thmhs);
	
 ?>
 <?php
		if($thmhss['theme']==1){
		header("location:admin_sia_ui.php");
		}elseif($thmhss['theme']==3){
		header("location:admin_sia_ui_so.php");
		}else{
		
	
?>
 <?php
include"../sc/s_o.php";
?>
<?php

if($uu['akses']==13){


?>

<?php
	if(isset($_GET['idth'])){
		$idth = @mysql_real_escape_string($_GET['idth']);
		if($numthmhs <=0){
		mysql_query("insert into theme_mhs(idmahasiswa)values('$mhss[idmahasiswa]')");
		mysql_query("update theme_mhs set theme='$idth' where idmahasiswa='$uu[idmahasiswa]'");
	}else{
	mysql_query("update theme_mhs set theme='$idth' where idmahasiswa='$uu[idmahasiswa]'");
	}
	}

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
 <?php
   $ft = mysql_query("select * from foto_mhs where idmahasiswa='$mhss[idmahasiswa]' order by idfoto desc limit 1");
  $ftt  = mysql_fetch_array($ft);
  @mysql_query("update user_mhs set online='2' where idmahasiswa='$uu[idmahasiswa]'");
  ?>
<body bgcolor="#CCCCCC">
 <style type="text/css">
<!--
body { padding-top: 55px; }
body,td,th {
	
}
.bgatas{background-color:#0053A6; color:#FFFFFF;}
-->
</style>
<nav class="navbar navbar-default navbar-fixed-top bgatas">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="?">Beranda</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
       
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">MAHASISWA <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="?mng=PROFIL_MAHASISWA">Edit profil mahasiswa</a></li>
            <li><a href="?mng=AKUN">Edit akun</a></li>
            <li><a href="#" onClick="MM_openBrWindow('u_foto/index.php','','scrollbars=yes,width=500,height=500')"><span>Edit Gambar</span></a></li>
			<li><a href="#" onClick="MM_openBrWindow('<?php echo"ctk_cv_mhs.php?kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=600,height=800')"><span>Cetak CV </span></a></li>
            <li role="separator" class="divider"></li>
            <li> <a href='?mng=CARI_KELAS'><span>Input KRS </span></a></li>
			<li><a href='?mng=vkrs'><span>Preview KRS </span></a></li>
			<li> <a href="<?php echo"ctk_tran_sks_try_urut.php?kdmhs=$mhss[idmahasiswa]"; ?>" target="_blank"><span>Print Trankrip </span></a></li>
			  <li> <?php

echo"<a href=# onClick=MM_openBrWindow('ctk_krs_mhs.php?kdmhs=$kdmhs','','scrollbars=yes,width=900,height=800') ><span>Print KRS</span></a>";

?></a></li>
  <li role="separator" class="divider"></li>
           <li><a href='admin_sia_ui_sm.php?mng=tagihan'><span>Tagihan</span></a></li>
 <li><a href='admin_sia_ui_sm.php?mng=pembayaran'><span>Biaya</span></a></li>
 <li><a href="admin_sia_ui_sm.php?mng=cetak_kartu">Cetak Kartu </a></li>
          </ul>
        </li>
      </ul>
	   <ul class="nav navbar-nav">
	       <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">INFORMASI<span class="caret"></span></a>
          <ul class="dropdown-menu">
            
          
            <li><a href='?mng=v_ikhs'><span>Preview KHS</span></a></li>
			   <li><a href='#' onClick="MM_openBrWindow('<?php echo"soal_00.php?kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=1200,height=800')"><span>CBT-Q</span></a></li>
			    <li><a href='?mng=infoaka'><span>Info Akademik</span></a></li> 
				  <li><a href='?mng=vfaq'><span>FAQ</span></a></li>
          </ul>
        </li>
		   </ul>
	   
		   <ul class="nav navbar-nav">
	       <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">MyMail <?php 
	$m = mysql_query("select sum(baca) as bc from mymail where untuk='$mhss[idmahasiswa]' and baca='1'   ");
	$mm = mysql_fetch_array($m);
	echo"(<b>$mm[bc]</b>)"; ?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            
          
            <li><a href="?mng=newmail">NEW MESSAGE</a></li>
			<li><a href="?mng=inbox">INBOX</a></li>
          </ul>
        </li>
		   </ul>
        <form class="navbar-form navbar-left" role="search" method="post" action="?mng=icari">
        <div class="form-group">
          <input name="cari" type="text" class="form-control" id="cari" size="26" placeholder="cari teman">
        </div>
       <input name="cari_data" type="submit" class="btn btn-info" id="cari_data">
      </form>
      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Lainnya <span class="caret"></span></a>
          <ul class="dropdown-menu">
		    <li><a href="">THEME</a></li>
             <li role="separator" class="divider"></li>
                    <li class="active"><a href="?idth=1">Boot.Watch&nbsp;[1.0] <span class="badge">KO</span></a></li>
			  <li class="active"><a href="?idth=2">Boot.Mix&nbsp;[1.0] <span class="badge">OK</span></a></li>
			   <li class="active"><a href="?idth=3">Boot.OS&nbsp;[1.0] <span class="badge">KO</span></a></li>
             <li role="separator" class="divider"></li>
          
            <li><a href="metu.php">LOG OUT</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container">
	<?php include"SWITCH_MENU.php"; ?>

</div>
</body>
</html>
<?php
}else{

echo"<h1><center>MAAF AKSES TIDAK DI IJINKAN<br><a href=index.php>klik untuk kembali</a></center></h1>";
}

?>
<?php
}
}
?>