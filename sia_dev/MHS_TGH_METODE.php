<?php 
	//session_start();
	// include_once"../sc/conek.php";
	 //include_once"css.php";
	
		
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
			//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
			header('location:index.php');
		} else {
?>
		<h6 class="badge badge-info">#Tagihan Bank</h6>
        <br>
        <a href="?mng=TAGIHAN_02" class="btn btn-primary btn-sm"><img src="https://bankjateng.co.id/wp-content/uploads/2017/12/logo_1b0bcb08eda167883b7d923c2387670a.png"></a>
        &nbsp;
        <a href="?mng=TAGIHAN" class="btn btn-primary btn-sm"><img src="https://bri.co.id/o/bri-corporate-theme/images/logo-white.png"></a>
<?php } ?>