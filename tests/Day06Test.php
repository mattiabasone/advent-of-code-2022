<?php

namespace Mattiabasone\AdventOfCode2022\Test;

use Mattiabasone\AdventOfCode2022\Day06\Day06;
use PHPUnit\Framework\TestCase;

class Day06Test extends TestCase
{
    public function inputPartOneDataProvider(): array
    {
        return [
            ['mjqjpqmgbljsphdztnvjfqwrcgsmlb', 7],
            ['bvwbjplbgvbhsrlpgdmjqwftvncz', 5],
            ['nppdvjthqldpwncqszvftbrmjlhg', 6],
            ['nznrnfrfntjfmvfwmzdfjlvtqnbhcprsg', 10],
            ['zcfzfwzzqfrljwzlrfnpqdbhtmscgvjw', 11],
        ];
    }

    public function inputPartTwoDataProvider(): array
    {
        return [
            ['mjqjpqmgbljsphdztnvjfqwrcgsmlb', 19],
            ['bvwbjplbgvbhsrlpgdmjqwftvncz', 23],
            ['nppdvjthqldpwncqszvftbrmjlhg', 23],
            ['nznrnfrfntjfmvfwmzdfjlvtqnbhcprsg', 29],
            ['zcfzfwzzqfrljwzlrfnpqdbhtmscgvjw', 26],
        ];
    }

    /**
     * @dataProvider inputPartOneDataProvider
     */
    public function testPrepareData(string $input, int $expectedResult): void
    {
        $data = Day06::prepareData($input);
        self::assertIsArray($data);
    }

    /**
     * @dataProvider inputPartOneDataProvider
     */
    public function testDay06PartOne(string $input, int $expectedResult): void
    {
        $data = Day06::prepareData($input);
        self::assertSame($expectedResult, Day06::partOne($data));
    }

    /**
     * @dataProvider inputPartTwoDataProvider
     */
    public function testDay06PartTwo(string $input, int $expectedResult): void
    {
        $data = Day06::prepareData($input);
        self::assertSame($expectedResult, Day06::partTwo($data));
    }
}
