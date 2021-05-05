<?php
    require 'phpqrcode-2010100721_1.1.4/phpqrcode/qrlib.php';
    
    $content= 'http://rkueny.fr';
    $filename = 'qrcode.png';
    $errorCorrectionLevel = 'H';
    $matrixPointSize = 7;
    
    QRcode::png($content, $filename,
        $errorCorrectionLevel, $matrixPointSize, 2);
    
    echo '<img src="qrcode.png" alt="" />';
