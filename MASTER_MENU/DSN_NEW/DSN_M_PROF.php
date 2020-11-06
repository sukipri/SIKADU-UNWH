<?php session_start();
	include_once"../../sc/conek.php";
	include_once"css.php";
	include"../../NEW_CODE/code_rand.php";
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
			//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
			header('location:index.php');
		} else {
		$u = mysql_query("select * from user where namauser='$_SESSION[namauser]'");
		$uu = mysql_fetch_array($u);
		$u_a = mysql_query("$sl akses FROM akademik where namauser='$_SESSION[namauser]'");
		$uu_a = $call_fas($u_a);
		$u_ku = mysql_query("$sl akses FROM user_ku where idku='$_SESSION[namauser]'");
		$uu_ku = $call_fas($u_ku);
		$u_dsn = $call_q("select iduser_dsn,iddosen,username,passuser,akses,kj from user_dsn where iddosen='$_SESSION[namauser]'");
		$uu_dsn = mysql_fetch_array($u_dsn);
		//$ku = $call_q("select * from ku where idku='$uu[idku]'");
		//$kuu = $call_fas($ku);

			$IDDSN=$sql_escape($_GET['kddsn']);
			 $dsn = $call_q("$call_sel dosen where iddosen='$IDDSN'");
			$dsnn = $call_fas($dsn);
			$kj = $call_q("$sl idkejuruan,kejuruan FROM kejuruan where idkejuruan='$dsnn[idkejuruan]'");
			$kjj = $call_fas($kj);
			$fak02 = $call_q("$call_sel fakultas where idfakultas='$dsnn[idfakultas]'");
			$fakk02 = $call_fas($fak02);
		//$kdmhs = "$kuu[idku]";
	 ?>
	  <?php if($uu['akses']==14 OR $uu_a['akses']==2 OR $uu_ku['akses']==11 OR $uu_dsn['akses']==6 ){ ?>
	  <script language="JavaScript" type="text/JavaScript">
			<!--
			function MM_openBrWindow(theURL,winName,features) { //v2.0
			  window.open(theURL,winName,features);
	}
//-->
</script>
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
  </div>
</div>
<!--
<a href="<?php echo"?HLM=DSN_M&SUB=DSN_M_02&IDDSN=$dsnn[iddosen]&kddsn=$IDDSN#GET_DATA"; ?>" class="btn btn-success btn-sm"><?php echo"<< Kembali"; ?></a> -->
	</td>
	  </tr>
	  <tr>
	    <td height="21" colspan="2">
			<?php include"DSN_M_MENU.php"; ?>
		</td>
      </tr>
	  <tr>
	    <td height="71" colspan="2">
		<!-- Detail Portofolio -->
				<?php include"../logic/page_logic_sa_sub.php"; ?>
			<!-- -->
		</td>
      </tr>
	</table>
</body>
<?php
	}else{echo"<h1><center>MAAF AKSES TIDAK DI IJINKAN<br><a href=index.php>klik untuk kembali</a></center></h1>";
	} }
	?>