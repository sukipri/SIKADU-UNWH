<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
		?>
<body>
		<?php
				if(isset($_GET['DELTGH'])){
					$call_q("$del FROM tb_tagihan_01 WHERE idmain_tagihan_01='$IDDELTGH' ");
					
				}
		?>
<form method="post" action="">
	<table width="100%" border="0" class="table table-bordered table-sm" style="max-width:50rem;">
          <tr class="table-info">
            <td colspan="4"># Entri Master Tagihan</td>
          </tr>
          <tr>
            <td width="25%">Kode<br><input type="text" class="form-control form-control-sm" name="kode" value="<?php echo"$c_kode_vtgh01"; ?>" required></td>
            <td width="25%"><br>
            <select name="jenis_tagihan" class="form-control form-control-sm" required>
            <option value="">Kode Tagihan</option>
			<?php
			$vjtgh_sw = $call_q("$call_sel tb_jenis_tagihan");
					while($vjtgh_sww = $call_fas($vjtgh_sw)){
						echo"<option value=$vjtgh_sww[idmain_jenis_tagihan]>$vjtgh_sww[nama]</option>";
					}?>
            </select>            </td>
            <td width="25%"><br>
            <select name="kode_urut" required class="form-control form-control-sm">
                	<option value="">Kode Urut</option>
                    <?php 
						$no_urut = 1;
							while($no_urut <= 12){
							
								echo"<option value=0$no_urut>0$no_urut</option>";
							$no_urut++;}
					?>
                </select>            </td>
            <td width="25%"><br>
             <select name="tahun_ajaran" class="form-control form-control-sm" required>
            <option value="">Tahun ajaran</option>
			<?php
				$vajr_sw = $call_q("$call_sel tahun_ajaran order by ajaran desc limit 10");            
					while($vajr_sww = $call_fas($vajr_sw)){
							echo"<option value=$vajr_sww[idtahun_ajaran]>$vajr_sww[ajaran]</option>";	
					}
				
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
		 
		 echo" <option value=$vkjj_sww[idkejuruan]>$vkjj_sww[idkejuruan]&nbsp; / &nbsp;$vkjj_sww[kejuruan]&nbsp;$vkjj_sww[progdi]</option>";
		 }?>
      </select>            </td>
            <td>Nominal<br><input type="number" name="nominal" class="form-control form-control-sm" required></td>
            <td><select name="gelombang" class="form-control form-control-sm" required>
              <option value="">Gelombang</option>
              <?php
				$vglb_sw = $call_q("$sl idgelombang,gelombang,tahun FROM gelombang order by tahun desc");
					while($vglb_sww = $call_fas($vglb_sw)){
						echo"<option value=$vglb_sww[idgelombang]>$vglb_sww[gelombang] $vglb_sww[tahun]</option>";	
					}
			
			?>
            </select></td>
            <td>
            <select name="kode_kelas" class="form-control form-control-sm" required>
            	<option value="">Kelas</option>
                <!-- -->
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
							echo"<option value=$vkls01_sww[idkelas]>$vkls01_sww[kelas]</option>";
						}
				*/
				?>
            </select>
            </td>
          </tr>
          <tr>
            <td colspan="2">
            Rule Querying Kelas<br>
            	<textarea class="form-control" name="rule" required>kode_kelas='REG' OR kode_kelas='EKS'</textarea>  <br />
                <span class="badge badge-primary">COntoh penggunaan RUle</span>
                <blockquote>kode_kelas='[kode_kelas]' OR kode_kelas='[kode_kelas]'</blockquote>
           	  </td>
            <td>
              Rule Querying UTS UAS<br>
            	<textarea class="form-control" name="rule02" required>uas='2' AND uts='1'</textarea>  <br />
                <span class="badge badge-primary">COntoh penggunaan RUle</span>
             	 uas='2' AND uts='1'
            </td>
            <td><textarea name="ket" class="form-control"></textarea></td>
           
          </tr>
	</table>
  <button class="btn btn-success btn-sm" name="simpan"><i class="fas fa-save"></i>&nbsp;Simpan</button>
</form>
	<!-- -->
	<?php include"../logic/EXE_TGH_M_02.php"; ?>
    <!-- -->
		<hr>
	<?php 
		$vkjj02_sw = $call_q("$call_sel kejuruan order by idkejuruan asc");
				 while($vkjj02_sww = $call_fas($vkjj02_sw)){
		echo"<i>$vkjj02_sww[kejuruan]<br>Progdi $vkjj02_sww[progdi]</i>";
	
	?> 
    <div style="overflow:auto;width:60rem;;height:350px;padding:10px;border:1px solid #eee">   			
<table width="100%" border="0" style="max-width:50rem;" class="table table-bordered table-sm">
      <tr class="table-warning">
        <td width="5%">#</td>
        <td width="10%">Kode</td>
        <td width="19%">Kode Bayar</td>
        <td width="19%">Nominal</td>
        <td width="15%">Gelombang</td>
        <td width="12%">RULE</td>
        <td width="7%">RULE 02</td>
        <td width="7%">Ajaran</td>
        <td width="13%">####</td>
      </tr>
     <?php
	 	$no = 1; 
	 	$vtgh01_sw = $call_q("$call_sel tb_tagihan_01 WHERE idkejuruan='$vkjj02_sww[idkejuruan]' order by idtahun_ajaran asc");
			while($vtgh01_sww = $call_fas($vtgh01_sw)){
				$vthn01_sw = $call_q("$call_sel tahun_ajaran WHERE idtahun_ajaran='$vtgh01_sww[idtahun_ajaran]'");
					$vthn01_sww = $call_fas($vthn01_sw);
						$vglm_sw = $call_q("$sl idgelombang,gelombang,tahun FROM gelombang WHERE idgelombang='$vtgh01_sww[idgelombang]'");
							$vglm_sww = $call_fas($vglm_sw);
								$vjtgh02_sw = $call_q("$sl idmain_jenis_tagihan,nama FROM tb_jenis_tagihan WHERE idmain_jenis_tagihan='$vtgh01_sww[idmain_jenis_tagihan]'");
									$vjtgh02_sww = $call_fas($vjtgh02_sw);
								
				//--//
					$nom_tgh = $nf($vtgh01_sww['nominal']);
	 
	 ?>
      <tr>
        <td><?php echo"$no"; ?></td>
        <td><?php echo"<a href=?HLM=BU_MST_M&SUB=BU_MST_M_DT_TGH_M&SUB_CHILD=BU_MST_M_DT_TGH_M_02_UP&IDTG101=$vtgh01_sww[idmain_tagihan_01]>$vtgh01_sww[kode]</a>"; ?> </td>
        <td><?php echo"$vtgh01_sww[kode_urut]$vjtgh02_sww[nama]<br>$vtgh01_sww[kode_kelas]"; ?></td>
        <td><?php echo"Rp.$nom_tgh"; ?></td>
        <td><?php echo"$vglm_sww[gelombang] $vglm_sww[tahun]"; ?></td>
        <td><?php echo"$vtgh01_sww[rule]"; ?></td>
        <td><?php echo"$vtgh01_sww[rule_02]"; ?></td>
        <td><?php echo"$vthn01_sww[ajaran]"; ?></td>
        <td>
	      <a href="<?php echo"?HLM=BU_MST_M&SUB=BU_MST_M_DT_TGH_M&SUB_CHILD=BU_MST_M_DT_TGH_M_02&IDDELTGH=$vtgh01_sww[idmain_tagihan_01]&DELTGH=DELTGH"; ?>" class="badge badge-danger" onClick="return konfirmasi()"><i class="fas fa-ban"></i>&nbsp;Delete</a>
        </td>
      </tr>
      <?php $no++; } ?>
</table>
</div>
<br>
		<?php } ?>
</body>
<?php } ?>