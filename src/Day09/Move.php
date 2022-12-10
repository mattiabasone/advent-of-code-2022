<?php

declare(strict_types=1);

namespace Mattiabasone\AdventOfCode2022\Day09;

class Move
{
    public function __construct(private readonly int $x, private readonly int $y)
    {
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }
}