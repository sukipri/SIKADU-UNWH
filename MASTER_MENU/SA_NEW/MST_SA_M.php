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
		<a href="?HLM=MST_M&SUB=MST_M_I_MAKUL" class="btn btn-outline-success"><i class="fa fa-italic"></i>&nbsp;Setup , Backup & IO Menus</a>
		&nbsp;
		<a href="?HLM=MST_M&SUB=MST_M_I_MAKUL_UPDATE" class="btn btn-outline-success"><i class="fa fa-italic"></i>&nbsp;Master  Data</a>
	<br>
	<?php include"../logic/page_logic_sa_sub.php"; ?>
</body>
<?php } ?>
