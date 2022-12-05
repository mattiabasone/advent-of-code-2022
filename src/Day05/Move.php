<?php

declare(strict_types=1);

namespace Mattiabasone\AdventOfCode2022\Day05;

final class Move
{
    public function __construct(private readonly int $amount, private readonly int $from, private readonly int $to)
    {
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getFrom(): int
    {
        return $this->from;
    }

    public function getTo(): int
    {
        return $this->to;
    }
}
