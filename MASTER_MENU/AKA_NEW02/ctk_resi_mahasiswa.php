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
	  <th>STATUS </th>
		<th>STATUS MAHASISWA</th>
		<th>TOTAL SKS</th>
		<th>PERIODE WISUDA</th>
	</tr>
	
<?php

	//query menampilkan data
	$sql = mysql_query("SELECT * FROM mahasiswa where idkejuruan='$idkj' ORDER BY idmahasiswa ASC");
	$no = 1;
	$i =3;
	while($data = mysql_fetch_assoc($sql)){
	$k = mysql_query("select sum(jumlah) as kr from krs where idmahasiswa='$data[idmahasiswa]' and app='2' and   idsemester='$idsm'  ");
	$kk = mysql_fetch_array($k);
	$ks = mysql_query("select sum(jumlah) as krs from krs where idmahasiswa='$data[idmahasiswa]' and app='2'    ");
	$kks = mysql_fetch_array($ks);
		?>
	   		
		
		<tr align="left" >
			
		<td><?php echo"$no"; ?></td>
		<td><?php echo"$data[idmahasiswa]"; ?></td>
		<td><?php echo"$data[nama]"; ?></td>
		<td><?php echo"$data[idkelas]"; ?></td>
		<td><?php echo"$data[tempat_lahir]"; ?></td>
		<td><?php echo"$data[tgl_lahir]"; ?></td>
		<td><?php echo"$data[idsemester]"; ?></td>
		<td><?php echo"$kk[kr]"; ?></td>
		<td><?php echo"$data[asal]"; ?></td>
		<td><?php echo"$data[mhs]"; ?></td>
		
		<td> =IF(<?php echo"J$i"; ?>=1,"non aktif",IF(<?php echo"J$i"; ?>=2,"aktif",IF(<?php echo"J$i"; ?>=3,"cuti",IF(<?php echo"J$i"; ?>=4,"lulus","keluar"))))</td>
		  
		<td><?php echo"$kks[krs]"; ?></td>
		<td><?php echo"$data[periode_wisuda]"; ?></td>
			
		 <?php
	$no++;
	$i++;
  }
	?>
	
	
	
	
	
</table>
