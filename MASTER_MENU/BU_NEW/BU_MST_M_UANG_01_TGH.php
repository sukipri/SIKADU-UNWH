<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
		?>
<body>

	  <form enctype='multipart/form-data' action='' method='post'>
		<table width="100%" class="table table-borderless" border="0" style="max-width:60rem;">
       <tr>
         <td width="48%">
         
             <div class="card border-primary mb-3" style="max-width: 20rem;">
              <div class="card-header">Uploading Tagihan CSV </div>
            <div class="card-body">
      
          <?php
        //KONEKSI.. 
     
         
        if (isset($_POST['submit'])) {//Script akan berjalan jika di tekan tombol submit..
         	
        //Script Upload File..
            if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
                echo "<i>" . "File ". $_FILES['filename']['name'] ." Berhasil di Upload" . "</i><hr>";
                echo "<b>Menampilkan Hasil Upload:</b>";
                readfile($_FILES['filename']['tmp_name']);
            }
         
            //Import uploaded file to Database, Letakan dibawah sini..
            $handle = fopen($_FILES['filename']['tmp_name'], "r"); //Membuka file dan membacanya
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            $sme = mysql_query("select * from semester where aktif='2'");
            $smee = mysql_fetch_array($sme);
                //$import="INSERT into biaya_02_rekam VALUES('','','','$data[3]','','$data[6]','$data[7]','$data[8]','','$data[10]','1','','','','','')"; //data array sesuaikan dengan jumlah kolom pada CSV anda mulai dari “0” bukan “1”
                $import="INSERT into biaya_02_rekam(idmahasiswa,nama,kode_bayar,kode,nominal,idsemester,app,upload)values('$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[9]','1',NOW())"; //data array sesuaikan dengan jumlah kolom pada CSV anda mulai dari “0” bukan “1”
                mysql_query($import) or die(mysql_error()); //Melakukan Import
            }
         
            fclose($handle); //Menutup CSV file
            echo "<br><strong>Import data selesai.</strong>";
            
        }else { //Jika belum menekan tombol submit, form dibawah akan muncul.. ?>
         
        <!-- Form Untuk Upload File CSV-->
          <br /> 
         
            Cari CSV File anda:<br />
            <input type='file' name='filename' style="max-width:20rem;"  accept="application/msexcel" class="form-control">
            <br>
           <input type='submit' name='submit' value='Upload' class="btn btn-info">
         
        <?php }  //Menutup koneksi SQL?>
      </div>
  
  </td>
         <td width="52%">
         <div class="card border-success mb-3" style="max-width: 20rem;">
          <div class="card-header">Entri Tagihan</div>
          <div class="card-body">
        		<input type="text" name="nim" class="form-control" placeholder="NIM...">
                <br>
               	<input type="text" name="nama" class="form-control" placeholder="Nama...">
                 <br>
               	<input type="text" name="kode_bayar" class="form-control" placeholder="Kode Bayar...">
                 <br>
               	<input type="text" name="kode" class="form-control" placeholder="Kode...">
                 <br>
               	<input type="number" name="nominal" class="form-control" placeholder="Nominal...">
                  <br>
			  <input type="number" name="idsemester" class="form-control" placeholder="idsemester...">
                  <br>
			  <input type="number" name="app" class="form-control" placeholder="app...">
                  <br>
			  <input type="number" name="upload" class="form-control" placeholder="upload...">
                  <br>
               	<input type="date" name="tgl" class="form-control">
                <br>
              	<select name="bank" class="form-control">
                <option value="">Bank</option>
                <option value="BNI">BNI</option>
                <option value="BCA">BCA</option>
                <option value="CIMBN">CIMB Niaga</option>
                <option value="MANDIRI">MANDIRI</option>
                <option value="BRI">BRI</option>
                  <option value="UOB">UOB</option>
                  <option value="DANAMON">DANAMON</option>
                <option value="JATENG">Bank Jateng</option>
                
                </select>
                <br>
                <select name="sm" class="form-control">
                <option value="">Semester</option>
                <?php
					$vsm_up_02 = $call_q("$call_sel semester order by idmain asc");
					while($vsmm_up_02 = $call_fas($vsm_up_02)){
						echo"<option value=$vsmm_up_02[idsemester]>$vsmm_up_02[idsemester]</option>";
					}
						
				?>
                </select>
           		<br>
                <button name="simpan" class="btn btn-success">S.I.M.P.A.N</button>
          </div>
          
          <?php 
			
		  		if(isset($_POST['simpan'])){
				$nim = @$sql_escape($_POST['nim']);
				$nama = @$sql_escape($_POST['nama']);
				$tgl = @$sql_escape($_POST['tgl']);
				$kode_bayar = @$sql_escape($_POST['kode_bayar']);
				$kode= @$sql_escape($_POST['kode']);
				$sm= @$sql_escape($_POST['sm']);
				$bank= @$sql_escape($_POST['bank']);
				$nominal = @$sql_escape($_POST['nominal']);
					$save = $call_q("insert into biaya_02_rekam(id_biaya_rekam,idmahasiswa,nama,kode_bayar,kode,nominal,idsemester,app,bank,upload)values('','$nim','$nama','$kode_bayar','$kode','$nominal','$sm','2','$bank','$tgl')");
						if($save){
								
		  ?>
          <div class="alert alert-dismissible alert-success">
            <strong>Well done!</strong> You successfully Save
            </div>
          <?php }else{ ?>
          		 <div class="alert alert-dismissible alert-danger">
            <strong>Sorry..</strong> Save Failed
            </div>
                
                <?php }} ?>
         </td>
       </tr>
</table>
</form>
</body>
<?php } mysql_close(); ?>