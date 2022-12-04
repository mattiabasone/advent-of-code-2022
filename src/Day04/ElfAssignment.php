<?php

declare(strict_types=1);

namespace Mattiabasone\AdventOfCode2022\Day04;

final class ElfAssignment
{
    private readonly int $from;
    private readonly int $to;

    public function __construct(string $sections)
    {
        $explodedSections = explode("-", $sections);

        $this->from = (int) $explodedSections[0];
        $this->to = (int) $explodedSections[1];
    }

    public function contains(self $otherAssignment): bool
    {
        return $this->getFrom() <= $otherAssignment->getFrom() &&
            $this->getTo() >= $otherAssignment->getTo();
    }

    public function overlaps(self $otherAssignment): bool
    {
        return $this->getFrom() <= $otherAssignment->getTo() && $this->getTo() >= $otherAssignment->getFrom();
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
