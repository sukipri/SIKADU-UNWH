<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
         <h3 class="badge badge-warning"><?php echo"#$vsmt01_sww[semester]"; ?></h3>
		<a href="?HLM=APPS_M&SUB=APPS_IM_KRS_M&SUB_CHILD=APPS_IM_KRS_M_GL_01" class="btn btn-outline-info btn-sm"><i class="fas fa-cloud-upload-alt"></i>&nbsp;KRS Status Mahasiswa</a>
		&nbsp;	
	 <?php include"../logic/page_logic_sa_sub_child.php"; ?>
 
 <?php } ?>