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

    $highestNumbers = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    $lastHighestPosition = -1;

    for ($i = 0; $i < 12; $i++) {
        foreach (str_split($line) as $index => $char) {
            if ($index <= $lastHighestPosition) {
                continue;
            }

            if ($index >= strlen($line) - (11 - $i)) {
                continue;
            }

            if ((int)$char > $highestNumbers[$i]) {
                $highestNumbers[$i] = (int)$char;
                $lastHighestPosition = $index;
            }
        }
    }

    $answer += (int)implode('', $highestNumbers);
}

echo $answer . "\n";

echo number_format((microtime(true) - $start) * 1000, 3) . " ms\n";
