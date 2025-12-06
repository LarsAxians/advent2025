<?php

$start = microtime(true);

require __DIR__ . '/../vendor/autoload.php';

$lines = readLinesFromFile('day6.txt');

$answer = 0;

$inputs = [];

foreach ($lines as $line) {
    $line = trim($line);

    if ($line === '') {
        continue;
    }

    $inputs[] = explode(' ', trim(preg_replace('/ +/', ' ', $line)));
}

$singleInputCount = count($inputs[0]);
$inputCount = count($inputs);

for ($i = 0; $i < $singleInputCount; $i++) {
    $currentAnswer = 0;

    for ($j = 0; $j < $inputCount - 1; $j++) {
        if ($currentAnswer === 0) {
            $currentAnswer = (int)$inputs[$j][$i];
        } else if ($inputs[$inputCount - 1][$i] === '+') {
            $currentAnswer += (int)$inputs[$j][$i];
        } else if ($inputs[$inputCount - 1][$i] === '*') {
            $currentAnswer *= (int)$inputs[$j][$i];
        }
    }

    $answer += $currentAnswer;
}

echo $answer . "\n";

echo number_format((microtime(true) - $start) * 1000, 3) . " ms\n";
