<?php

namespace Mattiabasone\AdventOfCode2022\Test;

use Mattiabasone\AdventOfCode2022\Day01\Day01;
use Mattiabasone\AdventOfCode2022\Day01\PartOne;
use PHPUnit\Framework\TestCase;

class PartOneTest extends TestCase
{
    private const INPUT =
        <<<INPUT
        1000
        2000
        3000
        
        4000
        
        5000
        6000
        
        7000
        8000
        9000
        
        10000
        INPUT;

    public function testDay01PartOne(): void
    {
        $data = Day01::prepareData(self::INPUT);
        self::assertSame(24000, Day01::partOne($data));
    }

    public function testDay01PartTwo(): void
    {
        $data = Day01::prepareData(self::INPUT);
        self::assertSame(45000, Day01::partTwo($data));
    }
}
