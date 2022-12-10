<?php

namespace Mattiabasone\AdventOfCode2022\Test;

use Mattiabasone\AdventOfCode2022\Day09\Day09;
use Mattiabasone\AdventOfCode2022\Day09\Direction;
use Mattiabasone\AdventOfCode2022\Day09\Move;
use PHPUnit\Framework\TestCase;

class Day09Test extends TestCase
{
    private const INPUT = <<<INPUT
    R 4
    U 4
    L 3
    D 1
    R 4
    D 1
    L 5
    R 2
    INPUT;

    public function testPrepareData(): void
    {
        $data = Day09::prepareData(self::INPUT);
        self::assertIsArray($data);
        self::assertInstanceOf(Direction::class, $data[0]);
        self::assertEquals(new Move(1, 0), $data[0]->getMove());
        self::assertEquals(4, $data[0]->getSteps());
    }

    public function testDay09PartOne(): void
    {
        $data = Day09::prepareData(self::INPUT);
        self::assertSame(13, Day09::partOne($data));
    }

//    public function testDay08PartTwo(): void
//    {
//        $data = Day08::prepareData(self::INPUT);
//        self::assertSame(8, Day08::partTwo($data));
//    }
}
