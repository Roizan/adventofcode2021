<?php
$list = file('./day_01_input.txt', FILE_IGNORE_NEW_LINES);
$list = file('./day_01_input_test.txt', FILE_IGNORE_NEW_LINES);
$counter = 0;

foreach($list as $line){
    if (current($list) < next($list)) {
        $counter++;
    }
}

echo $counter . PHP_EOL;

