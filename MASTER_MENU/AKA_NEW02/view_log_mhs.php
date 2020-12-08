<?php  include_once"../sc/conek.php";  ?>
	<table border="1">
	<tr>
		<th>NIM</th>
		<th>SEMESTER</th>
		<th>KODE PROGDI</th>
		<th>NAMA</th>
		<th>ALAMAT</th>
	</tr>
	<?php
	//koneksi ke database
	$idkj = @mysql_real_escape_string($_GET['idkj']);
	
	//query menampilkan data
	$sql = mysql_query("SELECT * FROM mahasiswa where idkejuruan='$idkj' ORDER BY idmahasiswa ASC");
	$no = 1;
	while($data = mysql_fetch_assoc($sql)){
		echo '
		<tr>
			<td>'.$data['idmahasiswa'].'</td>
			<td>'.$data['idsemester'].'</td>
			<td>'.$data['idkejuruan'].'</td>
			<td>'.$data['nama'].'</td>
			<td>'.$data['alamat'].'</td>
		</tr>
		';
		$no++;
	}
	?>
</table>