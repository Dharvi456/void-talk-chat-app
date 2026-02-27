<?php
$file = "messages.txt";
$lines = file($file);

array_pop($lines);

file_put_contents($file, implode("", $lines));
?>