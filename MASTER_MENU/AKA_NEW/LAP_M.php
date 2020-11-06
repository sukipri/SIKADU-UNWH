<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
		<ol class="breadcrumb">
  		<li class="breadcrumb-item"><a href="index.php">Home</a></li>
  		<li class="breadcrumb-item active">Menu Laporan</li>
	</ol>
		<a href="?HLM=LAP_M&SUB=LAP_M_ST_IPK" class="btn btn-outline-success"><i class="fa fa-italic"></i>&nbsp;Statistik IPK</a>
		&nbsp;
        <a href="?HLM=LAP_M&SUB=LAP_M_ST_IPK_LULUSAN" class="btn btn-outline-success"><i class="fa fa-italic"></i>&nbsp;Statistik IPK LULUSAN</a>
    	&nbsp;
        <a href="?HLM=LAP_M&SUB=AKA_LAP_M_LOG_DATA_01" class="btn btn-outline-success"><i class="fa fa-italic"></i>&nbsp;LOG DATA</a>
	<br>
	<?php include"../logic/page_logic_sa_sub.php"; ?>
</body>
<?php } ?>
