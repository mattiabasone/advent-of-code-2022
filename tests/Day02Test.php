<?php

namespace Mattiabasone\AdventOfCode2022\Test;

use Mattiabasone\AdventOfCode2022\Day02\Day02;
use PHPUnit\Framework\TestCase;

class Day02Test extends TestCase
{
    private const INPUT =
        <<<INPUT
        A Y
        B X
        C Z
        INPUT;

    public function testDay01PartOne(): void
    {
        $data = Day02::prepareData(self::INPUT);
        self::assertSame(15, Day02::partOne($data));
    }

    public function testDay01PartTwo(): void
    {
        $data = Day02::prepareData(self::INPUT);
        self::assertSame(12, Day02::partTwo($data));
    }
}
