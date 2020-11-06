<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			$IDDSN=$sql_escape($_GET['IDDSN']);
			$IDKJ=$sql_escape($_GET['IDKJ']);
			 $dsn = $call_q("$call_sel dosen where iddosen='$IDDSN'");
			$dsnn = $call_fas($dsn);
			$kj = $call_q("$sl idkejuruan,kejuruan FROM kejuruan where idkejuruan='$dsnn[idkejuruan]'");
			$kjj = $call_fas($kj);
			$kj_02 = $call_q("$sl idkejuruan,kejuruan FROM kejuruan where idkejuruan='$IDKJ'");
			$kjj_02 = $call_fas($kj_02);
			?>
<body>
	<table width="51%" align="center" class="table">
	  <tr>
	    <td width="100%" height="71" colspan="2">
		<?php echo"<h4>Input SKS $kjj_02[kejuruan]</h4>"; ?>
		<!-- Detail SKS -->
				<?php include"DSN_SKS_02_01.php"; ?>
			<!-- -->
		</td>
      </tr>
	</table>
</body>
<?php } ?>