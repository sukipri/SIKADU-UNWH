<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
		?>
<body>
	<div style="padding-top:20px;"></div>
	<b>History Pembayaran</b><hr style="border:dotted; max-width:20rem;">
    <br>
    <form method="post">
    <table class="table" width="100%">
    <tr>
    <td width="70%">
    <input type="text" name="nama" class="form-control" style="max-width:60rem;" required placeholder="Masukan Nim.....">
    </td>
    <td width="30%">
    <button class="btn waves-effect waves-light" type="submit" name="cari">Cari
    <i class="material-icons right">send</i>
  </button> 
  </td>
    </tr>
    </table>
    <br>
    <!-- -->
    <?php if(isset($_POST['cari'])){ $nama = @$sql_escape($_POST['nama']);  ?>
    
    <?php 
		$km = $call_q("select idmahasiswa,idkejuruan,idtahun_ajaran,idsemester,iddosen,nama,kode_kelas,idgelombang from mahasiswa where  idmahasiswa='$nama' or nama LIKE '%$nama%'");
			while($kmm = $call_fas($km)){
			$fakj = $call_q("select idkejuruan,idfakultas,kejuruan from kejuruan where idkejuruan='$kmm[idkejuruan]'");
			 $fakkj = $call_fas($fakj);
			 $gl = $call_q("select * from gelombang where idgelombang='$kmm[idgelombang]'");
				$gll = $call_fas($gl);
	
	?>
     <div class="row">
    <div class="col s12 m7">
      <div class="card">
        <div class="card-image">
         <?php
		 	   //PHOTO MAHASISWA
        $ft = $call_q("$call_sel foto_mhs where idmahasiswa='$kmm[idmahasiswa]' order by idfoto desc limit 1");
        $ftt  = $call_fas($ft);
       
			$ftht = $call_nr($ft);
				 if($ftht==1){
		 ?>
		
		 <?php
		 echo"<center><img src=http://sikadu.unwahas.ac.id/file/$ftt[foto] class=img-responsive></center><br>"; 
		 }else{
		 ?>
	 <a href="#" onClick="MM_openBrWindow('u_foto/index.php','','scrollbars=yes,width=500,height=500')">
		
		 <?php
		 echo"<center><img src=http://sikadu.unwahas.ac.id/img/no.jpg class=img-responsive></center>"; 
		 } ?>
		 </a>
          <span class="card-title"><?php echo"$kmm[nama]"; ?></span>
        </div>
        <div class="card-content">
          <p>
          <?php 
		  	echo"<b>$vsm_aa[semester]</b><br>";
		  $byr = $call_q("select * from biaya_02_rekam where idmahasiswa='$kmm[idmahasiswa]' order by tgl ");
			
			while($byyr = $call_fas($byr)){
				$vby = $call_q("$call_sel biaya_02 WHERE idbiaya_02='$byyr[idbiaya_02]'");
					$byy = $call_fas($vby);
			$k1 = @number_format($byy['NOMINAL'],"0","",".");
				if($byyr['app']==1){ echo"<font color=red><b>#</b></font>";
				}elseif($byyr['app']==2){echo"<font color=green><b>#</b></font>";}
				echo"&nbsp;$byy[REMARK]&nbsp;[$byy[TGL]]-[$byy[THN] / $byy[KODE]-$k1&nbsp;$byy[KETERANGAN]"; ?>
				<!-- [<a href="<?php //echo"?bu=pem_kul&pkp=import_biaya_nim&idb=$byy[idbiaya_02]#biaya"; ?>" onClick="return konfirmasi()">Hapus</a>]<br> -->
			<br>
			<?php }
				$jumby = $call_q("select sum(NOMINAL) as totby from biaya_02_rekam where idmahasiswa='$kmm[idmahasiswa]' AND app='1'");
				$jumbyy = $call_fas($jumby);
					$k3 = @number_format($jumbyy['totby'],"0","",".");
						
				echo "<b>TOTAL:&nbsp;Rp.$k3</b>";
			 ?> 
          </p>
        </div>
        <div class="card-action">
          <a href="#">Detail Pembayaran Semester</a>
        </div>
      </div>
    </div>
  </div>
  <?php }} ?>
    
    </form>
</body>
<?php } ?>