<?php
$list = file('./day_02_input.txt', FILE_IGNORE_NEW_LINES);
$list = file('./day_02_input_test.txt', FILE_IGNORE_NEW_LINES);
$x = 0;
$y = 0;

function process($entry, &$x, &$y){
    [$direction, $amount]  = explode(' ', $entry);

    switch ($direction) {
        case 'forward':
            $x += $amount;
            break;
        case 'down':
            $y += $amount;
            break;
        case 'up':
            $y -= $amount;
            break;
    }
    echo 'x: ' . $x .' y: ' . $y . ' - ' . $direction . PHP_EOL;
}

foreach($list as $entry){
    process($entry, $x, $y);
}

echo 'Quersumme: ' . $x * $y . PHP_EOL;
