<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
		?>
<body>
        <div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">Uploading Biaya CSV ONLINE</h3>
      </div>
      <div class="panel-body">
        <?php
    //KONEKSI.. 
 
     
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
        $sme = mysql_query("select * from semester where aktif='2'");
        $smee = mysql_fetch_array($sme);
            $import="INSERT into biaya_02 (idkejuruan,TGL,REMARK,NIM,KODE,BANK,NOMINAL,THN,upload) values('$data[8]','$data[6]','$data[9]','$data[0]','$data[5]','$data[11]','$data[7]','$data[10]',NOW())"; //data array sesuaikan dengan jumlah kolom pada CSV anda mulai dari “0” bukan “1”
            mysql_query($import) or die(mysql_error()); //Melakukan Import
        }
     
        fclose($handle); //Menutup CSV file
        echo "<br><strong>Import data selesai.</strong>";
        
    }else { //Jika belum menekan tombol submit, form dibawah akan muncul.. ?>
     
    <!-- Form Untuk Upload File CSV-->
       Silahkan masukan file csv yang ingin diupload<br /> 
       <form enctype='multipart/form-data' action='' method='post'>
        Cari CSV File anda:<br />
        <input type='file' name='filename' style="max-width:20rem;" accept="application/msexcel" class="form-control">
        <br>
       <input type='submit' name='submit' value='Upload' class="btn btn-success"></form>
     
    <?php } mysql_close(); //Menutup koneksi SQL?>
      </div>
    </div>
</body>
<?php } ?>