<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
			?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<ol class="breadcrumb">
  		<li class="breadcrumb-item"><a href="HOME.php">Home</a></li>
  		<li class="breadcrumb-item active">Master Dosen</li>
	</ol>
		<a href="?HLM=DSN_M&SUB=DSN_I" class="btn btn-outline-success btn-lg"><i class="fa fa-italic"></i>&nbsp;Entri Dosen</a>
	<a href="?HLM=DSN_M&SUB=DSN_C" class="btn btn-outline-info btn-lg"><i class="fa fa-list"></i>&nbsp; Managemen Dosen</a>
	<br>
	<?php include"../logic/page_logic_sa_sub.php"; ?>
</body>
</html>
<?php } ?>