<?php

declare(strict_types=1);

namespace Mattiabasone\AdventOfCode2022\Day07;

final class File implements FileSystemElement
{
    public function __construct(private readonly string $name, private readonly int $size, private ?Directory $parent)
    {
        if (!is_null($parent)) {
            $this->parent->addChild($this);
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function getParent(): ?Directory
    {
        return $this->parent;
    }
}
