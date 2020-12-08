	<body>
	<br>
	 Cetak Transkrip Mahasiswa / <a href="?aka=CARI_PERIODE_CETAK"><i class="fa fa-clone"></i>&nbsp;Cetak Periode Wisuda</a>
	 <br><br>
	<div class="panel panel-success" style="max-width:60rem; ">
	  <div class="panel-heading">
		<h4 class="panel-title">Import Nomor Ijasah</h4>
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
		$sme = mysql_query("select * from semester where aktif='2'");
		$smee = mysql_fetch_array($sme);
			$dt = date("d/m/Y");
			$import="UPDATE mahasiswa set nomor_ijasah='$data[7]' where idmahasiswa='$data[0]' "; //data array sesuaikan dengan jumlah kolom pada CSV anda mulai dari “0” bukan “1”
			mysql_query($import) or die(mysql_error()); //Melakukan Import
		}
	 
		fclose($handle); //Menutup CSV file
		echo "<br><strong>Import data selesai.</strong>";
		
	}else { //Jika belum menekan tombol submit, form dibawah akan muncul.. ?>
	 
	<!-- Form Untuk Upload File CSV-->
	   Silahkan masukan file csv yang ingin diupload<br /> 
	   <form enctype='multipart/form-data' action='' method='post'>
		Cari CSV File anda:<br />
		<input type='file' name='filename' size='100' class="form-control">
	   <input type='submit' name='submit' value='Upload' class="btn btn-success"></form>
	 
	<?php } mysql_close(); //Menutup koneksi SQL?>
	  </div>
	</div>
	</body>
