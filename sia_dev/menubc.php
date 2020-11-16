 <div id='cssmenu'>
<ul>
  <li><a href='admin_sia_ui.php'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Setting Profil</span></a>
      <ul>
         <li><a href='admin_sia_ui.php?mng=profil#profil'><span>Edit Profil Mahasiswa</span></a></li>
		  <li><a href='admin_sia_ui.php?mng=edit_akun'><span>Edit Akun Sikadu</span></a></li>
		  
		   <li><a href="#" onClick="MM_openBrWindow('u_foto/index.php','','scrollbars=yes,width=500,height=500')"><span>Edit Gambar</span></a></li>
        </ul>
		 <li class='active has-sub'><a href='#'><span>KRS</span></a>
      <ul>
         <li><a href='admin_sia_ui.php?mng=vkelas'><span>Input KRS  </span></a>
		    <li><a href='admin_sia_ui.php?mng=vkrs'><span>Preview KRS  </span></a>
			<li><a href="<?php echo"ctk_tran_sks_try_urut.php?kdmhs=$mhss[idmahasiswa]"; ?>" target="_blank"><span>Print Trankrip </span></a>
			<li><?php

echo"<a href=# onClick=MM_openBrWindow('ctk_krs_mhs.php?kdmhs=$kdmhs','','scrollbars=yes,width=900,height=800')><span>Print KRS</span></a>";

?></a>
            
         </li>
        
      </ul>
         <li class='active has-sub'><a href='#'><span>KHS</span></a>
      <ul>
         <li><a href='admin_sia_ui.php?mng=v_ikhs'><span>Preview KHS</span></a></li>
		
        </ul>
	 <li class='active has-sub'><a href='#'><span>Info Akademik</span></a>
      <ul>
         <li><a href='admin_sia_ui.php?mng=infoaka'><span>Info</span></a></li>
		
        </ul>
		<li><a href=''><span>FAQ</span></a></li>
		<li class='active has-sub'><a href='#Coming Soon'><span>MyMail
		<?php 
	$m = mysql_query("select sum(baca) as bc from mymail where untuk='$mhss[idmahasiswa]' and baca='1'   ");
	$mm = mysql_fetch_array($m);
	echo"(<b>$mm[bc]</b>)"; ?></span></a>
	<ul>
	 <li><a href='admin_sia_ui.php?mng=newmail'><span>NEW MESSAGE</span></a></li>
         <li><a href='admin_sia_ui.php?mng=inbox'><span>INBOX</span></a></li>
		  <li><a href=''><span>OUTBOX</span></a></li>
		  
		
        </ul>
	
		<li><a href='../FORUM/'><span>FORUM</span></a></li>
		<li><a href='metu.php'><span><img src="../img/remove-32.png" width="20" height="20" border="0">LOG OUT</span></a></li>
</ul>  
</div>