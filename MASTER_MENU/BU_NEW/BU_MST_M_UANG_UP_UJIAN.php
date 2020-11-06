<?php 
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
		?>
	<h5>#Update kartu ujian</h5>		
    <br />
        <a href="?HLM=BU_MST_M&SUB=BU_MST_M_UANG&SUB_CHILD=BU_MST_M_UANG_UP_UJIAN&SUB_CHILD_02=BU_MST_M_UANG_UP_UJIAN_UTS_KEJ" class="btn btn-outline-info"><i class="fas fa-file-alt"></i>&nbsp;UTS</a>
         &nbsp;
        <a href="?HLM=BU_MST_M&SUB=BU_MST_M_UANG&SUB_CHILD=BU_MST_M_UANG_UP_UJIAN&SUB_CHILD_02=BU_MST_M_UANG_UP_UJIAN_UAS" class="btn btn-outline-danger"><i class="fas fa-file-alt"></i>&nbsp;UAS</a>
	<br />
    <!-- -->
       <?php include"../logic/page_logic_sa_sub_child_02.php"; ?>
    <!-- -->
	

<?php } ?>