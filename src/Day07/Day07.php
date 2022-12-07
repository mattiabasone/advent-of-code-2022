<?php

declare(strict_types=1);

namespace Mattiabasone\AdventOfCode2022\Day07;

use Mattiabasone\AdventOfCode2022\Run;

final class Day07
{
    use Run;

    public static function partOne(Directory $root): int
    {
        return self::sumSmallDirectories($root, 0);
    }

    public static function partTwo(Directory $root): int
    {
        $minimumRequiredSpace = 30_000_000 - (70_000_000 - $root->getSize());
        return self::findRemovableDirectorySize($root, $minimumRequiredSpace, $root->getSize());
    }

    public static function prepareData(string $input): Directory
    {
        $root = self::makeDirectory('/', null);
        $i = 0;
        $commands = explode("\n", $input);
        $lines = count($commands);

        $currentDir = $root;
        while ($i < $lines) {
            $currentDir = self::parseCommand($i, $commands, $lines, $root, $currentDir);
        }

        self::calculateSizes($root);

        return $root;
    }

    private static function sumSmallDirectories(Directory $directory, $sum): int
    {
        if ($directory->getSize() <= 100000) {
            $sum += $directory->getSize();
        }

        foreach ($directory->getChildren() as $child) {
            if ($child instanceof Directory) {
                $sum = self::sumSmallDirectories($child, $sum);
            }
        }

        return $sum;
    }

    private static function findRemovableDirectorySize(Directory $directory, $minimumRequiredSpace, $currentRemovableDirectorySize): int
    {
        if ($directory->getSize() < $currentRemovableDirectorySize && $directory->getSize() >= $minimumRequiredSpace) {
            $currentRemovableDirectorySize = $directory->getSize();
        }

        foreach ($directory->getChildren() as $child) {
            if ($child instanceof Directory) {
                $currentRemovableDirectorySize = self::findRemovableDirectorySize($child, $minimumRequiredSpace, $currentRemovableDirectorySize);
            }
        }

        return $currentRemovableDirectorySize;
    }

    private static function parseCommand(&$i, $commands, int $lines, Directory $root, Directory $currentDir): Directory
    {
        return match (true) {
            str_starts_with($commands[$i], '$ cd') => self::changeDirectory($i, $commands, $root, $currentDir),
            str_starts_with($commands[$i], '$ ls') => self::list($i, $commands, $lines, $currentDir),
            default => throw new \Exception("Invalid command '$commands[$i]'")
        };
    }

    private static function changeDirectory(&$i, $commands, Directory $root, Directory $currentDir): Directory
    {
        $directory = str_replace('$ cd ', '', $commands[$i]);

        $i++;
        return match ($directory) {
            '/' => $root,
            '..' => $currentDir->getParent(),
            default => $currentDir->getChild($directory),
        };
    }

    private static function list(&$i, $commands, $lines, $currentDir): Directory
    {
        $i++;
        while ($i < $lines && !str_starts_with($commands[$i], '$')) {
            self::parseListEntry($commands[$i], $currentDir);
            $i++;
        }

        return $currentDir;
    }

    private static function parseListEntry(string $command, Directory $currentDir): void
    {
        if (str_starts_with($command, 'dir')) {
            $dirname = str_replace('dir ', '', $command);
            self::makeDirectory($dirname, $currentDir);

            return;
        }

        $fileRow = explode(" ", $command);
        self::makeFile($fileRow[1], (int) $fileRow[0], $currentDir);
    }

    private static function calculateSizes(Directory $directory): void
    {
        $size = 0;
        foreach ($directory->getChildren() as $child) {
            if ($child instanceof Directory) {
                self::calculateSizes($child);
            }

            $size += $child->getSize();
        }

        $directory->setSize($size);
    }

    private static function makeDirectory(string $name, ?Directory $parent): Directory
    {
        return new Directory($name, $parent);
    }

    private static function makeFile(string $name, int $size, ?Directory $parent): File
    {
        return new File($name, $size, $parent);
    }
}
