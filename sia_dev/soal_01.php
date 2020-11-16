<?php session_start();
 include_once"../sc/conek.php";
	include"css.php";
	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    echo"MENDING KOE LOGIN SEK OG";
	} else {
	$u = mysql_query("select * from user_mhs where idmahasiswa='$_SESSION[namauser]'");
	$uu = mysql_fetch_array($u);
	
 ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script src="../SU_admin/timer.min.js" type="text/javascript"></script>
<script type='text/javascript'>
//<![CDATA[
var seconds = 5600; // Berapa detik waktu mundurnya
function generate() { // Nama fungsi countdownnya
var id;
id = setInterval(function () {
if (seconds < 1){
clearInterval(id);

// Perintah yang akan dijalankan
// apabila waktu sudah habis

}else {
btn.style.display = "none";
menunggu.style.display = "inline";
document.getElementById('tunggu').innerHTML = --seconds;
}
}, 1000);}
//]]>
</script>
<title>KUISIONER</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	padding-top: 70px;
}
.style1 {font-size: 24px}
.style2 {font-size: 18px}
-->
</style>
</head>

<body>
<?php
	$tahun = @mysql_real_escape_string($_GET['tahun']);
	$kdmhs=@mysql_real_escape_string($_GET['kdmhs']);
	$idsks=@mysql_real_escape_string($_GET['idsks']);
	$kdsks=@mysql_real_escape_string($_GET['kdsks']);
 	
	  $sks01 = mysql_query("select * from sks where idsks='$idsks' ");
$skss01 = mysql_fetch_array($sks01);
  $kr = mysql_query("select * from kurikulum where idkurikulum='$skss01[idkurikulum]' ");
$krr = mysql_fetch_array($kr);
$bs = mysql_query("select sum(nilai) as nl from bank_soal where idsks='$idsks'");
$bss = mysql_fetch_array($bs);


?>
<?php 
$bs_mhs = mysql_query("select * from bank_jawab_mhs where idmahasiswa='$uu[idmahasiswa]' and idsks='$idsks'");
$bss_mhs = mysql_num_rows($bs_mhs);
if($bss_mhs > 0){
echo"<center><b>Anda sudah Membuat Soal Ini</b></center>";
}else{
?>
<center>
<h3>CBT-Q </h3>
<?php echo"<b>$krr[judul]<br>$krr[juduleng]</b><br>"; ?>
	Jumlah Nilai <?php echo"$bss[nl]"; ?><br>
	
</center>
<hr color="#0066CC"> 
<form name="form1" method="post"  action="#sukses"><br> <div class="navbar navbar-inverse navbar-fixed-top" ><center>
<input name="simpan" type="submit" class="style1" id="simpan" value="upload Jawaban">
</center></div><br>


<?php


?>

  
  <table width="100%" border="0" align="center" bgcolor="#00F279" class="table table-bordered">
  
<?php
 $kuis = mysql_query("select * from bank_soal where idsks='$idsks'");
 $i =1;
	  while($kuiss = mysql_fetch_array($kuis)){

	   //$cek_kuis = mysql_num_rows($kuis);
	    // if($cek_kuis<=0){
		 
		// echo"<h2>MAAF KUSIONER BELUM DI UPLOAD</h2>";
		 //}else{
?>
  <tr>
    <td width="523" bgcolor="#FFFFFF"><?php  echo"<span class=style2>$kuiss[soal]</span>"; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">
      <p>
        <label>A
        <input type="radio" name="<?php echo"isi$i"; ?>" value="<?php echo"A"; ?>">
    <?php echo"$kuiss[A]"; ?></label>
        <br>
       <label>B
        <input type="radio"name="<?php echo"isi$i"; ?>" value="<?php echo"B"; ?>">
    <?php echo"$kuiss[B]"; ?></label>
        <br>
		<label>C
		  <input type="radio" name="<?php echo"isi$i"; ?>" value="<?php echo"C"; ?>">
    <?php echo"$kuiss[C]"; ?></label>
	<br>
	<label>D
	  <input type="radio" name="<?php echo"isi$i"; ?>" value="<?php echo"D"; ?>">
    <?php echo"$kuiss[D]"; ?></label>
	<br>
	<label>E
	  <input type="radio" name="<?php echo"isi$i"; ?>" value="<?php echo"E"; ?>">
    <?php echo"$kuiss[E]"; ?></label>
	<br> <input name="<?php //echo"kuis$i"; ?>" type="hidden" value="<?php //echo"$kuiss[idkuis]"; ?>" >
	  <input name="<?php echo"kuiss$i"; ?>" type="hidden" value="<?php echo"$kuiss[idbank_soal]"; ?>" >
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
mysql_query("insert into bank_jawab_mhs(idbank_soal,idmahasiswa,jwb,idsks)values('$nimMhs','$uu[idmahasiswa]','$nilai','$idsks')");
   
} 
?>
<div id="sukses">
  <div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Well done!</strong> Jawaban Berhasil diupload 
</div>
</div>
	<?php
}
?>
 <?php
 //}
 }
 ?></form>
</body>
</html>


<?php
}
?>