<?php //session_start();
	 include_once"../sc/conek.php";
	
		
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
			//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
			header('location:index.php');
		} else {
	 ?>
<body>
	<form name="form1" method="post" action="">
	<table width="624" align="center">
		<tr>
		  <td width="616" colspan="3" valign="top">
		<a href="?aka=vtranskrip"><i class="fa fa-clone"></i>&nbsp;Cetak Transkrip Mahasiswa</a> / <i class="fa fa-clone"></i>&nbsp;Cetak Periode Wisuda --> <a href="?aka=IMPORT_NO_IJASAH"><i class="fa fa-cloud-upload"></i>&nbsp;Upload Nomor Ijasah</a>
		  </td>
		</tr>
		<tr>
		  <td valign="top">
		  <select name="kd_jur" class="form-control" required>
		  <option value="">kode Program Studi</option>
		  <?php
			 $fak = mysql_query("select * from kejuruan order by idkejuruan");
			 while($fakk = mysql_fetch_array($fak)){
			 
			 echo"
			 <option value=$fakk[idkejuruan]>$fakk[idkejuruan]&nbsp; / &nbsp;$fakk[kejuruan]&nbsp;$fakk[progdi]</option>";
			 }
			 
			 ?>
		</select>
		</td>
		  <td valign="top"><input name="cari" type="number" class="form-control" placeholder="Masukan periode Wisuda" id="cari" size="37" required></td>
		  <td valign="top"><button class="btn btn-info" name="cari_data"><i class="fa fa-send"></i>&nbsp;Cari Data</button></td>
		</tr>
	  </table>
	</form>
	<br>
    <table width="100%" border="0" class="table table-bordered">
      <tr class="success">
      	 <td>NO</td>
        <td>NIM</td>
        <td>NAMA</td>
        <td>TL</td>
        <td>TGLL</td>
        <td>NIRL</td>
        <td>TGL NIRL</td>
        <td>NIRM</td>
        <td>No IJS</td>
		<td>STATUS AWAL</td>
        <td>STATUS MHS</td>
        <td>PERIODE</td>
        <td>IPK</td>
        <td>KTP</td>
      </tr>
	  <?php
	  		if(isset($_POST['cari_data'])){
				$nama = mysql_real_escape_string(trim($_POST['cari']));
				$kd_jur = mysql_real_escape_string(trim($_POST['kd_jur']));
				$mhs = mysql_query("select * from mahasiswa WHERE periode_wisuda='$nama' AND idkejuruan='$kd_jur' order by nama asc limit 100 ");
				$no = 1;
					while($mhss = mysql_fetch_array($mhs)){
	  ?>
      <tr>
      	<td><?php echo"$no"; ?></td>
        <td><?php echo"$mhss[idmahasiswa]"; ?></td>
        <td><?php echo"$mhss[nama]"; ?></td>
        <td><?php echo"$mhss[tempat_lahir]"; ?></td>
        <td><?php echo"$mhss[tgl_lahir]"; ?></td>
        <td><?php echo"$mhss[nirl]"; ?></td>
        <td><?php echo"$mhss[tgl_nirl]"; ?></td>
        <td><?php echo"$mhss[nirm]"; ?></td>
        <td><?php echo"$mhss[nomor_ijasah]"; ?></td>
		<td><?php echo"$mhss[asal]"; ?></td>

        <td>
		<?PHP 
		  
		  if($mhss['mhs']==2){
		  echo"<b><font color=green>AKTIF</font></b>";
		  }elseif(
		  $mhss['mhs']==1){
		  echo"<b><font color=grey>NON-AKTIF</font></b>";
		  }elseif(
		  $mhss['mhs']==3){
		  echo"<b><font color=blue>CUTI</font></b>";
		  }elseif(
		  $mhss['mhs']==4){
		  echo"<b><font color=#006666>LULUS</font></b>";
		  }elseif(
		  $mhss['mhs']==5){
		  echo"<b><font color=red>KELUAR</font></b>";
		  
		   }elseif(
		  $mhss['mhs']==6){
		  echo"<br><b><font color=red>TRANSFER</font></b>";
		  }
		  
		   ?>
		</td>
        <td><?php echo"$mhss[periode_wisuda]"; ?></td>
        <td>
		
		<?php	
			
			//$k = mysql_query("select sum(jumlah) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and app2='2' and angka>'1'");
			$k = mysql_query("select sum(jumlah) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and angka>'1'");
			$kk = mysql_fetch_array($k);
			
			$k2 = mysql_query("select sum(jumlah_baru) as krt from mahasiswa_trans where idmahasiswa='$mhss[idmahasiswa]'  ");
			$kk2 = mysql_fetch_array($k2);
			@$hit_krs = $kk['kr'] + $kk2['krt'];
			//echo"<br><b>$hit_krs</b>"; 
			
			//total nilai
			$aa = mysql_query("select sum(jumlah_baru*angka_baru) as xx from mahasiswa_trans where idmahasiswa='$mhss[idmahasiswa]'");
			$aaa=mysql_fetch_array($aa);
			//$bb= mysql_query("select sum(jumlah*angka) as yy from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and app2='2' and angka>'1' ");
			$bb= mysql_query("select sum(jumlah*angka) as yy from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2'  and angka>'1' ");
			$bbb=mysql_fetch_array($bb);
			
			@$hit_total=$aaa['xx'] + $bbb['yy'];
			@$ipk=$hit_total / $hit_krs;
				@$ipk2=@$hit_total / $hit_krs;
				echo @number_format($ipk2,2);
			?>
			<?php
			//total nilai
		$aa = mysql_query("select sum(jumlah_baru*angka_baru) as xx from mahasiswa_trans where idmahasiswa='$mhss[idmahasiswa]'");
		$aaa=mysql_fetch_array($aa);
		
		$bb= mysql_query("select sum(jumlah*angka) as yy from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and app2='2' and angka>'1'");
		$bbb=mysql_fetch_array($bb);
		
		@$hit_total=$aaa['xx'] + $bbb['yy'];
		@$ipk=$hit_total / $hit_krs;
		//echo number_format($ipk,2);
			
		 
		 
			//$rk = mysql_query("select  sum(ip) as ips from rekamsemester where idmahasiswa='$kdmhs'");
		//$rkk = mysql_fetch_array($rk);
			//echo"$rkk[ips]";
			
	 ?>
		</td>
		<td><?php echo"$mhss[23]"; ?></td>
      </tr>
     
	  <?php 
$no++;
	} ?>  
	   <tr>
        <td><a href="<?php echo"CETAK_PERIODE_XLS.php?PRD=$nama&JUR=$kd_jur"; ?>" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-file-excel-o"></i>Cetak XLS</a></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	  <?php } ?>
    </table>
	
</body>
<?php } ?>
