<?php 

if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
	$u = $call_q("select * from user where namauser='$_SESSION[namauser]'");
	$uu = $call_fas($u);
 ?>

<body>
<h5>#Kuisioner / FAKULTAS</h5>
<div class="container">
<table width="507" height="63" border="0" align="center" class="table table-bordered" bgcolor="#00F279">
  <tr align="center" bgcolor="#FFFFFF">
    <td width="237" height="59"><a href="?ku=mkuis&kuis=ikuis" class=" btn btn-warning "><img src="../../img/terminal-32.png" width="32" height="32" border="0"><br>
    Input Kuisioner</a></td>
    <td width="260"><a href="?ku=mkuis&kuis=vkuis" class="btn btn-warning"><img src="../../img/track-32.png" width="32" height="32" border="0"><br>
    Data Kuisioner</a></td>
    <td width="260"><a href="?ku=mkuis&kuis=vsks_kuis" class="btn btn-warning"><img src="../../img/hasil.jpg" width="32" height="32" border="0"><br>
Hasil Kuisioner</a></td>
  </tr>
</table>
<br>
<?php
	switch(@mysql_real_escape_string($_GET['kuis'])){
	case'ikuis':
	include"ikuis.php";
	break;
	case'vkuis':
	include"vkuis.php";
	break;
	case'vsks_kuis':
	include"vsks_kuis.php";
	break;
	case'edit_kuis':
	include"edit_kuis.php";
	break;
	
	}

?>
</div>
</body>
<?PHP } ?>