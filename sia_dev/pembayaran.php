<?php //session_start();
 include_once"../sc/conek.php";

	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
 ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<form name="form1" method="post" action="">
  <h4>PREVIEW BIAYA MAHASISWA
  </h4>
  <table width="600" border="0" class="table">
    <tr>
      <td width="305"><select name="cari" id="cari" class="form-control">
        <option>semester......................</option>
        <?php
		$sm = mysql_query("select * from semester order by idmain asc");
  while($smm = mysql_fetch_array($sm)){
  $th = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$smm[idtahun_ajaran]'");
  $thh = mysql_fetch_array($th);
  echo"<option value=$smm[idsemester]>$smm[semester] &nbsp; $thh[ajaran] &nbsp; $smm[ajaran]  </option>";
  }
		?>
      </select></td>
      <td width="142"><input name="go" type="submit" class="btn btn-success" id="go" value="Submit"></td>
    </tr>
  </table>
  <br>
  <table width="600" border="0" class="table">
    <tr>
      <td>#</td>
      <td height="33"><strong>PRODI</strong></td>
      <td><strong>KELAS</strong></td>
      <td><strong>NAMA</strong></td>
      <td><strong>NIM</strong></td>
      <td><strong>KODE,REMARK &amp; KETERANGAN </strong></td>
      <td>ACTION</td>
    </tr>
	<?PHP 
		if(isset($_POST['go'])){
		
		$nama = @$_POST['cari'];
		$no = 1;
		$km = mysql_query("select * from mahasiswa where idmahasiswa='$uu[idmahasiswa]' ");
		$kmm = mysql_fetch_array($km);
		
	 ?>
    <tr>
      <td><?php echo"$no"; ?></td>
      <td height="36"><?php echo"$kmm[idkejuruan]"; ?></td>
      <td><?php echo"$kmm[kode_kelas]"; ?></td>
      <td><?php echo"$kmm[nama]"; ?></td>
      <td><?php echo"$kmm[idmahasiswa]"; ?></td>
      <td><?php 
	  $by = mysql_query("select * from biaya_02 where NIM='$uu[idmahasiswa]' and THN='$nama'");
		
		while($byy = mysql_fetch_array($by)){
		
		$k1 = @number_format($byy['NOMINAL'],"0","",".");
			echo"$byy[REMARK]&nbsp;[$byy[TGL]]-[$byy[THN] / $byy[KODE]-$k1&nbsp;$byy[KETERANGAN]&nbsp;]<br>"; ?>
			
		<?php
			}
			$jumby = mysql_query("select sum(NOMINAL) as totby from biaya_02 where NIM='$kmm[idmahasiswa]' and THN='$nama'");
		$jumbyy = mysql_fetch_array($jumby);
		$k3 = @number_format($jumbyy['totby'],"0","",".");
		echo"<hr>";
			
			echo"TOTAL:&nbsp;Rp.$k3";
		 ?></td>
      <td><a href="#biaya"  onClick="MM_openBrWindow('<?php echo"../BU/dtl_biaya_mhs.php?kdmhs=$kmm[idmahasiswa]"; ?>','','scrollbars=yes,width=700,height=550')" class="btn btn-default">CETAK BIAYA</a></td>
    </tr>
	<?php
	$no++;
	}
	
	
	?>
	
    <tr>
      <td height="36"><div id="total"></div></td>
      <td height="36">&nbsp;</td>
      <td>&nbsp;</td>
      <td height="36">&nbsp;</td>
      <td height="36">TOTAL</td>
      <td height="36"><?PHP 
		if(isset($_POST['go'])){
		$nama = @$_POST['cari'];
		//$ang = mysql_real_escape_string($_POST['ang']);
		$km = mysql_query("select * from mahasiswa where idmahasiswa='$uu[idmahasiswa]' and mhs='2' ");
		$kmm = mysql_fetch_array($km);
		$by1 = mysql_query("select sum(NOMINAL) as tot from biaya_02 where NIM='$kmm[idmahasiswa]' and THN='$nama'");
		
		$byy1 = mysql_fetch_array($by1);
		$k2 = @number_format($byy1['tot'],"0","",".");
		//echo"Rp.$k2";
		}
	 ?></td>
      <td height="36">&nbsp;</td>
    </tr>
	
  </table>
</form>
</body>
</html>
<?php
}
?>
