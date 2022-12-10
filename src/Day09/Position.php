<?php

declare(strict_types=1);

namespace Mattiabasone\AdventOfCode2022\Day09;

class Position
{
    public function __construct(private int $x, private int $y)
    {
    }

    public function applyMove(Move $move): void
    {
        $this->x += $move->getX();
        $this->y += $move->getY();
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function updateCoordinates(int $x, int $y): void
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function hash(): string
    {
        return sprintf('%d-%d', $this->x, $this->y);
    }

    public function distance(Position $otherLocation): int|float
    {
        return match (true) {
            $this->x === $otherLocation->getX() => abs($this->y - $otherLocation->getY()),
            $this->y === $otherLocation->getY() => abs($this->x - $otherLocation->getX()),
            default => sqrt(pow($this->x - $otherLocation->getX()) + pow($this->y - $otherLocation->getY())),
        };
    }
}