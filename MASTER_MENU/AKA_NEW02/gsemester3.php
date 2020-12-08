<?php session_start();
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
<title>GLOBAL SEMESTER SYSTEM</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
//$kdfak = @mysql_real_escape_string($_GET['kdfak']);
//$fak = mysql_query("select * from kejuruan where idkejuruan='$kdfak'");
		//$fakk = mysql_fetch_array($fak);
		 //$mhs = mysql_query("select * from mahasiswa where idkejuruan='$kdfak'");
//$mhss = mysql_fetch_array($mhs);
		// $jum = mysql_num_rows($mhs);
		 ?>
		 
<form name="form1" method="post" action="">
  <table width="100%" border="0" class="table table-bordered">
    <tr>
      <td colspan="2"><?php  //echo"<h3>$fakk[kejuruan]/$fakk[idkejuruan]/$jum&nbsp;mahasiswa</h3>";?></td>
    </tr>
    <tr>
      <td>          <select name="sm" id="select" class="form-control">
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
      </td>
      <td><input name="pindah" type="submit" id="pindah" value="pidah semester" class="btn btn-success"></td>
    </tr>
    <tr>
      <td colspan="2"> <div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">X </button>
  Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede 
</div></td>
    </tr>
  </table>
  <?php
  if(isset($_POST['pindah'])){
  $sm = @$_POST['sm'];
  mysql_query("update mahasiswa set idsemester='$sm' ");
   mysql_query("update mahasiswa set krs='1' ");
   echo "<script language='javascript'>alert('SEMESTER BERHASIL DIPINDAH')</script>";
	echo "<script language='javascript'>window.location = 'gsemester3.php?'</script>";
	exit();
  
  }
  
  ?>
</form>
</body>
</html>
<?php
}
?>