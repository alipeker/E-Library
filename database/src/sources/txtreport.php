<?php
$myfile = fopen("report.txt", "w") or die("Unable to open file!");
$txt = $_POST['report'];
fwrite($myfile, $txt);
fclose($myfile);
?>