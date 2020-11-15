	<?php session_start();
	include_once"../../sc/conek.php";
	include_once"css.php";
	include"../../NEW_CODE/code_rand.php";
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
			//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
			header('location:index.php');
		} else {
		$u = $call_q("$sl iduser_ku,idku,idfakultas,username,passuser,akses FROM user_ku where username='$_SESSION[namauser]'");
		$uu = $call_fas($u);
		//$ku = $call_q("select * from ku where idku='$uu[idku]'");
		//$kuu = $call_fas($ku);
		$fak02 = $call_q("$call_sel fakultas where idfakultas='$uu[idfakultas]'");
			$fakk02 = $call_fas($fak02);
		//$kdmhs = "$kuu[idku]";
	 ?>
	 <?php if($uu['akses']==11){ ?>
	
	</head>
	<style type="text/css">
	body {
		padding-top: 75px;
}

	.wht{
	color:#FFFFFF;
	}

	</style>
	<body>
	<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
          <a class="navbar-brand" href="?">Admin Fakultas</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Home
                  <span class="sr-only">(current)</span>
                </a>
              
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Search">
              <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>
          </div>
</nav>
	<br>
	<?php include"awal.php"; ?>
	<br>
	<div class="container">
		<?php include"SWITCH_MENU.php"; ?>
	 </div>
	<br>
		<span class="badge badge-info">&copy; sikadu.unwahas.ac.id dev bejotech 
		<?php
		  include"../../sc/s_o.php";
		   echo "&nbsp; //SO&nbsp;<b><font color=blue>".$os; "</font></b>"; ?>
		</span>
	</body>

	<?php
	}else{ echo"<h1><center>MAAF AKSES TIDAK DI IJINKAN<br><a href=index.php>klik untuk kembali</a></center></h1>";
	}
	?>
	<?php } ?>