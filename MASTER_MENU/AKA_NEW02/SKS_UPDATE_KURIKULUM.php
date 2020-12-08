<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
	?>

<body>
	<?php
			//$IDMHS = @$sql_escape($_GET['IDMHS']);
			//$IDKRS = @$sql_escape($_GET['IDKRS']);
			//$kdmhs = @$sql_escape($_GET['kdmhs']);
			$IDSKS = @$sql_escape($_GET['IDSKS']);
			$IDKR = @$sql_escape($_GET['IDKR']);
			
		
		  $sks = $call_q("$sl idmainsks,idsks,iddosen,idsemester,idkejuruan,idkurikulum,idkelas,hari,jam,jumlah,jp FROM sks where idsks='$IDSKS' ");
		$skss = $call_fas($sks);
		  $sm = $call_q("$sl idsemester,idtahun_ajaran,semester FROM semester where idsemester='$skss[idsemester]'");
		$smm = $call_fas($sm);
		 $dsn = $call_q("$sl iddosen,idkejuruan,nama FROM dosen where iddosen='$skss[iddosen]'");
		$dsnn = $call_fas($dsn);
		$kj = $call_q("$sl idkejuruan,idfakultas,kejuruan FROM kejuruan where idkejuruan='$skss[idkejuruan]'");
		$kjj = $call_fas($kj);
		$kr  = $call_q("$sl idmain,idkurikulum,idkejuruan,judul,juduleng,idsk FROM kurikulum where idkurikulum='$skss[idkurikulum]'");
		$krr = $call_fas($kr);
		
			if(isset($_POST['simpan'])){
				$idkuri = @$_POST['idkuri'];
				$idmain_kuri = @$_POST['idmain_kuri'];
				$jml_kuri = @$_POST['jml_kuri'];
					$call_q("$up sks set idkurikulum='$idkuri',jumlah='$jml_kuri' where idkurikulum='$IDKR'");
					$call_q("$up krs set idmain_kurikulum='$idmain_kuri',jumlah='$jml_kuri' where idmain_kurikulum='$krr[idmain]'");
				?>
				 <div class="alert alert-dismissible alert-success">
  				<button type="button" class="close" data-dismiss="alert">&times;</button>
 				 <strong>Well done!</strong> You successfully Save.......
					</div>
				<?php } ?>
		  <h4> <a href=<?php echo"?aka=edit_sks&kdsks=$skss[idsks]"; ?> class="fa fa-edit"></i>&nbsp;Edit SKS</a> &nbsp;<i class="fa fa-level-up"></i>&nbsp;Update SKS</h4>
        <table width="100%" border="0" class="table">
          <tr>
            <td class="table-warning"><i class="fa fa-map-o"></i>&nbsp;Makul Sebelumnya</td>
            <td align="right" class="table-success">Pembaruan Makul</td>
          </tr>
          <tr>
            <td width="43%" class="table-danger">
              <?php
					echo"<b>$skss[idkurikulum]</b><br>";
					echo"<b>$krr[judul]</b><br>";
					echo"<b>$skss[jumlah] SKS</b><br>";
					echo"<b>$dsnn[nama]</b><br>";
				?>
            </td>
            <td width="57%">
			  <form method="post">
			  <table width="100%" class="table table-bordered">
                <tr>
                  <td width="25%">
				  <select name="kuri" class="form-control" onChange="this.form.submit()">
				  <option value=""></option>
				    <?php
					 $sm2 = $call_q("$sl idsemester,idtahun_ajaran,semester FROM semester order by idmain desc");
						while($smm2 = $call_fas($sm2)){
					?>
					 <optgroup label="<?php echo"$smm2[semester]"; ?>">
   					
                    <?php 
						$vkr2 = @$call_q("$sl idmain,idkurikulum,idsemester,idkejuruan,judul FROM kurikulum where idkejuruan='$skss[idkejuruan]' and idsemester='$smm2[idsemester]' order by idsemester desc ");
						while($vkrr2 = $call_fas($vkr2)){
							echo"<option value=$vkrr2[idkurikulum]>$vkrr2[judul] $vkrr2[idkurikulum]</option>";
						}?>
					 </optgroup>
					 <?php } ?>
                 
                  </select>
				  </td>
                </tr>
              </table>			
			  <?php
			  		if(isset($_POST['kuri'])){
						$kuri = @$_POST['kuri'];
						$vkr3= $call_q("$sl  idmain,idkurikulum,idkejuruan,judul,juduleng,idsk,sks FROM kurikulum where idkurikulum='$kuri' ");
							$vkrr3 = $call_fas($vkr3);
			  ?>
			  <table width="100%" border="0" class="table table-bordered">
                <tr>
                  <td width="31%"><input type="text" name="idkuri" class="form-control" value="<?php echo"$vkrr3[idkurikulum]"; ?>" readonly=""></td>
                  <td width="69%"><input name="judul_kuri" type="text" class="form-control" value="<?php echo"$vkrr3[judul]"; ?>" readonly=""></td>
                </tr>
                <tr>
                  <td><input name="jml_kuri" type="text" class="form-control" value="<?php echo"$vkrr3[sks]"; ?>" readonly=""></td>
                  <td><input name="judul_kuri_eng" type="text" class="form-control" value="<?php echo"$vkrr3[juduleng]"; ?>" readonly=""></td>
                </tr>
                <tr>
                  <td><input name="idmain_kuri" type="text" class="form-control" value="<?php echo"$vkrr3[idmain]"; ?>" readonly=""></td>
                  <td align="right"><button name="simpan" class="btn btn-danger" onClick="return konfirmasi_simpan()"><i class="fa fa-mail-reply-all"></i>&nbsp;Update</button></td>
                </tr>
              </table>
			  
			  <?php } ?>
			  </form>
			  </td>
          </tr>
        </table>
</body>
<?php } ?>
