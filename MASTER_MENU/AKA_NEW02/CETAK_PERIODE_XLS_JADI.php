<?php  include_once"../sc/conek.php";  ?>
<body>
	<h4>CETAK PERIODE WISUDA</h4>
    <table width="100%" border="1" rules="all">
      <tr class="success">
        <td>NIM</td>
        <td>NAMA</td>
        <td>TL</td>
        <td>TGLL</td>
        <td>NIRL</td>
        <td>TGL NIRL</td>
        <td>NIRM</td>
        <td>No IJS</td>
		<td>TGL_LULUS</td>
        <td>STATUS MHS</td>
		<td>ASAL STUDI</td>
        <td>PERIODE</td>
        <td>IPK</td>
         <td>KTP</td>
      </tr>
	  <?php
	  		
					$PRD=@mysql_real_escape_string($_GET['PRD']);
					$JUR=@mysql_real_escape_string($_GET['JUR']);
				$mhs = mysql_query("select * from mahasiswa WHERE periode_wisuda='$PRD' AND idkejuruan='$JUR' ");
				$no = 1;
					while($mhss = mysql_fetch_array($mhs)){
	  ?>
      <tr>
        <td><?php echo"$mhss[idmahasiswa]"; ?></td>
        <td><?php echo"$mhss[nama]"; ?></td>
        <td><?php echo"$mhss[tempat_lahir]"; ?></td>
        <td><?php echo"$mhss[tgl_lahir]"; ?></td>
        <td><?php echo"$mhss[nirl]"; ?></td>
        <td><?php echo"$mhss[tgl_nirl]"; ?></td>
        <td><?php echo"$mhss[nirm]"; ?></td>
        <td><?php echo"$mhss[nomor_ijasah]"; ?></td>
		<td><?php echo"$mhss[tgl_wisuda]"; ?></td>
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
		 <td><?php echo"$mhss[asal]"; ?></td>
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
		<td><?php echo"'$mhss[23]"; ?></td>
      </tr>
	  <?php }  ?>
    </table>
</body>

