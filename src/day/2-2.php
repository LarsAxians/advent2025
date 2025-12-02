<?php

$start = microtime(true);

require __DIR__ . '/../vendor/autoload.php';

$lines = readCommaSeperatedFromFile('day2.txt');

$answer = 0;

foreach ($lines as $line) {
    $line = trim($line);

    if ($line === '') {
        continue;
    }

    [$rangeStart, $rangeEnd] = explode('-', $line);

    for ($i = (int)$rangeStart; $i <= (int)$rangeEnd; $i++) {
        $length = strlen((string)$i);

        for ($blockLen = 1; $blockLen <= intdiv($length, 2); $blockLen++) {
            if ($length % $blockLen !== 0) {
                continue;
            }

            $repeatCount = intdiv($length, $blockLen);

            if ($repeatCount < 2) {
                continue;
            }

            if (str_repeat(substr((string)$i, 0, $blockLen), $repeatCount) === (string)$i) {
                $answer += $i;

                break;
            }
        }
    }
}

echo $answer . "\n";

echo number_format((microtime(true) - $start) * 1000, 3) . " ms\n";
