<?php //session_start();
 //include_once"../sc/conek.php";

	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
	$u = mysql_query("select * from user where namauser='$_SESSION[namauser]'");
	$uu = mysql_fetch_array($u);
	
 ?>

		<script language="JavaScript" type="text/JavaScript">
        <!--
        function MM_openBrWindow(theURL,winName,features) { //v2.0
          window.open(theURL,winName,features);
        }
        //-->
        </script>
        </head>
        
        <body><br><br>
        <h6 class="badge badge-primary">#KRS YANG DIPILIH </h6>
        <div class="alert alert-dismissible alert-info">
          <b>#INFORMASI PENGISIAN</b>
          <ul>
          <li>Pastikan KRS yang anda pilih sudah disetujui dosen wali ditandai dengan warna biru <img src="../img/map_blue.png" width="36" height="37">  
          <li>Kalo masih berwarna merah <img src="../img/map_red.png" width="34" height="32">silahkan konfirmasi ke dosen wali 
          <li>Logo <img src="../img/arrow-down-32.png" width="30" height="28"> untuk download materi mata kuliah yang bersangkutan
          <li>Silahkan cetak KRS anda dan mintakan TTD ke <?php echo"<b>$dsnn2[nama]</b>"; ?>
          <li>Periksalah dengan seksama, jangan sampai ada kesalahan input 
        </ul>
        </div>
        <?php
        switch(@mysql_real_escape_string($_GET['sks'])){
        case'edit_sks':
        include"edit_sks.php";
        break;
        
        }
        ?>
        <?php
        $kdkrs = @mysql_real_escape_string($_GET['kdkrs']);
        if(isset($_GET['kdkrs'])){
        $idprk = @$_GET['idprk'];
        $j = @mysql_real_escape_string($_GET['j']);
        $jp = @mysql_real_escape_string($_GET['jp']);
        mysql_query("update krs set jumlah='$j' where idkrs='$kdkrs'");
        mysql_query("update krs set app='2' where idkrs='$kdkrs'");
        //mysql_query("update krs set idpraktikum='$idprk' where idkrs='$kdkrs'");
        //mysql_query("update krs set jumlah_praktikum='$jp' where idkrs='$kdkrs'");
        
        }
        
        ?>
        <?php
        $pkdkrs = @mysql_real_escape_string($_GET['pkdkrs']);
        if(isset($_GET['pkdkrs'])){
        $idprk = @$_GET['idprk'];
        //$j = @mysql_real_escape_string($_GET['j']);
        $jp = @mysql_real_escape_string($_GET['jp']);
        mysql_query("update p_sks set jumlah='$jp' where idp_sks='$pkdkrs'");
        mysql_query("update p_sks set app='2' where idp_sks='$pkdkrs'");
        //mysql_query("update krs set idpraktikum='$idprk' where idkrs='$kdkrs'");
        //mysql_query("update krs set jumlah_praktikum='$jp' where idkrs='$kdkrs'");
        
        }
        
        ?>
        <?php
        $delpkdkrs = @mysql_real_escape_string($_GET['delpkdkrs']);
        if(isset($_GET['delpkdkrs'])){
        
        mysql_query("delete from p_sks where idp_sks='$delpkdkrs'"); 
        }
        
        ?>
        <?php
        $delkdkrs = @mysql_real_escape_string($_GET['delkdkrs']);
        if(isset($_GET['delkdkrs'])){
        
        mysql_query("delete from krs where idkrs='$delkdkrs'"); 
        }
        
        ?>
        
        
        <table width="100%" border="0" align="center" class="table table-bordered table-striped table-sm">
          <tr align="center" class="table-success">
            <td width="153" height="35">Kode Mapel</td>
            <td width="174">Judul</td>
            <td width="150">Semester</td>
            <td width="45">Jumlah </td>
            <td width="220">Ation</td>
          </tr>
          <?php
          $krs = mysql_query("select * from krs where idmahasiswa='$mhss[idmahasiswa]' and idsemester='$mhss[idsemester]' ");
          while($krss = mysql_fetch_array($krs)){
          $sks = mysql_query("select * from sks where idsks='$krss[idsks]' ");
        $skss = mysql_fetch_array($sks);
          $sm = mysql_query("select * from semester where idsemester='$skss[idsemester]'");
        $smm = mysql_fetch_array($sm);
         $dsn = mysql_query("select * from dosen where iddosen='$skss[iddosen]'");
        $dsnn = mysql_fetch_array($dsn);
        $kj = mysql_query("select * from kejuruan where idkejuruan='$mhss[idkejuruan]'");
        $kjj = mysql_fetch_array($kj);
        $kr  = mysql_query("select * from kurikulum where idkurikulum='$skss[idkurikulum]'");
        $krr = mysql_fetch_array($kr);
          
          ?>
          <tr align="center" bgcolor="#FFFFFF">
            <td height="50"><?php echo"<a href=#>$krr[idsk]</a><br>$kjj[kejuruan]<br>$skss[jumlah]&nbsp; SKS"; ?></td>
            <td><?php echo"<b>$krr[judul]</b><br>
            <u>Oleh &nbsp; $dsnn[nama]</u><br>
            
            "; ?>
            </td>
            <td><?php echo"$smm[semester]<br><b><font color=blue>$skss[hari]</font><br> $skss[jam]  WIB</b>"; ?></td>
            <td><?php 
            if($krss['jumlah'] <=0){
            echo"Sedang diproses</a>";
            }else{
            
            echo"$krss[jumlah]";
            } ?>
            </td>
            <td>
            <?php
            if($krss['app']==1){
            
            ?>
            <img src="../img/map_red.png" width="40" height="40" title="belum di setujui">
            &nbsp;<a href="<?php echo"?mng=vkrs&delkdkrs=$krss[idkrs]"; ?>" class="btn btn-danger">Hapus</a>
            <?php
            }else{
        
            echo"<a href=# onClick=MM_openBrWindow('vmateri.php?idsks=$skss[idsks]','','scrollbars=yes,width=700,height=500')><img src=../img/arrow-down-32.png></a>";
            ?>
            <img src="../img/map_blue.png"  width="40" height="40" title="sudah di setujui">
            &nbsp;<a href="#" onClick="MM_openBrWindow('<?php echo"soal_01.php?idsks=$skss[idsks]"; ?>','','scrollbars=yes,width=900,height=500')" class="btn btn-primary">CBT-Q</a>
            
            <?php
            }
            
            
            ?>
            
            </td>
          </tr>
           <?php
          }
          ?>
          <tr align="center" bgcolor="#FFFFFF">
            <td height="50" colspan="3">Total KRS ACC </td>
            <td height="50"><?php
            
            $k = mysql_query("select sum(jumlah) as kr from krs where idmahasiswa='$mhss[idmahasiswa]'  and idsemester='$mhss[idsemester]'   ");
            $kk = mysql_fetch_array($k);
            echo"<br><b>$kk[kr]</b>";
            
            
            
             ?></td>
            <td>&nbsp;</td>
          </tr>
        </table>
        <br>
         <table width="100%" border="0" class="table">
           <tr>
             <td width="50%"><a href="<?php echo"ctk_tran_sks.php?kdmhs=$mhss[idmahasiswa]"; ?>" target="_blank">CETAK  TRANSKRIP MAHASISWA</a></td>
             <td width="50%" align="right"><?php
			 			 echo"<a href=# onClick=MM_openBrWindow('ctk_krs_mhs.php?kdmhs=$kdmhs','','scrollbars=yes,width=900,height=800')><img src=../img/print-32.png width=32 height=32 border=0 title=cetak KRS>CETAK KRS</a>";
				?>
            </td>
           </tr>
           <tr>
             <td colspan="2"><div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">PERHATIAN</button>
          <ul>
         <li>Setelah selesai di ACC dosen wali, Cetak KRS anda dengan klik 'CETAK KRS'</li>
          <li>Gunakan browser google crhome untuk tampilan terbaik, dan cetak dengan kertas ukuran A4 70 Gr</li>
           <li>Untuk cetak gunakan CTRL+P, lihat apakah sudah sesuai dengan format</li>
            <li>Apabila ada gambar atau garis yang tidak terlihat, centang pilihan Background Graphics pada browser google crome anda  </li></ul>
        </div></td>
           </tr>
         </table>
         
        <br>
        <br>


</body>
<?php } ?>