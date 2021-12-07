<?php
$list = file('./input.txt', FILE_IGNORE_NEW_LINES);
$list = file('./input_test.txt', FILE_IGNORE_NEW_LINES);

function commonBit($bytes, $position)
{
    $bitCounter = [0, 0];

    foreach ($bytes as $byte) {
        $bit = $byte[$position];
        $bitCounter[$bit]++;
    }

    if ($bitCounter[0] === $bitCounter[1]) {
        return -1;
    }

    return array_search(max($bitCounter), $bitCounter, true);
}

function filterBytes($input, $mostCommon)
{
    $bytes = $input;

    for ($pos = 0, $byteLength = strlen($bytes[0]); $pos < $byteLength; $pos++) {
        if (count($bytes) === 1) {
            break;
        }

        $mostCommonIndex = commonBit($bytes, $pos);
        $bytes = array_filter(
            $bytes,
            static function ($byte) use ($mostCommonIndex, $mostCommon, $pos) {
                if ($mostCommonIndex === -1) {
                    if ($mostCommon) {
                        return $byte[$pos] === '1';
                    }

                    return $byte[$pos] === '0';
                }

                if (!$mostCommon) {
                    return $byte[$pos] === ($mostCommonIndex === 0 ? '1' : '0');
                }

                return $byte[$pos] === (string)$mostCommonIndex;
            }
        );
    }

    return current($bytes);
}

$oxygen = filterBytes($list, true);
$carbon = filterBytes($list, false);

echo 'Oxygen: ' . $oxygen . PHP_EOL;
echo 'Carbon: ' . $carbon . PHP_EOL;
echo 'Lifesupport Rating: ' . bindec($oxygen) * bindec($carbon) . PHP_EOL;
