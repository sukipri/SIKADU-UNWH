<?PHP
		if (isset($_POST['imp_tagihan'])) {//Script akan berjalan jika di tekan tombol submit..
            
		//Script Upload File..
		if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
			echo "<h5>" . "File ". $_FILES['filename']['name'] ." Berhasil di Upload" . "</h5>";
			echo "<h5>Menampilkan Hasil Upload:</h5>";
			readfile($_FILES['filename']['tmp_name']);
			}
                /* Numbering IDMAIN and JENIS_TAGIHAN */
                    $idmain_no = 1;
                    $idmain_jenis_tagihan = @$sql_escape($_POST['idmain_jenis_tagihan']);
                //--CLOSE--//

			//Import uploaded file to Database, Letakan dibawah sini..
			$handle = fopen($_FILES['filename']['tmp_name'], "r"); //Membuka file dan membacanya
			while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) { 
                $idmain_get_no = "IMP$IDMAIN$idmain_no";
				$import="$in  tb_tagihan_01 (idmain_tagihan_01,idmain_jenis_tagihan,idgelombang,idtahun_ajaran,idkejuruan,kode,kode_urut,kode_kelas,nominal,uploader)values('$idmain_get_no','$idmain_jenis_tagihan','$data[0]','$data[1]','$data[2]','$data[3]','0$data[6]','$data[4]','$data[5]','$uu_bu[iduser_bu]')"; //data array sesuaikan dengan jumlah kolom pada CSV anda mulai dari “0” bukan “1”
				mysql_query($import) or die(mysql_error()); //Melakukan Import
			$idmain_no++; }
		 
			fclose($handle); //Menutup CSV file
			echo "<br><strong>Import data selesai.</strong>";
			
			}else {  }//Jika belum menekan tombol submit, form dibawah akan muncul..  ?>