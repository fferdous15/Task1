<?php
$myfile = fopen("newfile.txt", "w") or die ("unable to open file");
$txt = "Fahim Ferdous\n";
fwrite($myfile, $txt);
$txt="Swarna\n";
fwrite($myfile, $txt);
fclose($myfile);
?>