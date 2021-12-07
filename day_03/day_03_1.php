<?php
$list = file('./input.txt', FILE_IGNORE_NEW_LINES);
$list = file('./input_test.txt', FILE_IGNORE_NEW_LINES);
$gamma = 0;
$epsilon = 0;

function commonBit($bytes, $position)
{
    $bitCounter = [0, 0];

    foreach ($bytes as $byte) {
        $bit = $byte[$position];
        $bitCounter[$bit]++;
    }
    return array_search(max($bitCounter), $bitCounter, true);
}

for ($pos = 0, $byteLength = strlen($list[0]); $pos < $byteLength; $pos++) {
    $mostCommonIndex = commonBit($list, $pos);
    $leastCommonIndex = $mostCommonIndex === 0 ? 1 : 0;

    $gamma .= $mostCommonIndex;
    $epsilon .= $leastCommonIndex;
}

echo 'Gamma: ' . $gamma . PHP_EOL;
echo 'Epsilon: ' . $epsilon . PHP_EOL;
echo 'Power Consumption: ' . bindec($gamma) * bindec($epsilon) . PHP_EOL;
