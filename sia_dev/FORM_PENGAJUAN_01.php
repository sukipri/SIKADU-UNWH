	<?php //session_start();
	 //include_once"../sc/conek.php";
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
			//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
			header('location:index.php');
		} else {
			//$u = mysql_query("select iduser_mhs,idmahasiswa,username,akses from user_mhs where idmahasiswa='$_SESSION[namauser]'");
			//$uu = mysql_fetch_array($u);
	 ?>
	 
     <body>
     	<span class="badge badge-success">#FORM Ajuan</span>
        <br><br>
        <!-- -->
        <div class="card border-primary mb-3" style="max-width: 25rem;">
          <div class="card-header">Form Pengajuan</div>
          <div class="card-body">
           <input type="text" readonly class="form-control form-control-sm" value="<?PHP echo"$c_kode_vfaju01"; ?>">
           <br>
           
           <span class="badge-info">#Jenis Ajuan</span>
           <br>
           <select name="form_jenis_01" class="form-control form-control-sm" required>
           <option value=""></option>
           <option value="CUTI">Cuti Semester</option>
           <option value="AP">Administrasi Pembayaran</option>
           <option value="">Verifikasi Data</option>
           </select>
           <br>
           
           <span class="badge-info">#Keterangan</span>
           <br>
           <textarea name="form_ket_01" class="form-control"></textarea>
           <br>
           
           <span class="badge-info">#Tanggal ajuan</span>
           <br>
           <input type="date" class="form-control form-control-sm" name="form_tglajuan_01">
           <br>
           
           <button name="unw_form_ajuan_simpan_01" class="btn btn-success btn-sm"><i class="fas fa-paper-plane"></i>&nbsp;Kirim Ajuan</button>
           
          </div>
	</div>
    <!-- -->
     </body>
     
     <?PHP } ?>
     