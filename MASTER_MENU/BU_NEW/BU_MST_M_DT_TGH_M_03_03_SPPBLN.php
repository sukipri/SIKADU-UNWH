<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
?>

		
        
	<span class="badge badge-warning">#Mahasiswa</span>
    <?PHP
			//KONVERSI KONDISI
			if($vtgh01_sww02['idmain_jenis_tagihan']=="226577253200715104233"){ ?>
					<a class="btn btn-outline-success btn-sm" href="<?php echo"?HLM=BU_MST_M&SUB=BU_MST_M_DT_TGH_M&SUB_CHILD=BU_MST_M_DT_TGH_M_03_01&SUB_CHILD_02=BU_MST_M_DT_TGH_M_03_03&IDKEJ01=$IDKEJ01&IDJTGH01=$IDJTGH01&IDAJR01=$IDAJR01"; ?>">#SPP SEMESTER</a>
			<?PHP }else{ ?>
            
            <?PHP }//CLOSE KONVERSI KONDISI SPPBLN ?>
    <br /><br />
    	<span class="badge badge-danger">#Entri Tagihan SPP BULANAN</span>
    <br />
    <form method="post">
     <div style="overflow:auto;width:auto;height:360px;padding:10px;border:1px solid #eee">
    <table width="100%" border="0" class="table tabl-bordered table-striped table-sm">
    <thead>
          <tr class="table-info">
            <td width="3%">#</td>
            <td width="26%">Nama Mahasiswa</td>
            <td width="18%">NIM</td>
            <td width="12%">Status MHS</td>
            <td width="12%">Status UTS</td>
            <td width="12%">Status UAS</td>
           <td width="32%">Estimasi Tagihan</td>
          </tr>
    </thead>
   <?php 
		
   	$no_mhs = 1;
  		$vmhs01_sw = $call_q("$sl idmahasiswa,idgelombang,idkejuruan,idtahun_ajaran,idsemester,nama,mhs,uts,uas,kode_kelas FROM mahasiswa WHERE idtahun_ajaran='$IDAJR01' AND idkejuruan='$IDKEJ01' and (mhs='2' OR mhs='3') AND krs='2'  order by idmahasiswa asc ");
   			$jum_vmhs01_sw = $call_nr($vmhs01_sw);
			
			while($vmhs01_sww = $call_fas($vmhs01_sw)){
			//..TGH..//
				$vtgh01_sw = $call_q("$sl idmain_tagihan_01,idmain_jenis_tagihan,idgelombang,idtahun_ajaran,idkejuruan,kode,kode_urut,kode_kelas,nominal FROM tb_tagihan_01 WHERE idmain_jenis_tagihan='$IDJTGH01' AND idtahun_ajaran='$IDAJR01' AND idkejuruan='$IDKEJ01' AND idgelombang='$vmhs01_sww[idgelombang]' AND kode_kelas='$vmhs01_sww[kode_kelas]' AND tipe='SPPBLN'");	
   					$vtgh01_sww = $call_fas($vtgh01_sw);
			//..GELOMBANG..//
			$vgl01_sw = $call_q("$sl idgelombang,gelombang FROM gelombang WHERE idgelombang='$vmhs01_sww[idgelombang]'");
				$vgl01_sww = $call_fas($vgl01_sw);
				//echo"$vmhs01_sww[idsemester]";
   ?>
          <tr>
            <td><?php echo"$no_mhs"; ?></td>
            <td><?php echo"$vmhs01_sww[nama]"; ?></td>
            <td><?php echo"$vmhs01_sww[idmahasiswa]"; ?>
            	<br />
                <?php echo"<b>$vmhs01_sww[kode_kelas]</b>"; ?>
            </td>
            <td width="12">
            <?php if($vmhs01_sww['mhs']=='2'){ ?>
           		<span class="badge badge-success">Aktif</span>
            <?PHP }elseif($vmhs01_sww['mhs']=='3'){ ?>
           		 <span class="badge badge-info">Cuti</span>
            <?php } ?>
            </td>
            <td width="12%">
            <?php if($vmhs01_sww['uts']=='2'){ ?>
           		<span class="badge badge-success">Aktif</span>
            <?php }elseif($vmhs01_sww['uts']=='1'){ ?>
            <span class="badge badge-danger">Non Aktif</span>
            <?php } ?>
            </td>
            <td width="12%">
            <?php if($vmhs01_sww['uas']=='2'){ ?>
           		<span class="badge badge-success">Aktif</span>
            <?php }elseif($vmhs01_sww['uas']=='1'){ ?>
            <span class="badge badge-danger">Non Aktif</span>
            <?php } ?>
            </td>
          <td width="32">
          	
            <input type="hidden" value="<?php echo"$c_kode_vtghr01$no_mhs"; ?>" name="<?php echo"kode_tgh_rec$no_mhs"; ?>" />
            <input type="hidden" value="<?php echo"$IDMAIN$no_mhs"; ?>" name="<?php echo"idmain$no_mhs"; ?>" />
            <!-- <input type="text" value="<?php //echo"$vtgh01_sww[kode_urut]$vjtgh_sww02[nama]"; ?>" name="<?php //echo"kode_urut$no_mhs"; ?>" /> -->
           <!-- <input type="text" value="<?php //echo"$vmhs01_sww[idkejuruan]"; ?>" name="<?php //echo"idkejuruan$no_mhs"; ?>" /> -->
            <input type="hidden" value="<?php echo"$vtgh01_sww[idmain_tagihan_01]"; ?>" name="<?php echo"idmain_tagihan$no_mhs"; ?>" />
            <input type="hidden" value="<?php echo"$vmhs01_sww[idmahasiswa]"; ?>" name="<?php echo"nim$no_mhs"; ?>" />
            <input type="hidden" value="<?php echo"$vmhs01_sww[nama]"; ?>" name="<?php echo"nama$no_mhs"; ?>" />
            <!-- <input type="text" value="<?php ///echo"$vjtgh_sww02[nama]"; ?>" name="<?php //echo"kode_bayar$no_mhs"; ?>" /> -->
            <div class="input-group input-group-sm mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><?php echo"$vgl01_sww[gelombang]"; ?></span>
                  </div>
                 <!-- -->
               
                 <?PHP
					if($vtgh01_sww['idmain_jenis_tagihan']=="226577253200715104233"){
						/*konversi Kondisi */
							$hit_vtgh01_sw = $vtgh01_sww['nominal'] / (20/100);
							if($vmhs01_sww['mhs']=="3"){
									
								
				?>
                		 <input type="text" class="form-control form-control-sm" name="<?php echo"tgh_nom$no_mhs"; ?>" value="<?php echo"$hit_vtgh01_sw"; ?>">
	                		<?PHP /* konversi Kondisi */  }else{ ?>
                        
                       		 <input type="text" class="form-control form-control-sm" name="<?php echo"tgh_nom$no_mhs"; ?>" value="<?php echo"$vtgh01_sww[nominal]"; ?>">
    	                    <?PHP /*konversi Kondisi */ } ?>
                  <?PHP } ?>
             
            </div>
            
            </td>
          </tr>
       <?php $no_mhs++;} ?>
	</table>
</div>
	 <div class="input-group input-group-sm mb-3" style="max-width:40rem;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><?php echo"Jumlah mahasiswa $jum_vmhs01_sw"; ?></span>
                  </div>
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Tanggal</span>
                  </div>
                  <input type="date" class="form-control form-control-sm" name="tgh_tgl" value="<?php echo"$date_html5"; ?>">
           		 <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Semester</span>
                 </div>
                 <select name="idsemester" class="form-control form-control-sm" required>
                 <option value=""></option>
                 <?php 
				 	$vsmt01_sw = $call_q("$sl idsemester,idmain,idtahun_ajaran,semester,aktif FROM semester order by idsemester desc");
						while( $vsmt01_sww = $call_fas($vsmt01_sw)){
							echo"<option value=$vsmt01_sww[idsemester]>$vsmt01_sww[semester] - $vsmt01_sww[aktif]</option>";	
						}
				 ?>
                 </select>
      </div>
	  <button name="tgh_simpan_rekam"  class="btn btn-success btn-sm"><i class="fas fa-cloud-upload-alt"></i>&nbsp;Unggah</button> 
            	<!-- <a href="<?php //echo"?HLM=BU_MST_M&SUB=BU_MST_M_DT_TGH_M&SUB_CHILD=BU_MST_M_DT_TGH_M_03_01&SUB_CHILD_02=BU_MST_M_DT_TGH_M_03_03&IDKEJ01=$IDKEJ01&IDJTGH01=$IDJTGH01&IDAJR01=$IDAJR01&rekam01=rekam01"; ?>">Simpan</a> -->
    		
    </form>
    <br />
<div style="overflow:auto;width:auto;height:40px;padding:10px;border:1px solid #eee">
    	<?php 
			/*
					if(isset($_POST['tgh_simpan_rekam'])){
						echo "HAHAHAH";
					$angka_coba = 1;
						while( $angka_coba <= $jum_vmhs01_sw){
									$kode_tgh_rec = @$_POST['kode_tgh_rec'.$angka_coba];
									$idmain = @$_POST['idmain'.$angka_coba];
									$nim = @$_POST['nim'.$angka_coba];
									echo"$kode_tgh_rec - $idmain - $kode_urut - $kode_bayar - $nim - $IDKEJ01 <br>";
						$angka_coba++; }
					}
				*/
		?>
        <?php //include"../logic/EXE_BU_TGH_01_REKAM_BR.php"; ?>
    	<!-- -->
        </div>
	    	<?php include"../logic/EXE_BU_TGH_01_REKAM.php"; ?>
            <?php //include"../logic/EXE_BU_TGH_01_REC.php"; ?>
    	<!-- -->
         <br /><br />
    	<span class="badge badge-info">#Hasil entri</span>
        &nbsp;
        <a href="#" class="badge badge-danger" onclick="return konfirmasi()">Kosongkan Tabel</a>
     <div style="overflow:auto;width:auto;height:360px;padding:10px;border:1px solid #eee">
    <table width="100%" border="0" class="table tabl-bordered table-striped table-sm">
    <thead>
          <tr class="table-info">
            <td width="2%">#</td>
            <td width="19%">Kode</td>
            <td width="19%">NIM</td>
            <td width="18%">NAMA</td>
            <td width="24%">Periode</td>
            <td width="18%">Estimasi Tagihan</td>
          </tr>
    </thead>
   <?php 
   	$no_mhs02 = 1;
		$vrkm01_sw = $call_q("$call_sel biaya_02_rekam_bri WHERE idkejuruan='$IDKEJ01' AND kode_bayar='$vjtgh_sww02[nama]' AND THN='$IDAJR01' ORDER BY idmahasiswa asc");
   			while($vrkm01_sww = $call_fas($vrkm01_sw)){
				
				
   ?>
          <tr>
            <td><?php echo"$no_mhs02"; ?></td>
            <td><?php echo"$vrkm01_sww[kode]"; ?></td>
            <td><?php echo"$vrkm01_sww[idmahasiswa]"; ?></td>
            <td><?php echo"$vrkm01_sww[nama]"; ?></td>
            <td><?php echo"$vrkm01_sww[idsemester]"; ?></td>
            <td>
            <div class="input-group input-group-sm mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Biaya</span>
                  </div>
                  <input type="text" class="form-control form-control-sm"  value="<?php echo"$vrkm01_sww[nominal]"; ?>">
			</div>
            </td>
          </tr>
       <?php $no_mhs02++;} ?>
	</table>
			
<?php } ?>