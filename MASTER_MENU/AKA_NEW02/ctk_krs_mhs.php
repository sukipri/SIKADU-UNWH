<?php session_start();
 include_once"../sc/conek.php";
	include"css.php";
	include"../sc/bar128.php";
	include"../sc/phpqrcode2/qrlib.php";

$tempdir = "temp/"; //<-- Nama Folder file QR Code kita nantinya akan disimpan
if (!file_exists($tempdir))#kalau folder belum ada, maka buat.
    mkdir($tempdir);
	
	
	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
	$u = mysql_query("select * from user where namauser='$_SESSION[namauser]'");
	$uu = mysql_fetch_array($u);
		$u4 = mysql_query("select * from user_dsn where iddosen='$_SESSION[namauser]'");
	$uu4 = mysql_fetch_array($u4);
	$u1 = mysql_query("select * from akademik where namauser='$_SESSION[namauser]'");
	$uu1 = mysql_fetch_array($u1);
	
 ?>
 
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>CETAK KRS</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body,td,th {
	font-size: 12px;
}
.tg{height:auto; width:150px;}
-->
</style></head>

<body>
<?php
$kdmhs = @mysql_real_escape_string($_GET['kdmhs']);
$idsm = @mysql_real_escape_string($_GET['idsm']);
$mhs = mysql_query("select * from mahasiswa where idmahasiswa='$kdmhs'");
$mhss = mysql_fetch_array($mhs);
$kl = mysql_query("select * from kelas where idkelas='$mhss[idkelas]' ");
$kll = mysql_fetch_array($kl);
$krs = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]' and idsemester='$idsm' ");
$krss = mysql_fetch_array($krs);
  $sks = mysql_query("select * from sks where idsks='$krss[idsks]' ");
$skss = mysql_fetch_array($sks);
  $sm = mysql_query("select * from semester where idsemester='$skss[idsemester]'");
$smm = mysql_fetch_array($sm);
 $th = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$smm[idtahun_ajaran]'");
$thh = mysql_fetch_array($th);
 $dsn = mysql_query("select * from dosen where iddosen='$skss[iddosen]'");
$dsnn = mysql_fetch_array($dsn);
$kj = mysql_query("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
$kjj = mysql_fetch_array($kj);
 $dsn2 = mysql_query("select * from dosen where iddosen='$mhss[iddosen]'");
$dsnn2 = mysql_fetch_array($dsn2);
?>
<table width="100%" border="0" align="center">
  <tr>
    <td width="213" align="right"><img src="../img/logokecil.gif" width="52" height="52"></td>
    <td width="353" align="center"><strong>KARTU RENCANA STUDI 
	<?php echo"<br>$smm[ajaran] TAHUN $thh[ajaran]<br>UNIVERISTAS WAHID HASYIM";?>
	</strong></td>
    <td width="184" align="center">
	</td>
  </tr>
  <tr>
    <td colspan="3"><hr></td>
  </tr>
</table>



<table width="100%" border="0" align="center">
  <tr>
    <td width="47%"><table width="478" border="0">
      <tr>
        <td width="80"><strong>NIM</strong></td>
        <td width="12"><strong>:</strong></td>
        <td width="372"><?php echo"<b>$mhss[idmahasiswa]</b>"; ?>          </td>
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
</table>
<br><table width="100%" border="0" align="center" bgcolor="#000000" class="table table-bordered">
  <tr align="center" bgcolor="#FFFFFF" class="success">
    <td width="4%" height="31"><strong>NO</strong></td>
    <td width="11%"><strong>KODE MK </strong></td>
    <td width="26%"><strong>NAMA MAKUL </strong></td>
    <td width="10%"><strong>KELAS</strong></td>
    <td width="5%"><strong>SKS</strong></td>
    <td><strong>DOSEN</strong></td>
    <td><strong>JADWAL</strong></td>
  </tr>
  <?php
   $no=1;
  $krs1 = mysql_query("select * from krs where idmahasiswa='$kdmhs' and idsemester='$idsm' and app='2' ");
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
  <tr align="center" bgcolor="#FFFFFF">
    <td height="31"><?php echo"$no"; ?></td>
    <td><?php echo"$krr[idsk]"; ?></td>
    <td><?php echo"$krr[judul]"; ?></td>
    <td><?php echo"$skss1[idkelas]"; ?></td>
    <td><?php echo"$krss1[jumlah]"; ?></td>
    <td width="20%"><?php echo"$dsnn1[nama]"; ?></td>
    <td width="24%"><?php echo"$skss1[hari]&nbsp;$skss1[jam]&nbsp;,&nbsp;Ruang &nbsp;$skss1[idruang]"; ?></td>
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
  <tr align="center" bgcolor="#FFFFFF">
    <td height="31"><?php echo"$nop.b"; ?></td>
    <td><?php echo"$skss12[idpraktikum]"; ?></td>
    <td><?php echo"$krr2[judul]"; ?></td>
    <td><?php echo"$kll[idkelas]"; ?></td>
    <td><?php echo"$pkrss1[jumlah]"; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php
  $nop++;
  
  }
  ?>
  <tr align="right" bgcolor="#FFFFFF">
    <td height="31" colspan="4">Total SKS</td>
    <td height="31">
      <?php
	
	$k = mysql_query("select sum(jumlah) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and idsemester='$idsm' ");
	$kk = mysql_fetch_array($k);

	
	
	
	 ?>
      <?php
	$k1 = mysql_query("select sum(jumlah) as krp from p_sks where idmahasiswa='$mhss[idmahasiswa]' and app='2' and idsemester='$idsm'");
	$kk1 = mysql_fetch_array($k1);
	
	
	?>
      <?php
	$ju_krs = $kk['kr'] + $kk1['krp'];
	echo"$ju_krs";
	
	?></td>
    <td height="31" colspan="2">Semarang,<?php $date = date("d/m/Y"); echo"$date"; ?></td>
  </tr>
  
</table>
<br><br><table width="100%" border="0">
  <tr align="center">
    <td width="38%"><strong><?php echo"MAHASISWA<br><br><br><br>$mhss[nama]"; ?></strong></td>
    <td width="16%" rowspan="2"><iframe src="<?php //echo"qrmhs.php?kdmhs=$mhss[idmahasiswa]"; ?>" class="tg"></iframe>
    <p>
      <?php
  //include"../sc/conek.php";
  
 // $kdmhs = @mysql_real_escape_string($_GET['kdmhs']);
//$mhs = mysql_query("select * from mahasiswa where idmahasiswa='$kdmhs'");
//$mhss = mysql_fetch_array($mhs);
//$kl = mysql_query("select * from kelas where idkelas='$mhss[idkelas]' ");
//$kll = mysql_fetch_array($kl);
//$krs = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]' and idsemester='$mhss[idsemester]' ");
//$krss = mysql_fetch_array($krs);
 // $sks = mysql_query("select * from sks where idsks='$krss[idsks]' ");
//$skss = mysql_fetch_array($sks);
//  $sm = mysql_query("select * from semester where idsemester='$skss[idsemester]'");
//$smm = mysql_fetch_array($sm);
// $th = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$smm[idtahun_ajaran]'");
//$thh = mysql_fetch_array($th);
// $dsn = mysql_query("select * from dosen where iddosen='$skss[iddosen]'");
//$dsnn = mysql_fetch_array($dsn);
//$kj = mysql_query("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
//$kjj = mysql_fetch_array($kj);
// $dsn2 = mysql_query("select * from dosen where iddosen='$mhss[iddosen]'");
//$dsnn2 = mysql_fetch_array($dsn2);

	
	

    // how to build raw content - QRCode to call phone number 
     
    //$param = $_GET['kdmhs']; // remember to sanitize that - it is user input! 
     
    // we need to be sure ours script does not output anything!!! 
    // otherwise it will break up PNG binary! 
     
    //ob_start("callback"); 
     
    // here DB request or some processing 
    $codeText = '( NIM '.$kdmhs.")(Nama ".$mhss['nama'].")(SMT ".$mhss['idsemester'].")(Prodi".$kjj['kejuruan'].")"."(UTS- ".$mhss['uts'].")"."(UAS- ".$mhss['uas'].")"."(KRS- ".$mhss['krs'].")"."(MHS- ".$mhss['mhs'].")"; 
     
    // end of processing here 
    //$debugLog = ob_get_contents(); 
   //ob_end_clean(); 
     
    // outputs image directly into browser, as PNG stream 
    //QRcode::png($codeText);
	
	// $isi_teks = get_current_url($_SERVER); //inputan fungsi tadi itu cuma $_SERVER aja
#parameter inputan
//$isi_teks = "Belajar QR Code itu asik";
//$now = date_create('now')->format('Y-m-d H:i:s');
$ack_time = date("A.H-i-s");
$acak = rand(999,000);
$namafile= "$acak.$ack_time.png";
$namafile = "krs-qr-generated.png";
$quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
$ukuran = 5; //batasan 1 paling kecil, 10 paling besar
$padding = 1;
 
QRCode::png($codeText,$tempdir.$namafile,$quality,$ukuran,$padding);
//QRCode::image($codeText,$quality,$ukuran,$padding);

   //QRcode::png('PHP QR Code :)');
	  echo '<img src="temp/uts-qr-generated.png" width="200px" height="150px" >';


	  ?>
    </p></td>
    <td width="46%"><strong><?php echo"
	DOSEN WALI<br><br><br><br><b>$dsnn2[nama]</b>"; ?></strong></td>
  </tr>
  <tr align="center">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>


<?php
}
?>
