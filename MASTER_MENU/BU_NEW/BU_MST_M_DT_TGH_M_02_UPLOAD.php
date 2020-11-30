<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
?>
<body>
<h5><i class="far fa-file-excel"></i>&nbsp;Import Master Tagihan</h5>
<br>
	<a href="/MASTER_MENU/DRAFT/TEMP_XLS.csv" class="btn btn-outline-success btn-sm">#Download Template</a>
 	<hr color="#009999">
			<!-- --->
            	<?PHP include"../logic/EXE_BU_TGH_01_IMP_01.php"; ?>
            <!-- -->
 			
        <!-- Form Untuk Upload File CSV-->
          <div class="card border-primary mb-3" style="max-width: 20rem;">
                  <div class="card-header">Upload</div>
                  <div class="card-body">
                     <form enctype='multipart/form-data' action='' method='post'>
                     
                     	<select name="idmain_jenis_tagihan" class="form-control form-control-sm" required>
                        	<option value="">Jenis Tagihan</option>
                            <?PHP 
								$vjtgh01_sw = $call_q("$call_sel tb_jenis_tagihan ");
									while($vjtgh01_sww = $call_fas($vjtgh01_sw)){
								echo"<option value=$vjtgh01_sww[idmain_jenis_tagihan]>$vjtgh01_sww[nama]</option>";
								
									}
							?>
                        </select>
                        <br>
                        Cari CSV File anda:<br />
                        <input type='file' accept="application/msexcel" name='filename' size='100' class="form-control">
                      	<br>
                     	<button name="imp_tagihan" class="btn btn-success btn-sm">UPLOAD DATA</button>
                     </form>
                  </div>
		</div>
          
         
		<?php  mysql_close(); //Menutup koneksi SQL?>
</body>

<?PHP } ?>