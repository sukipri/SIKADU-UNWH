	<?php //session_start();
	 include_once"../sc/conek.php";
	 //include_once"css.php";
	
		
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
			//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
			header('location:index.php');
		} else {
		/* KODE TRANSAKSI */
			//$jum_byr_02 = $call_q("select idmain_rekam from biaya_02_rekam");
							//$jum_byrr_02 = mysql_num_rows($jum_byr_02);
		$text_ahir = substr($uu['idmahasiswa'],8);
			$KODE_TRAN = "$ack_small_XL$date_ack_tiny$time_ack_tiny";
				//echo"$KODE_TRAN";
				?>
		<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
        </script>
		<style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-weight: bold;
}
-->
        </style>
		<body>
			
						<?php
									class mhs{
										}
								
								$kj = $call_q("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
								$kjj = $call_fas($kj);
								$ambil_mhs= new mhs();
										$ambil_mhs->km_nim="$mhss[idmahasiswa]";
										$ambil_mhs->km_nama="$mhss[nama]";
										$ambil_mhs->kj_jur = "$kjj[kejuruan]";		
						?>
						<form action="" method="post">
			<table width="100%"  border="0">
				  <tr>
					<td width="7%"><img src="../img/logokecil.gif" width="52" height="52"></td>
					<td width="60%"><h6>UNIVERSITAS WAHID HASYIM SEMARANG <br> 
					RINCIAN TAGIHAN PEMBAYARAN MAHASISWA</h6></td>
					<td width="33%">&nbsp;</td>
				  </tr>
	  </table>
		
		<table width="100%" border="0" class="table table-bordered table-sm">
                  <tr class="table-info">
                    <td width="7%">KODE</td>
                    <td width="5%">NIM</td>
                    <td width="13%">KODE BAYAR</td>
                    <td width="17%">NOMINAL</td>
					 <td width="25%">KODE SEMESTER</td>
					  <td width="13%">STATUS</td>
                      <td width="20%">####</td>
                  </tr>
				  <?php 
				   $by_r = $call_q("$call_sel biaya_02_rekam_bri where idmahasiswa='$kdmhs' AND (app='1' OR app='3') order by idsemester desc ");
						 $no_byr = 1;
				  	while($byy_r = $call_fas($by_r)){
						$sm_r = $call_q("$sl idsemester,idtahun_ajaran,semester from semester where idsemester='$byy_r[idsemester]'");
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
					<?php if($byy_r['app']==1){ echo"<font color=blue><b>Belum Bayar</b></font>";
					}elseif($byy_r['app']==2){echo"<font color=green><b>Lunas</b></font>";}
					elseif($byy_r['app']==3){echo"<font color=red><b>Proses Bayar</b></font>";}   ?>
					  </td>
				      <td>
					  <!-- <a href="<?php echo"?mng=TAGIHAN&DEL=$byy_r[idmain_rekam]&IDBY=$byy_r[idbiaya_02]#DELETE"; ?>" onClick="return konfirmasi()" class="btn btn-danger btn-sm">Hapus</a>&nbsp; -->
					  <a href="<?php echo"CTK_TAGIHAN.php?IDTG=$byy_r[kode]#";  ?>" target="_blank" class="btn btn-warning btn-sm"><i class="fa fa-print"></i>&nbsp;Cetak</a>
					  </td>
                  </tr>
             
				  <?php $no_byr++;} ?>
                     <tr>
                       <td>&nbsp;</td>
                       <td>&nbsp;</td>
                       <td>&nbsp;</td>
                       <td align="right">&nbsp;</td>
                       <td>&nbsp;</td>
                       <td>Total</td>
                       <td align="right"><?php 
					$jum_byr = mysql_query("select sum(NOMINAL) as nom from biaya_02_rekam_bri where idmahasiswa='$uu[idmahasiswa]' AND app='1'");
					$jum_byyr = mysql_fetch_array($jum_byr);
					$jum02= @number_format($jum_byyr['nom'],"0","",".");
					echo"<i>Rp.$jum02</i>";
					
		 ?></td>
                     </tr>
                     <tr>
                    <td colspan="7"><p>Pembayaran di sarankan menggunakan H2H <span class="style1">Biaya Pendidikan Bank BPD Jateng</span> yg bisa dilakukan dari Teller, ATM Bersama, OVO maupun DANA. <br>
                      Silahkan Download panduan untuk melakukan pembayaran. <br>
                      Pembayaran dengan Bank jateng akan di VALIDASI Bag. Keuangan <span class="style1">2x24 jam</span>, pembayaran  selain bank jateng harus validasi ke Bag. Keuangan: </p>
                      <p>Untuk pembayaran via atm (atm bank jateng/atm bank lain, atm bersama) mohon di lakukan per item tiap transaksi. Untuk mencegah gagal transaksi h2h bank jateng. Karena jika di bayarkan total saldo dikhawatirkan tidak masuk ke rekeneing h2h bank jateng. <br>
                      Misal tagihan terdiri dari registrasi 150rb, spp 500rb. Harus satu per satu di proses. 150rb di bayarkan dulu, setelah sukses, baru 500rb di bayarkan. Jangan langsung  di transaksi Total langsung setor 650rb. Agar  setoran bisa masuk program h2h bank jateng, dan transaksi tidak tertolak.</p>
                      <p>Jika proses transaksi sudah benar, maka tagihannya akan berubah 0 (nol), artinya terbayar lunas. Jika masih muncul tagihan, berarti ada langkah pembayaran yang tidak sesuai. Jika terjadi demikian, konfirmasi di bagian keuangan.</p>
                      <ol>
                        <li><strong><a href="/mobile_sia/panduan/User%20Manual%20via%20Bank%20Jateng.pdf" target="_blank">Pembayaran BANK JATENG (Via Teller, Internet Banking, ATM BANK JATENG)</a></strong></li>
                        <li><strong><a href="/mobile_sia/panduan/User Manual ATM Bank Lain.pdf" target="_blank">Pembayaran transfer ATM BERSAMA </a></strong></li>
                        <li><strong><a href="/mobile_sia/panduan/modern_ovo.pdf" target="_blank">Pembayaran Modern Chanel OVO</a></strong></li>
                        <li><strong><a href="/mobile_sia/panduan/modern_dana.pdf" target="_blank">Pembayaran Modern Chanel  DANA</a></strong></li>
                      </ol>
                      <p>Pembayaran dari Bank BPD Jateng akan langsung masuk ke sistem sikadu unwahas dan anda tidak perlu VALIDASI mahasiswa. Apabila pembayaran sudah lunas, secara otomatis anda bisa melakukan transaksi input KRS, cetak Kartu Ujian.  </p></td>
                  </tr>
				  </table>
				
		
	</form>
			<?php 
			/*
				if(isset($_GET['AMBIL'])){
					include"../BU/test/briva/create_briva.php";
				
				}
				*/
			?>
	<?php } ?>
		