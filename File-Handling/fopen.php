<?php
$filename = "demo.txt";

$handle = fopen($filename, "w");


$txt = "Hello, this is a PHP file handling test".PHP_EOL;
fwrite($handle, $txt);

$txt = "We are learning fopen, fwrite, fread.".PHP_EOL;
fwrite($handle, $txt);
fclose($handle); 


if (file_exists($filename)) {
    $handle = fopen($filename, "r");
    $filesize = filesize($filename);

    if ($filesize > 0) {
        $content = fread($handle, $filesize);
        echo $content;
    } else {
        echo "File is empty.";
    }

    fclose($handle);
} else {
    echo "File not found!";
}
?>
