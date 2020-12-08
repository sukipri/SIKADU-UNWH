<html>
<head>
<title>Upload page</title>
</head>
<body>
Cetak Transkrip Mahasiswa / <a href="?aka=CARI_PERIODE_CETAK"><i class="fa fa-clone"></i>&nbsp;Cetak Periode Wisuda</a> / <a href="?aka=import_ijasah"><i class="fa fa-clone"></i>&nbsp;Import No Ijasah</a> <br>
<br>
 **pastikan Format field CSV seperti dibawah ini
 <table width="100%"  border="0" class="table table-bordered">
  <tr>
  <td width="7%">NIM</td>
        <td width="15%">NAMA</td>
        <td width="3%">TL</td>
        <td width="6%">TGLL</td>
        <td width="9%">NIRL</td>
        <td width="9%">TGL NIRL</td>
        <td width="11%">NIRM</td>
        <td width="9%">No IJS</td>
        <td width="11%">STATUS_MHS </td>
        <td width="10%">ASAL_STUDI </td>
        <td width="7%">PERIODE</td>
        <td width="3%">IPK</td>
  </tr>
</table>

<br>
<div class="container">
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Uploading CSV ONLINE -no ijasah-</h3>
  </div>
  <div class="panel-body">
    <?php
//KONEKSI.. 
include"css.php";
include"../sc/conek.php";
 
if (isset($_POST['submit'])) {//Script akan berjalan jika di tekan tombol submit..
 
//Script Upload File..
    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
        echo "<h1>" . "File ". $_FILES['filename']['name'] ." Berhasil di Upload" . "</h1>";
        echo "<h2>Menampilkan Hasil Upload:</h2>";
        readfile($_FILES['filename']['tmp_name']);
    }
 
    //Import uploaded file to Database, Letakan dibawah sini..
    $handle = fopen($_FILES['filename']['tmp_name'], "r"); //Membuka file dan membacanya
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
	//$sme = mysql_query("select * from semester where aktif='2'");
	//$smee = mysql_fetch_array($sme);
	
        @$import="update mahasiswa set nirl='$data[4]', tgl_nirl='$data[5]',nirm='$data[6]', nomor_ijasah='$data[7]' where idmahasiswa='$data[0]'"; //data array sesuaikan dengan jumlah kolom pada CSV anda mulai dari “0” bukan “1”
        mysql_query($import) or die(mysql_error());
		}
		 //Melakukan Import
   fclose($handle); //Menutup CSV file
    echo "<br><strong>Import data selesai.</strong>";
    
}else { //Jika belum menekan tombol submit, form dibawah akan muncul.. ?>
 
<!-- Form Untuk Upload File CSV-->
   Silahkan masukan file csv yang ingin diupload <br /> 
   <form enctype='multipart/form-data' action='' method='post'>
    Cari CSV File anda:<br />
    <input type='file' name='filename' size='100' class="form-control">
   <input type='submit' name='submit' value='Upload' class="btn btn-success"></form>
 
<?php }  mysql_close(); //Menutup koneksi SQL?>
  </div>
</div>
</div>
</body>
</html><br><br><br>