<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
		?>
<body>
<ul class="nav nav-pills">

  <!--
    <li class="nav-item">
    <a class="nav-link " href="#">Menu</a>
  </li>\
  
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
      <a class="dropdown-item" href="#">Action</a>
      <a class="dropdown-item" href="#">Another action</a>
      <a class="dropdown-item" href="#">Something else here</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Separated link</a>
    </div>
  </li>
  -->
  <li class="nav-item">
    <a class="nav-link " href="?HLM=BU_MST_M&SUB=BU_MST_M_UANG&SUB_CHILD=BU_MST_M_UANG_01"><i class="fas fa-cube"></i>&nbsp;Upload Pembayaran</a>
  </li>
  <!--
    <li class="nav-item">
    <a class="nav-link " href="?HLM=BU_MST_M&SUB=BU_MST_M_UANG&SUB_CHILD=BU_MST_M_UANG_02_TGH"><i class="fas fa-cube"></i>&nbsp;Upload Tagihan</a>
  </li>
  -->
   <li class="nav-item">
    <a class="nav-link " href="?HLM=BU_MST_M&SUB=BU_MST_M_UANG&SUB_CHILD=BU_MST_M_UANG_01_TGH"><i class="fas fa-cube"></i>&nbsp;Upload Tagihan</a>
  </li>
  <!--
    <li class="nav-item">
    <a class="nav-link" href="?HLM=BU_MST_M&SUB=BU_MST_M_UANG&SUB_CHILD=BU_MST_M_UANG_BY_KEJ"><i class="fas fa-cube"></i>&nbsp;Update Pembayaran / Kejuruan</a>
  </li>
  
   <li class="nav-item">
    <a class="nav-link " href="?HLM=BU_MST_M&SUB=BU_MST_M_UANG&SUB_CHILD=BU_MST_M_UANG_BY_NIM"><i class="fas fa-cube"></i>&nbsp;Update Pembayaran / NIM</a>
  </li>
  -->
   </li>
    <li class="nav-item">
    <a class="nav-link " href="?HLM=BU_MST_M&SUB=BU_MST_M_UANG&SUB_CHILD=BU_MST_M_UANG_HIS_PEM"><i class="fas fa-cube"></i>&nbsp;History Tagihan</a>
  </li>
  
  <li class="nav-item">
    <a href="?HLM=BU_MST_M&SUB=BU_MST_M_UANG&SUB_CHILD=BU_MST_M_UANG_RPT_TGH" class="nav-link "><i class="fas fa-clipboard"></i>&nbsp;Report Tagihan </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="?HLM=BU_MST_M&SUB=BU_MST_M_UANG&SUB_CHILD=BU_MST_M_UANG_UP_UJIAN"><i class="	fas fa-pencil-alt"></i>&nbsp;Update kartu Ujian</a>
  </li>
</ul>
   <?php include"../logic/page_logic_sa_sub_child.php"; ?>

</body>
<?php } ?>