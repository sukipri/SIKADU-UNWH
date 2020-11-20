<?php 
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
		?>
	<h5>#Update kartu ujian</h5>		
    <br />
    	<a href="?HLM=BU_MST_M&SUB=BU_MST_M_UANG&SUB_CHILD=BU_MST_M_UANG_UP_UJIAN&SUB_CHILD_02=BU_MST_M_UANG_UP_UJIAN_UTS_NIM" class="btn btn-outline-info"><i class="fas fa-file-alt"></i>&nbsp;UTS / NIM</a>
         &nbsp;
     		<i class="fas fa-arrows-alt-h"></i>
            &nbsp;
	    <a href="?HLM=BU_MST_M&SUB=BU_MST_M_UANG&SUB_CHILD=BU_MST_M_UANG_UP_UJIAN&SUB_CHILD_02=#" class="btn btn-outline-warning"><i class="fas fa-file-alt"></i>&nbsp;KRS / Global</a>
         &nbsp;
        <a href="?HLM=BU_MST_M&SUB=BU_MST_M_UANG&SUB_CHILD=BU_MST_M_UANG_UP_UJIAN&SUB_CHILD_02=BU_MST_M_UANG_UP_UJIAN_UTS" class="btn btn-outline-info"><i class="fas fa-file-alt"></i>&nbsp;UTS / Global</a>
         &nbsp;
        <a href="?HLM=BU_MST_M&SUB=BU_MST_M_UANG&SUB_CHILD=BU_MST_M_UANG_UP_UJIAN&SUB_CHILD_02=BU_MST_M_UANG_UP_UJIAN_UAS" class="btn btn-outline-danger"><i class="fas fa-file-alt"></i>&nbsp;UAS / Global</a>
	<br />
    <!-- -->
       <?php include"../logic/page_logic_sa_sub_child_02.php"; ?>
    <!-- -->
	

<?php } ?>