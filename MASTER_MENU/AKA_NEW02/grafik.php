<!--Fungsi Load Javascript fusioncharts-->
<script type="text/javascript" src="JS/jquery-1.4.js"></script>
<script type="text/javascript" src="JS/jquery.fusioncharts.js"></script>
<!--GRAFIK JUMLAH SISWA PER KELAS-->
<div class="tengah_judul">
   	Grafik Jumlah Mahasiswa / Progdi<hr align="left" size="1" color="#cccccc">
</div>

<table id="TableSiswa" border="0" align="center" cellpadding="10">
    <tr bgcolor="#FF9900" style='display:none;'> <th>Kelas</th> <th>Jumlah Mahasiswa</th></tr>
    <?php
	//KONEKSI KE DATABASE
	mysql_connect("localhost", "root", "") ;
    mysql_select_db("sim");
	//QUERY AMBIL DATA KELAS
    $query_kelas = "SELECT * FROM kejuruan";
    $result_kelas = mysql_query($query_kelas);
    $count_kelas = mysql_num_rows($result_kelas);

    while ($data = mysql_fetch_array($result_kelas)) {
        $kode_kelas = $data['idkejuruan'];
		//QUERY MENGHITUNG JUMLAH SISWA SESUAI DENGAN KODE KELAS
        $query_siswa = "SELECT COUNT(*) AS jumlah_siswa FROM mahasiswa WHERE idkejuruan='$kode_kelas'";
        $result_siswa = mysql_query($query_siswa);
        $data_siswa = mysql_fetch_array($result_siswa);

        echo "<tr bgcolor='#D5F35B' style='display:none;'>
              <td> $data[kejuruan]</td>
              <td align='center'>$data_siswa[jumlah_siswa]</td>
              </tr>";
    }
    ?>

</table>
<!--LOAD HTML KE JQUERY FUSION CHART BERDASARKAN ID TABLE-->
<script type="text/javascript">
    $('#TableSiswa').convertToFusionCharts({
        swfPath: "Charts/",
        type: "MSColumn3D",
        data: "#TableSiswa",
        dataFormat: "HTMLTable"
    });
</script>