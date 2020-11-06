	<?php

	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {

	?>
		<body>
		<table width="100%" class="table">
		<?php
			$sm2 = $call_q("$sl idmain,idsemester,semester FROM semester order by idmain desc limit 9");
			while($smm2 = $call_fas($sm2)){
		?>
          <tr class="table-danger">
            <td><?php echo"$smm2[semester]"; ?></td>
          </tr>
          <tr>
            <td>
			
			<table width="100%" border="0" align="center" class="table table-bordered">
		  <tr align="center" bgcolor="#E4E4E4">
			<td width="142" height="35">Kode Matkul </td>
			<td width="237">Mata Kuliah </td>
			<td width="56">Jumlah SKS </td>
			<td width="102">Action</td>
		  </tr>
		  <?php
		 	$sks = $call_q("$call_sel sks where iddosen='$IDDSN' AND idsemester='$smm2[idsemester]'");
		  while($skss = $call_fas($sks)){
		  $sm = $call_q("$sl idsemester,semester FROM semester where idsemester='$skss[idsemester]'");
		$smm = $call_fas($sm);
		 //$dsn1 = $call_q("select * from dosen where iddosen='$skss[iddosen]'");
		//$dsnn1 = $call_fas($dsn);
		$kj = $call_q("$sl idkejuruan,kejuruan FROM kejuruan where idkejuruan='$skss[idkejuruan]'");
		//$kj = $call_q("select * from kejuruan where idkejuruan='$dsnn[idkejuruan]'");
		$kjj = $call_fas($kj);
		$kr  = $call_q("$sl idkurikulum,judul FROM kurikulum where idkurikulum='$skss[idkurikulum]'");
		$krr = $call_fas($kr);
		  
		  ?>
		 <?php
		 
		 ?>
		  <tr align="center" bgcolor="#FFFFFF">
			<td height="50"><?php echo"<a href=#>$skss[idsks]</a><br>$kjj[kejuruan]<br>$skss[idkelas]"; ?></td>
			<td><?php echo"<b>$krr[judul]</b><br>
			<u>Oleh &nbsp; $dsnn[nama]</u>
			"; ?></td>
			<td><?php echo"$skss[jumlah]&nbsp;SKS<br>Kuota &nbsp; $skss[kuota]"; ?><br>
			  <?php 
			$mhs = $call_q("select * from krs where idsks='$skss[idsks]' and app='2'");
			$jummhs = mysql_num_rows($mhs);
			?>
			<?php echo"<a href=# onClick=MM_openBrWindow('../../SU_admin/ctk_absen_harian.php?kddsn=$IDDSN&idsks=$skss[idsks]#GET_DATA','','scrollbars=yes,width=1000,height=600')>Diambil &nbsp; $jummhs</a> "; ?></td>
			<td>&nbsp;</td>
		  </tr>
		<?php }?>
		</table>
			</td>
          </tr>
		  <?php } ?>
        </table>
		
</body>
<?php } ?>
