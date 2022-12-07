<?php

declare(strict_types=1);

namespace Mattiabasone\AdventOfCode2022\Day07;

class Directory implements FileSystemElement
{
    /**
     * @var array<FileSystemElement>
     */
    private array $children = [];

    private int $size = 0;

    public function __construct(private readonly string $name, private ?Directory $parent)
    {
        if (!is_null($parent)) {
            $this->parent->addChild($this);
        }
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getParent(): ?Directory
    {
        return $this->parent;
    }

    public function addChild(FileSystemElement $fileSystemElement): void
    {
        $this->children[$fileSystemElement->getName()] = $fileSystemElement;
    }

    public function getChild(string $name): FileSystemElement
    {
        return $this->children[$name];
    }

    public function getChildren(): array
    {
        return $this->children;
    }

    public function setSize(int $size): void
    {
        $this->size = $size;
    }
}
