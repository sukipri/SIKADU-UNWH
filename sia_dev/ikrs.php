	<?php //session_start();
	 //include_once"../sc/conek.php";
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
			//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
			header('location:index.php');
		} else {
			//$u = mysql_query("select iduser_mhs,idmahasiswa,username,akses from user_mhs where idmahasiswa='$_SESSION[namauser]'");
			//$uu = mysql_fetch_array($u);
	 ?>
     	<?php $KELAS= @$sql_escape($_GET['KELAS']); ?>
	<h5 class="badge badge-info">  INPUT KRS  &nbsp; ( <?php 
	$rkm = mysql_query("select idrekamsemester,idmahasiswa,idsemester,bsks FROM rekamsemester where idmahasiswa='$mhss[idmahasiswa]' order by idrekamsemester asc limit 1");
	$rkmm = mysql_fetch_array($rkm);
	//echo"BATAS SKS $rkmm[bsks]";
	?>)</h5>
	<div class="alert alert-dismissible alert-success">
	  <b>#INFORMASI PENGISIAN </b>
	  <ul>
	  <li>Periksa dan cek ketersediaan mata kuliah yang di tawarkan pada semester aktif program studi anda.
	  <li>Klik Tambah KRS pada mata kuliah yang sesuai dengan kelas yang anda pilih.
	  <li>KRS anda akan di ACC oleh dosen wali anda, Koordinasikan dengan dosen wali anda
	<li>Lihat KRS anda yang sudah di setujui oleh dosen wali pada menu preview KRS
	<li>Periksalah dengan seksama, jangan sampai ada kesalahan input 
	</ul>
	</div>
	<hr color="#FF8040">
	<?php if($mhss['st']==1){
	
	echo"<center><h1>MAAF SEGERA MELAKUKAN REGISTRASI!</h1></center>";
	}elseif($mhss['st']==3){
	echo"<center><h1>MAAF KRS SUDAH DITUTUP SILAHKAN HUBUNGI BAGIAN AKADEMIK</h1></center>";
	}else{
	
	 ?>
	 <?php
		if(isset($_GET['idpr'])){
		$idpr = @$sql_escape($_GET['idpr']);
		$krt = @$sql_escape($_GET['krt']);
		$jmlkrs = @$sql_escape($_GET['jmlkrs']);
		//$idsks = @$sql_escape($_GET['idsks']);
		$km = mysql_query("select * from krs where idsks='$idpr' and idmahasiswa='$mhss[idmahasiswa]' ");
		$kmm = mysql_fetch_array($km);
		$kr_k  = mysql_query("select * from kurikulum where idkurikulum='$krt'");
		$krr_k = mysql_fetch_array($kr_k);
		$jdl = "VALIDASI KRS";
		 $tgl = date("d-m-Y");
		$isi_mymail = "Mahasiswa dengan nama $mhss[nama] NIM $mhss[idmahasiswa] Meminta VALIDASI MAKUL <b>$krr_k[judul]</b>  <b>$tgl</b> <br><a 						href=?mng=perwalian_mini&kddsn=$mhss[iddosen]#$mhss[idmahasiswa]>Klik Disini</a> ";
		if($kmm['idsks']==$idpr){
		echo "<script language='javascript'>alert('SKS  Sudah Pernah Di ambil')</script>";
		echo "<script language='javascript'>window.location = '?mng=ikrs&kdmhs=$kdmhs'</script>";
		exit();
		}else{
		 include"hijack.php";
		mysql_query("insert into krs(idkrs,idsks,idmahasiswa,idsemester,jumlah)values('','$idpr','$kdmhs','$mhss[idsemester]','$jmlkrs')");
		mysql_query("insert into mymail(untuk,dari,judul,isi,tgl,nama)values('$mhss[iddosen]','$mhss[idmahasiswa]','$jdl','$isi_mymail','$tgl','$mhss[nama]')");
	 		header("location:?mng=KRS_PILIHAN&KELAS=$KELAS");
	 	
	 ?>
			<center><h4><img src="../img/check-32.png"> &nbsp; Makul berhasil Ditambahkan</h4></center>
            <div class="alert alert-dismissible alert-success">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Well done!</strong> Makul berhasil Ditambahkan...
		</div>
		<?php } }  ?>
	<form name="form1" method="post" action="">
	<table width="100%" border="0" align="center" bgcolor="#33FF99" class="table table-bordered table-sm">
	  <tr align="center" bgcolor="#33FF99">
		<td width="142" height="35">Kode Mata Kuliah</td>
		<td width="237">Judul</td>
		<td width="156">Semester</td>
		<td width="56">Jumlah </td>
		<td width="102">Action</td>
	  </tr>
	   
	  <?php
	  
		
	  $psks = $call_q("$call_sel sks where idkejuruan='$mhss[idkejuruan]' and idsemester='$mhss[idsemester]' and idkelas='$KELAS'  order by idsemester asc limit 2000");
	  $no = 1;
	  while($pskss = mysql_fetch_array($psks)){
	 //$sks = mysql_query("select * from sks where idsks='$pskss[idsks]' ");
	//$skss = mysql_fetch_array($sks);
	
			$dsn = mysql_query("select iddosen,idkejuruan,nama from dosen where iddosen='$pskss[iddosen]'");
		$dsnn = mysql_fetch_assoc($dsn);
		$kj = mysql_query("select idkejuruan,idfakultas,kejuruan FROM kejuruan where idkejuruan='$pskss[idkejuruan]'");
		$kjj = mysql_fetch_assoc($kj);
		$kr  = mysql_query("select idmain,idkurikulum,idsemester,judul,juduleng FROM kurikulum where idkurikulum='$pskss[idkurikulum]'");
		$krr = mysql_fetch_assoc($kr);
	  $sm = mysql_query("select idsemester,semester FROM semester where idsemester='$pskss[idsemester]'");
		$smm = mysql_fetch_assoc($sm);
	  
	  ?>
	  <tr align="center" bgcolor="#FFFFFF">
		<td height="50"><?php echo"<a href=#>$pskss[idsks]</a><br>$kjj[kejuruan]<br>$pskss[idkelas]"; ?></td>
		<td><?php echo"<div id=$psks[idsks]><b>$krr[judul]</b><br><i>$krr[juduleng]</i><br>
		<u>Oleh &nbsp; $dsnn[nama]</u><br>Dari &nbsp;$smm[semester]</div>
		"; ?></td>
		<td><?php echo"$smm[semester]<br><b><font color=blue>$pskss[hari]</font><br> $pskss[jam]  WIB <br>	Ruang &nbsp; $pskss[idruang]</b>"; ?></td>
		<td><?php echo"Sks &nbsp; $pskss[jumlah]<br>kuota&nbsp; $pskss[kuota]"; ?><br><?php 
		$mhs = mysql_query("select * from krs where idsks='$pskss[idsks]'");
		$jummhs = mysql_num_rows($mhs);
		
		echo"Diambil &nbsp; $jummhs "; ?></td>
		<td>
		
		<?php
		 $krs01 = mysql_query("select idkrs,idmahasiswa,idsks,app FROM krs where idsks='$pskss[idsks]'   ");
		$krss01 = mysql_fetch_array($krs01);
		$kuota = mysql_num_rows($krs01);
		 $krs1 = mysql_query("select idkrs,idmahasiswa,idsks,app FROM krs where idsks='$pskss[idsks]' and idmahasiswa='$kdmhs'   ");
		$krss1 = mysql_fetch_array($krs1);
		
		//script mahal//
		//if($kuota==$pskss['kuota']){//
		
		//echo"<h3><font color=red>FULL</font></h3>";//
		
		
		
		
	
		
		if($krss1['app']==2){
		echo"sudah di ambil";
	
		}elseif($krss1['app']==1){
		echo"Sedang Diproses";
		}else{
		?>
        	<?php
				//Proses Limitasi pengambilan KRS
					if($cn_vkrs01_sw['jmlkrs01'] >= 24 ){ ?> 
                    	<span class="badge badge-danger">Maaf , sks anda penuh</span>
                    <?php }else{ ?>
						<?php echo"<a href=?mng=KRS_PILIHAN&kdmhs=$kdmhs&idpr=$pskss[idsks]&KELAS=$KELAS&krt=$pskss[idkurikulum]&jmlkrs=$pskss[jumlah]>"; ?>
			<img src="../img/add-32.png" width="32" height="32"><?php echo"</a>"; ?>
         <?php } ?>
		<?php } ?>
		
		</td>
	  </tr>
	  <?php }} ?>
	  <tr bgcolor="#FFFFFF">
		<td colspan="3" align="center" valign="top">&nbsp; </td>
		<td align="center" valign="top"><?php
		//$s = @mysql_query("select sum(jumlah) as sk from praktikum where idkejuruan='$kjj[idkejuruan]' and kelas='$mhss[kelas]' and idsemester='$mhss[idsemester]'");
		//$ss = mysql_fetch_array($s);
		
		//echo"<b>$ss[sk]</b>";
		 ?></td>
		<td>&nbsp;</td>
	  </tr>
	</table>
	<br><center>
	</center>
	
	</form>

	<?php } ?>