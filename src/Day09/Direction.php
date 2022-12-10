<?php

declare(strict_types=1);

namespace Mattiabasone\AdventOfCode2022\Day09;

class Direction
{
    public const LEFT = "L";
    public const RIGHT = "R";
    public const UP = "U";
    public const DOWN = "D";

    public function __construct(private readonly Move $move, private readonly int $steps)
    {
    }

    public function getMove(): Move
    {
        return $this->move;
    }

    public function getSteps(): int
    {
        return $this->steps;
    }
}