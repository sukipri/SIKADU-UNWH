<?php 
include_once"../sc/conek.php";
include"css.php";
//$data = @$_GET['data']; echo"$data";
$kdmhs=@mysql_real_escape_string($_GET['kdmhs']);
$kode=@mysql_real_escape_string($_GET['kode']);
 $mhs = mysql_query("select * from mahasiswa where idmahasiswa='$kdmhs'");
$mhss = mysql_fetch_array($mhs);
$mhs2 = mysql_query("select * from mahasiswa_trans where idmahasiswa='$kdmhs' and idsks='$kode'");
$mhss2 = mysql_fetch_array($mhs2);
echo"<center><h4>$mhss2[judul]</h4></center>";
 ?>
 <form method="post">
        <table width="600" border="0" class="table table-bordered">
          <tr>
            <td width="372">              <select name='nama' onChange='this.form.submit()' class="form-control">
                <option value="">Pilih Mata Kuliah</option>
                <?php
	   $sks = mysql_query("select * from sks where idkejuruan='$mhss[idkejuruan]'   order by idsemester asc limit 2000");
	   $no = 1;
  while($skss = mysql_fetch_array($sks)){
  $kr  = mysql_query("select * from kurikulum where idkurikulum='$skss[idkurikulum]'");
$krr = mysql_fetch_array($kr);

  	echo"<option value=$skss[idsks]>$krr[judul] / $skss[idkelas] / $krr[sks]</option>";
  
  
  }
	  ?>
              </select></td>
            <td width="218" rowspan="4"><input type="submit" name="simpan" value="Submit" class="btn btn-warning form-control"><br>
            <?php
if(isset($_POST['simpan'])){
if(empty($_POST['semester'])){
	echo"<b>Maaf Semester Harus diisi</b>";
	}else{

	$kode = @$_POST['kode'];
	$jumlah = @$_POST['jumlah'];
	$nilai = $mhss2['kt'];
$nilai2 = $mhss2['ssp'];
$nilai3 =$mhss2['ts'];
$nilai4 = $mhss2['nas'];
$semester = $_POST['semester'];
	$stotal01 =$nilai+$nilai2;
$stotal02 = $nilai3+$nilai4;
$ssub_total = $stotal01 + $stotal02;
$stotal = $mhss2['nas'];
mysql_query("insert into krs(idkrs,idsks,idmahasiswa,kt,ssp,ts,nas,total,angka,jumlah,app,idsemester,trans)values('','$kode','$kdmhs','','','','','','$stotal','$jumlah','2','$semester','$mhss2[idsks]')");
echo"<br><center><h4>Data Successfully Confirm</h4></center>";
}
}
?></td>
          </tr>
          <tr>
            <td><select name="semester" id="select" class="form-control">
              <option></option>
              <?php
			$sm = mysql_query("select * from semester");
			while($smm = mysql_fetch_array($sm)){
			 $smth = mysql_query("select * from tahun_ajaran where idtahun_ajaran='$smm[idtahun_ajaran]'");
$smmth = mysql_fetch_array($smth);
			
			echo"<option value=$smm[idsemester]>$smm[semester]&nbsp; $smmth[ajaran]&nbsp;$smm[ajaran]</option>";
			}
			?>
            </select></td>
          </tr>
          <tr>
            <td><input name="kode" type="jumlah" class="form-control" id="kode" value="<?php  $po = @$_POST['nama']; echo"$po";  ?>"></td>
          </tr>
          <tr>
            <td><input name="jumlah" type="jumlah" class="form-control" id="jumlah" value="<?php  $po = @$_POST['nama'];  $sks2 = mysql_query("select * from sks where idkejuruan='$mhss[idkejuruan]' and idsks='$po'");
	  
 $skss2 = mysql_fetch_array($sks2); echo"$skss2[jumlah]";  ?>"></td>
          </tr>
        </table>
 </form>
