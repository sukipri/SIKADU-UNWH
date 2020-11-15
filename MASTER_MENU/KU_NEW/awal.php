
<?php //session_start();
	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		//echo"<center><font size=5 color=black>Anda Harus <a href=../index.php>Login</a> terlebih dahulu</font></center>";
	    header('location:index.php');
	} else {
 ?>
<body>
<table width="100%" border="0" align="center" bgcolor="#E2E2E2" class="table table-bordered">
  <tr align="center" bgcolor="#FFFFFF">
    <td width="207" height="103" bgcolor="#FFFFFF"><a href="?ku=vprofil_dosen" class="btn btn-danger"><img src="../../img/desktop%20file.png" width="32" height="32" border="0"><br>
    Management <br> Dosen / SKS </a><br>*(Preview data jadwal dosen dan management dosen</td>
    <td width="230" bgcolor="#FFFFFF"><a href="?ku=iabsen" class="btn btn-danger"><img src="../../img/wallet_64x64.png" width="32" height="32" border="0"><br>
    MANAGEMENT <br>ABSENSI</a><br>*(input data absensi mahasiswa realtime,cetak,laporan </td>
    <td width="211"><a href="?ku=icari" class="btn btn-danger"><img src="../../img/tambahmtk.png" width="32" height="32" border="0"><br>
Cetak Nilai <br> User Mahasiswa</a><br>
*(cetak KHS atau nilai hasil ahir studi mahasiswa</td>
    <td width="231"><a href="?ku=mkuis" class="btn btn-danger"><img src="../../img/wizard-32.png" width="32" height="32" border="0"><br>
    Management <br> kuisioner</a><br>*(input kuisioner,preview kuisioner</td>
    <td width="135"><a href="?ku=icari4" class="btn btn-danger"><img src="../../img/clipboard-32.png" width="32" height="32" border="0"><br>
      management <br> Cetak Kartu</a><br>
    *(UTS,UAS,KRS,KHS</td>
    <td width="135"><a href="?ku=icari_ipk_nim" class="btn btn-danger"><img src="../../img/documents_32.png" width="32" height="32" border="0"><br> Management <br>Daftar  IPK</a><br>*(Daftar IPK</td>
    <td width="135"><a href="?ku=csks" class="btn btn-danger"><img src="../../img/switch-32.png" width="32" height="32" border="0"><br>
      Management <br> Daftar  SKS </a><br>
    *(daftar SKS </td>
  </tr>
</table>
</body>
<?php } ?>