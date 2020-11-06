<?php
		switch(@$sql_slash($_GET['OUT'])){
			case'MB_BU_NEW':
				include"../logic/LOGOUT.php";
				break;
		}
	?>
<nav>
    <div class="nav-wrapper green darken-1 ">
      <a href="HOME.php" class="brand-logo">{KEU}</a>
	  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons medium">menu</i></a> 
    </div>
  </nav>
	 <ul id="slide-out" class="sidenav">
    <li><div class="user-view">
      <div class="background">
       <img src="http://sikadu.unwahas.ac.id/img/fab8d47708419c33a4050bbb315aa142.jpeg" />
      </div>
	  <br><br><br>
    </div></li>
    <li><div class="divider"></div></li>
    <li><a class="subheader">Menus</a></li>
    <li><a class="waves-effect" href="?HLM=MB_BU_HIS_TGH"><i class="fas fa-dice"></i>Riwayat Tagihan / NIM</a></li>
     <li><a class="waves-effect" href="?OUT=MB_BU_NEW"><i class="fas fa-power-off"></i>Keluar</a></li>
	
        
  </ul>
