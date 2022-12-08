<?php

declare(strict_types=1);

namespace Mattiabasone\AdventOfCode2022\Day08;

use Mattiabasone\AdventOfCode2022\Run;

final class Day08
{
    use Run;

    public static function partOne(array $data): int
    {
        $columns = count($data);
        $rows = count($data[0]);
        $visibleOnTheEdge = (($columns + $rows) * 2) - 4;

        $lastColumn = $columns - 1;
        $lastRow = $rows - 1;


        $visibleInTheInterior = 0;
        for ($currentRow = 1; $currentRow < $lastRow; $currentRow++) {
            for ($currentColumn = 1; $currentColumn < $lastColumn; $currentColumn++) {
                $treeHeight = $data[$currentRow][$currentColumn];
                $evaluations = array_filter([
                    self::evaluateVisibilityLeft($treeHeight, $currentRow, $currentColumn, $data),
                    self::evaluateVisibilityRight($treeHeight, $currentRow, $currentColumn, $data, $lastColumn),
                    self::evaluateVisibilityUp($treeHeight, $currentRow, $currentColumn, $data),
                    self::evaluateVisibilityDown($treeHeight, $currentRow, $currentColumn, $data, $lastRow)
                ]);

                if ($evaluations !== []) {
                    $visibleInTheInterior++;
                }
            }
        }

        return $visibleOnTheEdge + $visibleInTheInterior;
    }

    private static function evaluateVisibilityLeft(int $height, int $rowIndex, int $columnIndex, array $map): bool
    {
        $visible = true;
        for ($i = $columnIndex - 1; $i >= 0; $i--) {
            if ($height <= $map[$rowIndex][$i]) {
                $visible = false;
                break;
            }
        }

        return $visible;
    }

    private static function evaluateVisibilityRight(int $height, int $rowIndex, int $columnIndex, array $map, int $columns): bool
    {
        $visible = true;
        for ($i = $columnIndex + 1; $i <= $columns; $i++) {
            if ($height <= $map[$rowIndex][$i]) {
                $visible = false;
                break;
            }
        }

        return $visible;
    }

    private static function evaluateVisibilityUp(int $height, int $rowIndex, int $columnIndex, array $map): bool
    {
        $visible = true;
        for ($i = $rowIndex - 1; $i >= 0; $i--) {
            if ($height <= $map[$i][$columnIndex]) {
                $visible = false;
                break;
            }
        }

        return $visible;
    }

    private static function evaluateVisibilityDown(int $height, int $rowIndex, int $columnIndex, array $map, int $rows): bool
    {
        $visible = true;
        for ($i = $rowIndex + 1; $i <= $rows; $i++) {
            if ($height <= $map[$i][$columnIndex]) {
                $visible = false;
                break;
            }
        }

        return $visible;
    }

    public static function partTwo(array $data): int
    {
        $columns = count($data);
        $rows = count($data[0]);

        $lastColumn = $columns - 1;
        $lastRow = $rows - 1;

        $highestScore = 0;
        for ($currentRow = 1; $currentRow < $lastRow; $currentRow++) {
            for ($currentColumn = 1; $currentColumn < $lastColumn; $currentColumn++) {
                $treeHeight = $data[$currentRow][$currentColumn];
                $score = array_product([
                    self::evaluateScenicScoreLeft($treeHeight, $currentRow, $currentColumn, $data),
                    self::evaluateScenicScoreRight($treeHeight, $currentRow, $currentColumn, $data, $lastColumn),
                    self::evaluateScenicScoreUp($treeHeight, $currentRow, $currentColumn, $data),
                    self::evaluateScenicScoreDown($treeHeight, $currentRow, $currentColumn, $data, $lastRow)
                ]);

                if ($score >= $highestScore) {
                    $highestScore = $score;
                }
            }
        }

        return $highestScore;
    }

    private static function evaluateScenicScoreLeft(int $height, int $rowIndex, int $columnIndex, array $map): int
    {
        $score = 0;
        for ($i = $columnIndex - 1; $i >= 0; $i--) {
            $score++;
            if ($height <= $map[$rowIndex][$i]) {
                break;
            }
        }

        return $score;
    }

    private static function evaluateScenicScoreRight(int $height, int $rowIndex, int $columnIndex, array $map, int $columns): int
    {
        $score = 0;
        for ($i = $columnIndex + 1; $i <= $columns; $i++) {
            $score++;
            if ($height <= $map[$rowIndex][$i]) {
                break;
            }
        }

        return $score;
    }

    private static function evaluateScenicScoreUp(int $height, int $rowIndex, int $columnIndex, array $map): int
    {
        $score = 0;
        for ($i = $rowIndex - 1; $i >= 0; $i--) {
            $score++;
            if ($height <= $map[$i][$columnIndex]) {
                break;
            }
        }

        return $score;
    }

    private static function evaluateScenicScoreDown(int $height, int $rowIndex, int $columnIndex, array $map, int $rows): int
    {
        $score = 0;
        for ($i = $rowIndex + 1; $i <= $rows; $i++) {
            $score++;
            if ($height <= $map[$i][$columnIndex]) {
                break;
            }
        }

        return $score;
    }

    public static function prepareData(string $input): array
    {
        return array_map(
            function (string $line): array {
                return array_map(fn (string $treeHeight): int => (int) $treeHeight, str_split($line));
            },
            explode("\n", $input)
        );
    }
}
