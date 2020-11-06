<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
		?>
	
		<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
        </script>
		<body>
		<?php
			$idb = @$sql_escape($_GET['idb']);
			if(isset($_GET['idb'])){
				$call_q("delete from biaya_02 where idbiaya_02='$idb'");
			
			}
		
		?>
		<body>
		
		<form name="form1" method="post" action="">
		  <h4>Import Tagihan Mahasiswa</h4>
		  <table width="600" border="0" class="table" style="max-width:40rem; ">
			<tr>
			  <td width="305">
			  <select required name="kj" id="kj" class="form-control">
				<option value="">kode Program Studi</option>
				<?php
				 $fak = $call_q("select * from kejuruan order by idkejuruan");
				 while($fakk = $call_fas($fak)){
				 
				 echo"
				 <option value=$fakk[idkejuruan]>$fakk[idkejuruan]&nbsp; / &nbsp;$fakk[kejuruan]&nbsp;$fakk[progdi]</option>";
				 }
				 
				 ?>
			  </select></td>
			  <td width="141"><select required name="ang" id="ang" class="form-control">
				<option value="">Tahun</option>
				<?php
				 $aj = $call_q("select * from tahun_ajaran order by ajaran asc limit 200");
				 while($ajj = $call_fas($aj)){
				 
				 echo"
				 <option value=$ajj[idtahun_ajaran]>$ajj[ajaran]</option>";
				 }
				 
				 ?>
			  </select></td>
			  <td width="142"><input name="go" type="submit" class="btn btn-success" id="go" value="Submit"></td>
			</tr>
		  </table>
		  <br>
		  <?php if(isset($_POST['go'])){ ?>
		  <table width="600" border="0" class="table table-bordered table-striped">
			<tr class="table-success">
			  <td>#</td>
			  <td height="33"><strong>PRODI</strong></td>
			  <td><strong>KELAS</strong></td>
			  <td><strong>NAMA</strong></td>
			  <td><strong>NIM</strong></td>
			  <td><strong>KODE,REMARK &amp; KETERANGAN </strong></td>
			  <td>INPUT</td>
			</tr>
			<?PHP 
				
				$kj = @$_POST['kj'];
				$ang = mysql_real_escape_string($_POST['ang']);
				$no = 1;
				$km = $call_q("select idmahasiswa,idkejuruan,idtahun_ajaran,idsemester,iddosen,nama,kode_kelas,idgelombang FROM mahasiswa WHERE idkejuruan='$kj' and idtahun_ajaran='$ang' and mhs='2'");
			while($kmm = $call_fas($km)){
			$fakj = $call_q("select idkejuruan,idfakultas,kejuruan from kejuruan where idkejuruan='$kmm[idkejuruan]'");
			 $fakkj = $call_fas($fakj);
			 $gl = $call_q("select * from gelombang where idgelombang='$kmm[idgelombang]'");
	$gll = $call_fas($gl);
			
		 ?>
		<tr>
		  <td><?php echo"$no"; ?></td>
		  <td height="36"><?php echo"$fakkj[kejuruan]<br>$gll[gelombang] / $gll[tahun]"; ?></td>
		  <td><?php echo"$kmm[kode_kelas]"; ?></td>
		  <td><?php echo"$kmm[nama]"; ?></td>
		  <td><?php echo"$kmm[idmahasiswa]"; ?></td>
		  <td>
		  <?php 
			  //$by = $call_q("select * from biaya_02 where NIM='$kmm[idmahasiswa]' order by THN ");
				
				//while($byy = $call_fas($by)){
				//$k1 = @number_format($byy['NOMINAL'],"0","",".");
					//if($byy['app']==1){ echo"<font color=red><b>#</b></font>";
					//}elseif($byy['app']==2){echo"<font color=green><b>#</b></font>";}
					//echo"&nbsp;$byy[REMARK]&nbsp;[$byy[TGL]]-[$byy[THN] / $byy[KODE]-$k1&nbsp;$byy[KETERANGAN]&nbsp;<a href=#biaya  onClick=MM_openBrWindow('../../BU/edit_add_biaya.php?idbiaya=$byy[idbiaya_02]','','scrollbars=yes,width=700,height=450')>[Edit]</a>&nbsp;&nbsp;&nbsp;"; ?>
					<!-- [<a href="<?php //echo""; ?>" onClick="return konfirmasi()">Hapus</a>]<br> -->
				
				<?php
					//}
					$jumby = $call_q("select sum(NOMINAL) as totby from biaya_02 where NIM='$kmm[idmahasiswa]' AND APP='1'");
				$jumbyy = $call_fas($jumby);
				$k3 = @number_format($jumbyy['totby'],"0","",".");
							
					echo "<strong>TOTAL:&nbsp;Rp.$k3";
			 ?> 
			
			 
			 
			 
			 
			 </td>
		  <td>
          <!-- <a href="#biaya"  onClick="MM_openBrWindow('../../BU/add_biaya.php?<?php //echo"kdmhs=$kmm[idmahasiswa]"; ?>','','scrollbars=yes,width=700,height=450')" class="btn btn-success"><i class="fas fa-money-check-alt"></i>&nbsp;INPUT BIAYA</a> -->
          </td>
		</tr>
		<?php
		$no++;}
		?>
		
		<tr>

		  <td height="36"><div id="total"></div></td>
		  <td height="36">&nbsp;</td>
		  <td>&nbsp;</td>
		  <td height="36">&nbsp;</td>
		  <td height="36">TOTAL</td>
		  <td height="36"><?PHP 
			if(isset($_POST['go'])){
			$nama = @$_POST['nama'];
			//$ang = mysql_real_escape_string($_POST['ang']);
			$km = $call_q("select * from mahasiswa where idmahasiswa='$nama' and mhs='2'");
			$kmm = $call_fas($km);
			$by1 = $call_q("select sum(NOMINAL) as tot from biaya_02 where NIM='$kmm[idmahasiswa]'");
			
			$byy1 = $call_fas($by1);
			$k2 = @number_format($byy1['tot'],"0","",".");
			//echo"Rp.$k2";
			}
		 ?> 
		        <a href="<?php echo"#"; ?>" onClick="MM_openBrWindow('<?php echo"BU_MST_M_UANG_02_TGH_02.php?IDKJ=$kj&IDANG=$ang"; ?>','','scrollbars=yes,width=1500,height=500')"  class="btn btn-warning">Konfirmasi Import</a>
		 </td>
		  <td height="36">&nbsp;</td>
		</tr>
		
	  </table>
	  <?php } ?>
		</form>
		</body>

<?php
}
?>