<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
			
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Riwayat IPK Semester <?php echo"$mhss[nama]"; ?>'
        },
        subtitle: {
            text: 'sikadu.unwahas.ac.id'
        },
        xAxis: {
            categories: [<?php $rsem2 = mysql_query("select * from rekamsemester where idmahasiswa=$kdmhs and app=2");
while($rsemm2 = mysql_fetch_array($rsem2)){ echo "'$rsemm2[idsemester]',"; } ?>],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: '*(Jika Grafik IPK masih 0 silahkan lakukan proses IPK di management KHS',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' '
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'GRAFIK IPK',
            data: [<?php $rsem3 = mysql_query("select * from rekamsemester where idmahasiswa=$kdmhs and app=2");
while($rsemm3 = mysql_fetch_array($rsem3)){ echo "$rsemm3[ip],"; } ?>]
        }]
    });
});
		</script>
	</head>
	<body>
<script src="../SU_admin/JS_CHART/highcharts.js"></script>
<script src="../SU_admin/JS_CHART/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>

<?php $sm1 = mysql_query("select * from semester");
while($smm1 = mysql_fetch_array($sm1)){echo"[<b>$smm1[idsemester]</b> : $smm1[semester] ] "; } ?>

	</body>
</html>
