<?php
    ob_start();
    include('./VEHICULOS1.php');
    $content = ob_get_clean();

    // convert to PDF
    require_once('../html2pdf_v4.03/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A2', 'fr');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('VEHICULOS_EXISTENTES.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
