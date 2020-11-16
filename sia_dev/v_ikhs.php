	<?php //session_start();
	 include_once"../sc/conek.php";
	
		
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
			//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
			header('location:index.php');
		} else {
		//$u = $call_q("select * from user where namauser='$_SESSION[namauser]'");
		//$uu = $call_fas($u);
		
	 ?>

	<h3 class="badge badge-info">Lihat KHS </h3>
	  <div class="alert alert-dismissible alert-success">
	  <b>#INFORMASI PENGISIAN</b>
      <ul>
	  <li>Untuk Melihat Nilai di KHS silahkan masuk pada MANAJEMEN KHS
	  <li> Isi form kuisioner penilaian untuk masing-masing dosen pengampu anda 
	  <li>Klik Proses IPK untuk melihat total IPK anda 
	  <li>Anda bisa mencetak KHS pada Print KHS</li> 
	  </ul>
	 <p>&nbsp;</p> 
	</div>
	<a href="#GRAFIK" class="btn btn-primary btn-sm"><i class="fas fa-chart-pie"></i>&nbsp;Grafik IPK</a>	
	<hr color="#FF8000">
	
	<table width="100%" border="0" align="center" bgcolor="#00B058" style="max-width:60rem;" class="table table-bordered table-sm">
	  <thead>
      <tr align="center" bgcolor="#00E171">
		<td width="27%" height="32">Tahun Ajaran </td>
		<td width="12%">SKS</td>
		<td width="23%">IPS</td>
		<td colspan="2">ACTION</td>
	  </tr>
      </thead>
	  <?php
	  $rsem = $call_q("select * from rekamsemester where idmahasiswa='$mhss[idmahasiswa]'");
	while($rsemm = $call_fas($rsem)){
	 $sm = $call_q("select  idsemester,semester,idtahun_ajaran,ajaran FROM semester where idsemester='$rsemm[idsemester]' order by `semester`,`idmain` ASC  ");
	$smm = $call_fas($sm);
	 $smtj01 = $call_q("select * from tahun_ajaran where idtahun_ajaran='$smm[idtahun_ajaran]'");
	$smmtj01 = $call_fas($smtj01);
	 $k = $call_q("select sum(jumlah) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and idsemester='$rsemm[idsemester]'  ");
		$kk = $call_fas($k);
		 $k1 = $call_q("select sum(jumlah) as krp from p_sks where idmahasiswa='$mhss[idmahasiswa]' and app='2' and  idsemester='$rsemm[idsemester]'  ");
		$kk1 = $call_fas($k1);
		$jumsks = $kk['kr']+$kk1['krp'];
	  ?>
	  <tr align="center" bgcolor="#FFFFFF">
		<td height="53"><?php echo"$smm[semester]&nbsp; $smm[ajaran]&nbsp;$smmtj01[ajaran]"; ?></td>
		<td><?php echo"$jumsks"; ?></td>
		<td><?php echo"$rsemm[ip]"; ?></td>
		<td width="22%">
		<?php
		 $k = $call_q("select sum(total) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2'   and idsemester='$rsemm[idsemester]'");
		$kk = $call_fas($k);
		$kkjum = $kk['kr'];
		if($kkjum<=0){
		echo"
		<img src=../img/copy-32.png width=24 height=25 border=0>MANAJEMEN KHS ";
		}else{
		 ?>
		
		<?php
				echo" <a href=# onClick=MM_openBrWindow('v_dkhs.php?tahun=$rsemm[idrekamsemester]&kdmhs=$kdmhs','','scrollbars=yes,width=800,height=800')><img src=../img/copy-32.png width=24 height=25 border=0>MANAJEMEN KHS </a>";
		}?></td>
		<td width="16%">
		<?php
		 $k = $call_q("select sum(total) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2'    and idsemester='$rsemm[idsemester]'");
		$kk = $call_fas($k);
		$kkjum = $kk['kr'];
		if($kkjum<=0){
		echo"
		<img src=../img/copy-32.png width=24 height=25 border=0>PRINT KHS ";
		}else{
		 ?>
		
		<?php
			echo"<a href=# onClick=MM_openBrWindow('ctk_khs_mhs.php?tahun=$rsemm[idrekamsemester]&kdmhs=$kdmhs','','scrollbars=yes,width=800,height=800')><img src=../img/copy-32.png width=24 height=25 border=0>PRINT KHS </a>";
		}?></td>
	  </tr>
	 <?php } ?>
	</table>
	<br>
	<div id="GRAFIK">
	<?php include"grafik_mahasiswa.php"; ?>
	</div>
    <?php } ?>
    