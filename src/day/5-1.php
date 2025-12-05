<?php

$start = microtime(true);

require __DIR__ . '/../vendor/autoload.php';

$lines = readLinesFromFile('day5.txt');

$answer = 0;

$ranges = [];

foreach ($lines as $line) {
    $line = trim($line);

    if ($line === '') {
        continue;
    }

    if (str_contains($line, '-')) {
        $ranges[] = $line;
    } else {
        $fresh = false;

        foreach ($ranges as $range) {
            [$rangeStart, $rangeEnd] = explode('-', $range);

            if ((int)$line >= (int)$rangeStart && (int)$line <= (int)$rangeEnd) {
                $fresh = true;
            }
        }

        if ($fresh) {
            $answer++;
        }
    }
}

echo $answer . "\n";

echo number_format((microtime(true) - $start) * 1000, 3) . " ms\n";
