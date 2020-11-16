<?php //session_start();
 //include_once"../sc/conek.php";

	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
 ?>

<h4>MENU PENCETAKAN KARTU<hr> 
  <?php
if($mhss['uas']=='2'){

?>
</h4>
<table width="391" border="0" align="center" bgcolor="#AAFFAA" class="table table-bordered table-sm">
  <tr class="success">
    <td align="center" bgcolor="#FFFFFF"><h4><strong>UAS</strong></h4></td>
  </tr>
  <tr>
    <td width="385" height="75" align="center" bgcolor="#FFFFFF"><?php

echo"<a href=../AKA/ctk_kartu_ujian.php?kdmhs=$kdmhs target=_blank><img src=../img/print-32.png width=32 height=32 border=0 title=cetak KRS><br>CETAK KARTU UAS <br> (*Gunakan google Chrome)</a>";

?></td>
  </tr>
</table><br><br>
<?php

}elseif($mhss['uas']=='1'){
?>
<table width="391" border="0" align="center" bgcolor="#AAFFAA" class="table table-bordered">
  <tr class="danger">
    <td align="center" bgcolor="#FFFFFF"><strong>UAS</strong></td>
  </tr>
  <tr>
    <td width="385" align="center" bgcolor="#FFFFFF"><img src="../img/warning-32.png" width="32" height="32"><br>SILAHKAN LAKUKAN PEMBAYARAN UAS<br>
    *( Silahkan hubungi bagian Keuangan </td>
  </tr>
</table><br><br>
<?php
}
?>

  <?php
if($mhss['uts']=='2'){

?>

<table width="391" border="0" align="center" bgcolor="#AAFFAA" class="table table-bordered">
  <tr class="success">
    <td align="center" bgcolor="#FFFFFF"><h4><strong>UTS</strong></h4></td>
  </tr>
  <tr>
    <td width="385" height="75" align="center" bgcolor="#FFFFFF"><?php

echo"<a href=../AKA/ctk_kartu_ujian_uts.php?kdmhs=$kdmhs target=_blank><img src=../img/print-32.png width=32 height=32 border=0 title=cetak KRS><br>CETAK KARTU UTS <br> (*Gunakan google Chrome)</a>";

?></td>
  </tr>
</table>
<br>
<br>
<?php

}elseif($mhss['uts']=='1'){
?>
<table width="391" border="0" align="center" bgcolor="#AAFFAA" class="table table-bordered">
  <tr class="danger">
    <td align="center" bgcolor="#FFFFFF"><strong>UTS</strong></td>
  </tr>
  <tr>
    <td width="385" align="center" bgcolor="#FFFFFF"><img src="../img/warning-32.png" width="32" height="32"><br>
      SILAHKAN LAKUKAN PEMBAYARAN UTS<br>
      *( Silahkan hubungi bagian Keuangan </td>
  </tr>
</table>
	<?php }} ?>
