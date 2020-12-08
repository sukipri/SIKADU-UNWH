<?php 
$mode=@$_POST['mode'];
  include_once"../sc/conek.php";
if($mode=="delok"){
  $kodene=$_POST['kodene'];
?>
<table width="941" border="0" class="table table-bordered">
    <tr>
      <td width="30">NO</td>
      <td width="112">Kode Mata Kuliah Asal </td>
      <td width="110">Mata Kuliah </td>
      <td width="55">SKS</td>
      <td width="80">Nilai Huruf</td>
      <td width="262">Hasil</td>
      <td colspan="1">Konversi Nilai </td>
    </tr>
    <?php
    $mhs2 = mysql_query("select * from mahasiswa_trans where idmahasiswa='$kodene'");
    $no = 1;
  while($mhss2 = mysql_fetch_array($mhs2)){
    ?>
    <tr>
      <td><?php echo"$no"; ?></td>
      <td height="34"><?php echo"$mhss2[idsks]"; ?></td>
      <td><?php echo"$mhss2[judul]"; ?></td>
      <td><?php echo"$mhss2[jumlah]"; ?></td>
      <td><?php echo"$mhss2[huruf]"; ?></td>
      <td>
    
    <?php   $kr  = mysql_query("select * from kurikulum where idkurikulum='$mhss2[idkurikulum]'");
  $krr = mysql_fetch_array($kr);
    echo"<b>$krr[judul]</b><br>($mhss2[angka_baru])-($mhss2[huruf_baru])-($mhss2[jumlah_baru])";
   ?>
  
  </td>
       <!--<td width="153">
  
     <a href="#" class="btn btn-info" onClick="MM_openBrWindow('../SU_admin/isks_conversi.php<?php //echo"?kdmhs=$mhss[idmahasiswa]&kode=$mhss2[idsks]&idmain=$mhss2[idmain]"; ?>','','scrollbars=yes,width=500,height=500')">Masukan Mata Kuliah
      </a>    </td>-->
      <td width="105" onclick="ojo(this.id)" id="<?php echo $mhss2[idmain];?>"> <a class="btn btn-danger">HAPUS
      </a></td>
    </tr>
    
    <?php
    $no++;
    }
    ?>
    <tr>
      <td>&nbsp;</td>
      <td height="43" id="nyoh">JUMLAH SKS </td>
      <td>&nbsp;</td>
      <td><?php
       $jumsks_lama = mysql_query("select sum(jumlah) as jm_lama from mahasiswa_trans where idmahasiswa='$kodene'"); 
       $jumsks_lama_hasil = mysql_fetch_array($jumsks_lama);
       echo"$jumsks_lama_hasil[jm_lama]";
       ?></td>
      <td>&nbsp;</td>
      <td><?php
       $jumsks_lama2 = mysql_query("select sum(jumlah_baru) as jm_baru from mahasiswa_trans where idmahasiswa='$kodene'"); 
       $jumsks_lama_hasil2 = mysql_fetch_array($jumsks_lama2);
       echo"$jumsks_lama_hasil2[jm_baru]";
       ?></td>
      <td colspan="2"> <a href="#" class="btn btn-default" onClick="MM_openBrWindow('../SU_admin/ctk_konversi_nilai.php<?php echo"?kdmhs=$kodene&kode=$mhss2[idsks]&idmain=$mhss2[idmain]"; ?>','','scrollbars=yes,width=800,height=500')"><img src="../img/print-32.png" width="20" height="20" border="0">&nbsp;Cetak Konversi</a>        </td>
    </tr>
    </table>

<?php }else if($mode=="simpan"){
    $kode = @$_POST['kode'];
    $judul = @$_POST['judul'];
    $jumlah = @$_POST['jumlah'];
    $kt = @$_POST['kt'];
    $ssp = @$_POST['ssp'];
    $ts = @$_POST['ts'];
    $nas = @$_POST['nas'];
    $huruf = @$_POST['huruf'];
    $smakul=$_POST['smakul'];
    $skode=$_POST['skode'];
    $ssks=$_POST['ssks'];
    $snilai=$_POST['snilai'];
    $spredikat=$_POST['spredikat'];
    $skdmhs=$_POST['skdmhs'];
      mysql_query("insert into mahasiswa_trans(idmahasiswa,idsks,judul,jumlah,kt,ssp,ts,nas,huruf,jumlah_baru,angka_baru,huruf_baru,idkurikulum,idsks_baru)values('$skdmhs','$kode','$judul','$jumlah','$kt','$ssp','$ts','$nas','$huruf','$ssks','$snilai','$spredikat','$skode','$skode')");
      //echo $skode.$ssks.$snilai.$spredikat;
      //echo"<center><h4>Data successfuly</h2></center>";
      }else if($mode=="ojo"){
    $idmain = @$_POST['idmain'];
      mysql_query("delete from mahasiswa_trans where idmain='$idmain'");
      //echo $skode.$ssks.$snilai.$spredikat;
      //echo"<center><h4>Data successfuly</h2></center>";
      }?>