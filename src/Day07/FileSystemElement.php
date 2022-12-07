<?php

declare(strict_types=1);

namespace Mattiabasone\AdventOfCode2022\Day07;

interface FileSystemElement
{
    public function getSize(): int;
    public function getName(): string;
    public function getParent(): ?Directory;
}
