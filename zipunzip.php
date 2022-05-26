<?php

$path    = './*.zip';
$files = glob($path);
$zipArchive = new ZipArchive();
$folodername = date('dm');
foreach($files as $file){
    $result = $zipArchive->open($file);
    if ($result === TRUE) {
        $zipArchive->extractTo("./".$folodername);
        $zipArchive->close();
        echo 'unzip successfully';
    }else{
        echo 'error';
    }
}

?>