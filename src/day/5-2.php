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

    if (!str_contains($line, '-')) {
        continue;
    }

    [$rangeStart, $rangeEnd] = explode('-', $line);

    $ranges[] = [(int)$rangeStart, (int)$rangeEnd];
}

usort($ranges, static fn($i, $j) => $i[0] <=> $j[0] ?: $i[1] <=> $j[1]);

[$currentStart, $currentEnd] = $ranges[0];
for ($i = 1, $j = count($ranges); $i < $j; $i++) {
    [$rangeStart, $rangeEnd] = $ranges[$i];

    if ($rangeStart <= $currentEnd + 1) {
        if ($rangeEnd > $currentEnd) {
            $currentEnd = $rangeEnd;
        }
    } else {
        $answer += $currentEnd - $currentStart + 1;

        [$currentStart, $currentEnd] = [$rangeStart, $rangeEnd];
    }
}

$answer += $currentEnd - $currentStart + 1;

echo $answer . "\n";

echo number_format((microtime(true) - $start) * 1000, 3) . " ms\n";
