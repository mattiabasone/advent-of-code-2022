<?php

namespace Mattiabasone\AdventOfCode2022\Day01;

use Mattiabasone\AdventOfCode2022\Run;

final class Day01
{
    use Run;

    public static function partOne(array $data): int
    {
        return max($data);
    }

    public static function partTwo(array $data): int
    {
        $sortedData = $data;
        usort($sortedData, fn($a, $b) => $b <=> $a);
        return array_sum(array_slice($sortedData, 0, 3));
    }

    public static function prepareData(string $input): array
    {
        $exploded = explode("\n\n", $input);
        return array_map(
            fn ($lines) => array_sum(explode("\n", $lines)), $exploded
        );
    }
}
