<?php

	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {

	?>
<body>
		<h4>Perwalian</h4>
	<form method="post">
	<table width="100%" style="max-width:30rem;" class="table" border="0">
          <tr>
            <td>
			<select name="thn" class="form-control" required>
				<?php
					$vth = $call_q("$call_sel tahun_ajaran order by ajaran desc");
							while($vthh = $call_fas($vth)){
									echo"<option value=$vthh[idtahun_ajaran]>$vthh[ajaran]</option>";
							}
				?>
			</select>
			</td>
            <td><button class="btn btn-info" name="go"><i class="fas fa-arrow-alt-circle-right"></i>&nbsp;GO</button></td>
          </tr>
        </table>
	
		<br>
			<?php 
						if(isset($_POST['go'])){
				$THN = @$_POST['thn'];
				
			?>
			
<table width="100%" border="0" align="center" bgcolor="#E4E4E4" class="table table-bordered">
	  <tr align="center">
		<td>&nbsp;</td>
		<td height="31" class="table-warning" >
		<?php   $mhs1 = $call_q("$sl idmahasiswa,iddosen,nama,idtahun_ajaran,idsemester FROM mahasiswa where iddosen='$IDDSN' AND idtahun_ajaran='$THN'");
					$v_mhs1 = $call_fas($mhs1);	
			$jmmhs = $call_nr($mhs1); echo"<b>Total Mahasiswa &nbsp; $jmmhs</b>";
	?>
	</td>
		<td class="table-danger">
		<?php $mhs2 = $call_q("select idmahasiswa,idkejuruan,idsemester,iddosen,nama FROM mahasiswa where iddosen='$IDDSN' and acc=1 and mhs=2  AND idtahun_ajaran='$THN'");
	$jmmhs2 = $call_nr($mhs2); echo"<b>&nbsp; &nbsp;Belum ACC &nbsp; $jmmhs2</b>"; ?>
	</td>
		<td class="success">
		<?php $mhs3 = $call_q("select idmahasiswa,idkejuruan,idsemester,iddosen,nama FROM mahasiswa where iddosen='$IDDSN' and acc=2  AND idtahun_ajaran='$THN'");
	$jmmhs3 = $call_nr($mhs3); echo"<b>&nbsp; &nbsp;Sudah ACC &nbsp; $jmmhs3</b>"; ?>
	</td>
		<td><span class="success">
		  <?php $mhs4 = $call_q("select idmahasiswa,idkejuruan,idsemester,iddosen,nama FROM mahasiswa where iddosen='$IDDSN' and mhs=1  AND idtahun_ajaran='$THN'");
	$jmmhs4 = $call_nr($mhs4); echo"<b>&nbsp; &nbsp;Non Aktif &nbsp; $jmmhs4</b>"; ?>
	<?php $mhs4 = $call_q("select idmahasiswa,idkejuruan,idsemester,iddosen,nama FROM  mahasiswa where iddosen='$IDDSN' and mhs=5  AND idtahun_ajaran='$THN'");
	$jmmhs4 = $call_nr($mhs4); echo"<b>&nbsp; &nbsp;Keluar &nbsp; $jmmhs4</b>"; ?>
		</span></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	  </tr>
	  <tr align="center" bgcolor="#E4E4E4">
		<td width="2%">No</td>
		<td width="20%" height="31"><strong>NIM/NPK</strong></td>
		<td width="12%">APP KRS </td>
		<td width="15%"><strong>NAMA</strong></td>
		<td width="16%"><strong>Semester</strong></td>
		<td width="10%"><strong>IP SM LALU </strong></td>
		<td width="12%"><strong>SKS ACC </strong></td>
		<td width="13%"><strong>SKS DACC </strong></td>
	  </tr>
	  <?php
	   $mhs = $call_q("$sl idmahasiswa,idkejuruan,idsemester,iddosen,nama,idkelas,kode_kelas,idtahun_ajaran,acc from mahasiswa where iddosen='$IDDSN' and mhs='2'  AND idtahun_ajaran='$THN'");
	   //$mhs = $call_q("select * from mahasiswa where iddosen='$IDDSN'");
	   	$jum_mhs = $call_nr($mhs);
	   $no =1;
	while($mhss = $call_fas($mhs)){
	 $ft = $call_q("select * from foto_mhs where idmahasiswa='$mhss[idmahasiswa]' order by idfoto desc limit 1");
	  $ftt  = $call_fas($ft);
	$ang = $call_q("select * from tahun_ajaran where idtahun_ajaran='$mhss[idtahun_ajaran]'");
	$angg = $call_fas($ang);
	$kj = $call_q("select idkejuruan,idfakultas,kejuruan from kejuruan where idkejuruan='$mhss[idkejuruan]'");
	$kjj = $call_fas($kj);
	$kl = $call_q("select * from kelas where idkelas='$mhss[idkelas]'");
	$kll = $call_fas($kl);
	$sm = $call_q("select idsemester,idtahun_ajaran,semester,ajaran from semester where idsemester='$mhss[idsemester]'");
	$smm = $call_fas($sm);
	$rsem = $call_q("select * from rekamsemester where idmahasiswa='$mhss[idmahasiswa]' order by idrekamsemester asc limit 1");
	$rsemm = $call_fas($rsem);
	$k = $call_q("select sum(jumlah) as kr from krs where idmahasiswa='$mhss[idmahasiswa]' and app='2'  and idsemester='$mhss[idsemester]'  ");
		$kk = $call_fas($k);
		$k1 = $call_q("select sum(jumlah) as krt from krs where idmahasiswa='$mhss[idmahasiswa]' and app='1'  and idsemester='$mhss[idsemester]'  ");
		$kk1 = $call_fas($k1);
		//$k1 = $call_q("select sum(jumlah) as krp from p_sks where idmahasiswa='$mhss[idmahasiswa]' and app='2'   ");
		//$kk1 = $call_fas($k1);
		$jumsks = $kk['kr'] ;
		$jumsks5 = $kk1['krt'] ;
		
	?>
	  <tr align="center" bgcolor="#FFFFFF">
		<td><?php echo"$no"; ?></td>
		<td height="40">
		<div id=<?php echo"$mhss[idmahasiswa]"; ?>> <?php echo"<a href=#$mhss[idmahasiswa] onClick=MM_openBrWindow('../SU_admin/m2_mhs.php?mng=vkrs&kdmhs=$mhss[idmahasiswa]#$mhss[idmahasiswa]','','scrollbars=yes,width=880,height=800')>$mhss[idmahasiswa]
			
		</a>"; ?></div></td>
		<td align="left"><center>
		
			<?php if($mhss['acc']==1){?>
			
			<span class="badge badge-danger">Belum Acc</span>
			<?php }else{ ?>
			<span class="badge badge-success">Sudah Acc</span>
			<?php } ?>
			<input type="hidden" name="<?php echo"nim$no"; ?>" value="<?php echo"$mhss[idmahasiswa]"; ?>">
		</center></td>
		<td align="left"><?php echo"<b>$mhss[nama]</b>"; ?><br>
			<br></td>
		<td><?php echo"$smm[semester]&nbsp;$angg[ajaran]&nbsp;$smm[ajaran]"; ?></td>
		<td><?php echo"$rsemm[ip]"; ?></td>
		<td><?php echo"$jumsks"; ?></td>
		<td><?php echo"$jumsks5"; ?></td>
	  </tr>
	  <?php   $no++; } ?>
</table>
	<a href="#"  onClick="MM_openBrWindow('<?php echo"DSN_M_WALI_ACC_ALL.php?SUB=DSN_M_02&IDDSN=$dsnn[iddosen]&kddsn=$IDDSN&THN=$THN#GET_DATA"; ?>','','scrollbars=yes,width=600,height=200')" class="btn btn-success">Acc Keseluruhan</a>

</form>
<?php } ?>
</body>
<?php } ?>