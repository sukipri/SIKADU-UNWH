<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
		?>
<body>
	<table width="100%" border="0" class="table table-bordered table-sm" style="max-width:50rem;">
          <tr class="table-info">
            <td colspan="4">#Export Tagihan</td>
          </tr>
          <tr class="table-primary">
            <td width="32%">Kejuruan</td>
            <td width="25%">Kode</td>
            <td width="37%">&nbsp;</td>
            <td width="6%">&nbsp;</td>
          </tr>
          <?php
		  $vkjj_sw = $call_q("$sl idkejuruan,idfakultas,progdi,kejuruan FROM  kejuruan order by idkejuruan");
				 while($vkjj_sww = $call_fas($vkjj_sw)){
		  ?>
          <tr>
            <td><?PHP echo"$vkjj_sww[kejuruan]"; ?> <a href="#" class="badge badge-warning"><?php echo"$vkjj_sww[progdi]"; ?></a></td>
            <td><?PHP echo"$vkjj_sww[idkejuruan]"; ?></td>
            <td>
            <a href="<?PHP echo"?HLM=BU_MST_M&SUB=BU_MST_M_DT_TGH_M&SUB_CHILD=BU_MST_M_DT_TGH_M_03_01&IDKEJ01=$vkjj_sww[idkejuruan]"; ?>" class="badge badge-success"><i class="fas fa-file-download"></i>&nbsp;Model Export</a>
            &nbsp;
            <a href="#" class="badge badge-info"><i class="fas fa-clipboard"></i>&nbsp;Data Export</a>
            </td>
            <td>&nbsp;</td>
          </tr>
          <?php } ?>
</table>

</body>
<?php } ?>