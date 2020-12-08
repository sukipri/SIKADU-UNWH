<?php //session_start();
if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {

 ?>
<body>
	<div class="alert alert-dismissible alert-info">
          <b>#Cari Data SKS</b>
	</div>
		
<form name="form1" method="post" action="">
          <table width="500">
            <tr>
              <td width="284"><input name="cari" type="text" required autocomplete="off" id="cari" size="45" class="form-control form-control-sm"></td>
              <td width="204"><input name="cari_data" type="submit" id="cari_data2" value="pencarian" class="btn btn-success btn-sm"></td>
            </tr>
          </table>
          <?php
          $idsks = @$sql_escape($_GET['idsks']);
          if(isset($_GET['idsks'])){
          $call_q("delete from sks where idsks='$idsks'");
           echo "<script language='javascript'>alert('SKS  Berhasil di hapus')</script>";
            echo "<script language='javascript'>window.location = '?aka=csks'</script>";
            exit();
            }
          ?>
        </form>
        <br>
        <table width="100%" border="0" align="center" class="table table-bordered table-sm table-striped">
          <tr align="center" class="table-info">
            <td width="142" height="35">Kode Mapel</td>
            <td width="175">Judul</td>
            <td width="165">Semester</td>
            <td width="54">Jumlah </td>
            <td width="157">Action</td>
          </tr>
          <?php
				  if(isset($_POST['cari_data'])){
				  $car = @$sql_escape($_POST['cari']);
				  $sks = $call_q("select * from sks where idsks LIKE '%$car%'");
				  while($skss = $call_fas($sks)){
				  $sm = $call_q("select * from semester where idsemester='$skss[idsemester]'");
				$smm = $call_fas($sm);
				 $dsn = $call_q("select * from dosen where iddosen='$skss[iddosen]'");
				$dsnn = $call_fas($dsn);
				$kj = $call_q("select * from kejuruan where idkejuruan='$dsnn[idkejuruan]'");
				$kjj = $call_fas($kj);
				 $kr = $call_q("select * from kurikulum where idkurikulum='$skss[idkurikulum]'");
				 $krr = $call_fas($kr);
          
          ?>
        
          <tr align="center">
            <td height="50"><?php echo"<a href=#>$skss[idsks]</a><br>$kjj[kejuruan]"; ?></td>
            <td><?php echo"<b>$krr[judul]</b><br><b>$krr[juduleng]</b><br>
            <u>Oleh &nbsp; $dsnn[nama]</u><br>$skss[idkelas]
            "; ?></td>
            <td><?php echo"$smm[semester]<br><b><font color=blue>$skss[hari]</font><br> $skss[jam]  WIB<br>Ruang &nbsp; $skss[idruang]</b>"; ?></td>
            <td><?php echo"Sks &nbsp;$skss[jumlah]<br>kuota &nbsp;$skss[kuota]"; ?><br>
              <?php 
            $mhs = $call_q("select * from krs where idsks='$skss[idsks]' and app='2'");
            $jummhs = mysql_num_rows($mhs);
            
            echo"Diambil &nbsp; $jummhs "; ?></td>
            <td align="left"> 
              <ul><li><a href=<?php echo"?aka=edit_sks&kdsks=$skss[idsks]"; ?>>Edit SKS</a></li>
                 <li> <?php
            echo"
            <a href=#$skss[idsks] onClick=MM_openBrWindow('mabsen.php?kddsn=$skss[iddosen]&idsks=$skss[idsks]#$skss[idsks]','','scrollbars=yes,width=500,height=800')>"; ?>
              Absensi / Presensi </a></li>
            <li><?php echo"<a href=?pilih=vsks&idsks=$skss[idsks]>"; ?>Hapus SKS</a></li><li><a href="<?php echo"#$skss[idsks]"; ?>" onClick="MM_openBrWindow('<?php echo"isoal_01.php?idsks=$skss[idsks]#$skss[idsks]"; ?>','','scrollbars=yes,width=320,height=500')">Buat Soal</a></li></ul></td>
          </tr>
					<?PHP }} ?>
</table>
</body>
</html>
<?PHP } ?>