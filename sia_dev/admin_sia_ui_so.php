<?php session_start();
 include_once"./../sc/conek.php";
 include_once"css_os.php";
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
	
 ?>
 <?php
		if($thmhss['theme']==1){
		header("location:admin_sia_ui.php");
		}elseif($thmhss['theme']==2){
		header("location:admin_sia_ui_sm.php");
	}else{
?>
 <?php
include"./../sc/s_o.php";
include"../sc/s_o_2.php";
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
<body>
 <style type="text/css">
<!--
body { padding-bottom: 55px; }
body,td,th {
	
}
.bgatas{background-color:#000000; color:#FFFFFF;}
-->
</style>
<nav class="navbar navbar-default navbar-fixed-bottom bgatas">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	
	  <ul class="nav navbar-nav">
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cubes"></i>&nbsp; <span class="caret"></span></a>
          <ul class="dropdown-menu">
 <li><a href="?mng=profil"><i class="fa fa-group"></i>&nbsp;Profil</a></li>
 <li><a href="?mng=vkelas"><i class="fa fa-align-justify"></i>&nbsp; Entry KRS</a></li>
  <li><a href="?mng=vkrs"><i class="fa fa-paste"></i>&nbsp; Preview KRS</a></li>
   <li><a href="?mng=v_ikhs"><i class="fa fa-list-alt"></i>&nbsp; KHS</a></li>
   <li><a href="?mng=infoaka"><i class="fa fa-file-audio-o"></i>&nbsp; Info Akademik</a></li>
    <li><a href="?mng=vfaq"><i class="fa fa-file-text-o"></i>&nbsp; FAQ</a></li>
	<li> <a href='?mng=pembayaran'><i class="fa fa-money"></i>&nbsp;Biaya</a></li>
	 <li><a href='?mng=cetak_kartu'><i class="fa fa-fax"></i>&nbsp;Cetak Kartu</a></li>
	 <li><a href='#' onClick="MM_openBrWindow('<?php echo"ctk_cv_mhs.php?kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=600,height=800')" ><i class="fa fa-clone"></i>&nbsp;Cetak CV</a></li>
</ul>
        </li>
      </ul>
     <form class="navbar-form navbar-left" role="search" method="post" action="?mng=icari">
        <div class="form-group">
          <input name="cari" type="text" class="form-control" id="cari" size="55" placeholder="cari teman">
        </div>
       <input name="cari_data" type="submit" class="btn btn-info btn-xs" id="cari_data">
      </form>
      <ul class="nav navbar-nav navbar-right">
        
		 <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-commenting-o"></i><?php 
	$m = mysql_query("select sum(baca) as bc from mymail where untuk='$mhss[idmahasiswa]' and baca='1'   ");
	$mm = mysql_fetch_array($m);
	echo"<b>$mm[bc]</b>"; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
		 <li> <a href='?mng=newmail'>New Message</a></li>
		   <li> <a href='?mng=inbox'> INBOX</a></li>
		 
          </ul>
        </li>
		
		
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-puzzle-piece"></i>&nbsp; <span class="caret"></span></a>
          <ul class="dropdown-menu">
		 <li><a href="?idth=1">Boot.Watch&nbsp;[1.0] <span class="badge">KO</span></a></li>
			  <li><a href="?idth=2">Boot.Mix&nbsp;[1.0] <span class="badge">KO</span></a></li>
			   <li><a href="#build#">Boot.OS&nbsp;[1.0] <span class="badge">OK</span></a></li>
          
          </ul>
        </li>
		
		 <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-gears"></i>&nbsp; <span class="caret"></span></a>
          <ul class="dropdown-menu">
		 <li><a href="?mng=edit_akun"><i class="fa fa-child"></i>&nbsp;Setting User</a></li>
			<li class="active"><a href="metu.php">Log Out</a></li>
          
          </ul>
        </li>
		
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>




<div class="container">
<?php
  switch(@mysql_real_escape_string($_GET['mng'])){
  default:
  		echo"<h2>Boot.OS</h2>";
		include"bot_os/awal.php";
 break;
  case'profil':
 include"edit_profil.php";
  break;
   case'ikrs':
 include"ikrs.php";
  break;
  case'vkelas':
  include"vkelas.php";
  break;
    case'vkrs':
 include"vkrs.php";
  break;
    case'ikrs_praktikum':
 include"ikrs_praktikum.php";
  break;
   case'v_ikhs':
 include"v_ikhs.php";
  break;
    case'mlap':
 include"mlap.php";
  break;
   case'edit_akun':
 include"emahasiswa.php";
  break;
   case'infoaka':
 include"infoaka.php";
  break;
   case'cetak_kartu':
 include"cetak_kartu.php";
  break;
    case'vfaq':
 include"../sc/vfaq.php";
  break;
   case'inbox':
 include"inbox.php";
  break;
   case'viewinbox':
 include"viewinbox.php";
  break;
   case'newmail':
 include"newmail.php";
  break;
    case'icari':
  include"icari.php";
  break;
  case'pembayaran':
  include"pembayaran.php";
  break;
  
  }
  
  ?>

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