<?php

declare(strict_types=1);

namespace Mattiabasone\AdventOfCode2022\Day04;

final class AssignmentPair
{
    public function __construct(
        private readonly ElfAssignment $first,
        private readonly ElfAssignment $second,
    )
    {
    }

    public function getFirst(): ElfAssignment
    {
        return $this->first;
    }

    public function getSecond(): ElfAssignment
    {
        return $this->second;
    }
}
