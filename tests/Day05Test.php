<?php

namespace Mattiabasone\AdventOfCode2022\Test;

use Mattiabasone\AdventOfCode2022\Day05\Day05;
use PHPUnit\Framework\TestCase;

class Day05Test extends TestCase
{
    private const INPUT =
        <<<INPUT
            [D]    
        [N] [C]    
        [Z] [M] [P]
         1   2   3 
        
        move 1 from 2 to 1
        move 3 from 1 to 3
        move 2 from 2 to 1
        move 1 from 1 to 2
        INPUT;

    public function testPrepareData(): void
    {
        $data = Day05::prepareData(self::INPUT);
        self::assertIsArray($data);
    }

    public function testDay05PartOne(): void
    {
        $data = Day05::prepareData(self::INPUT);
        self::assertSame("CMZ", Day05::partOne($data));
    }

    public function testDay05PartTwo(): void
    {
        $data = Day05::prepareData(self::INPUT);
        self::assertSame("MCD", Day05::partTwo($data));
    }
}
