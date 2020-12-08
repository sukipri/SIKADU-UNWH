<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>


  <table width="100%"  border="0" class="table table-bordered">
    <tr class="danger">
      <td colspan="2">  <h4>
  DAFTAR BIAYA GLOBAL &nbsp; 
  <?php
	 $kj_jum2 = mysql_query("select sum(NOMINAL) as kjtotal from biaya_02 ");
	 $kj_jumm2 = mysql_fetch_array($kj_jum2);
	 $k3 = @number_format($kj_jumm2['kjtotal'],"0","",".");
	 echo"<i>Total Rp.$k3</i>";
	 ?>
  </h4></td>
    </tr>
    <tr>
      <td width="22%">
	
	
		
		<div class="list-group">
		  <?php
	   $kj_b = mysql_query("select * from kejuruan order by idkejuruan");
		 while($kj_bb = mysql_fetch_array($kj_b)){
	  ?>
  <a href="<?php echo"?aka=vbiaya_global&kjby=$kj_bb[idkejuruan]"; ?>" class="list-group-item">
    <h4 class="list-group-item-heading"> <?php echo"$kj_bb[kejuruan]"; ?></h4>
    <p class="list-group-item-text">
	<?php
	 $kj_jum = mysql_query("select sum(NOMINAL) as kjjum from biaya_02 where idkejuruan='$kj_bb[idkejuruan]'");
	 $kj_jumm = mysql_fetch_array($kj_jum);
	 $k2 = @number_format($kj_jumm['kjjum'],"0","",".");
	 echo"Total &nbsp; Rp.$k2";
	 ?>
	</p>
  </a>
 <?php } ?>	
</div>
		  </td>
      <td width="78%"><?php include"vbiaya_mahasiswa_global.php"; ?></td>
    </tr>
  </table>

</body>
</html>
