<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
?>

<?php
	$vtgh01_sw = $call_q("$call_sel tb_tagihan_01 WHERE idmain_tagihan_01='$IDTG101'");
		$vtgh01_sww = $call_fas($vtgh01_sw);
?>
	<h6 class="badge badge-info">#Update Master tagihan</h6>
    <br>
<form method="post" action="">
	<table width="100%" border="0" class="table table-bordered table-sm" style="max-width:50rem;">
          <tr class="table-info">
            <td colspan="4"># Entri Master Tagihan</td>
          </tr>
          <tr>
            <td width="25%">Kode<br><input type="text" readonly class="form-control form-control-sm" name="kode" value="<?php echo"$vtgh01_sww[kode]"; ?>" required></td>
            <td width="25%"><br>
            <select name="jenis_tagihan" class="form-control form-control-sm" required>
            <option value="">Kode Tagihan</option>
			<?php
			$vjtgh_sw = $call_q("$call_sel tb_jenis_tagihan");
					while($vjtgh_sww = $call_fas($vjtgh_sw)){
							if($vtgh01_sww['idmain_jenis_tagihan']==$vjtgh_sww['idmain_jenis_tagihan']){ 
						echo"<option value=$vjtgh_sww[idmain_jenis_tagihan] selected>$vjtgh_sww[nama]</option>";
					}else{
						echo"<option value=$vjtgh_sww[idmain_jenis_tagihan]>$vjtgh_sww[nama]</option>";
					}}
					?>
            </select>            </td>
            <td width="25%"><br>
            	<select name="kode_urut" required class="form-control form-control-sm">
                	<option value="">Kode Urut</option>
                    <?php 
						$no_urut = 1;
							while($no_urut <= 12){
								if($vtgh01_sww['kode_urut']=="0$no_urut"){
								echo"<option value=0$no_urut selected>0$no_urut</option>";
							}else{
								echo"<option value=0$no_urut>0$no_urut</option>";
							}$no_urut++;}
					?>
                </select>            </td>
            <td width="25%"><br>
             <select name="tahun_ajaran" class="form-control form-control-sm" required>
            <option value="">Tahun ajaran</option>
			<?php
				$vajr_sw = $call_q("$call_sel tahun_ajaran order by ajaran desc limit 10");            
					while($vajr_sww = $call_fas($vajr_sw)){
							if($vtgh01_sww['idtahun_ajaran']==$vajr_sww['idtahun_ajaran']){
							echo"<option value=$vajr_sww[idtahun_ajaran] selected>$vajr_sww[ajaran]</option>";	
					}else{
							echo"<option value=$vajr_sww[idtahun_ajaran]>$vajr_sww[ajaran]</option>";	
					}}
            ?>
            </select>            </td>
          </tr>
          <tr>
            <td><br>
            <select required name="kej" class="form-control form-control-sm">
        <option>Progdi</option>
        <?php
			 $vkjj_sw = $call_q("$sl idkejuruan,idfakultas,progdi,kejuruan FROM  kejuruan order by idkejuruan");
				 while($vkjj_sww = $call_fas($vkjj_sw)){
		 				if($vtgh01_sww['idkejuruan']==$vkjj_sww['idkejuruan']){
				 echo" <option value=$vkjj_sww[idkejuruan] selected>$vkjj_sww[idkejuruan]&nbsp; / &nbsp;$vkjj_sww[kejuruan]&nbsp;$vkjj_sww[progdi]</option>";
		 	}else{
				 echo" <option value=$vkjj_sww[idkejuruan]>$vkjj_sww[idkejuruan]&nbsp; / &nbsp;$vkjj_sww[kejuruan]&nbsp;$vkjj_sww[progdi]</option>";
			}}
		 ?>
      </select>            </td>
            <td>Nominal<br><input type="number" name="nominal" class="form-control form-control-sm" value="<?php echo"$vtgh01_sww[nominal]"; ?>" required></td>
            <td><br /><select name="gelombang" class="form-control form-control-sm" required>
              <option value="">Gelombang</option>
              <?php
				$vglb_sw = $call_q("$sl idgelombang,gelombang,tahun FROM gelombang order by tahun desc");
					while($vglb_sww = $call_fas($vglb_sw)){
							if($vtgh01_sww['idgelombang']==$vglb_sww['idgelombang']){
						echo"<option value=$vglb_sww[idgelombang] selected>$vglb_sww[gelombang] $vglb_sww[tahun]</option>";	
					}else{
						echo"<option value=$vglb_sww[idgelombang]>$vglb_sww[gelombang] $vglb_sww[tahun]</option>";
					}}
			
			?>
            </select></td>
            <td> 
            <br />
            <select name="kode_kelas" class="form-control form-control-sm" required>
            	<option value="">Kelas</option>
                <!--  -->
                <option value="EKS">Ekstensi</option>
                <option value="REG">Reguler</option>
                <option value="PAKET">PAKET</option>
                <option value="PA">PA</option>
                <option value="PB">PB</option>
                <option value="BM">BM</option>
                <option value="BSW">BSW</option>
               
                <?php 
					/*
					$vkls01_sw = $call_q("$call_sel kelas order by idkelas asc");
						while($vkls01_sww = $call_fas($vkls01_sw)){
								if($vtgh01_sww['kode_kelas']==$vkls01_sww['idkelas']){
							echo"<option value=$vkls01_sww[idkelas] selected>$vkls01_sww[kelas]</option>";
						}else{
							echo"<option value=$vkls01_sww[idkelas]>$vkls01_sww[kelas]</option>";
						}}
			*/
				?>
            </select>
            </td>
          </tr>
          <tr>
            <td colspan="2">Rule Querying
            	<textarea class="form-control" name="rule" required><?php echo"$vtgh01_sww[rule]"; ?></textarea> <br />
                Rule Querying UTS UAS<br>
            	<textarea class="form-control" name="rule02" required><?php echo"$vtgh01_sww[rule_02]"; ?></textarea>  <br />
                </td>
            <td><textarea name="ket" class="form-control"><?php echo"$vtgh01_sww[ket]"; ?></textarea></td>
            <td><br />
            <select name="masa_biaya" class="formn-control form-control-sm" required>
              <option value="-">eMPTY</option>
              <option value="2">Biaya 1 *Awal Semester</option>
              <option value="1">Biaya 2 *Pertengahan Semester</option>
            </select></td>
          </tr>
	</table>
  <button class="btn btn-success btn-sm" name="simpan"><i class="fas fa-save"></i>&nbsp;Update</button>
</form>
       <!-- -->
       	<?php include"../logic/UP_TGH_M_02_UP.php"; ?>
       <!-- --> 
  <?php } ?>