<?php //session_start();
 include_once"../sc/conek.php";

	
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
 ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<form name="form1" method="post" action="">
  <table width="727">
    <tr>
      <td width="646"><select name="cari" class="form-control">
        <option>-------kode Program Studi-----------</option>
        <?php
		 $fak = mysql_query("select * from fakultas order by idfakultas");
		 while($fakk = mysql_fetch_array($fak)){
		 
		 echo"
		 <option value=$fakk[idfakultas]>$fakk[idfakultas]&nbsp; / &nbsp;$fakk[fakultas]</option>";
		 }
		 
		 
		 ?>
      </select></td>
      <td width="69"><input name="cari_data" type="submit" id="cari_data2" value="Submit" class="btn btn-success"></td>
    </tr>
  </table>
  <br><br>
<table width="100%" border="0" align="center" bgcolor="#FF9D3C" class="table table-bordered">
  <tr align="center">
    <td width="18%" height="35">FAKULTAS</td>
    <td width="32%">SOAL </td>
    <td width="25%">ACTION</td>
  </tr>
  <?php
  if(isset($_POST['cari_data'])){
  $cari = @$_POST['cari'];
  $sks = mysql_query("select * from fakultas where idfakultas='$cari'");

	  while($skss = mysql_fetch_array($sks)){
 
  
  ?>
  <tr bgcolor="#FFFFFF">
    <td height="31" valign="top"><?php echo"<b>$skss[fakultas]</b>"; ?></td>
    <td valign="top"> <?php $kuis = mysql_query("select * from kuis where idfakultas='$skss[idfakultas]'");
	$no =1;
	  while($kuiss = mysql_fetch_array($kuis)){
	  echo"$no.$kuiss[soal]&nbsp;<a href=?aka=mkuis&kuis=edit_kuis&idkuis=$kuiss[idkuis]><img src=../img/edit-32.png width=32 height=32 border=0 title=edit-soal></a><br><ul><li>$kuiss[a]</li><li>$kuiss[b]</li><li>$kuiss[c]</li><li>$kuiss[d]</li><li>$kuiss[e]</li></ul><br>";
	  $no++;
	  }
	   ?></td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <?php
  }
  }
  ?>
</table>
</form>
</body>
</html>
<?php
}
?>