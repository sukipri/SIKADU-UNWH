<?php //session_start();
 include_once"../sc/conek.php";

	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
 ?>
  <div style="overflow:auto;width:auto;height:500px;padding:10px;border:1px solid #eee">				
	<table class="table table-bordered table-sm">
	<?php
	 class berita{}
		$info = mysql_query("select * from berita order by idberita desc limit 5");
		while($infoo = mysql_fetch_array($info)){
						$ambil_berita = new berita();
							$ambil_berita->tgl="$infoo[tgl]";
							$ambil_berita->judul="$infoo[judul]";
							$ambil_berita->isi="$infoo[isi]";
			echo"
			<tr class=info>
				<td>$ambil_berita->tgl</td>
			</tr>
					<tr>
				<td>$ambil_berita->judul <br> $ambil_berita->isi</td>
			</tr>";
}

?>
		</table>
        </div>
	<?php } ?>