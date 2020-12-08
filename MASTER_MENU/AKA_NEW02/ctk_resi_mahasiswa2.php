<?php  
include_once"../sc/conek.php";  	
//$idkj = @mysql_real_escape_string($_GET['idkj']);  
//$idsm = @mysql_real_escape_string($_GET['idsm']);  
//$fak = mysql_query("select * from kejuruan where idkejuruan='$idkj'");
		 //$fakk = mysql_fetch_array($fak);
		 ?>
	<table border="1">
	<tr>
	  <th><?php echo"$fakk[kejuruan]"; ?></th>
	  <th>&nbsp;</th>
	  <th>&nbsp;</th>
	  <th>&nbsp;</th>
	  <th>&nbsp;</th>
	  <th>&nbsp;</th>
	  <th>&nbsp;</th>
	   <th>&nbsp;</th>
	   <th>&nbsp;</th>
	   <th>&nbsp;</th>
	   <th>&nbsp;</th>
	  
	  </tr>
	<tr>
		<th>NO</th>
		<th>NIM</th>
		<th>NAMA</th>
		<th>KELAS</th>
		<th>TEMPAT LHR</th>
		<th>TGL LHR</th>		
		<th>WDMK AKTIF</th>
		<th>SKS AKTIF</th>
		<th>STATUS ASAL</th>
		<th>STATUS MAHASISWA</th>
		<th>TOTAL SKS</th>
		<th>PERIODE WISUDA</th>
	</tr>
	<?php
	//koneksi ke database

	
	//query menampilkan data
	$sql = mysql_query("SELECT * FROM mahasiswa where idkejuruan='$idkj' ORDER BY idmahasiswa ASC");
	$no = 1;
	while($data = mysql_fetch_assoc($sql)){
	$k = mysql_query("select sum(jumlah) as kr from krs where idmahasiswa='$data[idmahasiswa]' and app='2' and   idsemester='$idsm'  ");
	$kk = mysql_fetch_array($k);
	$ks = mysql_query("select sum(jumlah) as krs from krs where idmahasiswa='$data[idmahasiswa]' and app='2'    ");
	$kks = mysql_fetch_array($ks);
		echo '
		<tr>
			<td>'.$no.'</td>
			<td>'.$data['idmahasiswa'].'</td>
			<td>'.$data['nama'].'</td>
			<td>'.$data['idkelas'].'</td>
			<td>'.$data['tempat_lahir'].'</td>
			<td>'.$data['tgl_lahir'].'</td>
			<td>'.$kk['idsemester'].'</td>
			<td>'.$kk['kr'].'</td>
			<td>'.$kk['asal'].'</td>
			<td>'.$kk['mhs'].'</td>
			<td>'.$kks['krs'].'</td>
			<td>'.$data['periode_wisuda'].'</td>
		</tr>
		';
		$no++;
	}
	?>
</table>
