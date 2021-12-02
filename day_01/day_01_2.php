<?php
$list = file("./day_01_input.txt", FILE_IGNORE_NEW_LINES);
$list = file("./day_01_input_test.txt", FILE_IGNORE_NEW_LINES);
$counter = 0;

for ($i = 0; $i < count($list) - 1; $i++) {
    if ($i + 3 <= count($list) - 1) {
        if ($list[$i] + $list[$i + 1] + $list[$i + 2] < $list[$i + 1] + $list[$i + 2] + $list[$i + 3]) {
            $counter++;
        }
    }
}

echo $counter . PHP_EOL;
