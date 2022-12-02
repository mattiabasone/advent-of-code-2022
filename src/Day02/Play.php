<?php

namespace Mattiabasone\AdventOfCode2022\Day02;

enum Play: string
{
    case ROCK = 'A';
    case PAPER = 'B';
    case SCISSORS = 'C';

    public function getScore(): int
    {
        return match ($this) {
            self::ROCK => 1,
            self::PAPER => 2,
            self::SCISSORS => 3
        };
    }

    public function winsOn(): self
    {
        return match ($this) {
            self::ROCK => self::SCISSORS,
            self::PAPER => self::ROCK,
            self::SCISSORS => self::PAPER,
        };
    }

    public function losesOn(): self
    {
        return match ($this) {
            self::ROCK => self::PAPER,
            self::PAPER => self::SCISSORS,
            self::SCISSORS => self::ROCK,
        };
    }

    public static function fromInput(string $input): self
    {
        return match ($input) {
            'A', 'X' => self::ROCK,
            'B', 'Y' => self::PAPER,
            'C', 'Z' => self::SCISSORS,
            default => throw new \Exception("Unhandled input value")
        };
    }
}
