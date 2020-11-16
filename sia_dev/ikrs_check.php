<?php //session_start();
 //include_once"../sc/conek.php";

	
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
</head>

<body>
<h4>  INPUT KRS  &nbsp; ( <?php 
$rkm = mysql_query("select * from rekamsemester where idmahasiswa='$mhss[idmahasiswa]' order by idrekamsemester asc limit 1");
$rkmm = mysql_fetch_array($rkm);
//echo"BATAS SKS $rkmm[bsks]";
?>)</h4>
<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">INFORMASI PENGISIAN </button>
  <ul>
  <li>Periksa dan cek ketersediaan mata kuliah yang di tawarkan pada semester aktif program studi anda.
  <li>Klik Tambah KRS pada mata kuliah yang sesuai dengan kelas yang anda pilih.
  <li>KRS anda akan di ACC oleh dosen wali anda, Koordinasikan dengan dosen wali anda
<li>Lihat KRS anda yang sudah di setujui oleh dosen wali pada menu preview KRS
<li>Periksalah dengan seksama, jangan sampai ada kesalahan input 
</ul>
</div>
<hr color="#FF8040">
<?php if($mhss['st']==1){

echo"<center><h1>MAAF SEGERA MELAKUKAN REGISTRASI!</h1></center>";
}elseif($mhss['st']==3){
echo"<center><h1>MAAF KRS SUDAH DITUTUP SILAHKAN HUBUNGI BAGIAN AKADEMIK</h1></center>";
}else{

 ?>
 <?php
	if(isset($_POST['simpan'])){
	$idpr = @mysql_real_escape_string($_GET['idpr']);
	$krt = @mysql_real_escape_string($_GET['krt']);
	//$idsks = @mysql_real_escape_string($_GET['idsks']);
	$km = mysql_query("select * from krs where idsks='$idpr' and idmahasiswa='$mhss[idmahasiswa]' ");
	$kmm = mysql_fetch_array($km);
	$kr_k  = mysql_query("select * from kurikulum where idkurikulum='$krt'");
	$krr_k = mysql_fetch_array($kr_k);
	$jdl = "VALIDASI KRS";
 	 $tgl = date("d-m-Y");
	$isi_mymail = "Mahasiswa dengan nama $mhss[nama] NIM $mhss[idmahasiswa] Meminta VALIDASI MAKUL <b>$krr_k[judul]</b>  <b>$tgl</b> <br><a 						href=?mng=perwalian_mini&kddsn=$mhss[iddosen]#$mhss[idmahasiswa]>Klik Disini</a> ";
	if($kmm['idsks']==$idpr){
 	echo "<script language='javascript'>alert('SKS  Sudah Pernah Di ambil')</script>";
	echo "<script language='javascript'>window.location = '?mng=ikrs&kdmhs=$kdmhs'</script>";
	exit();
	}else{
	 include"hijack.php";
	mysql_query("insert into krs(idkrs,idsks,idmahasiswa,idsemester)values('','$idpr','$kdmhs','$mhss[idsemester]')");
	mysql_query("insert into mymail(untuk,dari,judul,isi,tgl,nama)values('$mhss[iddosen]','$mhss[idmahasiswa]','$jdl','$isi_mymail','$tgl','$mhss[nama]')");
 ?>
 		<center><h4><img src="../img/check-32.png"> &nbsp; Makul berhasil Ditambahkan</h4></center>
	<?php } }  ?>
<form name="form1" method="post" action="">
<table width="100%" border="0" align="center" bgcolor="#33FF99" class="table table-bordered">
  <tr align="center" bgcolor="#33FF99">
    <td width="142" height="35">Kode Mata Kuliah</td>
    <td width="237">Judul</td>
    <td width="156">Semester</td>
    <td width="56">Jumlah </td>
    <td width="102">Action</td>
  </tr>
   
  <?php
  
  $psks = mysql_query("select * from sks where idkejuruan='$mhss[idkejuruan]' and idsemester='$mhss[idsemester]' order by idsemester asc limit 2000");
  $no = 1;
  while($pskss = mysql_fetch_array($psks)){
 //$sks = mysql_query("select * from sks where idsks='$pskss[idsks]' ");
//$skss = mysql_fetch_array($sks);

 $dsn = mysql_query("select * from dosen where iddosen='$pskss[iddosen]'");
$dsnn = mysql_fetch_array($dsn);
$kj = mysql_query("select * from kejuruan where idkejuruan='$pskss[idkejuruan]'");
$kjj = mysql_fetch_array($kj);
$kr  = mysql_query("select * from kurikulum where idkurikulum='$pskss[idkurikulum]'");
$krr = mysql_fetch_array($kr);
  $sm = mysql_query("select * from semester where idsemester='$pskss[idsemester]'");
$smm = mysql_fetch_array($sm);
  
  ?>
  <tr align="center" bgcolor="#FFFFFF">
    <td height="50"><?php echo"<a href=#>$pskss[idsks]</a><br>$kjj[kejuruan]<br>$pskss[idkelas]"; ?></td>
    <td><?php echo"<div id=$psks[idsks]><b>$krr[judul]</b><br><i>$krr[juduleng]</i><br>
	<u>Oleh &nbsp; $dsnn[nama]</u><br>Dari &nbsp;$smm[semester]</div>
	"; ?></td>
    <td><?php echo"$smm[semester]<br><b><font color=blue>$pskss[hari]</font><br> $pskss[jam]  WIB <br>	Ruang &nbsp; $pskss[idruang]</b>"; ?></td>
    <td><?php echo"Sks &nbsp; $pskss[jumlah]<br>kuota&nbsp; $pskss[kuota]"; ?><br><?php 
	$mhs = mysql_query("select * from krs where idsks='$pskss[idsks]'");
	$jummhs = mysql_num_rows($mhs);
	
	echo"Diambil &nbsp; $jummhs "; ?></td>
    <td>
	
	<?php
	 $krs01 = mysql_query("select * from krs where idsks='$pskss[idsks]'   ");
	$krss01 = mysql_fetch_array($krs01);
	$kuota = mysql_num_rows($krs01);
	 $krs1 = mysql_query("select * from krs where idsks='$pskss[idsks]' and idmahasiswa='$kdmhs'   ");
	$krss1 = mysql_fetch_array($krs1);
	
	//script mahal//
	//if($kuota==$pskss['kuota']){//
	
	//echo"<h3><font color=red>FULL</font></h3>";//
	
	
	
	

	
	if($krss1['app']==2){
	echo"sudah di ambil";

	}elseif($krss1['app']==1){
	echo"Sedang Diproses";
	}else{
	?>
	<input name="<?php echo"cek$no"; ?>" type="checkbox" value="<?php echo"$pskss[idsks]"; ?>">
	<?php
	}
	
	
	
	?>
	
	</td>
  </tr>
  <?php
  
  }
  }
  ?>
  <tr bgcolor="#FFFFFF">
    <td colspan="3" align="center" valign="top">&nbsp; </td>
    <td align="center" valign="top"><input type="submit" class="btn btn-success" name="simpan" value="S.I.M.P.A.N"></td>
    <td>&nbsp;</td>
  </tr>
</table>
<br><center>
</center>

</form>


</body>
</html>
<?php
}

?>