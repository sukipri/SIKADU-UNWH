<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
<h5>#LOG DATA USER</h5>
    <table width="100%" style="max-width:50rem;" border="0" class="table table-bordered table-sm">
      <tr class="table-warning">
        <td width="26%">Tanggal</td>
        <td width="49%">Akses</td>
        <td width="25%">Link</td>
      </tr>
      <?php
	  		$vlog01_sw = $call_q("$sl idmain_log_data,kode_rls,tanggal,akses,link FROM log_data order by tanggal desc");
				while($vlog01_sww = $call_fas($vlog01_sw)){
	  ?>
      <tr>
        <td><?php echo"$vlog01_sww[tanggal]"; ?></td>
        <td><?php echo"$vlog01_sww[akses]"; ?></td>
        <td><?php echo"$vlog01_sww[link]"; ?></td>
      </tr>
      <?php } ?>
    </table>

</body>
<?php } ?>