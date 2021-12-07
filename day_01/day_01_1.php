<?php
$list = file('./input.txt', FILE_IGNORE_NEW_LINES);
$list = file('./input_test.txt', FILE_IGNORE_NEW_LINES);
$counter = 0;

foreach($list as $line){
    if (current($list) < next($list)) {
        $counter++;
    }
}

echo $counter . PHP_EOL;

