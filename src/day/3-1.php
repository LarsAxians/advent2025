<?php

$start = microtime(true);

require __DIR__ . '/../vendor/autoload.php';

$lines = readLinesFromFile('day3.txt');

$answer = 0;

foreach ($lines as $line) {
    $line = trim($line);

    if ($line === '') {
        continue;
    }

    $highest1 = 0;
    $highest2 = 0;
    $position = 0;

    foreach (str_split($line) as $index => $char) {
        if ($index >= strlen($line) - 1) {
            continue;
        }

        if ((int)$char > $highest1) {
            $highest1 = (int)$char;
            $position = $index;
        }
    }

    foreach (str_split($line) as $index => $char) {
        if ($index <= $position) {
            continue;
        }

        if ((int)$char > $highest2) {
            $highest2 = (int)$char;
        }
    }

    $answer += (int)($highest1 . $highest2);
}

echo $answer . "\n";

echo number_format((microtime(true) - $start) * 1000, 3) . " ms\n";
