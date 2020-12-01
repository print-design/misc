<html>
    <body>
        <h1>Генерирование Data Matrix</h1>
        <?php
        $source = '';
        $source = '475638475849388p_iG765kj&o8';
        ?>
        <p><?=$source ?></p>
        <p><img src="barcode-master/barcode.php?s=dmtxs&wq=4&d=<?=$source ?>"></p>
    </body>
</html>