<?php

namespace Mattiabasone\AdventOfCode2022\Test;

use Mattiabasone\AdventOfCode2022\Day07\Day07;
use PHPUnit\Framework\TestCase;

class Day07Test extends TestCase
{
    private const INPUT = <<<INPUT
    $ cd /
    $ ls
    dir a
    14848514 b.txt
    8504156 c.dat
    dir d
    $ cd a
    $ ls
    dir e
    29116 f
    2557 g
    62596 h.lst
    $ cd e
    $ ls
    584 i
    $ cd ..
    $ cd ..
    $ cd d
    $ ls
    4060174 j
    8033020 d.log
    5626152 d.ext
    7214296 k
    INPUT;

    public function testPrepareData(): void
    {
        $root = Day07::prepareData(self::INPUT);
        self::assertSame(48_381_165, $root->getSize());
        self::assertSame(94_853, $root->getChild('a')->getSize());
        self::assertSame(584, $root->getChild('a')->getChild('e')->getSize());
    }

    public function testDay07PartOne(): void
    {
        $data = Day07::prepareData(self::INPUT);
        self::assertSame(95_437, Day07::partOne($data));
    }

    public function testDay07PartTwo(): void
    {
        $data = Day07::prepareData(self::INPUT);
        self::assertSame(24_933_642, Day07::partTwo($data));
    }
}
