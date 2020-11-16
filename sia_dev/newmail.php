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
 <script src="//cdn.ckeditor.com/4.5.10/full/ckeditor.js"></script>
<form name="form1" method="post" action="">
  <h4 class="badge badge-info">Pesan Baru </h4>
  <?php
  if(isset($_POST['kirim'])){
  $tgl = date("d-m-Y");
  $untuk = @mysql_real_escape_string($_POST['untuk']);
   $judul = @mysql_real_escape_string($_POST['judul']);
    $isi = @mysql_real_escape_string($_POST['editor1']);
   $dari = "$mhss[idmahasiswa]";
  mysql_query("insert into mymail(untuk,dari,judul,isi,tgl,nama)values('$untuk','$dari','$judul','$isi','$tgl','$mhss[nama]')");
  echo"<b><i>SENDDING SUCCESS</i></b>";
  }
  ?>
  <?php 
  $iduntuk = @mysql_real_escape_string($_GET['iduntuk']);
  ?>
  <table width="600" border="0" class="table table-bordered table-sm" style="max-width:40rem;">
    <tr>
      <td><input type="text" style="max-width:20rem;" name="untuk" class="form-control form-control-sm" autocomplete="off" placeholder=" gunakan nim/nid/ID" value="<?php echo"$iduntuk"; ?>">
      <font color="#666666">*(untuk ID tujuan yang anda kirim</font></td>
    </tr>
    <tr>
      <td>
	  <input type="text" name="judul" style="max-width:20rem;" class="form-control form-control-sm" autocomplete="off" placeholder="Subject / Judul">	  </td>
    </tr>
    <tr>
      <td height="102"><textarea name="editor1" rows="12" wrap="VIRTUAL" class="form-control"></textarea>
	     <script>
            CKEDITOR.replace( 'editor1' );
        </script>*(kirim ke MyMail ID 8008 jika ada pertanyaan tentang SIKADU</td>
    </tr>
    <tr>
      <td height="49"><button name="kirim" class="btn btn-success btn-sm"><i class="far fa-paper-plane"></i>&nbsp;KIRIM</button></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
}
?>