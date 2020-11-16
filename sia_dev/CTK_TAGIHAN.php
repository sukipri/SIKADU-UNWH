		<?php ob_start(); session_start();
		 include_once"./../sc/conek.php";
		 include_once"./css.php";
		 include"../NEW_CODE/code_rand.php";
			//$get_db = new database();
			//$get_db->conek();
		
			
			if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
				//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
				header('location:index.php');
			} else {
				$u = mysql_query("select iduser_mhs,idmahasiswa,username,akses from user_mhs where idmahasiswa='$_SESSION[namauser]'");
					$uu = mysql_fetch_assoc($u);
			$mhs = mysql_query("select idmahasiswa,idkejuruan,idsemester,idtahun_ajaran,nama,idkelas,kode_kelas,iddosen from mahasiswa where idmahasiswa='$uu[idmahasiswa]'");
			$mhss = mysql_fetch_assoc($mhs);
			$kej = mysql_query("select idkejuruan,idfakultas,kejuruan FROM kejuruan where idkejuruan='$mhss[idkejuruan]'");
			$kejj = mysql_fetch_assoc($kej);
			$fkl = mysql_query(" select idfakultas,fakultas FROM fakultas where idfakultas='$kejj[idfakultas]'");
			$fkll = mysql_fetch_assoc($fkl);
			$dsn2= mysql_query("select iddosen,idkejuruan,nama FROM dosen where iddosen='$mhss[iddosen]'");
			$dsnn2 = mysql_fetch_assoc($dsn2);
			$thmhs = mysql_query("select * from theme_mhs where idmahasiswa='$uu[idmahasiswa]'");
			$thmhss = mysql_fetch_assoc($thmhs);
				$numthmhs = mysql_num_rows($thmhs);
					$kdmhs = $mhss['idmahasiswa'];
					$IDTG = @mysql_real_escape_string($_GET['IDTG']);
				
			
		 ?>
	<body>
	<div class="container">
	<table width="100%"  border="0">
				  <tr>
					<td width="7%"><img src="../img/logokecil.gif" width="52" height="52"></td>
					<td width="60%"><h4>UNIVERSITAS WAHID HASYIM SEMARANG <br> 
					RINCIAN TAGIHAN PEMBAYARAN MAHASISWA</h4>
					<?php 
						echo"No Tagihan <b><i>$IDTG</i></b><br>";
						echo"NIM <b><i>$mhss[idmahasiswa]</i></b><br>";
						echo"PROGDI <b><i>$kejj[kejuruan]</i></b>";
					  ?>
					</td>
					<td width="33%">&nbsp;</td>
				  </tr>
	  </table>
	  <table width="100%" border="0" class="table table-bordered">
                  <tr class="info">
                    <td width="7%">KODE</td>
                    <td width="5%">NIM</td>
                    <td width="13%">KODE BAYAR</td>
                    <td width="27%">NOMINAL</td>
					 <td width="25%">KODE SEMESTER</td>
					  <td width="18%">STATUS</td>
                      <td width="5%">####</td>
                  </tr>
				  <?php 
				   $by_r = mysql_query("select * from biaya_02_rekam where idmahasiswa='$kdmhs' AND app='1' AND kode='$IDTG' order by idsemester desc ");
						 $no_byr = 1;
				  	while($byy_r = mysql_fetch_array($by_r)){
						$sm_r = mysql_query("select idsemester,idtahun_ajaran,semester from semester where idsemester='$byy_r[idsemester]'");
						$smm_r = mysql_fetch_assoc($sm_r);
						$hit_byy_r = number_format($byy_r['nominal']);
				  ?>
                  <tr>
                    <td><?php echo"$byy_r[kode]"; ?><input type="hidden" name="<?php echo"idmain$no_byr"; ?>" value="<?php echo"$byy_r[idmain_rekam]"; ?>"></td>
                    <td><?php echo"$byy_r[idmahasiswa]"; ?></td>
                    <td><?php echo"$byy_r[kode_bayar]"; ?></td>
                   <td align="right"><?php echo"Rp.$hit_byy_r"; ?></td>
				    <td><?php echo"$smm_r[semester]"; ?></td>
					  <td>
					<?php if($byy_r['app']==1){ echo"<font color=blue><b>Dalam Proses</b></font>";
					}elseif($byy_r['app']==2){echo"<font color=green><b>Terbayar</b></font>";}  ?>
					  </td>
				      <td>&nbsp;</td>
                  </tr> 
				   <?php $no_byr++;} ?>
                  <tr>
                    <td colspan="5">&nbsp;</td>
                    <td><b>TOTAL</b></td>
                    <td>
					<?php 
				$jum_byr = mysql_query("select sum(NOMINAL) as nom from biaya_02_rekam where idmahasiswa='$kdmhs' AND app='1' AND kode='$IDTG'");
					$jum_byyr = mysql_fetch_array($jum_byr);
					$jum02= @number_format($jum_byyr['nom'],"0","",".");
					echo"Rp.$jum02";
					
		 ?>
					</td>
                  </tr>
				
                </table>
	</div>
	</body>
	<?php } ?>
