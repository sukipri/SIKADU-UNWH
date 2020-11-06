<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
		<ol class="breadcrumb">
  		<li class="breadcrumb-item"><a href="index.php">Home</a></li>
  		<li class="breadcrumb-item active">Menu Master</li>
	</ol>
		<a href="?HLM=APP_SA_M&SUB=APP_SA_M_01" class="btn btn-outline-info"><i class="fa fa-italic"></i>&nbsp;Hijack</a>
		&nbsp;
		<a href="" class="btn btn-outline-info"><i class="fa fa-italic"></i>&nbsp;Global Moving Systems</a>
	<br>
		<?php include"../logic/page_logic_sa_sub.php"; ?>
</body>
<?php } ?>
