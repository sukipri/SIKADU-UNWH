	<?php ob_start(); session_start();
	 include_once"./../sc/conek.php";
	 include_once"./css.php";
	 include"../NEW_CODE/code_rand.php";
	 include"../NEW_CODE/CODE_GET.php";
		//$get_db = new database();
		//$get_db->conek();
	
		
		if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
			//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
			header('location:index.php');
		} else {
			$u = $call_q("select iduser_mhs,idmahasiswa,username,namaibu,email,akses from user_mhs where idmahasiswa='$_SESSION[namauser]'");
				$uu = $call_fas($u);
				//..//
		$mhs = $call_q("$call_sel  mahasiswa where idmahasiswa='$uu[idmahasiswa]'");
		$mhss = $call_fas($mhs);
		//..//
		$kej = $call_q("select idkejuruan,idfakultas,kejuruan FROM kejuruan where idkejuruan='$mhss[idkejuruan]'");
		$kejj = $call_fas($kej);
		//..//
		$fkl = $call_q(" select idfakultas,fakultas FROM fakultas where idfakultas='$kejj[idfakultas]'");
		$fkll = $call_fas($fkl);
		//..//
		$dsn2= $call_q("select iddosen,idkejuruan,nama FROM dosen where iddosen='$mhss[iddosen]'");
		$dsnn2 = $call_fas($dsn2);
		//..//
		$kdmhs = $mhss['idmahasiswa'];
			$thmhs = $call_q("select * from theme_mhs where idmahasiswa='$uu[idmahasiswa]'");
		$thmhss = $call_fas($thmhs);
			$numthmhs = mysql_num_rows($thmhs);
			
		
	 ?>
	
	 <?php include"../sc/s_o_2.php"; ?>
	 <?php
			if($thmhss['theme']==2){
			header("location:admin_sia_ui_sm.php");
			}elseif($thmhss['theme']==3){
			header("location:admin_sia_ui_so.php");
			}else{
			
		
	?>
	 <?php
	include"../sc/s_o.php";
	?>
	<?php
	
	if($uu['akses']==13){
	
	
	?>
	
	
	<?php
		if(isset($_GET['idth'])){
			$idth = @mysql_real_escape_string($_GET['idth']);
			if($numthmhs <=0){
			$call_q("insert into theme_mhs(idmahasiswa)values('$mhss[idmahasiswa]')");
			$call_q("update theme_mhs set theme='$idth' where idmahasiswa='$uu[idmahasiswa]'");
		}else{
		$call_q("update theme_mhs set theme='$idth' where idmahasiswa='$uu[idmahasiswa]'");
		} }
	
	?>
	
	
	
	  <?php
	  	//PHOTO
		   $ft = $call_q("select * from foto_mhs where idmahasiswa='$mhss[idmahasiswa]' order by idfoto desc limit 1");
		  $ftt  = $call_fas($ft);
		  @$call_q("update user_mhs set online='2' where idmahasiswa='$uu[idmahasiswa]'");
	  ?>
      		<?php 
				//Rekam Semester
					$vrsmt01_sw = $call_q("$call_sel rekamsemester WHERE idmahasiswa='$kdmhs' order by idrekamsemester desc");
						$vrsmt01_sww = $call_fas($vrsmt01_sw);
							//echo"$vrsmt01_sww[idsemester]";
				//Jumlah SKS KRS
					$vkrs01_sw = $call_q("$sl SUM(jumlah) as jmlkrs01  FROM krs WHERE idmahasiswa='$kdmhs' AND idsemester='$mhss[idsemester]'");
					$cn_vkrs01_sw = $call_fas($vkrs01_sw);
						//echo"$cn_vkrs01_sw[jmlkrs01]";
			?>
      
	  <style type="text/css">
	<!--
	body { padding-top: 65px; }
	body,td,th {
		
	}
	-->
	</style>
    <body>
		<?php include"MN_HEAD.php"; ?>
	<table width="100%">
	  <tr>
		<td width="22%" align="left" valign="top" bgcolor="#FFFFFF">
        <div class="alert-primary">
			 <?php include_once"MN_LEFT.php"; ?>
         </div>
	  	</td>
	
		<td width="78%" height="282" colspan="2" valign="top">
			 <br />
             <div style="margin-left:21px">
			<?php include_once"SWITCH_MENU.php"; ?>
            </div>
	  </td>
	  </tr>
	  <tr align="center">
		<td height="21" colspan="3" valign="top">&nbsp;</td>
	  </tr>
	</table>
	
	<table width="100%" class="table">
	  <tr>
		<td height="21" align="center" bgcolor="#FFFFFF">&nbsp;</td>
		<td align="center" valign="middle" bgcolor="#FFFFFF">&copy; sikadu.unwahas.ac.id <span class="style2">
		<?php
		  include"../sc/s_o.php";
		   echo "&nbsp; //SO&nbsp;<b><font color=blue>".$os; "</font></b>"; ?>
		</span></td>
	  </tr>
	</table>
	</body>
	
	<?php
	}else{
		echo"<h1><center>MAAF AKSES TIDAK DI IJINKAN<br><a href=index.php>klik untuk kembali</a></center></h1>";
	} ?>
	<?php }}
	ob_flush();
	?>
	
