<?php
$folodername = date('dm');
$path    = './'.$folodername;
$rootPath = realpath($path);
$zip = new ZipArchive();
$zip_file_name = date('dm').'.zip';
$zip->open($zip_file_name, ZipArchive::CREATE | ZipArchive::OVERWRITE);
$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootPath),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($files as $name => $file){
    if (!$file->isDir()){
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($rootPath) + 1);
        $zip->addFile($filePath, $relativePath);
    }
}
$zip->close();
?>