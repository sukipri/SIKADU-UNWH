<?php
		$tr = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]' and left(idsks,6)='FAC101' order by idkrs desc limit 1");//Farmakoterapi Terapan
		$trr = mysql_fetch_assoc($tr);
		
		$tr2 = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]' and left(idsks,6)='FAC102' order by idkrs desc limit 1");//Pelayanan Kefarmasian
		$trr2 = mysql_fetch_assoc($tr2);
		
		$tr3 = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]' and left(idsks,6)='FAC103' order by idkrs desc limit 1");//Compounding and Dispensing
		$trr3 = mysql_fetch_assoc($tr3);
		
		$tr4 = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]' and left(idsks,6)='FAC104' order by idkrs desc limit 1");//Manajemen Farmasi dan SDM
		$trr4 = mysql_fetch_assoc($tr4);
		
		$tr5 = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]' and left(idsks,6)='FAE101' order by idkrs desc limit 1");//Ilmu Kesehatan Masyarakat
		$trr5 = mysql_fetch_assoc($tr5);
		
		$tr6 = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]' and left(idsks,6)='FAD101' order by idkrs desc limit 1");//Etika dan Perundang-undangan Farmasi
		$trr6 = mysql_fetch_assoc($tr6);
		
		$tr7= mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]' and left(idsks,6)='FAC105' order by idkrs desc limit 1");//Komunikasi dan Konseling
		$trr7 = mysql_fetch_assoc($tr7);
		
		$tr8 = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]' and left(idsks,8)='UNA201FM' order by idkrs desc limit 1");//Teologi Islam
		$trr8 = mysql_fetch_assoc($tr8);
		
		$tr9 = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]' and left(idsks,6)='FAC106' order by idkrs desc limit 1");//Farmasi Industri
		$trr9 = mysql_fetch_assoc($tr9);
		
		$tr10 = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]' and left(idsks,6)='FAC108' order by idkrs desc limit 1");//Farmasi Rumah Sakit
		$trr10 = mysql_fetch_assoc($tr10);
		
		$tr11 = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]' and left(idsks,6)='FAC109' order by idkrs desc limit 1");//Swamedikasi
		$trr11 = mysql_fetch_assoc($tr11);
		
		$tr12 = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]' and left(idsks,6)='FAC118' order by idkrs desc limit 1");//Formulasi Teknologi Sediaan Farmasi
		$trr12 = mysql_fetch_assoc($tr12);
		
		$tr13 = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]' and left(idsks,6)='FAC119' order by idkrs desc limit 1");//JAMINAN KUALITAS OBAT DAN MAKANAN
		$trr13 = mysql_fetch_assoc($tr13);
		
		$tr14 = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]' and left(idsks,6)='FAE201' order by idkrs desc limit 1");//Praktek Kerja Profesi di Apotek
		$trr14 = mysql_fetch_assoc($tr14);
		
		$tr15 = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]' and left(idsks,6)='FAE202' order by idkrs desc limit 1");//Praktek Kerja Profesi di Pemerintahan
		$trr15 = mysql_fetch_assoc($tr15);
		
		$tr16 = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]' and left(idsks,6)='FAE203' order by idkrs desc limit 1");//Praktek Kerja Profesi di Rumah Sakit
		$trr16 = mysql_fetch_assoc($tr16);
		
		$tr17 = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]' and left(idsks,6)='FAE204' order by idkrs desc limit 1");//PRAKTEK KERJA PROFESI DI INDUSTRI
		$trr17 = mysql_fetch_assoc($tr17);
		
		$tr18 = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]' and left(idsks,6)='FAC110' order by idkrs desc limit 1");
		$trr18 = mysql_fetch_assoc($tr18);
		
		$tr19 = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]' and left(idsks,6)='FAC111' order by idkrs desc limit 1");
		$trr19 = mysql_fetch_assoc($tr19);
		
		//$tr18 = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]' and left(idsks,6)='FAC112' order by idkrs desc limit 1");
		//$trr18 = mysql_fetch_assoc($tr20);
		//$tr19 = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]' and left(idsks,6)='FAC113' order by idkrs desc limit 1");
		//$trr19 = mysql_fetch_assoc($tr21);
		//$tr20 = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]' and left(idsks,6)='FAC114' order by idkrs desc limit 1");
		//$trr20 = mysql_fetch_assoc($tr22);
  		
?>