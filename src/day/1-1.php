<?php

$start = microtime(true);

require __DIR__ . '/../vendor/autoload.php';

$lines = readLinesFromFile('day1.txt');

$answer = 0;

$position = 50;

foreach ($lines as $line) {
    $line = trim($line);

    if ($line === '') {
        continue;
    }

    $direction = $line[0];
    $steps = (int)substr($line, 1);

    if ($direction === 'L') {
        $position = ($position - $steps) % 100;
    } else if ($direction === 'R') {
        $position = ($position + $steps) % 100;
    }

    if ($position < 0) {
        $position += 100;
    }

    if ($position === 0) {
        $answer++;
    }
}

echo $answer . "\n";

echo number_format((microtime(true) - $start) * 1000, 3) . " ms\n";
