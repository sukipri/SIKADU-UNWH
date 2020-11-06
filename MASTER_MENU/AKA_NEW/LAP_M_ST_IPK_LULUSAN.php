<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
<table width="150%" style="max-width:60rem;" class="table table-bordered table-striped" border="0">
      <tr align="center" class="table-info">
        <td width="2%">No</td>
        <td width="16%">Program Studi</td>
        <td width="21%">Program Pendidikan</td>
        <td width="12%">Jumlah Mahasiswa Lulus</td>
        <td width="18%">Rerata IPK <br>
          Genap 2016/2017</td>
        <td width="9%">Rerata IPK <br>
        Gasal 2017/2018</td>
        <td width="13%">Rerata IPK <br>
        Genap 2017/2018</td>
        <td width="9%">Rerata IPK <br>
        Gasal 2018/2019 </td>
      </tr>
	  <?php 
	  	$no = 1;
	  	$vkej = $call_q("$sl idkejuruan,idfakultas,idjur,progdi,kejuruan FROM kejuruan order by idjur");
			while($vkejj = $call_fas($vkej)){
				$vsks = $call_q("$sl idsks,idkejuruan,jumlah FROM sks WHERE idkejuruan='$vkejj[idkejuruan]'");
					$vskss = $call_fas($vsks);
						$jum_vskss = $call_nr($vsks);
			$jum_vmhs = $call_q("$sl idmahasiswa,idkejuruan,mhs FROM mahasiswa WHERE idkejuruan='$vkejj[idkejuruan]' AND mhs='4'");
				$vmhss = $call_fas($jum_vmhs);
				$jum_vmhss = $call_nr($jum_vmhs);
					$nom_jum_vmhss = @$nf($jum_vmhss);
			
		
	
	//$k = $call_q("select sum(jumlah) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and app2='2' and angka>'1'");
	$k = $call_q("$sl sum(angka) as jum_krs FROM krs where idkejuruan='$vkejj[idkejuruan]' and app='2' and idsemester='118'");
	$k_02 = $call_q("$sl sum(jumlah) as jum_krs_02 FROM krs where idkejuruan='$vkejj[idkejuruan]' and app='2' and idsemester='118'");
		$kk = $call_fas($k);
		$kk_02 = $call_fas($k_02);
		$jum_kk = $call_nr($k);
			$hit_ipk = $kk_02['jum_krs_02'] * $kk['jum_krs'] ;
			$hit_ipk_02 = $hit_ipk / $kk_02['jum_krs_02'];
			$jum_ipk = @$nf($hit_ipk_02);
		
			
		?>
      <tr>
        <td><?php echo"$no"; ?></td>
        <td><?php echo"$vkejj[kejuruan]"; ?></td>
        <td>
		<?php
			if($vkejj['progdi']=="S-1"){ echo"Sarjana";}elseif($vkejj['progdi']=="S-2"){  echo"Megister"; }elseif($vkejj['progdi']=="S-3"){ echo"Doktor";}
		?>
		</td>
        <td align="right"><?php echo"<b>$nom_jum_vmhss</b>"; ?></td>
        <td>        <?php	
	
	//$k = mysql_query("select sum(jumlah) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and app2='2' and angka>'1'");
	$k = mysql_query("select sum(krs.jumlah) as kr from krs, mahasiswa  where krs.idmahasiswa=mahasiswa.idmahasiswa and  krs.app='2' and krs.angka>'1' and krs.idkejuruan='$vkejj[idkejuruan]' and krs.idsemester='216' and mahasiswa.mhs='4'");
	$kk = mysql_fetch_array($k);
	
	//$k2 = mysql_query("select sum(jumlah_baru) as krt from mahasiswa_trans where idkejuruan='$vkejj[idkejuruan]' ");
	//$kk2 = mysql_fetch_array($k2);
	//$hit_krs = $kk['kr'] + $kk2['krt'];
	$hit_krs = $kk['kr'];
	echo"SKS=$hit_krs"; 
	
	//total nilai
//$aa = mysql_query("select sum(jumlah_baru*angka_baru) as xx from mahasiswa_trans where idmahasiswa='$kdmhs'");
//$aaa=mysql_fetch_array($aa);
//$bb= mysql_query("select sum(jumlah*angka) as yy from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and app2='2' and angka>'1' ");
//$bb= mysql_query("select sum(krs.jumlah * krs.angka) as yy from krs, mahasiswa where krs.idmahasiswa=mahasiswa.idmahasiswa and app='2'  and angka>'1' and idkejuruan='$vkejj[idkejuruan]'  and idsemester='216' mahasiswa.mhs='4'");
$bb = mysql_query("select sum(krs.jumlah*krs.angka) as yy from krs, mahasiswa  where krs.idmahasiswa=mahasiswa.idmahasiswa and  krs.app='2' and krs.angka>'1' and krs.idkejuruan='$vkejj[idkejuruan]' and krs.idsemester='216' and mahasiswa.mhs='4'");
$bbb=mysql_fetch_array($bb);

//$hit_total=$aaa['xx'] + $bbb['yy'];
$hit_total= $bbb['yy'];
$ipk=$hit_total / $hit_krs;
	echo"<br>MUTU=$hit_total";
	
	?>
        <?php	
	
	//$k = mysql_query("select sum(jumlah) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and app2='2' and angka>'1'");
	$k = mysql_query("select sum(krs.jumlah) as kr from krs, mahasiswa  where krs.idmahasiswa=mahasiswa.idmahasiswa and  krs.app='2' and krs.angka>'1' and krs.idkejuruan='$vkejj[idkejuruan]' and krs.idsemester='216' and mahasiswa.mhs='4'");
	//$k = mysql_query("select sum(jumlah) as kr from krs where  app='2' and angka>'1' and idkejuruan='$vkejj[idkejuruan]'  and idsemester='216' ");
	$kk = mysql_fetch_array($k);
	
	//$k2 = mysql_query("select sum(jumlah_baru) as krt from mahasiswa_trans where idmahasiswa='$kdmhs'  ");
	//$kk2 = mysql_fetch_array($k2);
	$hit_krs = $kk['kr'];
	//echo"<br><b>$hit_krs</b>"; 
	
	//total nilai
//$aa = mysql_query("select sum(jumlah_baru*angka_baru) as xx from mahasiswa_trans where idmahasiswa='$kdmhs'");
//$aaa=mysql_fetch_array($aa);
//$bb= mysql_query("select sum(jumlah*angka) as yy from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2' and app2='2' and angka>'1' ");
//$bb= mysql_query("select sum(jumlah*angka) as yy from krs where app='2'  and angka>'1' and idkejuruan='$vkejj[idkejuruan]'  and idsemester='216'");
$bb = mysql_query("select sum(krs.jumlah*krs.angka) as yy from krs, mahasiswa  where krs.idmahasiswa=mahasiswa.idmahasiswa and  krs.app='2' and krs.angka>'1' and krs.idkejuruan='$vkejj[idkejuruan]' and krs.idsemester='216' and mahasiswa.mhs='4'");
$bbb=mysql_fetch_array($bb);

$hit_total=$bbb['yy'];
$ipk=$hit_total / $hit_krs;
	$ipk2=$hit_total / $hit_krs;
	echo "RERATA IPK=".number_format($ipk2,2)."<BR>";
	echo "MIN IPK=".number_format($ipk2,2)."<BR>";
	echo "MAX IPK=".number_format($ipk2,2)."<BR>";
	?></td>
        <td>&nbsp;          </td>
        <td>&nbsp;          </td>
        <td>&nbsp;          </td>
      </tr>
	  <?php $no++; } ?>
</table>
</body>
<?php } ?>
