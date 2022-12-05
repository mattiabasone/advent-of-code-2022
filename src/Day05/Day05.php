<?php

declare(strict_types=1);

namespace Mattiabasone\AdventOfCode2022\Day05;

use Mattiabasone\AdventOfCode2022\Run;

final class Day05
{
    use Run;

    private const MOVES_REGEX = "/move\s(?P<amount>[\d]+)\sfrom\s(?P<from>[\d]+)\sto\s(?P<to>[\d+])/";

    public static function partOne(array $data): string
    {
        [$stacks, $moves] = $data;

        foreach ($moves as $move) {
            [$amount, $from, $to] = $move;

            $stacks[$from]->moveAmountToStack(
                $amount,
                $stacks[$to]
            );
        }

        return array_reduce(
            $stacks,
            fn (string $accumulator, Stack $stack): string => $accumulator.$stack->getTopCrate(),
            ""
        );
    }

    public static function partTwo(array $data): string
    {
        [$stacks, $moves] = $data;

        foreach ($moves as $move) {
            [$amount, $from, $to] = $move;

            $stacks[$from]->moveOrderedAmountToStack(
                $amount,
                $stacks[$to]
            );
        }

        return array_reduce(
            $stacks,
            fn (string $accumulator, Stack $stack): string => $accumulator.$stack->getTopCrate(),
            ""
        );
    }

    public static function prepareData(string $input): array
    {
        [$rawCrates, $rawMoves] = explode("\n\n", $input);

        return [
            self::prepareCrates($rawCrates),
            self::prepareMoves($rawMoves)
        ];
    }

    private static function prepareCrates(string $rawCrates): array
    {
        $rawCratesArray = explode("\n", $rawCrates);

        $crates = array_map(static function (string $crateRow) {
            $crateRowArray = str_split($crateRow, 4);
            return array_map(
                fn (string $entry) => trim($entry, " []"),
                $crateRowArray
            );
        }, $rawCratesArray);

        $stacks = array_pop($crates);
        $stackedCrates = [];
        foreach ($stacks as $stack) {
            $stackedCrates[(int) $stack] = new Stack(
                array_filter(
                    array_column($crates, ((int) $stack) - 1)
                )
            );
        }

        return $stackedCrates;
    }

    private static function prepareMoves(string $rawMoves): array
    {
        $rawMovesArray = explode("\n", $rawMoves);
        return array_map(
            function (string $move) {
                 $matches = [];
                 preg_match(self::MOVES_REGEX, $move, $matches);
                 return [(int) $matches['amount'], (int) $matches['from'], (int) $matches['to']];
            },
            $rawMovesArray
        );
    }
}
