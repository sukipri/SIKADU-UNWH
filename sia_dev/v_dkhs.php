	<?php session_start();
	 include_once"./../sc/conek.php";
		include"css.php";
		 include"../NEW_CODE/code_rand.php";
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
			//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
			header('location:index.php');
		} else {
		$u = $call_q("select iduser_mhs,idmahasiswa,username,akses from user_mhs where idmahasiswa='$_SESSION[namauser]'");
				$uu = mysql_fetch_assoc($u);
	 ?>
	<style type="text/css">
	<!--
	body,td,th {
		font-size: 13px;
	}
	
	-->
	</style>
	</head>
	
	<body>
	
	<?php
	$tahun = @$sql_escape(trim($_GET['tahun']));
		$kdmhs=@$sql_escape(trim($_GET['kdmhs']));
	 $mhs = $call_q("select idmahasiswa,idsemester,idkejuruan,idtahun_ajaran,nama,iddosen FROM mahasiswa where idmahasiswa='$uu[idmahasiswa]'");
	$mhss = $call_fas($mhs);
		$rsem = $call_q("select * from rekamsemester where idrekamsemester='$tahun'");
	$rsemm = $call_fas($rsem);
	$smd = $call_q("select idsemester,idtahun_ajaran,semester from semester ");
	$smmd = $call_fas($smd);
	 $smtj01d = $call_q("select * from tahun_ajaran where idtahun_ajaran='$smmd[idtahun_ajaran]'");
	$smmtj01d = $call_fas($smtj01d);
	echo"<h3>NIM &nbsp; $mhss[idmahasiswa]/&nbsp; $smmd[idsemester]</h3>";
	?>
	
	<div align="center"><a href=<?php echo"v_dkhs.php?tahun=$tahun&kdmhs=$kdmhs"; ?> class="btn btn-outline-success btn-sm"><img src=../img/update-32.png border="0">Segarkan!</a>
	</div>
	
	  <div class="alert alert-dismissible alert-success">
	  <b>#REFRESH NILAI</b>
      <ul>
	  <li>Klik Pada nilai huruf yang sudah keluar</li>
	  <li> Kemudian klik pada button submit IPK </li>
	
	  </ul>
	 <p>&nbsp;</p> 
	</div>
	<hr>
	
	<?php
	$idkrs_01 = @mysql_real_escape_string($_GET['idkrs_01']);
	if(isset($_GET['idkrs_01'])){
	$jumkhs = @mysql_real_escape_string($_GET['jumkhs']);
	$rsm = @mysql_real_escape_string($_GET['rsm']);
	@$call_q("update krs set total2='$jumkhs',app2='2' where idkrs='$idkrs_01'"); 
	@$call_q("update rekamsemester set app2='1' where idsemester='$rsm' and idmahasiswa='$kdmhs'"); 
	
	}
	?>
	<?php
	$angka = @mysql_real_escape_string($_GET['angka']);
	if(isset($_GET['angka'])){
	
	@$call_q("update krs set angka='$angka' where idkrs='$idkhs'"); 
	
	}
	?>
	<?php
	$idkhsp = @mysql_real_escape_string($_GET['idkhsp']);
	if(isset($_GET['idkhsp'])){
	$jumkhsp = @mysql_real_escape_string($_GET['jumkhsp']);
	@$call_q("update p_sks set total2='$jumkhsp',app2='2' where idp_sks='$idkhsp'"); 
	
	}
	?>
	  <form name="form1" method="post" action="">
	  <table width="100%" border="0" align="center" bgcolor="#33FF99" class="table table-bordered table-sm">
		<tr align="center" bgcolor="#7DFF7D" class="success">
		  <td width="117" height="35">Kode Makul</td>
		  <td width="190">Nama Mata Kuliah </td>
		  <td width="84">Semester</td>
		  <td width="76">Kredit</td>
		  <td width="86">Huruf Mutu </td>
		  <td width="185">Dosen</td>
		</tr>
		<?php
		
		
	  $krs = $call_q("select * from krs where idmahasiswa='$mhss[idmahasiswa]' and idsemester='$rsemm[idsemester]' and app='2'    ");
	  $no =1;
	  while($krss = $call_fas($krs)){
	  $sks = $call_q("select idsks,idkejuruan,iddosen,idsemester,idkurikulum FROM sks where idsks='$krss[idsks]'  ");
	$skss = $call_fas($sks);
	  $sm = $call_q("select * from semester where idsemester='$krss[idsemester]' ");
	$smm = $call_fas($sm);
	 $dsn = $call_q("select iddosen,nama,idkejuruan FROM dosen where iddosen='$skss[iddosen]'");
	$dsnn = $call_fas($dsn);
	$kj = $call_q("select idkejuruan,idfakultas,kejuruan FROM kejuruan where idkejuruan='$skss[idkejuruan]'");
	$kjj = $call_fas($kj);
	$fk = $call_q("select idfakultas,fakultas FROM fakultas where idfakultas='$kjj[idfakultas]'");
	$fkk = $call_fas($fk);
	$kr  = $call_q("select idmain,idkurikulum,judul,juduleng,idsemester FROM kurikulum where idkurikulum='$skss[idkurikulum]'");
	$krr = $call_fas($kr);
	 $smtj01 = $call_q("select * from tahun_ajaran where idtahun_ajaran='$smm[idtahun_ajaran]'");
	$smmtj01 = $call_fas($smtj01);
	$total01 =$krss['kt']+$krss['ssp'];
	$total02 = $krss['ts']+$krss['nas'];
	$sub_total = $total01 + $total02;
	$total = $krss['total'];
	  
	  ?>
		<tr align="center" bgcolor="#FFFFFF">
		  <td height="50"><?php echo"<a href=#>$skss[idsks]</a><br>$kjj[kejuruan]"; ?></td>
		  <td><?php echo"$krr[judul]<br><i>$krr[juduleng]</i>
		
		"; ?></td>
		  <td><?php echo"<b>$smm[semester]</b><br>
		
		"; ?></td>
		  <td><?php 
		
		
		echo"$krss[jumlah]";
		?></td>
		  <td>
		  <?php
		  $kuis = $call_q("select * from kuis where idfakultas='$fkk[idfakultas]'");
		  $kuiss = $call_fas($kuis);
		  $kuis_jawab = $call_q("select * from kuis_jawab where idmahasiswa='$uu[idmahasiswa]' and idsks='$krss[idsks]'");
		  $cek_jawab = @mysql_num_rows($kuis_jawab);
		  if($cek_jawab<=0){
		  echo"<a href=# onClick=MM_openBrWindow('ikuis_mhs.php?tahun=$tahun&kdmhs=$kdmhs&idsks=$kuiss[idfakultas]&kdsks=$krss[idsks]','','scrollbars=yes,width=700,height=800')>ISIKAN KUISIONER</a>";
		  }else{
		  ?>
		 <?php
		 
		 if($krss['app2']==1){
			$ht = $krss['jumlah'] * $krss['angka'];
				echo"<a href=v_dkhs.php?idkrs_01=$krss[idkrs]&jumkhs=$ht&tahun=$tahun&kdmhs=$kdmhs&rsm=$rsemm[idsemester]>lihat nilai</a>";
				}elseif($krss['app2']==2){
			
			echo"$krss[huruf]";
			
			}
			}
		 ?>
		 </td>
		  <td><?php echo"$dsnn[nama]"; ?></td>
		</tr>
		<?php
	  $no++;
	 }
	  ?>
	   <?php
		
		
	  $krsp = $call_q("select * from p_sks where idmahasiswa='$mhss[idmahasiswa]' and idsemester='$rsemm[idsemester]'    ");
	  $no =1;
	  while($krssp = $call_fas($krsp)){
	  $sksp = $call_q("select * from praktikum where idpraktikum='$krssp[idpraktikum]' and idsemester='$rsemm[idsemester]' ");
	$skssp = $call_fas($sksp);
	  $smp = $call_q("select * from semester ");
	$smmp = $call_fas($smp);
	 $dsnp = $call_q("select * from dosen where iddosen='$skssp[iddosen]'");
	$dsnnp = $call_fas($dsnp);
	$kjp = $call_q("select * from kejuruan where idkejuruan='$dsnnp[idkejuruan]'");
	$kjjp = $call_fas($kjp);
	$krp  = $call_q("select * from kurikulum where idkurikulum='$skssp[idkurikulum]'");
	$krrp = $call_fas($krp);
	 $smtj01p = $call_q("select * from tahun_ajaran where idtahun_ajaran='$smmp[idtahun_ajaran]'");
	$smmtj01p = $call_fas($smtj01p);
	
	$totalp = $krssp['total'];
	  
	  ?>
		<?php
	  $no++;
	 }
	  ?>
		
	  
		<tr align="center" bgcolor="#FFFFFF">
		  <td height="50" colspan="3">IPK</td>
		  <td height="50"><?php
		  $kp = $call_q("select sum(total2) as kp from p_sks where idmahasiswa='$mhss[idmahasiswa]' and app='2'  and idsemester='$rsemm[idsemester]' ");
		$kkp = $call_fas($kp);
		$kjump = $call_q("select sum(jumlah) as krjp from p_sks where idmahasiswa='$mhss[idmahasiswa]' and app='2'  and idsemester='$rsemm[idsemester]'  ");
		$kjummp = $call_fas($kjump);
	 ?><br>
		  <?php
		  $k = $call_q("select sum(total2) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and idsemester='$rsemm[idsemester]'   ");
		$kk = $call_fas($k);
		$kjum = $call_q("select sum(jumlah) as krj from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2'   and idsemester='$rsemm[idsemester]' ");
		$kjumm = $call_fas($kjum);
		
			$rsem01 = $call_q("select * from rekamsemester where idmahasiswa='$mhss[idmahasiswa]' ");
	$rsemm01 = $call_fas($rsem01);
	
	@$jumtotp = @$kkp['kp'] / @$kjummp['krjp'] ;
	@$jumtot = $kk['kr'] / $kjumm['krj'] ;
	$tmbh = $jumtotp + $jumtot;
	$decjumtot = number_format($tmbh,1,'.','');
	//echo"$rsemm01[ip]";
	if($rsemm['app2']==1){
	echo"Klik Proses IP.SMT";
	}else{
	echo"$decjumtot";
	}
	//}
			
		  ?></td>
		  <td colspan="2">
			<input type="hidden" name="ip" value="<?php echo"$jumtot"; ?>">
			<input name="proses" type="submit" id="proses" value="Proses IP.SMT" class="btn btn-warning">
		 
		  
		  <?php
		if(isset($_POST['proses'])){
	
		if($decjumtot>=4.0){
		@$call_q("update rekamsemester set ip='4.0',bsks='24',app2='2' where idrekamsemester='$tahun'");
		
		echo "<script language='javascript'>alert('PROSES BERHASIL')</script>";
		echo "<script language='javascript'>window.location = 'v_dkhs.php?tahun=$tahun&kdmhs=$kdmhs'</script>";
		exit();
		}elseif($decjumtot>=3.0){
		
	
		@$call_q("update rekamsemester set ip='$decjumtot',bsks='24',app2='2' where idrekamsemester='$tahun'");
		
		echo "<script language='javascript'>alert('PROSES BERHASIL')</script>";
		echo "<script language='javascript'>window.location = 'v_dkhs.php?tahun=$tahun&kdmhs=$kdmhs'</script>";
		exit();
		}else{
		  @$call_q("update rekamsemester set ip='$decjumtot',bsks='21',app2='2' where idrekamsemester='$tahun' ");
		
		echo "<script language='javascript'>alert('PROSES BERHASIL')</script>";
		echo "<script language='javascript'>window.location = 'v_dkhs.php?tahun=$tahun&kdmhs=$kdmhs'</script>";
		exit();
		 }
		 }
		  
		  ?>
		  </td>
		</tr>
	  </table>
	</form>
	<?php } ?>