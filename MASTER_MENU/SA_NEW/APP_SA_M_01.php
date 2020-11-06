<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<body>
<table width="100%" class="table">
  <tr>
    <td width="34%"><?php include_once"MENU_01_CH_HIJACK.php"; ?></td>
    <td width="66%"><?php include"../logic/page_logic_sa_sub_child.php"; ?></td>
  </tr>
</table>
</body>
<?php } ?>
