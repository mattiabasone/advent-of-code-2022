<?php

declare(strict_types=1);

namespace Mattiabasone\AdventOfCode2022\Day05;

final class Stack
{
    public function __construct(private array $crates)
    {
    }

    public function getCrates(): array
    {
        return $this->crates;
    }

    public function moveAmountToStack(int $amount, self $destinationStack): void
    {
        $destinationStack->putCrates(
            array_reverse($this->takeCrates($amount))
        );
    }

    public function moveOrderedAmountToStack(int $amount, self $destinationStack): void
    {
        $destinationStack->putCrates(
            $this->takeCrates($amount)
        );
    }

    public function takeCrates(int $amount): array
    {
        $crates = [];
        for ($i = 1; $i <= $amount; $i++) {
            $crates[] = array_shift($this->crates);
        }

        return $crates;
    }

    public function putCrates(array $crates): void
    {
        array_unshift($this->crates, ...$crates);
    }

    public function getTopCrate(): string
    {
        return $this->crates[0];
    }
}
