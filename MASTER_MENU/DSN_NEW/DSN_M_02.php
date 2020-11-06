<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			$IDDSN=$sql_escape($_GET['IDDSN']);
			 $dsn = $call_q("$call_sel dosen where iddosen='$IDDSN'");
			$dsnn = $call_fas($dsn);
			$kj = $call_q("$sl idkejuruan,kejuruan FROM kejuruan where idkejuruan='$dsnn[idkejuruan]'");
			$kjj = $call_fas($kj);
			?>
<body>
	<table width="51%" align="center" class="table">
	  <tr>
		<td width="4%" height="71"><?php
		$ft = $call_q("$call_sel foto_dsn where iddosen='$IDDSN' order by idfoto desc limit 1");
		  $ftt = $call_fas($ft);
		  $hft = $call_nr($ft);
		  if($hft >0){
		  echo"<img src=http://sikadu.unwahas.ac.id/file/$ftt[foto] width=200 height=200>";
		  }elseif($hft < 1){
		    echo"<img src=http://sikadu.unwahas.ac.id/img/no.jpg width=200 height=200>";
			}
		  ?>
		  </td>
		<td width="96%">
		
		<div class="card border-warning mb-3" style="max-width:40rem;">
  <div class="card-header"><?php echo"$dsnn[nama]"; ?></div>
  <div class="card-body">
    <h4 class="card-title"><?php echo"$kjj[kejuruan]"; ?></h4>
    <p class="card-text">
	<?php echo"$dsnn[alamat]"; ?>
	<br>
	<?php echo"$dsnn[email]"; ?>
	</p>
	<a href="<?php echo"?HLM=DSN_M&SUB=DSN_M_PROF&IDDSN=$dsnn[iddosen]#GET_DATA"; ?>" class="btn btn-success btn-sm">Lihat profil lengkap</a>
  </div>
</div>
	</td>
	  </tr>
	  <tr>
	    <td height="71" colspan="2">
		<!-- Detail Portofolio -->
				<?php include_once"DSN_PORTO.php"; ?>
			<!-- -->
		</td>
      </tr>
	</table>
</body>
<?php } ?>
