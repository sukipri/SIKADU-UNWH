<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
		?>
<body>
	<?php
		//--//
			$IDDELJTGH = @$sql_escape($_GET['IDDELJTGH']);
				if(isset($_GET['DELJTGH'])){
						$call_q("$del FROM tb_jenis_tagihan WHERE idmain_jenis_tagihan='$IDDELJTGH'");
					
				}
	?>
	
	<form method="post">
  
    <table width="100%" border="0" class="table table-bordered table-sm" style="max-width:30rem;">
          <tr class="table-info">
            <td colspan="3">  #Jenis Tagihan</td>
          </tr>
          <tr>
            <td>Kode<br><input type="text" class="form-control form-control-sm" name="kode" value="<?php echo"$c_kode_vjtgh"; ?>" required></td>
            <td>nama<br><input type="text" class="form-control form-control-sm" name="nama" required></td>
            <td><textarea name="ket" class="form-control"></textarea></td>
          </tr>
	</table>
    <button class="btn btn-success btn-sm" name="simpan"><i class="fas fa-save"></i>&nbsp;Simpan</button>
	</form>
    <?php
		if(isset($_POST['simpan'])){
			$kode = @$sql_escape($_POST['kode']);
			$nama = @$sql_escape($_POST['nama']);
			$ket = @$sql_escape($_POST['ket']);
				$save_jenis_tgh = $call_q("$in tb_jenis_tagihan (idmain_jenis_tagihan,kode,nama,ket,uploader)VALUES('$IDMAIN','$kode','$nama','$ket','$uu_bu[idbu]')");
			if($save_jenis_tgh){
					include"../sd/LOAD_SUCCESS.php";
			}else{
				include"../sd/LOAD_FAILED.php";
	?>
    
    <?php } }?>
    <table width="100%" style="max-width:30rem;" border="0" class="table table-bordered table-sm">
          <tr class="table-warning">
            <td>Kode</td>
            <td>Judul</td>
            <td>####</td>
          </tr>
          <?php 
		  		$vjtgh_sw = $call_q("$call_sel tb_jenis_tagihan");
					while($vjtgh_sww = $call_fas($vjtgh_sw)){
		  ?>
          <tr>
            <td><?php echo"$vjtgh_sww[kode]"; ?></td>
            <td><?php echo"$vjtgh_sww[nama]"; ?></td>
            <td>
            <a href="<?php echo"?HLM=BU_MST_M&SUB=BU_MST_M_DT_TGH_M&SUB_CHILD=BU_MST_M_DT_TGH_M_01&IDDELJTGH=$vjtgh_sww[idmain_jenis_tagihan]&DELJTGH=DELJTGH"; ?>" class="badge badge-danger" onClick="return konfirmasi()">Hapus</a>
            </td>
          </tr>
          <?php } ?>
	</table>

    
</body>
<?php } ?>