<?php

declare(strict_types=1);

namespace Mattiabasone\AdventOfCode2022\Day10;

use Mattiabasone\AdventOfCode2022\Run;

final class Day10
{
    use Run;

    public static function partOne(array $data): int
    {
        $x = 1;
        $cycle = 1;
        $cycles = [];
        foreach ($data as $instruction) {
            $cycle++;
            $x = self::applyInstruction($x, $instruction);
            $cycles[$cycle] = $x;
        }

        $result = 0;
        for ($evaluatedCycle = 20; $evaluatedCycle <= 240; $evaluatedCycle+=40) {
            $result += ($evaluatedCycle * $cycles[$evaluatedCycle]);
        }

        return $result;
    }

    public static function partTwo(array $data): string
    {
        $rows = 6;
        $columns = 40;
        $crt = self::initializeCrt($rows, $columns);
        $instructionsCount = count($data);

        $x = 1;
        for ($i = 0; $i < $instructionsCount; $i++) {
            $currentRow = intdiv($i, $columns);
            $currentColumn = $i % $columns;
            if (abs($x - $currentColumn) <= 1) {
                $crt[$currentRow][$currentColumn] = '#';
            }
            $x = self::applyInstruction($x, $data[$i]);
        }

        return "\n".self::printCrt($crt);
    }

    private static function applyInstruction(int $x, array $instruction): int
    {
        return match ($instruction['type']) {
            'noop' => $x,
            'addx' => $x + $instruction['value'],
            default => throw new \Exception("Invalid instruction"),
        };
    }

    private static function initializeCrt(int $rows, int $cols): array
    {
        $crt = [];
        for ($i = 0; $i < $rows; $i++) {
            $crt[$i] = array_fill(0, $cols, '.');
        }

        return $crt;
    }

    private static function printCrt(array $crt): string
    {
        $output = "";
        $rows = count($crt);
        $cols = count($crt[0]);
        for ($r = 0; $r < $rows; $r++) {
            for ($c = 0; $c < $cols; $c++) {
                $output .= $crt[$r][$c];
            }
            $output .= "\n";
        }

        return $output;
    }

    public static function prepareData(string $input): array
    {
        return array_reduce(
            explode("\n", $input),
            function (array $accumulator, string $entry): array {
                $accumulator[] = ['type' => 'noop'];

                if ($entry === 'noop') {
                    return $accumulator;
                }

                $operation = explode(" ", $entry);
                $accumulator[] = ['type' => 'addx', 'value' => (int) $operation[1]];
                return $accumulator;
            },
            []
        );
    }
}
