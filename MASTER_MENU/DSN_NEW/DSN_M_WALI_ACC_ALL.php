	<?php
			include_once"../../sc/conek.php";
			include_once"css.php";
			include"../../NEW_CODE/code_rand.php";
	?>
	<body>
	<form method="post">
	<?php
	
			$IDDSN=$sql_escape($_GET['kddsn']);
			$THN=$sql_escape($_GET['THN']);
			 $dsn = $call_q("$call_sel dosen where iddosen='$IDDSN'");
			$dsnn = $call_fas($dsn);
			$kj = $call_q("$sl idkejuruan,kejuruan FROM kejuruan where idkejuruan='$dsnn[idkejuruan]'");
			$kjj = $call_fas($kj);
			$fak02 = $call_q("$call_sel fakultas where idfakultas='$dsnn[idfakultas]'");
			$fakk02 = $call_fas($fak02);
			
		   $mhs = $call_q("$sl idmahasiswa,idkejuruan,idsemester,iddosen,nama,idkelas,kode_kelas,idtahun_ajaran,acc from mahasiswa where iddosen='$IDDSN' and mhs='2'  AND idtahun_ajaran='$THN'");
	   //$mhs = $call_q("select * from mahasiswa where iddosen='$IDDSN'");
	  		 	$jum_mhs = $call_nr($mhs);
					   $no =1;
							while($mhss = $call_fas($mhs)){
								//echo"$mhss[idmahasiswa] $mhss[nama] <font color=green><b>Sukses</b></font><br>";
								echo"<input type=hidden name=nim$no value=$mhss[idmahasiswa]> <input type=hidden name=smt value=$mhss[idsemester]>";
							$no++;}
		
			if(isset($_POST['acc_up'])){
							$no_acc = 1;
							while( $no_acc <= $jum_mhs){
								$nim = @$_POST['nim'.$no_acc];
								$smt = @$_POST['smt'];
							//$call_q("$up krs set ");
								?>
									<?php echo"$nim"; ?> <font color="#006633"><b><i class="fas fa-arrow-up"></i></font></b><br>
						<?php 
							$call_q("$up krs set app='2' WHERE idsemester='$smt' AND idmahasiswa='$nim'");
							$call_q("$up mahasiswa set acc='2' WHERE idsemester='$smt' AND idmahasiswa='$nim'");
						 $no_acc++; }}
						 ?>
	
		<br>
		<center><button class="btn btn-danger" name="acc_up"><i class="fas fa-upload"></i>&nbsp;ACC Sekarang</button></center>
	</form>
	</body>