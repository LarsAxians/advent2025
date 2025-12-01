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
        for ($i = 0; $i < $steps; $i++) {
            $position--;

            if ($position === -1) {
                $position = 99;
            }

            if ($position === 0) {
                $answer++;
            }
        }
    } else if ($direction === 'R') {
        for ($i = 0; $i < $steps; $i++) {
            $position++;

            if ($position === 100) {
                $position = 0;
            }

            if ($position === 0) {
                $answer++;
            }
        }
    }
}

echo $answer;
