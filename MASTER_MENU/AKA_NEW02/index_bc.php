<?php
include"css.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>SIKADU UNWAHAS</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">
<!--
.style1 {font-size: 20px}
.style12 {color:#fff}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	
		background-image: url('../img/bk4.jpg');
                height:100%;
                width: 100%;
				 background-repeat: no-repeat;
}
.blur {
    opacity: 0.6;
    filter: alpha(opacity=80);
	background-color:#00773C;
}

.blur2:hover {
    opacity: 1.0;
    filter: alpha(opacity=100); /* For IE8 and earlier */
}
.rad {
    border: 0px solid #a1a1a1;
    padding: 10px 40px; 
 background-color: #00C462;
    width:750px;
    border-radius: 10px;
}
.bgk:hover{background-color:#00773C;}
-->
</style>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
</head>

<body>
<br>
<br><br>
<form name="form1" method="post" action="log_02.php">
  <table width="716" border="0" align="center" class="blur  rad">
    <tr>
      <td width="72%" align="center"><img src="../img/logo-unwahas.png" width="385" height="91">        <table width="706" align="center" class="table">
        <tr>
          <td width="419" class="bgk"><input name="username" type="text" class="form-control" id="nim2" size="25"  placeholder="ID PASS">
              <br>
              <br>
              <input name="passuser" type="password" class="form-control" id="passuser2" size="25" placeholder="password">
              <br>
              <br>
              <input name="kirim" type="submit" class="btn btn-primary" id="kirim2" value="L.O.G.I.N"></td>
        </tr>
        <tr align="center">
          <td class="style12">Demi Keamanan Account SIKADU Anda Silahkan ganti password secara berkala <br>Lakukan akun esuai dengan ketentuan yang berlaku </td>
          </tr>
        <tr align="center">
          <td><span class="style12">&copy; sikadu.unwahas.ac.id dev bejotech-@akademik</span> <span class="style2">
      <?php
	  include"../sc/s_o.php";
	   echo "&nbsp; //SO&nbsp;<b><font color=blue>".$os; "</font></b>"; ?>
</td>
        </tr>
      </table></td>
    </tr>
  </table>
  
</form>
</body>
</html>
