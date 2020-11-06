	<?php

	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {

	?>
	<body>
<table class="table table-hover" width="100%">
	<tr class="table-info">
	<td colspan="4">Pilih Progdi kurikulum</td>
    </tr>
 <?php
		$vkej = $call_q("$sl idkejuruan,kejuruan,progdi FROM kejuruan order by kejuruan asc");
		 while($vkejj = $call_fas($vkej)){
		 	$kr = $call_q("$sl idkurikulum,idkejuruan FROM kurikulum where idkejuruan='$vkejj[idkejuruan]'");
				$hit_krr = $call_nr($kr);
		?>
		
		<tr class="table-default">
      <td><?php echo"$vkejj[kejuruan]"; ?></td>
      <td><?php echo"<b>$hit_krr</b> Kurikulum"; ?></td>
      <td>&nbsp;</td>
      <td><a href="<?php echo"?HLM=DSN_M&SUB=DSN_SKS_02&IDDSN=$dsnn[iddosen]&kddsn=$IDDSN&IDKJ=$vkejj[idkejuruan]#GET_DATA"; ?>" class="btn btn-default btn-sm"><i class="fa fa-hand-o-right"></i>&nbsp;Pilih</a></td>
    </tr>

<?php } ?>
			</table>
	</body>
<?php } ?>
