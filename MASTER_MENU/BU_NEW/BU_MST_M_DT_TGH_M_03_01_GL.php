<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
		?>
<body>
		<?php
			 $vkjj_sw = $call_q("$sl idkejuruan,idfakultas,progdi,kejuruan FROM  kejuruan WHERE idkejuruan='$IDKEJ01'");
				 $vkjj_sww = $call_fas($vkjj_sw);
		
		?>
         <span class="badge-info">#Export Data / Jurusan &nbsp;<i class="fas fa-flag"></i>&nbsp;<?php echo"$vkjj_sww[kejuruan]"; ?></span>
      <form method="post">
      <table width="100%" border="0" class="table table-bordered table-sm" style="max-width:70rem;">
          <tr class="table-warning">
            <td width="16%">Jenis Tagihan</td>
            <td width="84%">&nbsp;</td>
          </tr>
          <tr>
            <td>
               <?php
			$vjtgh_sw = $call_q("$call_sel tb_jenis_tagihan");
				while($vjtgh_sww = $call_fas($vjtgh_sw)){
						?>
                			<a href="<?php echo"?HLM=BU_MST_M&SUB=BU_MST_M_DT_TGH_M&SUB_CHILD=BU_MST_M_DT_TGH_M_03_01&SUB_CHILD_02=U_MST_M_DT_TGH_M_03_03_GL&IDKEJ01=$IDKEJ01&IDJTGH01=$vjtgh_sww[idmain_jenis_tagihan]"; ?>"><i class="fas fa-file-alt"></i>&nbsp;<?php echo"$vjtgh_sww[nama]"; ?></a>
                        <br>
				<?php } ?>
            </td>
            <td>
            <?Php 
				$vjtgh_sw02 = $call_q("$sl idmain_jenis_tagihan,nama FROM tb_jenis_tagihan WHERE idmain_jenis_tagihan='$IDJTGH01'");
					$vjtgh_sww02 = $call_fas($vjtgh_sw02);
				//..Angkatan..//
					$vtajar01_sw02  = $call_q("$call_sel tahun_ajaran WHERE idtahun_ajaran='$IDAJR01'");
						$vtajar01_sww02 = $call_fas($vtajar01_sw02);
				//..TAGIHAN..//
				$vtgh01_sw02 = $call_q("$sl idmain_tagihan_01,rule,rule_02,masa_biaya,kode_urut FROM tb_tagihan_01 WHERE idmain_jenis_tagihan='$IDJTGH01' AND idtahun_ajaran='$vtajar01_sww02[idtahun_ajaran]' AND idkejuruan='$IDKEJ01'");
					$vtgh01_sww02 = $call_fas($vtgh01_sw02);
				//* //
					$kode_urut = "$vtgh01_sww02[kode_urut]$vjtgh_sww02[nama]";
					$kode_bayar = "$vjtgh_sww02[nama]";
			?>
            	<span class="badge badge-info"><?php echo"$vjtgh_sww02[nama]"; ?></span>
                <span class="badge badge-info"><?php echo"$vtajar01_sww02[ajaran]"; ?></span>
                 <span class="badge badge-info"><?php echo"$vtgh01_sww02[rule]"; ?></span>
            <?php include"../logic/page_logic_sa_sub_child_02.php"; ?>
            </td>
          </tr>
	</table>

      	
</form>
	
</body>
<?php } ?>