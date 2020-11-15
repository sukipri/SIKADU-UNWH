<?php
/**
 * HTML2PDF Librairy - example
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @author      Laurent MINGUET <webmaster@html2pdf.fr>
 *
 * isset($_GET['vuehtml']) is not mandatory
 * it allow to display the result in the HTML format
 */

    // get the HTML
	
    ob_start();
	include_once"../sc/conek.php";
	$kdmhs =@ mysql_real_escape_string($_GET['kdmhs']);
$mhs = mysql_query("select * from mahasiswa where idmahasiswa='$kdmhs'");
$mhss = mysql_fetch_array($mhs);
    include(dirname(__FILE__).'/ctk_bayarreg.php');
    $content = ob_get_clean();

    // convert in PDF
    require_once(dirname(__FILE__).'/../sc/pdf/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('cetak_reg.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
