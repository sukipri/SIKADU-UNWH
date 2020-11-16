<center><h6 class="badge badge-info">{<?php echo"$fkll[fakultas]"; ?> - <?php echo"$kejj[kejuruan]"; ?> - <?php echo"$mhss[idtahun_ajaran]"; ?>}</h6>
	 <?php
		
	  echo"<b><font color=blue>NIM&nbsp;$uu[idmahasiswa] &nbsp;&nbsp; <br>Login As $mhss[nama]</span></font></b>";
	  
	  //include"../sc/s_o_2.php";
		
		?>  
        </center>  
		
	<br>
	<table width="100%" border="0" class="table table-bordered" bgcolor="#FFFFFF">
	  <tr class="table-info">
	    <td><span class="badge badge-info"><b>#KRS</span></td>
      </tr>
	  <tr>
	    <td>
        <a href="?mng=CARI_MAKUL" class="btn btn-outline-info btn-sm"><i class="far fa-file"></i><br>Input KRS</a>
        &nbsp;
        <a href="?mng=vkrs" class="btn btn-outline-info btn-sm"><i class="far fa-file"></i><br>Display KRS</a>
         &nbsp;
        <a href="#" <?php echo"onClick=MM_openBrWindow('ctk_tran_sks_try_urut.php?kdmhs=$mhss[idmahasiswa]','','scrollbars=yes,width=900,height=800')"; ?> class="btn btn-outline-info btn-sm"><i class="fas fa-print"></i><br>Print Transkrip</a>
         &nbsp;<br><br>
         <a href="#" <?php echo"onClick=MM_openBrWindow('ctk_krs_mhs.php?kdmhs=$kdmhs','','scrollbars=yes,width=900,height=800')"; ?> class="btn btn-outline-info btn-sm"><i class="fas fa-print"></i><br>Print KRS</a>
        </td>
      </tr>
	  <tr class="table-success">
	    <td><span class="badge badge-success"><b>#KHS</span></td>
      </tr>
	  <tr>
	    <td>
        <a href="?mng=v_ikhs" class="btn btn-outline-success btn-sm"><i class="far fa-file"></i><br>Display KHS</a>
        </td>
      </tr>
	  <tr class="table-info">
	    <td><span class="badge badge-warning"><b>#layanan Mahasisiswa</span></td>
      </tr>
	  <tr>
	    <td>
       	 <a href="?mng=infoaka" class="btn btn-outline-warning btn-sm"><i class="far fa-file"></i><br>Info Akademik</a>
         &nbsp;
         <a href="?mng=FORM_PENGAJUAN_01" class="btn btn-outline-warning btn-sm"><i class="far fa-file"></i><br>Form Pengajuan</a>
        </td>
      </tr>
	  <tr class="table-success">
	    <td><span class="badge badge-primary"><b>#Pembayaran</span></td>
      </tr>
	  <tr>
	    <td>
          <a href="?mng=MHS_TGH_METODE" class="btn btn-outline-primary btn-sm"><i class="fas fa-clipboard"></i><br>Tagihan</a>
          &nbsp;
          <a href="?mng=MHS_BIAYA_01" class="btn btn-outline-primary btn-sm"><i class="fas fa-clipboard"></i><br>Biaya</a>
        </td>
      </tr>
	  <tr class="table-info">
	    <td><span class="badge badge-danger"><b>#Cetak Kartu</span></td>
      </tr>
	  <tr>
	    <td>
         <a href="?mng=TAGIHAN" class="btn btn-outline-primary btn-sm"><i class="fas fa-print"></i><br>UTS & UAS</a>
        </td>
      </tr>
	</table>
	