<?php
//include"../sc/conek.php";
	$mhs01 = mysql_query("select * from mahasiswa where idmahasiswa='$mhss[idmahasiswa]'");
	while($mhss01 = mysql_fetch_array($mhs01)){
	$hj = mysql_query("select * from krs where idmahasiswa='$mhss01[idmahasiswa]' and idsemester='$mhss01[idsemester]'");
	$hjj = mysql_num_rows($hj);
	if( $hjj <= 0){
	
	mysql_query("update mahasiswa set krs='2' where idmahasiswa='$mhss01[idmahasiswa]'");
	mysql_query("update mahasiswa set mhs='2' where idmahasiswa='$mhss01[idmahasiswa]'");
	}else{
	
	}
	}

?>
