<?php session_start();
 include_once"../sc/conek.php";
	include"css.php";
	include"../sc/bar128.php";
	include"../sc/phpqrcode2/qrlib.php";
	include"hapustemp.php";

$tempdir = "temp/"; //<-- Nama Folder file QR Code kita nantinya akan disimpan
if (!file_exists($tempdir))#kalau folder belum ada, maka buat.
    mkdir($tempdir);
	
	
	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
	$u = mysql_query("select * from user where namauser='$_SESSION[namauser]'");
	$uu = mysql_fetch_array($u);
	
 ?>
<style type="text/css">
<!--
body,td,th {
	font-size: 12px;
}
.tg{height:auto; width:150px;}
-->
</style>
</head>

<body>
<?php
	$kdmhs = @mysql_real_escape_string($_GET['kdmhs']);
	$mhs = mysql_query("select idmahasiswa,idkejuruan,idsemester,idtahun_ajaran,iddosen,idkelas,uts,uas,nama,krs,mhs from mahasiswa where idmahasiswa='$kdmhs'");
	$mhss = mysql_fetch_array($mhs);
	$kl = mysql_query("select * from kelas where idkelas='$mhss[idkelas]' ");
	$kll = mysql_fetch_array($kl);
	$krs = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]' and idsemester='$mhss[idsemester]' ");
	$krss = mysql_fetch_array($krs);
	  $sks = mysql_query("select * from sks where idsks='$krss[idsks]' ");
	$skss = mysql_fetch_array($sks);
	  $sm = mysql_query("select * from semester where idsemester='$mhss[idsemester]'");
	$smm = mysql_fetch_array($sm);
	 $th = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$mhss[idtahun_ajaran]'");
	$thh = mysql_fetch_array($th);
	 $dsn = mysql_query("select * from dosen where iddosen='$skss[iddosen]'");
	$dsnn = mysql_fetch_array($dsn);
	$kj = mysql_query("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
	$kjj = mysql_fetch_array($kj);
	 $dsn2 = mysql_query("select * from dosen where iddosen='$mhss[iddosen]'");
	$dsnn2 = mysql_fetch_array($dsn2);
	 $by_r = mysql_query("select * from biaya_02_rekam where idmahasiswa='$kdmhs' AND app='1' OR app='3' order by kode ASC ");
	$jumlah= mysql_num_rows($by_r); 
?>
<?php

 
 //if($jumlah>=1){ 
if($mhss['uts']==1){
echo"<center><h3>AKTIFKAN KARTU UTS DAHULU</h3><br>*(Silahkan hubungi bagian AKADEMIK</center>";
//}elseif($jumlah<=0){
	}elseif($mhss['uts']==2){
?>
<table width="100%" border="0" align="center">
  <tr>
    <td width="159" align="right"><img src="http://sikadu.unwahas.ac.id/img/logokecil.gif" width="52" height="52"><br></td>
    <td width="464" align="center"><strong>KARTU UJIAN TENGAH SEMESTER <?php 
	$aj = strtoupper($smm['semester']);
	 echo"<br>$aj <br>UNIVERSITAS WAHID HASYIM";//$thh[ajaran]
	 ?>
	</strong></td>
    <td width="110" align="center">&nbsp;</td>
  </tr>
</table>
<hr>
<table width="100%" border="0" align="center" >
  <tr>
    <td width="47%"><table width="478" border="0">
      <tr>
        <td width="80"><strong>NIM</strong></td>
        <td width="12"><strong>:</strong></td>
        <td width="372"><?php echo"<b>$mhss[idmahasiswa]</b>"; ?></td>
      </tr>
      <tr>
        <td><strong>Nama</strong></td>
        <td><strong>:</strong></td>
        <td><?php //echo"<b>$mhss[nama]</b>"; ?>
          <?php $nama=strtoupper($mhss[nama]); echo "<b>$nama</b>";?></td>
      </tr>
    </table></td>
    <td width="53%"><table width="336" border="0">
      <tr>
        <td width="80"><strong>Progdi</strong></td>
        <td width="12"><strong>:</strong></td>
        <td width="230"><?php echo"<b>$kjj[idkejuruan]-$kjj[kejuruan]</b>"; ?></td>
      </tr>
      <tr>
        <td><strong>Dosen Wali </strong></td>
        <td><strong>:</strong></td>
        <td><?php echo"<b>$dsnn2[nama]</b>"; ?></td>
      </tr>
    </table></td>
  </tr>
</table><table width="100%" border="0" align="center" bgcolor="#000000" class="table table-bordered">
  <tr align="center" bgcolor="#FFFFFF">
    <td width="4%" height="23"><strong>NO</strong></td>
    <td width="12%"><strong>KODE MK </strong></td>
    <td width="31%"><strong>NAMA MAKUL </strong></td>
    <td width="9%"><strong>KELAS</strong></td>
    <td width="9%"><strong>SKS</strong></td>
    <td colspan="2"><strong>TTD PENGAWAS</strong></td>
  </tr>
  <?php
   $no=1;
  $krs1 = mysql_query("select * from krs where idmahasiswa='$kdmhs' and idsemester='$mhss[idsemester]' and app='2' ");
while($krss1 = mysql_fetch_array($krs1)){
  $mhs1 = mysql_query("select * from mahasiswa where idmahasiswa='$krss1[idmahasiswa]'");
$mhss1 = mysql_fetch_array($mhs1);
 $sks1 = mysql_query("select * from sks where idsks='$krss1[idsks]' ");
$skss1 = mysql_fetch_array($sks1);
  $sm1 = mysql_query("select * from semester where idsemester='$skss1[idsemester]'");
$smm1 = mysql_fetch_array($sm1);
 $dsn1 = mysql_query("select * from dosen where iddosen='$skss1[iddosen]'");
$dsnn1 = mysql_fetch_array($dsn1);
 $kr = mysql_query("select * from kurikulum where idkurikulum='$skss1[idkurikulum]' ");
$krr = mysql_fetch_array($kr);
  ?>
  <tr align="left" bgcolor="#FFFFFF">
    <td  align="center" height="20"><?php echo"$no"; ?></td>
    <td align="left"><?php echo"$skss1[idkurikulum]"; ?></td>
    <td><?php echo"$krr[judul]<br>"; ?></td>
    <td align="center"><?php echo"$skss1[idkelas]"; ?></td>
    <td align="center"><?php echo"$krss1[jumlah]"; ?></td>
    <td width="18%">&nbsp;</td>
    <td width="17%">&nbsp;</td>
  </tr>
   <?php
 $no++; }
  ?>
  <?php
   $nop=1;
  $pkrs1 = mysql_query("select * from p_sks where idmahasiswa='$kdmhs' and idsemester='$mhss[idsemester]' ");
while($pkrss1 = mysql_fetch_array($pkrs1)){
  $mhs12 = mysql_query("select * from mahasiswa where idmahasiswa='$krss1[idmahasiswa]'");
$mhss12 = mysql_fetch_array($mhs12);
 $sks12 = mysql_query("select * from praktikum where idpraktikum='$pkrss1[idpraktikum]' ");
$skss12 = mysql_fetch_array($sks12);
  $sm12 = mysql_query("select * from semester where idsemester='$skss12[idsemester]'");
$smm12 = mysql_fetch_array($sm12);
 $dsn12 = mysql_query("select * from dosen where iddosen='$skss12[iddosen]'");
$dsnn12 = mysql_fetch_array($dsn12);
 $kr2 = mysql_query("select * from kurikulum where idkurikulum='$skss12[idkurikulum]' ");
$krr2 = mysql_fetch_array($kr2);
  ?>
  <tr align="left" bgcolor="#FFFFFF">
    <td  align="center" height="20"><?php echo"$nop.b"; ?></td>
    <td><?php echo"$skss12[idpraktikum]"; ?></td>
    <td><?php echo"$krr2[judul]"; ?></td>
    <td align="center"><?php echo"$skss[idkelas]"; ?></td>
    <td align="center"><?php echo"$pkrss1[jumlah]"; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php
  $nop++;
  
  }
  ?>
  <tr align="right" bgcolor="#FFFFFF">
    <td height="20" colspan="5">Total  SKS 
	  : <?php
	
	$k = mysql_query("select sum(jumlah) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and idsemester='$mhss[idsemester]' ");
	$kk = mysql_fetch_array($k);

	
	
	
	 ?>	  <?php
	$k1 = mysql_query("select sum(jumlah) as krp from p_sks where idmahasiswa='$mhss[idmahasiswa]' and app='2' and idsemester='$mhss[idsemester]'");
	$kk1 = mysql_fetch_array($k1);
	
	
	?>
	  <?php
	$ju_krs = $kk['kr'] + $kk1['krp'];
	echo"$ju_krs";
	
	?></td>
    <td height="20" colspan="2">Semarang, <?php $date = date("d/m/Y"); echo"$date"; ?></td>
  </tr>
  
</table>
<table width="100%" border="0" class="table table-bordered">
  <tr align="center">
    <td width="28%"  align="left"><ul>Catatan :
        <li>Kartu ujian dianggap sah apabila ada tanda tangan dosen wali &amp; stempel basah fakultas.</li>
        <li>Harap mengupload foto resmi seperti di KTM.</li>
        <li>Kartu ini ASLI jika terdapat tanda QR khusus.</li>
    </ul>
        
   
    <td width="20%"><strong><?php echo"
	DOSEN WALI<br><br><br><br><b>$dsnn2[nama]</b>"; ?></strong></td>
    <td width="20%"><?php
 
    $codeText = '( NIM '.$kdmhs.")(Nama ".$mhss['nama'].")(SMT ".$mhss['idsemester'].")(Prodi".$kjj['kejuruan'].")"."(UTS- ".$mhss['uts'].")"."(UAS- ".$mhss['uas'].")"."(KRS- ".$mhss['krs'].")"."(MHS- ".$mhss['mhs'].")"; 
     
    
$ack_time = date("A.H-i-s");
$acak = rand(999,000);
$namafile= "uts.$kdmhs.$acak.$ack_time.png";


	
$quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
$ukuran = 5; //batasan 1 paling kecil, 10 paling besar
$padding = 1;
 
QRCode::png($codeText,$tempdir.$namafile,$quality,$ukuran,$padding);
//QRCode::image($codeText,$quality,$ukuran,$padding);


   //QRcode::png('PHP QR Code :)');
	  //echo '<img src="temp/$namafile" width="200px" height="150px" >';
		

	  ?>
      <img src="<?php echo 'temp/' . $namafile; ?>" height="150" width="200"/></td>
    <td width="15%"><?php  $ft = mysql_query("select * from foto_mhs where idmahasiswa='$mhss[idmahasiswa]' order by idfoto desc limit 1");
  $ftt  = mysql_fetch_array($ft); ?>
	<?php
	 $ftht = mysql_num_rows($ft);
	 if($ftht==1){
	 ?>
     
     <?php
	 //<a href="../file/  <?php echo"$ftt[foto]"; ">
	?>
	
     <?php
	 echo"<center><img src=http://sikadu.unwahas.ac.id/file/dsncilik_$ftt[foto] class=img-responsive></center>"; 
	 }else{
	 ?>
	 </a>
	  <a href="#" class="btn btn-danger">
	 <?php
	 echo"Foto 3 x 4";
	 }
	 
	 
	 ?></td>
    <td width="14%"><strong><?php echo"MAHASISWA<br><br><br><br>$mhss[nama]"; ?></strong><br>  <?php // echo bar128(stripslashes($mhss['idmahasiswa'])); ?></td>
  </tr>
</table>
<?php
}
?>
</body>
</html>
<?php
}
?>
