<?php

declare(strict_types=1);

namespace Mattiabasone\AdventOfCode2022\Day06;

use Mattiabasone\AdventOfCode2022\Run;

final class Day06
{
    use Run;

    public static function partOne(array $data): int
    {
        return self::findMessageStartChar($data, 4);
    }

    public static function partTwo(array $data): int
    {
        return self::findMessageStartChar($data, 14);
    }

    private static function findMessageStartChar(array $data, int $markerLength): int
    {
        $found = false;
        $index = 0;
        $lastChar = count($data) - $markerLength;
        while (!$found || $index > $lastChar) {
            $slice = array_unique(
                array_slice($data, $index, $markerLength)
            );
            if (count($slice) === $markerLength) {
                $found = true;
                continue;
            }
            $index++;
        }

        return $index + $markerLength;
    }

    public static function prepareData(string $input): array
    {
        return str_split($input);
    }
}
