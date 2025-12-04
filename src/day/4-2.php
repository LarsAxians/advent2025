<?php

$start = microtime(true);

require __DIR__ . '/../vendor/autoload.php';

$lines = readLinesFromFileAsArray('day4.txt');

$previousAnswer = null;
$answer = 0;

$lineCount = count($lines);
$lineLength = count($lines[0]);

while (true) {
    $toRemove = [];

    for ($i = 0; $i < $lineCount; $i++) {
        for ($j = 0; $j < $lineLength; $j++) {
            $total = 0;

            if (!isset($lines[$i][$j])) {
                continue;
            }

            if ($lines[$i][$j] !== '@') {
                continue;
            }

            if ($i > 0 && $j > 0 && isset($lines[$i - 1][$j - 1]) && $lines[$i - 1][$j - 1] === '@') {
                $total++;
            }

            if ($j > 0 && isset($lines[$i][$j - 1]) && $lines[$i][$j - 1] === '@') {
                $total++;
            }

            if ($i < $lineCount - 1 && $j > 0 && isset($lines[$i + 1][$j - 1]) && $lines[$i + 1][$j - 1] === '@') {
                $total++;
            }

            if ($i > 0 && isset($lines[$i - 1][$j]) && $lines[$i - 1][$j] === '@') {
                $total++;
            }

            if ($i < $lineCount - 1 && isset($lines[$i + 1][$j]) && $lines[$i + 1][$j] === '@') {
                $total++;
            }

            if ($i > 0 && $j < $lineLength - 1 && isset($lines[$i - 1][$j + 1]) && $lines[$i - 1][$j + 1] === '@') {
                $total++;
            }

            if ($j < $lineLength - 1 && isset($lines[$i][$j + 1]) && $lines[$i][$j + 1] === '@') {
                $total++;
            }

            if ($i < $lineCount - 1 && $j < $lineLength - 1 && isset($lines[$i + 1][$j + 1]) && $lines[$i + 1][$j + 1] === '@') {
                $total++;
            }

            if ($total < 4) {
                $toRemove[] = $i . '-' . $j;
            }
        }
    }

    if (empty($toRemove)) {
        break;
    }

    $answer += count($toRemove);

    foreach ($toRemove as $remove) {
        $removeParts = explode('-', $remove);

        $lines[$removeParts[0]][$removeParts[1]] = 'x';
    }
}

echo $answer . "\n";

echo number_format((microtime(true) - $start) * 1000, 3) . " ms\n";
