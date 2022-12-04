<?php

declare(strict_types=1);

namespace Mattiabasone\AdventOfCode2022\Day04;

use Mattiabasone\AdventOfCode2022\Run;

final class Day04
{
    use Run;

    public static function partOne(array $data): int
    {
        return array_reduce(
            $data,
            static function (int $accumulator, AssignmentPair $assignmentPair): int {
                if (
                    $assignmentPair->getFirst()->contains($assignmentPair->getSecond()) ||
                    $assignmentPair->getSecond()->contains($assignmentPair->getFirst())
                ) {
                    return $accumulator + 1;
                }

                return $accumulator;
            },
            0
        );
    }

    public static function partTwo(array $data): int
    {
        return array_reduce(
            $data,
            static function (int $accumulator, AssignmentPair $assignmentsPair): int {
                if ($assignmentsPair->getFirst()->overlaps($assignmentsPair->getSecond())) {
                    return $accumulator + 1;
                }

                return $accumulator;
            },
            0
        );
    }

    public static function prepareData(string $input): array
    {
        $explodedData = explode("\n", $input);
        return array_map(
            static function (string $line): AssignmentPair {
                $explodedLine = explode(",", $line);

                return new AssignmentPair(new ElfAssignment($explodedLine[0]), new ElfAssignment($explodedLine[1]));
            },
            $explodedData);
    }
}
