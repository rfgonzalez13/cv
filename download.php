<?php
    session_start(); 
    $filename = $_SESSION['filename'];
    $type = $_SESSION['type'];
    $outputname = $_SESSION['outputname'];        

    header('Pragma: public');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Cache-Control: private', false);
    header('Content-Type: ' . $type);
    
    header('Content-Disposition: attachment; filename="'. $outputname . '";');
    header('Content-Transfer-Encoding: binary');
    header('Content-Length: ' . filesize($filename));

    ob_clean();
    flush();
    readfile($filename);

    unlink($filename);
    
    exit;


?> 
