<?php //session_start();
if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {

	
 ?>
</head>

<body>
<?php
		$kdsks=@$sql_escape($_GET['kdsks']);
		 $sks =$call_q("select * from sks where idsks='$kdsks'");
		$skss = $call_fas($sks);
		 $sm =$call_q("select * from semester where idsemester='$skss[idsemester]'");
		$smm = $call_fas($sm);
		 $dsn =$call_q("select * from dosen where iddosen='$skss[iddosen]'");
		$dsnn = $call_fas($dsn);
		$kj =$call_q("select * from kejuruan where idkejuruan='$skss[idkejuruan]'");
		$kjj = $call_fas($kj);

?>
<?php
if(isset($_POST['simpan'])){
		$semester   = @$sql_escape($_POST['semester']);
		$judul   = @$sql_escape($_POST['judul']);
		$jumlah  = @$sql_escape($_POST['jumlah']);
		$hari  = @$sql_escape($_POST['hari']);
		$jam  = @$sql_escape($_POST['jam']);
		$dosen  = @$sql_escape($_POST['dosen']);
		$kelas  = @$sql_escape($_POST['kelas']);
		$kuota  = @$sql_escape($_POST['kuota']);
		$batas  = @$sql_escape($_POST['batas']);
		$app  = @$sql_escape($_POST['app']);
		$kdruang  = @$sql_escape($_POST['kdruang']);
		$call_q("update sks set iddosen='$dosen',idsemester='$semester',idruang='$kdruang',idkurikulum='$judul',jumlah='$jumlah',hari='$hari',jam='$jam',idkelas='$kelas',kuota='$kuota',app='$app',batas_dosen='$batas' where idsks='$kdsks' ");$call_q("update krs set jumlah='$jumlah' where idsks='$kdsks'");
		 echo "<script language='javascript'>alert('SKS  Berhasil di edit ke database')</script>";
			echo "<script language='javascript'>window.location = '?aka=vsks'</script>";
			exit();
		}
?>
<form action="" method="post" name="form1" onSubmit="MM_validateForm('judul','','R','jumlah','','RisNum');return document.MM_returnValue">
  <h4>Edit SKS
  </h4> 
  <a href=<?php echo"?aka=update_sks&IDSKS=$skss[idsks]&IDKR=$skss[idkurikulum]"; ?> class="btn btn-warning"><i class="fa fa-level-up"></i>&nbsp;Update SKS</a></h4>
  <div class="alert alert-dismissible alert-info">
				<b>#EDIT DATA SKS</b>
	</div>
  <table width="765" border="0" align="center" class="table table-bordered">
    <tr valign="middle">
      <td width="275" height="47">Kode Mapel </td>
      <td width="480"><?php echo"<b>$skss[idsks]</b>"; ?></td>
    </tr>
    <tr valign="middle">
      <td height="54">Dosen</td>
      <td><select name="dosen" class="form-control">
	  <?php
		
		$dsn01 =$call_q("select * from dosen ");
			while($dsnn01 = $call_fas($dsn01)){
			if($dsnn01['iddosen']==$skss['iddosen']){
			echo"<option value=$dsnn01[iddosen] selected>$dsnn01[nama]</option>";
			}else{ 
			echo"<option value=$dsnn01[iddosen]>$dsnn01[nama]</option>";
			}} 

		?>
      </select>
		
      </td>
    </tr>
    <tr valign="middle">
      <td height="54">Kejuruan</td>
      <td><?php echo"<b>$kjj[kejuruan]</b>"; ?></td>
    </tr>
    <tr valign="middle">
      <td height="54">Semester Sebelumnya </td>
      <td><?php echo"<b>$smm[semester]</b>"; ?></td>
    </tr>
    <tr valign="middle">
      <td height="54">Semester</td>
      <td><select name="semester" class="form-control">
        <option>Semester</option>
		<?php
		$sm1 =$call_q("select * from semester ");
		  while($smm1 = $call_fas($sm1)){
		   $th =$call_q("select * from tahun_ajaran where idtahun_ajaran='$smm[idtahun_ajaran]'");
		  $thh = $call_fas($th);
		  
		  if($smm1['idsemester']==$skss['idsemester']){
			echo"<option value=$smm1[idsemester] selected>$smm1[semester] &nbsp; $thh[ajaran] &nbsp; $smm1[ajaran]</option>";
		  }else{
		  echo"<option value=$smm1[idsemester]>$smm1[semester] &nbsp; $thh[ajaran] &nbsp; $smm1[ajaran]</option>";
		  }}
		?>
      </select></td>
    </tr>
    <tr valign="middle">
      <td height="51">Kode Kurikulum </td>
      <td><input type="text" name="judul" id="judul" value="<?php
	 
	   $skskr =$call_q("select * from kurikulum where idkurikulum='$skss[idkurikulum]'");
	  $sksskr = $call_fas($skskr);
	  echo"$sksskr[idkurikulum]";
	  ?>" class="form-control">
     
        
      </td>
    </tr>
    <tr valign="middle">
      <td height="37">Jumlah / QTY </td>
      <td><input name="jumlah" type="text" id="jumlah" size="10" value="<?php echo"$skss[jumlah]"; ?>" class="form-control"></td>
    </tr>
    <tr valign="middle">
      <td height="37">Waktu</td>
      <td><select name="jam" class="form-control">
	  <?php
	  $jam =$call_q("select * from jam");
	  while($jamm = $call_fas($jam)){
	  if($jamm['jam']==$skss['jam']){
	  echo"<option value=$jamm[jam] selected>$jamm[jam]</option>";
	  }else{
	   echo"<option value=$jamm[jam]>$jamm[jam]</option>";
	  }
	  }
	  
	  
	  ?>
	  
	  
	  </select>
      *(00.00</td>
    </tr>
    <tr valign="middle">
      <td height="37">Hari</td>
      <td><select name="hari" id="hari" class="form-control">
	  <?php
	  $hari =$call_q("select * from hari");
	  while($harii = $call_fas($hari)){
	  if($harii['hari']==$skss['hari']){
	  echo"<option value=$harii[hari] selected>$harii[hari]</option>";
	  }else{
	   echo"<option value=$harii[hari]>$harii[hari]</option>";
	  }
	  }
	  
	  
	  ?>
	  
	  
	  </select></td>
    </tr>
    <tr valign="middle">
      <td height="37">Kelas</td>
      <td><select name="kelas" id="kelas" class="form-control">
        <option>Kelas</option>
        <?php
		     $kls =$call_q("select * from kelas");
  while($klss = $call_fas($kls)){
  if($klss['idkelas']==$skss['idkelas']){
  echo"<option value=$klss[idkelas] selected>$klss[kelas]</option>";
  }else{
  echo"<option value=$klss[idkelas]>$klss[kelas]</option>";
  
  }
  }
		   
		   ?>
      </select></td>
    </tr>
    <tr valign="middle">
      <td height="37">Kuota mahasiswa </td>
      <td><input name="kuota" type="text" id="kuota" size="15" value="<?php echo"$skss[kuota]"; ?>" class="form-control"></td>
    </tr>
    <tr valign="middle">
      <td height="37">Ruang</td>
      <td><select name="kdruang" id="kdruang" class="form-control">
        <option>Ruang</option>
        <?php $r =$call_q("select * from ruang");
		while($rr = $call_fas ($r)){
		if($rr['idruang']==$skss['idruang']){
		$g =$call_q("select * from gedung where idgedung='$rr[idgedung]'");
		$gg = $call_fas ($g);
		echo"<option value=$rr[idruang] selected>$gg[gedung] / $rr[idruang]</option>";
		}else{
		$g =$call_q("select * from gedung where idgedung='$rr[idgedung]'");
		$gg = $call_fas ($g);
		echo"<option value=$rr[idruang]>$gg[gedung] / $rr[idruang]</option>";
		}
		}?>
      </select></td>
    </tr>
    <tr valign="middle">
      <td height="37">APP</td>
      <td><select name="app" id="app" class="form-control">
        <option value="1">AKTIF</option>
        <option value="2">TIDAK AKTIF</option>
      </select></td>
    </tr>
    <tr valign="middle">
      <td height="37">BATAS DOSEN </td>
      <td><input name="batas" type="date" id="batas" value="<?php echo"$skss[batas_dosen]"; ?>" class="form-control"></td>
    </tr>
    <tr align="center" valign="middle">
      <td height="26" colspan="2"><input name="simpan" type="submit" id="simpan" value="edit data sks" class="btn btn-success"></td>
    </tr>
  </table>
</form>
</body>
</html>
<?PHP } ?>