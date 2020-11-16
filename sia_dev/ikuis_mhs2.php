<?php session_start();
 include_once"../sc/conek.php";
	include"css.php";
	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    echo"Silahkan Login terlebih dahulu";
	} else {
	$u = mysql_query("select * from user where namauser='$_SESSION[namauser]'");
	$uu = mysql_fetch_array($u);
	
 ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>KUISIONER</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	padding-top: 70px;
}
.style1 {font-size: 24px}
.style3 {color: #FF0000}
-->
</style>
</head>

<body>
<blink> <span class="style3"></span><h3 class="style3"> KUISIONER MAHASISWA (HARAP MENGISI SEMUA PERTANYAAN YANG DISEDIAKAN)</h3> </blink>
<hr color="#0066CC"> <?php
$tahun = @mysql_real_escape_string($_GET['tahun']);
	$kdmhs=@mysql_real_escape_string($_GET['kdmhs']);
	$idsks=@mysql_real_escape_string($_GET['idsks']);
	$kdsks=@mysql_real_escape_string($_GET['kdsks']);
 
?>

<form name="form1" method="post" action=""><br> <div class="navbar navbar-inverse navbar-fixed-top" ><center>
<input name="simpan" type="submit" class="style1" id="simpan" value="upload kuisioner"></center></div><br>

<?php


?>

  
  <table width="100%" border="0" align="center" bgcolor="#00F279" class="table table-bordered">
  
<?php
 $kuis = mysql_query("select * from kuis where idfakultas='$idsks'");
 $i =1;
	  while($kuiss = mysql_fetch_array($kuis)){

	   //$cek_kuis = mysql_num_rows($kuis);
	    // if($cek_kuis<=0){
		 
		// echo"<h2>MAAF KUSIONER BELUM DI UPLOAD</h2>";
		 //}else{
?>
  <tr>
    <td width="558" rowspan="2" bgcolor="#FFFFFF"><?php  echo"<span class=style2>$kuiss[soal]</span>"; ?></td>
    <td bgcolor="#FFFFFF" width="20">5</td>
    <td bgcolor="#FFFFFF" width="20">4</td>
    <td bgcolor="#FFFFFF" width="20">3</td>
    <td bgcolor="#FFFFFF" width="20">2</td>
    <td bgcolor="#FFFFFF" width="20">1</td>
  </tr>
  <tr>
    <td width="20" bgcolor="#FFFFFF">     <input type="radio" name="<?php echo"isi$i"; ?>" value="<?php echo"5"; ?>"></td>
    <td width="20" bgcolor="#FFFFFF">    <input type="radio"name="<?php echo"isi$i"; ?>" value="<?php echo"4"; ?>"></td>
    <td width="20" bgcolor="#FFFFFF">  <input type="radio" name="<?php echo"isi$i"; ?>" value="<?php echo"3"; ?>"></td>
    <td width="20" bgcolor="#FFFFFF">  <input type="radio" name="<?php echo"isi$i"; ?>" value="<?php echo"2"; ?>"></td>
    <td width="20" bgcolor="#FFFFFF">  <input type="radio" name="<?php echo"isi$i"; ?>" value="<?php echo"1"; ?>"></td>
  </tr>
  <tr>
    <td colspan="6" bgcolor="#FFFFFF">
      <input name="<?php //echo"kuis$i"; ?>" type="hidden" value="<?php //echo"$kuiss[idkuis]"; ?>" >
	  <input name="<?php echo"kuiss$i"; ?>" type="hidden" value="<?php echo"$kuiss[idkuis]"; ?>" >
	    <input name="<?php //echo"mhsss$i"; ?>" type="hidden" value="<?php //echo"$mhss[idsemester]"; ?>" >
      </p>  
	   <?php
	$i++;
  }
  
 $jumMhs = $i-1;
  ?> <input name="<?php echo"n"; ?>" type="hidden" value="<?php echo"$jumMhs"; ?>" > </td>
    </tr>
</table>
  <?php
if(isset($_POST['simpan'])){
$jumMhs = @$_POST['n'];
for ($i2=1; $i2<=$jumMhs; $i2++)
{
$nimMhs = @$_POST['kuiss'.$i2];
//$nimMhs2 = @$_POST['mhss'.$i2];
//$nimMhs3 = @$_POST['mhsss'.$i2];
$nilai = @$_POST['isi'.$i2];
$tgl = date("y-m-d");
//$nilai2 = @$_POST['nilaii'.$i2];
//$nilai3 = @$_POST['nilai3'.$i2];
//$nilai4 = @$_POST['nilai4'.$i2];

//mysql_query("update krs set ahr='$nilai' where idkrs='$nimMhs' ");
mysql_query("insert into kuis_jawab(idkuis_jawab,idkuis,idsks,idmahasiswa,jawab,tgl)values('','$nimMhs','$kdsks','$kdmhs','$nilai','$tgl')");
   
} 
echo "<script language='javascript'>alert('KLIK UNTUK MEMPROSES')</script>";
	echo "<script language='javascript'>window.location = 'proses_upload.php'</script>";
	exit();
	
}
?>
 <?php
 //}
 
 ?></form>
</body>
</html>
<?php
}
?>