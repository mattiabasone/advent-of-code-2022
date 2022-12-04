<?php

declare(strict_types=1);

namespace Mattiabasone\AdventOfCode2022;

trait Run
{
    public function run(): string
    {
        $data = static::prepareData(
            static::input()
        );
        $partOne = static::partOne($data);
        $partTwo = static::partTwo($data);

        return
            <<<RESULT
            Part one: $partOne
            Part two: $partTwo
            
            RESULT;

    }

    public static function input(): string
    {
        $classNamespace = explode("\\", __CLASS__);
        $inputName = strtolower(end($classNamespace));
        return file_get_contents(__DIR__."/../inputs/{$inputName}.txt");
    }

    abstract public static function prepareData(string $input): array;
    abstract public static function partOne(array $data);
    abstract public static function partTwo(array $data);
}