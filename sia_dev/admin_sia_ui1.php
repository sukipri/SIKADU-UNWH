<?php session_start();
 include_once"./../sc/conek_oop.php";
 include_once"./css.php";
 	$get_db = new database();
	$get_db->conek();

	
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
 <?php include"../sc/s_o_2.php"; ?>
 <?php
		if($thmhss['theme']==2){
		header("location:admin_sia_ui_sm.php");
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


<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>


  <?php
   $ft = mysql_query("select * from foto_mhs where idmahasiswa='$mhss[idmahasiswa]' order by idfoto desc limit 1");
  $ftt  = mysql_fetch_array($ft);
  @mysql_query("update user_mhs set online='2' where idmahasiswa='$uu[idmahasiswa]'");
  ?>
  <style type="text/css">
<!--
body { padding-top: 55px; }
body,td,th {
	
}
-->
</style>
  <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
  <a class="navbar-brand" href="?"><i class="fa fa-home"></i>&nbsp;Beranda</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	 <ul class="nav navbar-nav navbar-left navbar-right">
     <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="	fa fa-bars"></i>&nbsp; <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
		   <li><a href="">THEME </a></li>
		    <li role="separator" class="divider"></li>
			 <li class="active"><a href="?idth=1">Boot.Watch&nbsp;[1.0] <span class="badge">OK</span></a></li>
			  <li class="active"><a href="?idth=2">Boot.Mix&nbsp;[1.0] <span class="badge">KO</span></a></li>
			   <li class="active"><a href="?idth=3">Boot.OS&nbsp;[1.0] <span class="badge">KO</span></a></li>
          
             <li role="separator" class="divider"></li>
			    <li><a href="metu.php">LOGOUT </a></li>
          </ul>
        </li>
      </ul>
	  
	  <ul class="nav navbar-nav navbar-left navbar-right">
     <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-commenting-o"></i>&nbsp;MyMail<?php 
	$m = mysql_query("select sum(baca) as bc from mymail where untuk='$mhss[idmahasiswa]' and baca='1'   ");
	$mm = mysql_fetch_array($m);
	echo"(<b>$mm[bc]</b>)"; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
		 <li> <a href='?mng=newmail'>New Message</a></li>
		   <li> <a href='?mng=inbox'> INBOX</a></li>
		 
          </ul>
        </li>
      </ul>
	  
	  </ul>
	     <form class="navbar-form navbar-left" role="search" method="post" action="?mng=icari">
        <div class="form-group">
          <input name="cari" type="text" class="form-control" id="cari" size="55" placeholder="cari teman">
        </div>
       <input name="cari_data" type="submit" class="btn btn-info" id="cari_data">
      </form>
     
    </div>
  </div>
</nav>
<table width="100%">
  <tr>
    <td width="30%" align="left" valign="top" bgcolor="#FFFFFF"> <div class="alert alert-dismissible alert-warning">
     <center><h4><font color="#999999">{<?php echo"$fkll[fakultas]"; ?> - <?php echo"$kejj[kejuruan]"; ?> - <?php echo"$mhss[idtahun_ajaran]"; ?>}</font></h4> <?php
	
  echo"<b><font color=blue>NIM&nbsp;$uu[idmahasiswa] &nbsp;&nbsp; <br>Login As $mhss[nama]</span></font></b>";
  
  //include"../sc/s_o_2.php";
	
	?>  </center>  
	
<br>

<div class="list-group">
  <a href="#" class="list-group-item active">
  <i class="fa fa-edit"></i>&nbsp;Setting Profil
  </a>
  <a href='?mng=PROFIL_MAHASISWA' class="list-group-item"><span>Edit Profil Mahasiswa</span></a>
  <a href='?mng=AKUN'  class="list-group-item"><span>Edit Akun Sikadu</span></a>
  <a href="#" onClick="MM_openBrWindow('u_foto/index.php','','scrollbars=yes,width=500,height=500')"  class="list-group-item"><span>Edit Gambar</span></a>
   <a href="#" onClick="MM_openBrWindow('<?php echo"ctk_cv_mhs.php?kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=600,height=800')" class="list-group-item"><span>Cetak CV </span></a>
</div>
<div class="list-group">
  <a href="#" class="list-group-item active">
   <i class="fa fa-calendar-plus-o"></i>&nbsp;KRS
  </a>
  <a href='?mng=CARI_MAKUL' class="list-group-item"><span>Input KRS </span></a>
  <a href='admin_sia_ui.php?mng=vkrs' class="list-group-item"><span>Preview KRS<br>*(Download Materi,Print KRS,fast CBT-Q   </span></a>
 <a href="<?php echo"ctk_tran_sks.php?kdmhs=$mhss[idmahasiswa]"; ?>" target="_blank" class="list-group-item"><span>Print Trankrip </span></a>
 <?php

echo"<a href=# rel='nofollow' onClick=MM_openBrWindow('ctk_krs_mhs.php?kdmhs=$kdmhs','','scrollbars=yes,width=900,height=800') class=list-group-item><span>Print KRS</span></a>";

?></a>
</div>
<div class="list-group">
 <a href='admin_sia_ui.php?mng=v_ikhs'  class="list-group-item active"><span><i class="	fa fa-clone"></i>&nbsp;Preview KHS</span></a>
 
 
</div>
<div class="list-group">
 <a href='#' onClick="MM_openBrWindow('<?php echo"soal_00.php?kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=1200,height=800')"  class="list-group-item active"><span><i class="fa fa fa-copyright"></i>&nbsp;CBT-Q</span></a>
 
 
</div>
<div class="list-group">
 <a href='admin_sia_ui.php?mng=infoaka' class="list-group-item active"><span><i class="fa fa-exclamation-circle"></i>&nbsp;Info Akademik</span></a>
  
</div>
<div class="list-group">
 <a href='?mng=vfaq' class="list-group-item active"><span><i class="fa fa-calendar-plus-o"></i>&nbsp;FAQ</span></a>
  
  
</div>
<div class="list-group">
																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																													 <a href='#Coming Soon' class="list-group-item active"><span><i class="fa fa-credit-card"></i>&nbsp;Riwayat Pembayaran</span></a>
 <a href='admin_sia_ui.php?mng=tagihan' class="list-group-item"><span>Tagihan</span></a>
 <a href='admin_sia_ui.php?mng=pembayaran' class="list-group-item"><span>Biaya</span></a>
</div>
<div class="list-group">
 <a href='?mng=cetak_kartu' class="list-group-item active"><span><i class="fa fa-fax"></i>&nbsp;Cetak Kartu</span></a>

</div>
</div>
	<br>
  </td>

    <td width="70%" height="282" colspan="2" valign="top">
	
	<?php
  switch(@mysql_real_escape_string($_GET['mng'])){
  default:
  include"popup.php";
  
 break;
  case'PROFIL_MAHASISWA':
 include"edit_profil.php";
  break;
   case'KRS_PILIHAN':
 include"ikrs.php";
  break;
  case'CARI_KELAS':
  include"vkelas.php";
  break;
    case'vkrs':
 include"vkrs.php";
  break;
   case'v_ikhs':
 include"v_ikhs.php";
  break;
    case'mlap':
 include"mlap.php";
  break;
   case'AKUN':
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
  case'CARI_MAKUL':
  include"icari_krs.php";
  break;
  }
  
  ?>

  </td>
  </tr>
  <tr align="center">
    <td height="21" colspan="3" valign="top">&nbsp;</td>
  </tr>
</table>

<table width="100%" class="table">
  <tr>
    <td height="21" align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" valign="middle" bgcolor="#FFFFFF">&copy; sikadu.unwahas.ac.id <span class="style2">
    <?php
	  include"../sc/s_o.php";
	   echo "&nbsp; //SO&nbsp;<b><font color=blue>".$os; "</font></b>"; ?>
    </span></td>
  </tr>
</table>


<?php
}else{

echo"<h1><center>MAAF AKSES TIDAK DI IJINKAN<br><a href=index.php>klik untuk kembali</a></center></h1>";
}

?>
<?php
}
}
?>

