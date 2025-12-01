<?php

require __DIR__ . '/../vendor/autoload.php';

function readLinesFromFile(string $fileName): array
{
    $path = __DIR__ . '/../input/' . $fileName;

    if (!is_readable($path)) {
        throw new RuntimeException("Bestand niet leesbaar of bestaat niet: " . $path);
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    return $lines === false ? [] : $lines;
}
