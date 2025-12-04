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

function readLinesFromFileAsArray(string $fileName): array
{
    $path = __DIR__ . '/../input/' . $fileName;

    if (!is_readable($path)) {
        throw new RuntimeException();
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    if ($lines === false) {
        return [];
    }

    $result = [];

    foreach ($lines as $rowIndex => $line) {
        $chars = preg_split('//u', $line, -1, PREG_SPLIT_NO_EMPTY);

        if ($chars === false) {
            continue;
        }

        $row = array_map(static function ($char) {
            return $char;
        }, $chars);

        $result[$rowIndex] = $row;
    }

    return $result;
}
