<?php //session_start();
 include_once"../sc/conek.php";
 //include_once"css.php";

	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
	$u = mysql_query("select * from user_mhs where idmahasiswa='$_SESSION[namauser]'");
	$uu = mysql_fetch_array($u);
	$mhs = mysql_query("select * from mahasiswa where idmahasiswa='$uu[idmahasiswa]'");
	$mhss = mysql_fetch_array($mhs);
	$kdmhs = $mhss['idmahasiswa'];
 ?>
<h4 class="badge badge-info">MyMail&nbsp;-&nbsp;INBOX</h4>
<?php
	$delmail = @mysql_real_escape_string($_GET['delmail']);
	if(isset($_GET['delmail'])){
			mysql_query("delete from mymail where idmain='$delmail'");
	
	}

?>
	 <div style="overflow:auto;width:auto;height:400px;padding:10px;border:1px solid #eee">
<table width="811" border="0" class="table table-bordered table-sm" style="max-width:40rem;">
  <tr align="center" bgcolor="#E0E0E0">
    <td width="192"><strong>DARI</strong></td>
    <td width="187"><strong>JUDUL</strong></td>
    <td width="273"><strong>TANGGAL</strong></td>
    <td width="141"><strong>ACTION</strong></td>
  </tr>
  <?php
  	$ms = mysql_query("select * from mymail where untuk='$mhss[idmahasiswa]' order by idmain desc limit 50   ");
	while($mms = mysql_fetch_array($ms)){
  
  
  ?>
  <tr align="left">
    <td><?php echo"<a href=?mng=viewinbox&&dari=$mms[dari]&untuk=$mms[untuk]#dwn_$mms[idmain]>$mms[dari]-$mms[nama]</a>"; ?></td>
    <td><?php echo"$mms[judul]"; ?></td>
    <td><?php echo"$mms[tgl]"; ?> <?php if($mms['baca']==1){ ?> <span class="badge badge-danger">Belum dibaca</span> <?php }else{?><span class="badge badge-success">Sudah dibaca</span> <?php } ?></td>
    <td><a href="<?php echo"?mng=inbox&delmail=$mms[idmain]&$mms[dari]"; ?>">Hapus</a>&nbsp;|&nbsp;<a href="?mng=newmail&iduntuk=<?php echo"$mms[dari]"; ?>">Teruskan</a></td>
  </tr> 
  <?php } ?>
</table>
</div>
<?php } ?>
