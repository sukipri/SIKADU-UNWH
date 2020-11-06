<?php
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
		$ack_mpl = rand("88888","99999");
		$kj_mpl = "$kjj_02[idkejuruan]$ack_big";
		$idkr = @$sql_escape($_GET['idkr']);
		 $sks = $call_q("$sl idmain,idkurikulum,idkejuruan,idsemester,judul,sks,jp FROM kurikulum  where idmain='$idkr'");
			  $skss = $call_fas($sks);
			  $sm = $call_q("$sl idsemester,idtahun_ajaran,semester FROM  semester where idsemester='$skss[idsemester]' ");
		 $smm = $call_fas($sm);
		 $smtj = $call_q("$call_sel tahun_ajaran  where idtahun_ajaran='$smm[idtahun_ajaran]'");
		$smmtj = $call_fas($smtj); 
		
		$sm2 = $call_q("$sl idmain,idsemester,idtahun_ajaran,semester,aktif FROM semester where aktif='2' order by idmain asc limit 1");
 			 $smm2 = $call_fas($sm2);
	?>
<body>
<form name="form1" method="post" action="">
<?php
		if(isset($_POST['simpan'])){
		$semester   = @$sql_escape($_POST['semester']);
		$kode_kur   = @$_POST['kode_kur'];
		$jumlah  = @$sql_escape($_POST['jumlah']);
		$hari  = @$sql_escape($_POST['hari']);
		$jam  = @$sql_escape($_POST['jam']);
		$kelas  = @$sql_escape($_POST['kelas']);
		$kode  = @$sql_escape($_POST['kode']);
		$kuota  = @$sql_escape($_POST['kuota']);
		$kdruang  = @$sql_escape($_POST['kdruang']);
		$idkjur  = @$sql_escape($_POST['idkjur']);
		$jpx  = @$sql_escape($_POST['jpx']);
		$batas  = @$sql_escape($_POST['batas']);
		$judul = @$sql_escape($_POST['judul']);
		$ack = rand("88888","99999999");
		$idsks = "$kode_kur.$ack";
		
		$call_q("$in sks(idmainsks,idsks,iddosen,idsemester,idkejuruan,idruang,idkurikulum,judul,jumlah,hari,jam,idkelas,kuota,jp,batas_dosen)values('','$idsks','$IDDSN','$semester','$idkjur','$kdruang','$kode_kur','$judul','$jumlah','$hari','$jam','$kelas','$kuota','$jpx','$batas')");
		?>
		<div class="alert alert-dismissible alert-success">
  				<button type="button" class="close" data-dismiss="alert">&times;</button>
 				 <strong>Well done!</strong> You successfully Save.......
					</div>
		<?php } ?>
<div id="GET_DATA">
<table width="100%" border="0" class="table">
  <tr>
    <td width="37%">
		Pilih Kurikulum | <a href="#" class="btn btn-danger btn-sm"><?php echo"Daftar Ampu $smm2[semester]"; ?></a><br><br>
		<div style="overflow:auto;width:100%;height:600px;padding:10px;border:1px solid #eee">
			<?php
				$sm3= $call_q("$sl idmain,idsemester,idtahun_ajaran,semester,aktif FROM semester order by idmain desc ");
 				while( $smm3 = $call_fas($sm3)){
			?>
			<ul><li><?php echo"$smm3[semester]"; ?>
      <?php
	  		$vkr = $call_q("$sl idmain,idkurikulum,idsemester,idkejuruan,judul FROM kurikulum where idkejuruan='$IDKJ' AND idsemester='$smm3[idsemester]' order by judul asc");
				while($vkrr = $call_fas($vkr)){
				?>
			
			<ul><li><a href="<?php echo"?HLM=DSN_M&SUB=DSN_SKS_02&kddsn=$IDDSN&IDDSN=$IDDSN&IDKJ=$IDKJ&idkr=$vkrr[idmain]#GET_DATA"; ?>"><i class="fa fa-hand-o-right"></i>&nbsp;<?php echo" $vkrr[judul]"; ?> </a></li></ul>
			<?php } ?>
			</li></ul>
			<?php } ?>
			</div>
    </td>
    <td width="63%">
	<table width="100%" border="0" align="center"  class="table table-bordered">
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="47">Dosen</td>
          <td><?php echo"$dsnn[nama]"; ?></td>
        </tr>
        <tr valign="middle" bgcolor="#FFFFFF">
          <td width="72" height="47">Kode Kurikulum </td>
          <td width="826"><input type="text" name="kode_kur" value="<?php echo"$skss[idkurikulum]";?>" class="form-control" readonly="">
              <br>
            // <?php echo"$skss[judul]";?></td>
        </tr>
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="54">Judul</td>
          <td><input name="judul" type="text" id="judul" size="45" value="<?php echo"$skss[judul]";?>" class="form-control"></td>
        </tr>
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="54">Semester</td>
          <td>
		
            <input type="text" name="semester" value="<?php echo"$smm2[idsemester]";  ?>" class="form-control" readonly=""></td>
        </tr>
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="37">Jumlah SKS </td>
          <td><input name="jumlah" type="text" id="jumlah" size="10" value="<?php echo"$skss[sks]"; ?>" class="form-control">
          </td>
        </tr>
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="37">Kode Kejuruan</td>
          <td><input type="text" name="idkjur" value="<?php echo"$skss[idkejuruan]"; ?>" class="form-control"></td>
        </tr>
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="37">Waktu</td>
          <td><select name="jam" class="form-control" required>
		  <option value=""></option>
              <?php
	  $jam = $call_q("select * from jam");
	  while($jamm = $call_fas($jam)){
	 
	   echo"<option value=$jamm[jam]>$jamm[jam]</option>";
	 } ?>
            </select>
            *(00.00</td>
        </tr>
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="37">Hari</td>
          <td><select name="hari" id="hari" class="form-control" required>
		  <option value=""></option>
              <?php
	  $hari = $call_q("select * from hari");
	  while($harii = $call_fas($hari)){
	  if($harii['hari']==$skss['hari']){
	  echo"<option value=$harii[hari] selected>$harii[hari]</option>";
	  }else{
	   echo"<option value=$harii[hari]>$harii[hari]</option>";
	 }}  ?>
          </select></td>
        </tr>
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="37">Kelas</td>
          <td><select name="kelas" id="kelas" class="form-control" required>
             <option value=""></option>
              <?php
		     $kls = $call_q("select * from kelas");
  while($klss = $call_fas($kls)){
  echo"<option value=$klss[idkelas]>$klss[kelas]</option>";
  } ?>
          </select></td>
        </tr>
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="37">Kuota Mahasiswa </td>
          <td><input name="kuota" type="text" id="kuota" size="15" class="form-control" required></td>
        </tr>
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="37">Jenis SKS </td>
          <td><input type="text" name="jpx" value="<?php echo"$skss[jp]";?>" class="form-control" readonly=""></td>
        </tr>
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="37">Ruang</td>
          <td><select name="kdruang" id="kdruang" class="form-control" required>
              <option>ruang..................</option>
              <?php $r = $call_q("select * from ruang");
		while($rr = $call_fas ($r)){
		$g = $call_q("select * from gedung where idgedung='$rr[idgedung]'");
		$gg = $call_fas ($g);
		echo"<option value=$rr[idruang]>$gg[gedung] / $rr[idruang]</option>";
		
		}?>
          </select></td>
        </tr>
        <tr valign="middle" bgcolor="#FFFFFF">
          <td height="37">BATAS </td>
          <td><input name="batas" type="date" id="batas" value="<?php echo"$skss[batas_dosen]"; ?>" class="form-control"></td>
        </tr>
        <tr align="center" valign="middle" bgcolor="#FFFFFF">
          <td height="37" colspan="2"><input name="simpan" type="submit" id="simpan" value="simpan data sks"class="btn btn-success"></td>
        </tr>
    </table></td>
  </tr>
</table>
 </div>
		  </form>
		 
</body>
<?php } ?>
