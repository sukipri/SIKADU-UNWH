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
    <a href="?HLM=BU_MST_M&SUB=BU_MST_M_DT_TGH_M" class="btn btn-outline-warning"><i class="fas fa-database"></i>&nbsp;Data Tagihan</a>
    &nbsp;
    <a href="?HLM=BU_MST_M&SUB=BU_MST_M_UANG" class="btn btn-outline-success"><i class="fa fa-italic"></i>&nbsp;Tagihan <> Pembayaran</a>
    		<br>
			<?php include"../logic/page_logic_sa_sub.php"; ?>
    
</body>
<?php } ?>