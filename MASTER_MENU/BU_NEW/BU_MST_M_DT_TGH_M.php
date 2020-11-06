<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
		?>
<body>
	<a href="?HLM=BU_MST_M&SUB=BU_MST_M_DT_TGH_M&SUB_CHILD=BU_MST_M_DT_TGH_M_01"><i class="fas fa-cube"></i>&nbsp;Ent.Jenis Tagihan</a>
    &nbsp;
    <a href="?HLM=BU_MST_M&SUB=BU_MST_M_DT_TGH_M&SUB_CHILD=BU_MST_M_DT_TGH_M_02"><i class="fas fa-cube"></i>&nbsp;Ent.Master Tagihan </a>
    &nbsp;
    <a href="?HLM=BU_MST_M&SUB=BU_MST_M_DT_TGH_M&SUB_CHILD=BU_MST_M_DT_TGH_M_03"><i class="fas fa-cube"></i>&nbsp;Export Tagihan </a>
    
	<?php include"../logic/page_logic_sa_sub_child.php"; ?>
</body>
<?php } ?>