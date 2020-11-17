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
    <table width="100%" border="0" class="table">
          <tr>
            <td width="31%">
            <!-- -->
           	 <form method="post">
                <span class="badge badge-success">#FORM Ajuan</span>
                <br><br>
                <!-- -->
                <div class="card border-primary mb-3" style="max-width: 25rem;">
                  <div class="card-header">Form Pengajuan</div>
                  <div class="card-body">
                   <input type="text" readonly name="form_kode_01" class="form-control form-control-sm" value="<?PHP echo"$c_kode_vfaju01"; ?>">
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
   	 </form>
           
           <!-- -->
           
            
            </td>
            <td width="69%">
            <!-- -->
            	<?PHP include"FORM_PENGAJUAN_01_VIEW.php"; ?>
            <!--- -->
            </td>
          </tr>
	</table>

    
    	<?PHP
				if(isset($_POST['unw_form_ajuan_simpan_01'])){
					$form_kode_01 = @$sql_escape($_POST['form_kode_01']);
					$form_jenis_01 = @$sql_escape($_POST['form_jenis_01']);
					$form_ket_01 = @$sql_escape($_POST['form_ket_01']);
					$form_tglajuan_01 = @$sql_escape($_POST['form_tglajuan_01']);
					
						$save_form_ajuan_01 = $call_q("$in tb_form_ajuan_01(idmain_form_ajuan_01,idmahasiswa,idfakultas,form_kode_01,form_jenis_01,form_ket_01,form_tglinput_01,form_tglajuan_01,form_status_01)VALUES('$IDMAIN','$kdmhs','$fkll[idfakultas]','$form_kode_01','$form_jenis_01','$form_ket_01','$date_html5','$form_tglajuan_01','1')");
						if($save_form_ajuan_01){
						header("LOCATION:?mng=FORM_PENGAJUAN_01");
						}else{
							include"LAYOUT/NOTIF/NF_SAVE_FAILED.php";		
		 ?>
         	
         <?PHP }} ?>
    <!-- -->
     </body>
     
     <?PHP } ?>
     