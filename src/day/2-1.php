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

        if ($length % 2 !== 0) {
            continue;
        }

        $part1 = substr((string)$i, 0, $length / 2);
        $part2 = substr((string)$i, $length / 2);

        if ($part1 === $part2) {
            $answer += $i;
        }
    }
}

echo $answer . "\n";

echo number_format((microtime(true) - $start) * 1000, 3) . " ms\n";
