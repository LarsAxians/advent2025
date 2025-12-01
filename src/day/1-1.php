<?php

require __DIR__ . '/../vendor/autoload.php';

$lines = readLinesFromFile('day1.txt');

$position = 50;
$answer = 0;

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

echo $answer;
