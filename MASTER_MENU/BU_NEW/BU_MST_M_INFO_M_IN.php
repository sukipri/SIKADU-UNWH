<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
		?>
     <script src="https://cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
<body>
	
        <form method="post">
        <div class="card border-success mb-3" style="max-width: 70rem;">
              <div class="card-header">Entri Info</div>
              <div class="card-body">
              	#ID Info
                <input type="text" class="form-control form-control-sm" style="max-width:20rem;" name="unw_info_kode_keu" value="<?PHP echo"$c_kode_vinkeu01"; ?>" required>
                <br>
                
           		#Info Nama
                <input type="text" class="form-control form-control-sm" name="unw_info_nama_keu" style="max-width:20rem;"  required>
                <br>
                
                #Keterangan
            	 <textarea name="unw_info_ket_keu" rows="14" required class="form-control" id="isi"></textarea>
          		 <script>
                        CKEDITOR.replace( 'unw_info_ket_keu' );
                </script>
                <br>
              </div>
        </div>
        <br>
         <button name="unw_simpan_info_keu" class="btn btn-success">S.I.M.P.A.N</button>
        </form>
        <!--- -->
        	<?PHP include"../logic/EXE_BU_INFO_IN.php"; ?>
        <!-- -->
        
</body>
<?PHP } ?>