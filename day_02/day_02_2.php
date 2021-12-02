<?php
$list = file('./day_02_input.txt', FILE_IGNORE_NEW_LINES);
$list = file('./day_02_input_test.txt', FILE_IGNORE_NEW_LINES);
$x = 0;
$y = 0;
$aim = 0;

function process($entry, &$x, &$y, &$aim){
    [$direction, $amount] = explode(' ', $entry);
    switch ($direction) {
        case 'forward':
            $x += $amount;
            $y += $aim * $amount;
            break;
        case 'down':
            $aim += $amount;
            break;
        case 'up':
            $aim -= $amount;
            break;
    }
    echo 'x: ' . $x .' y: ' . $y . ' aim: ' . $aim .' - ' . $amount .' '. $direction . PHP_EOL;
}

foreach($list as $entry) {
    process($entry, $x, $y, $aim);
}

echo 'Quersumme: ' . $x * $y . PHP_EOL;
