	<link rel="stylesheet" href="css/css/choosen.css" />
	
	<style type="text/css">
		#smakul_chosen,.chosen-drop,chosen-single,a.chosen-single{
			width: 500px !important;
			text-align:left !important;
			float:left;
		}
	</style>
	</head>
	
	<body>
	<h4>Input Nilai Konversi &nbsp;<a href="?aka=ikonversi_kejuruan" class="btn btn-danger">Input Per Kejuruan</a>&nbsp; <a href="?aka=ikonversi_global" class="btn btn-success">Global Konversi</a></h4>
	<form name="form1" method="post" action="?aka=ikonversi">
	  <table width="600" border="0" class="table table-bordered">
		<tr>
		  <td width="428"><input type="text" name="kdmhs" class="form-control" placeholder="masukan nim lengkap"></td>
		  <td width="162"><input type="submit" name="go" value="Submit" class="btn btn-warning"></td>
		</tr>
	  </table>
	</form>
	<?php 
	$idmain_del = @mysql_real_escape_string($_GET['idmain_del']);
	if(isset($_GET['idmain_del'])){
	
	mysql_query("delete from mahasiswa_trans where idmain='$idmain_del'");
	
	}
	 ?>
	<?php
	if(isset($_POST['go'])){
	$kdmhs=@mysql_real_escape_string($_POST['kdmhs']);
	 $mhs = mysql_query("select * from mahasiswa where idmahasiswa='$kdmhs'");
	$mhss = mysql_fetch_array($mhs);
	if($mhss['asal']=="pindahan"){
	?>
	<table width="600" border="0" class="table table-bordered">
	  <tr>
		<td width="372"><?php echo"NIM:&nbsp;$mhss[idmahasiswa]"; ?></td>
		<td width="218"><?php echo"ANGKATAN:&nbsp;$mhss[idtahun_ajaran]"; ?></td>
	  </tr>
	  <tr>
		<td><?php echo"NAMA:&nbsp;$mhss[nama]"; ?></td>
		<td><?php echo"KODE PROGDI:&nbsp;$mhss[idkejuruan]"; ?></td>
	  </tr>
	  <tr align="center">
		<td colspan="2"><a href="?aka=ikonversi&kdmhs=<?php echo"$kdmhs"; ?>" class="btn btn-success">Masukan Mata Kuliah yang diakui</a>	</td>
	  </tr>
	</table>
	<?php
	}else{
	echo"<center><h4>Sorry The Student Is not Transfered</h4></center>";
	
	}
	?>
	<?php
	
	}
	?>
	<?php
	if(isset($_GET['kdmhs'])){
	$kdmhs=@mysql_real_escape_string($_GET['kdmhs']);
	 $mhs = mysql_query("select * from mahasiswa where idmahasiswa='$kdmhs'");
	$mhss = mysql_fetch_array($mhs);
	$sqmk=mysql_query("select idkurikulum,judul,sks from kurikulum where idkejuruan='$mhss[idkejuruan]' and status='Y'");
	?>
	<button data-toggle="collapse" data-target="#demo" class="btn btn-success">Tambah Data </button>
	
	<div id="demo" class="collapse">
	
	<form name="form2" id="form2" method="post" action="">
	  <table width="600" border="0" class="table table-bordered">
		<tr>
		  <td width="372"><?php echo"NIM:&nbsp;$mhss[idmahasiswa]"; ?></td>
		  <td width="218"><?php echo"ANGKATAN:&nbsp;$mhss[idtahun_ajaran]"; ?></td>
		</tr>
		<tr>
		  <td><?php echo"NAMA:&nbsp;$mhss[nama]"; ?></td>
		  <td><?php echo"KODE PROGDI:&nbsp;$mhss[idkejuruan]"; ?></td>
		</tr>
		<tr align="center" bgcolor="#D4D4D4">
		  <td><input type="text" name="kode" class="form-control" placeholder="Kode Mata Kuliah Asal">
		  <input type="text" name="judul" class="form-control" placeholder="Judul Mata Kuliah Asal">
		  <input name="jumlah" type="text" class="form-control" id="jumlah" placeholder="Jumlah SKS Asal">  
		  <input name="nas" type="text" class="form-control" id="nas" placeholder="Nilai Angka Asal">      
		  <input name="huruf" type="text" class="form-control" id="huruf" placeholder="Nilai Huruf Asal">
			 <select name="smakul" class="form-control" onchange="changeValue(this.value)" id="smakul" placeholder_text_single="Mata Kuliah Diakui">
			 	<option value="" readonly="readonly">Mata Kuliah diakui</option>
			 	<?php 
			 	$jsArray = "var smtl = new Array();\n";
			 	while($sqmka=mysql_fetch_array($sqmk)){?>
			 	<option value="<?php echo $sqmka[0];?>"><?php echo $sqmka[1]." - ".$sqmka[0];?></option>
			 	<?php 
			 	 $jsArray .= "smtl['" . $sqmka[0] . "'] = {skode:'" . addslashes($sqmka[0]) . "',ssks:'".addslashes($sqmka[2])."',snama:'".addslashes($sqmka[1])."'};\n";
			 	}?>
			 </select>
			<input name="skode" type="text" disabled="disabled" class="form-control" id="skode" placeholder="kode">
			<input name="skode" type="hidden" class="form-control" id="skodes" placeholder="kode">
			<input name="snama" type="hidden" class="form-control" id="snama" placeholder="kode">
			<input name="skdmhs" type="hidden" class="form-control" id="skdmhs" placeholder="kode" value="<?php echo @$kdmhs; ?>">
			<input name="ssks" type="text" disabled="disabled" class="form-control" id="ssks" placeholder="sks diakui">
			<input name="ssks" type="hidden" class="form-control" id="sskss" placeholder="sks diakui">
			<input name="snilai" type="text" class="form-control" id="snilai" value="" onkeyup="hits()" placeholder="nilai diakui">
			<input name="spredikat" type="text" disabled="disabled" class="form-control" id="spredikat" placeholder="predikat">
		<input name="spredikat" type="hidden" class="form-control" id="spredikats" placeholder="predikat"></td>
		  <td><br><br><a type="submit" id="simpan" value="Submit" class="btn btn-primary form-control">submit</a><br><br>Atau<br><br><a href="#" class="btn btn-success">Upload .XLS</a></td>
		</tr>
	  </table>
	</form>
	<input type="hidden" name="kodene" id="kodene" value="<?php echo"$kdmhs"; ?>">
	</div><a href="?aka=ikonversi&kdmhs=<?php echo"$kdmhs"; ?>" class="btn btn-success"><img src="../img/reload-32.png" border="0"></a>
	
	  <div id="lahto"></div>
	<br>
	
	<?php
	}
	?>
	<script src="JS/chosen.jquery.min.js"></script>
	<script type="text/javascript">
            
          $('#smakul').chosen({allow_single_deselect:true}); 
          //resize the chosen on window resize
$('.chosen-single div b').html("&#9660;");
      <?php echo $jsArray; ?>  
function changeValue(id){  
document.getElementById('skode').value = smtl[id].skode;  
document.getElementById('skodes').value = smtl[id].skode;  
document.getElementById('ssks').value = smtl[id].ssks;  
document.getElementById('sskss').value = smtl[id].ssks;  
document.getElementById('snama').value = smtl[id].snama;  
};  
function hits(){
	var a=$('#snilai').val();
	var sn="";
	if(a==4){
		sn="A";
	}else if(a==3.5){
		sn="AB";
	}else if(a==3){
		sn="B";
	}else if(a==2.5){
		sn="BC";
	}else if(a==2){
		sn="C";
	}else if(a==1.5){
		sn="CD";
	}else if(a==1){
		sn="D";
	}else if(a==0){
		sn="E";
	}else{
		alert("Nilai Diisi  4.00 | 3.5 | 3.0 | 2.5 | 2.0 | 1.5 | 1.0 | 0");
		$('#snilai').val("");
		sn="";
	}
	//alert(a);
$('#spredikats').val(sn);
$('#spredikat').val(sn);
}
$('#simpan').click(function(){
	simpan();
});

    </script>
    <script type="text/javascript" src="smtl.js"></script>
	</body>
	</html>
