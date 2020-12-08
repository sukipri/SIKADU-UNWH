<?php session_start();
	include_once"../sc/conek.php";
	include"css.php";
	  //include"../NEW_CODE/stack_Q.php";
	 // include"../NEW_CODE/GR_01.php";
	  //include"../NEW_CODE/code_rand.php";
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
	$u = mysql_query("select * from akademik where namauser='$_SESSION[namauser]'");
	$uu = mysql_fetch_assoc($u);
	$aka = mysql_query("select * from akademik where idakademik='$uu[idakademik]'");
	$akaa = mysql_fetch_assoc($aka);
	
	//KDMHS
	$kdmhs = $kuu['idku'];
	include"../sc/s_o_2.php";
		$KDMHS = @mysql_real_escape_string($_GET['KDMHS']);
		$KELAS = @mysql_real_escape_string($_GET['KDMHS']);
 ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<h4>Input KRS Mahasiswa <hr></h4>
<?php
	if(isset($_GET['idpr'])){
	$idpr = @mysql_real_escape_string($_GET['idpr']);
	$krt = @mysql_real_escape_string($_GET['krt']);
	//IDSKS
	$idsks = @mysql_real_escape_string($_GET['idsks']);
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
<form name="form1" method="get" action="<?php echo"?KDMHS=$KDMHS&KELAS=$KELAS"; ?>">
  <table width="61%">
    <tr>
      <td width="55%"><input type="text" name="cari" class="form-control" required placeholder="masukan Kode Kurikulum"></td>
      <td width="45%"><input type="submit" name="cari_data" value="C.A.R.I" class="btn btn-warning"></td>
    </tr>
  </table>
</form>
<br>
<table width="100%" class="table table-bordered">
  <tr class="success">
    <td width="32%">#KODE</td>
    <td width="5%">KELAS</td>
    <td width="47%">#JUDUL</td>
    <td width="4%">#SKS</td>
    <td width="12%">#ACTION</td>
  </tr>
  <?php
  	if(isset($_GET['cari_data'])){
		$cari = @$_GET['cari'];
		$v = mysql_query("SELECT * FROM sks where idkurikulum LIKE '%$cari%'");
			while($vv = mysql_fetch_assoc($v)){
  ?>
  <tr>
    <td><?php echo"$vv[idkurikulum]"; ?></td>
    <td><?php echo"$vv[idkelas]"; ?></td>
    <td><?php echo"$vv[judul]"; ?></td>
    <td><?php echo"$vv[jumlah]"; ?></td>
    <td><?php echo"<a href=vmakul.php?KDMHS=$kdmhs&idpr=$vv[idsks]&KELAS=$KELAS&krt=$vv[idkurikulum]>"; ?>
	<img src="../img/add-32.png" width="32" height="32"><?php echo"</a>"; ?></td>
  </tr>
  <?php } } ?>
</table>
</body>
</html>
<?php
}
?>
