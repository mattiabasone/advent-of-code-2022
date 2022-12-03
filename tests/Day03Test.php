<?php

namespace Mattiabasone\AdventOfCode2022\Test;

use Mattiabasone\AdventOfCode2022\Day03\Day03;
use PHPUnit\Framework\TestCase;

class Day03Test extends TestCase
{
    private const INPUT =
        <<<INPUT
        vJrwpWtwJgWrhcsFMMfFFhFp
        jqHRNqRjqzjGDLGLrsFMfFZSrLrFZsSL
        PmmdzqPrVvPwwTWBwg
        wMqvLMZHhHMvwLHjbvcjnnSBnvTQFn
        ttgJtRGJQctTZtZT
        CrZsJsPPZsGzwwsLwLmpwMDw
        INPUT;

    public function testPrepareData(): void
    {
        $data = Day03::prepareData(self::INPUT);
        self::assertIsArray($data);
        self::assertCount(6, $data);

        $firstEntry = $data[0];
        self::assertCount(24, $firstEntry);
    }

    public function testDay01PartOne(): void
    {
        $data = Day03::prepareData(self::INPUT);
        self::assertSame(157, Day03::partOne($data));
    }

    public function testDay01PartTwo(): void
    {
        $data = Day03::prepareData(self::INPUT);
        self::assertSame(70, Day03::partTwo($data));
    }
}
