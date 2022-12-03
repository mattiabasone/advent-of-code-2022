<?php

namespace Mattiabasone\AdventOfCode2022\Day03;

use Mattiabasone\AdventOfCode2022\Run;

final class Day03
{
    use Run;

    public static function partOne(array $data): int
    {
        $contentPriorities = self::contentPriorities();
        $rucksacksPriorities = array_reduce(
            $data,
            static function (array $accumulator, array $rucksack) use ($contentPriorities): array {
                $compartments = array_chunk($rucksack, count($rucksack) / 2);
                $accumulator[] = self::extractElementPriority($compartments, $contentPriorities);

                return $accumulator;
            },
            []
        );

        return array_sum($rucksacksPriorities);
    }

    public static function partTwo(array $data): int
    {
        $contentPriorities = self::contentPriorities();
        $chunkedRucksacks = array_chunk($data, 3);

        $rucksacksPriorities = array_reduce(
            $chunkedRucksacks,
            static function (array $accumulator, array $chunk) use ($contentPriorities): array {
                $accumulator[] = self::extractElementPriority($chunk, $contentPriorities);

                return $accumulator;
            },
            []
        );

        return array_sum($rucksacksPriorities);
    }

    public static function contentPriorities(): array
    {
        $contentPriorities = [];
        // Creates ['a' => 1, ...]
        for ($i = 97; $i <= 122; $i++) {
            $contentPriorities[chr($i)] = $i - 96;
        }

        // Creates ['A' => 1, ...]
        for ($i = 65; $i <= 90; $i++) {
            $contentPriorities[chr($i)] = $i - 38;
        }

        return $contentPriorities;
    }

    public static function extractElementPriority(array $compartments, array $priorities): int
    {
        $elements = array_intersect(...$compartments);
        $element = array_shift($elements);
        return $priorities[$element];
    }

    public static function prepareData(string $input): array
    {
        $exploded = explode("\n", $input);
        return array_map(
            static fn (string $line) => str_split($line),
            $exploded
        );
    }
}
