<?php
include 'datamatrix.php';
?>
<html>
    <body>
        <h1>Генерирование Data Matrix</h1>
        <p><a href="barcode-master/barcode-dmtx-test.html">barcode-dmtx-test.html</a></p>
        <p><a href="test/idautomation-datamatrix-demo-static.php">idautomation</a></p>
        <?php
        $source = '';
        $source = '475638475849388p_iG765kj&o8';
        ?>
        <p><?=$source ?></p>
        <p><img src="barcode-master/barcode.php?s=dmtxs&wq=4&d=<?=$source ?>" /></p>
        <?php
        require_once 'tcpdf/tcpdf_barcodes_2d.php';
        
        $barcodeobj = new TCPDF2DBarcode($source, 'DATAMATRIX');

        // output the barcode as HTML object
        echo $barcodeobj->getBarcodeHTML(6, 6, 'black');
        //include './tcpdf/examples/barcodes/example_2d_datamatrix_png.php';
        ?>
    </body>
</html>