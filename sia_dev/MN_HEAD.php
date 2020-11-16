<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-success">
  <a href="?"><img src="../img/logo-unwahas.png" width="140" height="50"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
    <!-- 
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      -->
      <div style="margin-left:20px;"></div>
     <li class="nav-item">
        <form action="?mng=icari" method="post" name="cari01">
             <div class="input-group input-group-sm mb-3">
              <input autocomplete="off" style="max-width:10rem;" name="cari" type="text" class="form-control form-control-sm" id="cari" size="55" placeholder="cari teman" required>
              <div class="input-group-append">
               <button name="cari_data" class="btn btn-info btn-sm"><i class="fas fa-search"></i></button>
              </div>
   		</div>
        </form>
      </li>
     
    </ul>
    
    <ul class="navbar-nav mr-auto">
	<!-- -->
    <li> 
    <div class="dropdown">
          <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <i class="fas fa-user-alt"></i>&nbsp;Profile</a>
        
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="?mng=PROFIL_MAHASISWA">Info Profile</a>
            <a class="dropdown-item" href="?mng=AKUN">Akun Profile</a>
            <a class="dropdown-item" href="#" onClick="MM_openBrWindow('u_foto/index.php','','scrollbars=yes,width=500,height=500')">Photo Profile</a>
          	  <a class="dropdown-item" href="#" onClick="MM_openBrWindow('<?php echo"ctk_cv_mhs.php?kdmhs=$mhss[idmahasiswa]"; ?>','','scrollbars=yes,width=600,height=800')">Akun Profile</a>
          </div>
        </div>
    
    </li>
    
        <li>
        <div class="dropdown">
          <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <i class="far fa-comment-alt"></i>&nbsp;MyMail
           <?php 
		   $m = $call_q("select sum(baca) as bc from mymail where untuk='$mhss[idmahasiswa]' and baca='1'   ");
			$mm = $call_fas($m);
				echo"(<b>$mm[bc]</b>)"; 
			?>
          </a>
        
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="?mng=newmail">Pesan Baru</a>
            <a class="dropdown-item" href="?mng=inbox">INBOX</a>
           
 		 </div>
         
		</div>
	</li>

    	<li style="margin-left:600px;"><a class="nav-link btn btn-danger btn-sm" href="metu.php"><i class="fas fa-door-open"></i>&nbsp;Keluar</a></li>
        <!-- -->
    </ul>
    
  </div>
</nav>