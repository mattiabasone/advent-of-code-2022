<?php

declare(strict_types=1);

namespace Mattiabasone\AdventOfCode2022\Day09;

use Mattiabasone\AdventOfCode2022\Run;

final class Day09
{
    use Run;

    public static function partOne(array $data): int
    {
        $headPosition = new Position(0, 0);
        $tailPosition = new Position(0, 0);
        $visitedPositions = [$tailPosition->hash() => true];
        foreach ($data as $move) {
            $visitedPositions = self::applyMove($move, $headPosition, $tailPosition, $visitedPositions);
        }

        return count($visitedPositions);
    }

    private static function applyMove(Direction $direction, Position $headLocation, Position $tailLocation, array $visitedLocations): array
    {
        for ($i = 1; $i <= $direction->getSteps(); $i++) {
            $initialHeadX = $headLocation->getX();
            $initialHeadY = $headLocation->getY();
            $headLocation->applyMove($direction->getMove());
            if (self::shouldMoveTail($tailLocation, $headLocation)) {
                $tailLocation->updateCoordinates($initialHeadX, $initialHeadY);
                $visitedLocations[$tailLocation->hash()] = true;
            }
        }

        return $visitedLocations;
    }

    private static function shouldMoveTail(Position $tailPosition, Position $headPosition): bool
    {
        return abs($tailPosition->getX() - $headPosition->getX()) > 1 ||
            abs($tailPosition->getY() - $headPosition->getY()) > 1;
    }

    public static function partTwo(array $data): int
    {
        return -1;
    }

    public static function prepareData(string $input): array
    {
        $moves = [
            Direction::RIGHT => new Move(1, 0),
            Direction::LEFT => new Move(-1, 0),
            Direction::UP => new Move(0, 1),
            Direction::DOWN => new Move(0, -1),
        ];

        return array_map(
            function (string $line) use ($moves): Direction {
                $rawMove = explode(" ", $line);
                return new Direction($moves[$rawMove[0]], (int) $rawMove[1]);
            },
            explode("\n", $input)
        );
    }
}
