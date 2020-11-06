<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
		?>
<body>
	<h5>#Daftar Tagihan</h5>
    <a href="?HLM=BU_MST_M&SUB=BU_MST_M_UANG&SUB_CHILD=BU_MST_M_UANG_RPT_TGH&SUB_CHILD_02=BU_MST_M_UANG_RPT_TGH_BRI"><img src="https://developers.bri.co.id/sites/default/files/briva.png"></a>
  	<br>
	<?php include"../logic/page_logic_sa_sub_child_02.php"; ?>
</body>
<?php } ?>