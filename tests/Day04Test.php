<?php

namespace Mattiabasone\AdventOfCode2022\Test;

use Mattiabasone\AdventOfCode2022\Day04\Day04;
use Mattiabasone\AdventOfCode2022\Day04\ElfAssignment;
use PHPUnit\Framework\TestCase;

class Day04Test extends TestCase
{
    private const INPUT =
        <<<INPUT
        2-4,6-8
        2-3,4-5
        5-7,7-9
        2-8,3-7
        6-6,4-6
        2-6,4-8
        INPUT;

    public function testPrepareData(): void
    {
        $data = Day04::prepareData(self::INPUT);
        self::assertIsArray($data);
        self::assertCount(6, $data);
        self::assertInstanceOf(ElfAssignment::class, $data[0]->getFirst());
    }

    public function testDay03PartOne(): void
    {
        $data = Day04::prepareData(self::INPUT);
        self::assertSame(2, Day04::partOne($data));
    }

    public function testDay03PartTwo(): void
    {
        $data = Day04::prepareData(self::INPUT);
        self::assertSame(4, Day04::partTwo($data));
    }
}
