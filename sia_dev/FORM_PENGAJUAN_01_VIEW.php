	<?php //session_start();
	 //include_once"../sc/conek.php";
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
			//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
			header('location:index.php');
		} else {
			//$u = mysql_query("select iduser_mhs,idmahasiswa,username,akses from user_mhs where idmahasiswa='$_SESSION[namauser]'");
			//$uu = mysql_fetch_array($u);
	 ?>
	 
<span class="badge badge-info">#Daftar Ajuan</span>
      <br>
      <table width="100%" border="0" class="table table-bordered table-sm table-striped">
          <tr class="table-info">
            <td width="16%">Tanggal Input</td>
            <td width="21%">Tanggal Ajuan</td>
            <td width="16%">Jenis Ajuan</td>
            <td width="25%">Keterangan</td>
            <td width="22%">Status</td>
          </tr>
          <?PHP 
		  	$form_vaju01_sw = $call_q("$call_sel tb_form_ajuan_01 WHERE idmahasiswa='$kdmhs' order by form_tglinput_01 desc");
				while($form_vaju01_sww = $call_fas($form_vaju01_sw)){
		  
		  ?>
          <tr>
            <td><?PHP echo FS_DATE($form_vaju01_sww['form_tglinput_01']); ?></td>
            <td><?PHP echo FS_DATE($form_vaju01_sww['form_tglajuan_01']); ?></td>
            <td><?PHP echo "$form_vaju01_sww[form_jenis_01]"; ?></td>
            <td><?PHP echo "$form_vaju01_sww[form_ket_01]"; ?></td>
            <td>
            <?PHP if($form_vaju01_sww['form_status_01']=="1"){ ?>
            	<span class="text-dark"><i class="fas fa-check"></i>&nbsp;belum Diproses</span>
            <?PHP }elseif($form_vaju01_sww['form_status_01']=="2"){ ?>
            <span class="text-success"><i class="fas fa-check-circle"></i>&nbsp;Pengajuan Diterima</span>
             <?PHP }elseif($form_vaju01_sww['form_status_01']=="4"){ ?>
            <span class="text-info "><i class="fas fa-check-double"></i>&nbsp;Pengajuan Diproses</span>
            <?PHP }elseif($form_vaju01_sww['form_status_01']=="3"){ ?>
            <span class="text-danger"><i class="fas fa-times-circle"></i>&nbsp;Pengajuan Ditolak</span>
            <?PHP } ?>
            </td>
          </tr>
          <?PHP } ?>
    </table>

      
     
     <?PHP } ?>