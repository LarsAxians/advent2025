<?php

require __DIR__ . '/../vendor/autoload.php';

function readLinesFromFile(string $fileName): array
{
    $path = __DIR__ . '/../input/' . $fileName;

    if (!is_readable($path)) {
        throw new RuntimeException();
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    return $lines === false ? [] : $lines;
}

function readCommaSeperatedFromFile(string $fileName): array
{
    $path = __DIR__ . '/../input/' . $fileName;

    if (!is_readable($path)) {
        throw new RuntimeException();
    }

    $content = file_get_contents($path);

    if ($content === false || trim($content) === '') {
        return [];
    }

    $parts = array_filter(array_map('trim', explode(',', $content)), static fn($v) => $v !== '');

    return array_values($parts);
}
