<?php 
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    include"../logic/H_LOCATION.php";
	} else {
		?>
<body>
	<br>
	<b>[]BRIVA</b>
    <form method="post">
    	<table width="70%" border="0" class="table" style="max-width:30rem;">
          <tr>
            <td width="29%"><input type="text" style="max-width:10rem;" name="tg1" value="<?php echo"$YR$MH$DY"; ?>" class="form-control form-control-sm"></td>
            <td width="71%"><button name="go" class="btn btn-success btn-sm"><i class="fas fa-share"></i>&nbsp;GO</button></td>
          </tr>
	</table>

    
    </form>
    <!-- 
	<table width="100%" border="0" class="table table-bordered table-sm table-striped" style="max-width:40rem;">
          <tr class="table-info">
            <td width="25%">Kode Bayar</td>
            <td width="22%">NIM</td>
            <td width="38%">NAMA</td>
            <td width="15%">&nbsp;</td>
          </tr>
          <?php 
		  		//$vbri01_sw = $call_q("$sl DISTINCT idmain_rekam FROM biaya_02_rekam_bri WHERE app='3'");
		  			//while($vbri01_sww = $call_fas($vbri01_sw)){
							//$vbri01_sw02 = $call_q("$call_sel  biaya_02_rekam_bri WHERE idmain_rekam='$vbri01_sww[idmain_rekam]'");
		  						//$vbri01_sww02 = $call_fas($vbri01_sw02);
		  ?>
          <tr>
            <td><?php //echo"$vbri01_sww[idmain_rekam]"; ?></td>
            <td><?php //echo"$vbri01_sww02[idmahasiswa]"; ?></td>
            <td><?php //echo"$vbri01_sww02[nama]"; ?></td>
            <td><a href="<?php //echo"?HLM=BU_MST_M&SUB=BU_MST_M_UANG&SUB_CHILD=BU_MST_M_UANG_RPT_TGH&SUB_CHILD_02=BU_MST_M_UANG_RPT_TGH_BRI&IDRPT01=IDRPT01"; ?>" class="btn btn-warning"><i class="fas fa-sign-in-alt"></i>&nbsp;Proses</a></td>
          </tr>
          <?php //} ?>
	</table>
    -->
		<?php
			if(isset($_POST['go'])){
				$tg1 = @$sql_escape($_POST['tg1']);
				
		?>
        		<a href="<?php echo"?HLM=BU_MST_M&SUB=BU_MST_M_UANG&SUB_CHILD=BU_MST_M_UANG_RPT_TGH&SUB_CHILD_02=BU_MST_M_UANG_RPT_TGH_BRI&IDTG101=$tg1&GETTG1=GETTG1"; ?>" class="btn btn-outline-success">Sambungkan  --> <i class="far fa-flag"></i>&nbsp<?php echo"$tg1"; ?></a>
        		
        <?php }  ?>
				
		<?php if(isset($_GET['GETTG1'])){  ?>
					<?php include"../../BU/test/briva/lapor.php"; ?>
                    <?php //include"../../BU/test/briva/report.php"; ?>
                    <?php } ?>
		
        	
        
</body>
<?php } ?>