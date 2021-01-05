<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
		?>
    <body>
   
     <a href="?HLM=BU_MST_M&SUB=BU_MST_M_INFO_M&SUB_CHILD=BU_MST_M_INFO_M_IN"><i class="fas fa-dice-d6"></i>&nbsp;Entri Informasi</a>
   	 &nbsp;
     <a href="?HLM=BU_MST_M&SUB=BU_MST_M_INFO_M&SUB_CHILD=BU_MST_M_INFO_M_IN"><i class="fas fa-dice-d6"></i>&nbsp;Daftar Info</a>
   	 &nbsp;
    
    <br>
    <?php include"../logic/page_logic_sa_sub_child.php"; ?>
	</body>
<?PHP } ?>