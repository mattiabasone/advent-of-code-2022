<?php

namespace Mattiabasone\AdventOfCode2022\Test;

use Mattiabasone\AdventOfCode2022\Day08\Day08;
use PHPUnit\Framework\TestCase;

class Day08Test extends TestCase
{
    private const INPUT = <<<INPUT
    30373
    25512
    65332
    33549
    35390
    INPUT;

    public function testPrepareData(): void
    {
        $data = Day08::prepareData(self::INPUT);
        self::assertIsArray($data);
        self::assertCount(5, $data);
        self::assertCount(5, $data[0]);
    }

    public function testDay08PartOne(): void
    {
        $data = Day08::prepareData(self::INPUT);
        self::assertSame(21, Day08::partOne($data));
    }

    public function testDay08PartTwo(): void
    {
        $data = Day08::prepareData(self::INPUT);
        self::assertSame(8, Day08::partTwo($data));
    }
}
